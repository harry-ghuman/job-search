<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSkill extends Model
{
    protected $table = 'students_skills';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'skill_name'
    ];
}
