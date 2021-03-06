<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscussionpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
      public function up()
    {
        Schema::create('discussionposts', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('topic_id');
        $table->string('discussion_post');
        $table->integer('discusser_id');
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
        Schema::drop('discussionposts');
    }
}
