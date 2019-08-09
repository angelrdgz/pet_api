<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoneServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('zone_services')) {
        Schema::create('zone_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('zone_id');
            $table->integer('service_id');
            $table->decimal('price', 5,2);
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zone_services');
    }
}
