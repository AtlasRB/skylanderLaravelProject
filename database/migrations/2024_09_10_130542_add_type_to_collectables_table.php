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
        Schema::table('collectables', function (Blueprint $table) {
            $table->string('type')->nullable();  // Add the 'type' column, nullable or not based on your requirements
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('collectables', function (Blueprint $table) {
            //
            $table->dropColumn('type');
        });
    }
};
