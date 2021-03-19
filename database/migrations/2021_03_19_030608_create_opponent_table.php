<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpponentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opponent', function (Blueprint $table) {
            $table->string('name', 191);
            $table->integer('character_id')->unsigned();
            $table->integer('stat_id')->unsigned();
            $table->integer('stat_level')->unsigned()->default(1);
            //
            $table->integer('count')->unsigned();
            // for stats like health
            $table->integer('current_count')->unsigned()->nullable();

            $table->foreign('stat_id')->references('id')->on('stats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opponent');
        $table->dropColumn('name');
        $table->dropColumn('character_id');
        $table->dropColumn('stat_id');
        $table->dropColumn('stat_level');
        $table->dropColumn('count');
        $table->dropColumn('current_count');
    }
}
