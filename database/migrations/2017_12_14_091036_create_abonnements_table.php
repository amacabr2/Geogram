<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbonnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnements', function (Blueprint $table) {
            $table->integer('user1_id')->unsigned();
            $table->integer('user2_id')->unsigned();
            $table->foreign('user1_id')->references('id')->on('users');
            $table->foreign('user2_id')->references('id')->on('users');
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
        Schema::table('abonnements', function(Blueprint $table) {
            $table->dropForeign('abonnements_user1_id_foreign');
        });

        Schema::table('abonnements', function(Blueprint $table) {
            $table->dropForeign('abonnements_user2_id_foreign');
        });

        Schema::dropIfExists('abonnements');
    }
}
