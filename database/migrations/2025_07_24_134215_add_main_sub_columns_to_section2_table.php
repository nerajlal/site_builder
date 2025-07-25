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
        Schema::table('section2', function (Blueprint $table) {
            $table->string('main_text1')->nullable();
            $table->string('sub_text1')->nullable();
        });
    }

    public function down()
    {
        Schema::table('section2', function (Blueprint $table) {
            $table->dropColumn(['main_text1', 'sub_text1']);
        });
    }

};
