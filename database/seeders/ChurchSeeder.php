<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChurchSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('churches')->insert([
            'name' => 'Segunda Igreja Batista Em Barcelona',
            'description' => 'Uma igreja histórica cheia de gente boa',
            'address' => 'Rua Arco Verde, 158 - Barcelona',
            'cnpj' => '06778300000182',
            'phone' => '27 33284631',
            'type' => 'Igreja Mãe',
            'leader' => 'Pastor Abel',
            'members' => 100,
        ]);
    }
}
