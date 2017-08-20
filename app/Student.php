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
}
