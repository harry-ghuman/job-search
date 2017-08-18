<div id="header">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="logo">
                <a href="{!! route('dashboard') !!}">
                    <img class="panel-logo" src="{{ asset('img/logo.png') }}" alt="image">
                    <div class="heading">Admin Portal</div>
                </a>
            </div>
            <ul class="nav navbar-nav navbar-right nav-panel">
                <li><a href="{!! route('dashboard') !!}">Home</a></li>
                {{--@can('roles', ['admin'])--}}
                    <li><a href="{{ route('teacher.index') }}">Teacher</a></li>
                    <li><a href="{{ route('student.index') }}">Student</a></li>
                    <li><a href="{{ route('job.index') }}">Job</a></li>
                {{--@endcan--}}
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
</div>