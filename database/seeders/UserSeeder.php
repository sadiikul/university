<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('000000'),
            'dept_id' => null,
            'role' => 1,
            'phone' => '+88017xxxxxxxx',
            'img' => null,
            'status' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        $user->assignRole('admin');
    }
}
