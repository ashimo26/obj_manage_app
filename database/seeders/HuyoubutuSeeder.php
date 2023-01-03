<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HuyoubutuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('huyoubutus')->insert([
            ['item'=>'掃除機', 'fovorite'=>2, 'listroom_id'=>1, 'kachi_id'=>2, 'memo'=> '', 'delete'=>0],
            ['item'=>'歯ブラシ', 'fovorite'=>2, 'listroom_id'=>2, 'kachi_id'=>1, 'memo'=> '', 'delete'=>0],
            ['item'=>'TV', 'fovorite'=>5, 'listroom_id'=>2, 'kachi_id'=>2, 'memo'=> '', 'delete'=>0],
            ['item'=>'ローテーブル', 'fovorite'=>1, 'listroom_id'=>3, 'kachi_id'=>3, 'memo'=> '', 'delete'=>0],
            ['item'=>'掃除機', 'fovorite'=>1, 'listroom_id'=>4, 'kachi_id'=>3, 'memo'=> '', 'delete'=>0],
            ['item'=>'置物', 'fovorite'=>2, 'listroom_id'=>5, 'kachi_id'=>3, 'memo'=> '', 'delete'=>0],
            ['item'=>'クッション', 'fovorite'=>3, 'listroom_id'=>6, 'kachi_id'=>4, 'memo'=> '', 'delete'=>0],
            ['item'=>'フライパン', 'fovorite'=>4, 'listroom_id'=>6, 'kachi_id'=>5, 'memo'=> '', 'delete'=>0],
            ['item'=>'掃除機', 'fovorite'=>3, 'listroom_id'=>7, 'kachi_id'=>4, 'memo'=> '', 'delete'=>0]
        ]);
    }
}
