<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVoivodeshipAndPeselToCoachesTable extends Migration
{
    public function up()
    {
        Schema::table('coaches', function (Blueprint $table) {
            $table->unsignedBigInteger('voivodeship_id')->nullable();
            $table->string('pesel', 11)->nullable()->unique();
            
            $table->foreign('voivodeship_id')
                  ->references('id')
                  ->on('voivodeships')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('coaches', function (Blueprint $table) {
            $table->dropForeign(['voivodeship_id']);
            $table->dropColumn('voivodeship_id');
            $table->dropColumn('pesel');
        });
    }
}
