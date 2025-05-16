@extends('layouts.website')
@section('content')

<?php
    use App\Models\Course;
    $courses=Course::where('course_status','Active')->get();
?>

<section class="bannerSection bannerPageSection">
    <div class="innerBannerPageSection">
        <div class="bannerContent text-center">
        <h1 style="color: #ffffff;"><strong>Data Analytics</strong></h1>
            <ul class="breadcrumbs">
            <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
            <a href="#" style="color: #ffffff;">Data Analytics</a></li>
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
                            <h4 class="card-title">Data Analytics</h4>
                                <p>
                                Techsphere offers comprehensive training in Data Analytics with Python, catering to 
                                individuals keen on mastering the art of data analysis. The course looks into Python's 
                                powerful libraries like Pandas, NumPy, and Matplotlib, empowering participants to manipulate 
                                and visualize data effectively. Through hands-on projects and real-world datasets, participants 
                                gain practical experience in extracting insights and making data-driven decisions. Led by best 
                                instructors, Techsphere' training ensures a solid foundation in data analytics techniques and 
                                methodologies. Whether you're a beginner or an experienced professional, this course equips you 
                                with the skills needed to excel in the data-driven world. Join Techsphere to harness the potential 
                                of Python for data analytics and propel your career forward.
                                </p>

                                <h4 class="card-title">Course Overview:-</h4>
                                <p>
                                Techsphere, recognized as the best training institute for data analytics using Python, 
                                offers a comprehensive course designed to equip you with essential skills in data analysis. 
                                This course covers everything from the basics to advanced techniques, ensuring you gain a solid 
                                foundation in Python programming, data manipulation, and statistical analysis.
                                </p>

                                <h4 class="card-title">Course Objectives</h4>
                                <p>
                                Our primary objective is to transform beginners into proficient data analysts who can effectively 
                                use Python to extract insights from data. We aim to provide a robust understanding of data analytics 
                                concepts, Python programming, and practical applications, preparing you for a successful career in the 
                                data industry.
                                </p>

                                <h4>Things That You Will Learn</h4>
                                <p>
                                <ol>
                                        <li>Python Programming: Basics to advanced concepts, including libraries like NumPy, Pandas, Matplotlib, and Seaborn.</li>
                                        <li>Data Manipulation: Techniques for cleaning, transforming, and organizing data for analysis.</li>
                                        <li>Statistical Analysis: Understanding distributions, hypothesis testing, and regression analysis.</li>
                                        <li>Data Visualization: Creating compelling visual representations of data to communicate insights.</li>
                                        <li>Machine Learning Basics: Introduction to machine learning algorithms and their applications in data analytics.</li>
                                        <li>Real-world Applications: Implementing data analytics in various domains such as finance, healthcare, and marketing.</li>
                                    
                                </ol>
                                </p>

                                <h4 class="card-title">Career Growth after the Course:-</h4>
                                <p>
                                The career growth potential after completing this course is substantial. Starting as a data analyst,
                                    you can advance to roles such as Senior Data Analyst, Data Scientist, and Data Engineer. 
                                    With experience and continuous learning, you can move into managerial positions like Data Analytics 
                                    Manager or Chief Data Officer. Techsphere is the best training institute for data analytics using 
                                    Python courses 
                                </p>
                            <h4 class="card-title">Job Responsibilities:-</h4>
                            <p>
                                As a data analyst, your responsibilities will include:
                                <ol>
                                        <li>Collecting and interpreting data sets</li>
                                        <li>Analyzing results and identifying patterns or trends</li>
                                        <li>Developing and implementing data analyses, data collection systems, and other strategies</li>
                                        <li>Reporting results back to stakeholders</li>
                                        <li>Working alongside teams within the business or management team to establish business needs</li>
                                </ol>
                            </p>

                            <h4 class="card-title">Training Certificate</h4>
                            <p>
                                Upon successful completion of the course, you will receive a prestigious training certificate 
                                from Techsphere. This certification validates your skills and knowledge in data analytics using 
                                Python, making you a competitive candidate in the job market. 
                            </p>

                            <h4>Mock Interviews:-</h4>
                            <p>
                                To ensure you are fully prepared for job interviews, Techsphere offers mock interview sessions. 
                                These sessions provide you with the opportunity to practice and refine your interview skills, 
                                receive feedback, and gain confidence to excel in real job interviews.
                            </p>

                            <h4 class="card-title">Projects:-</h4>
                            <p>
                                The course includes multiple hands-on projects that simulate real-world data analytics problems.
                                    These projects are designed to give you practical experience and the ability to apply your knowledge
                                    to solve complex data challenges. Examples of projects include:
                                    <ol>
                                        <li>Analyzing sales data to identify trends and improve sales strategies</li>
                                        <li>Predictive analytics for customer behavior</li>
                                        <li>Data visualization projects to create insightful business reports</li>
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

	