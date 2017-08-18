<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public $timestamps = false;

    public function teacherName()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
