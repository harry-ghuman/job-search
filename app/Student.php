<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    protected $fillable = ['student_id', 'semester', 'year', 'phone', 'residency_status', 'country', 'gender'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function studentInfo()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function education()
    {
        return $this->hasMany(StudentEducation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workExperience()
    {
        return $this->hasMany(StudentWorkExperience::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skills()
    {
        return $this->hasMany(StudentSkill::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function jobApplication()
    {
        return $this->hasOne(JobApplication::class);
    }

}
