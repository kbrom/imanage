<!DOCTYPE html>
<html>
<head>
  <title>Title</title>
  <!-- Bootstrap -->
  {{ HTML::style('css/vendors/bootstrap.css')}}
   {{ HTML::style('css/style.css')}}
   {{HTML::script('js/vendors/jquery-latest.js')}}
   {{HTML::script('js/vendors/bootstrap.js')}}
    <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
     <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
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