<div class="form-group">
    {{ Form::label('name', 'Name',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('name', ucwords($teacher->user->name), array('class' => 'form-control', 'required')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('job_title', 'Job title',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('job_title', ucwords($teacher->job_title), array('class' => 'form-control', 'required')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('special_designation', 'Special Designation',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('special_designation', ucwords($teacher->special_designation), array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('department', 'Department',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('department', ucwords($teacher->department), array('class' => 'form-control', 'required')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('email', 'Email',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('email', $teacher->user->email, array('class' => 'form-control', 'readonly')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('phone', 'Phone',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('phone', $teacher->phone, array('class' => 'form-control')) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('office_address', 'Office Address',['class'=>'col-sm-2 control-label']) }}
    <div class="col-sm-10">
        {{ Form::text('office_address', $teacher->office_address, array('class' => 'form-control')) }}
    </div>
</div>