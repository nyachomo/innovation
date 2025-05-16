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
     <div class="col-sm-12">
         <div class="card">
             <div class="card-body">
                <h4 class="header-title">Assesment Analysis</h4>
                 <div class="row">
                     <div class="col-sm-4">
                            <div class="alert alert-success" role="alert">
                                <strong>TOTAL QUESTIONS</strong> 
                                <p id="total-questions" style="font-size:30px"></p>
                            </div>

                     </div>

                     <div class="col-sm-4">

                        <div class="alert alert-warning" role="alert">
                            <strong>ANSWERED QUESTIONS</strong> 
                            <p id="answered_questions" style="font-size:30px">0</p>
                        </div>

                     </div>
                     <div class="col-sm-4">

                        <div class="alert alert-danger" role="alert">
                            <strong>SCORE</strong>
                            <p style="font-size:30px;"> 
                                <span id="total_student_score"></span>/
                                <span id="total_question_marks"></span> 
                            </p>
                        </div>

                     </div>

                 </div>
             </div>
         </div>
     </div>
</div>




    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Checkout Steps -->
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3 bodyColor">
                        <li class="nav-item">
                            <a href="#billing-information" data-bs-toggle="tab" aria-expanded="false"
                                class="nav-link rounded-0 active">
                                <i class="mdi mdi-account-circle font-18"></i>
                                <span class="d-none d-lg-block"> <span id="active_questions">0</span> Active Questions</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#shipping-information" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0">
                                <i class="mdi mdi-truck-fast font-18"></i>
                                <span class="d-none d-lg-block"> <span id="answered_questions2">0</span> Answered Questions</span>
                            </a>
                        </li>
                        
                    </ul>

                    <!-- Steps Information -->
                    <div class="tab-content">

                        <!-- Billing Content-->
                        <div class="tab-pane show active" id="billing-information">
                            <!--content goes here-->




                            <div class="row">
                                <div class="col-12">



                                    <div class="table-responsive">
                                        <table id="table1" class="table table-sm table-striped dt-responsive nowrap w-100">
                                            <!--<thead>
                                                <tr>
                                                    <th>Question </th>
                                                    <th>Answer</th>
                                                </tr>
                                            </thead>-->
                                                            
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
                                
                                <table class="table table-bordered mt-3">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Question</th>
                                            <th>Your Answer</th>
                                            <th>Correct Answer</th>
                                            <th>Marks Awarded</th>
                                        </tr>
                                    </thead>
                                    <tbody id="attemptsTableBody">
                                        <tr>
                                            <td colspan="5" class="text-center">Click "Load Attempts" to fetch data</td>
                                        </tr>
                                    </tbody>
                                </table>
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

// Function to fetch users (questions)
    
function fetchUsers(exam_id, page = 1, search = '', perPage = 100) {
    $.ajax({
        type: 'GET',
        url: "{{ route('fetchQuestionsForTrainee', ['exam_id' => '__exam_id__']) }}".replace('__exam_id__', exam_id),
        data: { page: page, search: search, per_page: perPage },
        dataType: "json",
        success: function(response) {
            $('#total-users').text(response.total_users);
            $('#total-questions').text(response.total_users);
            $('#total_question_marks').text(response.total_question_marks);
            $('#total_student_score').text(response.total_student_score);
            $('#answered_questions2').text(response.answered_questions);
            $('#answered_questions').text(response.answered_questions);
            $('#active_questions').text(response.active_questions);
            $('tbody').html("");
            $('#user_id').val(response.user_id);

            $.each(response.users, function(key, item) {
                $('#table1').append(
                    `<tr>
                        <td>${item.question_name} (<strong>${item.question_mark}Mks</strong>)</td>
                        <td>
                            <form class="answerForm" data-question_id="${item.id}" data-exam_id="${response.exam_id}" data-user_id="${response.user_id}" data-question_mark="${item.question_mark}">
                                <select class="form-select selected-answer" name="selected_answer" required>
                                    <option value="">-- Choose Answer --</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm mt-1 submitAnswerBtn">Submit</button>
                                <div class="progress mt-2" style="display: none;">
                                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%;"></div>
                                </div>
                                <p class="answer-feedback mt-1"></p>
                            </form>
                        </td>
                    </tr>`
                );
            });




                    let attempts = response.attempts;
                    let tableBody = $('#attemptsTableBody');
                    tableBody.empty(); // Clear existing table data

                    if (attempts.length > 0) {
                        $.each(attempts, function(index, attempt) {
                            let row = `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${attempt.question ? attempt.question.question_name : 'N/A'}</td>
                                    <td>${attempt.student_answer ?? 'N/A'}</td>
                                    <td>${attempt.question ? attempt.question.question_answer : 'N/A'}</td>
                                    <td>${attempt.score}</td>
                                </tr>
                            `;
                            tableBody.append(row);
                        });
                    } else {
                        tableBody.append('<tr><td colspan="5" class="text-center">No attempts found</td></tr>');
                    }



            // Attach event listener for answer submission
            $('.answerForm').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                const form = $(this);
                const user_id = form.data('user_id');
                const exam_id = form.data('exam_id');
                const question_id = form.data('question_id');
                const question_mark = form.data('question_mark');
                const selected_answer = form.find('.selected-answer').val();
                const feedbackElement = form.find('.answer-feedback');
                const progressBarContainer = form.find('.progress');
                const progressBar = form.find('.progress-bar');

                // Validate if an answer is selected
                if (!selected_answer) {
                    alert("Please select an answer before submitting.");
                    return;
                }

                // Show progress bar
                progressBarContainer.show();
                progressBar.css("width", "0%");

                let progress = 0;
                const interval = setInterval(() => {
                    if (progress < 100) {
                        progress += 20;
                        progressBar.css("width", progress + "%");
                    }
                }, 300);

                // Send AJAX request to store answer
                $.ajax({
                    type: 'POST',
                    url: "{{ route('storeStudentAnswer') }}", // Laravel route
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: user_id,
                        exam_id: exam_id,
                        question_id: question_id,
                        selected_answer: selected_answer,
                        question_mark: question_mark
                    },
                    success: function(response) {
                        clearInterval(interval);
                        progressBar.css("width", "100%");

                        setTimeout(() => {
                            progressBarContainer.hide();
                            if (response.correct) {
                                feedbackElement.html('<span class="text-success"><strong>Your answer is correct!</strong></span>');
                            } else {
                                feedbackElement.html('<span class="text-danger"><strong>Your answer is incorrect, the correct answer is ' + response.correct_answer + '.</strong></span>');
                            }
                            form.find('.submitAnswerBtn').prop('disabled', true); // Disable button after submission
                            
                            // ✅ Fetch the updated questions after submission
                            fetchUsers(exam_id);
                        }, 500);
                    },
                    error: function(xhr) {
                        clearInterval(interval);
                        progressBar.css("width", "100%");
                        setTimeout(() => {
                            progressBarContainer.hide();
                            alert("Error submitting answer. Please try again.");
                        }, 500);
                    }
                });
            });

            // Render pagination buttons
            renderPagination(response.pagination, search, perPage, exam_id);
        }
    });
}




    // Function to render pagination buttons
    function renderPagination(pagination, search, perPage, exam_id) {
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

    // Handle pagination button click
    $(document).on('click', '.pagination-btn', function() {
        const page = $(this).data('page');
        const search = $(this).data('search');
        const perPage = $(this).data('per-page');
        fetchUsers(exam_id, page, search, perPage);
    });

    // Live search functionality
    $('#search').on('input', function() {
        const search = $(this).val();
        fetchUsers(exam_id, 1, search); // Always reset to page 1 when searching
    });

    // Change number of items per page
    $('#select').on('change', function() {
        const perPage = $(this).val();
        const search = $('#search').val();
        fetchUsers(exam_id, 1, search, perPage);
    });

});
</script>




@endsection