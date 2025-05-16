<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clas;
use App\Models\TimeTable;

class TimeTableController extends Controller
{
    //

    public function showTimeTable(){
        $clases=Clas::all();
        $timetables=TimeTable::with('clas')->get();
        return view('timetables.manageTimeTable',compact('clases','timetables'));
    }

    public function addTimeTable(Request $request){
     $create=TimeTable::create($request->all());
        if($create){
            return redirect()->back()->with('success','Data saved succesfully');
        }else{
            return redirect()->back()->with('Failed','Could not saved');
        }

    }

    public function updateTimeTable(Request $request){
        $update=TimeTable::where('id',$request->id)->update(
            [
               'clas_id'=>$request->clas_id,
               'time_table'=>$request->time_table,
            ]
           );

       
           if($update){
               return redirect()->back()->with('success','Data updated succesfully');
           }else{
               return redirect()->back()->with('Failed','Could update');
           }
   
       }




       public function deleteTimeTable(Request $request){
        $delete=TimeTable::where('id',$request->id)->delete();
           if($delete){
               return redirect()->back()->with('success','Data delete succesfully');
           }else{
               return redirect()->back()->with('Failed','Could delete');
           }
   
       }
}
