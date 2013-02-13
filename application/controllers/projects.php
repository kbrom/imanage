<?php

class Projects_Controller extends Base_Controller {

	public $restful = true;    

	public function get_index()
    {
        $user_id=Auth::user()->id;
        //$project_id=1;
        //$user=User::find($user_id);
        //$user->projects()->attach($project_id);
               //dd($projects);

       $projects=User::find($user_id)->projects()->get();
       return View::make('project.index')->with('projects',$projects);
    }    

	public function post_index()
    {

    }    

	public function get_show()
    {

    }    

	public function get_edit()
    {

    }    

	public function get_new()
    {
        return View::make('project.new');
    }    

	public function put_update()
    {

    }    

	public function delete_destroy()
    {

    }

}