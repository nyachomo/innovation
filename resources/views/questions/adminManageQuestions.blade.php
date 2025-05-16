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
                Total Schools: <span id="total-users">0</span>
                <a type="button" style="float:right" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addExamModal"> <i class="uil-user-plus"></i>Add New Question</a>
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
                <br>
                <div class="tab-content">
                    <div class="tab-pane show active">
                        <table id="datatable-buttons" >
                        <table id="table1" class="table table-sm table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Question </th>
                                    <th>Answer</th>
                                    <th>Mark</th>
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
<div id="addExamModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Add New Exam</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" action="{{route('addQuestion')}}">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">
                   <!--<label>Exam Id</label>-->
                   <input type="text" name="exam_id" class="form-control" value="{{$exam_id}}" hidden="true">

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label> Question <sup>*</sup></label>
                                <!--<input type="text" class="form-control" name="question_name">-->
                                <textarea id="mytextarea"  name="question_name"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label> Answer <sup>*</sup></label>
                                <select class="form-control" name="question_answer" required>
                                     <option value="">Select ...</option>
                                     <option value="A">A</option>
                                     <option value="B">B</option>
                                     <option value="C">C</option>
                                     <option value="D">D</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label> Marks <sup>*</sup></label>
                                <select class="form-control" name="question_mark" required>
                                     <option value="">Select ...</option>
                                     <option value="1">1</option>
                                     <option value="2">2</option>
                                     <option value="3">3</option>
                                     <option value="4">4</option>
                                     <option value="5">5</option>
                                     <option value="6">6</option>
                                     <option value="7">7</option>
                                     <option value="8">8</option>
                                     <option value="9">9</option>
                                     <option value="10">10</option>
                                </select>

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
<div id="deleteQuestionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"> Are You sure you want to delete this record ?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="deleteQuestionForm">
                @csrf

                <div class="card-body" style="border:1px solid white">
                    <input type="text" class="form-control" name="delete_question_id" id="delete_question_id" hidden="true">
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




<!-- Add User modal -->
<div id="updateQuestionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Update Question</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="updateQuestionForm">
                @csrf

                <div class="card-body" style="border:1px solid white">
                        <input type="text" class="form-control" name="update_question_id" id="update_question_id" hidden="true">

                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label> Question <sup>*</sup></label>
                
                                    <textarea id="mytextarea"  name="update_question_name" id="update_question_name"></textarea>
                                  
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label> Answer <sup>*</sup></label>
                                    <input type="text" class="form-control" name="update_question_answer" id="update_question_answer">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label> Marks <sup>*</sup></label>
                                    <input type="text" class="form-control" name="update_question_mark" id="update_question_mark">
                                </div>
                            </div>
                        </div>



                   
                </div>


            <div class="modal-footer justify-content-between" style="border:1px solid white">
                <button type="button" class="btn btn-danger rounded-pill"  data-bs-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-success rounded-pill">Update</button>
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
            const exam_id = urlParams.get('exam_id');

            // Fetch questions for this exam
            if (exam_id) {
                fetchUsers(exam_id);
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




            function fetchUsers(exam_id,page = 1, search = '', perPage = 10) {
                $.ajax({
                    type: 'GET',
                    //url: "{{route('adminManageQuestions')}}",
                    //url: "{{ url('questions/questions') }}/" + exam_id, 
                    url: "{{ route('fetchQuestions', ['exam_id' => '__exam_id__']) }}".replace('__exam_id__', exam_id),  // Use named route
                    data: { page: page, search: search, per_page: perPage },
                    dataType: "json",
                    success: function(response) {
                        // Update total users
                        $('#total-users').text(response.total_users);

                        // Clear and repopulate the table
                        $('tbody').html("");
                        $.each(response.users, function(key, item) {
                            const baseUrl = "{{ route('adminManageQuestions') }}";

                            $('#table1').append(
                                '<tr>\
                                    <td>' + (key + 1) + '</td>\
                                    <td>' + item.question_name + '</td>\
                                    <td>' + item.question_answer + '</td>\
                                    <td>' + item.question_mark + '</td>\
                                <td>\
                                        <div class="dropdown">\
                                            <button class="btn btn-success btn-sm rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">More Actions</button>\
                                            <ul class="dropdown-menu">\
                                                <li><a class="text-success dropdown-item updateBtn" href="#" \
                                                    data-id="' + item.id + '" \
                                                    data-question_name="' + item.question_name + '" \
                                                    data-question_answer="' + item.question_answer + '" \
                                                    data-question_mark="' + item.question_mark + '"><i class="fa fa-edit"></i> Update</a></li>\
                                                <li><a  class="text-danger dropdown-item deleteBtn" href="#" value="' + item.id + '"><i class="fa fa-trash"></i> Delete</a></li>\
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
                            const update_question_id = $(this).data('id');
                            const update_question_name = $(this).data('question_name');
                            const update_question_answer = $(this).data('question_answer');
                            const update_question_mark = $(this).data('question_mark');
                            // Populate modal fields
                            $('#update_question_id').val(update_question_id);
                            $('#update_question_name').val(update_question_name);
                            $('#update_question_answer').val(update_question_answer);
                            $('#update_question_mark').val(update_question_mark);

                            // Set TinyMCE content for #what_to_learn
                            if (tinymce.get('update_question_name')) {
                                    tinymce.get('update_question_name').setContent(update_question_name || '');
                                } else {
                                    tinymce.init({
                                        selector: '#update_question_name',
                                        setup: function (editor) {
                                            editor.on('init', function () {
                                                editor.setContent(update_question_name || '');
                                            });
                                        }
                                    });
                                }
                            // Show the modal
                            $('#updateQuestionModal').modal('show');
                        });


                    }
                });
            }



            $('#updateQuestionForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                const formData = {
                    update_question_id: $('#update_question_id').val(),
                    update_question_name: $('#update_question_name').val(),
                    update_question_mark: $('#update_question_mark').val(),
                    update_question_answer: $('#update_question_answer').val(),
                    _token: "{{ csrf_token() }}" // Include CSRF token for security
                };

                

                $.ajax({
                    type: 'POST',
                    url: "{{ route('updateQuestion') }}",
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert(response.message); // Notify user of success
                            $('#updateQuestionModal').modal('hide'); // Hide the modal
                            displaySuccessMessage('Exam Updated Successfully');
                            fetchUsers(exam_id); // Refresh the users table
                        } else {
                            alert('Failed to update exam.');
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
                    url: "{{ route('deleteQuestion') }}",
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            alert(response.message); // Notify user of success
                            $('#deleteQuestionModal').modal('hide'); // Hide the modal
                            displaySuccessMessage('Question Deleted Successfully');
                            fetchUsers(exam_id); // Refresh the users table
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