<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEducationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('coefficient');

            $table->timestamps();
        });

        Schema::create('education_person', function (Blueprint $table) {
            $table->integer('person_id')->unsigned();
            $table->integer('education_id')->unsigned();

            $table->foreign('person_id')->references('id')->on('people');
            $table->foreign('education_id')->references('id')->on('education');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_person');
        Schema::dropIfExists('education');
    }
}
