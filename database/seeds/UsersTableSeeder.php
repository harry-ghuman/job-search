<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $created_at = Carbon::now();
        $updated_at = Carbon::now();

        User::create([
            'name'       => 'admin',
            'email'      => 'support@jobsearch.com',
            'password'   => bcrypt('secret'),
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        ]);
        if(config('app.env') == 'local'){
            for($i=2;$i<=20;$i++){
                $user = [
                    'name'       => $faker->name,
                    'email'      => $faker->unique()->userName.'@jobsearch.com',
                    'password'   => bcrypt($faker->password),
                    'created_at' => $created_at,
                    'updated_at' => $updated_at,
                ];
                User::create($user);
            }
        }

    }
}
