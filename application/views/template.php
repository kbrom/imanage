<!-- application/views/template.php -->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>My Ajax Page</title>
</head>
<body>
    <div id="content">
        <p>Hello and welcome to the site!</p>
    </div>
    <a href="#" id="load-content">Load Content</a>
    <!-- javascript files -->
    <script type="text/javascript">var BASE = "<?php echo URL::base(); ?>";</script>
    <?php echo HTML::script('js/vendors/jquery-latest.js'); ?>
    <?php echo HTML::script('js/script.js'); ?>
</body>
</html>