<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_contract')->nullable(false);
            $table->integer('id_property')->nullable(false);
            $table->foreign('id_contract')
                  ->references('id')->on('contracts')
                  ->onDelete('restrict');
            $table->foreign('id_property')
                  ->references('id')->on('properties')
                  ->onDelete('restrict');
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
        Schema::dropIfExists('contract_properties');
    }
}
