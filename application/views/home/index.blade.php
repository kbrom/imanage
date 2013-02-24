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
     
      <!-- Example row of columns -->
      <div class="row">
      @if(Auth::check())

        <div class="span4">
          <h2>Projects</h2>
          
          <h4>Number of Projects:{{User::find(Auth::user()->id)->projects()->count()}}</h4>
          <h4>Completed:{{User::find(Auth::user()->id)->projects()->where_status('Finished')->count()}}</h4>
          <p><a class="btn btn-primary btn-large" href="/projects">View all Projects &raquo;</a></p>
        </div>
        <div class="span4">
          <h2 class="img-rounded">Employees</h2>
          <h4>Number of Employees:{{User::where_sup_id(Auth::user()->id)->count()}}</h4>
          <h4>other info:</h4>
          <p><a class="btn btn-large btn-primary" href="/users">View all Employees &raquo;</a></p>
       </div>
        @endif
 </div>
      </div>
@endsection