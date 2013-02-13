<?php

class Role_User extends Eloquent 
{
	public static $timestamps=false;
    public function role()
    {
        return $this->has_one('Role');
    }
    public function user()
    {
        return $this->has_one('User');
    }
}
