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
        Schema::table('home_settings', function (Blueprint $table) {
            $table->unsignedBigInteger('header_footer_id')->nullable()->after('id');
            $table->foreign('header_footer_id')->references('id')->on('header_footer')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('home_settings', function (Blueprint $table) {
            $table->dropForeign(['header_footer_id']);
            $table->dropColumn('header_footer_id');
        });
    }

};
