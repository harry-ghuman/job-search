@extends('layouts.master_module')
@section('page.title')
    Students
@endsection
@section('page.body')
    <div class="title">
        <div class="container">
            List of Students
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <?php if(!count($students)){ ?>
                    <div class="alert alert-info text-center h4">
                        No student has registered with Job Search App right now!
                    </div>
                    <?php }
                    else{ ?>
                    <table class="table table-condensed">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Student ID</th>
                            <th>Batch</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        @foreach ($students as $student)
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td title="Click to view  information"><a href="{{ URL::to('student/' . $student->id.'/#title') }}">{{ ucwords($student->studentInfo->name) }}</a></td>
                                <td>{{ ucwords($student->student_id) }}</td>
                                <td>{{ ucwords($student->semester).' '.$student->year }}</td>
                                @role(['admin', 'student'])
                                    <td>
                                        <a href="{{ URL::to('student/' . $student->id.'/edit#title') }}" class="btn btn-xs btn-primary">Edit</a>
                                        <div style="display: inline-block;">
                                            {{ Form::open(array('url' => 'student/' . $student->id,'onsubmit' => 'return confirm("Are you sure you want to delete '.$student->studentInfo->name.'?")')) }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-primary')) }}
                                            {{ Form::close() }}
                                        </div>
                                    </td>
                                @endrole
                                @role('teacher')
                                    <td>
                                        <a href="{{ URL::to('student/'.$student->id.'/job/'.$job_id.'/updateJobApplicationStatus/1') }}" class="btn btn-xs btn-success">
                                            <span class="glyphicon glyphicon-ok"></span> Accept
                                        </a>
                                        <a href="{{ URL::to('student/'.$student->id.'/job/'.$job_id.'/updateJobApplicationStatus/0') }}" class="btn btn-xs btn-danger">
                                            <span class="glyphicon glyphicon-remove"></span> Reject
                                        </a>
                                    </td>
                                @endrole
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
@endsection