@extends('layouts.master_module')
@section('page.title')
    Edit {{ ucwords($student->studentInfo->name) }}'s profile | Students
@endsection
@section('page.body')
    <div class="title" id="title">
        <div class="container">
            Edit Student information
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <span class="badge">1</span>&nbsp;
                        <label><h3><strong>Personal Information</strong></h3></label>
                    </div>
                    {{ Form::model($student, array('route' => array('student.update', $student->id), 'method' => 'PUT', 'class' => "form-horizontal")) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('name', ucwords($student->studentInfo->name), array('class' => 'form-control input-sm', 'required')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('student_id', 'Student ID',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('student_id', $student->student_id, array('class' => 'form-control input-sm', 'required')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('semester', 'Semester',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('semester', ucwords($student->semester), array('class' => 'form-control input-sm')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('student_year', 'Year',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('student_year', ucwords($student->year), array('class' => 'form-control input-sm')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('email', 'Email',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('email', $student->studentInfo->email, array('class' => 'form-control input-sm', 'readonly')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('phone', $student->phone, array('class' => 'form-control input-sm')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('residency_status', 'Residency Status',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('residency_status', ucwords($student->residency_status), array('class' => 'form-control input-sm')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('student_country', 'Country',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('student_country', ucwords($student->country), array('class' => 'form-control input-sm')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('gender', 'Gender',['class'=>'col-sm-2 control-label']) }}
                            <div class="col-sm-10">
                                {{ Form::text('gender', ucwords($student->gender), array('class' => 'form-control input-sm')) }}
                            </div>
                        </div>

                        <div>
                            <span class="badge">2</span>&nbsp;
                            <label><h3><strong>Education</strong></h3></label>
                        </div>
                        <table class="table table-condensed education-table">
                            <thead>
                            <tr>
                                <th>Program</th>
                                <th>University</th>
                                <th>GPA</th>
                                <th>Year</th>
                                <th>Country</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($student_education as $education)
                                <tr>
                                    <td><input type="text" name="program[]" value="{{ ucwords($education->program) }}" class="form-control input-sm"></td>
                                    <td><input type="text" name="university[]" value="{{ ucwords($education->university) }}" class="form-control input-sm"></td>
                                    <td><input type="text" name="gpa[]" value="{{ $education->gpa }}" class="form-control input-sm"></td>
                                    <td><input type="text" name="year[]" value="{{ $education->year }}" class="form-control input-sm"></td>
                                    <td><input type="text" name="country[]" value="{{ ucwords($education->country) }}" class="form-control input-sm"></td>
                                    <td title="Delete row">
                                        <a href="javascript:void(0)" class="ibtnDel btn btn-xs btn-danger">
                                            <span class="glyphicon glyphicon-minus"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-right">
                            <a href="javascript:void(0)" class="btn btn-xs btn-primary" id="addEducationRow">
                                <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Row
                            </a>
                        </div>

                        <div>
                            <span class="badge">3</span>&nbsp;
                            <label><h3><strong>Work experience</strong></h3></label>
                        </div>
                        <table class="table table-condensed work-experience-table">
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
                                    <td><input type="text" name="job_title[]" value="{{ ucwords($work->job_title) }}" class="form-control input-sm"></td>
                                    <td><input type="text" name="company[]" value="{{ ucwords($work->company) }}" class="form-control input-sm"></td>
                                    <td><input type="text" name="duties[]" value="{{ ucfirst($work->duties) }}" class="form-control input-sm"></td>
                                    <td><input type="date" name="start_date[]" value="{{ $work->start_date }}" class="form-control input-sm"></td>
                                    <td><input type="date" name="end_date[]" value="{{ $work->end_date }}" class="form-control input-sm"></td>
                                    <td title="Delete row">
                                        <a href="javascript:void(0)" class="ibtnDel btn btn-xs btn-danger">
                                            <span class="glyphicon glyphicon-minus"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-right">
                            <a href="javascript:void(0)" class="btn btn-xs btn-primary" id="addWorkExperienceRow">
                                <span class="glyphicon glyphicon-plus"></span>&nbsp;Add Row
                            </a>
                        </div>

                        <div>
                            <span class="badge">4</span>&nbsp;
                            <label><h3><strong>Skills</strong></h3></label>
                        </div>
                        <div class="input_fields_wrap">
                            @foreach ($student_skills as $skill)
                                <input type="text"  required class="form-control input-sm" style="display:inline; width:90px" name="skill_name[]" value="{{ $skill->skill_name }}">
                                <a href="javascript:void(0)" class="ibtnDel btn btn-xs btn-danger remove_field" style="margin-right: 18px;">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </a>
                            @endforeach
                        </div>
                        <br>
                        <div class="text-right">
                            <a href="javascript:void(0)" class="btn btn-xs btn-primary add_field_button">
                                <span class="glyphicon glyphicon-plus"></span>&nbsp;Add More
                            </a>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10 text-right">
                                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                                <a href="{{ url()->previous() }}" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
<script>
    $(document).ready(function () {

        $("#addEducationRow").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><input type="text" class="form-control input-sm" name="program[]" required/></td>';
            cols += '<td><input type="text" class="form-control input-sm" name="university[]" required/></td>';
            cols += '<td><input type="text" class="form-control input-sm" name="gpa[]" required/></td>';
            cols += '<td><input type="text" class="form-control input-sm" name="year[]" required/></td>';
            cols += '<td><input type="text" class="form-control input-sm" name="country[]" required/></td>';

            cols += '<td title="Delete row"><a href="javascript:void(0)" class="ibtnDel btn btn-xs btn-danger"><span class="glyphicon glyphicon-minus"></span></a></td>';
            newRow.append(cols);
            $("table.education-table").append(newRow);
        });

        $("#addWorkExperienceRow").on("click", function () {
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><input type="text" class="form-control input-sm" name="job_title[]" required/></td>';
            cols += '<td><input type="text" class="form-control input-sm" name="company[]"required /></td>';
            cols += '<td><input type="text" class="form-control input-sm" name="duties[]" required/></td>';
            cols += '<td><input type="date" class="form-control input-sm" name="start_date[]" required/></td>';
            cols += '<td><input type="date" class="form-control input-sm" name="end_date[]" required/></td>';

            cols += '<td title="Delete row"><a href="javascript:void(0)" class="ibtnDel btn btn-xs btn-danger"><span class="glyphicon glyphicon-minus"></span></a></td>';
            newRow.append(cols);
            $("table.work-experience-table").append(newRow);
        });

        $("table.education-table").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
        });

        $("table.work-experience-table").on("click", ".ibtnDel", function (event) {
            $(this).closest("tr").remove();
        });

        //for adding and removing "skill" input field
        var max_fields      = 20;
        var wrapper         = $(".input_fields_wrap");
        var add_button      = $(".add_field_button");

        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                $(wrapper).append('<input type="text" class="form-control input-sm" style="display:inline; width:90px" name="skill_name[]" required><a href="javascript:void(0)" class="ibtnDel btn btn-xs btn-danger remove_field" style="margin-right: 18px;"><span class="glyphicon glyphicon-minus"></span></a>');
            }
        });

        $(wrapper).on("click",".remove_field", function(e){
            e.preventDefault();
            $(this).prev().remove();
            $(this).remove(); x--;
        })

    });
</script>
@endsection
