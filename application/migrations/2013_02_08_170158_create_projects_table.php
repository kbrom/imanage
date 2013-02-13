<?php

class Create_Projects_Table {    

	public function up()
    {
		Schema::create('projects', function($table) {
			$table->increments('id');
			$table->string('title');
			$table->string('shortDesc');
			$table->string('desc');
			$table->integer('supervisor');
			$table->integer('pm');
			$table->date('startdate');
			$table->date('enddate');
			$table->string('status');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('projects');

    }

}