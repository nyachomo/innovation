

<!DOCTYPE html>
<html>
    <head>
        <title>Short Course</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: left;
            }
            thead {
                background-color: #000033;
                color: white;
            }
            th, td {
                border: 1px solid #ddd;
            }
            *{
                font-family: "Tw Cen MT", "Century Gothic", "Arial", sans-serif;
            }
            ol li{
                list-style-type: none;
            }
            td{
                padding:5px;
            }
        </style>
    </head>
    <body>
        <center>
             <img src="{{ $imageSrc }}"  style="max-width: 200px; height: 150px">
            
        </center>
        <center> <h2 style="color:#000033">TECHSPHERE TRAINING INSTITUTE</h2></center>
       
        <center>
        <p style="border-bottom:3px solid #000033">
            <b>
            View Park Towers 17th Floor, University way | P. O. Box 1334-00618, Nairobi<br>
            Web: <a href="https://techsphereinstitute.co.ke" style="color:blue">https://techsphereinstitute.co.ke</a>  Email: <span style="color:blue">Info@techsphereinstitute.co.ke </span>| <br>
            Phone: <span style="color:#3ccccc">+254768919307</span>
            </b>
        </p>

        </center>

      
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

        <p><b><u>SUBJECT: FULL SCHOLARSHIP - PYTHON PROGRAMMING  TRAINING PROGRAME  <u></b></p>
        <p style="text-align: left;">
            We hope this letter finds you well. As schools close for the April holiday, Techsphere  is excited to 
            offer a full scholarship Python Training Program exclusively for high school students. 
            This is a great opportunity for you to gain 
            valuable programming skills during your holiday while preparing for a tech-driven future.

            <h4>1.0 Program Details</h4>
            <ul>
                <li>
                    <b>Course:</b> Python Programming (Beginner Level)
                </li>

                <li>
                    <b>Duration: </b> Two weeks (14 April 2025-25 April 2025)
                </li>

                <li>
                    <b>Mode:</b> Online training (Monday-Thursday: 10:00am-11:30am)
                </li>

                <li>
                    <b>Eligibility:</b> High school students (Form2-Form4)
                </li>

                <li>
                     <b>Registration Fee:</b> Ksh 2,000 (for certificate processing and issuance)
                </li>

                <li>
                    <b>Certification:</b> Upon successful completion, you will receive a recognized certificate
                </li>
               

            </ul>

            <h4>2.0 Objective Of the program</h4>
            Our goal is to introduce you to Python programming and equip you with foundational coding skills that can be applied 
            in various fields, including web development, data analysis, robotics and automation. By the end of the program, you will be able 
            to write basic Python scripts, understand programming logic, and solve real-world problems using Python.

           
            <h4> 3.0 Benefits of the Training:</h4>

            <ul>
                <li>Hands-on training with experienced instructors</li>
                <li>Practical programming exercises and projects</li>
               <li> Certificate of completion to boost your academic and career profile</li>
            </ul>

            <h4>4.0 Course Outline</h4>
            <table>
                <thead>
                    
                     <th>#</th>
                     <th>TOPIC</th>
                     <th>WHAT TO LEARN</th>
                </thead>
                <tr>
                    <td>1</td>
                     <td>Introduction to Python</td>
                     <td>
                        <ol>
                            <li>Introduction to  Python</li>
                            <li>installing Python and set up an(IDE).</li>
                            <li>Writting  Python first program.</li>
                        <ol>
                     </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Python Basics</td>
                    <td>
                           <ol>
                                <li>Introduction to variables</li>
                                <li>Data types (integers, floats, strings, booleans)</li>
                                <li>Python operators (arithmetic, comparison, and logical)</li>
                           </ol>
                    </td>
                </tr>

                <tr>

                    <td>3</td>
                    <td>Conditional Statements and Loops</td>
                    <td>
                        <ol>
                          <li>if, elif, and else statements. </li>
                          <li>loops (for and while) </li>
                        </ol>
                    </td>
                </tr>

                <tr>
                    
                    <td>4</td>
                    <td> Functions and Modular Programming</td>
                    <td>
                        <ol>
                            <li>Introduction to functions</li>
                            <li>writing reusable code</li>
                            <li>defining functions with parameters and return values</li> 
                            <li>modular programming</li>
                        </ol>
                    </td>
                </tr>

                <tr>
                    <td>5</td>
                    <td> Lists, Tuples, and Dictionaries</td>
                    <td>
                        <ol>
                            <li>  list, Tuples and Dictionaries</li>
                            <li>  Indexing, slicing, and iteration.</li>
                        </ol>
                    </td>
                </tr>

                <tr>
                    <td>6</td>
                    <td> Working with User Input and Error Handling</td>
                    <td>
                       <ol>
                            <li>Receiving and processing user input using the input() function.</li>
                            <li>Explore error handling using try and except blocks to prevent program crashes.</li>
                       </ol>
                    </td>
                </tr>
            </table>
                      We encourage you to take advantage of this opportunity. Seats are limited, so secure your slot by registering as soon as possible. To register, please visit <a href="https://techsphereinstitute.co.ke/public/enrol">https://techsphereinstitute.co.ke/public/enrol</a> or contact us at <b>+2547768919307</b>
           <br>       We look forward to seeing you in class and helping you take your first step into the world of programming.
          
        </p>
       
        <br>
      <table style="border:1px solid white">
          <tr style="border:1px solid white">
            <td style="border:1px solid white">
                <b>Yours Faithfully</b><br><br>

                Ibrahim Gichemba<br>
                  <img src="{{ $imageSrc2 }}" height="80"><br>
                <b>Director Techspher Training  Institute.<b>
            </td>
             <td style="border:1px solid white">
                  <img src="{{ $imageSrc3 }}" height="120" width="100%"><br>
             </td>
          </tr>
      </table>  
    </body>
</html>




