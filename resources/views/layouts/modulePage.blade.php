@extends('layouts.master')
@section('page.main')
    @include('partials.module_header')
    <div class="banner {{ (isset($homepage))? 'banner_home':'banner_interior' }}"></div>
    <div id="home">
        @yield('page.body')
    </div>
    @include('partials.module_footer')
@endsection