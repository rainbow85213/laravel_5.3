<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bbs' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('bbs_bid');
            $table->string('bbs_title' , 255);
            $table->text('bbs_content')->nullable();

            $table->integer('bbs_score')->unsigned();
            $table->integer('bbs_sort')->unsigned();
            $table->integer('bbs_wirter_uid')->unsigned()->index();
            $table->enum('bbs_use' , ['Y' , 'N'])->default('Y');

            $table->timestamps();

            $table->foreign('bbs_wirter_uid')
                ->references('user_uid')->on('users');

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
        Schema::dropIfExists('bbs');
    }
}
