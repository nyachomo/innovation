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
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('showExams')}}">Assignments</a></li>
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                </ol>
            </div>
            <h4 class="page-title">Questions</h4>
        </div>
    </div>
</div>
<!-- end page title --> 


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
                Total Modules: <span id="total-users">0</span>
                <a type="button" style="float:right" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addModule"> <i class="uil-user-plus"></i>Add New Timetable</a>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-1" style="padding-top:4px">
                         <label for="example-select" class="form-label" style="float:right;">Show</label>
                    </div>
                    <div class="col-sm-2">
                       
                       
                    <select class="form-select" id="select">
                        <option value="5">5</option>
                        <option value="10" selected>10</option>
                        <option value="15">15</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                    </select>



                    </div>

                    <div class="col-sm-6"></div>

                    <div class="col-sm-1" style="padding-top:6px">
                         <label for="example-select" class="form-label" style="float:right;">Search</label>
                    </div>

                    <div class="col-sm-2">
                          <input type="text" id="search" name="search" class="form-control" placeholder="Search users...">
                    </div>

                </div>
                <div class="tab-content">
                    <div class="tab-pane show active">
                        <table id="datatable-buttons" >
                        <table id="table1" class="table table-sm table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>class</th>
                                    <th>Date</th>
                                    <th>Video Link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @if(!empty($classNotes))
                                  @foreach($classNotes as $key=>$classNote)
                                     <tr>
                                          <td>{{$key+1}}</td>
                                          <td>{{$classNote->clas->clas_name}}</td>
                                          <td>{{$classNote->date}}</td>
                                         
                                          <td>{{$classNote->video_link}}</td>
                                          <td>
                                            <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateTimeTable{{$classNote->id}}">
                                                <i class="fa fa-edit"></i> View/Edit
                                            </button>

                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTimeTable{{$classNote->id}}">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>

                                          </td>
                                     </tr>




                                        <!-- Add User modal -->
                                            <div id="updateTimeTable{{$classNote->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Update Class Notes</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <form method="post" action="{{route('updateClassNotes')}}">
                                                            @csrf
                                                        

                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                            
                                                                 <input type="text" name="id" value="{{$classNote->id}}" class="form-control">
                                                                <div class="row">

                                                                    <div class="col-sm-12">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Class<sup>*</sup></label>
                                                                            <select  name="clas_id" class="form-control" required>
                                                                                <option value="{{$classNote->clas_id}}">{{$classNote->clas->clas_name}}</option>
                                                                                @if(!empty($clases))
                                                                                @foreach($clases as $key=>$clas)
                                                                                    <option value="{{$clas->id}}">{{$clas->clas_name}}</option>
                                                                                @endforeach
                                                                                @endif
                                                                            </select>
                                                                        
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                                <div class="row">

                                                                    <div class="col-sm-12">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Date<sup>*</sup></label>
                                                                            <input type="date" name="date" value="{{$classNote->date}}" class="form-control">
        
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                                <div class="row">

                                                                    <div class="col-sm-12">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Notes<sup>*</sup></label>
                                                                            <textarea name="notes" class="form-control">{{$classNote->notes}}</textarea>
                                                                            
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                                <div class="row">

                                                                    <div class="col-sm-12">
                                                                        <!-- text input -->
                                                                        <div class="form-group">
                                                                            <label>Video Link<sup>*</sup></label>
                                                                             <input type="text" name="video_link" class="form-control" value="{{$classNote->video_link}}">
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                            

                                                            </div>
                                                            <!-- /.card-body -->


                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-danger rounded-pill"  data-bs-dismiss="modal">Close</button>
                                                            <button type="submit"  class="btn btn-success rounded-pill">Save</button>
                                                        </div>
                                                    </form>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div>
                                        <!--end of modal-->


                                         <!-- Add User modal -->
                                         <div id="deleteTimeTable{{$classNote->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Are you sure you want to delete this record ?</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <form method="post" action="{{route('deleteClassNotes')}}">
                                                            @csrf
                                                        

                                                            <!-- /.card-header -->
                                                            <div class="card-body">
                                                                 <input type="text" name="id" value="{{$classNote->id}}" class="form-control">
                                                            </div>
                                                            <!-- /.card-body -->


                                                        <div class="modal-footer justify-content-between">
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








<!-- Add User modal -->
<div id="addModule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Add Timetable</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="post" action="{{route('addClassNotes')}}">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">
                   
                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Class<sup>*</sup></label>
                                <select  name="clas_id" class="form-control" required>
                                    <option value="">Select</option>
                                    @if(!empty($clases))
                                       @foreach($clases as $key=>$clas)
                                         <option value="{{$clas->id}}">{{$clas->clas_name}}</option>
                                       @endforeach
                                    @endif
                                </select>
                               
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Date<sup>*</sup></label>
                                <input type="date" name="date" class="form-control">
                               
                               
                            </div>
                        </div>



                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Notes<sup>*</sup></label>
                                <textarea name="notes" class="form-control"></textarea>
                                
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Video Links<sup>*</sup></label>
                                <textarea name="video_link" class="form-control"></textarea>
                                
                            </div>
                        </div>

                    </div>


                   

                </div>
                 <!-- /.card-body -->


            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger rounded-pill"  data-bs-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-success rounded-pill">Save</button>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--end of modal-->




@endsection
