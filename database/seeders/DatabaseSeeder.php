<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // call other seeders here
    $this->call([
      CategoriesSeeder::class,
    ]);

    User::create([
      'name' => 'Admin',
      'email' => 'admin@gmail.com',
      'password' => bcrypt('admin123'),
    ]);
  }
}
