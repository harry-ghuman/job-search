@extends('layouts.master_module')
@section('page.title')
{{ ucwords($user->name) }} | Admin
@endsection
@section('page.body')
    <div class="title" id="title">
        <div class="container">
            Admin information
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
                                <td>{{ ucwords($user->name) }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-right ">
                        @role('admin')
                            <a href="{{ URL::to('admin/' . $user->id.'/edit#title') }}" class="btn btn-sm btn-primary">Edit profile</a>
                        @endrole
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection