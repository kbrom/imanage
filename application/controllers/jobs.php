<?php

class Jobs_Controller extends Base_Controller {

	public $restful = true;    

	public function get_index()
    {
       if(Auth::check())
       {
             $user_id=Auth::user()->id;
            $jobs=User::find($user_id)->jobs()->paginate(3);
                return View::make('job.index')->with('jobs',$jobs);
       }
       else
       {
        return Redirect::to_route('login');
       }
      
    
    }    

    public function get_single()
    {
        $id=URI::segment(4);
        return Redirect::to_route('job' , $id);
    } 

	public function post_create()
    {
         $member_email=Input::get('ass');
         $member=User::where_email($member_email)->first();
        $member_id=$member->id;
        $input=array(
            'title'=>Input::get('title'),
            'shortdesc'=>Input::get('shortdesc'),
            'desc'=>Input::get('desc'),
            'project_id'=>Input::get('id'),
            'user_id'=>$member_id,
            'startdate'=>Input::get('sdate'),
            'enddate'=>Input::get('edate'),
            'status'=>'On Progress'
            );
        $job=Job::create($input);
        //After assigning a task make the user member of the project
        $project_id=Input::get('id');
        $project=Project::find($project_id);
        $project->users()->attach($member_id);

        if($job)
        {
            return Redirect::to_route('job' , $job->id);
        }
    }    

	public function get_show($id)
    {
        $job=Job::find($id);
        return View::make('job.show',$job->to_array());
    }    

	public function get_edit($id)
    {
        $job=Job::find($id);
        if(!$job) return Redirect::to_route('new_job');
        return View::make('job.edit' , $job->to_array());
    }    

    public function get_reassign($id)
    {
        $job=Job::find($id);   
        return View::make('job.reassign' , $job->to_array());
    }

    public function put_reassign()
    {
        $id=Input::get('id');
        $ass_email=Input::get('ass');
        $ass=User::where_email($ass_email)->first();
        $ass_id=$ass->id;

        $input=array(
             'user_id'=>$ass_id,
           );
        Job::update($id,$input);
        return Redirect::to_route('job', $id);
    }

    public function get_desc($id)
    {
        $job=Job::find($id);
       return View::make('job.desc' , $job->to_array());
        //return Response::json($project->to_array());
    }

     public function get_close($id)
    {
        $job=Job::find($id);   
        return View::make('job.close' , $job->to_array());
    }

    public function put_close()
    {
        $id=Input::get('id');
       $status=Input::get('status');

        $input=array(
             'status'=>$status
           );
        Job::update($id,$input);
        return Redirect::to_route('job', $id);
    }

	public function get_new()
    {
        $id = URI::segment(3);
          return View::make('job.new')->with('id',$id);
    }    

	public function put_update()
    {
        $id=Input::get('id');
        $ass_email=Input::get('ass');
        $ass=User::where_email($ass_email)->first();
        $ass_id=$ass->id;
         $input=array(
            'title'=>Input::get('title'),
            'shortdesc'=>Input::get('shortdesc'),
            'desc'=>Input::get('desc'),
            'user_id'=>$ass_id,
            'startdate'=>Input::get('sdate'),
            'enddate'=>Input::get('edate'),
            );
        Job::update($id,$input);
        return Redirect::to_route('job', $id);
    }    

	public function get_destroy($id)
    {   
       Job::find($id)->delete();
       return Redirect::to_route('jobs');
    }

}