<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $table = 'job_applications';

    protected $fillable = ['job_id', 'teacher_id', 'student_id', 'status'];

    public function studentInfo()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}
