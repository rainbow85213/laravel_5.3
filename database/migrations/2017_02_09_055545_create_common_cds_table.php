<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommonCdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('common_cds' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->char('comm_cd' , 8)->primary();

            $table->char('main_cd' , 5)->index();
            $table->integer('det_cd')->unsigned()->index();

            $table->string('name' , 127);
            $table->string('ref_1' , 500)->nullable();
            $table->string('ref_2' , 500)->nullable();
            $table->string('ref_3' , 500)->nullable();
            $table->string('ref_4' , 500)->nullable();
            $table->string('ref_5' , 500)->nullable();
            $table->string('ref_6' , 500)->nullable();
            $table->string('ref_7' , 500)->nullable();
            $table->string('ref_8' , 500)->nullable();
            $table->string('ref_9' , 500)->nullable();
            $table->string('ref_10' , 500)->nullable();

            $table->enum('use_yn' , [ 'Y' , 'N' ])->default('Y');

            $table->timestamps();

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
        Schema::dropIfExists('common_cds');
    }
}
