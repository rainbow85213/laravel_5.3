<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_file' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('user_file_idx');
            $table->integer('user_uid')->unsigned()->index();
            $table->string('file_type' , 127);
            $table->string('file_name' , 127);
            $table->integer('file_size');
            $table->string('file_rename' , 255);
            $table->string('file_url' , 500);
            $table->char('file_category_cd' , 8)->nullable()->index();;
            $table->timestamps();

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
        Schema::dropIfExists('user_file');
    }
}
