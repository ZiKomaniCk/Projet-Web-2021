<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('score');
            $table->integer('quantity');
            $table->boolean('visible');
            $table->string('activationCode'); // AZftuIG41084fEj0hkZSef450682
            $table->string('pathImage');
            $table->longText('description');
            $table->date('releaseDate');
            $table->string('company');
            $table->integer('pegi');
            $table->string('platform');
            $table->integer('genre_id')->nullable();
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
        Schema::dropIfExists('games');
    }
}
