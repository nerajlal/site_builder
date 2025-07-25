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
        Schema::table('header_footer', function (Blueprint $table) {
            $table->string('footer_text')->nullable();
        });
    }

    public function down()
    {
        Schema::table('header_footer', function (Blueprint $table) {
            $table->dropColumn('footer_text');
        });
    }

};
