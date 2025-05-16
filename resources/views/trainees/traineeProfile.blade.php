@extends('layouts.master')
@section('content')
<br>
    <div class="row">
        <div class="col-sm-12">
            <!-- Profile -->
            <div class="card bg-primary">
                <div class="card-body profile-user-box">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="avatar-lg">
                                        <img src="{{ asset('images/profile/' . Auth::user()->profile_image) }}" alt="" class="rounded-circle img-thumbnail">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <h4 class="mt-1 mb-1 text-white">Michael Franklin</h4>
                                        <p class="font-13 text-white-50"> Authorised Brand Seller</p>

                                        <ul class="mb-0 list-inline text-light">
                                            <li class="list-inline-item me-3">
                                                <h5 class="mb-1 text-white">$ 25,184</h5>
                                                <p class="mb-0 font-13 text-white-50">Total Revenue</p>
                                            </li>
                                            <li class="list-inline-item">
                                                <h5 class="mb-1 text-white">5482</h5>
                                                <p class="mb-0 font-13 text-white-50">Number of Orders</p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col-->

                        
                    </div> <!-- end row -->

                </div> <!-- end card-body/ profile-user-box-->
            </div><!--end profile/ card -->
        </div> <!-- end col-->
    </div>
    <!-- end row -->



    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills bg-nav-pills nav-justified mb-3" style="background-color:#000033">
                        <li class="nav-item">
                            <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                Assignment
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                                Cats
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                Final Exams
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                                Payments
                            </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="aboutme">


                            <div class="timeline-alt pb-0">

                                <div class="timeline-item">
                                    
                                </div>

                                <div class="timeline-item">
                                    
                                </div>

                                <div class="timeline-item">
                                    
                                </div>

                            </div>
                            <!-- end timeline -->        

                            <div class="table-responsive">
                                
                            </div>

                        </div> <!-- end tab-pane -->
                        <!-- end about me section content -->

                        <div class="tab-pane show active" id="timeline">

                            

                        </div>
                        <!-- end timeline content-->

                        <div class="tab-pane" id="settings">
                            
                        </div>
                        <!-- end settings content-->

                    </div> <!-- end tab-content -->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row-->


@endsection

