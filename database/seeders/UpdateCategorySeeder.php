<?php

namespace Database\Seeders;

use App\Enums\CategoryEnum;
use App\Models\Category;
use Illuminate\Database\Seeder;

class UpdateCategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $normal = Category::firstOrCreate([
      'name' => CategoryEnum::NORMAL->value,
      'price' => 0.00,
      'parent_id' => null
    ]);

    $categories = Category::where('parent_id', null)->where('name', '!=', CategoryEnum::NORMAL->value)->where('name', '!=', CategoryEnum::PREMIUM->value)->get();

    foreach ($categories as $category) {
      $category->update([
        'parent_id' => $normal->id
      ]);
    }

    $premium = Category::firstOrCreate([
      'name' => CategoryEnum::PREMIUM->value,
      'price' => 0.00,
      'parent_id' => null
    ]);

    Category::create([
      'name' => CategoryEnum::MONTHLY->value,
      'price' => 69.00,
      'parent_id' => $premium->id
    ]);

    Category::create([
      'name' => CategoryEnum::SIX_MONTHS->value,
      'price' => 349.00,
      'parent_id' => $premium->id
    ]);

    Category::create([
      'name' => CategoryEnum::YEARLY->value,
      'price' => 649.00,
      'parent_id' => $premium->id
    ]);


  }
}
