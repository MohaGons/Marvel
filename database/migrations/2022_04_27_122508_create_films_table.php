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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('releasedate');
            $table->string('director');
            $table->string('productioncompanies');
            $table->integer('duration');
            $table->string('countrypdroduction');
            $table->integer('budget');
            $table->foreignId('personnages_lastname');
            $table->foreignId('personnages_firstname');
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
        Schema::dropIfExists('films');
    }
};
