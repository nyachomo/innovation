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
            <h4 class="page-title">Exam Attempts</h4>
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












    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p style="font-size:20px"><b>Exam Name:</b> <span id="exam_name"> NA</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Class Name:</b>  <span id="clas_name">NA</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Course Name:</b> <span id="course_name"> NA</span> </p>
                </div>
                <div class="card-body">

                    <!-- Checkout Steps -->
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3 bodyColor">
                        <li class="nav-item">
                            <a href="#billing-information" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link rounded-0 active">
                                <i class="mdi mdi-account-circle font-18"></i>
                                <span class="d-none d-lg-block"> <span id="total-users">0</span>Attempts</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#shipping-information" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                <i class="mdi mdi-truck-fast font-18"></i>
                                <span class="d-none d-lg-block"> <span>0</span>Not Yet Attempted</span>
                            </a>
                        </li>
                        
                    </ul>

                    <!-- Steps Information -->
                    <div class="tab-content">

                        <!-- Billing Content-->
                        <div class="tab-pane show active" id="billing-information">
                           

                            <div class="row">
                                <div class="col-12">



                                    <div class="table-responsive">

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




                                        <table class="table table-sm table-striped dt-responsive nowrap w-100">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Fullname </th>
                                                        <th>Score (Row Max)</th>
                                                        <th>Score (30)</th>
                                                    </tr>
                                                </thead>
                                            
                                                <tbody id="table1"></tbody>
                                    
                                        </table> 

                                        

                                    <div id="pagination-controls" style="float:right"></div>
                                    </div>
                                    
                                </div>

                            </div>







                        </div>
                        <!-- End Billing Information Content-->

                        <!-- Shipping Content-->
                        <div class="tab-pane" id="shipping-information">
                            

                            <div class="table-responsive">
                                
                               
                            </div>



                        </div>
                        <!-- End Shipping Information Content-->

                        

                    </div> <!-- end tab content-->

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row-->











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
                    url: "{{ route('fetchExamAttempts', ['exam_id' => '__exam_id__']) }}".replace('__exam_id__', exam_id),  // Use named route
                    data: { page: page, search: search, per_page: perPage },
                    dataType: "json",
                    success: function(response) {
                        // Update total users
                        $('#total-users').text(response.total_users);
                        $('#exam_name').text(response.exam_name);
                        $('#clas_name').text(response.clas_name);
                        $('#course_name').text(response.course_name);
                        
                        let max_score=response.ovaral_score;
                        // Clear and repopulate the table
                        $('tbody').html("");
                        $.each(response.users, function(key, item) {
                           
                            
                            let fullName = item.user.firstname; // Start with first name
                            let scoreDisplay = item.total_score + " / " + max_score;
                            let scoreOutOfThirty = Math.round((item.total_score / max_score) * 30);
                
                            if (item.user.secondname) {
                                fullName += " " + item.user.secondname; // Add second name if available
                            }
                            
                            if (item.user.lastname) {
                                fullName += " " + item.user.lastname; // Add last name if available
                            }

                            $('#table1').append(
                                '<tr>\
                                    <td>' + (key + 1) + '</td>\
                                    <td>' + fullName + '</td>\
                                     <td>' + scoreDisplay + '</td>\
                                     <td>' + scoreOutOfThirty + '</td>\
                                </tr>'
                            );
                        });

                        // Render pagination
                        renderPagination(response.pagination, search, perPage);
                        // Attach event listener to Update button
                       

                    }
                });
            }





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
















    


