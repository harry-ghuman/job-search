@extends('layouts.modulePage')

@section('page.title')
    Edit {{ ucwords($teacher->user->name) }}'s profile | Teachers
@endsection

@section('page.body.title', 'Edit Teacher information')
@section('page.body.content')
    {{ Form::model($teacher, ['route' => ['teachers.update', $teacher->id], 'method' => 'PUT', 'class' => "form-horizontal"]) }}
        @include('teachers.partials.form')
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 text-right">
                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                <a href="{{ url()->previous() }}" class="btn btn-primary">Cancel</a>
            </div>
        </div>
    {{ Form::close() }}
@endsection
