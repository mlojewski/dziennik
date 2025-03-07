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
        Schema::table('stages', function (Blueprint $table) {
            Schema::table('stages', function (Blueprint $table) {
                $table->unsignedBigInteger('edition_id')->nullable();
                $table->foreign('edition_id')->references('id')->on('editions')->onDelete('set null');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stages', function (Blueprint $table) {
            Schema::table('stages', function (Blueprint $table) {
                $table->dropForeign(['edition_id']);
                $table->dropColumn('edition_id');
            });
        });
    }
};
