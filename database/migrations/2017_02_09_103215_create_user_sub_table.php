<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_sub' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('user_sub_idx');
            $table->integer('user_uid')->unsigned();
            $table->enum('user_sex' , [ 'M' , 'W' ])->nullable();
            $table->enum('user_age' , [ 10 , 20 , 30 , 40 , 50 , 60])->nullable();

            $table->foreign('user_uid')
                  ->references('user_uid')->on('users')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('user_sub');
    }
}
