<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IntroductionScreens;

class IntroducationScreensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        IntroductionScreens::create([
             'app_id' => 'Ww4eqHKkhpxs3hKK',
        	'title' => 'Enjoy your shopping',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book',
            'image'=>'images/262884021658319794.png',
            'status' =>1
        ]);

        IntroductionScreens::create([
             'app_id' => 'Ww4eqHKkhpxs3hKK',
        	'title' => 'Online Learning',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book',
            'image'=>'images/1063654241658319870.png',
            'status' =>1
        ]);


        IntroductionScreens::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
        	'title' => 'Best video app ever!',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book',
            'image'=>'images/8805180571658319833.png',
            'status' =>1
        ]);
    }
}
