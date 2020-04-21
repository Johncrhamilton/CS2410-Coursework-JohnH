<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLostitemsTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('lost_items', function (Blueprint $table)
    {
      $table->increments('id');
      $table->enum('category', ['pet', 'phone', 'jewellery']);
      $table->datetime('found_time',0);
      $table->unsignedInteger('found_user')->nullable();
      $table->string('found_place',80);
      $table->string('colour',40);
      $table->binary('photo')->nullable();
      $table->text('description');
      $table->timestamps();
    });

    Schema::table('lost_items', function($table)
    {
      $table->foreign('found_user')->references('id')->on('users')->onDelete('SET NULL')->onUpdate('CASCADE');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('lostitems');
  }
}
