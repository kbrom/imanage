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
        <li>
          <a href="/projects/{{$id}}/members">People</a>
        </li>
        <li>
          <a href="">Task</a>
        </li>
        <li>
          <a href="">Files</a>
        </li>
        <li>
          <a href="">Discussions</a>
        </li>
      </ul>
    </div>

  </div>
  <hr>
  <!-- Example row of columns -->
  <?php 
  $pm=User::find($pm_id);
   $pm_email=$pm->
  email;
?>
  <div class="row">
   <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Well done!</strong> You successfully added this project.
            </div>
    <div class="span2">{{HTML::image($thumb, 'user thumb')}}</div>
    <div class="span6">
      <div class="span3"> <strong>Title:</strong> <em class="text-info">{{Str::title($title)}}</em>
      </div>
      <div class="span3">
        <strong>Manager:</strong> <em class="text-info">{{$pm_email}}</em>
      </div>
      <div class="span3">
        <strong>Start Date:</strong>
        <em class="text-info">{{Str::limit($startdate,10)}}</em>
      </div>
      <div class="span3">
        <strong>End Date:</strong>
        <em class="text-info">{{Str::limit($enddate,10)}}</em>
      </div>
      <div class="span3">
        <strong>Status:</strong>
        <em class="text-info">{{Str::title($status)}}</em>
      </div>
    </div>
    <div class="span9">{{$shortdesc}}</div>

  </div>
</div>
@endsection