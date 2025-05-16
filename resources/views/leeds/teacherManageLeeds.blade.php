@extends('layouts.master')
@section('content')

<?php
     $user = Auth::user();  
?>

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

            <div class="row">
                        <div class="col-sm-12">
                            <center>
                                <img src="{{asset('images/logo/logo.jpeg')}}"  style="max-width: 100px; height: 100px">
                            </center>
                            <center> <h2 style="color:#000033">TECHSPHERE TRAINING INSTITUTE</h2></center>
                        
                            <center>
                            <p style="border-bottom:3px solid #000033">
                                <b>
                                View Park Towers 17th Floor, University way | P. O. Box 1334-00618, Nairobi<br>
                                Web: <a href="https://techsphereinstitute.co.ke" style="color:blue">https://techsphereinstitute.co.ke</a>  Email: <span style="color:blue">Info@techsphereinstitute.co.ke </span>| <br>
                                Phone: <span style="color:#3ccccc">+254768919307</span>
                                </b>
                            </p>
                            </center>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                              <h5>
                                  <center>1 <sup>st</sup> ANNUAL ICT INNOVATION CHALLANGE<br>PARTICIPANTS</center>
                              </h5>
                        </div>
                    </div>

                Total Students: <span id="total-users">0</span>
                <a type="button" style="float:right" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addLeedModal"> <i class="uil-user-plus"></i>Register Student</a>
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
                                    <th>Student Fullname</th>
                                    <th>School</th>
                                    <th>Student Class</th>
                                    <th>Student Contact</th>
                                    <th>Parent Contact</th>
                                    <th>Program</th>
                                    <!-- <th>Student Gender</th>-->
                                    <!--<th>Parent name</th>-->
                                   
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
<div id="addLeedModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Add New Student</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" action="{{route('addLeeds')}}">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Student Firstname<sup>*</sup></label>
                                <input type="text" class="form-control" name="student_firstname" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Student Lastname<sup>*</sup></label>
                                <input type="text" class="form-control" name="student_lastname" required>
                            </div>
                        </div>

                    </div>


                  


                    <div class="row">

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Student Phonenumber<sup>*</sup></label>
                                <input type="text" class="form-control" name="student_phone" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Parent phonenumber<sup>*</sup></label>
                                <input type="text" class="form-control" name="parent_phone" >
                            </div>
                        </div>


                       

                    </div>


                    <div class="row">

                       <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Student Email</label>
                                <input type="text" class="form-control" name="student_email">
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Gender<sup>*</sup></label>
                               
                                <select class="form-control" name="student_gender" required>
                                    <option value="">Select ..</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                    <option value="Other">Other</option>
                                </select>

                            </div>
                        </div>


                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Class<sup>*</sup></label>
                                

                                <select class="form-control" name="student_form" required>
                                    <option value="">Select ..</option>
                                    <!--<option value="Grade One">Grade 1</option>
                                    <option value="Grade Two">Grade 2</option>
                                    <option value="Grade Three">Grade 3</option>
                                    <option value="Grade Four">Grade 4</option>
                                    <option value="Grade Five">Grade 5</option>
                                    <option value="Grade Six">Grade 6</option>
                                    <option value="Grade Seven">Grade 7</option>
                                    <option value="Grade Eight">Grade 8</option>
                                    <option value="Grade Nine">Grade 9</option>
                                    <option value="Grade Ten">Grade 10</option>
                                    <option value="Grade Eleven">Grade 11</option>
                                    <option value="Grade Twelve">Grade 12</option>
                                    <option value="Form one">Form One</option>-->
                                    <option value="Form Two">Form Two</option>
                                    <option value="Form Three">Form Three</option>
                                    <option value="Form Four">Form Four</option>
                                </select>




                            </div>
                        </div>


                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>School<sup>*</sup></label>

                                    <select class="form-control" name="school_id" required>
                                        @php
                                            $user = Auth::user();
                                        @endphp

                                        @if($user && $user->school_id)
                                            <!-- If the user has a school, show their assigned school -->
                                            <option value="{{ $user->school_id }}">{{ $user->school ? $user->school->school_name : 'Your School' }}</option>
                                        @else
                                            <!-- If the user has no school, show all available schools -->
                                            <option value="">Select a School</option>
                                            @foreach($schools as $school)
                                                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>



                            </div>
                        </div>




                    </div>




                    <div class="row">

                       <!--<div class="col-sm-6">
                           
                            <div class="form-group">
                                <label>Parent name<sup>*</sup></label>
                                <input type="text" class="form-control" name="parent_name">
                            </div>
                        </div>-->

                       

                    </div>


                    <div class="row">

                       


                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Program<sup>*</sup></label>
                               
                                <select class="form-control"  name="course_id">
                                   <!-- <option value="">Select ..</option>-->
                                    @foreach($courses as $key=>$course)
                                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                                    @endforeach
                                    
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
<div id="updateLeedModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Update Student Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="updateLeedForm">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">

                    <input type="text" class="form-control" name="leed_id" id="leed_id" hidden="true">
                    <div class="row">

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Student Firstname<sup>*</sup></label>
                                <input type="text" class="form-control" name="student_firstname" id="student_firstname" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Student Lastname<sup>*</sup></label>
                                <input type="text" class="form-control" name="student_lastname"  id="student_lastname" required>
                            </div>
                        </div>



                    </div>




                    <div class="row">

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Student Phonenumber<sup>*</sup></label>
                                <input type="text" class="form-control" name="student_phone"  id="student_phone" required>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Parent phonenumber<sup>*</sup></label>
                                <input type="text" class="form-control" name="parent_phone"  id="parent_phone" >
                            </div>
                        </div>


                       

                    </div>



                    <div class="row">

                       <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Student Email<sup>*</sup></label>
                                <input type="text" class="form-control" name="student_email"  id="student_email">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Gender<sup>*</sup></label>
                               
                                <select class="form-control" name="student_gender" id="student_gender" class="form-control">
                                    <option value="">Select ..</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                    <option value="Other">Other</option>
                                </select>

                            </div>
                        </div>






                    </div>

                    <div class="row">

                    
                    <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Class<sup>*</sup></label>
                                

                                <select class="form-control" name="student_form" id="student_form" required>
                                    <option value="">Select ..</option>
                                   <!-- <option value="Grade One">Grade 1</option>
                                    <option value="Grade Two">Grade 2</option>
                                    <option value="Grade Three">Grade 3</option>
                                    <option value="Grade Four">Grade 4</option>
                                    <option value="Grade Five">Grade 5</option>
                                    <option value="Grade Six">Grade 6</option>
                                    <option value="Grade Seven">Grade 7</option>
                                    <option value="Grade Eight">Grade 8</option>
                                    <option value="Grade Nine">Grade 9</option>
                                    <option value="Grade Ten">Grade 10</option>
                                    <option value="Grade Eleven">Grade 11</option>
                                    <option value="Grade Twelve">Grade 12</option>
                                    <option value="Form one">Form One</option>-->
                                    <option value="Form Two">Form Two</option>
                                    <option value="Form Three">Form Three</option>
                                    <option value="Form Four">Form Four</option>
                                </select>




                            </div>
                        </div>



                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>School<sup>*</sup></label>

                                    <select class="form-control" name="school_id" required>
                                        @php
                                            $user = Auth::user();
                                        @endphp

                                        @if($user && $user->school_id)
                                            <!-- If the user has a school, show their assigned school -->
                                            <option value="{{ $user->school_id }}">{{ $user->school ? $user->school->school_name : 'Your School' }}</option>
                                        @else
                                            <!-- If the user has no school, show all available schools -->
                                            <option value="">Select a School</option>
                                            @foreach($schools as $school)
                                                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
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
                                        <label>Program<sup>*</sup></label>
                                    
                                        <select class="form-control"  name="course_id">
                                        <!-- <option value="">Select ..</option>-->
                                            @foreach($courses as $key=>$course)
                                            <option value="{{$course->id}}">{{$course->course_name}}</option>
                                            @endforeach
                                            
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
<div id="deleteLeedModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"> Are You sure you want to delete this record ?</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" id="deleteLeedForm">
                @csrf

                <div class="card-body" style="border:1px solid white">
                    <input type="text" class="form-control" name="delete_leed_id" id="delete_leed_id" hidden="true">
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
        url: "{{route('teacherFetchLeeds')}}",
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
                        <td>' + item.student_firstname + ' ' + item.student_lastname + '</td>\
                        <td>' + item.school.school_name + '</td>\
                        <td>' + item.student_form + '</td>\
                        <!--<td>' + item.student_firstname + '</td>-->\
                        <!--<td>' + item.student_lastname + '</td>-->\
                        <td>' + item.student_phone + '</td>\
                         <!--<td>' + item.student_gender + '</td>-->\
                        <!--<td>' + item.parent_name + '</td>-->\
                        <td>' + item.parent_phone + '</td>\
                        <td>' + item.course.course_name + '</td>\
                        <td>\
                            <button type="button" value="' + item.id + '" \
                                data-student_firstname="' + item.student_firstname + '" \
                                data-student_lastname="' + item.student_lastname + '" \
                                data-student_email="' + item.student_email + '" \
                                data-student_phone="' + item.student_phone + '" \
                                data-student_gender="' + item.student_gender + '" \
                                data-student_form="' + item.student_form + '" \
                                data-parent_name="' + item.parent_name + '" \
                                data-parent_phone="' + item.parent_phone + '" \
                                <button type="button" value="' + item.id + '" \
                                class="updateBtn btn btn-success btn-sm"><i class="uil-edit"></i>Update</button>\
                               <!--  <button type="button" value="' + item.id + '" \
                                class="deleteBtn btn btn-danger btn-sm"><i class=" uil-trash-alt"></i></button>\
                                <a href="/Leeds/' + item.id + '/download-pdf" class="btn btn-primary btn-sm"><i class="uil-file-download"></i> Download PDF</a> --> \
                        </td>\
                    </tr>'
                );
            });

            // Render pagination
            renderPagination(response.pagination, search, perPage);

            // Attach event listener to Update button
            $('.updateBtn').on('click', function() {
                const leed_id = $(this).val();
                const student_firstname = $(this).data('student_firstname');
                const student_lastname = $(this).data('student_lastname');
                const student_email = $(this).data('student_email');
                const student_phone = $(this).data('student_phone');

                const student_gender = $(this).data('student_gender');
                const student_form = $(this).data('student_form');

                const parent_name = $(this).data('parent_name');
                const parent_email = $(this).data('parent_email');
                const parent_phone = $(this).data('parent_phone');
                // Populate modal fields
                $('#leed_id').val(leed_id);
                $('#student_firstname').val(student_firstname);
                $('#student_lastname').val(student_lastname);
                $('#student_email').val(student_email);
                $('#student_phone').val(student_phone);

                $('#student_gender').val(student_gender);
                $('#student_form').val(student_form);


                $('#parent_name').val(parent_name);
                $('#parent_email').val(parent_email);
                $('#parent_phone').val(parent_phone);

                // Show the modal
                $('#updateLeedModal').modal('show');
            });



            // Attach event listener to Update button
            $('.deleteBtn').on('click', function() {
                const delete_leed_id = $(this).val();
                // Populate modal fields
                $('#delete_leed_id').val(delete_leed_id);
                // Show the modal
                $('#deleteLeedModal').modal('show');
            });




        }
    });
}



$('#updateLeedForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = {
        leed_id: $('#leed_id').val(),
        student_firstname: $('#student_firstname').val(),
        student_lastname: $('#student_lastname').val(),
        student_email: $('#student_email').val(),
        student_phone: $('#student_phone').val(),
        student_form: $('#student_form').val(),
        student_gender: $('#student_gender').val(),

        parent_name: $('#parent_name').val(),
        parent_email: $('#parent_email').val(),
        parent_phone: $('#parent_phone').val(),
        _token: "{{ csrf_token() }}" // Include CSRF token for security
    };

    

    $.ajax({
        type: 'POST',
        url: "{{ route('updateLeeds') }}",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message); // Notify user of success
                $('#updateLeedModal').modal('hide'); // Hide the modal
                displaySuccessMessage('Leed Updated Successfully');
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






$('#deleteLeedForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    const formData = {
        delete_leed_id: $('#delete_leed_id').val(),
        _token: "{{ csrf_token() }}" // Include CSRF token for security
    };

    $.ajax({
        type: 'POST',
        url: "{{ route('deleteLeeds') }}",
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                alert(response.message); // Notify user of success
                $('#deleteLeedModal').modal('hide'); // Hide the modal
                displaySuccessMessage('Leed Deleted Successfully');
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