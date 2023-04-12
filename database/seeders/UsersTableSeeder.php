<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'app_id' => '0',
            'username' => '2',
            'mobile' => '1234567890',
            'email' => 'admin@admin.com',
            'role'=>1,
            'password' =>Hash::make('admin')
        ]);
    }
}
