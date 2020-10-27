<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
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
            $table->foreign('planning_id')->references('id')->on('planning');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
