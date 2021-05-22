<?php

use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;

    class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => '1',
            'name' => 'Pastor',
            'description' => 'Líder espiritual da igreja.',
        ]);

        DB::table('roles')->insert([
            'id' => '2',
            'name' => 'Diácono',
            'description' => 'Líder espiritual da igreja.',
        ]);

        DB::table('roles')->insert([
            'id' => '3',
            'name' => 'Ministro de Música',
            'description' => 'Responsável pela música da igreja',
        ]);

        DB::table('roles')->insert([
            'id' => '4',
            'name' => 'Líder de Departamento',
            'description' => 'Responsável por um departamento.',
        ]);
    }
}
