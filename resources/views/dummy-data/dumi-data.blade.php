

<div class="row">

<div class="col-xl-12">
    <div class="card">
        <div class="card-header">
            <h4 class="header-title mb-4">Active Student</h4>
        </div>
        <div class="card-body">
            
            

            <table class="table table-sm table-centered mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Amount to Pay</th>
                            <th>Amount Paid</th>
                            <th>Balance</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($students))
                            @foreach($students as $key=>$student)
                                <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$student->firstname ?? ''}} {{$student->secondname ?? ''}}  {{$student->lastname ?? ''}} </td>
                                <td>{{$student->course->course_name ?? ''}}</td>
                                <td>Ksh {{$student->debit ?? ''}} .00 </td>
                                <td> 
                                    <?php 
                                    $credit=Fee::where('user_id',$student->id)->sum('amount_paid');
                                    echo$credit;
                                    ?>
                                </td>

                                <td> 
                                    <?php 
                                    $debit=$student->debit;
                                    $credit=Fee::where('user_id',$student->id)->sum('amount_paid');
                                    $balance=$debit-$credit;
                                    echo$balance;
                                    ?>
                                </td>
                            
                                <td>
                                    <a href="{{ route('showTraineeProfile', $student->id) }}" class="btn btn-success">
                                        <i class="fa fa-eye"></i> View Profile
                                    </a>
                                </td>

                            </tr>








                                
                            @endforeach
                        @endif
                        
                    </tbody>
            </table>





        </div>
        <!-- end card body-->
    </div>
    <!-- end card -->
</div>
</div>
