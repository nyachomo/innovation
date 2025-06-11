

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

      
      
       

        <center><p><b>1 <sup> st</sup><u> ANNUAL ICT INNOVATION CHALLANGE  <u></b></p></center>
        <br><br>
        <table class="table" style="width:100%;margin-top:-35px">
            <tr style="border:1px solid white">
                <td style="border:1px solid white"> 
                    <p style="font-size:11"> 
                             <b>School:</b> {{$school->school_name ?? 'NA'}}  
                    </p>
                </td>
                <td style="border:1px solid white">
                <p style="font-size:11"> 
                             <b>Total Students:</b>  {{$total_students ?? 'NA'}} 
                    </p>
                </td>
            </tr>
        </table>

        <br><br>

        <table class="table" style="width:100%;margin-top:-35px">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Student Contact</th>
                    <th>Parent Contact</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($leeds))
                @foreach($leeds as $key=>$leed)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$leed->student_firstname}} {{$leed->student_lastname}}</td>
                        <td>{{$leed->student_form}}</td>
                        <td>{{$leed->student_phone}}</td>
                        <td>{{$leed->parent_phone}}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        
        </table>  


     
    </body>
</html>




