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
                                    <th>Question </th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                            <tbody id="table1"></tbody>
                     
                            <tbody id="table2"></tbody>
                            
                        </table>                                           
                    </div> <!-- end preview-->
                
                </div> <!-- end tab-content-->
                
            </div> <!-- end card body-->

            <!--card-footer-->
             <div id="pagination-controls" style="float:right"></div>

            



            <!--end of card-footer-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->








<!-- Add User modal -->
<div id="addModule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
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
                                <label>Topic Content<sup>*</sup></label>
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




            function fetchUsers(course_id,page = 1, search = '', perPage = 10) {
                $.ajax({
                    type: 'GET',
                    //url: "{{route('adminManageQuestions')}}",
                    //url: "{{ url('questions/questions') }}/" + exam_id, 
                    url: "{{ route('fetchModules', ['course_id' => '__course_id__']) }}".replace('__course_id__', course_id),  // Use named route
                    data: { page: page, search: search, per_page: perPage },
                    dataType: "json",
                    success: function(response) {
                        // Update total users
                        $('#total-users').text(response.total_users);

                        // Clear and repopulate the table
                        $('tbody').html("");
                        $.each(response.users, function(key, item) {
                            const baseUrl = "{{ route('adminManageNotes') }}";

                            $('#table1').append(
                                '<tr>\
                                    <td>' + (key + 1) + '</td>\
                                    <td>' + item.module_name + '</td>\
                                    <td>' + item.module_content + '</td>\
                                <td>\
                                        <div class="dropdown">\
                                            <button class="btn btn-success btn-sm rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">More Actions</button>\
                                            <ul class="dropdown-menu">\
                                                <li><a class="dropdown-item updateBtn" href="#" \
                                                    data-id="' + item.id + '" \
                                                    data-module_name="' + item.module_name + '" \
                                                    data-module_content="' + item.module_content + '" ><i class="fa fa-edit text-success"></i> Update</a></li>\
                                                <li><a  class="dropdown-item deleteBtn" href="#" value="' + item.id + '"><i class="fa fa-trash text-danger"></i> Delete</a></li>\
                                                <li><a class="dropdown-item viewQuestionsBtn" href="' + baseUrl + '?module_id=' + item.id + '" target="_blank">View Modules</a></li>\
                                            </ul>\
                                        </div>\
                                    </td>\
                                </tr>'
                            );
                        });

                        // Render pagination
                        renderPagination(response.pagination, search, perPage);
                        // Attach event listener to Update button
                        $('.deleteBtn').on('click', function() {
                            const delete_question_id = $(this).attr('value');
                            // Populate modal fields
                            $('#delete_question_id').val(delete_question_id);
                            // Show the modal
                            $('#deleteQuestionModal').modal('show');
                        });


                        // Attach event listener to Update button
                        $('.updateBtn').on('click', function() {
                            const module_id = $(this).data('id');
                            const module_name = $(this).data('module_name');
                            const module_content = $(this).data('module_content');

                            // Populate modal fields
                            $('#module_id').val(module_id);
                            $('#module_name').val(module_name);
                            $('#module_content').val(module_content);


                            // Set TinyMCE content for #what_to_learn
                            if (tinymce.get('module_content')) {
                                tinymce.get('module_content').setContent(module_content || '');
                            }

                        

                            // Show the modal
                            $('#updateCourseModal').modal('show');
                        });


                        


                    }
                });
            }



            $('#updateCourseForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                if (tinymce.get('module_content')) {
                    tinymce.get('module_content').save();
                }
                
                const formData = {
                    module_id: $('#module_id').val(),
                    module_name: $('#module_name').val(),
                    module_content: $('#module_content').val(),
                    _token: "{{ csrf_token() }}" // Include CSRF token for security
                };

                

                $.ajax({
                    type: 'POST',
                    url: "{{ route('updateModule') }}",
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert(response.message); // Notify user of success
                            $('#updateCourseModal').modal('hide'); // Hide the modal
                            displaySuccessMessage('Course Updated Successfully');
                            fetchUsers(course_id); // Refresh the users table
                        } else {
                            alert('Failed to update user.');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            let errorMessages = '';
                            $.each(errors, function(key, value) {
                                errorMessages += value[0] + '\n';
                            });
                            alert(errorMessages); // Display validation errors
                        } else {
                            alert('An error occurred.');
                        }
                    }
                });


            });







            $('#deleteQuestionForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                const formData = {
                    delete_question_id: $('#delete_question_id').val(),
                    _token: "{{ csrf_token() }}" // Include CSRF token for security
                };

                $.ajax({
                    type: 'POST',
                    url: "{{ route('deleteModule') }}",
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert(response.message); // Notify user of success
                            $('#deleteQuestionModal').modal('hide'); // Hide the modal
                            displaySuccessMessage('Question Deleted Successfully');
                            fetchUsers(course_id); // Refresh the users table
                        } else {
                            alert('Failed to update user.');
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;
                            let errorMessages = '';
                            $.each(errors, function(key, value) {
                                errorMessages += value[0] + '\n';
                            });
                            alert(errorMessages); // Display validation errors
                        } else {
                            alert('An error occurred.');
                        }
                    }
                });


            });





            function renderPagination(pagination, search, perPage) {
                let paginationHTML = "";

                if (pagination.current_page > 1) {
                    paginationHTML += '<button class="pagination-btn" data-page="' + (pagination.current_page - 1) + '" data-search="' + search + '" data-per-page="' + perPage + '">Previous</button>';
                }

                for (let i = 1; i <= pagination.last_page; i++) {
                    const activeClass = pagination.current_page === i ? 'active' : '';
                    paginationHTML += '<button class="pagination-btn ' + activeClass + '" data-page="' + i + '" data-search="' + search + '" data-per-page="' + perPage + '">' + i + '</button>';
                }

                if (pagination.current_page < pagination.last_page) {
                    paginationHTML += '<button class="pagination-btn" data-page="' + (pagination.current_page + 1) + '" data-search="' + search + '" data-per-page="' + perPage + '">Next</button>';
                }

                $('#pagination-controls').html(paginationHTML);
            }


        // Live search functionality
        $('#search').on('input', function() {
            const search = $(this).val();
            fetchUsers(1, search); // Always reset to page 1 when searching
        });


        $('#select').on('change', function() {
            const perPage = $(this).val();
            const search = $('#search').val(); // Get current search term, if any
            fetchUsers(1, search, perPage); // Reset to page 1 with new perPage value
        });

        // Handle pagination button click with updated perPage
        $(document).on('click', '.pagination-btn', function() {
            const page = $(this).data('page');
            const search = $(this).data('search');
            const perPage = $(this).data('per-page');
            fetchUsers(page, search, perPage);
        });




});



</script>
@endsection