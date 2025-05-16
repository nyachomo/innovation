@extends('layouts.website')
@section('content')

<?php
use App\Models\Course;
$courses=Course::where('course_status','Active')->get();
?>
<section class="bannerSection bannerPageSection">
    <div class="innerBannerPageSection">
        <div class="bannerContent text-center">
        <h1 style="color: #ffffff;"><strong>Android Application Development</strong></h1>
            <ul class="breadcrumbs">
            <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
            <a href="#" style="color: #ffffff;">Android Application Development</a></li>
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
                            <h4 class="card-title">Android Application Development</h4>
                                <p>
                                Android development is one of the most sought-after skills in today's technology-driven world. 
                                As the demand for Android applications continues to grow, so does the need for proficient 
                                Android developers. Techsphere provides the best Android Training, ensuring you gain the 
                                knowledge and skills required to excel in this dynamic field. Our course is designed to cover 
                                all aspects of Android development, from basic concepts to advanced techniques.
                                </p>
                            <h4 class="card-title">Course Overview</h4>
                                <p>
                                The Android Training course at Techsphere is a comprehensive program designed to provide 
                                a deep understanding of Android development. The course starts with an introduction to Android, 
                                its architecture, and the development environment. You will learn about the Android SDK, different 
                                versions of Android, and setting up your development environment.
                                </p>

                            <h4 class="card-title">Course Objectives</h4>
                            <p>
                                The primary objective of this course is to equip students with the skills and 
                                knowledge required to develop robust Android applications. By the end of the 
                                course, you will be able to:
                                <ol>
                                        <li>Understand the fundamentals of Android development</li>
                                        <li>Create user interfaces using XML and Kotlin</li>
                                        <li>Manage application resources and data</li>
                                        <li>Utilize Android components like activities, services, and broadcast receivers</li>
                                        <li>Implement navigation and user interaction</li>
                                        <li>Access and use web services and APIs</li>
                                        <li>Handle databases and content providers</li>
                                        <li>Debug and test Android applications</li>
                                        <li>Deploy applications on Google Play Store</li>
                                </ol>
                            </p>

                            <h4 class="card-title">Why Choose Android as a career</h4>
                                <p>
                                Choosing Android development as a career opens numerous opportunities due to the widespread use of Android devices. With billions of Android devices in use worldwide, the demand for skilled Android developers is immense. A career in Android development offers creativity, flexibility, and the chance to work on diverse projects. Whether you want to work for a top tech company, a startup, or as a freelance developer, Android development skills can pave the way for a rewarding and lucrative career.
                                </p>
                            <h4 class="card-title">Career Growth after the Course:-</h4>
                                <p>
                                After completing the Android Training Course at techsphere, you can expect 
                                rapid career growth. With the foundational and advanced skills acquired, 
                                you can start as a junior developer and quickly move up to senior developer, 
                                team lead, or project manager roles. Additionally, specialized roles such as 
                                Android UI/UX designer, Android game developer, or Android security expert 
                                are also viable career paths.
                                </p>

                            <h4 class="card-title">Job Responsibilities:-</h4>
                            <p>As an Android developer, your job responsibilities will include:</p>
                            <ol>
                                    <li>Designing and building advanced applications for the Android platform</li>
                                    <li>Collaborating with cross-functional teams to define, design, and ship new features</li>
                                    <li>Working with outside data sources and APIs</li>
                                    <li>Unit-testing code for robustness, including edge cases, usability, and general reliability</li>
                                    <li>Bug fixing and improving application performance</li>
                                    <li>Continuously discovering, evaluating, and implementing new technologies to maximize development efficiency</li>
                                
                            </ol>

                            <h4 class="card-title">Training Certificate</h4>
                            <p>
                            Upon successful completion of the Android Training course, you will receive a certification from Techsphere. This certification is recognized in the industry and adds significant value to your resume, showcasing your expertise in Android development.
                            </p>

                            <h4 class="card-title">Mock Interviews:-</h4>
                                
                                <p>
                                Techsphere provides mock interview sessions as part of the training program. These sessions help you prepare for real job interviews by simulating the interview environment. Our experts provide feedback and tips to improve your performance, boosting your confidence and readiness.
                                </p>

                            <h4 class="card-title">Projects:-</h4>
                                <p>
                                Our Android Training includes multiple hands-on projects that allow you to apply what you've learned in real-world scenarios. These projects cover various aspects of Android development, from basic applications to more complex, feature-rich apps. By the end of the course, you will have a portfolio of projects to showcase to potential employers.
                                </p>

                                <h4 class="card-text">Why techsphere is the Best Institute?</h4>
                                <p>
                                Techsphere stands out as the best institute for Android Training Course due to our:
                                <ol>
                                        <li>Expert instructors with industry experience</li>
                                        <li>Comprehensive curriculum covering all aspects of Android development</li>
                                        <li>Hands-on training with real-world projects</li>
                                        <li>Flexible learning options with the best online and offline courses</li>
                                        <li>Recognized certification</li>
                                        <li>State-of-the-art facilities and supportive learning environment</li>
                                        <li>By choosing techsphere, you are opting for the best Android Training available. Join us and embark on a successful career in Android development today.</li>
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