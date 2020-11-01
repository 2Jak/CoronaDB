<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmedCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmed_cases', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('severity'); //0-recovered 1-4- light 5-6-medium 7-8-heavy 9-ventilated 10-dead
            $table->unsignedInteger('age');
            $table->boolean('male');
            $table->string('residance');
            $table->unsignedInteger('recovering_at'); //0-home 1-hotel 2-hospital
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
        Schema::dropIfExists('confirmed_cases');
    }
}
