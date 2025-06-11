@extends('layouts.master')
@section('content')

<?php 
use App\Models\User;
use App\Models\Fee;
use App\Models\StudentAnswer;
use App\Models\Exam;
use App\Models\Question;
use App\Models\School;
use App\Models\Leed;
use App\Models\Course;


$total_schools=count(School::all());
$schools=School::all();
$leeds=count(Leed::all());
$total_courses=count(Course::all());
$courses=Course::all();
$teachers=count(User::where('role','high_school_teacher')->get());
if(Auth::check() && Auth::user()->role=='Trainee'){

    $user_id=Auth::user()->id;
    $fees=Fee::where('user_id',$user_id)->get();
    $debit=Auth::user()->course->course_price?? 0;
    $credit=Fee::where('user_id',$user_id)->sum('amount_paid');
    $balance=$debit-$credit;

//Get all the scores of the assignment of the person that logins.
$uniqueQuestions = StudentAnswer::where('user_id', $user_id)
    ->distinct()
    ->pluck('question_id'); // Get unique question IDs only

    $uniqueExamIds = StudentAnswer::where('user_id', $user_id)
    ->distinct()
    ->pluck('exam_id');


    $assignmentExamIds = Exam::whereIn('id', $uniqueExamIds)
    ->where('is_assignment', 'Yes')
    ->pluck('id');

    //Get the total score for assignment

    $total_question_mark = Question::whereIn('exam_id', $assignmentExamIds)
    ->sum('question_mark');

    $total_student_score=StudentAnswer::whereIn('exam_id', $assignmentExamIds)
    ->where('user_id',$user_id)
    ->sum('score');

    $avgAssignment = ($total_question_mark > 0) 
    ? round(($total_student_score / $total_question_mark) * 30) 
    : 0; // Default value if division is not possible


    //GETTING UNIQUE CATS IDS
    $assignmentCatIds = Exam::whereIn('id', $uniqueExamIds)
    ->where('is_cat', 'Yes')
    ->pluck('id');

    $total_cat_question_mark = Question::whereIn('exam_id', $assignmentCatIds)
    ->sum('question_mark');

    $total_student_cat_score=StudentAnswer::whereIn('exam_id', $assignmentCatIds)
    ->where('user_id',$user_id)
    ->sum('score');

    $avgCat = ($total_cat_question_mark > 0) 
    ? round(($total_student_cat_score / $total_cat_question_mark) * 30) 
    : 0; // Default value if division is not possible




    //GETTING UNIQUE FINAL EXAM IDS
    $assignmentFinalExamIds = Exam::whereIn('id', $uniqueExamIds)
    ->where('is_final_exam', 'Yes')
    ->pluck('id');

    $total_final_exam_question_mark = Question::whereIn('exam_id', $assignmentFinalExamIds)
    ->sum('question_mark');

    $total_student_final_exam_score=StudentAnswer::whereIn('exam_id', $assignmentFinalExamIds)
    ->where('user_id',$user_id)
    ->sum('score');

    $avgFinalExam = ($total_final_exam_question_mark > 0) 
    ? round(($total_student_final_exam_score / $total_final_exam_question_mark) * 30) 
    : 0; // Default value if division is not possible


}



//GETTING THE STUDENT OF THE TEACHER WHO LOGINS
/*
 if(Auth::check() && Auth::user()->role="High_school_teacher"){
   $students=User::with('course')->where('school_id',Auth::user()->school_id)->where('role','Trainee')->get();
  
 }
   */

?>

<!-- 
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                </ol>
            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>
 --> 

<br>



 <!-- end page title -->
 @if(Auth::check() && Auth::user()->role=='Admin')

 <div class="row">
    <div class="col-sm-3">
            <div class="alert alert-success" role="alert">
                <strong>Enrolled Schools</strong> 
                <h1 id="totalExpectedFee">{{$total_schools ?? 0}}</h1>
                <p><a href="{{route('showSchools')}}"> More Info</a></p>
            </div>
    </div>

    <div class="col-sm-3">
            <div class="alert alert-info" role="alert">
                <strong>Enrolled Leeds</strong> 
                <h1 id="totalFeePaid">{{$leeds ?? 0}}</h1>
                <p><a href="{{route('showLeeds')}}"> More Info</a></p>
            </div>
    </div>

    <div class="col-sm-3">
            <div class="alert alert-info" role="alert">
                <strong>Enrolled Teachers</strong> 
                <h1 id="totalFeePaid">{{$teachers ?? 0}}</h1>
                <p><a href="{{route('showAdministrator')}}"> More Info</a></p>
            </div>
    </div>


    <div class="col-sm-3">
            <div class="alert alert-danger" role="alert">
                <strong>Total Programs</strong> 
                <h1 id="balanceToPay">{{$total_courses ?? 0}}</h1>
                <p><a href="{{route('showCourses')}}"> More Info</a></p>
            </div>
    </div>


</div>
 <!-- end page title -->

<div class="row">
    <div class="col-sm-6">
         <div class="card">
            <div class="card-header">
                 <h5>Recently Added Schools</h5>
            </div>
             <div class="card-body">
                  <table class="table table-sm table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Name</th>
                              <!--<th>Location</th>-->
                             <!-- <th>Contact Teacher</th>-->
                              <th>Enrolled</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @if(!empty($schools))
                             @foreach($schools as $key=>$school)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$school->school_name}}</td>
                                    <!--<td>{{$school->school_location}}</td>-->
                                   
                                    <td>
                                        <?php
                                          $school_id=$school->id;
                                          $leeds_count=count(Leed::where('school_id',$school_id)->get());
                                          echo$leeds_count;
                                          
                                        ?>
                                    </td>
                                    <td>
                                    <a href="{{ route('adminshowLeedsPerSchool', $school->id) }}"><span class="badge bg-success"><i class="fa fa-eye"></i> View Leeds</span></a>
                                 </td>

                                </tr>
                             @endforeach
                          @endif
                      </tbody>
                  </table>
             </div>
         </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h5>Recently Added Events</h5>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Leeds</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($courses))
                           @foreach($courses as $key=>$course)
                             <tr>
                                 <td>{{$key+1}}</td>
                                 <td>{{$course->course_name}}</td>
                                 <td>
                                    <?php
                                      $leeds2=Leed::where('course_id',$course->id)->get();
                                      $total_leed= $leeds2->count();
                                      echo$total_leed;
                                    ?>
                                 </td>
                                 <td>
                                    <a href="{{ route('adminshowLeedsPerProgram', $course->id) }}"><span class="badge bg-info"><i class="fa fa-eye"></i>View Leeds</span></a>
                                 </td>
                             </tr>
                           @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- end row -->

 @endif


 @if(Auth::check() && Auth::user()->role=='High_school_teacher')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-success">
                       <i class=" fa fa-user-plus"> </i>  Click Here to Enroll Students
                    </button>
                </div>
               
                <div class="card-body">

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
                              <h1>
                                  <center>1 <sup>st</sup> ANNUAL ICT INNOVATION CHALLANGE</center>
                              </h1>
                        </div>
                    </div>

                    <div class="row">
                        

                    <div class="col-xxl-6 col-sm-6">
                        <div class="card widget-flat bg-success text-white">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                                </div>
                                <h4 class="text-uppercase mt-0">TOTAL PARTICIPANTS (SCHOOLS)</h4>
                                <h3 class="mt-3 mb-3">123</h3>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-xxl-6 col-sm-6">
                        <div class="card widget-flat bg-warning text-white">
                            <div class="card-body">
                                <div class="float-end">
                                    <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
                                </div>
                                <h4 class="text-uppercase mt-0">ENROLLED STUDENTS (MY STUDENTS)</h4>
                                <h3 class="mt-3 mb-3 text-white">4534</h3>
                                
                            </div>
                        </div>
                    </div> <!-- end col-->


                    </div>


                    
                </div> <!-- end card body-->

                <!--card-footer-->
                <div id="pagination-controls" style="float:right"></div>
                <!--end of card-footer-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>





 @endif



@if(Auth::check() && Auth::user()->role=='Trainee')

<!-- end page title --> 

    <div class="row">
        <div class="col-xxl-3 col-sm-3">
            <div class="card widget-flat bg-success text-white">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                    </div>
                    <h6 class="text-uppercase mt-0" title="Customers">Debit</h6>
                    <h3 class="mt-3 mb-3">Ksh {{Auth::user()->course->course_price?? '0'}}.00</h3>
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xxl-3 col-sm-3">
            <div class="card widget-flat bg-primary text-white">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
                    </div>
                    <h5 class="fw-normal mt-0" title="Revenue">Credit</h5>
                    <h3 class="mt-3 mb-3 text-white">{{$credit ?? 'NA'}}</h3>
                    
                </div>
            </div>
        </div> <!-- end col-->


        <div class="col-xxl-3 col-sm-3">
            <div class="card widget-flat bg-warning text-white">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
                    </div>
                    <h5 class="fw-normal mt-0" title="Revenue">Balance</h5>
                    <h3 class="mt-3 mb-3 text-white">{{$balance ?? 'NA'}}</h3>
                    
                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-xxl-3 col-sm-3">
            <a href="{{route('traineeViewCourse')}}">
            <div class="card widget-flat bg-danger text-white">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-currency-usd widget-icon bg-light-lighten rounded-circle text-white"></i>
                    </div>
                    <h5 class="fw-normal mt-0" title="Revenue">Course</h5>
                    <h3 class="mt-3 mb-3 text-white">1</h3>
                    
                </div>
            </div>
            </a>
        </div> <!-- end col-->

    </div>
<!-- end row-->

    <div class="row">

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-header">
                            <h4 class="header-title mb-4">Fee Payments</h4>
                            @if(Auth::user()->has_paid_reg_fee=='Yes')
                            <a style="float:right" href="{{ route('traineePrintingReceiptForRegistration') }}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download Receipt For Registraion</a>
                            @endif
                    </div>
                    <div class="card-body">
                        
                        

                        <table class="table table-sm table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Amount (Ksh)</th>
                                        <th>Date Paid</th>
                                        <th>Menthod</th>
                                        <th>Payment Ref No</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($fees))
                                        @foreach($fees as $key=>$fee)
                                            <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$fee->amount_paid}}</td>
                                            <td>{{$fee->date_paid}}</td>
                                            <td>{{$fee->payment_method}}</td>
                                            <td>{{$fee->payment_ref_no}}</td>
                                            
                                            <td>
                                                <a href="{{ route('downloadReceipt', $fee->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-download"></i> Download Receipt
                                                </a>
                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                    @endif
                                    
                                </tbody>
                        </table>





                    </div>
                    <!-- end card body-->
                </div>
                <!-- end card -->
            </div>
            <!-- end col-->
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                            <h4 class="header-title mb-4">Assesment Analysis</h4>
                            <p>This is your Avarage Assesment</p>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>Assignemt</td>
                                    <td>{{$avgAssignment ?? 'NA'}}  ( <a href="{{route('traineeViewAssignment')}}"> View </a>)</td>
                                </tr>

                                <tr>
                                    <td>Cats</td>
                                    <td>{{$avgCat}} (<a href="{{route('traineeViewCats')}}">View</a>) </td>
                                </tr>

                                <tr>
                                    <td>Final Exam</td>
                                    <td>{{$avgFinalExam}} ( <a href="{{route('traineeViewFinalExam')}}"> View</a>)</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
    </div>






@endif



<!-- Add User modal -->
<div id="feeReminderModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Fee Reminder</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form>
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success" role="alert">
                                    <strong>Notice ! </strong> 
                                    <p>
                                        <ol>
                                            <li>You have fee balance of  Ksh<span id="feeBalance" style="color:red;font-size:20px"> </span></li>
                                            <li> Pay at least Ksh <span id="payment" style="color:red;font-size:20px">*</span> by <span id="endOfMonth" style="color:red;font-size:20px"></span> to avoid interuption</li>
                                        </ol>
                                    </p>
                                </div>

                            </div>
                        </div>

                     
                </div>
                 <!-- /.card-body -->


            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger rounded-pill"  data-bs-dismiss="modal">Close</button>
                
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--end of modal-->




@endsection

@section('scripts')


<script>
        /*Function to check company settings and show modal if necessary
        function fetchFeeBalance() {
            $.ajax({
                url: "{{ route('fetchFeeBalance') }}",
                method: 'GET',
                success: function(response) {
                    // Check the conditions for showing the modal
                    if (response.balance > 0) {
                        $('#feeBalance').text(response.balance);
                        $('#payment').text(response.payment);
                        $('#endOfMonth').text(response.endOfMonth);
                        // Show the modal if both statuses are 1
                        $('#feeReminderModal').modal('show');
                    }
                },
                error: function(error) {
                    console.log('Error fetching company details:', error);
                }
            });
        }

        // Call the function immediately when the page loads
        fetchFeeBalance();

        // Set an interval to run the check every 5 seconds (5000 milliseconds)
        setInterval(fetchFeeBalance, 5000);
        */





        $(document).ready(function(){



        fetchUsers();






        function fetchUsers(page = 1, search = '', perPage = 20) {
            $.ajax({
                type: 'GET',
                url: "{{route('fetchHighStudents')}}",
                data: { page: page, search: search, per_page: perPage },
                dataType: "json",
                success: function(response) {
                    // Update total users
                    $('#total-users').text(response.total_users);

                    // Clear and repopulate the table
                    $('tbody').html("");
                    $.each(response.users, function(key, item) {
                        const baseUrl = "{{ route('ViewTraineeProfile') }}";
                        $('#table1').append(
                            '<tr>\
                                <td>' + (key + 1) + '</td>\
                                <td>' + item.firstname + ' ' + item.secondname + ' ' + item.lastname + '</td>\
                                <td>' + item.phonenumber + '</td>\
                                <td>' + item.email + '</td>\
                                <td>' + item.school_name + '</td>\
                                <td>' + item.course_name + '</td>\
                                <td><a class="text-warning dropdown-item viewQuestionsBtn" href="' + baseUrl + '?student_id=' + item.id + '" target="_blank"><i class="fa fa-eye-slash" aria-hidden="true"></i> View Questions</a></td>\
                            </tr>'
                        );
                    });

                    // Render pagination
                    renderPagination(response.pagination, search, perPage);
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