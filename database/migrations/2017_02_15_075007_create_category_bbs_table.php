<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryBbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('category_bbs' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('category_bbs_cbid');

            $table->integer('bbs_bid')->unsigned()->index();
            $table->char('category_cd' , 8)->index();

            $table->timestamps();

            $table->foreign('bbs_bid')
                ->references('bbs_bid')->on('bbs')
                ->onDelete('cascade');

            $table->foreign('category_cd')
                ->references('comm_cd')->on('common_cds')
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
        Schema::dropIfExists('category_bbs');
    }
}
