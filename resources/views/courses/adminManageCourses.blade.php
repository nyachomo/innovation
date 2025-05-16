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
                    <li class="breadcrumb-item active">Manage Courses</li>
                </ol>
            </div>
            <h4 class="page-title">Courses</h4>
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

<!--
<div class="row">
     <div class="col-sm-12">
         <div class="card">
             <div class="card-body">
                <h4 class="header-title">Statistic</h4>
                 <div class="row">
                     <div class="col-sm-4">
                            <div class="alert alert-success" role="alert">
                                <strong>Total Courses </strong> 
                                <p id="all_courses">0</p>
                            </div>

                     </div>

                     <div class="col-sm-4">

                        <div class="alert alert-warning" role="alert">
                            <strong>Active Courses</strong> 
                            <p id="active_courses">0</p>
                        </div>

                     </div>
                     <div class="col-sm-4">

                        <div class="alert alert-danger" role="alert">
                            <strong>Suspended Courses</strong>
                            <p id="suspended">0</p>
                        </div>

                     </div>

                 </div>
             </div>
         </div>
     </div>
</div>
-->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                Total Courses: <span id="all_courses">0</span>
                <a type="button" style="float:right" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addCourseModal"> <i class="uil-plus"></i>Add New Course</a>
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
                          <input type="text" id="search" name="search" class="form-control" placeholder="Search Courses...">
                    </div>

                </div>
                <br>
                <div class="tab-content">
                    <div class="table-responsive">
                       
                        <table id="table1" class="table table-sm table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Level</th>
                                    <th>Duration</th>
                                    <th>Price</th>
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
<div id="addCourseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Add New Course</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" action="{{route('addCourse')}}">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">

                       <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Course Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="course_name" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Level<sup>*</sup></label>
                                <select name="course_level" class="form-control" required>
                                    <option value="">Select ..</option>
                                    <option value="Basic Level">Basic Level</option>
                                    <option value="Intermediary Level">Intermediary Level</option>
                                    <option value="Advance Level">Advance Level</option>
                                </select>
                            </div>

                        </div>

                        

                    </div>

                    <!--<div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Course Introductory Text</label>
                              <input type="text" name="course_intoduction_text" class="form-control" required>
                            </div>
                        </div>
                    </div>-->

                    <!--<div class="row">
                        <div class="col-sm-12">
                            <label>Course Description</label>
                                  
                                <textarea  class="form-control" name="course_description" col="6"> </textarea>
   
                        </div>
                    </div>-->

                    <!--<div class="row">
                        <div class="col-sm-12">
                            <label>What to learn</label>
                            <textarea name="what_to_learn" class="addTopic"  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        
                        </textarea> 
                        </div>
                    </div>-->


                    <div class="row">

                      


                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Course Duration (In Months)<sup>*</sup></label>
                                <input type="number" class="form-control" name="course_duration" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Course Price (Ksh)<sup>*</sup></label>
                                <input type="number" class="form-control" name="course_price" required min="1">
                            </div>

                        </div>


                    </div> 



                    <!--<div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Course Two likes</label>
                                <input type="number" name="course_two_like" class="form-control" min="1" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Course one likes</label>
                                <input type="number" name="course_one_like" class="form-control" min="1" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Course Dislike</label>
                                <input type="number" name="course_not_interested" class="form-control" min="1" required>
                            </div>
                        </div>
                    </div>-->


                    <!--<div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                                <label>How Many Leaners already enrolled for this course</label>
                                <input type="number" name="course_leaners_already_enrolled" class="form-control" min="1" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                                <label>Course Publisher Name</label>
                                <input type="text" name="course_publisher_name" class="form-control" >
                            </div>
                        </div>

                    </div>-->


                    <!--<div class="row">

                        <div class="col-sm-12">
                        <div class="form-group">
                                <label>Course Publisher Description</label>
                                <textarea name="course_publisher_description" class="form-control" row="6"> </textarea>
                            </div>
                        </div>

                    </div>-->

                    <!--<div class="row">
                        <div class="col-sm-12">
                            <input type="text" name="course_image" value="course_image.jpg" class="form-control" hidden="true">
                        </div>
                    </div>-->

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
<div id="updateCourseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Update Course</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="updateCourseForm">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">
                    <input type="text" class="form-control" name="course_id" id="course_id" hidden="true">
                    <div class="row">

                       <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Course Name<sup>*</sup></label>
                                <input type="text" class="form-control" name="course_name" id="course_name" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Level<sup>*</sup></label>
                                <select name="course_level" id="course_level" class="form-control" required>
                                    <option value="">Select ..</option>
                                    <option value="Basic Level">Basic Level</option>
                                    <option value="Intermediary Level">Intermediary Level</option>
                                    <option value="Advance Level">Advance Level</option>
                                </select>
                            </div>

                        </div>


                       
                        

                    </div>


                    
                         
                    <!--<div class="row">
                        <div class="col-sm-12">
                            <label>What to learn</label>
                            <textarea name="what_to_learn" id="what_to_learn"> </textarea> 
                        
                       
                        </div>
                    </div>-->

                    



                   

                    <div class="row">

                      


                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Course Duration (In Months)<sup>*</sup></label>
                                <input type="number" class="form-control" name="course_duration" id="course_duration" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Course Price (Ksh)<sup>*</sup></label>
                                <input type="number" class="form-control" name="course_price"  id="course_price" required min="1">
                            </div>

                        </div>


                    </div> 

                    <div class="row">
                      
                             
                            <div class="col-sm-12">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Course Status<sup>*</sup></label>
                                    <select name="course_status" id="course_status" class="form-control" required>
                                        <option value="">Select ..</option>
                                        <option value="Active">Active</option>
                                        <option value="Suspended">Suspended</option>
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
<div id="deleteCourseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"> Are You sure you want to delete this record ?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="deleteCourseForm">
                @csrf

                <div class="card-body" style="border:1px solid white">
                    <input type="text" class="form-control" name="delete_course_id" id="delete_course_id" hidden="true">
                   
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
<div id="suspendCourseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"> Are You sure you want to suspend this course ?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="suspendCourseForm">
                @csrf

                <div class="card-body" style="border:1px solid white">
                    <input type="text" class="form-control" name="suspend_course_id" id="suspend_course_id" hidden="true">
                   
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
        url: "{{route('fetchCourses')}}",
        data: { page: page, search: search, per_page: perPage },
        dataType: "json",
        success: function(response) {
            // Update total users
            $('#all_courses').text(response.all_courses);
            $('#suspended').text(response.suspended);
            $('#active_courses').text(response.active_courses);


            
            // Clear and repopulate the table
            $('tbody').html("");
            $.each(response.users, function(key, item) {
                // Determine the class based on course status
                var statusClass = '';
                var statusText = '';

                if (item.course_status === 'Active') {
                    statusClass = 'text-success'; // Green color for active
                    statusText = 'Active';
                } else if (item.course_status === 'Suspended') {
                    statusClass = 'text-danger'; // Red color for suspended
                    statusText = 'Suspended';
                }

                const baseUrl = "{{ route('manageCourseModule') }}";
                $('#table1').append(
                    '<tr>\
                        <td>' + (key + 1) + '</td>\
                        <td>' + item.course_name + '</td>\
                        <td>' + item.course_level + '</td>\
                        <td>' + item.course_duration + '</td>\
                        <td>' + item.course_price + '</td>\
                         <td><span class="font-weight-bold ' + statusClass + '">' + statusText + '</span></td>\
                        <td>\
                            <div class="dropdown">\
                                <button class="btn btn-success btn-sm rounded-pill dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">More Actions</button>\
                                <ul class="dropdown-menu">\
                                    <li><a class="dropdown-item updateBtn text-success" href="#" \
                                        data-id="' + item.id + '" \
                                        data-course_name="' + item.course_name + '" \
                                         data-course_status="' + item.course_status + '" \
                                        data-course_level="' + item.course_level + '" \
                                        data-course_duration="' + item.course_duration + '" \
                                        data-what_to_learn="' + item.what_to_learn + '" \
                                        data-course_price="' + item.course_price + '" ><i class="uil-edit"></i> Update</a></li>\
                                    <li><a  class="dropdown-item deleteBtn text-danger" href="#" value="' + item.id + '"><i class="uil-trash"></i> Delete</a></li>\
                                    <li><a  class="dropdown-item suspendBtn text-warning" href="#" value="' + item.id + '"><i class="uil-cancel"> </i>Suspend</a></li>\
                                    <li><a class="dropdown-item viewQuestionsBtn text-info" href="' + baseUrl + '?course_id=' + item.id + '" target="_blank"><i class="fa fa-bars" aria-hidden="true"></i> Manage Modules</a></li>\
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
                const course_id = $(this).data('id');
                const course_name = $(this).data('course_name');
                const course_level = $(this).data('course_level');
                const course_duration = $(this).data('course_duration');
                const course_price = $(this).data('course_price');
                const what_to_learn = $(this).data('what_to_learn');
                const course_status = $(this).data('course_status');

                // Populate modal fields
                $('#course_id').val(course_id);
                $('#course_name').val(course_name);
                $('#course_level').val(course_level);
                $('#course_duration').val(course_duration);
                $('#course_price').val(course_price);
                $('#what_to_learn').val(what_to_learn);
                $('#course_status').val(course_status);


                // Set TinyMCE content for #what_to_learn
                if (tinymce.get('what_to_learn')) {
                    tinymce.get('what_to_learn').setContent(what_to_learn || '');
                }

               

                // Show the modal
                $('#updateCourseModal').modal('show');
            });


            // Attach event listener to Update button
            $('.deleteBtn').on('click', function() {
                const delete_course_id = $(this).attr('value');
                // Populate modal fields
                $('#delete_course_id').val(delete_course_id);
                // Show the modal
                $('#deleteCourseModal').modal('show');
            });


            // Attach event listener to Update button
            $('.suspendBtn').on('click', function() {
                const suspend_course_id = $(this).attr('value');
                // Populate modal fields
                $('#suspend_course_id').val(suspend_course_id);
                // Show the modal
                $('#suspendCourseModal').modal('show');
            });


        }
    });
}



$('#updateCourseForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    if (tinymce.get('what_to_learn')) {
        tinymce.get('what_to_learn').save();
    }
    
    const formData = {
        course_id: $('#course_id').val(),
        course_name: $('#course_name').val(),
        course_status: $('#course_status').val(),
        course_level: $('#course_level').val(),
        course_duration: $('#course_duration').val(),
        course_price: $('#course_price').val(),
        what_to_learn: $('#what_to_learn').val(),
        _token: "{{ csrf_token() }}" // Include CSRF token for security
    };

    

    $.ajax({
        type: 'POST',
        url: "{{ route('updateCourse') }}",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message); // Notify user of success
                $('#updateCourseModal').modal('hide'); // Hide the modal
                displaySuccessMessage('Course Updated Successfully');
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




$('#deleteCourseForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = {
        delete_course_id: $('#delete_course_id').val(),
        _token: "{{ csrf_token() }}" // Include CSRF token for security
    };

    $.ajax({
        type: 'POST',
        url: "{{ route('deleteCourse') }}",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message); // Notify user of success
                $('#deleteCourseModal').modal('hide'); // Hide the modal
                displaySuccessMessage('Course Deleted Successfully');
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


$('#suspendCourseForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = {
        suspend_course_id: $('#suspend_course_id').val(),
        _token: "{{ csrf_token() }}" // Include CSRF token for security
    };

    $.ajax({
        type: 'POST',
        url: "{{ route('suspendCourse') }}",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message); // Notify user of success
                $('#suspendCourseModal').modal('hide'); // Hide the modal
                displaySuccessMessage('Course Suspended Successfully');
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