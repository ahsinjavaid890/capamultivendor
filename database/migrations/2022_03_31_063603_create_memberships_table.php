<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->float('amount')->default(0);
            $table->integer('noproducts')->default(0);
            $table->text('description')->nullable(); 
            $table->integer('online_directory')->default(0); 
            $table->integer('marketplace')->default(0);          
            $table->integer('status')->default(1);
            $table->integer('isAdons')->default(1);
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
        Schema::dropIfExists('memberships');
    }
}
