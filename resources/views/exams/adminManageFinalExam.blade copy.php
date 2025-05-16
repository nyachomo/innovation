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
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Final Exam</li>
                </ol>
            </div>
            <h4 class="page-title">Final Exam</h4>
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
                Total Final Exam: <span id="total-users">0</span>
                <a type="button" style="float:right" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addExamModal"> <i class="uil-user-plus"></i>Add New Final Exam</a>
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
                    <div class="table-responsive">
                       
                        <table id="table1" class="table table-sm table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Class</th>
                                    <th>Exam Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Duration</th>
                                    <th>Status</th>
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Add New Final Exam</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" action="{{route('addAssignment')}}">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">
                   

                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Is Final Exam<sup>*</sup></label>
                                <input type="text" class="form-control" name="is_final_exam"  value="Yes" readonly="true">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Select Class<sup>*</sup></label>
                                <select class="form-control" name="clas_id" required>
                                    <option value="">Select Class</option>
                                    @if(!empty($clas))
                                         @foreach($clas as $key=>$cla)
                                            <option value="{{$cla->id}}">{{$cla->clas_name}}</option>
                                         @endforeach
                                    @else
                                    @endif
                                </select>
                            </div>
                        </div>


                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Exam Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="exam_name">
                            </div>
                        </div>

                    </div>



                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Exam Start Date<sup>*</sup></label>
                                <input type="date" class="form-control" name="exam_start_date">
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Exam End Date<sup>*</sup></label>
                                <input type="date" class="form-control" name="exam_end_date" >
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Exam Duration<sup>*</sup></label>
                                <input type="time" class="form-control" name="exam_duration" >
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Exam Instruction<sup>*</sup></label>
                                <input type="text" class="form-control" name="'exam_instruction">
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
<div id="updateExamModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Update Exam</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="updateExamForm">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">
                    <label>Id</label>
                    <input type="text" class="form-control" name="exam_id" id="exam_id">

                    <div class="row">
                        <div class="col-sm-6">
                              <div class="form-group">
                                   <label>Is Final Exam<sup>*</sup></label>
                                   <input type="text" class="form-control" name="is_final_exam"  value="Yes" Readonly="true">
                              </div>
                        </div>

                        <div class="col-sm-6">

                               <div class="form-group">
                                    <label>Select Class<sup>*</sup></label>
                                    <select class="form-control" name="update_clas_id" id="update_clas_id">
                                        <option value="">Select Class</option>
                                        @if(!empty($clas))
                                            @foreach($clas as $key=>$cla)
                                                <option value="{{$cla->id}}">{{$cla->clas_name}}</option>
                                            @endforeach
                                        @else
                                        @endif
                                    </select>
                                </div>

                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Exam Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="exam_name" id="exam_name" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Exam Start Date<sup>*</sup></label>
                                <input type="date" class="form-control" name="exam_start_date" id="exam_start_date"  required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Exam End Date<sup>*</sup></label>
                                <input type="date" class="form-control" name="exam_end_date" id="exam_end_date" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Exam Duration<sup>*</sup></label>
                                <input type="time" class="form-control" name="exam_duration" id="exam_duration">
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Exam Instruction<sup>*</sup></label>
                                <input type="text" class="form-control" name="'exam_instruction"  id="'exam_instruction">
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
<div id="deleteExamModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"> Are You sure you want to delete this record ?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="deleteExamForm">
                @csrf

                <div class="card-body" style="border:1px solid white">
                    <input type="text" class="form-control" name="delete_school_id" id="delete_exam_id" >
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
<div id="publishedExamModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"> Are You sure you want to published this exam ?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="publishedExamForm">
                @csrf

                <div class="card-body" style="border:1px solid white">
                    <input type="text" class="form-control" name="published_exam_id" id="published_exam_id">
                   
                </div>


            <div class="modal-footer justify-content-between" style="border:1px solid white">
                <button type="button" class="btn btn-danger rounded-pill"  data-bs-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-success rounded-pill">Published</button>
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





    fetchUsers();


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


    // Initial call to fetch users
    fetchUsers();






function fetchUsers(page = 1, search = '', perPage = 10) {
    $.ajax({
        type: 'GET',
        url: "{{route('fetchFinalExam')}}",
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
                        <td>' + item.clas.clas_name + '</td>\
                        <td>' + item.exam_name + '</td>\
                        <td>' + item.exam_start_date + '</td>\
                        <td>' + item.exam_end_date + '</td>\
                        <td>' + item.exam_duration + '</td>\
                        <td>' + item.exam_status + '</td>\
                       <td>\
                            <div class="dropdown">\
                                <button class="btn btn-success btn-sm rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">More Actions</button>\
                                <ul class="dropdown-menu">\
                                    <li><a  class="text-success dropdown-item updateBtn" href="#" \
                                        data-id="' + item.id + '" \
                                        data-exam_name="' + item.exam_name + '" \
                                        data-exam_start_date="' + item.exam_start_date + '" \
                                        data-exam_end_date="' + item.exam_end_date + '" \
                                        data-exam_duration="' + item.exam_duration + '" \
                                        data-exam_instruction="' + item.exam_instruction + '" \
                                        data-update_clas_id="' + item.clas.id + '"> <i class="fa fa-edit"></i> Update</a></li>\
                                    <li><a  class="text-danger dropdown-item deleteBtn" href="#" value="' + item.id + '"><i class="fa fa-trash"></i>Delete</a></li>\
                                    <li><a  class="text-info dropdown-item publishedBtn" href="#" value="' + item.id + '"><i class="fa fa-check" aria-hidden="true"></i> Published</a></li>\
                                   <li><a class="text-warning dropdown-item viewQuestionsBtn" href="' + baseUrl + '?exam_id=' + item.id + '" target="_blank"><i class="fa fa-eye-slash" aria-hidden="true"></i> View Questions</a></li>\
                                </ul>\
                            </div>\
                        </td>\
                    </tr>'
                );
            });

            // Render pagination
            renderPagination(response.pagination, search, perPage);

            // Attach event listener to Update button
            $('.updateBtn').on('click', function() {
                //const exam_id = $(this).val();
                const exam_id = $(this).data('id');
                const exam_name = $(this).data('exam_name');
                const exam_start_date = $(this).data('exam_start_date');
                const exam_end_date = $(this).data('exam_end_date');
                const exam_duration = $(this).data('exam_duration');
                const exam_instruction = $(this).data('exam_instruction');
                const update_clas_id = $(this).data('update_clas_id');
                // Populate modal fields
                $('#exam_id').val(exam_id);
                $('#exam_name').val(exam_name);
                $('#exam_start_date').val(exam_start_date);
                $('#exam_end_date').val(exam_end_date);
                $('#exam_duration').val(exam_duration);
                $('#exam_instruction').val(exam_instruction);
                $('#update_clas_id').val(update_clas_id);
                // Show the modal
                $('#updateExamModal').modal('show');
            });



            // Attach event listener to Update button
            $('.deleteBtn').on('click', function() {
                const delete_exam_id = $(this).attr('value');
                // Populate modal fields
                $('#delete_exam_id').val(delete_exam_id);
                // Show the modal
                $('#deleteExamModal').modal('show');
            });


            // Attach event listener to Update button
            $('.publishedBtn').on('click', function() {
                const published_exam_id = $(this).attr('value');
                // Populate modal fields
                $('#published_exam_id').val(published_exam_id);
                // Show the modal
                $('#publishedExamModal').modal('show');
            });


        }
    });
}



$('#updateExamForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = {
        exam_id: $('#exam_id').val(),
        exam_name: $('#exam_name').val(),
        exam_start_date: $('#exam_start_date').val(),
        exam_end_date: $('#exam_end_date').val(),
        exam_duration: $('#exam_duration').val(),
        update_clas_id: $('#update_clas_id').val(),
        _token: "{{ csrf_token() }}" // Include CSRF token for security
    };

    

    $.ajax({
        type: 'POST',
        url: "{{ route('updateExams') }}",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message); // Notify user of success
                $('#updateExamModal').modal('hide'); // Hide the modal
                displaySuccessMessage('Exam Updated Successfully');
                fetchUsers(); // Refresh the users table
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






$('#deleteExamForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = {
        delete_exam_id: $('#delete_exam_id').val(),
        _token: "{{ csrf_token() }}" // Include CSRF token for security
    };

    $.ajax({
        type: 'POST',
        url: "{{ route('deleteExams') }}",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message); // Notify user of success
                $('#deleteExamModal').modal('hide'); // Hide the modal
                displaySuccessMessage('Exam Deleted Successfully');
                fetchUsers(); // Refresh the users table
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


$('#publishedExamForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = {
        published_exam_id: $('#published_exam_id').val(),
        _token: "{{ csrf_token() }}" // Include CSRF token for security
    };

    $.ajax({
        type: 'POST',
        url: "{{ route('publishedExams') }}",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message); // Notify user of success
                $('#publishedExamModal').modal('hide'); // Hide the modal
                displaySuccessMessage('Exam Published Successfully');
                fetchUsers(); // Refresh the users table
            } else {
                alert('Failed to published Exam.');
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