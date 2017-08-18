@extends('layouts.master_module')
@section('page.title')
    Dashboard
@endsection
@section('page.body')
    @include('partials.module_navbar')
    <div class="banner banner_home"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
