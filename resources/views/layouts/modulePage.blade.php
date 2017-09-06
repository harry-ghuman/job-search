@extends('layouts.master')
@section('page.main')
    @include('partials.header')
    <div class="banner {{ (isset($homepage))? 'banner_home':'banner_interior' }}"></div>
    <div id="home_module">
        @yield('page.body')
    </div>
    @include('partials.footer')
@endsection
