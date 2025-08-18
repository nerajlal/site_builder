<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brand = Brand::first();
        $category = Category::first();

        Product::create([
            'header_footer_id' => 1,
            'brand_id' => $brand->id,
            'category_name' => $category->name,
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'price' => 99.99,
            'quantity' => 10,
            'image_url' => '/images/1.png',
            'sizes' => json_encode([
                ['size' => 'S', 'stock' => 10],
                ['size' => 'M', 'stock' => 10],
                ['size' => 'L', 'stock' => 10],
            ]),
        ]);
    }
}
