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
        Schema::table('kachis', function (Blueprint $table) {
            // カラム名の変更
            Schema::table('kachis', function (Blueprint $table) {
                $table->renameColumn('registrant_id', 'user_id');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kachis', function (Blueprint $table) {
            //
        });
    }
};
