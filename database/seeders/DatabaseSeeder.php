<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    $this->call(RestaurantSeeder::class);
    $this->call(MenuSeeder::class);
    $this->call(DishSeeder::class);
    $this->call(AdminSeeder::class);
  }
}
