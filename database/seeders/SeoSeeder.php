<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seo::create([
            'title' => 'State University',
            'meta_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper viverra viverra sapien ut. Eu cursus gravida consectetur lacus ornare amet tincidunt condimentum in. Dolor sed scelerisque aliquam aliquam dignissim',
            'meta_tag' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
        ]);
    }
}
