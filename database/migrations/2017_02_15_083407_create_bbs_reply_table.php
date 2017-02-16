<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbsReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bbs_reply' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('bbs_reply_brid');
            $table->integer('bbs_bid')->unsigned()->index();

            $table->integer('bbs_reply_sort')->unsigned()->index();
            $table->integer('bbs_reply_writer_uid')->unsigned()->index();

            $table->text('bbs_reply_text');
            $table->enum('bbs_reply_use' , [ 'Y' , 'N' ])->default('Y');

            $table->timestamps();

            $table->foreign('bbs_bid')
                ->references('bbs_bid')->on('bbs')
                ->onDelete('cascade');

            $table->foreign('bbs_reply_writer_uid')
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
        Schema::dropIfExists('bbs_reply');
    }
}
