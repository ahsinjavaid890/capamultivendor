<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_proposals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_id')->default(0);
            $table->integer('vendor_id')->default(0);
            $table->integer('admin_id')->default(0);
            $table->string('product_cost')->nullable();
            $table->string('product_timeline')->nullable();
            $table->string('message',2000)->nullable();
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
        Schema::dropIfExists('request_proposals');
    }
}
