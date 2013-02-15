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
	<div class="row">
		<div class="span8">Tasks</div>

	</div>
	<div class="row">
		@foreach ($jobs->results as $job)
		<?php $project=Job::find($job->id)->project;
		$pm_id=$project->pm_id;?>
		<div class="span2">
			<h3>{{Str::title($job->title)}}</h3>
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
{{$jobs->links();}}
	</div>
</div>
@endsection