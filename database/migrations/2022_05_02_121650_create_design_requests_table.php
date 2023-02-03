<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cat_id')->default(0);
            $table->integer('cust_id');
            $table->integer('subcat_id')->default(0);
            $table->string('product_name')->nullable();
            $table->string('product_desc',2000)->nullable();
            $table->string('product_img',2000)->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('depth')->nullable();
            $table->string('color')->nullable();
            $table->string('material')->nullable();
            $table->string('fabric')->nullable();
            $table->string('cost')->nullable();
            $table->string('weight')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('delivery_area',2000)->nullable();
            $table->integer('status')->default(1);
            $table->integer('byvendor')->default(0);
            $table->integer('byadmin')->default(0);
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
        Schema::dropIfExists('design_requests');
    }
}
