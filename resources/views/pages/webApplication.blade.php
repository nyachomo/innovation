@extends('layouts.website')
@section('content')

<?php
use App\Models\Course;
$courses=Course::where('course_status','Active')->get();
?>
<section class="bannerSection bannerPageSection">
    <div class="innerBannerPageSection">
        <div class="bannerContent text-center">
        <h1 style="color: #ffffff;"><strong>Web Application Development</strong></h1>
            <ul class="breadcrumbs">
            <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
            <a href="#" style="color: #ffffff;">Web Application Development</a></li>
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
                                <h4 class="card-title">Web Application Development</h4>
                                <p>
                                    Techsphere offers the best web designing training that caters to both beginners 
                                    and experienced professionals looking to enhance their skills in the rapidly growing field of web 
                                    development. With a focus on practical learning and industry-relevant projects, Techsphere ensures 
                                    that students gain hands-on experience in designing responsive, user-friendly websites. 
                                    The training is designed to cover all aspects of web design, including UI/UX, HTML, CSS, JavaScript,
                                     and various frameworks like  React,. Techsphere provides a detailed curriculum 
                                     that balances theoretical knowledge with practical application, making it the best course. 
                                     With expert trainers and personalized attention
                                     Techsphere stands out as the best institute for web designing training . Whether you are
                                     looking to start a new career or upgrade your existing skills, this course will open doors to
                                     various opportunities in the tech industry.
                                </p>
                              
                                <h4 class="card-title">Course Overview</h4>
                                 <p>
                                    The Web Designing Training Course at Techsphere covers the entire domain of web development, 
                                    from basic HTML and CSS to advanced frameworks like Angular, React, and Node.js. Students will 
                                    learn to create visually appealing and functional websites, mastering the art of UI/UX design 
                                    and responsive layouts. The course is designed for anyone interested in web development, from 
                                    beginners to professionals looking to upgrade their skills.
                                 </p>

                                <h4 class="card-title">Course Objectives</h4>
                                 <p>
                                    The main objective of this course is to equip students with the skills necessary to design and 
                                    develop modern, responsive websites. By the end of the course, students will be proficient in 
                                    various web technologies, enabling them to create user-friendly and visually appealing websites 
                                    that meet industry standards.
                                 </p>

                                
                                <h4 class="card-title">Career Growth after the Course:-</h4>
                                  <p>
                                    Web design is a dynamic field with constant innovations and updates. After completing the course,
                                     professionals can advance their careers by specializing in UI/UX design, full-stack development, 
                                     or even moving into project management roles. The demand for skilled web designers is consistently
                                    high, offering excellent career growth opportunities.
                                  </p>

                                  <h4 class="card-title">Career Prospects in Software Testing:-</h4>
                                  <p>
                                    In addition to web design, the training at Techsphere also covers various aspects of software 
                                    testing. Students can pursue careers as software testers, quality assurance engineers, or test 
                                    automation experts, roles that are critical in ensuring the reliability and performance of software 
                                    applications.
                                  </p>

                                <h4 class="card-title">Job Responsibilities:-</h4>
                                <p>
                                    As a web designer, your responsibilities will include creating and maintaining websites, 
                                    ensuring they are user-friendly and responsive, and working closely with clients and developers 
                                    to meet project goals. You may also be involved in testing websites to ensure they meet industry 
                                    standards and client specifications.
                                </p>
                               

                                <h4 class="card-title">Training Certificate</h4>
                                  <p>
                                    Upon completing the course, students will receive a certification from Techsphere, recognized in 
                                    the industry. This certificate will validate your skills and knowledge, making you a competitive 
                                    candidate in the job market.
                                  </p>
                                <h4 class="card-title">Mock Interviews:-</h4>
                                 
                                 <p>
                                    Techsphere provides mock interview sessions as part of the training, helping students prepare for 
                                    real-world job interviews. These sessions are designed to build confidence and improve communication 
                                    skills, ensuring students are well-prepared for their job search.
                                 </p>

                                <h4 class="card-title">Projects:-</h4>
                                  <p>
                                    Throughout the course, students will work on various projects that simulate real-world scenarios. 
                                    These projects are designed to reinforce learning and provide practical experience in web designing 
                                    and software testing.
                                  </p>

                                 <h4 class="card-title">Why Techsphere is the Best Institute?</h4>
                                 <p>
                                    Techsphere is the best institute for web designing training  due to its comprehensive curriculum, 
                                    experienced trainers, and state-of-the-art infrastructure. The institute offers both online and 
                                    offline courses, providing flexibility for students. With 100% placement assistance, personalized 
                                    attention, and a focus on practical learning, Techsphere ensures that students are well-prepared 
                                    for their careers.
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