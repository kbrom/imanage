<?php

class Users_Controller extends Base_Controller {

    public $restful = true;    

    public function get_index()
    {
        return 'Hi there ';
    }    

    public function get_login()
    {
        return View::make('user.login');
    }  

    public function post_login()
    {
        $user=array(
            'username'=>Input::get('email'),
            'password'=>Input::get('pass')
            );
        if(Auth::attempt($user))
        {
            return Redirect::to_route('home');
        }
        else
        {
            return 'login not succesful';
        }
    }

    public function post_create()
    {
        // Add Validation Here
        User::create(array(
            'fname'=>Input::get('fname'),
            'lname'=>Input::get('lname'),
            'email'=>Input::get('email'),
            'password'=>Hash::Make(Input::get('pass')),
            'phone'=>Input::get('phone'),
            'skills'=>Input::get('skills'),
            'role'=>Input::get('role')
            ));
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