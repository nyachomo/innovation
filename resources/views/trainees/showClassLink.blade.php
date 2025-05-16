@extends('layouts.master')
@section('content')
<?php
use App\Models\User;
use App\Models\TimeTable;
$user = Auth::user(); // Get the authenticated user

if (!empty($user) && !empty($user->clas_id)) {
    $course=User::with('course')->where('id',$user->id)->first();
    $link = TimeTable::with('clas')->where('clas_id', $user->clas_id)->first();
}

?>
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Class Links</a></li>
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                </ol>
            </div>
            <h4 class="page-title">Class Links</h4>
        </div>
    </div>
</div>
<!-- end page title --> 



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <p style="font-size:18px">
                     <b> Class:</b>    {{$link->clas->clas_name ?? 'NA'}}
                     <b>Course:</b>    {{$course->course->course_name ?? 'NA'}}
                <p>
            </div>
            
            <div class="card-body">
              
              <?php echo $link->time_table ?? 'There is no class link  for this class';?>
               
            </div>

        </div> 
    </div>
</div> 







@endsection
