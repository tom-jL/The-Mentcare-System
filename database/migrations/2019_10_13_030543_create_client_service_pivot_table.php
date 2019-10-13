<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientServicePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_service', function (Blueprint $table) {
            $table->unsignedInteger('client_id');

            $table->foreign('client_id', 'client_id_fk_360822')->references('id')->on('clients')->onDelete('cascade');

            $table->unsignedInteger('service_id');

            $table->foreign('service_id', 'service_id_fk_360822')->references('id')->on('services')->onDelete('cascade');
        });
    }

}
