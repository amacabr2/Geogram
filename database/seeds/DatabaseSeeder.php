<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $this->call(UsersTableSeeder::class);
        $this->call(VoyagesTableSeeder::class);
        $this->call(AbonnementsTableSeeder::class);
        $this->call(AbonnesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(CommentairesTableSeeder::class);
    }
}
