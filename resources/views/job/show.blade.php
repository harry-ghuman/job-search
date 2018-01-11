@extends('layouts.modulePage')

@section('page.title')
    {{ ucwords($job->job_title) }} | jobs
@endsection

@section('page.body.title', 'Job Information')
@section('page.body.content')
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
            <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-sm btn-primary">Edit Job</a>
        @endrole
        @role('student')
            @if(!isset($application_status))
                <a href="{{ URL::to('students/'.App\Student::where('user_id', Auth::user()->id)->value('id').'/applyJob/'.$job->id) }}" class="btn btn-sm btn-primary">Apply to Job</a>
            @endif
        @endrole
    </div>
@endsection
