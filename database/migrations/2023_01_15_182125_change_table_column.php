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
            $table->renameColumn('delete', 'delete_status');
            $table->renameColumn('fovorite', 'favorite');
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
            $table->renameColumn('delete_status', 'delete');
            $table->renameColumn('favorite', 'fovorite');
        });
    }
};
