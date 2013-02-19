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
	$user=User::find($pm_id)->
		first();
	$user_email=$user->email;

?>

			{{Form::open('projects/reassign', 'PUT', array('class' => 'form-horizontal'))}}
			{{Form::token()}}
		<input type="hidden" value="{{$id}}" name="id">
		
		<div class="control-group">
			<label class="control-label">Project Manager</label>
			<div class="controls">
				<input type="email" class="input-large" id="projectmanager" name="projectmanager" required="required" value="{{$user_email}}"></div>
		</div>

			<div class="control-group">
			<label class="control-label"></label>
			<div class="controls">
				<button type="submit" class="btn btn-success" >Reassign Project</button>
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