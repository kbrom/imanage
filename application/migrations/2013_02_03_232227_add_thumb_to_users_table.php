<?php

class Add_Thumb_To_Users_Table {    

	public function up()
    {
		Schema::table('users', function($table) {
			$table->string('thumb');
	});

    }    

	public function down()
    {
		Schema::table('users', function($table) {
			$table->drop_column('thumb');
	});

    }

}