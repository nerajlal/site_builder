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
        Schema::create('testimonials', function (Blueprint $table) {
        $table->id();
        $table->foreignId('header_footer_id')->constrained('header_footer')->onDelete('cascade');
        $table->string('testi_main')->nullable();
        $table->string('testi_sub')->nullable();
        $table->text('testi1')->nullable();
        $table->string('testi_user1')->nullable();
        $table->text('testi2')->nullable();
        $table->string('testi_user2')->nullable();
        $table->text('testi3')->nullable();
        $table->string('testi_user3')->nullable();
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};
