<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    //

    public function adminManageQuestions(Request $request){
        $exam_id = $request->query('exam_id'); // Get the exam ID from query parameters

        return view('questions.adminManageQuestions',compact('exam_id'));
    }

    public function addQuestion(Request $request){
      $save=Question::create($request->all());
      if($save){
        return redirect()->back()->with('success','Data saved succesfully');
        }else{
            return redirect()->back()->with('Failed','Could not saved');
        }

    }



    public function fetchQuestions(Request $request,$exam_id) {
        $query = Question::select('id','question_name','question_mark','question_answer','exam_id')->where('exam_id',$exam_id)->orderBy('created_at', 'asc');

        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('question_name', 'like', '%' . $request->search . '%')
                ->orWhere('question_mark', 'like', '%' . $request->search . '%')
                ->orWhere('question_answer', 'like', '%' . $request->search . '%');
            });
        }
    
        // Get the number of records per page
        $perPage = $request->input('per_page', 10); // Default is 10
    
        $users = $query->paginate($perPage);
    
        return response()->json([
            'users' => $users->items(),
            'pagination' => [
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'total' => $users->total(),
                'per_page' => $users->perPage(),
            ],
            'total_users' => $users->total(),
        ]);
    }



     
    public function updateQuestion(Request $request)
    {
       
        $validated = $request->validate([
            'update_question_id' =>'required|exists:questions,id',
        ]);


        $user = Question::find($request->update_question_id);

        if ($user) {
            // Update user details
            $user->question_name = $request->update_question_name;
            $user->question_answer = $request->update_question_answer;
            $user->question_mark = $request->update_question_mark;
            $user->update();
            return response()->json(['success' => true, 'message' => 'Question updated successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Question not found!'], 404);
   
    }



    
    public function deleteQuestion(Request $request)
    {
       
        $user = Question::find($request->delete_question_id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'Question deleted successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Question not found!'], 404);
   
    }


}
