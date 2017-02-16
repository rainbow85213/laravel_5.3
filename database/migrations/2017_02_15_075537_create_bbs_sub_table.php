<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBbsSubTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bbs_sub' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('bbs_sub_bsid');
            $table->integer('bbs_bid')->unsigned()->index();

            $table->string('bbs_name' , 127)->nullable();
            $table->decimal('bbs_gps_lat' , 12 , 9)->nullable();
            $table->decimal('bbs_gps_lng' , 12 , 9)->nullable();
            $table->string('bbs_addr' , 255)->nullable();
            $table->char('bbs_phone' , 14)->nullable();
            $table->string('bbs_product_name' , 127)->nullable();

            $table->enum('bbs_sub_use' , [ 'Y' , 'N' ])->default('Y');

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
        Schema::dropIfExists('bbs_sub');
    }
}
