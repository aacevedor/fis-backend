<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumPhoneFormatTableProfileUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users_profiles', function (Blueprint $table) {
          $table->dropColumn('phone')->change();
      });
      Schema::table('users_profiles', function (Blueprint $table) {
          $table->double('phone')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users_profiles', function (Blueprint $table) {
        $table->dropColumn('phone');
        });
      Schema::table('users_profiles', function (Blueprint $table) {
          $table->float('phone')->nullable();
      });
    }
}
