<?php

use Illuminate\Database\Seeder;
use App\Job;
use Carbon\Carbon;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $teachers = DB::table('teachers')->select('id')->get();

        foreach ($teachers as $teacher) {
            Job ::create([
                'teacher_id'        => $teacher->id,
                'job_title'         => $faker->jobTitle,
                'credits'           => $faker->randomElement([3, 6, 9]),
                'description'       => $faker->text(50),
                'responsibilities'  => $faker->paragraph(10),
                'requirements'      => $faker->paragraph(10),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ]);
        }
    }
}
