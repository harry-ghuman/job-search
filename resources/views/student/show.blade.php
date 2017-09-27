@extends('layouts.modulePage')
@section('page.title')
    {{ ucwords($student->studentInfo->name) }} | Students
@endsection
@section('page.body')
    <div class="title" id="title">
        <div class="container">
            Student information
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                    <div>
                        <span class="badge">1</span>&nbsp;
                        <label><h3><strong>Personal Information</strong></h3></label>
                    </div>
                    <div class="table-responsive">
						<table class="table table-condensed table-bordered table-hover">
							<tbody>
							<tr>
								<th>Name</th>
								<td>{{ ucwords($student->studentInfo->name) }}</td>
							</tr>
							<tr>
								<th>Student ID</th>
								<td>{{ ucwords($student->student_id) }}</td>
							</tr>
							<tr>
								<th>Semester</th>
								<td>{{ ucwords($student->semester) }}</td>
							</tr>
							<tr>
								<th>Year</th>
								<td>{{ ucwords($student->year) }}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td><a href="mailto:{{ $student->studentInfo->email }}">{{ $student->studentInfo->email }}</a></td>
							</tr>
							<tr>
								<th>Phone</th>
								<td>{{ $student->phone }}</td>
							</tr>
							<tr>
								<th>Residency Status</th>
								<td>{{ ucwords($student->residency_status) }}</td>
							</tr>
							<tr>
								<th>Country</th>
								<td>{{ ucwords($student->country) }}</td>
							</tr>
							<tr>
								<th>Gender</th>
								<td>{{ ucwords($student->gender) }}</td>
							</tr>
							</tbody>
						</table>
                    </div>
                    <div>
                        <span class="badge">2</span>&nbsp;
                        <label><h3><strong>Education</strong></h3></label>
                    </div>
                    @if (!count($student_education))
                        No education added!
                    @else
						<div class="table-responsive">
							<table class="table table-condensed table-bordered table-hover">
								<thead>
									<tr>
										<th>Program</th>
										<th>University</th>
										<th>GPA</th>
										<th>Year</th>
										<th>Country</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($student_education as $education)
										<tr>
											<td>{{ ucwords($education->program) }}</td>
											<td>{{ ucwords($education->university) }}</td>
											<td>{{ $education->gpa }}</td>
											<td>{{ $education->year }}</td>
											<td>{{ ucfirst($education->country) }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
                    @endif
                    <div>
                        <span class="badge">3</span>&nbsp;
                        <label><h3><strong>Work experience</strong></h3></label>
                    </div>
                    @if (!count($student_work_experience))
                        No work experience added!
                    @else
						<div class="table-responsive">
							<table class="table table-condensed table-bordered table-hover">
								<thead>
									<th>Title</th>
									<th>Company</th>
									<th>Duties</th>
									<th>Start date</th>
									<th>End date</th>
								</thead>
								<tbody>
									@foreach ($student_work_experience as $work)
										<tr>
											<td>{{ ucwords($work->job_title) }}</td>
											<td>{{ ucwords($work->company) }}</td>
											<td>{{ ucfirst($work->duties) }}</td>
											<td>{{ $work->start_date }}</td>
											<td>{{ $work->end_date }}</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
                    @endif
                    <div>
                        <span class="badge">4</span>&nbsp;
                        <label><h3><strong>Skills</strong></h3></label>
                    </div>
                    <div>
                        @forelse ($student_skills as $skill)
                            <span class="label label-default">{{ strtoupper($skill->skill_name) }}</span>
                            @empty
                                No skill added!
                        @endforelse
                    </div>
                    <br>
                    <div class="text-right ">
                        @permission('edit-student')
                            <a href="{{ URL::to('student/' . $student->id.'/edit') }}" class="btn btn-sm btn-primary">Edit profile</a>
                        @endpermission
                        <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
