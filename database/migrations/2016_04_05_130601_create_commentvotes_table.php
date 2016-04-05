<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentvotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('commentvotes', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('bookcommenter_id');
      $table->integer('book_id');
      $table->integer('commentvoter_id');
      $table->integer('likes');
      $table->integer('dislikes');
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
      Schema::drop('commentvotes');
    }
}
