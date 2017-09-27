<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentWorkExperience extends Model
{
    protected $table = 'students_work_experience';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'job_title', 'company', 'duties', 'start_date', 'end_date'
    ];
}
