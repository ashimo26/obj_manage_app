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
        Schema::create('huyoubutus', function (Blueprint $table) {
            $table->id();
            $table->string('item', 30);
            $table->tinyInteger('fovorite');
            $table->foreignid('listroom_id')->references('id')->on('list_rooms')->onDelete('cascade');
            $table->foreignid('kachi_id');
            $table->text('memo');
            $table->boolean('delete');
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
        Schema::dropIfExists('huyoubutus');
    }
};
