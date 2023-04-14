<?php

namespace Database\Seeders;

use App\Models\Management;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Management::create([
            'member'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
            'syndicate'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
            'council'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
            'vice'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
            'pro_vice'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
            'adminis'=>'https://via.placeholder.com/700x350.png/005577?text=modi',
        ]);
    }
}
