<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Articles extends Migration
{
    // Run the migration
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->index();
            $table->string('url')->index();
            $table->string('posted_by')->index();
            $table->timestamps();
            $table->softDeletes();
        });
    }
    // Opposite of whet the up()
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
