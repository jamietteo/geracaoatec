<?php

use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institutions')->insert([
            'zone' => 'Porto',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('institutions')->insert([
            'zone' => 'Palmela',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
