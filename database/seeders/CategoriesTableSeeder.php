<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parentCategories = [
            ['name' => 'Electronics'],
            ['name' => 'Fashion'],
            ['name' => 'Home & Garden'],
        ];

        $parentIds = [];
        foreach ($parentCategories as $parentCategory) {
            $id = DB::table('categories')->insertGetId([
                'name' => $parentCategory['name'],
                'slug' => \Str::slug($parentCategory['name']),
                'parent_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),  
            ]);
            $parentIds[] = $id;
        }

        $childCategories = [
            ['name' => 'Smartphones', 'parent_id' => $parentIds[0]],
            ['name' => 'Laptops', 'parent_id' => $parentIds[0]],
            ['name' => 'Men Clothing', 'parent_id' => $parentIds[1]],
            ['name' => 'Women Clothing', 'parent_id' => $parentIds[1]],
            ['name' => 'Furniture', 'parent_id' => $parentIds[2]],
            ['name' => 'Decor', 'parent_id' => $parentIds[2]],
        ];

        foreach ($childCategories as $childCategory) {
            DB::table('categories')->insert([
                'name' => $childCategory['name'],
                'slug' => \Str::slug($childCategory['name']),
                'parent_id' => $childCategory['parent_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

}
