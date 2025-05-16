<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\School;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class HighSchoolTeacherController extends Controller
{
    //

    
    public function fetchHighStudents1(Request $request) {

        if(Auth::check() && Auth::user()->role="High_school_teacher"){
           
         

        // Query users with school relationship
        $query = User::with(['school','course'])
            ->select('users.id', 'users.firstname',
                DB::raw("COALESCE(users.secondname, '') as secondname"),
                DB::raw("COALESCE(users.lastname, '') as lastname"),
                'users.email', 'users.phonenumber', 'users.role', 
                'users.status', 'users.gender', 'users.school_id'
            )

            ->where('role','Trainee')
            ->where('school_id',Auth::user()->school_id)
            ->leftJoin('schools', 'users.school_id', '=', 'schools.id') // Join schools table
            ->orderBy('users.created_at', 'desc');
    
        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('users.firstname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.secondname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                    ->orWhere('users.email', 'like', '%' . $request->search . '%')
                    ->orWhere('schools.school_name', 'like', '%' . $request->search . '%'); // ✅ Search by school name
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


    public function ViewTraineeProfile(Request $request){

        $student_id = $request->query('student_id'); // Get the exam ID from query parameters

        return view('trainees.traineeProfile',compact('student_id'));

    }


    public function fetchHighStudents(Request $request) {

        if(Auth::check() && Auth::user()->role=="High_school_teacher"){
    
            // Query users with school and course relationships
            $query = User::with(['school', 'course'])
                ->select(
                    'users.id', 
                    'users.firstname',
                    DB::raw("COALESCE(users.secondname, '') as secondname"),
                    DB::raw("COALESCE(users.lastname, '') as lastname"),
                    'users.email', 
                    'users.phonenumber', 
                    'users.role', 
                    'users.status', 
                    'users.gender', 
                    'users.school_id',
                    // Add COALESCE for school name and course name
                    DB::raw("COALESCE(schools.school_name, 'NA') as school_name"),
                    DB::raw("COALESCE(courses.course_name, 'NA') as course_name")
                )
                ->where('role', 'Trainee')
                ->where('school_id', Auth::user()->school_id)
                ->leftJoin('schools', 'users.school_id', '=', 'schools.id') // Join schools table
                ->leftJoin('courses', 'users.course_id', '=', 'courses.id') // Join courses table (assuming there's a `course_id` in `users`)
                ->orderBy('users.created_at', 'desc');
    
            // Apply search filter if provided
            if ($request->has('search') && !empty($request->search)) {
                $query->where(function($q) use ($request) {
                    $q->where('users.firstname', 'like', '%' . $request->search . '%')
                        ->orWhere('users.secondname', 'like', '%' . $request->search . '%')
                        ->orWhere('users.lastname', 'like', '%' . $request->search . '%')
                        ->orWhere('users.email', 'like', '%' . $request->search . '%')
                        ->orWhere('courses.course_name', 'like', '%' . $request->search . '%');
                });
            }
    
            // Get the number of records per page
            $perPage = $request->input('per_page', 20); // Default is 10
    
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
    

}
