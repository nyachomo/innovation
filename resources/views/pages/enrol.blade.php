@extends('layouts.website')
@section('content')

<?php
use App\Models\Course;
$courses=Course::where('course_status','Active')->get();
?>
<section class="bannerSection bannerPageSection" style="background-image: url('../images/school_five.jpg');">
        <div class="innerBannerPageSection">
          <div class="bannerContent text-center">
            <h1 style="color: #ffffff;"><strong>Enroll</strong></h1>
             <ul class="breadcrumbs">
                <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
                <a href="#" style="color: #ffffff;">Enrol</a></li>
             </ul>
          </div>
        </div>
      </section>




      
      <section class="cardSection bg-light" style="padding-bottom: 40px; padding-top: 50px;">
        <div class="container">
            <div class="row">



             <div class="col-sm-7">
                
                    
             <div class="card">
                      
                      <div class="card-body">
                           
                            <p class="text-success"><b>Note:</b> A none refundable registration fee of Ksh 1000 is required to complete your enrollment</p>
                            <br>

                            <form method="post" action="{{route('register')}}">
                                @csrf
                                <input type="password" name="password"  class="form-control" value="12345678" hidden="true">                  
                                <div class="mb-1">
                                    <label class="card-title">Firstname <span class="spanLabel">*<span> </label>
                                    <input type="text" name="firstname" placeholder="John" class="form-control" required>       
                                </div>

                                <div class="mb-1">
                                    <label class="card-title">secondname</label>
                                    <input type="text" name="secondname" placeholder="Doe" class="form-control">      
                                </div>

                                <div class="mb-1">
                                    <label class="card-title">Lastname</label>
                                    <input type="text" name="lastname" placeholder="Doe" class="form-control">     
                                </div>



                                <div class="mb-1">
                                    <label class="card-title">Email <span class="spanLabel">*<span> </label>
                                    <input type="email" name="email"  placeholder="johndoe@gmail.com" class="form-control" required>    
                                </div>


                                <div class="mb-1">
                                    <label class="card-title">Phonenumber <span class="spanLabel">*<span> </label>
                                    <input type="text" name="phonenumber"  placeholder="07xxxxxxxx" class="form-control" required>   
                                </div>



                                <div class="mb-1">
                                    <label class="card-title">Gender <span class="spanLabel">*<span></label>
                                    <select class="form-control" name="gender" required>
                                        <option value="">Select ..</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>     
                                </div>

                               
                                    <input type="text" name="has_paid_reg_fee"   class="form-control" value="No" hidden="true">   
                                    <input type="text" name="role"   class="form-control" value="Trainee" hidden="true">   
                             

                                

                            

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




               <div class="col-sm-5">


                   <div class="card">
                        <div class="card-body">
                            <center> <h5 class="card-title">HOW TO PAY</h5> </center>
                             <table>
                                <tr>
                                    <td>
                                        <h6 class="card-title">Mpesa</h6>
                                        <p>
                                        <b>Business Name:</b> Techsphere Institute<br>
                                        <b>Paybill:</b> 522533<br>
                                        <b>Acc No:</b> 7855887<br>
                                        </p>
                                    </td>
                                    
                                </tr>


                                <tr>
                                    <td>
                                       <h6 class="card-title">Bank</h6>
                                        <p>
                                            <b>Bank: </b>Kenya Comercial Bank <br>
                                            <b>Acc Name:</b> Techsphere Institute<br>
                                            <b>Acc No:</b> 1327338564<br>

                                        </p>
                                    </td>
                                    
                                </tr>


                             </table>
                        </div>
                   </div>


                    <br>



                   <div class="card">
                        <div class="card-body">
                              <div class="row">
                              <center> <h5 class="card-title">CONTACT US</h5> </center>
                                    <div class="col-sm-12">
                    
                                            <div class="row" style="padding-bottom: 5px;">
                                                <div class="col-sm-12">
                                                    <button style="background-color: #00ccff;border-radius: 100%;color:white;border: 1px solid #00ccff;"><i class="fa fa-map-marker" aria-hidden="true"></i></button>  View Park Towers, University Way , Nairobi
                                                </div>
                                            </div>

                    

                                            <div class="row" style="padding-bottom: 5px;">
                                            <div class="col-sm-12">
                                                <button style="background-color: #00ccff;border-radius: 100%;color:white;border: 1px solid #00ccff;"><i class="fa fa-phone" aria-hidden="true"></i></button>   +2547768919307
                                            </div>
                                            </div>

                                            <div class="row" style="padding-bottom: 5px;">
                                                <div class="col-sm-12">
                                                <button style="background-color: #00ccff;border-radius: 100%;color:white;border: 1px solid #00ccff;"><i class="fa fa-globe" aria-hidden="true"></i></button>   www.techsphereinstitute.co.ke
                                                </div>
                                            </div>


                                            <div class="row" >
                                                <div class="col-sm-12">
                                                    <button style="background-color: #00ccff;border-radius: 100%;color:white;border: 1px solid #00ccff;"><i class="fa fa-whatsapp" aria-hidden="true"></i></button>   +2547768919307
                                                </div>
                                            </div>

                                    </div>


                              </div>
                        </div>
                   </div>


               </div>

              
            </div>
        </div>
      </section>





@endsection

	