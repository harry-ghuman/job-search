<?php

namespace App\Policies;

use App\User;
use App\Job;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
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
        return $user->can('index-job');
    }

    public function create(User $user)
    {
        return $user->can('create-job');
    }

    public function store(User $user)
    {
        return $user->can('store-job');
    }

    public function show(User $user)
    {
        return $user->can('show-job');
    }

    public function edit(User $user)
    {
        return $user->can('edit-job');
    }

    public function update(User $user)
    {
        return $user->can('update-job');
    }

    public function destroy(User $user)
    {
        return $user->can('destroy-job');
    }
}
