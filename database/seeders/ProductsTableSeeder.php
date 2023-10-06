<?php


use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Создаем 50 продуктов с помощью factory
        Product::factory()->count(50)->create();
    }
}
