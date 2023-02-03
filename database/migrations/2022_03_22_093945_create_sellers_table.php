<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('mobile')->nullable();
            $table->string('password');
            $table->string('emirates_id')->nullable();
            $table->string('account_title')->nullable();
            $table->string('bank')->nullable();
            $table->string('account_no')->nullable();
            $table->string('paypal_id')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('registered_as')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('payment_option')->nullable();
            $table->string('delivery_by')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('city');
            $table->string('product_type')->nullable();
            $table->integer('otp')->defualt(0);
            $table->integer('status')->default(0);
            $table->integer('isMembership')->default(1);
            $table->integer('isCompleted')->default(1);   
            $table->integer('isVerify')->default(1);             
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
        Schema::dropIfExists('sellers');
    }
}
