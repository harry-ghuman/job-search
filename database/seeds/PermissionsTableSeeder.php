<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names          = [
            'create-teacher','store-teacher','show-teacher','edit-teacher','update-teacher','destroy-teacher',
            'create-student','store-student','show-student','edit-student','update-student','destroy-student',
            'create-job','store-job','show-job','edit-job','update-job','destroy-job',
        ];
        $display_names  = [
            'create teacher','store teacher','show teacher','edit teacher','update teacher','destroy teacher',
            'create student','store student','show student','edit student','update student','destroy student',
            'create job','store job','show job','edit job','update job','destroy job',
        ];
        $created_at     = Carbon::now();
        $updated_at     = Carbon::now();

        for($i=0;$i<count($names);$i++){
            $permission = [
                'name'          => $names[$i],
                'display_name'  => $display_names[$i],
                'created_at'    => $created_at,
                'updated_at'    => $updated_at,
            ];
            Permission::create($permission);
        }
    }
}
