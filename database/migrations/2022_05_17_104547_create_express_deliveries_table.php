<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpressDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('express_deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->default(0);
            $table->string('express_delivery')->nullable();
            $table->string('time_days')->nullable();
            $table->string('delivery_area')->nullable();
            $table->string('delivery_cast')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('express_deliveries');
    }
}
