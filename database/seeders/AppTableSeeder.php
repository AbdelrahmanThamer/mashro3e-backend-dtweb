<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\App;
use Hash;
class AppTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App::create([
            'app_key' => 'Ww4eqHKkhpxs3hKK',
            'app_name' => 'DTWeb',
            'app_icon' => 'images/12568246621658318906.png',
            'is_default' => 1
        ]);
    }
}
