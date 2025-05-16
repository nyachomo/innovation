@extends('layouts.website')
@section('content')
<?php
use App\Models\Course;
$courses=Course::where('course_status','Active')->get();
?>
<section class="bannerSection bannerPageSection" style="background-image: url('../images/school_five.jpg');">
        <div class="innerBannerPageSection">
          <div class="bannerContent text-center">
            <h1 style="color: #ffffff;"><strong>Corporate Training</strong></h1>
             <ul class="breadcrumbs">
                <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
                <a href="#" style="color: #ffffff;">Corporate Training</a></li>
             </ul>
          </div>
        </div>
      </section>




      
      <section class="cardSection bg-light" style="padding-bottom: 40px; padding-top: 50px;">
        <div class="container">
            <div class="row">
               <div class="col-sm-8">
                   <h3 class="card-title">Corporate Training</h3>
                  <p>
                    Corporate training is a specialized learning and development program designed to enhance the skills, knowledge, 
                    and performance of employees within an organization. It focuses on equipping teams with the latest industry practices,
                     tools, and techniques to improve their efficiency and effectiveness. Corporate training can cover a wide range of 
                     topics, from technical skills like IT certifications to soft skills such as communication, leadership, and teamwork. 
                     The goal is to align the workforce's abilities with the company’s objectives, ensuring that employees are 
                     well-prepared to meet current and future business challenges.
                  </p>

                   <h3 class="card-title">Why Corporate Training is Essential</h3>

                  <p>
                    Corporate training is crucial in today’s fast-paced business environment. It equips employees with the latest skills
                     and knowledge needed to stay competitive and innovative. Well-structured training programs enhance employee 
                     performance, boost productivity, and ensure that your team is aligned with the company’s goals. 
                     Investing in corporate training is not just about skill enhancement—it's about fostering a culture of continuous
                      learning and development that drives long-term success.
                  </p>

                   <h3 class="card-title">What Techsphere Offers in Corporate Training</h3>
                  <p>
                    Techsphere specializes in providing comprehensive corporate training solutions across various domains, including IT,
                     management, and soft skills. Our training programs are customized to meet the specific needs of your organization, 
                     whether it's upskilling your team in the latest technologies, improving leadership skills, or enhancing project 
                     management capabilities. We offer a wide range of courses, from technical certifications like AWS and DevOps to soft 
                     skills training that improves communication and teamwork.
                  </p>

                    <h3 class="card-title">How Techphere Delivers Corporate Training</h3>
                    <p>
                      At Techsphere, we understand that every organization has unique training needs. We offer flexible training delivery 
                      methods, including on-site training at your premises, online sessions, and hybrid models that combine both. 
                      Our experienced trainers bring real-world industry insights, ensuring that your team gains practical, applicable 
                      skills. We use a blend of interactive sessions, hands-on practice, and real-world case studies to ensure that 
                      learning is engaging and effective.
                    </p>

                   <h3 class="card-title">Why Techphere is the Best Choice for Corporate Training</h3>
                   
                   <p>
                    Techphere is the best choice for corporate training because of our commitment to quality, flexibility, and results. 
                    We provide the best online and offline training courses, designed to meet the specific needs of your organization. 
                    Our 100% placement assistance ensures that the skills learned translate into tangible career advancements for your 
                    employees. Additionally, our strong track record with leading companies across various industries makes us a trusted
                     partner in your organization’s growth and success.
                     Choosing Techphere for corporate training means choosing a partner dedicated to empowering your workforce and 
                     driving your company’s success in a competitive market.
 
                   </p>


               </div>

               


              <div class="col-sm-4">
               
                    <div class="card">
                      
                          <div class="card-body">
                           <center> <h5 class="card-title">Enroll</h5></center>
                           

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

	