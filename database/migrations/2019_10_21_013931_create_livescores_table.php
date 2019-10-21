<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivescoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livescores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('teamOne');
            $table->integer('teamOneGoals')->nullable();
            $table->string('teamTwo');
            $table->integer('teamTwoGoals')->nullable();
            $table->string('pitch');
            $table->timestamp('time');
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
        Schema::dropIfExists('livescores');
    }
}
