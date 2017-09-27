@extends('layouts.modulePage')
@section('page.title')
    Edit {{ ucwords($user->name) }}'s profile | Teachers
@endsection
@section('page.body')
    <div class="title" id="title">
        <div class="container">
            Edit Admin information
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
                    {{ Form::model($user, array('route' => array('admin.update', $user->id), 'method' => 'PUT', 'class' => "form-horizontal")) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('name', ucwords($user->name), array('class' => 'form-control', 'required')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('email', $user->email, array('class' => 'form-control', 'readonly')) }}
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