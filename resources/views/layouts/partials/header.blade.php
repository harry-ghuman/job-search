<div id="header">
    <div class="container">
        <div class="logo">
            @if (Auth::guest())
                <a href="{!! route('/') !!}">
            @else
                <a href="{!! route('dashboard') !!}">
                    @endif
                    <img class="panel-logo" src="{{ asset('img/logo.png') }}" alt="image">
                    <div class="heading">
                        @if (Auth::guest())
                            Job Search
                        @else
                            @role('admin')Admin @endrole
                            @role('teacher')Teacher @endrole
                            @role('student')Student @endrole
                            Portal
                        @endif
                    </div>
                </a>
        </div>
        <div class="navbar navbar-default navbar-right navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @include('layouts.partials.navigation')
                </ul>
            </div>

        </div>
    </div>
</div>