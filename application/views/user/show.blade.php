   
    <!DOCTYPE html>
    <html>
    <head>
    <title>{{$fname}} {{$lname}}</title>
    <!-- Bootstrap -->

    {{ HTML::style('css/vendors/bootstrap.css')}}
   {{ HTML::style('css/style.css')}}

    </head>
    <body>
    <div class="container">
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
            <li class="active"><a href="#">People</a></li>
            <li><a href="projects.html">Tasks</a></li>
            <li><a href="#">Files</a></li>
            <li><a href="#">Discussions</a></li>
        </ul>
        </div>

      </div>
      <hr>
      <!-- Example row of columns -->
     
      <div class="row">
        <div class="span2">

          <img src="img/malaptop.jpg" alt="Employee Thumb">
        </div>
      
      <div class="span6">
          <div class="span3"><strong>Name: </strong><em class="text-info">Tekeste G.anenia</em></div>
          <div class="span3"><strong>Skill: </strong><em class="text-info">html,css,jquery...</em></div>
          <div class="span3"><strong>Contact: </strong><em class="text-info">email,call</em></div>
          <div class="span3"><strong>Working On: </strong><em class="text-info">9 tasks from 4 projects</em></div>
      </div>
<div class="span9"> Short Bio</div>
        
 </div>
       </div>

      <hr>

      <footer>
        <p>&copy; iManage 2013</p>
      </footer>

    </div> <!-- /container -->


    <script src="js/vendors/jquery-latest.js"></script>
    <script src="js/vendors/bootstrap.js"></script>

    </body>
    </html>