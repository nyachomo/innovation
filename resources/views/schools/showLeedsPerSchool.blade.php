@extends('layouts.master')
@section('content')

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
                <b>Total Students:</b> <span>{{$total_leeds}}</span>
                <b>School:</b> <span >{{$school->school_name}}</span>
                <a type="button" style="float:right" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addSchoolsModal"> <i class="uil-user-plus"></i>Add</a>
                <form>
                    <input type="text" class="form-control" name="school_id" value="{{$school_id}}" hidden="true">
                    <button type="submit" class="btn btn-secondary"><i class="fa fa-dowload" style="float:right !important"></i> Download</button>
                </form>
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
                                    <th>Email</th>
                                    <th>Student Phone</th>
                                    <th>Parent Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($leeds))
                                @foreach($leeds as $key=>$leed)
                                 <tr>
                                     <td>{{$key+1}}</td>
                                     <td>{{$leed->student_firstname}} {{$leed->student_lastname}}</td>
                                     <td>{{$leed->student_form}}</td>
                                     <td>{{$leed->student_email ?? 'NA'}}</td>
                                     <td>{{$leed->student_phone}}</td>
                                     <td>{{$leed->parent_phone}}</td>
                                     <td>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{$leed->id}}">
                                            <i class="fa fa-trash">Delete</i>
                                        </button>
                                     </td>
                                 </tr>

                                 
                                <!-- Add User modal -->
                                <div class="modal fade" id="deleteModal{{$leed->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h6 class="modal-title" id="standard-modalLabel"> Are You sure you want to delete this record ?</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                            </div>
                                            <form method="POST" action="{{route('adminDeleteLeed')}}">
                                                @csrf

                                                <div class="card-body" style="border:1px solid white">
                                                    <input type="text" class="form-control" name="delete_leed_id" value="{{$leed->id}}">
                                                </div>


                                            <div class="modal-footer justify-content-between" style="border:1px solid white">
                                                <button type="button" class="btn btn-danger rounded-pill"  data-bs-dismiss="modal">Close</button>
                                                <button type="submit"  class="btn btn-success rounded-pill">Delete</button>
                                            </div>
                                        </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                <!--end of modal-->

                                 @endforeach
                                @endif
                            </tbody>
                        
                        </table>                                           
                    </div> <!-- end preview-->
                
                </div> <!-- end tab-content-->
                
            </div> <!-- end card body-->

           
            <!--end of card-footer-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->





















@endsection
@section('scripts')
@endsection