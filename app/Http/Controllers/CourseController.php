<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //
    public function index(){
      return view('courses.adminManageCourses');
    }

    public function addCourse(Request $request){
        $save=Course::create($request->all());
        if($save){
            return redirect()->back()->with('success','Data saved succesfully');
        }else{
            return redirect()->back()->with('Failed','Could not saved');
        }
    }

    
    public function fetchCourses(Request $request) {
        $query = Course::select( 'id', 'course_name', 'course_level', 'course_duration','course_price','course_status','what_to_learn')->orderBy('created_at', 'desc');

        $suspended_courses = count(Course::where('course_status','Suspended')->get());
        $active_courses= count(Course::where('course_status','Active')->get());
      

        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('course_name', 'like', '%' . $request->search . '%')
                ->orWhere('course_level', 'like', '%' . $request->search . '%')
                ->orWhere('course_duration', 'like', '%' . $request->search . '%')
                ->orWhere('course_price', 'like', '%' . $request->search . '%');
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
            'all_courses' => $users->total(),
            'suspended'=> $suspended_courses,
            'active_courses'=>$active_courses,
           
        ]);
    }


    
    public function updateCourse(Request $request)
    {
       
        $validated = $request->validate([
            'course_id' =>'required|exists:courses,id',
            'course_name' =>'required|string|max:255',
            'course_level' =>'required|string|max:255',
            'course_duration' =>'required|max:255',
            'course_price' =>'required|max:255',
            'what_to_learn' => 'nullable|string', // Add validation for this field
        ]);


        $user = Course::find($request->course_id);

        if ($user) {
            // Update user details
            $user->course_name = $request->course_name;
            $user->course_level = $request->course_level;
            $user->course_duration = $request->course_duration;
            $user->course_price = $request->course_price;
            $user->what_to_learn = $request->what_to_learn;
            $user->course_status = $request->course_status;
            $user->update();

            return response()->json(['success' => true, 'message' => 'Course updated successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Course not found!'], 404);
   
    }





    public function deleteCourse(Request $request)
    {
       
       

        $user = Course::find($request->delete_course_id);

        if ($user) {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'Course deleted successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Course not found!'], 404);
   
    }



    
    public function suspendCourse(Request $request)
    {
       
       

        $user = Course::find($request->suspend_course_id);

        if ($user) {
            $user->update(['course_status'=>'Suspended']);
            return response()->json(['success' => true, 'message' => 'Course suspended successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Course not found!'], 404);
   
    }





}
