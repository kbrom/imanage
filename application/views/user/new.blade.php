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


			{{Form::open('register', 'POST', array('class' => 'form-horizontal'))}}
			{{Form::token()}}
			<div class="control-group">
				<label class="control-label">First Name</label>
				<div class="controls">
					<input type="text" class="input-large" id="fname" name="fname" required="required"></div>
			</div>

			<div class="control-group">
				<label class="control-label">Last Name</label>
				<div class="controls">
					<input type="text" class="input-large" id="lname" name="lname" required="required"></div>
			</div>

			<div class="control-group">
				<label class="control-label">Email</label>
				<div class="controls">
					<input type="email" class="input-large" id="email" name="email"required="required"></div>
			</div>

			<div class="control-group">
				<label class="control-label">Password</label>
				<div class="controls">
					<input type="password" class="input-large" id="pass" name="pass" required="required"></div>
			</div>
			<div class="control-group">
				<label class="control-label">Phone</label>
				<div class="controls">
					<input type="telephone" class="input-large" id="phone" name="phone" required="required"></div>
			</div>

			<div class="control-group">
				<label class="control-label">Skills</label>
				<div class="controls">
					<input type="text" class="input-large" id="skills" name="skills" required="required"></div>
			</div>

			<div class="control-group">
				<label class="control-label">Role</label>
				<div class="controls">
					<select class="input-large" id="role" name="role">
						<option value="1">Supervisor</option>
						<option value="2">Project Manager</option>
						<option value="3">Member</option>
					</select>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-success" >Create My Account</button>
				</div>
			</div>

		{{Form::close()}}
	</div>
</div>
@endsection