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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('task_name');
            $table->date('date_task');
            $table->string('start');
            $table->string('end');
            $table->string('long');
            $table->text('description');
            $table->boolean('done');
            $table->integer('planning_id')->unsigned();
            $table->foreign('planning_id')->references('plan_id')->on('plannings');
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
