@extends('layouts.modulePage')
@section('page.title')
    {{ ucwords($job->job_title) }} | jobs
@endsection
@section('page.body')
    <div class="title" id="title">
        <div class="container">
            Job Information
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <table class="table table-condensed table-bordered table-hover">
                        <tbody>
                        <tr>
                            <th>Job title</th>
                            <td>{{ ucwords($job->job_title) }}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ ucfirst($job->description) }}</td>
                        </tr>
                        <tr>
                            <th>Credits</th>
                            <td>{{ $job->credits }}</td>
                        </tr>
                        <tr>
                            <th>Responsibilities</th>
                            <td>{!! nl2br(e(ucfirst($job->responsibilities))) !!}</td>
                        </tr>
                        <tr>
                            <th>Requirements</th>
                            <td>{!! nl2br(e(ucfirst($job->requirements))) !!}</td>
                        </tr>
                        @if(isset($application_status))
                            <tr>
                                <th>Application Status</th>
                                <td>
                                    <span class="label label-warning">{{ ucfirst($application_status) }}</span>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    <div class="text-right ">
                        @role(['admin', 'teacher'])
                            <a href="{{ URL::to('jobs/' . $job->id.'/edit') }}" class="btn btn-sm btn-primary">Edit Job</a>
                        @endrole
                        @role('student')
                            @if(!isset($application_status))
                                <a href="{{ URL::to('students/'.App\Student::where('user_id', Auth::user()->id)->value('id').'/applyJob/'.$job->id) }}" class="btn btn-sm btn-primary">Apply to Job</a>
                            @endif
                        @endrole
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
