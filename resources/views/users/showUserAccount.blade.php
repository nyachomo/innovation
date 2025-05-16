@extends('layouts.master')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item active"><a href="{{route('home')}}">Dashborad</a></li>
                    <li class="breadcrumb-item active">Manage Account</li>
                </ol>
            </div>
            <h4 class="page-title">My Account</h4>
        </div>
    </div>
</div>
<!-- end page title --> 
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
       {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card text-center">
            @if(Auth::check())
            <div class="card-body">
                <img src="{{ asset('images/profile/' . Auth::user()->profile_image) }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                <div class="text-start mt-3">
                   




                <table class="table table-sm table-centered mb-0 .table-hover table-bordered">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{Auth::user()->firstname}} {{Auth::user()->secondname}} {{Auth::user()->lastname}}</td>
                        </tr>

                        <tr>
                            <th>Course</th>
                            <td> {{Auth::user()->course->course_name ?? 'NA'}}</td>
                        </tr>

                        <tr>
                            <th>Class</th>
                            <td> {{Auth::user()->clas->clas_name ?? 'NA'}}</td>
                        </tr>


                        <tr>
                            <th>Gender</th>
                            <td> {{Auth::user()->gender ?? 'NA'}}</td>
                        </tr>

                        <tr>
                            <th>Phonenumber</th>
                            <td> {{Auth::user()->phonenumber ?? 'NA'}}</td>
                        </tr>

                        <tr>
                            <th>Role</th>
                            <td> {{Auth::user()->role ?? 'NA'}}</td>
                        </tr>
                    </tbody>
                </table>









                </div>

                
            </div> <!-- end card-body -->
            @endif
        </div> <!-- end card -->

        

    </div> <!-- end col-->

    <div class="col-xl-8 col-lg-7">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3 bodyColor">
                    <li class="nav-item">
                        <a href="#aboutme" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                            Personal Information
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#timeline" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 ">
                            Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                            Change Profile Image
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane show active" id="aboutme">
                        <form method="POST" action="{{route('userUpdateProfile')}}">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="firstname" class="form-label">Firstname</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="Enter firstname">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="lastname" class="form-label">Secondname</label>
                                        <input type="text" class="form-control" name="secondname" placeholder="Enter secondname">
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="lastname" class="form-label">Lastname</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Enter lastname">
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="lastname" class="form-label">Phonenumber</label>
                                        <input type="text" class="form-control" name="phonenumber" placeholder="Enter phonenumber">
                                    </div>
                                </div> <!-- end col -->


                                <div class="col-md-12">
                                    <div class="mb-2">
                                        <label for="lastname" class="form-label">Gender</label>
                                         <select class="form-control" name="gender">
                                            <option value="">{{Auth::user()->gender ?? 'NA'}}</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                         </select>
                                    </div>
                                </div> <!-- end col -->


                                <div class="col-md-12">
                                    <div class="mb-2">
                                    <button type="submit" class="btn btn-success" style="width:100%"><i class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </div> <!-- end col -->

                            </div> <!-- end row -->

                        </form>
                    </div>

                    <div class="tab-pane" id="timeline">


                    <form method="POST" action="{{route('adminUpdateUserPassword')}}">
                        @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Change Password</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="firstname" class="form-label">Old Password</label>
                                        <input type="password" class="form-control" name="old_password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="lastname" class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="new_password" required>
                                    </div>
                                </div> <!-- end col -->

                                <div class="col-md-12">
                                    <div class="mb-2">
                                        <label for="lastname" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" name="confirm_new_password" required>
                                    </div>
                                </div> <!-- end col -->



                                <div class="col-md-12" style="padding-top:30px">
                                    <div class="mb-3">
                                    <button type="submit" class="btn btn-success" style="width:100%"><i class="mdi mdi-content-save"></i> Save</button>
                                    </div>
                                </div> <!-- end col -->

                            </div> <!-- end row -->

                        </form>
                       
                       

                    </div>
                    <!-- end timeline content-->

                    <div class="tab-pane" id="settings">
                       
                       <!-- File Upload -->
                        <form action="{{route('adminUpdateUserPicture')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="fallback">
                                <input name="profile_image" type="file" class="form-control" accept=".png, .jpeg, .jpg">
                            </div>

                            <div class="col-md-12" style="padding-top:30px">
                                <div class="mb-3">
                                <button type="submit" class="btn btn-success" style="width:100%"><i class="mdi mdi-content-save"></i> Save</button>
                                </div>
                            </div> <!-- end col -->
                        </form>
                    </div>
                    <!-- end settings content-->

                </div> <!-- end tab-content -->
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
<!-- end row-->
@endsection
