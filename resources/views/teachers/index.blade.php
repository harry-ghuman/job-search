@extends('layouts.modulePage')

@section('page.title', 'Teachers')

@section('page.body.title', 'List of Teachers')
@section('page.body.content')
    @if(!count($users))
        <div class="alert alert-info text-center h4">
            No teacher has registered with Job Search App right now!
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-condensed">
                <thead>
                    <th>Name</th>
                    <th>Job title</th>
                    <th>Department</th>
                    <th><!--Actions--></th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <a href="{{ route('teachers.show', $user->teacher->id) }}" target="_blank" title="Click to view more information">
                                    {{ ucwords($user->name) }}
                                </a>
                            </td>
                            <td>{{ ucwords($user->teacher->job_title) }}</td>
                            <td>{{ ucwords($user->teacher->department) }}</td>
                            <td>
                                <a href="{{ route('teachers.show', $user->teacher->id) }}" class="btn btn-xs btn-primary" title="View more information"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('teachers.edit', $user->teacher->id) }}" class="btn btn-xs btn-warning" title="Edit teacher profile"><i class="far fa-edit"></i></a>
                                {{ Form::open([ 'method'  => 'delete', 'route' => [ 'teachers.destroy', $user->teacher->id ], 'style' => 'display:inline' ]) }}
                                {{ Form::button('<i class="fas fa-times"></i>', ['type' => 'submit', 'class' => 'btn btn-xs btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
