<?php

namespace Database\Seeders;

use App\Models\Admission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admission::create([
            'program'=>'https://via.placeholder.com/405x430.png/005577?text=modi',
            'admission'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
            'tuition'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
            'foreign'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
            'scholarship'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
            'accommodation'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
            'calender'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
        ]);
    }
}
