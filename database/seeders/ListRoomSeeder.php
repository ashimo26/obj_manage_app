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
            ['registrant_id'=>1, 'list_name'=>'リビング'],
            ['registrant_id'=>1, 'list_name'=>'洗面所'],
            ['registrant_id'=>2, 'list_name'=>'リビング'],
            ['registrant_id'=>2, 'list_name'=>'ダイニング'],
            ['registrant_id'=>2, 'list_name'=>'玄関'],
            ['registrant_id'=>3, 'list_name'=>'リビング'],
            ['registrant_id'=>3, 'list_name'=>'キッチン']
        ]);
    }
}
