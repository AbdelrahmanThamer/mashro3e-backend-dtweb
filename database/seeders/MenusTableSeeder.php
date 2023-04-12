<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menus;
class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menus::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'title' => 'Home',
            'url' => 'https://codecanyon.net/',
            'image'=>'images/9358614521658318310.png',
            'status' =>1
        ]);
        Menus::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'title' => 'Contact Us',
            'url' => 'https://www.divinetechs.com/',
            'image'=>'images/7504989871658318223.png',
            'status' =>1
        ]);
        Menus::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'title' => 'About Us',
            'url' => 'https://themeforest.net/',
            'image'=>'images/7621523211658318164.png',
            'status' =>1
        ]);
        Menus::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'title' => 'Settings',
            'url' => 'https://www.divinetechs.com/contact-us/',
            'image'=>'images/13460080701658318208.png',
            'status' =>1
        ]);
    }
}
