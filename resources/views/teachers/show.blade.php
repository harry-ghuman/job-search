@extends('layouts.modulePage')

@section('page.title')
    {{ ucwords($teacher->user->name) }} | Teachers
@endsection

@section('page.body.title', 'Teacher information')
@section('page.body.content')
    <table class="table table-condensed table-bordered table-hover">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{ ucwords($teacher->user->name) }}</td>
            </tr>
            <tr>
                <th>Job title</th>
                <td>{{ ucwords($teacher->job_title) }}</td>
            </tr>
            <tr>
                <th>Special Designation</th>
                <td>{{ ucwords($teacher->special_designation) }}</td>
            </tr>
            <tr>
                <th>Department</th>
                <td>{{ ucwords($teacher->department) }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td><a href="mailto:{{ $teacher->user->email }}">{{ $teacher->user->email }}</a></td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $teacher->phone }}</td>
            </tr>
            <tr>
                <th>Office Address</th>
                <td>{{ ucwords($teacher->office_address) }}</td>
            </tr>
        </tbody>
    </table>
    <div class="text-right ">
        @role(['admin', 'teacher'])
            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm btn-primary">Edit profile</a>
        @endrole
    </div>
@endsection
