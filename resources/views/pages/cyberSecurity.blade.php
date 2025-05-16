@extends('layouts.website')
@section('content')

<?php
use App\Models\Course;
$courses=Course::where('course_status','Active')->get();
?>
<section class="bannerSection bannerPageSection">
    <div class="innerBannerPageSection">
        <div class="bannerContent text-center">
        <h1 style="color: #ffffff;"><strong>Cybersecurity And Ethical Hacking</strong></h1>
            <ul class="breadcrumbs">
            <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
            <a href="#" style="color: #ffffff;">Cybersecurity And Ethical Hacking</a></li>
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
                            <h4 class="card-title">Cyber Security</h4>
                                
                                <p>
                                At Techsphere, we provide both the best  course for Cybersecurity,
                                Our curriculum is designed by industry experts and includes 
                                hands-on projects, mock interviews, and practical exercises to give you a deep understanding of 
                                cybersecurity practices. Our state-of-the-art facilities and supportive learning environment make us
                                the best institute for Cybersecurity Training.
                                </p>
                            
                                <h4 class="card-title">Course Overview</h4>
                                <p>
                                The Cybersecurity Training at Techsphere is a comprehensive program that covers a broad spectrum of 
                                cybersecurity topics. The course includes:
                                <ol>
                                        <li>Fundamentals of Cybersecurity</li>
                                        <li>Network Security</li>
                                        <li>Cryptography</li>
                                        <li>Ethical Hacking</li>
                                        <li>Incident Response</li>
                                        <li>Security Compliance and Governance</li>
                                        <li>Threat Analysis</li>
                                        <li>Security Risk Management</li>
                                        <li>Penetration Testing</li>
                                </ol>
                                This detailed curriculum ensures that you gain a holistic understanding of cybersecurity, preparing 
                                you to tackle various security challenges effectively.
                                </p>

                            <h4 class="card-title">Course Objectives</h4>
                                <p>
                                The primary objective of our Cybersecurity Training is to:
                                    <ol>
                                        <li>Provide a solid foundation in cybersecurity principles and practices</li>
                                        <li>Equip students with the skills needed to identify and mitigate security threats.</li>
                                        <li>Develop proficiency in using various cybersecurity tools and technologies.</li>
                                        <li>Prepare students for industry-recognized certifications.</li>
                                        <li>Enhance problem-solving and analytical skills specific to cybersecurity scenarios.</li>
                                        <li>Offer practical experience through real-world projects and case studies</li>
                                    </ol>
                                </p>

                                <h4 class="card-title">Why Choose Cybersecurity as a Career?</h4>
                                <p>
                                    Cybersecurity is one of the fastest-growing fields in the tech industry. Here are some reasons to choose cybersecurity as a career:
                                    <ol>
                                        <li>High Demand: With the increasing number of cyber threats, the demand for cybersecurity professionals is at an all-time high.</li>
                                        <li>Lucrative Salaries: Cybersecurity professionals are among the highest-paid in the IT sector.</li>
                                        <li>Job Security: Cybersecurity roles offer strong job stability due to the ongoing need for skilled professionals.</li>
                                        <li>Diverse Opportunities: There are various specializations within cybersecurity, such as ethical hacking, security analysis, and incident response.</li>
                                        <li>Impactful Work: Working in cybersecurity means protecting critical data and systems, which is highly rewarding.</li>
                                    </ol>
                                </p>
                            
                            <h4 class="card-title">Career Growth after the Course:-</h4>
                                <p>
                                Completing the Cybersecurity Training at techsphere opens up numerous career opportunities, including roles such as:
                                <ol>
                                    <li>Security Analyst</li>
                                    <li>Ethical Hacker</li>
                                    <li>Network Security Engineer</li>
                                    <li>Incident Response Specialist</li>
                                    <li>Cybersecurity Consultant</li>
                                    <li>Penetration Tester</li>
                                </ol>
                                With experience, you can progress to senior positions like Security Manager, Chief Information Security 
                                Officer (CISO), 
                                or Security Architect.
                                </p>

                            <h4 class="card-title">Job Responsibilities:-</h4>
                                <p>
                                Cybersecurity professionals are responsible for:
                                <ol>
                                    <li>Identifying and mitigating security threats.</li>
                                    <li>Conducting security assessments and audits.</li>
                                    <li>Implementing security measures and controls.</li>
                                    <li>Monitoring network traffic for suspicious activity</li>
                                    <li>Responding to security incidents and breaches.</li>
                                    <li>Developing and updating security policies and procedures.</li>
                                    <li>Educating employees about cybersecurity best practices.</li>
                                </ol>
                                </p>

                            <h4 class="card-title">Training Certificate</h4>
                                <p>
                                Upon successful completion of the course, you will receive a globally recognized certification from
                                Techsphere. This certificate validates your skills and knowledge, making you a desirable candidate for 
                                employers.
                                </p>
                            <h4 class="card-title">Mock Interviews:-</h4>
                                
                                <p>
                                To ensure you are job-ready, Techsphere conducts mock interviews that simulate real interview 
                                scenarios. This practice helps build your confidence and prepares you for the types of questions and 
                                challenges you may face during actual job interviews.
                                </p>

                                <h4 class="card-title">Projects:-</h4>
                                <p>
                                    Our training program includes hands-on projects that allow you to apply the theoretical 
                                    knowledge you have gained. These projects cover various aspects of cybersecurity, such as network 
                                    security, ethical hacking, and incident response, providing you with practical experience.
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

	