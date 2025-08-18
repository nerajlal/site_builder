<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\Models\HeaderFooter;
use App\Models\User;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a user and a header/footer
        $user = User::factory()->create();
        $headerFooter = HeaderFooter::create([
            'user_id' => $user->id,
            'site_name' => 'Test Store',
        ]);

        // Create a product
        $product = Product::create([
            'header_footer_id' => $headerFooter->id,
            'name' => 'Test Product',
            'description' => 'This is a test product.',
            'price' => 99.99,
            'image_url' => '/images/1.png',
            'sizes' => json_encode([
                ['size' => 'S', 'stock' => 10],
                ['size' => 'M', 'stock' => 10],
                ['size' => 'L', 'stock' => 10],
            ]),
        ]);

        // Add some colors to the product
        ProductColor::create([
            'product_id' => $product->id,
            'name' => 'Pink',
            'value' => '#FFC0CB',
        ]);

        ProductColor::create([
            'product_id' => $product->id,
            'name' => 'Blue',
            'value' => '#0000FF',
        ]);

        // Add some images to the product
        ProductImage::create([
            'product_id' => $product->id,
            'image_url' => '/images/2.png',
        ]);
    }
}
