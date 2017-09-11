@extends('layouts.modulePage')
@section('page.title')
    Reset Password
@endsection
@section('page.body')
    <div class="title" id="title">
        <div class="container">
            Reset Password
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
                    {{ Form::model(null, array('route' => 'user.resetpassword', 'method' => 'POST', 'class' => "form-horizontal")) }}
                        <div class="form-group">
                            {{ Form::label('current_password', 'Current Password',['class'=>'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                {{ Form::password('current_password', array('class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'New Password',['class'=>'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                {{ Form::password('password', array('class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                            <div class="form-group">
                            {{ Form::label('password_confirmation', 'Re-enter Password',['class'=>'col-sm-3 control-label']) }}
                            <div class="col-sm-9">
                                {{ Form::password('password_confirmation', array('class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                        {{ Form::hidden('user_id', Auth::user()->id) }}
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