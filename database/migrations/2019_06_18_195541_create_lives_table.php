<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lives', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->string('slug');
            $table->string('author');
            $table->string('image');
            $table->string('image1')->nullable();
            $table->string('image1_txt')->nullable();
            $table->string('image2')->nullable();
            $table->string('image2_txt')->nullable();
            $table->string('image3')->nullable();
            $table->string('image3_txt')->nullable();
            $table->string('image4')->nullable();
            $table->string('image4_txt')->nullable();
            $table->string('image5')->nullable();
            $table->string('image5_txt')->nullable();
            $table->integer('sport_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->timestamps();
            $table->string('views')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lives');
    }
}
