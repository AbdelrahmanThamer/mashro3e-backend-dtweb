<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TruncateAllTables::class,
            AppTableSeeder::class,
            AppConfigrationsTableSeeder::class,
            NotificationSettingTables::class,
            // UsersTableSeeder::class,
            MenusTableSeeder::class,
            GeneralSettingsSeeder::class,
            FloatingMenusTableSeeder::class,
            SplashScreensTableSeeder::class,
            IntroducationScreensTableSeeder::class,
            LoginScreensTableSeeder::class,
            MessagesTableSeeder::class
        ]);
    }
}