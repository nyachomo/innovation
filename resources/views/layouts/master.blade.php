<?php
 use App\Models\Setting;
 $setting=Setting::select('company_name','company_logo','company_motto','company_mission','company_vission')->first();
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jun 2022 10:54:41 GMT -->
<head>
        <meta charset="utf-8" />
       
        <title>
        @if(!empty($setting->company_name))
         {{$setting->company_name}}
        @else
         Techsphere Training Institute
        @endif

        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- third party css -->
        <link href="{{asset('assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
        <link href="{{asset('assets/css/pagination.css')}}" type="text/css">
        <!-- App css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>

        <!--text editor-->
        <link href="{{asset('assets/css/vendor/quill.core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/vendor/quill.snow.css')}}" rel="stylesheet" type="text/css" />
        <!-- SimpleMDE css -->
       <link href="{{asset('assets/css/vendor/simplemde.min.css')}}" rel="stylesheet" type="text/css" />
       <script src="https://use.fontawesome.com/d79a9c14ef.js"></script>

       <script src="https://cdn.tiny.cloud/1/krfz17eg92fzkqudwvql9jzu1xevin49e4qwz97unmaccw2m/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
       

       <!-- Place the first <script> tag in your HTML's <head> -->
      <script src="https://cdn.tiny.cloud/1/krfz17eg92fzkqudwvql9jzu1xevin49e4qwz97unmaccw2m/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

     <!--Google fonts-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">




        <!-- third party css -->
        <link href="{{asset('assets/css/vendor/dataTables.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/vendor/responsive.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/vendor/buttons.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/vendor/select.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/vendor/fixedHeader.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/vendor/fixedColumns.bootstrap5.css')}}" rel="stylesheet" type="text/css" />
        <!-- third party css end -->

        <!-- App css -->
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>


            <!-- Smartsupp Live Chat script 
            <script type="text/javascript">
            var _smartsupp = _smartsupp || {};
            _smartsupp.key = 'b7f9e59215dfeb4a10a833748dc3307a58941cfa';
            window.smartsupp||(function(d) {
            var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
            s=d.getElementsByTagName('script')[0];c=d.createElement('script');
            c.type='text/javascript';c.charset='utf-8';c.async=true;
            c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
            })(document);
            </script>
            <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>-->


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
    background-color: #39ac73; /* Green for active page */
  }


        .linkHead{
            color:white !important;
            font-size:16px !important;
        }

        thead{
            background-color:#000033;
            color:white;
        }

        .darkMode{
            background-color:#39ac73;
            color:white;
        }

        .bodyColor{
            background-color:#000033 !important; 
        }

        .time-button {
            font-size: 15px;
            /*padding: 10px 20px;*/
            background-color: #fe730c;
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            height:30px;
        }

        .time-button:hover {
            background-color: #66e0ff;
        }

        body{
            font-family: "Afacad Flux", sans-serif !important;
           
            font-size:14px;
            text-transform: uppercase;
        }


        .labelSpan{
            color:red;
        }

        .btn{
            border-radius:20px;
        }

        .card{
        
        }

        ul li a{
            color:white !important;
           
        }

       
      

    </style>


    </head>
    <body class="loading" data-layout-color="light" data-leftbar-theme="dark" data-layout-mode="fluid" data-rightbar-onstart="true">
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-white">
                    <span class="logo-lg" style="background-color:white;">
                        <img src="{{asset('images/logo/'.$setting->company_logo)}}" alt="" height="100">
                    </span>
                   
                </a>
                <br>
    
                <div class="h-100 bodyColor" id="leftside-menu-container" data-simplebar style="padding-top:30px;">

                    <!--- Sidemenu -->
                    @if(Auth::check() && Auth::user()->role=='Admin')
                        <ul class="side-nav">
                            <!--<li class="side-nav-title side-nav-item linkHead"><b>HOME</b></li>-->

                            <li class="side-nav-item">
                                <a href="{{route('home')}}" class="side-nav-link">
                                    <i class="uil-comments-alt text-warning"></i>
                                    <span class="menu-arrow"></span>
                                    <span> VIEW DASHBOARD </span>
                                </a>
                            </li>

                            <li class="side-nav-item">
                                <a href="{{route('userAccount')}}" class="side-nav-link">
                                    <i class="uil-comments-alt text-danger"></i>
                                    <span class="menu-arrow"></span>
                                    <span> MANAGE ACCOUNT</span>
                                </a>
                            </li>

                            <li class="side-nav-item">
                                <a href="{{route('ShowSettings')}}" class="side-nav-link">
                                    <i class="uil-comments-alt text-warning"></i>
                                    <span class="menu-arrow"></span>
                                    <span> MANAGE SETTINGS </span>
                                </a>
                            </li>

                            <li class="side-nav-item">
                                <a href="{{route('showAdministrator')}}" class="side-nav-link">
                                    <i class="uil-comments-alt text-warning"></i>
                                    <span class="menu-arrow"></span>
                                    <span> MANAGE TEACHERS</span>
                                </a>
                            </li>

                            <li class="side-nav-item">
                                <a href="{{route('showCourses')}}" class="side-nav-link">
                                    <i class="uil-comments-alt text-warning"></i>
                                    <span class="menu-arrow"></span>
                                    <span> MANAGE PROGRAMS</span>
                                </a>
                            </li>



                            <!--<li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                    <i class="uil-home-alt text-danger"></i>
                                    <span> Manage All Users </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarDashboards">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{route('showAdministrator')}}">Aministrators</a>
                                        </li>
                                        
                                        <li><a href="{{route('showTrainees')}}">Trainees</a></li>
                                        <li><a href="{{route('showApplicants')}}">Applicants</a></li>
                                    </ul>
                                </div>
                            </li>-->

                            <!--<li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                    <i class="uil-store text-info"></i>
                                    <span> Manage Programs </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarEcommerce">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{route('showCourses')}}">Courses</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->


                            <!--<li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
                                    <i class="uil uil-tachometer-fast text-secondary"></i>
                                    <span> Manage Classes </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCrm">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{route('showClases')}}">Clases</a>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </li>-->

                            <!--<li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
                                    <i class="uil uil-tachometer-fast text-secondary"></i>
                                    <span> Timetable </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCrm">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{route('showTimeTable')}}">Timetable</a>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </li>


                            <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarCrm" aria-expanded="false" aria-controls="sidebarCrm" class="side-nav-link">
                                    <i class="uil uil-tachometer-fast text-secondary"></i>
                                    <span> Class Notes </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarCrm">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{route('showClassNotes')}}">Class Notes</a>
                                        </li>
                                    
                                    </ul>
                                </div>
                            </li>-->


                           
                           

                           <!-- <li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                                    <i class="uil-envelope text-danger"></i>
                                    <span> Notes</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarEmail">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{route('showTopics')}}">Notes</a>
                                        </li>
                                        <li>
                                            <a href="apps-email-read.html">Read Email</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->




                            <li class="side-nav-item">
                                <a  href="{{route('showSchools')}}" class="side-nav-link">
                                    <i class="uil-package"></i>
                                    <span> MANAGE SCHOOLS </span>
                                    <span class="menu-arrow"></span>
                                </a>
                           </li>

                           <li class="side-nav-item">
                                <a  href="{{route('showLeeds')}}" class="side-nav-link">
                                    <i class="uil-package"></i>
                                    <span> MANAGE LEEDS </span>
                                    <span class="menu-arrow"></span>
                                </a>
                           </li>



                            <!--<li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                                    <i class="uil-clipboard-alt text-warning"></i>
                                    <span> Participants</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarTasks">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{route('showLeeds')}}">Leeds</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>-->

                        

                            <!--<li class="side-nav-item">
                                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                                    <i class="uil-copy-alt"></i>
                                    <span> MANAGE ASSESMENT</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarPages">
                                    <ul class="side-nav-second-level">
                                        <li>
                                            <a href="{{route('showExams')}}">Assignment</a>
                                        </li>

                                        <li>
                                            <a href="{{route('adminManageCats')}}">Cats</a>
                                        </li>

                                        <li>
                                            <a href="{{route('adminManageFinalExam')}}">Final Exam</a>
                                        </li>

                                        

                                        
                                    </ul>
                                </div>
                            </li>-->


                        </ul> 
                    @endif



                    @if(Auth::check() && Auth::user()->role=='High_school_teacher')
                    <ul class="side-nav">

                       <li class="side-nav-item">
                            <a href="{{route('home')}}" class="side-nav-link">
                                <i class="uil-comments-alt text-warning"></i>
                                <span class="menu-arrow"></span>
                                <span> SHOW DASHBOARD </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                                <a href="{{route('userAccount')}}" class="side-nav-link">
                                    <i class="uil-comments-alt text-danger"></i>
                                    <span class="menu-arrow"></span>
                                    <span> MANAGE PROFILE</span>
                                </a>
                            </li>


                        <li class="side-nav-item">
                            <a href="{{route('teacherShowLeeds')}}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span class="menu-arrow"></span>
                                <span>ENROLL STUDENTS</span>
                            </a>
                        </li>

                      

                    </ul> 
                    @endif




                     <!--- Sidemenu -->
                    @if(Auth::check() && Auth::user()->role=='Trainee')
                    <ul class="side-nav">

                       <li class="side-nav-title side-nav-item linkHead"><b>HOME</b></li>

                        <li class="side-nav-item">
                            <a href="{{route('home')}}" class="side-nav-link">
                                <i class="uil-comments-alt text-warning"></i>
                                <span class="menu-arrow"></span>
                                <span> Dashboard </span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{route('userAccount')}}" class="side-nav-link">
                                <i class="uil-comments-alt text-danger"></i>
                                <span class="menu-arrow"></span>
                                <span> My Account</span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a href="{{route('traineeViewCourse')}}" class="side-nav-link">
                                <i class="uil-home-alt text-info"></i>
                                <span class="menu-arrow"></span>
                                <span> My Course</span>
                            </a>
                        </li>


                        <li class="side-nav-item">
                            <a href="{{route('showClassLink')}}" class="side-nav-link">
                                <i class="uil-home-alt text-info"></i>
                                <span class="menu-arrow"></span>
                                <span> Class Link</span>
                            </a>
                        </li>

                        <li class="side-nav-item">
                            <a href="{{route('showClassNotes')}}" class="side-nav-link">
                                <i class="uil-home-alt text-info"></i>
                                <span class="menu-arrow"></span>
                                <span> Class Notes</span>
                            </a>
                        </li>

                        
                       


                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarTasks" aria-expanded="false" aria-controls="sidebarTasks" class="side-nav-link">
                                <i class="uil-clipboard-alt"></i>
                                <span> Assesment</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarTasks">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="{{route('traineeViewAssignment')}}">Assignment</a>
                                    </li>
                                    <li>
                                        <a href="{{route('traineeViewCats')}}">Cats</a>
                                    </li>
                                    <li>
                                        <a href="{{route('traineeViewFinalExam')}}">Final Exam</a>
                                    </li>
                                </ul>
                            </div>
                        </li>



                        <li class="side-nav-item">
                            <a href="{{route('traineeViewFeePayment')}}" class="side-nav-link">
                                <i class="uil uil-tachometer-fast text-danger"></i>
                                <span class="menu-arrow"></span>
                                <span>Fee Payment</span>
                            </a>
                        </li>


                       

                    </ul> 
                    @endif


                    @if(Auth::check() && Auth::user()->role=='Data_clerk')
                    <ul class="side-nav">

                        <li class="side-nav-title side-nav-item"><b>HOME</b></li>

                        <li class="side-nav-item">
                            <a href="{{route('showLeeds')}}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span class="menu-arrow"></span>
                                <span>Leeds</span>
                            </a>
                        </li>

                      

                    </ul> 
                    @endif

                   

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                                
                            </li>

                            <!--WATCH-->
                                 <li class="dropdown notification-list" style="padding-top:20px;margin-right:100px"><button class="btn btn-success btn-sm rounded-pill"id="timeButton">00:00:00</button> </li>
                            <!--END OF WATCH-->
                        
                            <!--NOTIFICATION-->
                            <!--NOTIFICATION-->
                           
                            
                           
                            

                            <li class="dropdown notification-list">
                                <a class="bodyColor nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                    aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img src="{{asset('images/profile/profile.png')}}" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        @if(Auth::check())
                                        <span class="account-user-name"><b>{{Auth::user()->firstname}} {{Auth::user()->secondname}}</b></span>
                                        <span class="account-position">{{Auth::user()->role}}</span>
                                        @else

                                        <span class="account-user-name">Guest</span>
                                        <span class="account-position">Guest</span>

                                        @endif
                                       
                                        
                                    </span>
                                </a>
                                <div class="bodyColor dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <h6 class="text-overflow m-0" style="color:white">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="{{route('userAccount')}}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-lock-outline me-1"></i>
                                        <span>Dashboard</span>
                                    </a>

                                    <!-- item-->
                                    <a href="{{route('userAccount')}}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>My Account</span>
                                    </a>

                                    @if(Auth::check() && Auth::user()->role=='Admin')
                                     <a href="{{route('ShowSettings')}}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>Settings</span>
                                    </a>
                                    @endif

                                  

                                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="mdi mdi-logout me-1"></i>
                                            <span>Logout</span>

                                    </a>
                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    
                                </div>
                            </li>



                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <div class="app-search dropdown d-none d-lg-block" style="padding-top:15px">
                                @if(!empty($setting->company_name))
                                <h4>{{$setting->company_name}}</h4>
                                @else
                                <h2>Collaboration And Linkages Portal</h2>
                                @endif
                        </div>

                        
                    </div>
                    <!-- end Topbar -->
                    
                    <!-- Start Content-->
                    <div class="container-fluid">

                      @yield('content')

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © TECHSPHERE TRAINING INSTITUTE
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="">About</a>
                                    <a href="">Support</a>
                                    <a href="">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->

        <!-- bundle -->
        <script src="{{asset('assets/js/vendor.min.js')}}"></script>
        <script src="{{asset('assets/js/app.min.js')}}"></script>

        <!-- third party js -->
        <script src="{{asset('assets/js/vendor/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{asset('assets/js/pages/demo.dashboard.js')}}"></script>
        <!-- end demo js-->

         <!-- demo app -->
         <script src="{{asset('jquery.min.js')}}"></script>
        <!-- end demo js-->


        <!-- quill js -->
        <script src="{{asset('assets/js/vendor/quill.min.js')}}"></script>
        <!-- quill Init js-->
        <script src="{{asset('assets/js/pages/demo.quilljs.js')}}"></script>

        <!-- SimpleMDE js -->
        <script src="{{asset('assets/js/vendor/simplemde.min.js')}}"></script>
        <!-- SimpleMDE demo -->
        <script src="{{asset('assets/js/pages/demo.simplemde.js')}}"></script>


        <!-- plugin js -->
        <script src="{{asset('assets/js/vendor/dropzone.min.js')}}"></script>
        <!-- init js -->
        <script src="{{asset('assets/js/ui/component.fileupload.js')}}"></script>









<script>
    // Function to update the time on the button
    function updateTime() {
        const button = document.getElementById('timeButton');
        const now = new Date();
        let hours = now.getHours();
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        
        // Determine AM or PM
        const amPm = hours >= 12 ? 'PM' : 'AM';
        
        // Convert hours to 12-hour format
        hours = hours % 12 || 12;

        // Format time string
        const timeString = `${hours.toString().padStart(2, '0')}:${minutes}:${seconds} ${amPm}`;
        button.textContent = timeString;
    }

    // Update the time every second
    setInterval(updateTime, 1000);

    // Initialize the button with the current time
    updateTime();
</script>



    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    <script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
    </script>

        
        

        @yield('scripts')

    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jun 2022 10:55:57 GMT -->
</html>