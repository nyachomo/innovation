<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

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

    public function fetchSchools(Request $request) {
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


    
    public function updateSchools(Request $request)
    {
       
        $validated = $request->validate([
            'school_id' =>'required|exists:topics,id',
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


}
