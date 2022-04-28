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
        Schema::create('personnages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('charactername')->nullable();
            $table->string('photo')->nullable();
            $table->integer('age')->nullable();
            $table->string('power')->nullable();
            $table->date('dateofbirth')->nullable();
            $table->foreignId('films_id')->nullable();
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
        Schema::dropIfExists('personnages');
    }
};
