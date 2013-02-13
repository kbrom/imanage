<?php

class Jobs_Controller extends Base_Controller {

	public $restful = true;    

	public function get_index($id)
    {
        retrun '$id';
    }    

	public function post_create()
    {
        return 'Posting Form';
    }    

	public function get_show()
    {

    }    

	public function get_edit()
    {

    }    

	public function get_new()
    {
        return View::make('job.new');
    }    

	public function put_update()
    {

    }    

	public function delete_destroy()
    {

    }

}