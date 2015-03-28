<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="assets/images/favicon.ico">
	<title>PHP Object Browser - Credits</title>

	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jstree/3.1.0/themes/default/style.min.css" />
	<link rel="stylesheet" href="assets/css/object-browser.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
  </head>

  <body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="./"><i class="fa fa-cube"></i> PHP Object Browser</a>
		</div>
		<div id="navbar" class="collapse navbar-collapse">
		  <ul class="nav navbar-nav">
		  </ul>
		</div><!--/.nav-collapse -->
	  </div>
	</nav>

	<main class="container">
	
	<h1>Credits</h1>
	<div>Designed by <a href="http://verysimple.com">Jason Hinkle</a></div>
	<div>Treeview by <a href="http://www.jstree.com/">jsTree</a></div>
	<div>CSS by <a href="http://getbootstrap.com">Bootstrap</a></div>
	<div>Font Icons by <a href="http://fortawesome.github.io/Font-Awesome/">Font Awesome</a></div>
	<div>Image Icons by <a href="http://www.flaticon.com/packs/font-awesome">flaticon.com</a></div>
	
	</main>

	<footer class="footer">
	  <div class="container">
		<div class="text-muted">Created out of spite by <a href="http://verysimple.com/">Jason Hinkle</a> - <a href="credits.php">Credits</a></div>
	  </div>
	</footer>
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jstree/3.1.0/jstree.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#tree-1').jstree();
			$('#ajax-loader').hide();
			$('#tree-1').show();
		});
	</script>
  </body>
</html>