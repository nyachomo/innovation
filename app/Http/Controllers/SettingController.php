<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    //

    public function ShowSettings(){
        $companyDetail=Setting::first();
        return view('settings.adminManageSettings',compact('companyDetail'));

    }

    public function updateCompanyLogo(Request $request){
        if($request->hasfile('company_logo')){

            $file=$request->file('company_logo');
            $extension=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $file->move('images/logo/',$fileName);
 

            $id=$request->update_id;
            $setting=Setting::find($id);
            $setting->company_logo=$fileName;
            $update=$setting->update();
            if($update){
                return redirect()->back()->with('success','Logo Updated  succesfully');
            }else{
                return redirect()->back()->with('error','Could not save');
            }
        }else{
            return redirect()->back()->with('error','No Image Selected');
        }
    }

    public function updateCompanyDetails(Request $request){
        $id=$request->id;
        $update=Setting::find($id)->update($request->all());
        if($update){
            return redirect()->back()->with('success','Company details updated succesfully');
        }else{
            return redirect()->back()->with('error','Could not update');
        }
    }

    




    public function fetchCompanyDetails(Request $request) {
        // Assuming you have one row of company settings
        $setting = Setting::first();
    
        // Check if the record exists
        if ($setting) {
            return response()->json([
                'company_details_status' => $setting->company_details_status,
                'company_logo_status' => $setting->company_logo_status,
            ]);
        }
    
        // If no record is found, return a default response (optional)
        return response()->json([
            'company_details_status' => 0,
            'company_logo_status' => 0,
        ]);
    }





    
    public function updatecompanySettings(Request $request){

        if($request->hasfile('update_company_logo')){

            $file=$request->file('update_company_logo');
            $extension=$file->getClientOriginalExtension();
            $fileName=time().'.'.$extension;
            $file->move('images/logo/',$fileName);

            $id=$request->update_company_details_id;
            $setting=Setting::find($id);
           
            $setting->company_name=$request->update_company_name;
            $setting->company_motto=$request->update_company_motto;
            $setting->company_vission=$request->update_company_vission;
            $setting->company_mission=$request->update_company_mission;
            $setting->company_website=$request->update_company_website;
            $setting->company_address=$request->update_company_address;
            $setting->company_facebook=$request->update_company_facebook;
            $setting->company_twitter=$request->update_company_twitter;
            $setting->company_instagram=$request->update_company_instagram;
            $setting->company_linkedin=$request->update_company_linkedin;
            $setting->company_skype=$request->update_company_skype;
            $setting->company_github=$request->update_company_github;
            $setting->company_details_status=2;
            $setting->company_logo_status=2;
            $setting->company_logo=$fileName;
            $save=$setting->update();

            if($save){
                return redirect()->back()->with('success',' Data updated successsfully'); 
            }else{
                return redirect()->back()->with('error',' Could not update',); 
            }

        }
    }



}
