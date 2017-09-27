<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Teacher;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $job_titles              = ['Lecturer', 'Assistant Professor', 'Associate Professor', 'Professor'];
        $special_designations    = ['Dean', 'Director', 'Graduate Coordinator', 'Undergraduate Coordinator', ''];
        $departments             = ['Computer Science','Mechanical', 'Business Management', 'Medical Sciences', 'Electrical'];

        $users = DB::table('role_user')
            ->where('role_id','=', '2')
            ->orderBy('user_id')
            ->get();

        foreach ($users as $user) {
            $teacher = [
                'user_id'               => $user->user_id,
                'job_title'             => $faker->randomElement($job_titles),
                'special_designation'   => $faker->randomElement($special_designations),
                'department'            => $faker->randomElement($departments),
                'phone'                 => '519.253.3000 ext.'.$faker->unique()->numberBetween(4000, 4200),
                'office_address'        => 'R '.rand(1,6).'0'.rand(1,6).' Chrysler Hall, University of Windsor, Windsor, ON N9B 3P4',
            ];
            Teacher::create($teacher);
        }
    }
}
