<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'first_phone_title' => 'LANDPHONE :',
            'second_phone_title' => 'HOTLINE :',
            'email_title' => 'EMAIL',
            'email' => 'state@gmail.com',
            'first_phone' => '+02451251121',
            'second_phone' => '+02451251121',
            'third_phone' => '+02451251121',
            'fourth_phone' => '+02451251121',
            'first_address_title' => 'OWN CAMPUS :',
            'second_address_title' => 'BIJOY CAMPUS :',
            'third_address_title' => 'PERMANENT CAMPUS :',
            'first_address' => '77, Satmasjid Road Dhanmondi, Dhaka 1205,Bangladesh',
            'second_address' => '138, Kalabagan, Mirpur Road, Dhaka 1205,Bangladesh',
            'third_address' => 'South Purbachal,Dhaka,Bangladesh',
        ]);
    }
}
