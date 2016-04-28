<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('discussions', function (Blueprint $table) {
      $table->increments('id');
      $table->string('topic');
      $table->string('creator_name');
      $table->timestamp('created_at');
      $table->timestamp('updated_at');
      
  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('discussions');
    }
}
