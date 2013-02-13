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

       $projects=Project::where_sup_id($user_id)->get();
            return View::make('project.index')->with('projects',$projects);
    }    

	public function post_create()
    {
        $pm_email=Input::get('projectmanager');
        //$user = User::where_email($email)->first();
        $pm=User::where_email($pm_email)->first();
        $pm_id=$pm->id;
        $sup_id=Auth::user()->id;
        $input=array(
            'title'=>Input::get('title'),
            'shortdesc'=>Input::get('shortdesc'),
            'desc'=>Input::get('desc'),
            'pm_id'=>$pm_id,
            'sup_id'=>$sup_id,
            'startdate'=>Input::get('sdate'),
            'enddate'=>Input::get('edate'),
            'status'=>'On Progress'
            );
        $project=Project::create($input);
        if($project)
        {
            Redirect::to_route('projects');
        }
    }    

	public function get_show($id)
    {   
        $project=Project::find($id);
        return View::make('project.show' , $project->to_array());
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