<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pseudo');
            $table->string('lastName');
            $table->string('firstName');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('state');
            $table->integer('codePostal');
            $table->string('adresse');
            $table->date('birthDate');
            $table->text('description');
            $table->string('avatar');
            $table->string('couverture');
            $table->string('job');
            $table->string('lienFacebook')->default('null');
            $table->string('lienInstagram')->default('null');
            $table->string('lienTwitter')->default('null');
            $table->string('lienGoogle')->default('null');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('users');
    }
}
