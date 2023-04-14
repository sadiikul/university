<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConteontSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
            'theme' => '#148638',
            'slide' => '0',
            'map' => '<iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7303.774318689983!2d90.367539!3d23.751403!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xab8a4ec73cf72870!2sState%20University%20of%20Bangladesh!5e0!3m2!1sen!2sbd!4v1665990147123!5m2!1sen!2sbd"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>',
        ]);
    }
}
