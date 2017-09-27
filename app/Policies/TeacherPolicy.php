<?php

namespace App\Policies;

use App\User;
use App\Teacher;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
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
        return $user->can('index-teacher');
    }

    public function show(User $user, Teacher $teacher)
    {
        return $user->can('show-teacher') &&
            ($user->hasRole('teacher'))? $user->id === $teacher->user_id : true;
    }

    public function edit(User $user, Teacher $teacher)
    {
        return $user->can('edit-teacher') &&
            $user->id === $teacher->user_id;
    }

    /**
     * Determine whether the user can update the teacher.
     *
     * @param  \App\User  $user
     * @param  \App\Teacher  $teacher
     * @return mixed
     */
    public function update(User $user, Teacher $teacher)
    {
        return $user->can('update-teacher') &&
            $user->id === $teacher->user_id;
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
        return $user->can('destroy-teacher');
    }
}
