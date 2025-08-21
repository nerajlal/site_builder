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
        Schema::table('selected_templates', function (Blueprint $table) {
            // Drop the foreign key and the unique constraint on user_id
            $table->dropForeign(['user_id']);
            $table->dropUnique(['user_id']);

            // Add a unique constraint to header_footer_id
            $table->unique('header_footer_id');

            // Drop the user_id column
            $table->dropColumn('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('selected_templates', function (Blueprint $table) {
            // Add the user_id column back
            $table->unsignedBigInteger('user_id')->after('id');

            // Drop the unique constraint from header_footer_id
            $table->dropUnique(['header_footer_id']);

            // Add the unique and foreign key constraints back to user_id
            $table->unique('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
