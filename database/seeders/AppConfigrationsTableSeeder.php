<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AppConfigrations;

class AppConfigrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppConfigrations::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'app_name' => 'DTWeb',
            'app_logo' => 'images/2789852821658320058.png',
            'full_screen'=>'',
            'side_drawer' =>'Side Drawer',
            'bottom_navigation' =>'Bottom Navigation',
            'base_url' =>'https://codecanyon.net/',
            'primary' =>'#0074e4',
            'primary_dark' =>'#1d262c',
            'accent' =>'#ffffff',
            'pull_to_refresh' =>'1',
            'introduction_screen' =>'1',
            'floating_menu_screen' =>'1'
        ]);
    }
}
