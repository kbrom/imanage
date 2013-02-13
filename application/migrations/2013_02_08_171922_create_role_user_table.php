<?php

class Create_Role_User_Table {    

	public function up()
    {
		Schema::create('role_user', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('role_id');
	});

    }    

	public function down()
    {
		Schema::drop('user');

    }

}