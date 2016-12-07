<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psongs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('playlist_id');
            $table->integer('song_id');
            $table->foreign('playlist_id')->references('id')->on('playlists');
            $table->foreign('song_id')->references('id')->on('songs');
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
        Schema::dropIfExists('psongs');
    }
}
