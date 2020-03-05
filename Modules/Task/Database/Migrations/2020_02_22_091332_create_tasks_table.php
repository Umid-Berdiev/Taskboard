<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('taskboard_id');
            $table->string('task_title', 100);
            $table->text('description')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('due_date');
            $table->enum('priority', ['high', 'medium', 'low']);
            $table->unsignedTinyInteger('status');//0 - incomplete, 1 - complete
            $table->unsignedBigInteger('created_by');
            $table->integer('weight');//min: -100, max: 100
            $table->timestamp('completed_at');
            $table->timestamps();

            // $table->foreign('company_id')
            //       ->references('id')
            //       ->on('companies')
            //       ->onDelete('cascade');

            // $table->foreign('project_id')
            //       ->references('id')
            //       ->on('projects')
            //       ->onDelete('cascade');

            // $table->foreign('taskboard_column_id')
            //       ->references('id')
            //       ->on('taskboard_columns');

            // $table->foreign('created_by')
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
        Schema::dropIfExists('tasks');
    }
}
