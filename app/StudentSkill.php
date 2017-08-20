<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSkill extends Model
{
    protected $table = 'students_skills';

    protected $fillable = [
        'user_id', 'skills'
    ];
}
