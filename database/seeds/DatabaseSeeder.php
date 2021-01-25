<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GameSeeder::class);
        // $this->call(GenreSeeder::class);
        $this->call(RolesTableSeededr::class);
        $this->call(UsersTableSeeder::class);
    }
}
