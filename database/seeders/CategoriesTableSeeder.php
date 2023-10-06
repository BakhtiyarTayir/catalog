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
            'Electronics',
            'Fashion',
            'Home & Garden',
        ];

        $parentIds = [];
        foreach ($parentCategories as $parentCategory) {
            $id = DB::table('categories')->insertGetId([
                'name' => $parentCategory,
                'slug' => \Str::slug($parentCategory),
                'parent_id' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),  
            ]);
            $parentIds[] = $id;
        }

        $childCategories = [
            ['Smartphones', $parentIds[0]],
            ['Laptops', $parentIds[0]],
            ['Men Clothing', $parentIds[1]],
            ['Women Clothing', $parentIds[1]],
            ['Furniture', $parentIds[2]],
            ['Decor', $parentIds[2]],
        ];

        $childIds = [];
        foreach ($childCategories as [$name, $parentId]) {
            $id = DB::table('categories')->insertGetId([
                'name' => $name,
                'slug' => \Str::slug($name),
                'parent_id' => $parentId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
            $childIds[] = $id;
        }

        $grandChildCategories = [
            ['Apple', $childIds[0]],
            ['Samsung', $childIds[0]],
            ['Dell', $childIds[1]],
            ['HP', $childIds[1]],
            ['T-Shirts', $childIds[2]],
            ['Jeans', $childIds[2]],
            ['Chairs', $childIds[4]],
            ['Tables', $childIds[4]],
        ];

        foreach ($grandChildCategories as [$name, $parentId]) {
            DB::table('categories')->insert([
                'name' => $name,
                'slug' => \Str::slug($name),
                'parent_id' => $parentId,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}