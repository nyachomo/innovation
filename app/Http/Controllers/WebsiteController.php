<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class WebsiteController extends Controller
{
    //

    public function about_us(){
        return view('about_us');
    }

    public function all_courses(){
        return view("all_courses");
    }

    public function apply(){
        return view("apply");
    }

    public function dataScience(){
          return view('pages.data_science');
    }

    public function androidApplication(){
        return view('pages.android_application');
    }

    public function webApplication(){
        return view('pages.webApplication');
    }

    public function digitalMarketing(){
        return view('pages.digitalMarketing');
    }

    public function cyberSecurity(){
        return view('pages.cyberSecurity');
    }

    public function graphicDesign(){
        return view('pages.graphicDesign');
    }

    public function softwareEngineering(){
        return view('pages.softwareEngineering');
    }

    public function dataAnalysis(){
        return view('pages.dataAnalysis');
    }

    public function aboutUs (){
        return view('pages.aboutUs');
    }

    public function corporateTraining(){
        return view('pages.corporateTraining');
    }

    public function industrialAttachment(){
        return view('pages.industrialAttachment');
    }

    public function ictHub(){
        return view ('pages.ictHub');
    }

    public function contactUs(){
        return view('pages.contactUs');
    }

    public function enrol(){
        $courses=Course::where('course_status','Active')->select('course_name')->get();
        return view('pages.enrol',compact('courses'));
    }
}
