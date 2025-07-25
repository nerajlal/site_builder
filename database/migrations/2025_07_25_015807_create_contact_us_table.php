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
        Schema::create('contact_us', function (Blueprint $table) {
        $table->id();
        $table->foreignId('header_footer_id')->constrained('header_footer')->onDelete('cascade');
        $table->string('contact_name')->nullable();
        $table->string('contact_sub')->nullable();
        $table->string('contact_phone')->nullable();
        $table->string('contact_hours')->nullable();
        $table->string('contact_email')->nullable();
        $table->string('contact_building')->nullable();
        $table->string('contact_line1')->nullable();
        $table->string('contact_line2')->nullable();
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_us');
    }
};
