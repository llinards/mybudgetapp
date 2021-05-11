<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('expenses')->insert([
            'user_id' => 1,
            'name' => 'Degvielas izmaksas',
            'amount' => '300.00',
            'status' => 1

        ]);
        DB::table('expenses')->insert([
            'user_id' => 1,
            'name' => 'Auto līzings',
            'amount' => '256.96',
            'status' => 0
        ]);
        DB::table('expenses')->insert([
            'user_id' => 1,
            'name' => 'KASKO',
            'amount' => '36.42',
            'status' => 2
        ]);
    }
}
