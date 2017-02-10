<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInterCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_inter_category' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('user_inter_category_idx');
            $table->integer('user_uid')->unsigned()->index();;
            $table->integer('sort')->index();
            $table->char('category_cd' , 8)->index();
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
        Schema::dropIfExists('user_inter_category');
    }
}
