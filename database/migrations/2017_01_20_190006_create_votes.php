<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotes extends Migration
{
    public function up()
    {
      Schema::create('votes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('up_down');
          $table->string('voted_by');
          $table->integer('article_id')->unsigned();
          $table->softDeletes();
      });
    }

    public function down()
    {
      Schema::dropIfExists('votes');
    }
}
