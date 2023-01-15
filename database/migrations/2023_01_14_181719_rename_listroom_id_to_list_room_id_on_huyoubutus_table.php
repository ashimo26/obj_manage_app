<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('huyoubutus', function (Blueprint $table) {
            $table->renameColumn('listroom_id', 'list_room_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('huyoubutus', function (Blueprint $table) {
            $table->renameColumn('list_room_id', 'listroom_id');
        });
    }
};
