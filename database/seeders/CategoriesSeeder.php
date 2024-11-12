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
        ]);

        Category::create([
          'name' => '6-Months',
      ]);

        Category::create([
            'name' => 'Yearly',
        ]);

        Category::create([
          'name' => 'Lifetime',
        ]);
        
        Category::create([
            'name' => 'Free',
        ]);
    }
}
