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
          <a href="/projects/{{$id}}/jobs">Task</a>
        </li>
        <li>
          <a href="">Files</a>
        </li>
        <li>
          <a href="">Discussions</a>
        </li>
        <li  class="active">
          <a href="#" id="desc">Description</a>
        </li>
      </ul>
    </div>

  </div>

  <hr>
  <div class='row'>
  <div class='span8'>Detailed Description</div>

</div>
<hr>
  <!-- Example row of columns -->
  
  <div class="row">
    <div class="span9">
      {{$desc}}
    </div>

  </div>
   <hr>
</div>
@endsection