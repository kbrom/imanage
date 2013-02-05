<?php

class Delete_Status_From_Users_Table {    

	public function up()
    {
		Schema::table('users', function($table) {
			$table->drop_column('status');
	});

    }    

	public function down()
    {
		Schema::table('users', function($table) {
			$table->string('status');
	});

    }

}