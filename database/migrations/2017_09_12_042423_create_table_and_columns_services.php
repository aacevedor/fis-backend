<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAndColumnsServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('services', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->integer('services_type_id')->unsigned();
         $table->foreign('services_type_id')->references('id')->on('services_types')->onDelete('cascade');
         $table->string('description');
         $table->integer('users_id')->unsigned();
         $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
         $table->float('price', 8, 2);
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
      Schema::drop('services');
    }
}
