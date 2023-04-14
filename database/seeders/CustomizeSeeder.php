<?php

namespace Database\Seeders;

use App\Models\Customize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customize::create([
            'academics' => '1',
            'admission' => '1',
            'management' => '1',
            'seminar' => '1',
            'notice' => '1',
            'social_page' => '1',
            'news_event' => '1',
            'counter' => '1',
            'gallery' => '1',
            'clubs' => '1',
            'partner' => '1',
        ]);
    }
}
