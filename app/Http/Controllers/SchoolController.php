<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Leed;
use App\Models\Course;
use App\Models\User;
use App\Models\Setting;
use Dompdf\Dompdf; // Import the Dompdf class
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;


class SchoolController extends Controller
{
    //

    public function index(){
        return view('schools.adminManageSchools');
    }

    public function addSchools(Request $request){
        $save=School::create($request->all());
        if($save){
            return redirect()->back()->with('success','Data saved succesfully');
        }else{
            return redirect()->back()->with('Failed','Could not saved');
        }
    }

    public function fetchSchools_old(Request $request) {
        $query = School::select( 'id', 'school_name','school_location','school_status')->orderBy('created_at', 'desc');
        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('school_name', 'like', '%' . $request->search . '%')
                ->orWhere('school_location', 'like', '%' . $request->search . '%')
                ->orWhere('school_status', 'like', '%' . $request->search . '%');
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



    public function fetchSchools(Request $request)
   {
        $query = School::withCount('leeds')
            ->select('id', 'school_name', 'school_location', 'school_status')
            ->orderBy('created_at', 'desc');

        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('school_name', 'like', '%' . $request->search . '%')
                ->orWhere('school_location', 'like', '%' . $request->search . '%')
                ->orWhere('school_status', 'like', '%' . $request->search . '%');
            });
        }

        $perPage = $request->input('per_page', 10);

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



    
    public function updateSchools(Request $request)
    {
       
        $validated = $request->validate([
            'school_id' =>'required|exists:schools,id',
            'school_name' =>'string|max:255',
            'school_location' =>'string|max:255',
        ]);


        $user = School::find($request->school_id);

        if ($user) {
            // Update user details
            $user->school_name = $request->school_name;
            $user->school_location = $request->school_location;
            $user->update();
            return response()->json(['success' => true, 'message' => 'School updated successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'School not found!'], 404);
   
    }








    
    public function deleteSchools(Request $request)
    {
       
        $user = School::find($request->delete_school_id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'School deleted successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'School not found!'], 404);
   
    }


    public function suspendSchools(Request $request)
    {
       
        $user = School::find($request->suspend_school_id);
        if ($user) {
            $user->update(['school_status'=>'Suspended']);
            return response()->json(['success' => true, 'message' => 'School suspended successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'School not found!'], 404);
   
    }


    public function showLeedsPerSchool(Request $request){
      
        $school_id = $request->query('school_id'); // Get the exam ID from query parameters
        $leeds = Leed::with('school', 'course')
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
        ->where('school_id',$school_id)->get();
        $total_leeds=$leeds->count();
        $school=School::where('id',$school_id)->first();

        return view('schools.showLeedsPerSchool',compact('leeds','school_id','total_leeds','school'));


    }



    public function downloadLeedsPerSchool(Request $request){
                //GET NAME OF THE PERSON THAT LOGINS 
                $school_id = $request->query('school_id'); // Get the exam ID from query parameters
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
                $leeds = Leed::with('school', 'course')
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
                ->where('school_id',$school_id)->get();
                
                $total_students=$leeds->count();
                $school=School::where('id',$school_id)->first();
               

                // Load the view and pass the data
                $html = View::make('schools.downloadLeedsPerSchool', compact('imageSrc', 'leeds','imageSrc2','imageSrc3','total_students','school'))->render();
                //$html = View::make('fees.studentReceipt', compact(['imageSrc' => $imageSrc,'fees'=> $fees]))->render();

                // Convert the view to a PDF
                $dompdf = new \Dompdf\Dompdf();
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();

                // Stream or download the PDF
                return response($dompdf->output(), 200, [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'attachment; filename="' . $school->school_name . '_students_Partial_scholarship.pdf"',
                ]);





    }

}
