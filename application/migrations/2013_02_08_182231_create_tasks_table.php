<?php

class Create_Tasks_Table {    

	public function up()
    {
		Schema::create('tasks', function($table) {
			$table->increments('id');
			$table->string('title');
			$table->string('shortDesc');
			$table->string('desc');
			$table->integer('pid');
			$table->integer('empid');
			$table->date('startdate');
			$table->date('enddate');
			$table->string('status');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('tasks');

    }

}