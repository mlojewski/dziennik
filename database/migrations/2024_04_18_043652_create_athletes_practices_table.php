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
        Schema::create('athletes_practices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('athlete_id');
            $table->unsignedBigInteger('practice_id');

            $table->foreign('athlete_id')->references('id')->on('athletes')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('practice_id')->references('id')->on('practices')->cascadeOnDelete()->cascadeOnUpdate();

            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('athletes_practices');
    }
};
