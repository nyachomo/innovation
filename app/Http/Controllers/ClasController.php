<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clas;

class ClasController extends Controller
{
    //

    public function index(){
        return view('clas.adminManageClas');
    }

    public function addClas(Request $request){
        $save=Clas::create($request->all());
        if($save){
            return redirect()->back()->with('success','Data saved succesfully');
        }else{
            return redirect()->back()->with('Failed','Could not saved');
        }
    }

    public function fetchClases(Request $request) {
        $query = Clas::select( 'id', 'clas_name','clas_status' )->orderBy('created_at', 'desc');


        // Apply search filter if provided
        if ($request->has('search') && !empty($request->search)) {
            $query->where(function($q) use ($request) {
                $q->where('clas_name', 'like', '%' . $request->search . '%')
                ->orWhere('clas_status', 'like', '%' . $request->search . '%');
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


    
    public function updateClas(Request $request)
    {
       
        $validated = $request->validate([
            'clas_id' =>'required|exists:clas,id',
            'clas_name' =>'required|string|max:255',
        ]);


        $user = Clas::find($request->clas_id);

        if ($user) {
            // Update user details
            $user->clas_name = $request->clas_name;
            $user->update();
            return response()->json(['success' => true, 'message' => 'Clas updated successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'Clas not found!'], 404);
   
    }








    
    public function deleteClas(Request $request)
    {
       
        $user = Clas::find($request->delete_clas_id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'Class deleted successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Class not found!'], 404);
   
    }


    public function suspendClas(Request $request)
    {
       
        $user = Clas::find($request->suspend_clas_id);
        if ($user) {
            $user->update(['clas_status'=>'Suspended']);
            return response()->json(['success' => true, 'message' => 'Class suspended successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Class not found!'], 404);
   
    }




}
