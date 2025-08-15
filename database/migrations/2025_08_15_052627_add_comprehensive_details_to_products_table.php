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
            // Drop old column if it exists
            if (Schema::hasColumn('products', 'category_id')) {
                $table->dropColumn('category_id');
            }

            // Add new columns
            $table->string('category_name')->after('brand_id');
            $table->string('sku')->nullable()->after('name');
            $table->text('description')->nullable()->after('image_url');
            $table->decimal('original_price', 10, 2)->nullable()->after('price');
            $table->json('images')->nullable()->after('image_url');
            $table->string('video_url')->nullable()->after('images');
            $table->json('colors')->nullable()->after('video_url');
            $table->json('sizes')->nullable()->after('colors');
            $table->json('details')->nullable()->after('sizes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Add back the old column
            if (!Schema::hasColumn('products', 'category_id')) {
                $table->unsignedBigInteger('category_id')->after('brand_id')->nullable();
            }

            // Drop the new columns
            $table->dropColumn([
                'category_name',
                'sku',
                'description',
                'original_price',
                'images',
                'video_url',
                'colors',
                'sizes',
                'details'
            ]);
        });
    }
};
