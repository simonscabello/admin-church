<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class RelationshipStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relationship_statuses')->insert([
            'description' => 'Solteiro(a)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relationship_statuses')->insert([
            'description' => 'Casado(a)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relationship_statuses')->insert([
            'description' => 'Viúvo(a)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relationship_statuses')->insert([
            'description' => 'Divorciado(a)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('relationship_statuses')->insert([
            'description' => 'Separado(a)',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
