<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInterAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_inter_area' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('user_inter_area_idx');
            $table->integer('user_uid')->unsigned()->index();;
            $table->integer('sort')->index();
            $table->char('area_cd' , 8)->index();
            $table->timestamps();

            $table->foreign('user_uid')
                ->references('user_uid')->on('users')
                ->onDelete('cascade');

            $table->foreign('area_cd')
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
        Schema::dropIfExists('user_inter_area');
    }
}
