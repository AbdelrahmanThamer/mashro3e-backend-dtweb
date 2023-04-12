<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeneralSettings;
class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'banner_ad',
            'settings_value' => '1',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'interstital_ad',
            'settings_value' => '1',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'reward_ad',
            'settings_value' => '1',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'banner_adid',
            'settings_value' => 'ca-app-pub-3940256099942544/6300978111',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'interstital_adid',
            'settings_value' => 'ca-app-pub-3940256099942544/1033173712',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'reward_adid',
            'settings_value' => 'ca-app-pub-3940256099942544/3419835294',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'interstital_adclick',
            'settings_value' => '1',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'reward_adclick',
            'settings_value' => '1',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'ios_banner_ad',
            'settings_value' => '1',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'ios_interstital_ad',
            'settings_value' => '1',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'ios_reward_ad',
            'settings_value' => '1',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'ios_banner_adid',
            'settings_value' => 'ca-app-pub-3940256099942544/2934735716',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'ios_interstital_adid',
            'settings_value' => 'ca-app-pub-3940256099942544/4411468910',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'ios_interstital_adclick',
            'settings_value' => '1',
        ]);
       
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'ios_reward_adclick',
            'settings_value' => '1',
        ]);
        
        GeneralSettings::create([
            'app_id' => 'Ww4eqHKkhpxs3hKK',
            'settings_key' => 'ios_reward_adid',
            'settings_value' => 'ca-app-pub-3940256099942544/5662855259',
        ]);
        
    }
}
