<?php

use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'Simon Scabello',
            'email' => 'simon@gmail.com',
            'password' => Hash::make('123456789')
        ]);
    }
}
