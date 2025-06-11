@extends('layouts.master')
@section('content')

<style>

#pagination-controls {
    display: flex;
    justify-content: right;
    align-items: right;
    margin-top: -2px;
    padding-right:50px;
    padding-top:-500px;
    padding-bottom:10px;
    gap: 10px; /* Spacing between buttons */
  }

     #pagination-controls button {
        background-color: #007bff; /* Bootstrap primary color */
        color: white;
        border: none;
        border-radius: 50px;
        padding: 2px 10px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
  }

  #pagination-controls .active {
    background-color: #28a745; /* Green for active page */
  }
</style>
<!--<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                  <h4 class="page-title">Manage Users</h4>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>-->



<div id="response"></div>


@if (session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div id="error-alert"  class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('error') }}
    </div>
@endif




<div id="message-container" class="mt-3"></div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <center><h3> {{$school->school_name ?? 'NA'}} ({{$total_leeds ?? 'NA'}} Enrolled)</h3></center>
            
                
                <!--<a type="button" style="float:right" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addSchoolsModal"> <i class="fa fa-plus"></i>ADD NEW SCHOOL</a>-->
            </div>
            <div class="card-body">

                <div class="tab-content">
                    <div class="tab-pane show active">
                        <table id="datatable-buttons" >
                        <table id="table1" class="table table-sm table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Class</th>
                                    <th>School</th>
                                    <th>Student Contact</th>
                                    <th>Parent Contact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($leeds))
                                  @foreach($leeds as $key=>$leed)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$leed->student_firstname}} {{$leed->student_lastname}}</td>
                                        <td>{{$leed->student_form ?? 'NA'}}</td>
                                        <td>{{$leed->school->school_name ?? 'NA'}}</td>
                                        <td>{{$leed->student_phone  ?? 'NA'}}</td>
                                        <td>{{$leed->parent_phone ?? 'NA'}}</td>
                                        <td>
                                            <span class="badge bg-success">Send mail</span>
                                            <span class="badge bg-secondary">Send sms</span>
                                            <span class="badge bg-info"><i class="fa fa-download"></i> Scholarshi Letter</span>
                                        </td>
                                    </tr>
                                  @endforeach
                                @endif
                            </tbody>
                        
                           
                        </table>                                           
                    </div> <!-- end preview-->
                
                </div> <!-- end tab-content-->
                
            </div> <!-- end card body-->

           
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->












@endsection
@section('scripts')

@endsection