<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'home' => 'Home',
            'home_status' => '1',
            'academic' => 'Academics',
            'academic_status' => '1',
            'admission' => 'Admission',
            'admission_status' => '1',
            'management' => 'Management',
            'management_status' => '1',
            'rnd' => 'R&D',
            'rnd_status' => '1',
            'affair' => 'International Affairs',
            'affair_status' => '1',
            'event' => 'News & Event',
            'event_status' => '1',
        ]);
    }
}
