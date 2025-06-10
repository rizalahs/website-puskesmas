<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeBanner;

class HomeBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new HomeBanner;
        $obj->heading = "Event and Conference Website";
        $obj->subheading = "September 20-24, 2024, California";
        $obj->text = " Join us at our next networking event and conference! Connect with industry professionals, engage in insightful discussions, and attend hands-on workshops. Learn from experts, collaborate on innovative ideas, and build lasting relationships.";
        $obj->background = "home_banner_123456.jpg";
        $obj->event_date = "08/25/2024";
        $obj->event_time = "03:20:00";
        $obj->save();
    }
}
