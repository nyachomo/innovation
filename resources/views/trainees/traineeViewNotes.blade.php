@extends('layouts.master')
@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashborad</a></li>
                    <li class="breadcrumb-item active">Manage Course</li>
                </ol>
            </div>
            <h4 class="page-title">My Course</h4>
        </div>
    </div>
</div>





<!-- end row -->

<div class="row">


    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                  <center><h4 class="header-title">{{$module->module_name}}</h4><center>
            </div>
            <div class="card-body">
               
                <div class="tab-content">
                    <div class="tab-pane show active" id="vertical-left-tabs-preview">
                        <div class="row">
                            <div class="col-sm-3 mb-2 mb-sm-0">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active show" id="v-pills-home-tab" data-bs-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                        aria-selected="true">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">Introduction</span>
                                    </a>
                                    @if(!empty($topics))
                                       @foreach($topics as $key=>$topic)
                                            <a class="nav-link" id="v-pills-profile-tab{{$topic->id}}" data-bs-toggle="pill" href="#v-pills-profile{{$topic->id}}" role="tab" aria-controls="v-pills-profile{{$topic->id}}"
                                                aria-selected="false">
                                                <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                                <span class="d-none d-md-block">{{$topic->topic_name}}</span>
                                            </a>

                                       @endforeach
                                    @endif
                                   
                                </div>
                            </div> <!-- end col-->

                            <div class="col-sm-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    
                                   <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <p class="mb-0">
                                             {{$module->module_content}}
                                        </p>
                                    </div>


                                    @if(!empty($topics))
                                        @foreach($topics as $key=>$topic)

                                        <div class="tab-pane fade" id="v-pills-profile{{$topic->id}}" role="tabpanel" aria-labelledby="v-pills-profile-tab{{$topic->id}}">
                                            <p class="mb-0">
                                                 <?php echo$topic->topic_content?>
                                            </p>
                                        </div>

                                        @endforeach
                                    @endif
                                   
                                   
                                </div> <!-- end tab-content-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->                                            
                    </div> <!-- end preview-->
                
                    
                </div> <!-- end tab-content-->

            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->

    
</div>
<!-- end row -->


@endsection