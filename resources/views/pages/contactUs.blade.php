@extends('layouts.website')
@section('content')
<section class="bannerSection bannerPageSection" style="background-image: url('../images/school_five.jpg');">
        <div class="innerBannerPageSection">
          <div class="bannerContent text-center">
            <h1 style="color: #ffffff;"><strong>Contact Us</strong></h1>
             <ul class="breadcrumbs">
                <li class="home" style="color: #ffffff;"><i class="fa fa-home"></i> <a href="#" style="color: #ffffff;">Home</a> <span>/</span>
                <a href="#" style="color: #ffffff;">Contact Us</a></li>
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


                        <form method="POST" action="{{route('contact.create')}}">
                              @csrf                
                          <div class="mb-1">
                            <label class="card-title">Fullname</label>
                            <input type="text" class="form-control" name="fullname" required>
                          </div>

                          <div class="mb-1">
                            <label class="card-title">Email</label>
                            <input type="email" class="form-control" name="email">
                          </div>

                          <div class="mb-1">
                            <label class="card-title">Phonenumber</label>
                            <input type="number" class="form-control" name="phonenumber" required>
                          </div>

                          <div class="mb-1">
                            <label class="card-title">Message</label>
                              <textarea class="form-control" name="message" required>
                                  
                              </textarea>
                          </div>


                          

                          <div class="mt-3">
                            <button type="submit" class="btn" style="width:100%">Submit</button>
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

	