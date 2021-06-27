<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert([
        [
            'description' => 'Masculino',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ],[
            'description' => 'Feminino',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]
    ]);
    }
}
