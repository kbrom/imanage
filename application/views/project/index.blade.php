@layout('master')
@section('content')
<div class="row">
	<div class="span3">
		<h1>iManage</h1>
		<h4>Project Management Just Got Easier!</h4>
	</div>

	<div class="span5">
		<form class="form-search">
			<input type="text" data-behavior="placeholder" placeholder="Jump to a project or person" data-hotkey="f">
			<button type="submit" class="btn">Search</button>
		</form>
	</div>
</div>
<hr>

<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">

	<!-- Example row of columns -->
	<?php
		$user_id=URI::segment(2);
		if(isset($user_id))
		{
			$user=User::find($user_id);
			$user_fname=$user->fname;
			$msg=$user_fname.' has no projects!';
		}
		else
		{
			$msg=Auth::user()->fname.' has no projects';
		}
		
		?>
	@if (!count($projects->results))
	<div class='row'>
		<div class='span8'>{{$msg}}</div>

	</div>
	@endif
	<div class="row">
		@foreach ($projects->results as $project)
		<div class="span2">

			<h5>{{Str::title($project->title)}}</h5>
			<h4>{{Project::find($project->id)->jobs()->count();}} Tasks</h4>
			<h4>{{Project::find($project->id)->users()->count();}} Members</h4>
			<h4>{{Project::find($project->id)->status;}}</h4>
			<div class="dropdown">
				<div class="btn-group">
					<a class="btn" href="projects/{{$project->id}}">View &raquo;</a>
					@if($project->sup_id==Auth::user()->id)
					<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
						Action
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						@if($project->pm_id==Auth::user()->id)
													<li class="dropdown-submenu">
							<a tabindex="-1" href="#">Update</a>

							<ul class="dropdown-menu">
								<li>
									<a tabindex="-1" href="jobs/new/{{$project->id}}">Add Task</a>
								</li>
								<li>
									<a tabindex="-1" href="users/new/{{$project->id}}">Add Member</a>
								</li>
								<li>
									<a tabindex="-1" href="projects/{{$project->id}}/edit">Edit</a>
								</li>
							</ul>
						</li>
						<li>
							<a data-target="#" href="projects/{{$project->id}}/close">Close</a>
						</li>						
						@endif
						<li>
							<a data-target="#" href="projects/{{$project->id}}/reassign">Reassign</a>
						</li>

						<li>
							<a data-target="#" href="projects/{{$project->id}}/delete"  tabindex="-1">Delete</a>
						</li>

					</ul>
					@endif
				</div>
			</div>
		</div>
		@endforeach
		<?php
			$roles = User::find(Auth::user()->
		id)->roles()->get();?>
			@foreach($roles as $role)
			
				@if($role->id==1)
		<div class="span2">

			<h4>Add New Project</h4>
			<p>
				<a href="/projects/new"class="btn btn-success btn-large" type="button"> <i class="icon-plus-sign"></i>
					Add
				</a>
			</p>
		</div>
		@endif

			@endforeach
	</div>
	{{$projects->links();}}
</div>
@endsection