<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Messages;
class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Messages::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'title' => 'Application launch',
            'message' => 'DTWeb application launch version v1',
            'image'=>'',
            'url' =>''
        ]);
    }
}
