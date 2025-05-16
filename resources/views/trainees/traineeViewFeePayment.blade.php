@extends('layouts.master')
@section('content')

<style>

#pagination-controls {
    display: flex;
    justify-content: right;
    align-items: right;
    margin-top: -2px;
    padding-right:50px;
    padding-top:-500px;
    padding-bottom:10px;
    gap: 10px; /* Spacing between buttons */
  }

     #pagination-controls button {
        background-color: #007bff; /* Bootstrap primary color */
        color: white;
        border: none;
        border-radius: 50px;
        padding: 2px 10px;
        font-size: 14px;
        cursor: pointer;
        transition: background-color 0.3s ease;
  }

  #pagination-controls .active {
    background-color: #28a745; /* Green for active page */
  }
</style>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                </ol>
            </div>
            <h4 class="page-title">Courses</h4>
        </div>
    </div>
</div>
<!-- end page title -->



<div id="response"></div>


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




<div id="message-container" class="mt-3"></div>

<div class="row">
     <div class="col-sm-12">
         <div class="card">
             <div class="card-body">
                <h4 class="header-title">Fee Payment Summary</h4>
                 <div class="row">
                     <div class="col-sm-4">
                            <div class="alert alert-success" role="alert">
                                <strong>DEBIT (KSH)</strong> 
                                <p id="all_courses">{{$debit??''}}</p>
                            </div>

                     </div>

                     <div class="col-sm-4">

                        <div class="alert alert-warning" role="alert">
                            <strong>CREDIT (KSH)</strong> 
                            <p id="active_courses">{{$credit??''}}</p>
                        </div>

                     </div>
                     <div class="col-sm-4">

                        <div class="alert alert-danger" role="alert">
                            <strong>BALANCE (KSH)</strong>
                            <p id="suspended">{{$balance??''}}</p>
                        </div>

                     </div>

                 </div>
             </div>
         </div>
     </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">Payment Record for : ({{$user->firstname??''}} {{$user->secondname??''}} {{$user->lastname??''}})</h4>
            </div>
            <div class="card-body">

                <div class="tab-content">
                    <div class="tab-pane show active">
                       
                        <table id="selection-datatable" class="table table-sm dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Amount Paid</th>
                                    <th>Pyment Method</th>
                                    <th>Date Paid</th>
                                    <th>Ref No</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @if(!empty($fees))
                                    @foreach($fees as $key=>$fee)
                                       <tr>
                                           <td>{{$key+1}}</td>
                                           <td>{{$fee->amount_paid}}</td>
                                           <td>{{$fee->payment_method}}</td>
                                           <td>{{$fee->date_paid}}</td>
                                           <td>{{$fee->payment_ref_no}}</td>

                                           <td>
                                                <a href="{{ route('downloadReceipt', $fee->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-download"></i> Download Receipt
                                                </a>
                                            </td>
                                           
                                       </tr>



                                    @endforeach
                                 @endif
                            </tbody>
                        </table>                                           
                    </div> <!-- end preview-->
                
                </div> <!-- end tab-content-->
                
            </div> <!-- end card body-->

            <!--end of card-footer-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->



@endsection
