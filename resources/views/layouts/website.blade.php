<!doctype html>
<html lang="en">
  <head>
    <title>Home-TechSphere</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link rel="stylesheet" type="text/css" href="{{asset('website/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/rotating-card.css')}}">
    <script src="https://use.fontawesome.com/d79a9c14ef.js"></script>

    <link rel="icon" type="image/jpeg" href="{{asset('website/logo/logo.jpeg')}}" >

     <!--Google fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&display=swap" rel="stylesheet">


  <!-- Smartsupp Live Chat script -->
  <script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = 'b7f9e59215dfeb4a10a833748dc3307a58941cfa';
    window.smartsupp||(function(d) {
      var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
      s=d.getElementsByTagName('script')[0];c=d.createElement('script');
      c.type='text/javascript';c.charset='utf-8';c.async=true;
      c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
    </script>
  <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
  <!--Google fonts-->
  <style>

    body{
      font-family: "Afacad Flux", sans-serif !important;
      font-optical-sizing: auto;
      font-weight: weight;
      font-style: normal;
      font-variation-settings:
        "slnt" 0;
    }
    </style>

<style>
  .marquee {
      width: 100%;
      overflow: hidden;
      white-space: nowrap;
      box-sizing: border-box;
  }
  .marquee span {
      display: inline-block;
      padding-left: 100%;
      animation: marquee 10s linear infinite;
  }
  @keyframes marquee {
      0% { transform: translateX(100%); }
      100% { transform: translateX(-100%); }
  }
</style>


  </head>

  <body class="bg-light">
   

    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
          <a class="navbar-brand2" href="{{route('welcome')}}" style="color:#000033">
            <img src="{{asset('website/logo/logo.jpeg')}}" height="90px"> <span style="font-size:25px;color:#fe730c">TECHSPHERE  INSTITUTE</span>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto px-4">
              <li class="nav-item px-2">
                <a class="nav-link active" aria-current="page" href="{{route('welcome')}}">Home</a>
              </li>

              <li class="nav-item px-2">
                <a class="nav-link" aria-current="page" href="{{route('aboutUs')}}">About Us</a>
              </li>
             
             
             
              <li class="nav-item dropdown px-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Courses</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{route('softwareEngineering')}}">Full Stack Software Engineering (with Python)</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('webApplication')}}">Web Application Development (with Python)</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('dataScience')}}">Data Science Machine Learning And Artificial Inteligence (with Python and R)</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('cyberSecurity')}}">Cybersecurity And Ethical Hacking</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('graphicDesign')}}">Graphic Design</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('androidApplication')}}">Android Application Development (Kotlin)</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('dataAnalysis')}}">Data Analytics(With Python And R)</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('digitalMarketing')}}">Digital Marketing And Search Engine Optimization</a></li>
                  <li><hr class="dropdown-divider"></li>
                </ul>
              </li>




              <li class="nav-item dropdown px-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Programs</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{route('corporateTraining')}}">Corporate Training Programs</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{route('industrialAttachment')}}">Online Industrial Training</a></li>
                 
                  <li><hr class="dropdown-divider"></li>
                </ul>
              </li>


              <li class="nav-item px-2">
                <a class="nav-link" aria-current="page" href="{{route('enrol')}}">Enroll</a>
              </li>

              <!--<li class="nav-item px-2">
                <a class="nav-link" aria-current="page" href="{{route('ictHub')}}">Ict Hub</a>
              </li>-->

              
              <li class="nav-item px-2">
                <a class="nav-link" aria-current="page" href="{{route('contactUs')}}">Contact Us</a>
              </li>
             
              
              
              <li class="nav-item px-3" style="padding-top:7px !important">
                <a href="{{route('login')}}" class="btn"><i class="fa fa-user-o" aria-hidden="true"></i> Login</a>
              </li >

             
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main>


     <!-- <section class="iconsSection">
        <div class="icons-bar">
          <a href="#"><i class="fa fa-address-book"><br>Enrol</i></a> 
          <a href="#"><i class="fa fa-plus"><br>Apply</i></a>
          <a href="#"><i class="fa fa-file-signature"><br>Join us</i></a>
          
        </div>
        <div class="icons-social">
          <a href="#" style="background-color:#4267B2" title="facebook"><i class="fab fa-facebook" aria-hidden="true"></i></a>
          <a href="#" style="background-color:#1DA1F2" title="twitter"><i class="fab fa-twitter" aria-hidden="true"></i></a>
          <a href="#" style="background-color:#FF0000  " title="youtube"><i class="fab fa-youtube" aria-hidden="true"></i></a>
        </div>
      </section >-->

       @yield('content')

    </main>




    





       

    <section style="background-color:  #000033; padding:10px">
        <div class="container">
             <div class="row">
                   
                <div class="col-sm-4">
                  <h4 style="color:white;border-bottom: 3px solid #fe730c;width:fit-content">QUICK LINKS</h4>
                  <ul>
                      <li><a href="{{route('corporateTraining')}}" style="color:white">Corporate Training</a></li>
                      <li><a href="{{route('industrialAttachment')}}" style="color:white">Online Industrial Attachment</a></li>
                  </ul>
                  <img src="{{asset('website/logo/logo.jpeg')}}" height="50%" width="30%" class="img-fluid rounded-circle">
                </div>

                <div class="col-sm-4">
                  <h4 style="color:white;border-bottom: 3px solid #fe730c;width:fit-content">GET IN TOUCH</h4>
                    <div class="row" style="padding-bottom: 5px;">
                        <div class="col-sm-12">
                            <button style="background-color: #00ccff;border-radius: 100%;color:white;border: 1px solid #00ccff;"><i class="fa fa-map-marker" aria-hidden="true"></i></button>  <b style="color:white"> View Park Towers, University Way , Nairobi</b>
                        </div>
                    </div>

                   

                    <div class="row" style="padding-bottom: 5px;">
                      <div class="col-sm-12">
                          <button style="background-color: #00ccff;border-radius: 100%;color:white;border: 1px solid #00ccff;"><i class="fa fa-phone" aria-hidden="true"></i></button>  <b style="color:white"> +254768919307</b>
                      </div>
                    </div>

                  <div class="row" style="padding-bottom: 5px;">
                    <div class="col-sm-12">
                      <button style="background-color: #00ccff;border-radius: 100%;color:white;border: 1px solid #00ccff;"><i class="fa fa-globe" aria-hidden="true"></i></button>  <b style="color:white"> www.techsphereinstitute.co.ke</b>
                    </div>
                  </div>


                  <div class="row" >
                    <div class="col-sm-12">
                        <button style="background-color: #00ccff;border-radius: 100%;color:white;border: 1px solid #00ccff;"><i class="fa fa-whatsapp" aria-hidden="true"></i></button>  <b style="color:white"> +254768919307</b>
                    </div>
                  </div>


                  
                </div>

                <div class="col-sm-4">
                  <h4 style="color:white;border-bottom: 3px solid #fe730c;width:fit-content">QUICK LINKS</h4>
                   <ul>
                       <li>Data</li>
                       <li>Softwares</li>
                       <li>Security</li>
                       <li>Design</li>
                       <li>Marketing</li>
                   </ul>
                </div>



             </div>
           
           
            

        </div>
    </section>




    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" ></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" ></script>

    <script type="text/javascript" src="{{asset('website/js/rotating-card.js')}}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
      $('.owl-carousel').owlCarousel({

        loop: true,
        margin: 15,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        nav: false,
        dots: false,
        navText: ["<div class='nav-button owl-prev'>‹</div>", "<div class='nav-button owl-next'>›</div>"],
        responsiveClass:true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 5
          }
        }
      });
    </script>
  </body>
</html>