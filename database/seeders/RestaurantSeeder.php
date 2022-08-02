<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rest = new \App\Models\Restaurant();
        $rest->title = "Taluti";
        $rest->code = '123';
        $rest->city = 'Kaunas';
        $rest->address = 'Laisves. al';
        $rest->save();

        $rest = new \App\Models\Restaurant();
        $rest->title = "Taluti";
        $rest->code = '123';
        $rest->city = 'Kaunas';
        $rest->address = 'Laisves. al';
        $rest->save();

        $rest = new \App\Models\Restaurant();
        $rest->title = "Taluti";
        $rest->code = '123';
        $rest->city = 'Kaunas';
        $rest->address = 'Laisves. al';
        $rest->save();
    }
}
