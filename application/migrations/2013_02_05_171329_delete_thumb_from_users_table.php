<?php

class Delete_Thumb_From_Users_Table {    

	public function up()
    {
		Schema::table('users', function($table) {
			$table->drop_column('thumb');
	});

    }    

	public function down()
    {
		Schema::table('users', function($table) {
			$table->string('thumb');
	});

    }

}