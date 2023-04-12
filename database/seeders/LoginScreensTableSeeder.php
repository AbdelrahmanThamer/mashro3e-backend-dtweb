<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoginScreens;

class LoginScreensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LoginScreens::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'is_login' => 'On',
            'login_with_mobile' => 'On',
            'login_with_gmail'=>'On',
            'login_with_facebook' =>'On'
        ]);
    }
}
