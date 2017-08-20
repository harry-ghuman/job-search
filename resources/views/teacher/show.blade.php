@extends('layouts.master_module')
@section('page.title')
{{ ucwords($teacher->teacherInfo->name) }} | Teachers
@endsection
@section('page.body')
<div class="title" id="title">
    <div class="container">
        Teacher information
    </div>
</div>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <table class="table table-condensed table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ ucwords($teacher->teacherInfo->name) }}</td>
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
                                <td><a href="mailto:{{ $teacher->teacherInfo->email }}">{{ $teacher->teacherInfo->email }}</a></td>
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
                        <a href="{{ URL::to('teacher/' . $teacher->id.'/edit#title') }}" class="btn btn-sm btn-primary">Edit profile</a>
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection