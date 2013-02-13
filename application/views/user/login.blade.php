@layout('master')
@section('content')
<h1>iManage</h1>
<h4>Project Management Just Got Easier!</h4>
{{Form::open('login','POST',array('class'=>'form-signin'))}}
@if (Session::has('login_errors'))
<span class="alert alert-error">Username or password incorrect.</span>
@endif
 {{Form::token()}}
<h2 class="form-signin-heading">Please Sign in</h2>
	<input type="email" class="input-block-level" placeholder="Email address" name="email" required="required">
	<input type="password" class="input-block-level" placeholder="Password" name="pass" required="required">
	<label class="checkbox">
		<input type="checkbox" value="remember-me">Remember me</label>
	<button class="btn btn-large btn-primary" type="submit">Sign in</button>
	or
	<a href="{{URL::to_route('new_user')}}">Signup</a>
{{Form::close()}}
@endsection