<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leed;
use App\Models\School;
use App\Models\Course;
use App\Models\User;
use App\Models\Setting;
use Dompdf\Dompdf; // Import the Dompdf class
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class LeedController extends Controller
{
    //
    public function index(){
        $courses=Course::select('id','course_name')->get();
        $schools=School::select('id','school_name')->get();
        return view('leeds.adminManageLeeds',compact('schools','courses'));
    }

    public function teacherShowLeeds(){
        $courses=Course::select('id','course_name')->get();
        $schools=School::select('id','school_name')->get();
        return view('leeds.teacherManageLeeds',compact('schools','courses'));
    }

    public function addLeeds(Request $request){
        $save=Leed::create($request->all());
        if($save){
            return redirect()->back()->with('success','Data saved succesfully');
        }else{
            return redirect()->back()->with('Failed','Could not saved');
        }
    }




    public function teacherFetchLeeds2(Request $request) {
        if(Auth::check() && Auth()->user()->role=="High_school_teacher"){
                $query = Leed::with('school','course')->select( 'id',  'student_firstname',
                'student_lastname',
                'student_email',
                'student_phone',
                'student_gender',
                'student_school',
                'student_form',
                'comment',
                'year_data_captured',
                'parent_name',
                'parent_phone',
                'parent_email', 'school_id', 'course_id')->where(['school_id'=>Auth::user()->school_id])->get();


                // Apply search filter if provided
                if ($request->has('search') && !empty($request->search)) {
                    $query->where(function($q) use ($request) {
                        $q->where('topic_name', 'like', '%' . $request->search . '%')
                        ->orWhere('topic_content', 'like', '%' . $request->search . '%')
                        ->orWhere('topic_status', 'like', '%' . $request->search . '%');
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
    }


    public function teacherFetchLeeds(Request $request)
{
    if (Auth::check() && Auth()->user()->role == "High_school_teacher") {

        $query = Leed::with('school', 'course')
            ->select(
                'id',
                'student_firstname',
                'student_lastname',
                'student_email',
                'student_phone',
                'student_gender',
                'student_school',
                'student_form',
                'comment',
                'year_data_captured',
                'parent_name',
                'parent_phone',
                'parent_email',
                'school_id',
                'course_id'
            )
            ->where('school_id', Auth::user()->school_id); // ✅ No get() here

        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function ($q) use ($request) {
                $q->where('topic_name', 'like', '%' . $request->search . '%')
                    ->orWhere('topic_content', 'like', '%' . $request->search . '%')
                    ->orWhere('topic_status', 'like', '%' . $request->search . '%');
            });
        }

        $perPage = $request->input('per_page', 10);

        $users = $query->paginate($perPage); // ✅ Now this works

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
}



    public function fetchLeeds(Request $request) {
        $query = Leed::with('school','course')->select( 'id',  'student_firstname',
        'student_lastname',
        'student_email',
        'student_phone',
        'student_gender',
        'student_school',
        'student_form',
        'comment',
        'year_data_captured',
        'parent_name',
        'parent_phone',
        'parent_email', 'school_id', 'course_id')->orderBy('created_at', 'desc');


        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('topic_name', 'like', '%' . $request->search . '%')
                ->orWhere('topic_content', 'like', '%' . $request->search . '%')
                ->orWhere('topic_status', 'like', '%' . $request->search . '%');
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



    
    public function updateLeeds(Request $request)
    {
       
        $validated = $request->validate([
            'leed_id' =>'required|exists:leeds,id',
            'student_firstname' =>'string|max:255',
            'student_lastname' =>'string|max:255',
            'student_email' =>'email|max:255',
            'student_phone' =>'string|max:255',
            'student_gender' =>'string|max:255',
            'student_form' =>'string|max:255',
            'parent_name' =>'string|max:255',
            'parent_email' =>'email|max:255',
            'parent_phone' =>'string|max:255',
        ]);


        $user = Leed::find($request->leed_id);

        if ($user) {
            // Update user details
            $user->student_firstname = $request->student_firstname;
            $user->student_lastname = $request->student_lastname;
            $user->student_email = $request->student_email;

            $user->student_phone = $request->student_phone;
            $user->student_gender = $request->student_gender;
            $user->student_form = $request->student_form;
            $user->parent_name = $request->parent_name;
            $user->parent_email = $request->parent_email;
            $user->parent_phone = $request->parent_phone;
            $user->update();
            return response()->json(['success' => true, 'message' => 'Leed updated successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Leed not found!'], 404);
   
    }








    
    public function deleteLeeds(Request $request)
    {
       
        $user = Leed::find($request->delete_leed_id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'Leed deleted successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Leed not found!'], 404);
   
    }







    public function downloadShortCourseLetter($id){
        //GET NAME OF THE PERSON THAT LOGINS 
               
                $setting=Setting::latest()->first();
                $imagePath = public_path('images/logo/' . $setting->company_logo);
                $imageData = base64_encode(file_get_contents($imagePath));
                $imageSrc = 'data:image/jpeg;base64,' . $imageData;


                $imagePath2 = public_path('images/signature/hibrahim_signature.jpeg');
                $imageData2 = base64_encode(file_get_contents($imagePath2));
                $imageSrc2 = 'data:image/jpeg;base64,' . $imageData2;

                $imagePath3 = public_path('images/stamp/official_stamp.png');
                $imageData3 = base64_encode(file_get_contents($imagePath3));
                $imageSrc3 = 'data:image/jpeg;base64,' . $imageData3;


                // Fetch all records from the `fees` table
                $leed = Leed::with('school')->where('id',$id)
                ->select('student_firstname','student_lastname','student_phone','school_id','student_form')->first();
        
               

                // Load the view and pass the data
                $html = View::make('leeds.downloadShortCourseLetter', compact('imageSrc', 'leed','imageSrc2','imageSrc3'))->render();
                //$html = View::make('fees.studentReceipt', compact(['imageSrc' => $imageSrc,'fees'=> $fees]))->render();

                // Convert the view to a PDF
                $dompdf = new \Dompdf\Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // Stream or download the PDF
                return response($dompdf->output(), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="Receipt.pdf"',
                ]);





    }



}
