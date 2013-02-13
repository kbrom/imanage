<?php

class Delete_Column_Role_From_Users_Table {    

	public function up()
    {
		Schema::table('users', function($table) {
			$table->drop_column('role');
	});

    }    

	public function down()
    {
		Schema::table('users', function($table) {
			$table->string('role');
	});

    }

}