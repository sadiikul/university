<?php

namespace Database\Seeders;

use App\Models\Custom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Custom::create([
            'head' => null,
            'body_start' => null,
            'body_end' => null,
        ]);
    }
}
