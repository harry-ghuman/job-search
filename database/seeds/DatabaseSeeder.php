<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);
//         $this->call(RolesTableSeeder::class);
//         $this->call(PermissionsTableSeeder::class);
//         $this->call(PermissionRoleTableSeeder::class);
//         $this->call(RoleUserTableSeeder::class);

         if(config('app.env') == 'local'){
//             $this->call(TeachersTableSeeder::class);
             $this->call(StudentsTableSeeder::class);
//             $this->call(JobsTableSeeder::class);
         }
    }
}
