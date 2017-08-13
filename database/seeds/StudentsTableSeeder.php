<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id            = ['4','5'];
        $student_id         = ['104509784','104509795'];
        $semester           = ['winter','spring'];
        $year               = ['2016','2016'];
        $phone              = ['6479368403','6479369963'];
        $gender             = ['male','male'];
        $residency_status   = ['international student','international student'];
        $country            = ['india','nigeria'];

        for($i=0;$i<count($user_id);$i++){
            $student = [
                'user_id'           => $user_id[$i],
                'student_id'        => $student_id[$i],
                'semester'          => $semester[$i],
                'year'              => $year[$i],
                'phone'             => $phone[$i],
                'gender'            => $gender[$i],
                'residency_status'  => $residency_status[$i],
                'country'           => $country[$i],
            ];
            Student::create($student);
        }
    }
}
