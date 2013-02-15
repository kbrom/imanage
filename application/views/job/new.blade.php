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
		<div class="span8">New Task</div>

	</div>
	<div class="row">


			{{Form::open('jobs', 'POST', array('class' => 'form-horizontal'))}}
			{{Form::token()}}
			<input type="hidden" name="id" value="{{$id}}">
			<div class="control-group">
				<label class="control-label">Title</label>
				<div class="controls">
					<input type="text" class="input-large" id="title" name="title" required="required"></div>
			</div>

			<div class="control-group">
				<label class="control-label">Short Description</label>
				<div class="controls">
					<textarea rows="3" class="input-large" id="shortDesc" name="shortDesc" required="required"></textarea>
					</div>
			</div>

			<div class="control-group">
				<label class="control-label">Description</label>
				<div class="controls">
					<textarea rows="5" columns="8" id="desc" name="desc" required="required"></textarea>
					</div>
			</div>
<div class="control-group">
				<label class="control-label">Assign to</label>
				<div class="controls">
					<input type="email" class="input-large" id="ass" name="ass"required="required"></div>
			</div>
			<div class="control-group">
				<label class="control-label">Start Date</label>
				<div class="controls">
					<input type="text" class="input-large" id="sdate" name="sdate"required="required"></div>
			</div>

			<div class="control-group">
				<label class="control-label">End Date</label>
				<div class="controls">
					<input type="text" class="input-large" id="edate" name="edate" required="required"></div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<button type="submit" class="btn btn-success" >Add Task</button>
				</div>
			</div>

		{{Form::close()}}
	</div>
</div>
@endsection