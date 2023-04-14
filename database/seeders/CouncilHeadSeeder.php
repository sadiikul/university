<?php

namespace Database\Seeders;

use App\Models\CouncilHead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouncilHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CouncilHead::create([
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper viverra viverra sapien ut. Eu cursus gravida consectetur lacus ornare amet tincidunt condimentum in. Dolor sed scelerisque aliquam aliquam dignissim'
        ]);
    }
}
