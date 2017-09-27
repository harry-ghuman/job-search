<?php

namespace App\Policies;

use App\User;
use App\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasRole('admin')) {
            return true;
        }
    }

    public function index(User $user)
    {
        return $user->can('index-student');
    }

    public function show(User $user, Student $student)
    {
        return $user->can('show-student') &&
            ($user->hasRole('student'))? $user->id === $student->user_id : true;
    }

    public function edit(User $user, Student $student)
    {
        return $user->can('edit-student') &&
            $user->id === $student->user_id;
    }

    /**
     * Determine whether the user can update the teacher.
     *
     * @param  \App\User  $user
     * @param  \App\Teacher  $teacher
     * @return mixed
     */
    public function update(User $user, Student $student)
    {

        return $user->can('update-student') &&
            $user->id === $student->user_id;
    }

    /**
     * Determine whether the user can delete the teacher.
     *
     * @param  \App\User  $user
     * @param  \App\Teacher  $teacher
     * @return mixed
     */
    public function destroy(User $user)
    {
        return $user->can('destroy-student');
    }

    public function applyJob(User $user)
    {
        return $user->can('apply-job');
    }
}
