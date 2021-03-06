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
  <div class="row">
    <div class="span5">
      <ul class="nav nav-pills">
      <?php
      $roles = User::find($id)->roles()->get();?>
      @foreach($roles as $role)
      
        @if($role->id==1)
        <li class="active">
          <a href="/users">People</a>
        </li>
        @endif
        @endforeach
        @if ($id==Auth::user()->id)

          <li>
            <a href="/projects">Projects</a>
         </li>
         <li>
            <a href="/jobs">Tasks</a>
         </li>
        @else
            <li>
          <a href="/users/{{$id}}/projects">Projects</a>
        </li>
          <li>
          <a href="/users/{{$id}}/jobs">Tasks</a>
        </li>
        @endif
        @if(Auth::check() && $id==Auth::user()->id)
        <li>
          {{HTML::link_to_route('logout','Logout')}}
        </li>
        @endif
      </ul>
    </div>

  </div>
  <hr>
  <!-- Example row of columns -->

  <div class="row">
    <div class="span2">

    {{HTML::image($thumb, 'user thumb')}}

      </div>
<input type="hidden" name="id" value="{{$id}}">
    <div class="span6">
      <div class="span3"> <strong>Name:</strong> <em class="text-info">{{$fname}} {{$lname}}</em>
      </div>
      <div class="span3"> <strong>Skill:</strong> <em class="text-info">{{$skills}}</em>
      </div>
      <div class="span3">
        <strong>Email:</strong>
        <em class="text-info">{{$email}}</em>
      </div>
      <div class="span3">
        <strong>Phone:</strong>
        <em class="text-info">{{$phone}}</em>
      </div>
      <div class="span3">
        <strong>Working On:</strong>
        <em class="text-info">{{User::find($id)->jobs()->count();}} tasks from {{User::find($id)->projects()->count();}} projects</em>
      </div>
    </div>
    <div class="span9">Short Bio</div>

  </div>
</div>
@endsection