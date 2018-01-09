<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;

    protected $fillable = ['job_title', 'special_designation', 'department', 'phone', 'office_address'];

    /**
     * Get teacher information from user model
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function teacherInfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    /**
     * Get all the jobs posted by teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postedJobs()
    {
        return $this->hasMany(Job::class)->orderBy('job_title');
    }
}