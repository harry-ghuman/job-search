@extends('layouts.modulePage')

@section('page.title')
    Dashboard
@endsection

@section('page.body.title')
    Welcome to
    @role('admin')Admin @endrole
    @role('teacher')Teacher @endrole
    @role('student')Student @endrole
    Portal
@endsection
