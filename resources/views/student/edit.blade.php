@extends('layouts.master_module')
@section('page.title')
    Edit {{ ucwords($student->studentInfo->name) }}'s profile | Students
@endsection
@section('page.body')
    <div class="title" id="title">
        <div class="container">
            Edit Student information
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ Form::model($student, array('route' => array('student.update', $student->id), 'method' => 'PUT', 'class' => "form-horizontal")) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Name',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('name', ucwords($student->studentInfo->name), array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('student_id', 'Student ID',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('student_id', $student->student_id, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('semester', 'Semester',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('semester', ucwords($student->semester), array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('year', 'Year',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('year', ucwords($student->year), array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('email', 'Email',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('email', $student->studentInfo->email, array('class' => 'form-control', 'readonly')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('phone', 'Phone',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('phone', $student->phone, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('residency_status', 'Residency Status',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('residency_status', $student->residency_status, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('country', 'Country',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('country', ucwords($student->country), array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('gender', 'Gender',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('gender', ucwords($student->gender), array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10 text-right">
                            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Cancel</a>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection