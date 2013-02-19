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
            <li><a href="#">Description</a></li>
            <li><a href="#">Files</a></li>
            <li><a href="#">Discussions</a></li>
        </ul>
        </div>

      </div>
        <hr>
  <!-- Example row of columns -->
  <?php 
  $ass=User::find($user_id);
   $ass_email=$ass->email;
?>

      <div class="row">
        <div class="span2">

    {{HTML::image($thumb, 'task thumb')}}
        </div>
      <div class="span6">
          <div class="span3"><strong>Title: </strong><em class="text-info">{{Str::title($title)}}</em></div>
          <div class="span3"><strong>Assigned to: </strong><em class="text-info"><a href="/users/{{$user_id}}">{{$ass_email}}</a></em></div>
          <div class="span3"><strong>Start Date: </strong><em class="text-info">{{Str::limit($startdate,10)}}</em></div>
          <div class="span3"><strong>End Date: </strong><em class="text-info">{{Str::limit($enddate,10)}}</em></div>
          <div class="span3"><strong>Status: </strong><em class="text-info">{{Str::title($status)}}</em></div>
      </div>
<div class="span9">{{$shortdesc}}</div>
        
 </div>
</div>
@endsection