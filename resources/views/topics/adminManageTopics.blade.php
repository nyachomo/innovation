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
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                  <h4 class="page-title">Manage Users</h4>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>



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
                Total Clases: <span id="total-users">0</span>
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
                                    <th>Name</th>
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
<div id="addTopicModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Add New Topic</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" action="{{route('addTopics')}}">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Topic Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="topic_name" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Topic Content<sup>*</sup></label>
                                <input type="text" class="form-control" name="topic_content" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Topic Video Link<sup>*</sup></label>
                                <input type="text" class="form-control" name="topic_video_link">
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
<div id="updateTopicModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Update Class</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="updateTopicForm">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">
                    <input type="text" class="form-control" name="topic_id" id="topic_id" >
                   


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Topic Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="topic_name" id="topic_name" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Topic Content<sup>*</sup></label>
                                <input type="text" class="form-control" name="topic_content" id="topic_content" required>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Topic Video Link<sup>*</sup></label>
                                <input type="text" class="form-control" name="topic_video_link" id="topic_video_link">
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




<!-- Add User modal -->
<div id="suspendTopicModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"> Are You sure you want to suspend this topic ?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="suspendTopicForm">
                @csrf

                <div class="card-body" style="border:1px solid white">
                    <input type="text" class="form-control" name="suspend_topic_id" id="suspend_topic_id">
                   
                </div>


            <div class="modal-footer justify-content-between" style="border:1px solid white">
                <button type="button" class="btn btn-danger rounded-pill"  data-bs-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-success rounded-pill">Suspend</button>
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
            const module_id = urlParams.get('module_id');

            // Fetch questions for this exam
            if (module_id) {
                fetchUsers(module_id);
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








    function fetchUsers(module_id,page = 1, search = '', perPage = 10) {
    $.ajax({
        type: 'GET',
        //url: "{{route('fetchTopics')}}",
        url: "{{ route('fetchTopics', ['module_id' => '__module_id__']) }}".replace('__module_id__', module_id),  // Use named route
        data: { page: page, search: search, per_page: perPage },
        dataType: "json",
        success: function(response) {
            // Update total users
            $('#total-users').text(response.total_users);

            // Clear and repopulate the table
            $('tbody').html("");
            $.each(response.users, function(key, item) {
                $('#table1').append(
                    '<tr>\
                        <td>' + (key + 1) + '</td>\
                        <td>' + item.topic_name + '</td>\
                        <td>' + item.topic_status + '</td>\
                        <td>\
                            <button type="button" value="' + item.id + '" \
                                data-topic_name="' + item.topic_name + '" \
                                data-topic_content="' + item.topic_content + '" \
                                data-topic_status="' + item.topic_status + '" \
                                 data-topic_video_link="' + item.topic_video_link + '" \
                                class="updateBtn btn btn-success btn-sm">Update</button>\
                                <button type="button" value="' + item.id + '" \
                                class="suspendBtn btn btn-secondary btn-sm">Suspend</button>\
                                <button type="button" value="' + item.id + '" \
                                class="deleteBtn btn btn-danger btn-sm">Delete</button>\
                        </td>\
                    </tr>'
                );
            });

            // Render pagination
            renderPagination(response.pagination, search, perPage);

            // Attach event listener to Update button
            $('.updateBtn').on('click', function() {
                const topic_id = $(this).val();
                const topic_name = $(this).data('topic_name');
                const topic_content = $(this).data('topic_content');
                const topic_video_link = $(this).data('topic_video_link');
                // Populate modal fields
                $('#topic_id').val(topic_id);
                $('#topic_name').val(topic_name);
                $('#topic_content').val(topic_content);
                $('#topic_video_link').val(topic_video_link);

                // Show the modal
                $('#updateTopicModal').modal('show');
            });



            // Attach event listener to Update button
            $('.deleteBtn').on('click', function() {
                const delete_topic_id = $(this).val();
                // Populate modal fields
                $('#delete_topic_id').val(delete_topic_id);
                // Show the modal
                $('#deleteTopicModal').modal('show');
            });


            // Attach event listener to Update button
            $('.suspendBtn').on('click', function() {
                const suspend_topic_id = $(this).val();
                // Populate modal fields
                $('#suspend_topic_id').val(suspend_topic_id);
                // Show the modal
                $('#suspendTopicModal').modal('show');
            });


        }
    });
}



$('#updateTopicForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = {
        topic_id: $('#topic_id').val(),
        topic_name: $('#topic_name').val(),
        topic_content: $('#topic_content').val(),
        topic_video_link: $('#topic_video_link').val(),
        _token: "{{ csrf_token() }}" // Include CSRF token for security
    };

    

    $.ajax({
        type: 'POST',
        url: "{{ route('updateTopics') }}",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message); // Notify user of success
                $('#updateTopicModal').modal('hide'); // Hide the modal
                displaySuccessMessage('Topic Updated Successfully');
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






$('#deleteTopicForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = {
        delete_topic_id: $('#delete_topic_id').val(),
        _token: "{{ csrf_token() }}" // Include CSRF token for security
    };

    $.ajax({
        type: 'POST',
        url: "{{ route('deleteTopics') }}",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message); // Notify user of success
                $('#deleteTopicModal').modal('hide'); // Hide the modal
                displaySuccessMessage('Topic Deleted Successfully');
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


$('#suspendTopicForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = {
        suspend_topic_id: $('#suspend_topic_id').val(),
        _token: "{{ csrf_token() }}" // Include CSRF token for security
    };

    $.ajax({
        type: 'POST',
        url: "{{ route('suspendTopics') }}",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message); // Notify user of success
                $('#suspendTopicModal').modal('hide'); // Hide the modal
                displaySuccessMessage('Topic Suspended Successfully');
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