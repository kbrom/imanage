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
       $total=count($projects);
       $per_page=3;
             $projects = Paginator::make($projects, $total, $per_page);
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
        $project->users()->attach($sup_id);
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

	public function get_edit($id)
    {
        $project=Project::find($id);
        if(!$project) return Redirect::to_route('new_project');
        return View::make('project.edit' , $project->to_array());
    }    

	public function get_new()
    {
        return View::make('project.new');
    }    

	public function put_update()
    {
        $id=Input::get('id');
        $pm_email=Input::get('projectmanager');
        $pm=User::where_email($pm_email)->first();
        $pm_id=$pm->id;
         $input=array(
            'title'=>Input::get('title'),
            'shortdesc'=>Input::get('shortdesc'),
            'desc'=>Input::get('desc'),
            'pm_id'=>$pm_id,
            'startdate'=>Input::get('sdate'),
            'enddate'=>Input::get('edate'),
            );
        Project::update($id,$input);
        return Redirect::to_route('project', $id);
    }    

	public function get_destroy($id)
    {   
       Project::find($id)->delete();
       return Redirect::to_route('projects');
    }

}