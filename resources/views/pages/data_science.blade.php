@extends('layouts.website')
@section('content')

<?php
use App\Models\Course;
$courses=Course::where('course_status','Active')->get();
?>

   <section class="bannerSection bannerPageSection">
        <div class="innerBannerPageSection">
          <div class="bannerContent text-center">
            <h1 style="color: #ffffff;"><strong>Data Science ML And AI</strong></h1>
             <ul class="breadcrumbs">
                <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
                <a href="#" style="color: #ffffff;">Data Science Ml And AI</a></li>
             </ul>
          </div>
        </div>
      </section>

    <section class="iconsSection"> 
        <div class="icons-bar">
          <a href="pages/contact.html"><i class="fa fa-address-book"><br>Enrol</i></a> 
          <a href="pages/application.html"><i class="fa fa-plus"><br>Apply</i></a>
          <a href="pages/contact.html"><i class="fa fa-file-signature"><br>Join us</i></a>
          

        </div>
        <div class="icons-social">
          <a href="#" style="background-color:#4267B2" title="facebook"><i class="fab fa-facebook" aria-hidden="true"></i></a>
          <a href="#" style="background-color:#1DA1F2" title="twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
          <a href="#" style="background-color:#FF0000  " title="youtube"><i class="fab fa-youtube" aria-hidden="true"></i></a>
        </div>
      </section >



      <section class="cardSection bg-light" style="padding-bottom: 40px; padding-top: 50px;">
        <div class="container">
            <div class="row">
               <div class="col-sm-8">

                    <div class="card">
                         
                          <div class="card-body">
                                <h4 class="card-title">Data Science Ml And AI</h4>
                                <p>
                                    At Techsphere , we deliver the best Data Science using Python training with a comprehensive curriculum 
                                    designed for both beginners and professionals. Our course is acclaimed as the best online and offline 
                                    option for mastering data science concepts with Python. Benefit from our expert instructors and 
                                    hands-on projects to gain practical skills. With 100% placement assistance, Techsphere prepares you 
                                    for a successful career in data science. Join us to excel in data analysis and visualization with 
                                    Python.
                                </p>
                                <h4 class="card-title">Course Overview</h4>
                                <p>
                                    Techsphere is the best institute for data science using Python training courses. Our course is designed to provide comprehensive training for aspiring data scientists. This course covers essential topics such as Python programming, data manipulation, statistical analysis, machine learning, and data visualization. With a blend of theoretical knowledge and practical application, our curriculum ensures that students gain the skills needed to excel in the data science field.
                                </p>

                                <h4 class="card-title">Course Objectives</h4>
                                <p>
                                    The objective of the Techsphere Data Science using Python course is to equip students with the 
                                    knowledge and skills required to become proficient data scientists. Our goals include:
                                    <ol>
                                         <li class="objective">Mastering Python programming for data science.</li>
                                         <li>Understanding data manipulation and cleaning techniques.</li>
                                         <li>Gaining insights into statistical methods and their applications.</li>
                                         <li>Learning machine learning algorithms and their implementation.</li>
                                         <li>Developing data visualization skills to interpret and present data effectively.</li>
                                         <li>Completing real-world projects to build a strong portfolio.</li>
                                    </ol>
                                </p>

                                <h4 class="card-title">Salary Expectations for Freshers:-</h4>
                                <p>
                                    Freshers can expect competitive salary packages. Entry-level data scientists can anticipate salaries ranging from Ksh 80000 to 100000  per month, depending on their expertise and the hiring company.
                                </p>

                                <h4 class="card-title">Career Growth after the Course:-</h4>
                                <p>
                                    Upon completing the Data Science using Python course at Techsphere, professionals can look forward to a promising career ahead. The demand for skilled data scientists is on the rise, providing various opportunities for growth and advancement. Career paths include roles such as Data Analyst, Data Engineer, Machine Learning Engineer, and Data Scientist, with potential for significant salary increases and leadership positions.
                                </p>

                                <h4 class="card-title">Job Responsibilities:-</h4>
                                <p>Data scientists can expect to undertake various responsibilities, including:</p>
                                <ol>
                                     <li>Collecting, processing, and analyzing large datasets.</li>
                                     <li>Building predictive models and machine learning algorithms.</li>
                                     <li>Developing data-driven solutions to business problems.</li>
                                     <li>Creating data visualizations and dashboards for stakeholders.</li>
                                     <li>Collaborating with cross-functional teams to integrate data insights.</li>
                                    
                                </ol>

                                <h4 class="card-title">Training Certificate</h4>
                                <p>
                                    Upon successful completion of the Data Science using Python course, Techsphere provides a training 
                                    certificate. This certificate enhances the credibility and employability of graduates in the job 
                                    market. Techsphere is the best training institute for data science using Python courses.
                                </p>

                                <h4 class="card-title">Mock Interviews:-</h4>
                                <p>
                                    To prepare students for real-world job interviews, Techsphere conducts mock interviews. These sessions
                                     are designed to simulate actual interview scenarios, providing valuable feedback and boosting the 
                                     confidence of students. Mock interviews cover technical questions, problem-solving tasks, and 
                                     behavioral aspects to ensure well-rounded preparation.
                                </p>

                                <h4 class="card-title">Projects:-</h4>
                                <p>
                                    Hands-on projects are a crucial component of the Data Science using Python course at Techsphere. 
                                    Students work on real-world projects that involve data collection, analysis, and visualization. 
                                    These projects help build a robust portfolio, showcasing practical skills to potential employers. 
                                    Examples of projects include:
                                    <ol>
                                        <li>Predictive analytics for sales forecasting.</li>
                                        <li>Customer segmentation using clustering algorithms.</li>
                                        <li>Sentiment analysis of social media data.</li>
                                        <li>Recommendation systems for e-commerce platforms.</li>
                                    </ol>

                                    Techsphere is committed to providing the best training experience.
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

	