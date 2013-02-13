<?php

class Job extends Eloquent 
{
	public function project()
	{
		return $this->belongs_to('Project');
	}

	public function user()
	{
		return $this->belongs_to('User');
	}
}