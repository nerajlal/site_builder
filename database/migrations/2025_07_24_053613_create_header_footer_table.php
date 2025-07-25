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
        Schema::create('header_footer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // session user id
            $table->string('site_name');
            $table->boolean('features')->default(false);
            $table->boolean('brands')->default(false);
            $table->boolean('collections')->default(false);
            $table->boolean('contact')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user_accounts')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_footer');
    }
};
