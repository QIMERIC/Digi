<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClaymoreStats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('gear_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gear_id')->unsigned();
            $table->integer('stat_id')->unsigned();

            $table->integer('count');
            
            $table->foreign('gear_id')->references('id')->on('gears');
            $table->foreign('stat_id')->references('id')->on('stats');
        });

        Schema::create('weapon_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weapon_id')->unsigned();
            $table->integer('stat_id')->unsigned();

            $table->integer('count');
            
            $table->foreign('weapon_id')->references('id')->on('weapons');
            $table->foreign('stat_id')->references('id')->on('stats');
        });

        Schema::table('user_pets', function (Blueprint $table) { 
            $table->timestamp('attached_at')->nullable()->default(null);
        });

        Schema::table('gears', function (Blueprint $table) {
            $table->integer('currency_id')->unsigned()->nullable()->default(null);
            $table->integer('cost')->unsigned()->nullable()->default(null);
        });

        Schema::table('weapons', function (Blueprint $table) {
            $table->integer('currency_id')->unsigned()->nullable()->default(null);
            $table->integer('cost')->unsigned()->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropifExists('gear_stats');
        Schema::dropifExists('weapon_stats');
        Schema::table('pets', function (Blueprint $table) { 
            $table->dropColumn('attached_at');
        });
        Schema::table('gears', function (Blueprint $table) {
            $table->dropColumn('currency_id');
            $table->dropColumn('cost');
        });
        
        Schema::table('weapons', function (Blueprint $table) {
            $table->dropColumn('currency_id');
            $table->dropColumn('cost');
        });
    }
}
