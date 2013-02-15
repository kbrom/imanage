<?php

class Users_Controller extends Base_Controller {

    public $restful = true;    

    public function get_index()
    {
        $users=User::all();
         $total=count($users);
        $per_page=3;
        $users = Paginator::make($users, $total, $per_page);
        return View::make('user.index')->with('users',$users);

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
            return Redirect::to_route('home')
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
        $input=array(
            'fname'=>Input::get('fname'),
            'lname'=>Input::get('lname'),
            'email'=>Input::get('email'),
            'password'=>Hash::Make(Input::get('pass')),
            'phone'=>Input::get('phone'),
            'skills'=>Input::get('skills'),
            );
        $user=User::create($input);
        $user->roles()->attach($role_id);
        //            

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
        
        return View::make('user.new');
    }    

    public function put_update()
    {

    }    

    public function delete_destroy()
    {

    }

}