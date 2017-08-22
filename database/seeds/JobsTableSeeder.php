<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Job::create([
            'teacher_id'    =>'1',
            'job_title'     =>'PHP Developer',
            'credits'       =>'6',
            'description'   =>'Web developer position requiring good knowledge of PHP.',
            'created_at'    =>'2017-08-20 17:04:13',
            'updated_at'    =>'2017-08-20 17:04:13',
        ]);
    }
}
