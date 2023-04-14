<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Department;
use App\Models\DepartmentGallery;
use App\Models\DepartmentSlider;
use App\Models\Message;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Department::factory(12)->create();
        DepartmentSlider::factory(60)->create();
        DepartmentGallery::factory(100)->create();
        Message::factory(20)->create();
        $this->call(ProgramSeeder::class);
        $this->call(RndHeadSeeder::class);
        $this->call(AdmissionSeeder::class);
        $this->call(ForeignHeadSeeder::class);
        $this->call(WaiverHeadSeeder::class);
        $this->call(AdmissionPageSeeder::class);
        $this->call(ManagementSeeder::class);
        $this->call(SyndicateSeeder::class);
        $this->call(CouncilHeadSeeder::class);
        $this->call(ChancellorSeeder::class);
        $this->call(CounterSeeder::class);
        $this->call(LogoSeeder::class);
        $this->call(MarqueeSeeder::class);
        $this->call(ConteontSeeder::class);
        $this->call(SeoSeeder::class);
        $this->call(CustomSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(CustomizeSeeder::class);
        $this->call(MailSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(AccommodationSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(IqacSeeder::class);
    }
}
