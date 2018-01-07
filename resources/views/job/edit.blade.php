@extends('layouts.modulePage')
@section('page.title')
    Edit Job | jobs
@endsection
@section('page.body')
    <div class="title" id="title">
        <div class="container">
            Edit Job Information
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{ Form::model($job, array('route' => array('jobs.update', $job->id), 'method' => 'PUT', 'class' => "form-horizontal")) }}
                    <div class="form-group">
                        {{ Form::label('job_title', 'Job title',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('job_title', ucwords($job->job_title), array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('description', 'Description',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::text('description', ucwords($job->description), array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('credits', 'Credits',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            {{ Form::select('credits', ['3'=>'3', '6'=>'6', '9'=>'9'], $job->credits, array('class' => 'form-control', 'required')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('responsibilities', 'Responsibilities',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            <textarea name="responsibilities" class="form-control" rows="10">{{ $job->responsibilities }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('requirements', 'Requirements',['class'=>'col-sm-2 control-label']) }}
                        <div class="col-sm-10">
                            <textarea name="requirements" class="form-control" rows="10">{{ $job->requirements }}</textarea>
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
