@extends('layouts.master_module')
@section('page.title')
    {{ ucwords($student->studentInfo->name) }} | Students
@endsection
@section('page.body')
    <div class="title" id="title">
        <div class="container">
            Student information
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
                            <td>{{ ucwords($student->studentInfo->name) }}</td>
                        </tr>
                        <tr>
                            <th>Student ID</th>
                            <td>{{ ucwords($student->student_id) }}</td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td>{{ ucwords($student->semester) }}</td>
                        </tr>
                        <tr>
                            <th>Year</th>
                            <td>{{ ucwords($student->year) }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><a href="mailto:{{ $student->studentInfo->email }}">{{ $student->studentInfo->email }}</a></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $student->phone }}</td>
                        </tr>
                        <tr>
                            <th>Residency Status</th>
                            <td>{{ ucwords($student->residency_status) }}</td>
                        </tr>
                        <tr>
                            <th>Country</th>
                            <td>{{ ucwords($student->country) }}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{ ucwords($student->gender) }}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="text-right ">
                        <a href="{{ URL::to('student/' . $student->id.'/edit#title') }}" class="btn btn-sm btn-primary">Edit profile</a>
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection