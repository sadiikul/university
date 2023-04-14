<?php

namespace Database\Seeders;

use App\Models\AboutHead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutHead::create([
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper viverra viverra sapien ut. Eu cursus gravida consectetur lacus ornare amet tincidunt condimentum in. Dolor sed scelerisque aliquam aliquam dignissim',
            'img' => 'https://via.placeholder.com/550x180.png/0000cc?text=voluptatem',
        ]);
    }
}
