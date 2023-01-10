<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('list_rooms')->insert([
            ['user_id'=>1, 'list_name'=>'未分類'],
            ['user_id'=>1, 'list_name'=>'洗面所'],
            ['user_id'=>1, 'list_name'=>'トイレ'],
            ['user_id'=>2, 'list_name'=>'未分類'],
            ['user_id'=>2, 'list_name'=>'ダイニング'],
            ['user_id'=>2, 'list_name'=>'玄関'],
            ['user_id'=>3, 'list_name'=>'未分類'],
            ['user_id'=>3, 'list_name'=>'キッチン']
        ]);
    }
}
