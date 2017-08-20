<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacebookFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
              $table->string('avatar')->nullable();
              $table->string('profile_facebook')->nullable();
              $table->string('id_facebook')->nullable();
              $table->string('token_facebook')->nullable();
              $table->string('gender_facebook')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('avatar');
          $table->dropColumn('profile_facebook');
          $table->dropColumn('id_facebook');
          $table->dropColumn('token_facebook');
          $table->dropColumn('gender_facebook');
        });
    }
}
