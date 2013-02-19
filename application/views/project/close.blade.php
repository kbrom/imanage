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

			{{Form::open('projects/close', 'PUT', array('class' => 'form-horizontal'))}}
			{{Form::token()}}
		<input type="hidden" value="{{$id}}" name="id">
		
		<div class="control-group">
				<label class="control-label">Status</label>
				<div class="controls">
					<select class="input-large" id="status" name="status" value="{{$status}}">
						<option value="Finished">Finished</option>
						<option value="On Progress">On Progress</option>
					</select>
				</div>
			</div>

			<div class="control-group">
			<label class="control-label"></label>
			<div class="controls">
				<button type="submit" class="btn btn-success" >Change Status</button>
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