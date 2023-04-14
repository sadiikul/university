<?php

namespace Database\Seeders;

use App\Models\ProViceChancellor;
use App\Models\ViceChancellor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChancellorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ViceChancellor::create([
                'name' => 'John Doe',
                'email' => 'john@gmail.com',
                'desig' => 'Vice Chancellor',
                'short' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper viverra viverra sapien ut. Eu cursus gravida consectetur lacus ornare amet tincidunt condimentum in. Dolor sed scelerisque aliquam aliquam dignissim',
                'long' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper viverra viverra sapien ut. Eu cursus gravida consectetur lacus ornare amet tincidunt condimentum in. Dolor sed scelerisque aliquam aliquam dignissim',
                'img' => 'https://via.placeholder.com/400x500.png/005577?text=modi',
        ]);

        ProViceChancellor::create([
                'name' => 'John Doe',
                'email' => 'john@gmail.com',
                'desig' => 'Vice Chancellor',
                'short' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper viverra viverra sapien ut. Eu cursus gravida consectetur lacus ornare amet tincidunt condimentum in. Dolor sed scelerisque aliquam aliquam dignissim',
                'long' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Semper viverra viverra sapien ut. Eu cursus gravida consectetur lacus ornare amet tincidunt condimentum in. Dolor sed scelerisque aliquam aliquam dignissim',
                'img' => 'https://via.placeholder.com/400x500.png/005577?text=modi',
        ]);
    }
}
