<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationSetting;

class NotificationSettingTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NotificationSetting::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'notification_app_id' => '0a4a70fe-c922-4b2a-979d-21188ae1e916',
            'app_key' => 'ZDAwMjcxY2MtN2ZkOS00M2E0LWFiNDAtYjhmN2U1YWE2ODNj'
        ]);
    }
}
