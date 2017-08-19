@extends('layouts.master_module')
@section('page.title')
    Edit {{ ucwords($teacher->teacherInfo->name) }}'s profile | Teachers
@endsection
@section('page.body')
    <div class="title" id="title">
        <div class="container">
            Edit Teacher information
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
                    {{ Form::model($teacher, array('route' => array('teacher.update', $teacher->id), 'method' => 'PUT', 'class' => "form-horizontal")) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('name', ucwords($teacher->teacherInfo->name), array('class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('job_title', 'Job title',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('job_title', ucwords($teacher->job_title), array('class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('special_designation', 'Special Designation',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('special_designation', ucwords($teacher->special_designation), array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('department', 'Department',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('department', ucwords($teacher->department), array('class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('email', $teacher->teacherInfo->email, array('class' => 'form-control', 'readonly')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('phone', $teacher->phone, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('office_address', 'Office Address',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('office_address', $teacher->office_address, array('class' => 'form-control')) }}
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