<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductAttributesTableSeeder extends Seeder
{
    public function run(): void
    {
        $attributes = [
            ['product_id' => 1, 'name' => 'Length', 'value' => '15 cm'],
            ['product_id' => 1, 'name' => 'Width', 'value' => '10 cm'],
            ['product_id' => 1, 'name' => 'Weight', 'value' => '200 g'],
            // Добавьте другие атрибуты
        ];

        foreach ($attributes as $attribute) {
            DB::table('product_attributes')->insert([
                'product_id' => $attribute['product_id'],
                'name' => $attribute['name'],
                'value' => $attribute['value'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
