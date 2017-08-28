<div id="header">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="logo">
                <a href="{!! route('dashboard') !!}">
                    <img class="panel-logo" src="{{ asset('img/logo.png') }}" alt="image">
                    <div class="heading">
                        @role('admin')Admin @endrole
                        @role('teacher')Teacher @endrole
                        @role('student')Student @endrole
                        Portal
                    </div>
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right nav-panel">
                @include('partials.module_navigation')
            </ul>
        </nav>
    </div>
</div>