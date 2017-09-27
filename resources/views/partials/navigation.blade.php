@if (Auth::guest())
    <li><a href="{{ route('/') }}">Home</a></li>
@else
    <li><a href="{{ route('dashboard') }}">Home</a></li>
@endif
@role('admin')
    <li><a href="{{ route('teacher.index') }}">Teachers</a></li>
    <li><a href="{{ route('student.index') }}">Students</a></li>
    <li><a href="{{ route('job.index') }}">Jobs</a></li>
@endrole
@role('teacher')
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            Jobs<span class="caret"></span>
        </a>
        <ul class="dropdown-menu" role="menu">
            <li><a href="{{ route('job.create') }}">Create Job</a></li>
            <li><a href="{{ route('job.viewPostedJobs', App\Teacher::where('user_id', Auth::user()->id)->value('id')) }}">View Jobs Posted</a></li>
        </ul>
    </li>
@endrole
@role('student')
    <li><a href="{{ route('job.index') }}">Jobs</a></li>
@endrole
@if (Auth::guest())
    <li><a href="{{ route('login') }}">Login</a></li>
@else
    <li class="{{ isset($footer_navigation)? 'dropup': 'dropdown' }}">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            My Account <span class="caret"></span>
        </a>

        <ul class="dropdown-menu" role="menu">
            @role('admin')
                <li><a href="{{ route('admin.show', 1) }}">My profile</a></li>
            @endrole
            @role('teacher')
                <li><a href="{{ route('teacher.show', App\Teacher::where('user_id', Auth::user()->id)->value('id')) }}">My profile</a></li>
            @endrole
            @role('student')
                <li><a href="{{ route('student.show', App\Student::where('user_id', Auth::user()->id)->value('id')) }}">My profile</a></li>
            @endrole
            <li><a href="{{ route('user.resetpassword') }}">Reset Password</a></li>
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
