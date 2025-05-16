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


<div class="row">





<div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <center> <h3>{{$course->course_name??'NA'}}</h3></center>
            </div>
            <div class="card-body">
                <table class="table table-sm ">
                      <thead>
                           <th>#</th>
                           <th>Module</th>
                           <th>What to learn</th>
                           <th>Notes</th>
                      </thead>

                      <tbody>
                       @if(!empty($modules))
                            @foreach($modules as $key=>$module)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$module->module_name}}</td>
                                    <td><?php echo$module->module_content?></td>
                                    <td>
                                    <a href="{{ url('/trainees/view-notes/' . $module->id) }}">View Notes</a>
                                    </td>
                                   
                                </tr>
                            @endforeach
                        @endif
                      </tbody>
                </table>
               
            </div> <!-- end card body -->
        </div> <!-- end card -->
</div> <!-- end col -->





</div>
@endsection