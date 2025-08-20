

<!DOCTYPE html>
<html>
    <head>
        <title>Short Course</title>
        <style>
            



            table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            /*box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);*/
        }

        body,p,h1,h2,h3,h4,h5,h6{
            font-family: "Afacad Flux", sans-serif !important;
            font-optical-sizing: auto;
            font-weight: weight;
            font-style: normal;
            font-variation-settings:
            "slnt" 0;
        }

            body{
           
        }

        th, td {
            padding: 2px;
            text-align: left;
            border: 1px solid #ddd;
        }
        thead {
            background-color: #000033;
            color: #ffffff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
           /* background-color: #ddd;*/
        }

        body {
                font-family: 'Raleway', sans-serif !important; /* Replace with your chosen font */
            }



        </style>
    </head>
    <body>
        <center>
             <!--<img src="{{ $imageSrc }}"  style="max-width: 200px; height: 150px">-->
            
        </center>
       <!-- <center> <h2 style="color:#000033">{{$setting->company_name ?? 'NA'}}</h2></center>-->
       
        <center>
       <!-- <p style="border-bottom:3px solid #000033">
            <b>
            View Park Towers 17th Floor, University way | P. O. Box 1334-00618, Nairobi<br>
            Web: <a href="https://techsphereinstitute.co.ke" style="color:blue">https://techsphereinstitute.co.ke</a>  Email: <span style="color:blue">Info@techsphereinstitute.co.ke </span>| <br>
            Phone: <span style="color:#3ccccc">+254768919307</span>
            </b>
        </p>-->

        </center>

      <br>
        <!-- <h3><b>Dear {{$leed->student_fullname}}</b></h3>-->
        <table class="table" style="width:100%;margin-top:-35px">
            <tr style="border:1px solid white">
                <td style="border:1px solid white"> 
                    <p style="font-size:11">
                       
                             <b>Name:</b>    {{$leed->student_firstname}} {{$leed->student_lastname}}<br>
                             <b>Phone:</b>   {{$leed->student_phone ?? 'NA'}}<br>
                             <b>School:</b>  {{$leed->school->school_name ?? 'NA'}}<br>
                             <b>Class:</b>   {{$leed->student_form ?? 'NA'}}<br>  
                    </p>

                    <b><?php echo date("d-m-Y"); ?></b><br><br>
                    Dear  {{$leed->student_firstname}},
                </td>
                <!--<td style="border:1px solid white;text-align:right;"> <h5><b>Serial No:  TTI/CIT/APRIL/{{$leed->serial_number}}</b></h5></td>-->
            </tr>
        </table>

                <p><b><u>RE: PARTIAL SCHOLARSHIP - ANUALL "SKILLS PATHFINDING" TRAINING PROGRAM  <u></b></p>

                 <p style="text-align:justify">
                    {{$setting->company_name ?? 'NA'}} congratulates you for being shortlisted to be admitted into this year’s  Annual <b>“Skill Pathfinding”</b>training program having passed our assessment.

                </p>
                <p style="text-align:justify">
                    The <b>“Skill Pathfinding”</b> Training Program is an ICT skill nurturing platform for the youth, which is targeting to identify 
                    and mentor close to more than 1000 talented youth annually, to acquire and develop specialized tech skills that are high in 
                    demand globally today. This is an effort to be part of the solution to the widening skill gap in the global ICT industry. 
                    Consequently,  {{$setting->company_name ?? 'NA'}} is set out to develop a futuristic approach to reskilling the nation. 
                    Over time, we have grown to become a multi-stakeholder alliance representing both the academia and the ICT sector. 
                    
                </p>

                <p style="text-align:justify">
                    Having successfully qualified for the program, you will be taken through a series of trainings, mentorship programs, 
                    and project-based learning. This will culminate in developing industry recognized skillsets in your area of specialization 
                    as well as proper mentorship into the tech industry. For the 2025 program, we have selected key courses that are in high demand, 
                    up-to-date and guaranteed to give participants a cutting edge in the ICT industry. To make this dream come true, we have reduced 
                    down our fee charges by almost 40% from the standard charges in order to impact more lives as cost can be a greater barrier to such 
                    a predominant milestone. Attached below is the payable fee structure.
                </p>
              <!-- <h4><b style="border-bottom:3px solid #000033">11<sup>th</sup> November 2024 Upskilling Program</b></h4>-->

              <table class="table table-bordered table-sm">
                    <thead>
                            <th>#</th>
                            <th>Training Program</th>
                            <th>Duration</th>
                            <th>Tution Fee (Ksh)</th>
                    </thead>
                    <body>

                        <tr>
                            <td>1</td>
                            <td>Android Application Development</td>
                            <td>4 Weeks</td>
                            <td>20,500</td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Cyber Security And Ethical Hacking</td>
                            <td>6 Weeks</td>
                            <td>20,500</td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Data Data Science</td>
                            <td>6 Weeks</td>
                            <td>20,500</td>
                        </tr>

                        <tr>
                            <td>4</td>
                            <td>Digital Marketing</td>
                            <td>6 Weeks</td>
                            <td>20,500</td>
                        </tr>

                        <tr>
                            <td>5</td>
                            <td>Web Application Development</td>
                            <td>6 Weeks</td>
                            <td>20,500</td>
                        </tr>

                        
                        
                            
                    </body>
                </table>

            
            
            
                <p style="text-align:justify">
                    For this program, select one course from the list above. The program will run for a period of 6 weeks, 3hrs per day (MON-FRI) and a certificate will be issued upon completion. 
                    To accept this partial scholarship, you are required to visit  <a href="#">Registration Link</a> and select <b>“Enroll”</b> to register before the deadline <b> 6<sup>th</sup> November 2025 </b> . 
                    A non-refundable registration fee of <b>KES. 1000</b> is required to secure a slot on the program but students who have attended the program before will not be required to pay this fee. The starting date for the program is on <b>9 <sup>th</sup> November 2025.</b> 
                    Please note, the program will be run <b>PURELY ONLINE.</b> This will enable students to put focus to both the program and normal school assignments.
                </p>
                <p style="text-align:justify">
                    We look forward to having you join us
                </p>

        
      
    </body>
</html>




