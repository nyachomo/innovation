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
                <a type="button" style="float:right" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addTopicModal"> <i class="uil-user-plus"></i>Add</a>
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
                                    <th>Topic Name</th>
                                    <th>Topic Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($topics))
                                     @foreach($topics as $key=>$topic)
                                         <tr>
                                              <td>{{$key+1}}</td>
                                              <td>{{$topic->topic_name ?? 'NA'}}</td>
                                              <td><?php echo$topic->topic_content ?? 'NA'?></td>

                                              <td>
                                                        <!-- Default dropup button -->
                                                        <div class="btn-group dropdown">
                                                            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#"><center><b>More Action</b></center></a>
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#updateTopic{{$topic->id}}" ><i class="fa fa-edit text-success"></i> Edit</a>
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteTopic{{$topic->id}}" ><i class="fa fa-trash text-danger"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                </td>

                                         </tr>



                                        <!-- Add User modal -->
                                        <div id="updateTopic{{$topic->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i>Update Topic</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <form method="POST" action="{{route('updateTopics')}}">
                                                        @csrf
                                                    

                                                        <!-- /.card-header -->
                                                        <div class="card-body">

                                                        <input type="text" class="form-control" name="id" value="{{$topic->id}}">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>Topic Name</label>
                                                                <input type="text" name="topic_name" class="form-control" value="{{$topic->topic_name}}">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>Topic Content</label>
                                                                <textarea name="topic_content"><?php echo$topic->topic_content;?></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <label>Topic video content</label>
                                                                <input type="text" name="topic_video_link" class="form-control" value="{{$topic->topic_video_link}}">
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
                                         <div id="deleteTopic{{$topic->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i>Are you sure you want to delete this record</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                    </div>
                                                    <form method="POST" action="{{route('deleteTopics')}}">
                                                        @csrf
                                                    

                                                        <input type="text" class="form-control" name="id" value="{{$topic->id}}" hidden="true">
                                                       

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
<div id="addTopicModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Add New Topic</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" action="{{route('addTopics')}}">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">

                  <input type="text" class="form-control" name="module_id" value="{{$id}}" hidden="true">
                  <div class="row">
                      <div class="col-sm-12">
                          <label>Topic Name</label>
                          <input type="text" name="topic_name" class="form-control">
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-12">
                          <label>Topic Content</label>
                           <textarea name="topic_content"></textarea>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-sm-12">
                        <label>Topic video content</label>
                          <input type="text" name="topic_video_link" class="form-control">
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
<div id="deleteTopicModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"> Are You sure you want to delete this record ?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="deleteTopicForm">
                @csrf

                <div class="card-body" style="border:1px solid white">
                    <input type="text" class="form-control" name="delete_topic_id" id="delete_topic_id">
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










@endsection
@section('scripts')
<script>
    

    $(document).ready(function(){

          


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