<?php

class Create_Project_User_Table {    

	public function up()
    {
		Schema::create('project_user', function($table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('project_id');
			$table->timestamps();
	});

    }    

	public function down()
    {
		Schema::drop('project_user');
    }

}