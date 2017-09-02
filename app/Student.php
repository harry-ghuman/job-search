<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    public function studentInfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function education()
    {
        return $this->hasMany(StudentEducation::class,'user_id','user_id');
    }

    public function workExperience()
    {
        return $this->hasMany(StudentWorkExperience::class,'user_id','user_id');
    }

    public function skills()
    {
        return $this->hasMany(StudentSkill::class,'user_id','user_id');
    }

    public function jobApplication()
    {
        return $this->hasOne(JobApplication::class, 'student_id', 'id');
    }

}
