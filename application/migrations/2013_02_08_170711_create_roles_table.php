<?php

class Create_Roles_Table {    

	public function up()
    {
		Schema::create('roles', function($table) {
			$table->increments('id');
			$table->string('name');
			$table->string('desc');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('roles');

    }

}