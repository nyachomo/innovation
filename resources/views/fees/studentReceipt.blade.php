
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
                         <h2>RECEIPT NO: <span style="color:#00cc99">{{$payment->payment_ref_no ?? 'NA'}}</span></h2>
                         <p style="font-size:px">
                            <b style="font-size:20px">STUDENT DETAILS : </b> <br>
                            <b>Student Name:</b> {{$user->firstname ?? ''}} {{$user->secondname ?? ''}}  {{$user->lastname ?? ''}}<br>
                            <b>Course:</b> {{$user->course->course_name ?? 'NA'}}<br>
                            <b>Class:</b> {{$user->clas->clas_name ?? 'NA'}}<br>
                         </p>
                   </td>
                   <td  style="border:0px solid white">
                      <p style="font-size:30px;text-align: right;color:#000033;"><b style="text-align: right;">PAID </b>(Course Fee)</p>
                      
                      
                      &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<img src="{{ $imageSrc2 }}" alt="Company Logo" style="max-width: 200px; height: auto;"><br>
                      &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <span style="font-size:20px">Date Paid:</span> <span style="color:red;font-size:20px">{{$payment->date_paid ?? 'NA'}}</span>

                     

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

    <p style="font-size:15px">
        Amount Paid: <b>Ksh {{$payment->amount_paid ?? 'NA'}}</b><br>
        Date Paid:   <b style="color:red">{{$payment->date_paid ?? 'NA'}}</b><br>
        Ref No:      <b>{{$payment->payment_ref_no ?? 'NA'}}</b>
    </p>
   
   
    <center><h4>PAYMENT DETAILS (THIS INCLUDE DETAILS OF THE CURRENT PAYMENTS)</h4></center>
       
    <table>
        <thead>
            <tr>
                
                <th><h4>#</h4></th>
                <th><h3>Amount Paid (Ksh)</h3></th>
                <th><h3>Date Paid</h3></th>
                <th><h3>Payment Method</h3></th>
                <th><h3>Payment Ref No</h3></th>
               
            </tr>
        </thead>
        <tbody>
               @foreach($fees as $key=>$fee)
                <tr>
                   
                    <td>{{ $key+1 }}</td>
                    <td>{{ $fee->amount_paid }}</td>
                    <td>{{ $fee->date_paid }}</td>
                    <td>{{ $fee->payment_method }}</td>
                    <td>{{ $fee->payment_ref_no }}</td>
                </tr>
                @endforeach
            
        </tbody>
    </table>
    <p style="text-align: right;font-size: 15px;"><b>Balance </b>(as at <?php echo date("Y-m-d H:i:s");?>): <span style="color:red;font-size: 20px;">Ksh {{$balance ?? ''}}.00</span></p>
    
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
