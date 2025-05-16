@extends('layouts.master')
@section('content')
 <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Settings</li>
                </ol>
            </div>
            <h4 class="page-title">Settings</h4>
        </div>
    </div>
</div>
<!-- end page title --> 



@if (session('success'))
    <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div id="error-alert"  class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        {{ session('error') }}
    </div>
@endif


<!-- end page title --> 

<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card text-center">
            <div class="card-body">
                <img src="{{asset('images/logo/'.$companyDetail->company_logo)}}" class="rounded-circle avatar-lg img-thumbnail"
                alt="profile-image">

                <h4 class="mb-0 mt-2">{{$companyDetail->company_name}}</h4>
                <p class="text-muted font-14">{{$companyDetail->company_motto}}</p>

                <button type="button" class="btn btn-success btn-sm mb-2" data-bs-toggle="modal" data-bs-target="#addExamModal" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Logo</button>
                
            </div> <!-- end card-body -->
        </div> <!-- end card -->

    </div> <!-- end col-->

    <div class="col-xl-8 col-lg-7">
        <div class="card">
            <div class="card-body">
               
                <div class="tab-content">
                    
                    <div class="tab-pane show active" id="timeline">
                        <form method="post" action="{{route('updateCompanyDetails')}}">
                            @csrf
                           
                            <input type="text" name="id" value="{{$companyDetail->id}}" hidden="true">
                            <h5 class="mb-3 text-uppercase bg-light p-2 bodyColor" style="color:white"><i class="mdi mdi-office-building me-1"></i> Company Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="companyname" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" name="company_name" value="{{$companyDetail->company_name}}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cwebsite" class="form-label">Website</label>
                                        <input type="text" class="form-control" name="company_website" value="{{$companyDetail->company_website}}">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Address</label>
                                     
                                            <input type="text" class="form-control" name="company_address" value="{{$companyDetail->company_address}}">
                                      
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Motto</label>
                                     
                                            <input type="text" class="form-control" name="company_motto" value="{{$companyDetail->company_motto}}">
                                      
                                    </div>
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Mission</label>
                                        <textarea rows="3"name="company_mission"  class="form-control  resize-none">{{$companyDetail->company_mission}}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Vission</label>
                                        <textarea rows="3" name="company_vission" class="form-control  resize-none">{{$companyDetail->company_vission}}</textarea>
                                    </div>
                                </div>
                            </div>



                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Facebook</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                                            <input type="text" name="company_facebook" class="form-control" value="{{$companyDetail->company_facebook}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-tw" class="form-label">Twitter</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                                            <input type="text" name="company_twitter" class="form-control" value="{{$companyDetail->company_twitter}}">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-insta" class="form-label">Instagram</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                                            <input type="text" name="company_instagram" class="form-control" value="{{$companyDetail->company_instagram}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-lin" class="form-label">Linkedin</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                                            <input type="text" name="company_linkedn" class="form-control" value="{{$companyDetail->company_linkedn}}">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-sky" class="form-label">Skype</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-skype"></i></span>
                                            <input type="text" class="form-control" name="company_skype" value="{{$companyDetail->company_skype}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-gh" class="form-label">Github</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-github"></i></span>
                                            <input type="text" class="form-control" name="company_github" value="{{$companyDetail->company_github}}">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                            
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i>Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- end settings content-->

                </div> <!-- end tab-content -->
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
<!-- end row-->



<!-- Add User modal -->
<div id="addExamModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Update Company Logo</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" action="{{route('updateCompanyLogo')}}" enctype="multipart/form-data">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success" role="alert">
                                    <strong>Notice ! </strong> 
                                    <p>
                                        <ol>
                                            <li>The Fields marked <span class="labelSpan">*</span> are mandatory</li>
                                            <li>Image should be of any of the following : jpg,jpeg,png</li>
                                        </ol>
                                    </p>
                                </div>

                            </div>
                        </div>


                    <div class="row">
                        <input type="text" name="update_id" value="{{$companyDetail->id}}" hidden="true">
                        
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Choose File (jpeg,jpg,png) <span class="labelSpan">*</span></label> 
                                <input type="file" class="form-control" name="company_logo" required>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- /.card-body -->


            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger rounded-pill"  data-bs-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-success rounded-pill">Save</button>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--end of modal-->


<!-- Add User modal -->
<div id="updateCompanyModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel"><i class="uil-user-plus"></i> Update Company Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <form method="POST" action="{{route('updatecompanySettings')}}" enctype="multipart/form-data">
                @csrf
               

                <!-- /.card-header -->
                <div class="card-body">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success" role="alert">
                                    <strong>Notice ! </strong> 
                                    <p>
                                        <ol>
                                            <li>The Fields marked <span class="labelSpan">*</span> are mandatory</li>
                                            <li>Image should be of any of the following : jpg,jpeg,png</li>
                                        </ol>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <input type="text" name="update_company_details_id" value="{{$companyDetail->id}}" hidden="true">
                          
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building me-1"></i> Company Info</h5>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Choose File (jpeg,jpg,png) <span class="labelSpan">*</span></label> 
                                            <input type="file" class="form-control" name="update_company_logo" required>
                                        </div>
                                    </div>
                                </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="companyname" class="form-label">Company Name</label>
                                        <input type="text" class="form-control" name="update_company_name" value="{{$companyDetail->company_name}}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="cwebsite" class="form-label">Website</label>
                                        <input type="text" class="form-control" name="update_company_website" value="{{$companyDetail->company_website}}">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Address</label>
                                     
                                            <input type="text" class="form-control" name="update_company_address" value="{{$companyDetail->company_address}}">
                                      
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Motto</label>
                                     
                                            <input type="text" class="form-control" name="update_company_motto" value="{{$companyDetail->company_motto}}">
                                      
                                    </div>
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Mission</label>
                                        <textarea rows="3" name="update_company_mission"  class="form-control  resize-none">{{$companyDetail->company_mission}}</textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Vission</label>
                                        <textarea rows="3" name="update_company_vission" class="form-control  resize-none">{{$companyDetail->company_vission}}</textarea>
                                    </div>
                                </div>
                            </div>



                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth me-1"></i> Social</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-fb" class="form-label">Facebook</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
                                            <input type="text" name="update_company_facebook" class="form-control" value="{{$companyDetail->company_facebook}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-tw" class="form-label">Twitter</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
                                            <input type="text" name="update_company_twitter" class="form-control" value="{{$companyDetail->company_twitter}}">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-insta" class="form-label">Instagram</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
                                            <input type="text" name="update_company_instagram" class="form-control" value="{{$companyDetail->company_instagram}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-lin" class="form-label">Linkedin</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
                                            <input type="text" name="update_company_linkedn" class="form-control" value="{{$companyDetail->company_linkedn}}">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-sky" class="form-label">Skype</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-skype"></i></span>
                                            <input type="text" class="form-control" name="update_company_skype" value="{{$companyDetail->company_skype}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="social-gh" class="form-label">Github</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="mdi mdi-github"></i></span>
                                            <input type="text" class="form-control" name="update_company_github" value="{{$companyDetail->company_github}}">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->








                </div>
                 <!-- /.card-body -->


            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-danger rounded-pill"  data-bs-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-success rounded-pill">Save</button>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!--end of modal-->





@endsection


@section('scripts')

   


<script>
        // Function to check company settings and show modal if necessary
        function checkCompanySettings() {
            $.ajax({
                url: "{{ route('fetchCompanyDetails') }}",
                method: 'GET',
                success: function(response) {
                    // Check the conditions for showing the modal
                    if (response.company_details_status == 1 && response.company_logo_status == 1) {
                        // Show the modal if both statuses are 1
                        $('#updateCompanyModal').modal('show');
                    }
                },
                error: function(error) {
                    console.log('Error fetching company details:', error);
                }
            });
        }

        // Call the function immediately when the page loads
        checkCompanySettings();

        // Set an interval to run the check every 5 seconds (5000 milliseconds)
        setInterval(checkCompanySettings, 5000);
</script>



@endsection