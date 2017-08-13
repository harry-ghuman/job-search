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
        $names      = ['John Doe','Arunita Jaekal','Zaid Ali','Harpuneet Ghuman','Dave Johnson'];
        $emails     = ['johndoe@jobsearch.com','arunita@jobsearch.com','zaidali@jobsearch.com','harpuneetghuman@jobsearch.com','davejohnson@jobsearch.com'];
        $password   = bcrypt('secret');
        $created_at = Carbon::now();
        $updated_at = Carbon::now();

        for($i=0;$i<count($names);$i++){
            $user = [
                'name'       => $names[$i],
                'email'      => $emails[$i],
                'password'   => $password,
                'created_at' => $created_at,
                'updated_at' => $updated_at,
            ];
            User::create($user);
        }
    }
}
