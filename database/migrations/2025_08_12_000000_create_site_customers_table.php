<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('site_customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('header_footer_id');
            $table->string('name')->nullable();
            $table->string('whatsapp');
            $table->string('password')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'header_footer_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_customers');
    }
};


