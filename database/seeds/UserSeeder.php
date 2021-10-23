<?php

use Illuminate\Database\Seeder;

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
            'name'           => 'Silvia Milhazes',
            'email'          => 'silvia.milhazes@edu.atec.pt',
            'atec_number'    => '1',
            'password'       => bcrypt('123456'),
            'institution_id' => '1',
            'role_id'        => '1',
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
    }
}
