<?php

use Illuminate\Database\Seeder;
use App\Student;
use App\StudentEducation;
use App\StudentWorkExperience;
use App\StudentSkill;

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

        StudentEducation::create([
            'user_id'       =>'4',
            'program'       =>'B.Tech',
            'university'    =>'GNDU',
            'gpa'           =>'3',
            'year'          =>'2015',
            'country'       =>'india',
        ]);
        StudentWorkExperience::create([
            'user_id'       =>'4',
            'job_title'     =>'Web developer',
            'company'       =>'NYNDesigns',
            'duties'        =>'Working on requests',
            'start_date'    =>'2017-08-20 17:04:13',
            'end_date'      =>'2017-08-20 17:04:13',
        ]);
        StudentSkill::create([
            'user_id'       =>'4',
            'skill_name'    =>'PHP',
        ]);
    }
}
