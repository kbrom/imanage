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
    @yield('content')
    <hr>

    <footer>
      <p>&copy; iManage 2013</p>
    </footer>
  </div>
  <!-- /container -->

</body>
</html>