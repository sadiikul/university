<?php

namespace Database\Seeders;

use App\Models\Mail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mail::create([
            'transport' => 'smtp',
            'host' => 'smtp.mailtrap.io',
            'port' => '2525',
            'username' => 'user',
            'password' => '123',
            'encryption' => 'tls',
            'from' => 'example@gmail.com',
        ]);
    }
}
