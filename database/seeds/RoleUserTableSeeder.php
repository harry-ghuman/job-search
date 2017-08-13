<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin     = Role::where('name', 'admin')->get()->first();
        $role_teacher   = Role::where('name', 'teacher')->get()->first();
        $role_student   = Role::where('name', 'student')->get()->first();

        $user1          = User::where('name', 'John Doe')->get()->first();
        $user1->attachRole($role_admin);

        $user2          = User::where('name', 'Arunita Jaekal')->get()->first();
        $user2->attachRole($role_teacher);

        $user3          = User::where('name', 'Zaid Ali')->get()->first();
        $user3->attachRole($role_teacher);

        $user4          = User::where('name', 'Harpuneet Ghuman')->get()->first();
        $user4->attachRole($role_student);

        $user5          = User::where('name', 'Dave Johnson')->get()->first();
        $user5->attachRole($role_student);
    }
}
