<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Clas;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{
    //

    public function index(){
        $clas=Clas::all();
        return view('applicants.showApplicants',compact('clas'));
    }



    public function fetchApplicants(Request $request) {
        $query = User::with('course',)->select('id', 'firstname',
        DB::raw("COALESCE(secondname, '') as secondname"),
        DB::raw("COALESCE(lastname, '') as lastname"),
        DB::raw("COALESCE(course_id, '') as course_id"),
        'email','phonenumber','course_id','status','gender',)
        ->where('role','Trainee')
        ->where('has_paid_reg_fee','No')
        ->orderBy('created_at', 'desc');
    
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


    public function markedAsPaidRegFee(Request $request){


        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);


        $user = User::find($request->user_id);

        if ($user) {
            // Update user details
            $user->has_paid_reg_fee = $request->has_paid_reg_fee;
            $user->date_paid_reg_fee = $request->date_paid_reg_fee;
            $user->reg_fee_ref_no=$request->reg_fee_ref_no;
            $user->clas_id=$request->clas_id;
            $user->update();

            return response()->json(['success' => true, 'message' => 'User updated successfully!']);
        }

        return response()->json(['success' => false, 'message' => 'User not found!'], 404);

    }
}
