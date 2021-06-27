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
        $this->call(UserSeeder::class);
        $this->call(ChurchSeeder::class);
        $this->call(RelationshipStatusSeeder::class);
        $this->call(GenderSeeder::class);
    }
}
