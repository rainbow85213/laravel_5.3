<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbsHashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bbs_hash' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('bbs_hash_bhid');
            $table->integer('bbs_bid')->unsigned()->index();

            $table->string('bbs_hash_tag' , 255);
            $table->enum('bbs_hash_use' , [ 'Y' , 'N' ])->default('Y');

            $table->timestamps();

            $table->foreign('bbs_bid')
                ->references('bbs_bid')->on('bbs')
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
        Schema::dropIfExists('bbs_hash');
    }
}
