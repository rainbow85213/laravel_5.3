<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDeviceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_device' , function( Blueprint $table ) {
            $table->engine = 'InnoDB';

            $table->increments('user_device_idx');
            $table->integer('user_uid')->unsigned()->index();

            $table->char('user_device_type' , 8)->index();;
            $table->string('user_device_key' , 500);
            $table->enum('user_device_use' , [ 'Y' , 'N' ]);

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
        Schema::dropIfExists('user_device');
    }
}
