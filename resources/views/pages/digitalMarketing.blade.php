@extends('layouts.website')
@section('content')

<?php
use App\Models\Course;
$courses=Course::where('course_status','Active')->get();
?>

<section class="bannerSection bannerPageSection">
    <div class="innerBannerPageSection">
        <div class="bannerContent text-center">
        <h1 style="color: #ffffff;"><strong>Digital Marketing</strong></h1>
            <ul class="breadcrumbs">
            <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
            <a href="#" style="color: #ffffff;">Digital Marketing</a></li>
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
                                <h4 class="card-title">Digital Marketing</h4>
                                 
                                 <p>
                                  Techsphere offers the best Advanced Digital Marketing course, providing detailed training in the 
                                  latest techniques and strategies. Students gain hands-on experience in SEO, SEM, social media marketing,
                                   email marketing, and more. The curriculum is designed by industry experts to ensure relevance and 
                                   effectiveness in today's dynamic digital landscape. With a focus on practical learning, participants 
                                   work on real-world projects to develop actionable skills. Expert instructors provide personalized 
                                   guidance and mentorship throughout the course. Techsphere' Advanced Digital Marketing course equips 
                                   participants with the tools and knowledge to excel in the competitive digital marketing field. 
                                   Join Techsphere to unlock your potential and accelerate your career in digital marketing.
                                 </p>
                              
                                 <h4 class="card-title">Course Overview</h4>
                                  <p>
                                    Techsphere offers an advanced digital marketing course designed to equip students with the latest 
                                    industry skills and knowledge. Our comprehensive curriculum covers all essential aspects of digital 
                                    marketing, ensuring you become proficient in various tools and techniques. We are committed to helping 
                                    you launch a successful career in digital marketing. 
                                    Techsphere is the best institute for Advanced Digital Marketing Training.
                                  </p>

                                <h4 class="card-title">Course Objectives</h4>
                                 <p>
                                     The primary objective of the course is to provide students with a thorough understanding of digital marketing 
                                     strategies and practices. By the end of the course, you will be able to:
                                     <ol>
                                         <li>Develop and implement effective digital marketing campaigns.</li>
                                         <li>Utilize various digital marketing tools and platforms.</li>
                                         <li>Analyze and interpret data to optimize marketing efforts.</li>
                                         <li>Understand the nuances of different digital channels, including SEO, SEM, social media, email marketing, and content marketing.</li>
                                     </ol>
                                 </p>

                                 <h4 class="card-title">What you will learn</h4>
                                    <p>
                                        <ol>
                                             <li>Search Engine Optimization (SEO): Techniques to improve website ranking on search engines.</li>
                                             <li>Search Engine Marketing (SEM): Strategies for paid advertising on search engines.</li>
                                             <li>Social Media Marketing (SMM): Managing and promoting brands on social media platforms.</li>
                                             <li>Content Marketing: Creating and distributing valuable content to attract and engage target audiences.</li>
                                             <li>Email Marketing: Crafting effective email campaigns for customer engagement and retention.</li>
                                             <li>Web Analytics: Analyzing website data to enhance marketing strategies.</li>
                                             <li>Affiliate Marketing: Understanding and implementing affiliate marketing techniques.</li>
                                             <li>Mobile Marketing: Optimizing marketing strategies for mobile devices.</li>
                                        </ol>
                                    </p>
                                
                                <h4 class="card-title">Career Growth after the Course:-</h4>
                                 <p>
                                    The field of digital marketing offers vast opportunities for career growth. Starting as a digital 
                                    marketing executive, you can progress to roles such as:
                                    <ol>
                                        <li>Digital Marketing Manager</li>
                                        <li>SEO Specialist</li>
                                        <li>SEM Specialist</li>
                                        <li>Social Media Manager</li>
                                        <li>Content Strategist</li>
                                        <li>Digital Marketing Analyst With continuous learning and adaptation to new trends, your career trajectory can lead to senior management positions, including Chief Marketing Officer (CMO).</li>
                                    </ol>
                                 </p>

                                <h4 class="card-title">Job Responsibilities:-</h4>
                                  <p>
                                    As a digital marketing professional, your key responsibilities will include:
                                    <ol>
                                        <li>Developing and implementing digital marketing campaigns.</li>
                                        <li>Managing and optimizing social media accounts.</li>
                                        <li>Conducting keyword research and optimizing content for SEO.</li>
                                        <li>Analyzing web traffic and metrics to enhance marketing strategies.</li>
                                        <li>Creating engaging and relevant content for various digital channels.</li>
                                        <li>Managing online advertising campaigns and budgets.</li>
                                        <li>Collaborating with other marketing team members to achieve business goals.</li>
                                    </ol>
                                  </p>

                                <h4 class="card-title">Training Certificate</h4>
                                   <p>
                                    Upon successful completion of the course, you will receive a certification from Techsphere, 
                                    recognized by top employers in the industry. This certification validates your skills and knowledge 
                                    in digital marketing, giving you an edge in the job market. Techsphere is the best institute for 
                                    Advanced Digital Marketing Training.
                                   </p>
                                <h4 class="card-title">Mock Interviews:-</h4>
                                 
                                  <p>
                                    Techsphere offers mock interview sessions to prepare you for real-world job interviews. 
                                    These sessions are conducted by industry experts and provide valuable feedback to help you improve 
                                    your performance and increase your confidence.
                                  </p>

                                <h4 class="card-title">Projects:-</h4>
                                    <p>
                                      Hands-on projects are an integral part of our digital marketing course. You will work on real-world
                                       projects that allow you to apply theoretical knowledge to practical situations. These projects will 
                                       be a significant addition to your portfolio, showcasing your ability to manage and execute 
                                       successful digital marketing campaigns.
                                      Enroll in Techsphere today to start your journey in the exciting field of digital marketing and 
                                      secure a bright future with our advanced digital marketing course .
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