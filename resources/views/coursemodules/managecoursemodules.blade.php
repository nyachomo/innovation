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
                <a type="button" style="float:right" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addModule"> <i class="uil-user-plus"></i>Add New Module</a>
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
                                    <th>Name</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                             <tbody>
                                @if(!empty($modules))
                                   @foreach($modules as $key=>$module)
                                       <tr>
                                           <td>{{$key+1}}</td>
                                           <td>{{$module->module_name}}</td>
                                           <td><?php echo$module->module_content?></td>
                                           <td>

                                                <!-- Default dropup button -->
                                                <div class="btn-group dropdown">
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#"><center><b>More Action</b></center></a>
                                                        <a class="dropdown-item text-success" href="#" data-bs-toggle="modal" data-bs-target="#updateModule{{$module->id}}" ><i class="fa fa-edit"></i> Edit</a>
                                                        <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#deleteModule{{$module->id}}" ><i class="fa fa-trash"></i> Delete</a>
                                                        <a class="dropdown-item text-info" href="{{ url('/course-modules/fetch-topics/' . $module->id) }}"><i class="fa fa-bars" aria-hidden="true"></i>Manage Notes</a>
                                                    </div>
                                                </div>
                                           </td>
                                       </tr>

                                        <!-- Add User modal -->
                                        <div id="updateModule{{$module->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Update Module</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <form method="post" action="{{route('updateModule')}}">
                                                        @csrf
                                                    

                                                        <!-- /.card-header -->
                                                        <div class="card-body">
                                                        <input type="text" name="id" class="form-control" value="{{$module->id}}" hidden="true">
                                                            <div class="row">

                                                                <div class="col-sm-12">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>Module Name<sup>*</sup></label>
                                                                        <input type="text" class="form-control" name="module_name" value="{{$module->module_name}}" required>
                                                                    </div>
                                                                </div>

                                                            </div>


                                                            <div class="row">

                                                                <div class="col-sm-12">
                                                                    <!-- text input -->
                                                                    <div class="form-group">
                                                                        <label>What to Learn<sup>*</sup></label>
                                                                        <textarea name="module_content"><?php echo$module->module_content?></textarea>
                                                                        
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
                                        <div id="deleteModule{{$module->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Are you sure you want to delete this record</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <form method="post" action="{{route('deleteModule')}}">
                                                        @csrf
                                                    
                                                        <input type="text" name="id" class="form-control" value="{{$module->id}}" hidden="true">
                                                        

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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Add New Module</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="post" action="{{route('addModule')}}">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">
                <input type="text" name="course_id" class="form-control" value="{{$course_id}}" hidden="true">
                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Module Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="module_name" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>What to Learn<sup>*</sup></label>
                                <textarea name="module_content"></textarea>
                                
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
@section('scripts')

<script>
    

    $(document).ready(function(){

        // Get the exam_id from the URL query parameters
        const urlParams = new URLSearchParams(window.location.search);
            const course_id = urlParams.get('course_id');

            // Fetch questions for this exam
            if (course_id) {
                fetchUsers(course_id);
            }


            // Automatically hide success and error messages after 5 seconds
            setTimeout(() => {
                const successAlert = document.getElementById('success-alert');
                if (successAlert) {
                    successAlert.style.transition = "opacity 0.5s";
                    successAlert.style.opacity = "0";
                    setTimeout(() => successAlert.remove(), 500); // Fully remove the element after fade-out
                }
                
                const errorAlert = document.getElementById('error-alert');
                if (errorAlert) {
                    errorAlert.style.transition = "opacity 0.5s";
                    errorAlert.style.opacity = "0";
                    setTimeout(() => errorAlert.remove(), 500);
                }
            }, 5000); // 5000 milliseconds = 5 seconds






            function displaySuccessMessage(message) {
                let successMessage = `
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;

                // Append message to a container (e.g., #message-container)
                $('#message-container').html(successMessage);

                // Automatically remove the message after 5 seconds
                setTimeout(() => {
                    $('.alert').alert('close');
                }, 5000);
            }

});



</script>
@endsection