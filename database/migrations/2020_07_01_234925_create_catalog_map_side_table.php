<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogMapSideTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalog_map_side', function (Blueprint $table) {
            $table->unsignedBigInteger('map_id')->unsigned()->index();
            $table->foreign('map_id')->references('id')->on('maps')->onDelete('cascade');
            $table->unsignedBigInteger('side_id')->unsigned()->index();
            $table->foreign('side_id')->references('id')->on('sides')->onDelete('cascade');
            $table->integer('meters');
            $table->integer('move_order');
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
        Schema::dropIfExists('catalog_map_side');
    }
}
