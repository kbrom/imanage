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
			$msg=$user_fname.' has no tasks!';
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
	@endif
	<div class="row">
	
		@foreach ($jobs->results as $job)
		<?php $project=Job::find($job->id)->project;
		$pm_id=$project->pm_id;?>
		<div class="span2">
			<h3>{{Str::title($job->title)}}</h3>
			<h4>{{Str::title($job->status)}}</h4>
			<div class="dropdown">
				<div class="btn-group">
					<a class="btn" href="jobs/{{$job->id}}">View &raquo;</a>
					@if($job->user_id==Auth::user()->id)
					<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
						Action
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						@if($pm_id==Auth::user()->id)
						<li>
							<a tabindex="-1" href="#">Edit</a>

						</li>
						<li>
							<a data-target="#" href="#">Reassign</a>
						</li>

						<li>
							<a data-target="#" href="#"  tabindex="-1">Delete</a>
						</li>
						@endif
						<li>
							<a data-target="#" href="#">Close</a>
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