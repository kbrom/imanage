<?php

class Users_Controller extends Base_Controller {

	public $restful = true;    

	public function get_index()
    {
        return 'Hi there ';
    }    

	public function post_index()
    {

    }    

	public function get_show($id)
    {
        $user=User::find($id);
        return View::make('user.show' , $user->to_array());
    }    

	public function get_edit()
    {
        return 'Editing';
    }    

	public function get_new()
    {
        return 'Display New Form';
    }    

	public function put_update()
    {

    }    

	public function delete_destroy()
    {

    }

}