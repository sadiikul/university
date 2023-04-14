<?php

namespace Database\Seeders;

use App\Models\ProgramCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProgramCategory::create([
            'name' => 'Graduate',
            'slug' => 'graduate',
            'status' => '1',
        ]);

        ProgramCategory::create([
            'name' => 'Under Gradute',
            'slug' => 'under-graduate',
            'status' => '1',
        ]);
    }
}
