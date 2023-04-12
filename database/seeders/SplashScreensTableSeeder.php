<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SplashScreens;

class SplashScreensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SplashScreens::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',            
        	'required_splash_screen' =>1,
            'title' => 'DTWeb',
            'title_color' => '#0074e4',
            'splash_logo'=>'images/10538683541658318559.png',
            'splash_image_or_color' =>1,
            'splash_background' =>'images/7151113931658318559.png',
            'status' =>'1'
        ]);
    }
}
