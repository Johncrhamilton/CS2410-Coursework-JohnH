<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('requests', function (Blueprint $table)
    {
      $table->increments('id');
      $table->string('user_name',40);
      $table->enum('item_category', ['pet', 'phone', 'jewellery']);
      $table->text('reason');
      $table->unsignedInteger('user_id');
      $table->unsignedInteger('item_id');
      $table->timestamps();
    });

    Schema::table('requests', function($table)
    {
      $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
      $table->foreign('item_id')->references('id')->on('lost_items')->onDelete('CASCADE')->onUpdate('CASCADE');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('requests');
  }
}
