<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            'user_type_id' => 1,
            'user_account' => 'Administrator'
        ]);

        DB::table('user_types')->insert([
            'user_type_id' => 2,
            'user_account' => 'User'
        ]);
    }
}
