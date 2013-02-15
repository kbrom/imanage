<?php

class Jobs_Controller extends Base_Controller {

	public $restful = true;    

	public function get_index()
    {
       $user_id=Auth::user()->id;
       $jobs=User::find($user_id)->jobs()->get();
       $total=count($jobs);
       $per_page=3;
       $jobs=Paginator::make($jobs,$total,$per_page);
       return View::make('job.index')->with('jobs',$jobs);
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
        if($job)
        {
            return Redirect::to_route('jobs');
        }
    }    

	public function get_show($id)
    {
        $job=Job::find($id);
        return View::make('job.show',$job->to_array());
    }    

	public function get_edit()
    {

    }    

	public function get_new()
    {
        $id=$segment = URI::segment(3);
          return View::make('job.new')->with('id',$id);
    }    

	public function put_update()
    {

    }    

	public function delete_destroy()
    {

    }

}