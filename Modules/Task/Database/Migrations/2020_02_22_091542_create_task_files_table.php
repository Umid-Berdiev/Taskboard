<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('task_id');
            $table->unsignedBigInteger('uploaded_by');
            $table->string('filename');
            $table->text('description')->nullable();
            $table->integer('size');
            $table->string('path');
            $table->timestamps();

            // $table->foreign('task_id')
            //       ->references('id')
            //       ->on('tasks')
            //       ->onDelete('cascade');

            // $table->foreign('uploaded_by')
            //       ->references('id')
            //       ->on('employees')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_files');
    }
}
