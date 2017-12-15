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
            $table->string('sexe');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('state');
            $table->integer('codePostal');
            $table->string('adresse');
            $table->date('birthDate');
            $table->text('description')->nullable();
            $table->string('avatar')->nullable();
            $table->string('couverture')->nullable();
            $table->string('job')->nullable();
            $table->string('lienFacebook')->nullable();
            $table->string('lienInstagram')->nullable();
            $table->string('lienTwitter')->nullable();
            $table->string('lienGoogle')->nullable();
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
