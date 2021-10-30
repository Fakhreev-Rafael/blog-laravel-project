<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'example',
            'email' => 'example@mail.com',
            'password' => Hash::make('example'),
            'is_email_confirmed' => true,
            'email_confirmation_key' => Str::random(32),
        ];

        User::insert($user);
    }
}
