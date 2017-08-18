@extends('layouts.master_module')
@section('page.title')
    Teachers
@endsection
@section('page.body')
    <div class="container">
        @include('partials.module_navbar')
        <h1 class="display-4 text-center">List of Teachers</h1>
        <table class="table table-striped table-condensed">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Job title</th>
                <th>Special Designation</th>
                <th>Department</th>
                <th>Phone</th>
                <th>Office Address</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $teacher->id }}</td>
                    <td>{{ $teacher->teacherName->name }}</td>
                    <td>{{ $teacher->job_title }}</td>
                    <td>{{ $teacher->special_designation }}</td>
                    <td>{{ $teacher->department }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ $teacher->office_address }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection