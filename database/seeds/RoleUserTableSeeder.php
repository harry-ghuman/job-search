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
        $roles          = [$role_teacher, $role_student];

        $admin          = User::where('id', 1)->get()->first();
        $admin->attachRole($role_admin);

        if(config('app.env') == 'local'){
            for($i=2;$i<=20;$i++){
                $user   = User::where('id', $i)->get()->first();
                $user->attachRole($roles[array_rand($roles)]);
            }
        }
    }
}
