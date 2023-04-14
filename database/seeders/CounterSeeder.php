<?php

namespace Database\Seeders;

use App\Models\Counter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Counter::create([
            'title' => 'WHY STATE UNIVERSITY',
            'desc' => 'lorem ipsum dolor is lorem ipsum',
            'faculty' => 100,
            'program' => 300,
            'graduates' => 500,
        ]);
    }
}
