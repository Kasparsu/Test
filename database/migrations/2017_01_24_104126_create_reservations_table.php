<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('rate');
            $table->string('email');
            $table->string('address');
            $table->string('phone');
            $table->bigInteger('start')->nullable();
            $table->bigInteger('end')->nullable();
            $table->integer('maid_id')->unsigned();
            $table->foreign('maid_id')->references('id')->on('maids')->onDelete('cascade');
            $table->string('token');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign('reservations_maid_id_foreign');
        });
        Schema::dropIfExists('reservations');
    }
}
