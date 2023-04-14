<?php

namespace Database\Seeders;

use App\Models\WaiverHead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaiverHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WaiverHead::create([
            'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tempor mi a lectus luctus, ut suscipit risus facilisis. Pellentesque tortor sem, bibendum vel accumsan at, commodo vitae metus. Nulla a iaculis augue. Phasellus egestas, ipsum vel pharetra vestibulum, nisi tortor vestibulum ipsum, sed pretium urna velit quis dolor. Nunc eu luctus augue, hendrerit volutpat mi. Duis blandit dui a ligula faucibus, id pellentesque magna ultrices. Sed suscipit, nisi nec dapibus posuere, justo est volutpat dui, vitae vulputate turpis neque quis elit. In hac habitasse platea dictumst. Praesent ornare, libero molestie faucibus tristique, risus metus pharetra lorem, imperdiet convallis arcu neque in eros. Vivamus fermentum pharetra tincidunt. Morbi tincidunt id arcu a lobortis. Sed nec elementum justo. Suspendisse eget ex non urna gravida cursus.
            Pellentesque vel tellus scelerisque, sodales orci ut, iaculis est. Aenean lectus enim, aliquet vel neque et, maximus consequat est. Mauris sagittis fermentum felis, a condimentum est. In tincidunt massa turpis, ut imperdiet ipsum laoreet sed. Nullam eget erat at quam sagittis varius at et nulla. Sed at posuere tortor. Phasellus accumsan dapibus lacus at aliquet. Vestibulum eget sagittis purus. Vestibulum vitae massa convallis, fermentum eros vitae, malesuada neque. Aenean tristique congue lacus in tincidunt. Vestibulum finibus urna erat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed consequat velit justo, ut vehicula justo vehicula eget. Donec non tristique purus, a facilisis tortor. Pellentesque pellentesque ante felis, eget ultricies sapien pulvinar at.'
        ]);
    }
}
