<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_docs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('seller_id');
            $table->string('name_of_license')->nullable();
            $table->string('license_no')->nullable()->unique();
            $table->string('license_exp_date')->nullable();
            $table->string('company_logo',2000)->nullable();
            $table->string('trade_license_img',2000)->nullable();
            $table->string('passport_img',2000)->nullable();
            $table->string('emirates_id_img',2000)->nullable();
            $table->string('license_img',2000)->nullable();
            $table->string('emirates_back_img',2000)->nullable();            
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
        Schema::dropIfExists('seller_docs');
    }
}
