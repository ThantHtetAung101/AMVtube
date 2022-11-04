<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amvs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('desc');
            $table->integer('view');
            $table->integer('like');
            $table->integer('dislike');
            $table->integer('category_id');
            $table->foreignId('user_id');
            $table->string('video');
            $table->string('thumb');
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
        Schema::dropIfExists('amvs');
    }
}
