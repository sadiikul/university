<?php

namespace Database\Seeders;

use App\Models\Logo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Logo::create([
            'header' => 'https://via.placeholder.com/150x100.png/005577?text=modi',
            'footer' => 'https://via.placeholder.com/150x100.png/005577?text=modi',
            'fav' => 'https://via.placeholder.com/50x50.png/005577?text=modi',
        ]);
    }
}
