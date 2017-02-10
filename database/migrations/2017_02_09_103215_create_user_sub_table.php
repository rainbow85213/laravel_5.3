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
            $table->integer('user_uid')->unsigned()->index();
            $table->char('user_sex_cd' , 8)->nullable();
            $table->char('user_age_cd' , 8)->nullable();
            $table->timestamps();

            $table->foreign('user_uid')
                  ->references('user_uid')->on('users')
                  ->onDelete('cascade');

            $table->foreign('user_sex_cd')
                ->references('comm_cd')->on('common_cds');

            $table->foreign('user_age_cd')
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
        Schema::dropIfExists('user_sub');
    }
}
