<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Clas;
use App\Models\StudentAnswer;
use App\Models\Question;

class ExamController extends Controller
{
    //

    public function index(){
        $clas=Clas::select('id','clas_name')->get();
        return view('exams.adminManageExams',compact('clas'));
    }

    public function adminManageCats(){
        $clas=Clas::select('id','clas_name')->get();
        return view('exams.adminManageCats',compact('clas'));
    }

    public function adminManageFinalExam(){
        $clas=Clas::select('id','clas_name')->get();
        return view('exams.adminManageFinalExam',compact('clas'));
    }

    public function addAssignment(Request $request){
        $save=Exam::create($request->all());
        if($save){
            return redirect()->back()->with('success','Data saved succesfully');
        }else{
            return redirect()->back()->with('Failed','Could not saved');
        }
    }

    /*
    public function fetchAssignments(Request $request) {
        $query = Exam::with('clas')->select( 'id',  'exam_type',
        'is_assignment',
        'is_cat',
        'is_final_exam',
        'exam_name',
        'exam_start_date',
        'exam_end_date',
        'exam_duration',
        'exam_instruction',
        'exam_status',
        'course_id',
        'clas_id')
        ->where('is_assignment','Yes')
        ->orderBy('created_at', 'desc');


        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('exam_name', 'like', '%' . $request->search . '%')
                ->orWhere('clas_id', 'like', '%' . $request->search . '%')
                ->orWhere('exam_status', 'like', '%' . $request->search . '%');
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

    */


    public function fetchAssignments(Request $request) {
        $query = Exam::with('clas')->select( 'id',  'exam_type',
        'is_assignment',
        'is_cat',
        'is_final_exam',
        'exam_name',
        'exam_start_date',
        'exam_end_date',
        'exam_duration',
        'exam_instruction',
        'exam_status',
        'course_id',
        'clas_id')
        ->where('is_assignment','Yes')
        ->orderBy('created_at', 'desc');


        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('exam_name', 'like', '%' . $request->search . '%')
                ->orWhere('clas_id', 'like', '%' . $request->search . '%')
                ->orWhere('exam_status', 'like', '%' . $request->search . '%');
            });
        }
    
        // Get the number of records per page
        $perPage = $request->input('per_page', 10); // Default is 10
    
        $users = $query->paginate($perPage);

        // Append the number of students who attempted each exam
        foreach ($users as $exam) {
            $exam->attempted_students = StudentAnswer::where('exam_id', $exam->id)
                ->distinct('user_id')
                ->count();
        }
    
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


    public function fetchCats(Request $request) {
        $query = Exam::with('clas')->select( 'id',  'exam_type',
        'is_assignment',
        'is_cat',
        'is_final_exam',
        'exam_name',
        'exam_start_date',
        'exam_end_date',
        'exam_duration',
        'exam_instruction',
        'exam_status',
        'course_id',
        'clas_id')
        ->where('is_cat','Yes')
        ->orderBy('created_at', 'desc');


        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('exam_name', 'like', '%' . $request->search . '%')
                ->orWhere('clas_id', 'like', '%' . $request->search . '%')
                ->orWhere('exam_status', 'like', '%' . $request->search . '%');
            });
        }
    
        // Get the number of records per page
        $perPage = $request->input('per_page', 10); // Default is 10
    
        $users = $query->paginate($perPage);

        // Append the number of students who attempted each exam
        foreach ($users as $exam) {
            $exam->attempted_students = StudentAnswer::where('exam_id', $exam->id)
                ->distinct('user_id')
                ->count();
        }
    
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


    public function showExamAttempts(Request $request){

        $exam_id = $request->query('exam_id'); // Get the exam ID from query parameters

        return view('exams.showExamAttempts',compact('exam_id'));
    }

    public function fetchExamAttempts(Request $request,$exam_id){

        $exam=Exam::with(['clas','course'])->where('id',$exam_id)->first();
        $ovaral_score=Question::where('exam_id',$exam_id)->sum('question_mark');
        $query = StudentAnswer::where('exam_id', $exam_id)
        ->select('user_id', 'exam_id', \DB::raw('SUM(score) as total_score')) // Get total score per user
        ->with('user:id,firstname,secondname,lastname') // Ensure user details are fetched
        ->groupBy('user_id', 'exam_id') // Group by user_id and exam_id to remove duplicates
        ->orderBy('created_at', 'asc');
   



        //$query = Question::select('id','question_name','question_mark','question_answer','exam_id')->where('exam_id',$exam_id)->orderBy('created_at', 'asc');

        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('user.firstname', 'like', '%' . $request->search . '%')
                ->orWhere('user.secondname', 'like', '%' . $request->search . '%')
                ->orWhere('user.lastname', 'like', '%' . $request->search . '%');
            });
        }
    
        // Get the number of records per page
        $perPage = $request->input('per_page', 10); // Default is 10
    
        $users = $query->paginate($perPage);
    
        return response()->json([
            'users' => $users->items(),
            'ovaral_score'=> $ovaral_score,
            'exam_name'=>$exam->exam_name,
            'clas_name'=>$exam->clas->clas_name,
            'course_name'=>$exam->course->course_name?? 'NA',
            'pagination' => [
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'total' => $users->total(),
                'per_page' => $users->perPage(),
            ],
            'total_users' => $users->total(),
            
        ]);


    }



    public function fetchFinalExam(Request $request) {
        $query = Exam::with('clas')->select( 'id',  'exam_type',
        'is_assignment',
        'is_cat',
        'is_final_exam',
        'exam_name',
        'exam_start_date',
        'exam_end_date',
        'exam_duration',
        'exam_instruction',
        'exam_status',
        'course_id',
        'clas_id')
        ->where('is_final_exam','Yes')
        ->orderBy('created_at', 'desc');


        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('exam_name', 'like', '%' . $request->search . '%')
                ->orWhere('clas_id', 'like', '%' . $request->search . '%')
                ->orWhere('exam_status', 'like', '%' . $request->search . '%');
            });
        }
    
        // Get the number of records per page
        $perPage = $request->input('per_page', 10); // Default is 10
    
        $users = $query->paginate($perPage);

        // Append the number of students who attempted each exam
        foreach ($users as $exam) {
            $exam->attempted_students = StudentAnswer::where('exam_id', $exam->id)
                ->distinct('user_id')
                ->count();
        }
    
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



    
    public function updateExams(Request $request)
    {
       
        $validated = $request->validate([
            'exam_id' =>'required|exists:exams,id',
            'exam_name' =>'string|max:255',
            'exam_status' =>'string|max:255',
            'exam_start_date' =>'string|max:255',
            'exam_end_date' =>'string|max:255',
            'exam_duration' =>'string|max:255',
        ]);


        $user = Exam::find($request->exam_id);

        if ($user) {
            // Update user details
            $user->exam_name = $request->exam_name;
            $user->exam_start_date = $request->exam_start_date;
            $user->exam_end_date = $request->exam_end_date;
            $user->exam_duration = $request->exam_duration;
            $user->exam_status = $request->update_exam_status;
            $user->clas_id = $request->update_clas_id;
            $user->update();
            return response()->json(['success' => true, 'message' => 'Assignment updated successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'School not found!'], 404);
   
    }








    
    public function deleteExams(Request $request)
    {
       
        $user = Exam::find($request->delete_exam_id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'Exam deleted successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Exam not found!'], 404);
   
    }


    public function publishedExams(Request $request)
    {
       
        $user = Exam::find($request->published_exam_id);
        if ($user) {
            $user->update(['exam_status'=>'Published']);
            return response()->json(['success' => true, 'message' => 'Exam published successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Exam not found!'], 404);
   
    }






    public function notpublishedExams(Request $request)
    {
       
        $user = Exam::find($request->notpublished_exam_id);
        if ($user) {
            $user->update(['exam_status'=>'Not Published']);
            return response()->json(['success' => true, 'message' => 'Exam Unpublished successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Exam not found!'], 404);
   
    }




}
