<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddonPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addon_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id');
            $table->string('benefits')->nullable();
            $table->integer('qty')->default(0);
            $table->integer('price')->default(0);  
            $table->integer('status')->default(1);           
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
        Schema::dropIfExists('addon_plans');
    }
}
