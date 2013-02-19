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
		$p_id=URI::segment(2);
		$project_id=URI::segment(2);
		$item=URI::segment(1);
		if(isset($user_id) && $item=='projects')
		{
			$project=Project::find($p_id);
			$msg='This project has no members!';
		}
elseif (isset($project_id) && $item=='projects') 
		{
			$msg='This Project has no members';
		}
		else
		{
			$msg=Auth::user()->fname.' has no users';
		}
		
		?>
	@if (!count($users->results))
	<div class='row'>
		<div class='span8'>{{$msg}}</div>

	</div>
	@else
			<div class='row'>
	<div class='span8'>Users</div>

</div>
	@endif
	<div class="row">
			@foreach ($users->results as $user)
		<div class="span2">

			<h5>{{Str::title($user->fname)}} {{Str:: title($user->lname)}}</h5>
			<h4>{{User::find($user->id)->jobs()->where_status('On Progress')->count();}} Tasks</h4>
			<h4>{{User::find($user->id)->projects()->count();}} Projects</h4>
			<div class="dropdown">
				<div class="btn-group">
					<a class="btn" href="users/{{$user->id}}">View &raquo;</a>
										@if($user->sup_id==Auth::user()->id)

					<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
						Action
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a tabindex="-1" href="users/{{$user->id}}/edit">Edit</a>
						</li>
					</li>
					
					<li>
						<a data-target="#" href="#"  tabindex="-1">Suspend</a>
					</li>

				</ul>
				@endif
			</div>
		</div>
	</div>
	@endforeach
	<?php
			$roles = User::find(Auth::user()->id)->roles()->get();?>
			@foreach($roles as $role)
			
				@if($role->id==2 || $role->id==1)
		<div class="span2">

			<h4>Add New User</h4>
			<p>
				<a href="/users/new"class="btn btn-success btn-large" type="button"> <i class="icon-plus-sign"></i>
					Add
				</a>
			</p>
		</div>
		@endif
					@endforeach

</div>
{{$users->links();}}

</div>
@endsection