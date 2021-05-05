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
            'payed' => false,
            'reserved' => true
        ]);
        DB::table('expenses')->insert([
            'user_id' => 1,
            'name' => 'Auto līzings',
            'amount' => '256.96',
            'payed' => true,
            'reserved' => false
        ]);
    }
}
