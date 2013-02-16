<!DOCTYPE html>
<html>
<head>
  <title>Title</title>
  <!-- Bootstrap -->
  {{ HTML::style('css/vendors/bootstrap.css')}}
   {{ HTML::style('css/style.css')}}
   {{HTML::script('js/vendors/jquery-latest.js')}}
   {{HTML::script('js/vendors/bootstrap.js')}}
   
</head>
<body>
  <div class="container">
    <div class="toolbar"><a href="/users/{{Auth::user()->id}}">{{Auth::user()->fname}}</a></div>

    @yield('content')
    <hr>

    <footer>
      <p>&copy; iManage 2013</p>
    </footer>
  </div>
  <!-- /container -->

</body>
</html>