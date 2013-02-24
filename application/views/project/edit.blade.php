@layout('master')
@section('content')
<hr>

<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">

	<!-- Example row of columns -->
	<div class="row">
		<div class="span8">
			<h4>Update Project</h4>
		</div>

	</div>
	<div class="row">
		<?php 
	$user=User::find($pm_id);
	$user_email=$user->email;

?>

			{{Form::open('projects/update', 'PUT', array('class' => 'form-horizontal'))}}
			{{Form::token()}}
		<input type="hidden" value="{{$id}}" name="id">
		<div class="control-group">
			<label class="control-label">Title</label>
			<div class="controls">
				<input type="text" class="input-large" id="title" name="title" required="required" value="{{$title}}"></div>
		</div>

		<div class="control-group">
			<label class="control-label">Short Description</label>
			<div class="controls">
				<textarea rows="3" class="input-large" id="shortdesc" name="shortdesc" required="required" >{{$shortdesc}}</textarea>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">Description</label>
			<div class="controls">
				<textarea rows="5" columns="8" id="desc" name="desc" required="required">{{$desc}}</textarea>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">Project Manager</label>
			<div class="controls">
				<input type="email" class="input-large" id="projectmanager" name="projectmanager" required="required" value="{{$user_email}}"></div>
		</div>

		<div class="control-group">
			<label class="control-label">Start Date</label>
			<div class="controls">
				<input type="text" class="input-large" id="datepicker" name="sdate"required="required" value="{{$startdate}}"></div>
		</div>

		<div class="control-group">
			<label class="control-label">End Date</label>
			<div class="controls">
				<input type="text" class="input-large" id="datepicker" name="edate" required="required" value="{{$enddate}}"></div>
		</div>
		<div class="control-group">
			<label class="control-label"></label>
			<div class="controls">
				<button type="submit" class="btn btn-success" >Update Project</button>
			</div>
		</div>
		{{Form::close()}}
	</div>
</div>
<script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
@endsection