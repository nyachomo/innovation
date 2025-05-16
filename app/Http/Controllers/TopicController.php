<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    //

    public function index(){
        return view('topics.adminManageTopics');
    }

    public function addTopics(Request $request){
        $save=Topic::create($request->all());
        if($save){
            return redirect()->back()->with('success','Data saved succesfully');
        }else{
            return redirect()->back()->with('Failed','Could not saved');
        }
    }





    public function fetchTopics(Request $request,$module_id) {
        $query = Topic::select( 'id', 'topic_name','topic_content','topic_status','topic_video_link' )->where('module_id',$module_id)->orderBy('created_at', 'desc');


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


    
    public function updateTopics(Request $request)
    {
       
       

        $user = Topic::find($request->id);

        if ($user) {
            // Update user details
            $user->topic_name = $request->topic_name;
            $user->topic_content =$request->topic_content;
            $user->topic_video_link =$request->update_topic_video_link;
            $update=$user->update();
            if($update){
                return redirect()->back()->with('success','Data updated succesfully');
                }else{
                    return redirect()->back()->with('Failed','Could not  update');
                }
        }

    }








    
    public function deleteTopics(Request $request)
    {
       
        $user = Topic::find($request->id);
        if ($user) {
            $delete=$user->delete();
            if($delete){
                return redirect()->back()->with('success','Data deleted succesfully');
                }else{
                    return redirect()->back()->with('Failed','Could not  delete');
                }
        }
       
    }


    public function suspendTopics(Request $request)
    {
       
        $user = Topic::find($request->suspend_topic_id);
        if ($user) {
            $user->update(['topic_status'=>'Suspended']);
            return response()->json(['success' => true, 'message' => 'Topic suspended successfully!']);
        }
        return response()->json(['success' => false, 'message' => 'Topic not found!'], 404);
   
    }
}
