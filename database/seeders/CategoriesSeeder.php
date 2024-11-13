<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Monthly',
            'price' => 10.00
        ]);

        Category::create([
          'name' => '6-Months',
          'price' => 50.00
      ]);

        Category::create([
            'name' => 'Yearly',
            'price' => 100.00
        ]);

        Category::create([
          'name' => 'Lifetime',
          'price' => 500.00
        ]);

        Category::create([
            'name' => 'Free',
            'price' => 0.00
        ]);
    }
}
