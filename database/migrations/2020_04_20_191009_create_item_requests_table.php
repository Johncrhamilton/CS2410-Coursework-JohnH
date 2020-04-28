<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemRequestsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('item_requests', function (Blueprint $table)
    {
      $table->increments('id');
      $table->unsignedInteger('user_id');
      $table->string('user_name',40);
      $table->unsignedInteger('item_id');
      $table->text('item_description');
      $table->enum('item_category', ['pet', 'phone', 'jewellery']);
      $table->text('reason');
      $table->timestamps();
    });

    Schema::table('item_requests', function($table)
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
    Schema::dropIfExists('item_requests');
  }
}
