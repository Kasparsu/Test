<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkhoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('start')->nullable();
            $table->bigInteger('end')->nullable();
            $table->integer('day');
            $table->integer('maid_id')->unsigned();;
            $table->foreign('maid_id')->references('id')->on('maids')->onDelete('cascade');
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
        Schema::table('work_hours', function (Blueprint $table) {
            $table->dropForeign('work_hours_maid_id_foreign');
        });
        Schema::dropIfExists('work_hours');
    }
}
