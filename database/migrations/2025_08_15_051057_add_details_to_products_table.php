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
            $table->text('description')->nullable()->after('image_url');
            $table->decimal('original_price', 10, 2)->nullable()->after('price');
            $table->json('colors')->nullable()->after('description');
            $table->json('sizes')->nullable()->after('colors');
            $table->json('key_features')->nullable()->after('sizes');
            $table->string('material')->nullable()->after('key_features');
            $table->text('care_instructions')->nullable()->after('material');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'description',
                'original_price',
                'colors',
                'sizes',
                'key_features',
                'material',
                'care_instructions'
            ]);
        });
    }
};
