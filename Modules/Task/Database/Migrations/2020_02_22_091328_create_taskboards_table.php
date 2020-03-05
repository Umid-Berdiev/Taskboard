<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskboards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->string('name', 100);
            $table->string('slug', 100);//машинное имя колонки, обязательно проводить транслитерацию на случай, если оно будет указано на кириллице
            $table->char('label_color', 7);//машинное имя колонки, обязательно проводить транслитерацию на случай, если оно будет указано на кириллице
            $table->integer('weight');//min: -100, max: 100
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
        Schema::dropIfExists('taskboards');
    }
}
