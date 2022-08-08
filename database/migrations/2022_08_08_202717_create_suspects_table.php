<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('suspects', function (Blueprint $table) {
      $table->id();
      $table->integer('user_id')->unsigned();
      $table->string('report_number')->unique();
      $table->string('name');
      $table->string('id_number', 16);
      $table->string('guardian');
      $table->text('address');
      $table->text('description');
      $table->string('photo')->nullable();
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
    Schema::dropIfExists('suspects');
  }
};
