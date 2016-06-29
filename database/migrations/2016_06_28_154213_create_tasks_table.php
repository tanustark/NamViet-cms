<?php

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
            $table->increments('id');
            $table->integer('assignedTo')->unsigned();
            $table->string('taskName');
            $table->text('taskBody');
            $table->date('startDate');
            $table->date('endDate');
            $table->boolean('isDone');
            $table->timestamps();
        });

        Schema::table('tasks', function(Blueprint $table){
            $table->foreign('assignedTo')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table){
            $table->dropForeign(['assignedTo']);
        });
        Schema::drop('tasks');
    }
}
