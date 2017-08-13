<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin             = Role::where('name', 'admin')->get()->first();
        $role_teacher           = Role::where('name', 'teacher')->get()->first();
        $role_student           = Role::where('name', 'student')->get()->first();

//        $perm_teacher_create    = Permission::where('name', 'create-teacher')->get()->first();
//        $perm_teacher_store     = Permission::where('name', 'store-teacher')->get()->first();
        $perm_teacher_show      = Permission::where('name', 'show-teacher')->get()->first();
        $perm_teacher_edit      = Permission::where('name', 'edit-teacher')->get()->first();
        $perm_teacher_update    = Permission::where('name', 'update-teacher')->get()->first();
        $perm_teacher_destroy   = Permission::where('name', 'destroy-teacher')->get()->first();

//        $perm_student_create    = Permission::where('name', 'create-student')->get()->first();
//        $perm_student_store     = Permission::where('name', 'store-student')->get()->first();
        $perm_student_show      = Permission::where('name', 'show-student')->get()->first();
        $perm_student_edit      = Permission::where('name', 'edit-student')->get()->first();
        $perm_student_update    = Permission::where('name', 'update-student')->get()->first();
        $perm_student_destroy   = Permission::where('name', 'destroy-student')->get()->first();

        $perm_job_create        = Permission::where('name', 'create-job')->get()->first();
        $perm_job_store         = Permission::where('name', 'store-job')->get()->first();
        $perm_job_show          = Permission::where('name', 'show-job')->get()->first();
        $perm_job_edit          = Permission::where('name', 'edit-job')->get()->first();
        $perm_job_update        = Permission::where('name', 'update-job')->get()->first();
        $perm_job_destroy       = Permission::where('name', 'destroy-job')->get()->first();

        $role_admin->attachPermissions([
            $perm_teacher_show, $perm_teacher_edit, $perm_teacher_update, $perm_teacher_destroy,
            $perm_student_show, $perm_student_edit, $perm_student_update, $perm_student_destroy,
            $perm_job_show, $perm_job_edit, $perm_job_update, $perm_job_destroy,
        ]);
        $role_teacher->attachPermissions([
            $perm_teacher_show, $perm_teacher_edit, $perm_teacher_update,
            $perm_student_show,
            $perm_job_create, $perm_job_store, $perm_job_show, $perm_job_edit, $perm_job_update, $perm_job_destroy,
        ]);
        $role_student->attachPermissions([
            $perm_teacher_show,
            $perm_student_show, $perm_student_edit, $perm_student_update,
            $perm_job_show,
        ]);
    }
}
