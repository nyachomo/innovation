<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Fee;
use App\Models\Clas;
use App\Models\Exam;
use App\Models\StudentAnswer;
use App\Models\Topic;
use App\Models\Question;
use App\Models\CourseModule;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class TraineeController extends Controller
{
    //

    public function index(){
        $courses=Course::select('course_name','id')->get();
        $clases=Clas::select('clas_name','id')->get();
        return view('trainees.showTrainees',compact('courses','clases'));
    }

    public function fetchTrainees(Request $request) {
        $query = User::with('course','clas')->select('id', 'firstname',
        DB::raw("COALESCE(secondname, '') as secondname"),
        DB::raw("COALESCE(lastname, '') as lastname"),
        DB::raw("COALESCE(clas_id, '') as clas_id"),
        DB::raw("COALESCE(course_id, '') as course_id"),
        'email','phonenumber','course_id','status','gender','clas_id')->where('role','Trainee') ->where('has_paid_reg_fee','Yes')->orderBy('created_at', 'desc');
    
        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('firstname', 'like', '%' . $request->search . '%')
                ->orWhere('secondname', 'like', '%' . $request->search . '%')
                ->orWhere('lastname', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
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

    public function addTrainee(Request $request){
        $user=new User;
        $user->firstname=$request->firstname;
        $user->secondname=$request->secondname;
        $user->lastname=$request->lastname;
        $user->phonenumber=$request->phonenumber;
        $user->email=$request->email;
        $user->role="Trainee";
        $user->has_paid_reg_fee=$request->has_paid_reg_fee;
        $user->gender=$request->gender;
        $user->course_id=$request->course_id;
        $user->clas_id=$request->clas_id;
        $user->password=123456;
        $save=$user->save();
        if ($save) {
            return redirect()->back()->with('success', 'Trainee created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create trainee.');
        }

    }




    public function updateTrainee(Request $request)
    {
       

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'firstname' => 'required|string|max:255',
            'email' => 'required|email|max:255' . $request->user_id,
        ]);


        $user = User::find($request->user_id);

        if ($user) {
            // Update user details
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->secondname = $request->secondname;
            $user->phonenumber = $request->phonenumber;
            $user->email = $request->email;
            $user->course_id = $request->update_course_id;
            $user->clas_id = $request->update_clas_id;
            $user->gender = $request->gender;
            $user->update();

            return response()->json(['success' => true, 'message' => 'User updated successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'User not found!'], 404);
   
    }




    public function traineeViewCourse(){
        if(Auth::check()&&Auth::user()->role=='Trainee'){
          $user=Auth::user();
          $course=$user->course;
          $modules=CourseModule::select('id','module_name','module_content')->where('course_id',$course->id)->get();
          return view('trainees.traineeViewCourse',compact('course','modules'));
        }
        return redirect()->route('login');
       
    }

    public function traineeViewNotes($id){
        $module=CourseModule::where('id',$id)->select('module_name')->first();
        $topics=Topic::with('coursemodule')->select('id','topic_name','topic_content')->where('module_id',$id)->get();
        return view('trainees.traineeViewNotes',compact('topics','module'));
    }

    public function traineeViewFeePayment(){
        if(Auth::check() && Auth::user()->role=='Trainee'){
            $user_id = Auth::user()->id; // Get the exam ID from query parameters
            $user=User::with('course')->find($user_id);
            $fees=Fee::where('user_id',$user_id)->get();
            $debit=$user->course->course_price;
            $credit=Fee::where('user_id',$user_id)->sum('amount_paid');
            $balance=$debit-$credit;
            return view('trainees.traineeViewFeePayment',compact('fees','user_id','user','debit','credit','balance'));
        }else{
            return redirect()->route('login');
        }

       
    }



    //SHOW TRAINEE ASSIGNMENT
    public function traineeViewAssignment(Request $request){
        if(Auth::check() && Auth::user()->role=='Trainee'){
            return view('trainees.traineeViewAssignment');
        }else{
            return redirect()->back();
        }
       
    }


    public function traineeFetchAssignments(Request $request){
        $clas_id=Auth::user()->clas_id;
        $user_id = Auth::user()->id; // Get the logged-in user ID
        $query = Exam::with('clas')->where('clas_id', $clas_id)->where('is_assignment','Yes')->select( 'id',  'exam_type',
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
        'created_at',
        'clas_id')->orderBy('created_at', 'desc');


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

      // Fetch student scores for each exam
      $users->getCollection()->transform(function ($exam) use ($user_id) {
        // Sum student scores for the logged-in user per exam
        $studentScore = DB::table('student_answers')
            ->where('exam_id', $exam->id)
            ->where('user_id', $user_id)
            ->sum('score');

            // Sum the total possible marks from the questions table
            $totalPossibleScore = DB::table('questions')
                ->where('exam_id', $exam->id)
                ->sum('question_mark');



                // Check if the student has answered any question
                    $hasAnswered = DB::table('student_answers')
                    ->where('exam_id', $exam->id)
                    ->where('user_id', $user_id)
                    ->exists(); // Returns true if the student has at least one answer

                // Set exam status based on whether the student has answered or not
                if ($hasAnswered) {
                    $exam->exam_status = "Attempted";
                    $exam->student_score = $studentScore;
                } else {
                    $exam->exam_status = "Pending";
                    $exam->student_score = "N/A";
                }


                // Calculate percentage score only if the student has attempted the exam
                $exam->percentage_score = ($hasAnswered && $totalPossibleScore > 0)
                ? round(($studentScore / $totalPossibleScore) * 30, 0) 
                : "N/A"; // Set to "N/A" if not attempted

                $exam->total_possible_score = $totalPossibleScore;

                return $exam;

             });

    
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


    public function traineeFetchAssignments2(Request $request){
        $clas_id=Auth::user()->clas_id;
        $query = Exam::with('clas')->where('clas_id', $clas_id)->where('is_assignment','Yes')->select( 'id',  'exam_type',
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
        'clas_id')->orderBy('created_at', 'desc');


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



    public function traineeViewCats(){
        if(Auth::check() && Auth::user()->role=='Trainee'){
            return view('trainees.traineeViewCats');
        }else{
            return redirect()->back();
        }
    }




    public function traineeFetchCats(Request $request){
        $clas_id=Auth::user()->clas_id;
        $user_id = Auth::user()->id; // Get the logged-in user ID
        $query = Exam::with('clas')->where('clas_id', $clas_id)->where('is_cat','Yes')->select( 'id',  'exam_type',
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
        'created_at',
        'clas_id')->orderBy('created_at', 'desc');


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

      // Fetch student scores for each exam
      $users->getCollection()->transform(function ($exam) use ($user_id) {
        // Sum student scores for the logged-in user per exam
        $studentScore = DB::table('student_answers')
            ->where('exam_id', $exam->id)
            ->where('user_id', $user_id)
            ->sum('score');

            // Sum the total possible marks from the questions table
            $totalPossibleScore = DB::table('questions')
                ->where('exam_id', $exam->id)
                ->sum('question_mark');



                // Check if the student has answered any question
                    $hasAnswered = DB::table('student_answers')
                    ->where('exam_id', $exam->id)
                    ->where('user_id', $user_id)
                    ->exists(); // Returns true if the student has at least one answer

                // Set exam status based on whether the student has answered or not
                if ($hasAnswered) {
                    $exam->exam_status = "Attempted";
                    $exam->student_score = $studentScore;
                } else {
                    $exam->exam_status = "Pending";
                    $exam->student_score = "N/A";
                }


                // Calculate percentage score only if the student has attempted the exam
                $exam->percentage_score = ($hasAnswered && $totalPossibleScore > 0)
                ? round(($studentScore / $totalPossibleScore) * 30, 0) 
                : "N/A"; // Set to "N/A" if not attempted

                $exam->total_possible_score = $totalPossibleScore;

                return $exam;

             });

    
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


 



    public function traineeViewFinalExam(){

        if(Auth::check() && Auth::user()->role=='Trainee'){
            return view('trainees.traineeViewFinalExam');
        }else{
            return redirect()->back();
        }

    }





    public function traineeFetchFinalExam(Request $request){
        $clas_id=Auth::user()->clas_id;
        $user_id = Auth::user()->id; // Get the logged-in user ID
        $query = Exam::with('clas')->where('clas_id', $clas_id)->where('is_final_exam','Yes')->select( 'id',  'exam_type',
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
        'created_at',
        'clas_id')->orderBy('created_at', 'desc');


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

      // Fetch student scores for each exam
      $users->getCollection()->transform(function ($exam) use ($user_id) {
        // Sum student scores for the logged-in user per exam
        $studentScore = DB::table('student_answers')
            ->where('exam_id', $exam->id)
            ->where('user_id', $user_id)
            ->sum('score');

            // Sum the total possible marks from the questions table
            $totalPossibleScore = DB::table('questions')
                ->where('exam_id', $exam->id)
                ->sum('question_mark');



                // Check if the student has answered any question
                    $hasAnswered = DB::table('student_answers')
                    ->where('exam_id', $exam->id)
                    ->where('user_id', $user_id)
                    ->exists(); // Returns true if the student has at least one answer

                // Set exam status based on whether the student has answered or not
                if ($hasAnswered) {
                    $exam->exam_status = "Attempted";
                    $exam->student_score = $studentScore;
                } else {
                    $exam->exam_status = "Pending";
                    $exam->student_score = "N/A";
                }


                // Calculate percentage score only if the student has attempted the exam
                $exam->percentage_score = ($hasAnswered && $totalPossibleScore > 0)
                ? round(($studentScore / $totalPossibleScore) * 30, 0) 
                : "N/A"; // Set to "N/A" if not attempted

                $exam->total_possible_score = $totalPossibleScore;

                return $exam;

             });

    
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




    public function traineeViewQuestions(Request $request){
        if(Auth::check()){
            if(Auth::user()->role=='Trainee'){
                $exam_id = $request->query('exam_id');
                $questions = Question::select('id','question_name','question_mark','question_answer','exam_id')->where('exam_id',$exam_id)->orderBy('created_at', 'desc');
                return view('trainees.traineeViewQuestions',compact('questions'));
            }else{
                
            }
        }else{
            return redirect()->route('login');
        }

       

    }

    public function fetchQuestionsForTrainee_old(Request $request,$exam_id){
        $user_id=Auth::user()->id;
        $query = Question::select('id','question_name','question_mark','question_answer','exam_id')->where('exam_id',$exam_id)->orderBy('created_at', 'ASC');

        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('question_name', 'like', '%' . $request->search . '%')
                ->orWhere('question_mark', 'like', '%' . $request->search . '%')
                ->orWhere('question_answer', 'like', '%' . $request->search . '%');
            });
        }
    
        // Get the number of records per page
        $perPage = $request->input('per_page', 1); // Default is 10
    
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
            'exam_id'=>$exam_id,
            'user_id'=>$user_id,
        ]);
    }





    public function fetchQuestionsForTrainee(Request $request, $exam_id) {
        $user_id = Auth::user()->id;
    
        $total_questions=count(Question::where('exam_id', $exam_id)->get());

        //Answered Questions
        $answered_questions = StudentAnswer::where('user_id', $user_id)
        ->where('exam_id', $exam_id)
        ->count();

        //Active Questions
        $active_questions=$total_questions-$answered_questions;
        //Total question marks
        $total_question_marks = Question::where('exam_id', $exam_id)->sum('question_mark');

        $total_student_score = StudentAnswer::where('user_id', $user_id)
        ->where('exam_id', $exam_id)
        ->sum('score');

        // Get question IDs that the student has already answered
        $answeredQuestionIds = StudentAnswer::where('user_id', $user_id)
            ->where('exam_id', $exam_id)
            ->pluck('question_id');
    
        /*
        $attempts = StudentAnswer::where('user_id', $user_id)
            ->where('exam_id', $exam_id)
            ->get();
         
        */
            $attempts = StudentAnswer::where('user_id', $user_id)
            ->where('exam_id', $exam_id)
            ->with(['user', 'question', 'exam']) // Include user, question, and exam details
            ->get();

        // Fetch only unanswered questions
        $query = Question::select('id', 'question_name', 'question_mark', 'question_answer', 'exam_id')
            ->where('exam_id', $exam_id)
            ->whereNotIn('id', $answeredQuestionIds) // Exclude answered questions
            ->orderBy('created_at', 'ASC');
    
        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('question_name', 'like', '%' . $request->search . '%')
                  ->orWhere('question_mark', 'like', '%' . $request->search . '%')
                  ->orWhere('question_answer', 'like', '%' . $request->search . '%');
            });
        }
    
        // Get the number of records per page
        $perPage = $request->input('per_page', 1); // Default is 1
        
        $users = $query->paginate($perPage);
    
        return response()->json([
            'users' => $users->items(),
            
            'pagination' => [
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
                'total' => $users->total(),
                'per_page' => $users->perPage(),
            ],
            //'total_users' => $users->total(),
            'total_users'=> $total_questions,
            'answered_questions'=>$answered_questions,
            'total_question_marks'=>$total_question_marks,
            'total_student_score'=>$total_student_score,
            'active_questions'=>$active_questions,
            'exam_id' => $exam_id,
            'user_id' => $user_id,
            'attempts' => $attempts, // Pass attempts data
        ]);
    }
    


    public function storeStudentAnswer(Request $request)
    {
        /*
        $request->validate([
            'user_id' => 'required|integer',
            'exam_id' => 'required|integer',
            'question_id' => 'required|integer',
            'selected_answer' => 'required|string',
            'question_mark' => 'required|integer'
        ]);*/
    
        // Get the correct answer from the database
        $question = Question::find($request->question_id);
        
        if (!$question) {
            return response()->json(['message' => 'Invalid question.'], 404);
        }
    
        // Award the question mark if correct, otherwise 0
        $is_correct = ($request->selected_answer === $question->question_answer);
        $score = $is_correct ? $request->question_mark : 0;
    
        // Save answer in student_answers table
        StudentAnswer::create([
            'user_id' => $request->user_id,
            'exam_id' => $request->exam_id,
            'question_id' => $request->question_id,
            'student_answer'=>$request->selected_answer,
            'score' => $score
        ]);
    
        return response()->json([
            'message' => 'Answer submitted successfully!',
            'correct' => $is_correct,
            'correct_answer' => $question->question_answer
        ]);
    }
    



    public function fetchFeeBalance(Request $request) {
        $coursePrice = auth()->user()->course->course_price;
        $feePaid=Fee::where('user_id',Auth::user()->id)->sum('amount_paid');
        $balance=$coursePrice-$feePaid;
        $payment=($coursePrice-$feePaid)*0.25;
        
        $endOfMonth = Carbon::now()->endOfMonth()->toDateString();
    
        // Check if the record exists
        if ($balance>0) {
            return response()->json([
                'balance' => $balance,
                'payment'=>$payment,
                'endOfMonth'=>$endOfMonth ,
            ]);
        }

    
        // If no record is found, return a default response (optional)
        return response()->json([
            'balance' =>0 ,
        ]);
    }




    public function showClassLink(){
        return view('trainees.showClassLink');
    }

    public function showClassNotes(){
        return view('trainees.showClassNotes');
    }




    public function showTraineeProfile($id)
        {
            $student = User::with('course')->findOrFail($id); // eager load course relationship

            // If you need fee information, you can also load it:
            $fees = Fee::where('user_id', $id)->get();

            return view('trainees.traineeProfile', compact('student', 'fees'));
        }



}
