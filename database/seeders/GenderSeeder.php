<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeders.
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
