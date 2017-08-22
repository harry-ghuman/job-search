<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEducation extends Model
{
    protected $table = 'students_education';
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'program', 'university', 'gpa', 'country', 'year'
    ];
}
