@extends('layouts.website')
@section('content')

  
<?php
use App\Models\Course;
$courses=Course::where('course_status','Active')->get();
?>

<section class="bannerSection bannerPageSection">
    <div class="innerBannerPageSection">
        <div class="bannerContent text-center">
        <h1 style="color: #ffffff;"><strong>Graphic Design</strong></h1>
            <ul class="breadcrumbs">
            <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
            <a href="#" style="color: #ffffff;">Graphic Design</a></li>
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
                                <h4 class="card-title">Graphic Design</h4>
                                 
                                  <p>
                                    Graphic designing is an ever-evolving field that blends creativity with technology to create visually 
                                    compelling content. At Techsphere, we provide the best graphic designing training , designed 
                                    to meet the needs of both beginners and professionals. Our courses cover a wide range of design 
                                    principles, software proficiency, and real-world projects, ensuring students are industry-ready upon 
                                    completion. With a focus on hands-on learning, students will develop their skills in Adobe Creative 
                                    Suite, typography, color theory, and more. Whether you aim to work in advertising, publishing, or 
                                    digital media, our program offers the tools and knowledge to excel. 
                                  </p>
                              
                                 <h4 class="card-title">Course Overview</h4>
                                  <p>
                                    Techsphere Graphic Designing Training provides a detailed curriculum that covers essential design 
                                    principles, software tools, and practical applications. The course is designed to help students master
                                    tools like Adobe Photoshop, Illustrator, and InDesign, along with an understanding of layout design, 
                                    branding, and UI/UX fundamentals. Our program is ideal for aspiring designers who want to develop a 
                                    strong portfolio and secure a position in top design firms.
                                   
                                  </p>

                                <h4 class="card-title">Course Objectives</h4>
                                 <p>
                                    The primary objective of this course is to equip students with the technical skills and creative 
                                    confidence needed to excel in the graphic design industry. Students will learn how to create compelling
                                     visual content, understand client requirements, and deliver professional-grade designs. By the end of
                                    the course, students will be proficient in using industry-standard software and will have a portfolio
                                    showcasing their work.
                                 </p>

                                
                                
                                <h4 class="card-title">Career Growth after the Course:-</h4>
                                  <p>
                                    Graphic design offers immense career growth opportunities. As you gain experience, you can progress 
                                    from a junior designer to roles such as Senior Designer, Art Director, and Creative Director. With 
                                    the ever-growing demand for digital content, graphic designers have the chance to work in diverse 
                                    industries and even move into freelance work or start their own design studios.
                                  </p>

                                  <h4 class="card-title">Career Prospects in Graphic Designing:-</h4>
                                  <p>
                                    The field of graphic design is rich with career prospects. From working in advertising agencies and design studios
                                     to joining in-house teams at corporate companies, the opportunities are vast. With the rise of digital marketing, 
                                     graphic designers are also in high demand in social media marketing, web design, and e-commerce sectors
                                  </p>

                                  <h4 class="card-title">Job Responsibilities:-</h4>
                                  <p>
                                      As a graphic designer, your responsibilities will include:
                                      <ol>
                                          <li>Creating visual content for print and digital media.</li>
                                          <li>Developing brand identities and logos.</li>
                                          <li>Collaborating with clients and creative teams to develop design solutions.</li>
                                          <li>Using design software to produce high-quality visuals.</li>
                                          <li>Keeping up-to-date with industry trends and best practices.</li>
                                        
                                      </ol>
                                  </p>

                               

                                <h4 class="card-title">Training Certificate</h4>
                                    <p>
                                        Upon successful completion of the course, students will receive a certification from Techsphere, 
                                        . This certification will validate your skills and 
                                        enhance your employability in the graphic design industry.
                                    </p>
                                <h4 class="card-title">Mock Interviews:-</h4>
                                 
                                  <p>
                                    To prepare students for the job market, Techsphere offers mock interview sessions that simulate 
                                    real-life interview scenarios. These sessions help students build confidence, improve communication 
                                    skills, and get familiar with the types of questions they may encounter during actual job interviews.
                                  </p>

                                   <h4 class="card-title">Projects:-</h4>
                                    <p>
                                        Our course includes multiple projects that allow students to apply their learning in practical 
                                        scenarios. These projects will cover various aspects of graphic design, such as logo design, 
                                        brochure creation, web design, and more. The portfolio developed through these projects will be 
                                        a valuable asset in your job search.
                                    </p>

                                    <h4>Courses Under Graphic Designing</h4>
                                    <p>
                                        <ol>
                                             <li>Adobe Photoshop Mastery: Learn to manipulate images and create stunning visuals with Photoshop.</li>
                                             <li>Illustrator Essentials: Master vector graphics and logo design using Adobe Illustrator.</li>
                                             <li>InDesign for Publishing: Get proficient in layout design for books, magazines, and digital publications.</li>
                                             <li>UI/UX Design: Understand user experience principles and create intuitive designs for web and mobile applications.</li>
                                             <li>Digital Painting: Explore the art of digital painting and illustration using software like Corel Painter.</li>
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

	