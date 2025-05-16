@extends('layouts.website')
@section('content')

<?php
use App\Models\Course;
$courses=Course::where('course_status','Active')->get();
?>
  
<section class="bannerSection bannerPageSection">
    <div class="innerBannerPageSection">
        <div class="bannerContent text-center">
        <h1 style="color: #ffffff;"><strong>Full Stack Software Engineering</strong></h1>
            <ul class="breadcrumbs">
            <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
            <a href="#" style="color: #ffffff;">Fullstack Software Engineering</a></li>
            </ul>
        </div>
    </div>
</section>




<section class="cardSection bg-light" style="padding-bottom: 40px; padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">

                <div class="card">
                        
                        <div class="card-body">
                            <h4 class="card-title">Full Stack Software Engineering</h4>
                                
                                <p>
                                    Techsphere is the best institute for python full stack training, offering a detailed course designed to
                                    enhance your skills needed to excel in the competitive field of web development. With a curriculum 
                                    that covers both front-end and back-end technologies, you will learn to build dynamic, responsive, 
                                    and user-friendly websites and applications. The training is led by industry experts who provide 
                                    hands-on experience through projects and real-world scenarios, ensuring you are job-ready upon 
                                    completion. Additionally, Techsphere offers valuable resources like mock interviews and training 
                                    certificates to boster your confidence and credentials.
                                </p>
                            
                                <h4 class="card-title">Course Overview</h4>
                                <p>
                                    The php full stack training Course at techsphere covers all aspects of web development, 
                                    including HTML, CSS, JavaScript, PHP, MySQL, and popular frameworks like Laravel. The course is 
                                    structured to take you from basic concepts to advanced techniques, ensuring a deep understanding 
                                    of both client-side and server-side programming.
                                </p>
                            

                            <h4 class="card-title">Course Objectives</h4>
                                <p>
                                The primary objective of this course is to develop proficient PHP full stack developers capable of 
                                designing, developing, and deploying web applications. It aims to provide a robust foundation in web 
                                technologies and enhance problem-solving skills to tackle real-world projects effectively
                                </p>

                                <h4>Things You Will Learn:-</h4>
                                <ol>
                                    <li>HTML5 and CSS3 for structuring and styling web pages</li>
                                    <li>JavaScript and jQuery for interactive user interfaces</li>
                                    <li>PHP for server-side scripting and backend development</li>
                                    <li>MySQL for database management and integration</li>
                                    <li>Laravel framework for building scalable web applications</li>
                                    <li>Version control using Git and GitHub</li>
                                    <li>Deployment of applications on cloud platforms</li>
                                </ol>

                                <h4 class="card-title">Job Responsibilities:-</h4>
                                <p>
                                        As a PHP full stack developer, your responsibilities will include:
                                        <ol>
                                            <li>Developing front-end website architecture</li>
                                            <li>Designing user interactions on web pages</li>
                                            <li>Creating servers and databases for functionality</li>
                                            <li>Ensuring cross-platform optimization and responsiveness</li>
                                            <li>Working alongside graphic designers for web design features</li>
                                            <li>Seeing through a project from conception to finished product</li>
                                            <li>Designing and developing APIs</li>
                                            <li>Meeting both technical and consumer needs</li>
                                        </ol>
                                </p>

                                <h4 class="card-title">Training Certificate:-</h4>
                                <p>
                                Upon successful completion of the course, Techsphere provides a training certificate, which validates 
                                your skills and knowledge in PHP full stack development. This certificate can enhance your resume and 
                                increase your employability.
                                </p>

                                <h4 class="card-title">Mock Interviews:-</h4>
                                <p>
                                Techsphere offers mock interview sessions to help you prepare for job interviews. These sessions are 
                                conducted by industry professionals who provide constructive feedback and tips to improve your performance.
                                </p>

                                <h4 class="card-title">Projects:-</h4>
                                <p>
                                Throughout the course, you will work on several projects that simulate real-world scenarios. These projects include:
                                <ol>
                                        <li>Developing a dynamic website with a CMS</li>
                                        <li>Creating an e-commerce platform</li>
                                        <li>Building a social media application</li>
                                        <li>Implementing a blogging site with user authentication</li>
                                </ol>
                                </p>

                        </div>
                </div>


            </div>

            <div class="col-sm-4">
               
                   <div class="card">
                    
                        <div class="card-body">
                          <h5 class="card-title">Are you interested in this course (Enroll)</h5>
                          <p class="text-success"><b>Note:</b> A none refundable registration fee of Ksh 1000 is required to complete your enrollment</p>
                        <br>

                        <form method="post" action="{{route('register')}}">
                            @csrf
                            <input type="password" name="password"  class="form-control" value="12345678" hidden="true">                  
                            <div class="mb-1">
                                <label class="card-title">Firstname <span class="spanLabel">*<span> </label>
                                <input type="text" name="user_firstname" placeholder="John" class="form-control" required="">       
                            </div>

                            <div class="mb-1">
                                <label class="card-title">secondname</label>
                                <input type="text" name="user_secondname" placeholder="Doe" class="form-control">      
                            </div>

                            <div class="mb-1">
                                <label class="card-title">surname</label>
                                <input type="text" name="user_surname" placeholder="Doe" class="form-control">     
                            </div>



                            <div class="mb-1">
                                <label class="card-title">Email <span class="spanLabel">*<span> </label>
                                <input type="email" name="email"  placeholder="johndoe@gmail.com" class="form-control" required="">    
                            </div>


                            <div class="mb-1">
                                <label class="card-title">Phonenumber <span class="spanLabel">*<span> </label>
                                <input type="text" name="user_phonenumber"  placeholder="07xxxxxxxx" class="form-control" required="">   
                            </div>



                            <div class="mb-1">
                                <label class="card-title">Gender <span class="spanLabel">*<span></label>
                                <select class="form-control" name="gender" required>
                                    <option value="">Select ..</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>     
                            </div>

                        

                            <div class="mb-1">
                                <label class="card-title">Select Course <span class="spanLabel">*<span></label>
                                <select class="form-control" name="course_id" required>
                                        <option value="">Select ..</option>
                                        @if(!empty($courses))
                                            @foreach($courses as $course)
                                                    <option value="{{$course->id}}">{{$course->course_name}}</option>
                                            @endforeach
                                        @endif
                                        
                                    </select>
                        
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn" style="width:100%" data-bs-dismiss="modal">Submit</button>
                            </div>
                        
                        </form>


                        </div>
                        
                    </div>
              

            </div>
        </div>
    </div>
</section>

   




@endsection

	