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
                Total Questions: <span id="total-users">0</span>
                <!--<a type="button" style="float:right" class="btn btn-sm btn-success rounded-pill" data-bs-toggle="modal" data-bs-target="#addExamModal"> <i class="uil-user-plus"></i>Add New Question</a>-->
            </div>
            <div class="card-body">

               <!--<div class="row">
                    <div class="col-sm-1" style="padding-top:4px">
                         <label for="example-select" class="form-label" style="float:right;">Show</label>
                    </div>
                    <div class="col-sm-2">
                       
                   


                    </div>

                    <div class="col-sm-6"></div>


                </div>-->
                <br>

                <div class="tab-content">
                    <div class="tab-pane show active">
                        <table id="datatable-buttons" >
                        <table id="table1" class="table table-sm table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <!--<th>#</th>-->
                                    <th>Question </th>
                                    <th>Answer</th>
                                    <!--<th>Mark</th>-->
                                    <!--<th>Action</th>-->
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
    function fetchUsers(exam_id, page = 1, search = '', perPage = 1) {
    $.ajax({
        type: 'GET',
        url: "{{ route('fetchQuestionsForTrainee', ['exam_id' => '__exam_id__']) }}".replace('__exam_id__', exam_id),
        data: { page: page, search: search, per_page: perPage },
        dataType: "json",
        success: function(response) {
            $('#total-users').text(response.total_users);
            $('tbody').html("");
            $('#user_id').val(response.user_id);  

            $.each(response.users, function(key, item) {
                $('#table1').append(
                    '<tr>\
                        <td>' + (key + 1) + '</td>\
                        <td>' + item.question_name + ' (<strong>' + item.question_mark + 'Mks</strong>)</td>\
                        <td>\
                            <form class="answerForm" data-question_id="' + item.id + '" data-exam_id="' + response.exam_id + '" data-user_id="' + response.user_id + '" data-question_mark="' + item.question_mark + '">\
                                <select class="form-select selected-answer" name="selected_answer" required>\
                                    <option value="">-- Choose Answer --</option>\
                                    <option value="A">A</option>\
                                    <option value="B">B</option>\
                                    <option value="C">C</option>\
                                    <option value="D">D</option>\
                                </select>\
                                <button type="submit" class="btn btn-primary btn-sm mt-1 submitAnswerBtn">Submit</button>\
                                <p class="answer-feedback mt-1"></p>\
                            </form>\
                        </td>\
                        <td class="your-answer"></td>\
                        <td class="correct-answer"></td>\
                        <td class="score"></td>\
                    </tr>'
                );
            });

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
                const row = form.closest('tr');

                // Validate if an answer is selected
                if (!selected_answer) {
                    alert("Please select an answer before submitting.");
                    return;
                }

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
                        // Display feedback message
                        if (response.correct) {
                            feedbackElement.html('<span class="text-success"><strong>Your answer is correct!</strong></span>');
                        } else {
                            feedbackElement.html('<span class="text-danger"><strong>Your answer is incorrect, the correct answer is ' + response.correct_answer + '.</strong></span>');
                        }

                        // Update table with student's answer, correct answer, and score
                        row.find('.your-answer').html('<span class="text-primary"><strong>' + selected_answer + '</strong></span>');
                        row.find('.correct-answer').html('<span class="text-success"><strong>' + response.correct_answer + '</strong></span>');
                        row.find('.score').html('<span class="text-info"><strong>' + response.score + '</strong></span>');

                        // Hide the form after submission
                        form.hide();
                    },
                    error: function(xhr) {
                        alert("Error submitting answer. Please try again.");
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