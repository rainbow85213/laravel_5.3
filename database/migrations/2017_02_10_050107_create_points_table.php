<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('points' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('point_idx');
            $table->integer('user_uid')->unsigned()->index();
            $table->integer('bbs_bid')->unsigned()->index();

            $table->char('point_type' , 8)->index();
            $table->integer('point_price')->unsigned();
            $table->integer('point_prev')->unsigned();
            $table->integer('point_next')->unsigned();
            $table->string('point_text' , 500);

            $table->timestamps();

            $table->foreign('user_uid')
                ->references('user_uid')->on('users')
                ->onDelete('cascade');

            $table->foreign('point_type')
                ->references('comm_cd')->on('common_cds');

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
        Schema::dropIfExists('points');
    }
}
