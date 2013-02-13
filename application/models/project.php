<?php

class Project extends Eloquent 
{
			public static $timestamps = false;

		public function jobs()
		{
			return $this->has_many('Job');
		}

		public function users()
		{
			return $this->has_many_and_belongs_to('User');
		}
}