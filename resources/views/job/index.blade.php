@extends('layouts.modulePage')

@section('page.title', 'Jobs')

@section('page.body.title', 'List of Jobs')
@section('page.body.content')
    @if(!count($jobs))
        <div class="alert alert-info text-center h4">
            No job has been posted yet!

            @role('teacher')
                <br>
                <br>
                <div class="text-center">
                    <a href="{{ route('jobs.create') }}" class="btn btn-sm btn-primary">Create Job</a>
                </div>
            @endrole
        </div>
    @else
        @role('teacher')
            <div class="text-right">
                <a href="{{ route('jobs.create') }}" class="btn btn-sm btn-primary">Create Job</a>
            </div>
        @endrole
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <th>Job title</th>
                    <th>Credits</th>
                    @role(['admin', 'student'])
                        <th>Posted By</th>
                    @endrole
                    @role(['admin', 'teacher'])
                        <th>Applications Received</th>
                        <th><!--Actions--></th>
                    @endrole
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td title="Click to view more information"><a href="{{ route('jobs.show', $job->id) }}">{{ ucwords($job->job_title) }}</a></td>
                            <td>{{ ucwords($job->credits) }}</td>
                            @role(['admin', 'student'])
                                <td title="Click to view more information"><a href="{{ route('teachers.show', $job->jobPostedBy->id) }}">{{ ucwords($job->jobPostedBy->teacherInfo->name) }}</a></td>
                            @endrole
                            @role(['admin', 'teacher'])
                                <td>
                                    <a href="{{ route('jobs.viewJobApplications', $job->jobPostedBy->id) }}" class="btn btn-xs btn-warning">{{ $job->jobApplications->count() }} applicant<?php echo ($job->jobApplications->count()>1)? 's':''; ?></a>
                                </td>
                                <td>
                                    <a href="{{ route('jobs.edit', $job->id) }}" class="btn btn-xs btn-primary">Edit</a>
                                    <div style="display: inline-block;">
                                        {{ Form::open(array('url' => route('jobs.destroy', $job->id),'onsubmit' => 'return confirm("Are you sure you want to delete '.$job->job_title.'?")')) }}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::submit('Delete', array('class' => 'btn btn-xs btn-primary')) }}
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            @endrole
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
