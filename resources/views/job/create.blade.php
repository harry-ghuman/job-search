@extends('layouts.master_module')
@section('page.title')
    Create Job | Jobs
@endsection
@section('page.body')
    <div class="title" id="title">
        <div class="container">
            Create Job
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
                    {{ Form::model(null, array('route' => array('job.store'), 'method' => 'POST', 'class' => "form-horizontal")) }}
                        {{ Form::hidden('teacher_id', App\Teacher::where('user_id', Auth::user()->id)->value('id')) }}
                        <div class="form-group">
                            {{ Form::label('job_title', 'Job Title',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('job_title', null, array('class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('description', 'Description',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('description', null, array('class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('credits', 'Credits',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::select('credits', ['3'=>'3', '6'=>'6', '9'=>'9'], '', array('class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="responsibilities" class="col-sm-2 control-label">Responsibilities</label>
                            <div class="col-sm-10">
                                <textarea name="responsibilities" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="requirements" class="col-sm-2 control-label">Requirements</label>
                            <div class="col-sm-10">
                                <textarea name="requirements" class="form-control" rows="10"></textarea>
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