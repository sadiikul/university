<?php

namespace Database\Seeders;

use App\Models\AdmissionPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmissionPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdmissionPage::create([
            'img'=>'https://via.placeholder.com/1400x2200.png/005577?text=modi'
        ]);
    }
}
