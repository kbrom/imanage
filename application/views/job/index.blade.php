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
		$project_id=URI::segment(2);
		$item=URI::segment(1);
		if(isset($user_id) && $item=='users')
		{
			$user=User::find($user_id);
			$user_fname=$user->fname;
			$msg=$user_fname.' has no tasks!';
		}
		elseif (isset($project_id) && $item=='projects') 
		{
			$msg='This Project has no tasks';
		}
		else
		{
			$msg=Auth::user()->fname.' has no tasks';
		}
		
		?>
	@if (!count($jobs->results))
	<div class='row'>
		<div class='span8'>{{$msg}}</div>

	</div>
	@else
			<div class='row'>
	<div class='span8'>Tasks</div>

</div>
	@endif
	<div class="row">
	
		@foreach ($jobs->results as $job)
		<?php $project=Job::find($job->id)->project;
		if ($project) {
			$pm_id=$project->pm_id;
			
		}
		else
			$pm_id='blah';
		?>
		<div class="span2">
			<h5>{{Str::title($job->title)}}</h5>
			<h4>{{Str::title($job->status)}}</h4>
			<div class="dropdown">
				<div class="btn-group">
					<a class="btn" href="/jobs/{{$job->id}}">View &raquo;</a>
					
						@if($job->user_id==Auth::user()->id && $job->status!='Finished' || $pm_id==Auth::user()->id)
						<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
						Action
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
							<li>
							<a data-target="#" href="/jobs/{{$job->id}}/close">Close</a>
						</li>
						@endif
											@if($pm_id==Auth::user()->id)

						<li>
							<a tabindex="-1" href="/jobs/{{$job->id}}/edit">Edit</a>

						</li>
						<li>
							<a data-target="#" href="/jobs/{{$job->id}}/reassign">Reassign</a>
						</li>

						<li>
							<a data-target="#" href="/jobs/{{$job->id}}/delete"  tabindex="-1">Delete</a>
						</li>
					</ul>
					@endif
				</div>
			</div>
		</div>
		@endforeach
		

	</div>
	{{$jobs->links();}}

</div>
@endsection