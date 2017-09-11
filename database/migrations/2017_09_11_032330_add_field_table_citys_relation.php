<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldTableCitysRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('citys', function (Blueprint $table) {
          $table->integer('city_id')->unsigned();
          $table->foreign('city_id')->references('id')->on('countrys')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('citys', function (Blueprint $table) {
        $table->dropForeign('city_id');
      });
    }
}
