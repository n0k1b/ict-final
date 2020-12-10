<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\main_table;

class MainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        main_table::create([
            'main_topic_name'=>'তথ্য ও যোগাযোগ প্রযুক্তিঃ বিশ্ব ও বাংলাদেশ প্রেক্ষিত',
            'main_topic_image'=>'image/main_topic_image/chapter1.jpg',
            'main_topic_description'=>"Test Description",
            'main_topic_button_text'=>'Test Button',
        ]);
    }
}
