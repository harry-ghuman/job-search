<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['teacher_id', 'job_title', 'description', 'credits', 'responsibilities', 'requirements'];

    public function jobPostedBy()
    {
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'job_id', 'id');
    }
}
