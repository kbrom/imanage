<?php

class Users_Controller extends Base_Controller {

    public $restful = true;    

    public function get_index()
    {
        $sup_id=Auth::user()->id;
        $users=User::where_sup_id($sup_id)->paginate(3);
        $total=count($users);
        return View::make('user.index')->with('users',$users);
    }    

    public function get_projects($id)
    {
        $projects=User::find($id)->projects()->paginate(3);
        return View::make('project.index')
            ->with('projects',$projects);
    }

    public function get_login()
    {
        return View::make('user.login');
    }  

    public function get_logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return Redirect::to_route('login');
        }
        else
        {
            return Redirect::to_route('home');
        }
    }

    public function post_login()
    {
        $user=array(
            'username'=>Input::get('email'),
            'password'=>Input::get('pass')
            );
        if(Auth::attempt($user))
        {
            $id=Auth::user()->id;
            return Redirect::to_route('user',$id)
                                ->with('title','projects');
;
        }
        else
        {
             return Redirect::to_route('login')
                    ->with('login_errors', true);
        }
    }

    public function post_create()
    {
        // Add Validation Here
        $role_id=Input::get('role');
        if (Auth::check()) {

            $sup_id=Auth::user()->id;
            $input=array(
            'fname'=>Input::get('fname'),
            'lname'=>Input::get('lname'),
            'email'=>Input::get('email'),
            'sup_id'=>$sup_id,
            'password'=>Hash::Make(Input::get('pass')),
            'phone'=>Input::get('phone'),
            'skills'=>Input::get('skills')
            );
        }
        $user=User::create($input);
        $user->roles()->attach($role_id);
        //After Adding the User Attach him to a project
        if (Input::get('id')) {
            $p_id=Input::get('id');
            $user->projects()->attach($p_id);
            return Redirect::to_route('project',$p_id);
        }
        return Redirect::to_route('user',$user->id);
        //            

    }    

    public function get_show($id)
    {
        $user=User::find($id);
        return View::make('user.show' , $user->to_array());
    }    

    public function get_edit($id)
    {
        $user=User::find($id);
        if(!$user) return Redirect::to_route('new_user');
        return View::make('user.edit' , $user->to_array());
    }    

    public function get_new()
    {
        $id=$segment = URI::segment(3);
        return View::make('user.new')->with('id',$id);
    }    

    public function put_update()
    {
        $id=Input::get('id');
        $input=array(
            'fname'=>Input::get('fname'),
            'lname'=>Input::get('lname'),
            'phone'=>Input::get('phone'),
            'skills'=>Input::get('skills')
            );
        User::update($id,$input);
        return Redirect::to_route('user', $id);
    }    

   public function get_destroy($id)
    {   
       User::find($id)->delete();
       return Redirect::to_route('users');
    }


}