<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory(Category::class, 5)->create()->each(function ($category) {
            factory(Category::class, 3)->create(['parent_id' => $category->id])->each(function ($subCategory) {
                factory(Category::class, 2)->create(['parent_id' => $subCategory->id]);
            });
        });
    }

}
