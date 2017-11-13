<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsTableNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('push_notifications', function (Blueprint $table) {
        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->string('ionic_token', 220);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('services_confirms', function (Blueprint $table) {
        $table->dropColumn('user_id');
        $table->dropForeign('user_id');
        $table->dropColumn('ionic_token');
      });
    }
}
