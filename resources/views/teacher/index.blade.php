@extends('layouts.master_module')
@section('page.title')
    Teachers
@endsection
@section('page.body')
    @include('partials.module_navbar')
    <div class="banner banner_interior"></div>
    <div class="container">
        <h1 class="display-4 text-center">List of Teachers</h1>
        <table class="table table-striped table-condensed">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Job title</th>
                <th>Department</th>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr>
                        <td>{{ $teacher->id }}</td>
                        <td title="Click to view more"><a href="{{ URL::to('teacher/' . $teacher->id) }}">{{ ucwords($teacher->teacherName->name) }}</a></td>
                        <td>{{ ucwords($teacher->job_title) }}</td>
                        <td>{{ ucwords($teacher->department) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection