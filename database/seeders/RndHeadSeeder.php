<?php

namespace Database\Seeders;

use App\Models\RndHead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RndHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RndHead::create([
            'title'=>'Research & Development',
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper viverra viverra sapien ut. Eu cursus gravida consectetur lacus ornare amet tincidunt condimentum in. Dolor sed scelerisque aliquam aliquam dignissim',
            'thumb' => 'https://via.placeholder.com/550x180.png/0000cc?text=voluptatem'
        ]);
    }
}
