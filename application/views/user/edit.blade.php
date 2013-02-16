@layout('master')
@section('content')
<div class="row">
	<div class="span3">
		<h1>iManage</h1>
		<h4>Project Management Just Got Easier!</h4>
	</div>

	<div class="span5"></div>
</div>
<hr>

<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">

	<!-- Example row of columns -->
	<div class="row">
		<div class="span8">Registration</div>

	</div>
	<div class="row">


			{{Form::open('users/update', 'PUT', array('class' => 'form-horizontal'))}}
			{{Form::token()}}
					<input type="hidden" value="{{$id}}" name="id">

			<div class="control-group">
				<label class="control-label">First Name</label>
				<div class="controls">
					<input type="text" class="input-large" id="fname" name="fname" required="required" value="{{$fname}}"></div>
			</div>

			<div class="control-group">
				<label class="control-label">Last Name</label>
				<div class="controls">
					<input type="text" class="input-large" id="lname" name="lname" required="required" value="{{$lname}}"></div>
			</div>

			
			<div class="control-group">
				<label class="control-label">Phone</label>
				<div class="controls">
					<input type="telephone" class="input-large" id="phone" name="phone" required="required" value="{{$phone}}"></div>
			</div>

			<div class="control-group">
				<label class="control-label">Skills</label>
				<div class="controls">
					<input type="text" class="input-large" id="skills" name="skills" required="required" value="{{$skills}}"></div>
			</div>

						
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-success" >Update</button>
				</div>
			</div>

		{{Form::close()}}
	</div>
</div>
@endsection