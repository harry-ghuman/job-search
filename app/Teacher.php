<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id'
    ];

    public function teacherInfo()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
