<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('score');
            $table->unsignedInteger('criterion_id');
            $table->unsignedInteger('judge_id');
            $table->unsignedInteger('recipe_id');
            $table->timestamps();

            $table->foreign('criterion_id')->references('id')->on('criteria');
            $table->foreign('judge_id')->references('id')->on('judges');
            $table->foreign('recipe_id')->references('id')->on('recipes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
