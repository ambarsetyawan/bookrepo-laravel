<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('requests', function (Blueprint $table) {
      $table->increments('id');
      $table->string('username');
      $table->string('email');
      $table->string('booktitle');
      $table->string('bookauthur');
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
          Schema::drop('requests');
    }
}
