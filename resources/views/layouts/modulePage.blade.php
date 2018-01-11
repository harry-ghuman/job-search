@extends('layouts.master')

@section('page.main')
    @include('layouts.partials.header')
    @include('layouts.partials.notifications')
    <div class="banner {{ (isset($homepage))? 'banner_home':'banner_interior' }}"></div>
    <div id="home_module">
        <div class="title" id="title">
            <div class="container">
                @yield('page.body.title')
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @yield('page.body.content')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.footer')
@endsection
