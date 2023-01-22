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
        Schema::create('wantbuys', function (Blueprint $table) {
            $table->id();
            $table->string('item', 30);
            $table->tinyInteger('favorite');
            $table->foreignid('list_buy_id')->references('id')->on('list_buys')->onDelete('cascade');
            $table->foreignid('kachi_id');
            $table->text('url')->nullable();
            $table->text('memo')->nullable();
            $table->boolean('delete_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wantbuys');
    }
};
