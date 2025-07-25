<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('section1', function (Blueprint $table) {
            $table->id();
            $table->foreignId('header_footer_id')->constrained('header_footer')->onDelete('cascade');
            $table->string('main_heading')->nullable();
            $table->string('sub_heading')->nullable();
            $table->string('feature1_heading')->nullable();
            $table->string('feature1_detail')->nullable();
            $table->string('feature2_heading')->nullable();
            $table->string('feature2_detail')->nullable();
            $table->string('feature3_heading')->nullable();
            $table->string('feature3_detail')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section1');
    }
};
