<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'category_id')) {
                $table->dropColumn('category_id');
            }

            $table->string('category_name')->after('brand_id');
            $table->string('sku')->nullable()->after('name');
            $table->text('description')->nullable()->after('image_url');
            $table->decimal('original_price', 10, 2)->nullable()->after('price');
            $table->json('images')->nullable()->after('image_url');
            $table->string('video_url')->nullable()->after('images');
            $table->json('colors')->nullable()->after('video_url');
            $table->json('sizes')->nullable()->after('colors');

            $table->json('key_features')->nullable();
            $table->json('product_details_features')->nullable();
            $table->json('styling_tips')->nullable();
            $table->json('model_info')->nullable();
            $table->json('garment_details')->nullable();
            $table->json('size_chart')->nullable();
            $table->json('fabric_details')->nullable();
            $table->json('care_instructions')->nullable();
            $table->json('care_tips')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->unsignedBigInteger('category_id')->after('brand_id')->nullable();
            }

            $table->dropColumn([
                'category_name',
                'sku',
                'description',
                'original_price',
                'images',
                'video_url',
                'colors',
                'sizes',
                'key_features',
                'product_details_features',
                'styling_tips',
                'model_info',
                'garment_details',
                'size_chart',
                'fabric_details',
                'care_instructions',
                'care_tips'
            ]);
        });
    }
};
