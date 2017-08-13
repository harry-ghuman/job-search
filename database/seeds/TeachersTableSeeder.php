<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Teacher;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id                = ['2','3'];
        $job_title              = ['associate professor','professor'];
        $special_designation    = ['dean','director'];
        $department             = ['computer science','mechanical'];
        $phone                  = ['2268527410','5198527410'];
        $office_address         = ['R 510, Chrysler Hall, University of Windsor','R 410, Chrysler Hall, University of Windsor'];

        for($i=0;$i<count($user_id);$i++){
            $teacher = [
                'user_id'               => $user_id[$i],
                'job_title'             => $job_title[$i],
                'special_designation'   => $special_designation[$i],
                'department'            => $department[$i],
                'phone'                 => $phone[$i],
                'office_address'        => $office_address[$i],
            ];
            Teacher::create($teacher);
        }
    }
}
