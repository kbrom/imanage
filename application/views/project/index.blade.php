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
		<div class="span8">Projects</div>

	</div>
	<div class="row">
	@foreach ($projects as $project) 
		
	
		<div class="span2">

			<h3>{{Str::title($project->title)}}</h3>
			<h4>10 Tasks</h4>
			<h4>21 Members</h4>
			<div class="dropdown">
				<div class="btn-group">
					<a class="btn" href="#">View &raquo;</a>
					@if($project->sup_id==Auth::user()->id)

					<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
						Action
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
					@if($project->pm_id==Auth::user()->id)
						<li>
							<a data-target="#myModal" role="button" data-toggle="modal">Edit</a>
						</li>
						<li>
							<a data-target="#" href="#">Close</a>
						</li>
					@endif
						<li>
							<a data-target="#" href="#">Reassign</a>
						</li>
						
						<li>
							<a data-target="#" href="#"  tabindex="-1">Delete</a>
						</li>

					</ul>
					@endif
				</div>
			</div>
		</div>
@endforeach
		<div class="span2 new">

			<h3>Add New</h3>
			<p>
				<button href="{{URL::to_route('new_user')}}" class="btn btn-success btn-large" type="button"> <i class="icon-plus-sign"></i>
					add
				</button>
			</p>

		</div>

	</div>
	</div>
	@endsection