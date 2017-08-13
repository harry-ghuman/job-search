<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names          = ['admin','teacher','student'];
        $display_names  = ['Administrator','Teacher','Student'];
        $created_at     = Carbon::now();
        $updated_at     = Carbon::now();

        for($i=0;$i<count($names);$i++){
            $role = [
                'name'          => $names[$i],
                'display_name'  => $display_names[$i],
                'created_at'    => $created_at,
                'updated_at'    => $updated_at,
            ];
            Role::create($role);
        }
    }
}
