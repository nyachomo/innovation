@extends('layouts.website')
@section('content')


<?php
use App\Models\Course;
$courses=Course::where('course_status','Active')->get();
?>



<section class="bannerSection bannerPageSection" style="background-image: url('../images/school_five.jpg');">
    <div class="innerBannerPageSection">
        <div class="bannerContent text-center">
        <h1 style="color: #ffffff;"><strong>Online Industrial Attachment</strong></h1>
            <ul class="breadcrumbs">
            <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
            <a href="#" style="color: #ffffff;">Online Industrial Attachment</a></li>
            </ul>
        </div>
    </div>
    </section>






    <section class="cardSection bg-light" style="padding-bottom: 40px; padding-top: 50px;">
        <div class="container">
            <div class="row">
               <div class="col-sm-8">
                   <h3 class="card-title">Online Industrial Attachment</h3>
                    <p>
                        Online industrial attachment is a structured program designed to bridge the gap between academic learning and real-world industry experience. It provides students and early-career professionals with the opportunity to gain hands-on exposure to their chosen field through remote internships and project-based learning. This approach allows participants to work on real industry tasks, develop practical skills, and gain valuable insights into workplace dynamics—all from the comfort of their own location.
                    </p>

                

                   <h3 class="card-title">What We offer In Online Industrial Attachment</h3>
                     <p>
                        Teschsphere provides cutting-edge online industrial attachment programs tailored to various industries, including 
                        IT, business management, marketing, and engineering. These programs are designed to give participants 
                        a comprehensive understanding of their field, with a focus on hands-on tasks and live projects. From coding and 
                        software development to market research and financial analysis, we ensure that every participant gains relevant, 
                        industry-aligned skills.
                     </p>

                    <h3 class="card-title">How Techsphere Delivers Online Industrial Attachment</h3>
                      <p>
                        Our online industrial attachment programs are delivered through an intuitive virtual platform that facilitates seamless interaction between participants, mentors, and peers. 
                        Techsphere partners with industry professionals and organizations to design meaningful projects that simulate real-world challenges. 
                        Participants benefit from one-on-one mentorship, regular progress evaluations, and interactive sessions to address queries and provide 
                        feedback. Our flexible schedules and user-friendly interface make learning effective and convenient.
                      </p>

                     <h3 class="card-title">Why Choose Techphere for Online Industrial Attachment</h3>
                   
                     <p>
                        Techsphere is your trusted partner for online industrial attachment because of our commitment to quality and career development. 
                        We focus on delivering practical skills that are directly applicable in the workplace. Our extensive network of industry partners 
                        and experienced mentors ensures that participants receive guidance from the best in the field. Additionally, our programs 
                        include certifications and placement support, helping participants launch their careers with confidence. 
                        Choosing Techsphere means gaining the skills, experience, and connections needed to excel in today’s competitive job market.
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