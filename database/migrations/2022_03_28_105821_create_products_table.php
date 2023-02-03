<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_title')->nullable();
            $table->string('product_code')->nullable();
            $table->integer('category');
            $table->integer('subcategory');
            $table->float('prod_price');
            $table->float('sale_price');
            $table->float('cast_price');
            $table->string('prodict_unit')->nullable();
            $table->string('stock_alert');
            $table->string('short_desc');
            $table->text('long_desc');
            $table->string('varient')->nullable();
            $table->string('express_delivery')->nullable();
            $table->string('delivery_with_fess')->nullable();
            $table->string('delivery_location')->nullable();
            $table->string('delivery_area')->nullable();
            $table->string('featured_img',2000)->nullable();
            $table->string('video',2000)->nullable();
            $table->string('gallery',2000)->nullable();
            $table->string('warranty')->nullable();
            $table->integer('status')->default(1);
            $table->integer('prod_offer')->default(0);
            $table->integer('added_by_admin')->default(0);
            $table->integer('added_by_seller')->default(0);
            $table->integer('refund_return')->default(0);
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
        Schema::dropIfExists('products');
    }
}
