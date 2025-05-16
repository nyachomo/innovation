<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from coderthemes.com/hyper/saas/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jun 2022 11:01:56 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <link rel="icon" type="image/jpeg" href="{{asset('website/logo/logo.jpeg')}}" >
        <!-- App css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style"/>

        <style>
            strong{
                color:red;
            }
        </style>
    </head>
    
    <body class="loading authentication-bg" data-layout-config='{"darkMode":false}'>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">

                           

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <img src="{{asset('website/logo/logo.jpeg')}}" alt="" height="120">
                                    <h4 class="text-dark-50">TECHSPHERE  INSTITUTE</h4>
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">SIGN IN |HOME</h4>
                                    <!--<p class="text-muted mb-4">Enter your email address and password to access Your account.</p>-->
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                 @csrf

                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address</label>

                                        <input id="email" type="email" id="emailaddress" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        
                                    </div>

                                    <div class="mb-3">
                                        <a href="#" class="text-muted float-end">Forgot your password?</a>
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                           
                                            <input id="password" type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>

                                        </div>
                                    </div>

                                    

                                    <div class="mb-3 mb-0">
                                        <button class="btn btn-primary" type="submit"> Log In </button>
                                        <button class="btn btn-success" style="float:right"> <a href="{{route('welcome')}}" style="color:white">Go To Home</a></button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->


                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- bundle -->
        <script src="assets/js/vendor.min.js"></script>
        <script src="assets/js/app.min.js"></script>
        
    </body>

<!-- Mirrored from coderthemes.com/hyper/saas/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Jun 2022 11:01:56 GMT -->
</html>
