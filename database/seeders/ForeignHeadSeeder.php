<?php

namespace Database\Seeders;

use App\Models\ForeignHead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForeignHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ForeignHead::create([
            'title' => 'lorem ipsum is dolor is lorem ipsum is dolor',
            'short' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.',
            'desc' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.',
            'img'=>'https://via.placeholder.com/500x300.png/0000cc?text=voluptatem',
            'multiple' => '["https://via.placeholder.com/500x200.png/0000cc?text=voluptatem"]'
        ]);
    }
}
