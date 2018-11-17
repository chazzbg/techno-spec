<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyLandlordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_landlords', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_property')->nullable(false);
            $table->integer('id_landlord')->nullable(false);

            $table->foreign('id_property')
                ->references('id')->on('properties')
                ->onDelete('restrict');
            $table->foreign('id_landlord')
                ->references('id')->on('landlords')
                ->onDelete('restrict');
            $table->double('share', 5,2);
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
        Schema::dropIfExists('property_landlords');
    }
}
