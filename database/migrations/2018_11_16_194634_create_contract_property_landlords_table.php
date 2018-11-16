<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractPropertyLandlordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_property_landlords', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_contract_propery')->nullable(false);
            $table->integer('id_landlord')->nullable(false);

            $table->foreign('id_contract_propery')
                ->references('id')->on('contract_properties')
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
        Schema::dropIfExists('contract_property_landlords');
    }
}
