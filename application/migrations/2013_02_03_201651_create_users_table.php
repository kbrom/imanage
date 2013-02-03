<?php

class Create_Users_Table {    

	public function up()
    {
		Schema::create('users', function($table) {
			$table->increments('id');
			$table->string('fname');
			$table->string('lname');
			$table->string('email');
			$table->string('phone');
			$table->string('skills');
			$table->string('password');
			$table->string('role');
			$table->string('status');
	});

    }    

	public function down()
    {
		Schema::drop('users');

    }

}