<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FloatingMenu;
class FloatingMenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FloatingMenu::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'name' => 'Home',
            'link' => 'https://codecanyon.net/',
            'image'=>'images/9358614521658318310.png',
            'status' =>1
        ]);
        FloatingMenu::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'name' => 'Contact Us',
            'link' => 'https://www.divinetechs.com/',
            'image'=>'images/7504989871658318223.png',
            'status' =>1
        ]);
        FloatingMenu::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'name' => 'About Us',
            'link' => 'https://themeforest.net/',
            'image'=>'images/7621523211658318164.png',
            'status' =>1
        ]);
        FloatingMenu::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'name' => 'Settings',
            'link' => 'https://www.divinetechs.com/contact-us/',
            'image'=>'images/13460080701658318208.png',
            'status' =>1
        ]);
         FloatingMenu::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'name' => '',
            'link' => '',
            'image'=>'',
            'status' =>0
        ]);
    }
}
