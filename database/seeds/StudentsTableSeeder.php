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
        $faker = Faker\Factory::create();

        $universities   = [
            'University of Alberta', 'University of Windsor', 'University of Manitoba',
            'University of Waterloo', 'University of Toronto', 'York University', 'University of Guelph',
        ];
        $programs   = [
            'Bachelor of Technology', 'Bachelor of Arts', 'Bachelor of Science',
        ];

        $users = DB::table('role_user')
            ->where('role_id','=', '3')
            ->orderBy('user_id')
            ->get();

        foreach ($users as $user) {
            $student = Student::create([
                'user_id'           => $user->user_id,
                'student_id'        => '1045097'.$faker->unique()->numberBetween(10,99),
                'semester'          => $faker->randomElement(['Fall', 'Winter', 'Summer']),
                'year'              => $faker->numberBetween(2015,2017),
                'phone'             => $faker->phoneNumber,
                'gender'            => $faker->randomElement(['Male', 'Female']),
                'residency_status'  => $faker->randomElement(['International Student', 'Citizen/Permanent Resident']),
                'country'           => $faker->country,
            ]);

            $student->education()->create([
                'program'       => $faker->randomElement($programs),
                'university'    => $faker->randomElement($universities),
                'gpa'           => $faker->randomFloat(1,1,4),
                'year'          => $faker->numberBetween(2010,2015),
                'country'       => 'Canada',
            ]);

            $student->workExperience()->create([
                'job_title'     => $faker->jobTitle,
                'company'       => $faker->company,
                'duties'        => $faker->text(50),
                'start_date'    => $faker->date(),
                'end_date'      => $faker->date(),
            ]);

            for($i=1;$i<=5;$i++){
                $student->skills()->create([
                    'skill_name'    => $faker->word,
                ]);
            }
        }
    }
}
