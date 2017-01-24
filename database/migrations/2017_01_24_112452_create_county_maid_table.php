<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountyMaidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('county_maid', function (Blueprint $table) {
            $table->integer('maid_id')->unsigned();
            $table->foreign('maid_id')->references('id')->on('maids')->onDelete('cascade');
            $table->integer('county_id')->unsigned();
            $table->foreign('county_id')->references('id')->on('maids')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('county_maid', function (Blueprint $table) {
            $table->dropForeign('county_maid_maid_id_foreign');
            $table->dropForeign('county_maid_county_id_foreign');
        });

        Schema::dropIfExists('county_maid');
    }
}
