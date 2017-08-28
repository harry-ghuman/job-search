@extends('layouts.master_module')
@section('page.title')
    Dashboard
@endsection
@section('page.body')
    <div class="title">
        <div class="container">
            Welcome to
            @role('admin')Admin @endrole
            @role('teacher')Teacher @endrole
            @role('student')Student @endrole
            Portal
        </div>
    </div>
@endsection
