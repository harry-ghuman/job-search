@extends('layouts.master_module')
@section('page.title')
    Homepage
@endsection
@section('page.body')
    @include('partials.module_header')
    <div class="banner banner_home"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        Homepage
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
