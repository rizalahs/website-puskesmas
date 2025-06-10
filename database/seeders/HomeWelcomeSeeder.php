<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\HomeWelcome;

class HomeWelcomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $obj = new HomeWelcome;
        $obj->heading = "Welcome To Our Website";
        $obj->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's stan when an unknown printer took a galley of type and scramble. Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $obj->photo = "home_welcome.jpg";
        $obj->button_text = "Read More";
        $obj->button_link = "#";
        $obj->status = 'Show';
        $obj->save();
    }
}
