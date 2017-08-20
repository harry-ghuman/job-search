<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['teacher_id', 'job_title', 'description', 'credits', 'responsibilities', 'requirements'];
}
