<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KachiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kachis')->insert([
            ['user_id'=>1, 'kachi'=>'自由に生きる'],
            ['user_id'=>1, 'kachi'=>'何もない空間'],
            ['user_id'=>2, 'kachi'=>'植物と過ごしたい'],
            ['user_id'=>3, 'kachi'=>'お金を貯めたい'],
            ['user_id'=>3, 'kachi'=>'彼女とゆったりできる空間を作る']
        ]);
    }
}
