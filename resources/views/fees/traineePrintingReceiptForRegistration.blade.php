
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size:12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

    <table  style="border:0px solid white">
          <tbody  style="border:0px solid white">
               <tr style="border:0px solid white">
                   <td  style="border:0px solid white">
                        <img src="{{ $imageSrc }}" alt="Company Logo" style="max-width: 200px; height: auto;">
                         <h2>RECEIPT NO: <span style="color:#00cc99">{{ $user->reg_fee_ref_no ?? 'NA' }}</span></h2>
                         <p style="font-size:px">
                            <b style="font-size:20px">STUDENT DETAILS : </b> <br>
                            <b>Student Name:</b> {{$user->firstname ?? ''}} {{$user->secondname ?? ''}}  {{$user->lastname ?? ''}}<br>
                            <b>Course:</b> {{$user->course->course_name ?? 'NA'}}<br>
                            <b>Class:</b> {{$user->clas->clas_name ?? 'NA'}}<br>
                         </p>
                   </td>
                   <td  style="border:0px solid white">
                      <p style="font-size:30px;text-align: right;color:#000033;"><b style="text-align: right;">PAID </b>(Registration Fee)</p>
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img src="{{ $imageSrc2 }}" alt="Company Logo" style="max-width: 200px; height: auto;">
                     
                      
                     
                      <p style="font-size:20px">
                       &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 
                      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        Date Paid: <span style="color:red">{{ $user->date_paid_reg_fee ?? 'NA' }}</span>
                     </p>
                      
                      <p style="font-size:px;text-align: right;">
                        <b style="font-size:20px">PAID TO:</b><br>
                        <b style="font-size:18px;color:#fe730c">TECHSPHERE TRAINING INSTITUTE</b> <br>
                        PO BOX 1334-00618,NAIROBI View Park Towers 17 <sup>th</sup> Floor <br>
                        <b>Website:</b> <span style="color:blue"><b>https://www.techsphereinstitute.co.ke</b></span> <br>
                        <b>Email: <span style="color:blue;">Info@techsphereinstitute.ac.ke</span> <br></b>
                      </p>
                   </td>
               </tr>
          </tbody>
    </table>

    
   
   
    <center><h1>PAYMENT DETAILS</h1></center>
       
    <table>
        <thead>
            <tr>
                
                <th><h3>Amount Paid (Ksh)</h3></th>
                <th><h3>Date Paid</h3></th>
                <th><h3>Payment Method</h3></th>
                <th><h3>Payment Ref No</h3></th>
               
            </tr>
        </thead>
        <tbody>
              
                <tr>
                   
                    <td>1000</td>
                    <td>{{ $user->date_paid_reg_fee }}</td>
                    <td>Mpesa</td>
                    <td>{{ $user->reg_fee_ref_no }}</td>
                </tr>
                
            
        </tbody>
    </table>
   
    <h2>Note:</h2>
    <p>
        Make payment through Mpesa or Bank and send payment details to <span style="color:red"><b>+254768919307</b></span> or email to <b style="color:blue">info@techsphereinstitute.ac.ke</b></p>

    <table>
          <tbody>
               <tr>
                  <td>
                    <b style="font-size: 20px;">Mpesa</b>
                    <ol>
                        <li><b>Business Name:</b> Techsphere Institute</li>
                        <li><b>Paybill No:</b> 522533</li>
                        <li><b>Account No:</b> 7855887</li>
                    </ol>
                  </td>

                  <td>
                    <b style="font-size: 20px;">BANK</b>
                    <ol>
                        <li><b>Bank:</b> Kenya Commercial Bank</li>
                        <li><b>Account Name:</b> techsphere Institute</li>
                        <li><b>Account No:</b> 1327338564</li>
                    </ol>
                  </td>

               </tr>
          </tbody>
    </table>
</body>
</html>
