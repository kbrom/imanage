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
		<div class="span8">Users</div>

	</div>
	<div class="row">
		@foreach ($users->results as $user)
		<div class="span2">

			<h3>{{Str::title($user->fname)}} {{Str:: title($user->lname)}}</h3>
			<h4>{{User::find($user->id)->jobs()->count();}} Tasks</h4>
			<h4>{{User::find($user->id)->projects()->count();}} Projects</h4>
			<div class="dropdown">
				<div class="btn-group">
					<a class="btn" href="users/{{$user->id}}">View &raquo;</a>

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
			</div>
		</div>
	</div>
	@endforeach
</div>
{{$users->links();}}

</div>
@endsection