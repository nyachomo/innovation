<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clas;
use App\Models\ClassNotes;


class ClassNotesController extends Controller
{
    //

    public function showClassNotes(){
        $clases=Clas::all();
        $classNotes=ClassNotes::with('clas')->get();
        return view('classNotes.manageClassNotes',compact('clases','classNotes'));
    }

    public function addClassNotes(Request $request){
        $create=ClassNotes::create($request->all());
           if($create){
               return redirect()->back()->with('success','Data saved succesfully');
           }else{
               return redirect()->back()->with('Failed','Could not saved');
           }
   
       }
   
       public function updateClassNotes(Request $request){
           $update=ClassNotes::where('id',$request->id)->update(
                [
                    'clas_id'=>$request->clas_id,
                    'date'=>$request->date,
                    'notes'=>$request->notes,
                    'video_link'=>$request->video_link,
                ]
              );
   
          
              if($update){
                  return redirect()->back()->with('success','Data updated succesfully');
              }else{
                  return redirect()->back()->with('Failed','Could update');
              }
      
          }
   
   
   
   
          public function deleteClassNotes(Request $request){
           $delete=ClassNotes::where('id',$request->id)->delete();
              if($delete){
                  return redirect()->back()->with('success','Data delete succesfully');
              }else{
                  return redirect()->back()->with('Failed','Could delete');
              }
      
          }


}
