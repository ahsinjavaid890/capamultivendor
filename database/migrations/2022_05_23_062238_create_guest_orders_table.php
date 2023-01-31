<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guser_id')->default(0);
            $table->integer('seller_id')->default(0);
            $table->integer('product_id')->default(0);
            $table->integer('qty')->default(0);
            $table->integer('payment_mode')->default(0);
            $table->string('payment_id')->nullable(0);
            $table->float('amount')->default(0);
            $table->integer('status')->default(1); // 1=pending,2=confirm,3=shipped,4=cancel,5=deliverd
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
        Schema::dropIfExists('guest_orders');
    }
}
