<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbsFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bbs_file' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('bbs_file_bfid');
            $table->integer('bbs_bid')->unsigned()->index();

            $table->string('bbs_file_type' , 127);
            $table->string('bbs_file_name' , 127);
            $table->integer('bbs_file_size');
            $table->string('bbs_file_rename' , 255);
            $table->string('bbs_file_url' , 500);
            $table->char('bbs_file_category_cd' , 8)->nullable()->index();
            $table->timestamps();

            $table->foreign('bbs_bid')
                ->references('bbs_bid')->on('bbs')
                ->onDelete('cascade');

            $table->foreign('bbs_file_category_cd')
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
        Schema::dropIfExists('bbs_file');
    }
}
