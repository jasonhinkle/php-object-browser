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
	<a href="https://github.com/jasonhinkle/php-object-browser"><img style="z-index: 9999; position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/a6677b08c955af8400f44c6298f40e7d19cc5b2d/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_gray_6d6d6d.png"></a>
  
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
		  	<li><a href="./">Browser</a></li>
		  	<li><a href="instructions.php">Instructions</a></li>
		  	<li class="active"><a href="credits.php">Credits</a></li>
		  </ul>
		</div><!--/.nav-collapse -->
	  </div>
	</nav>

	<main class="container">
	
	<h1>Credits</h1>
	<p>Created by <a href="http://verysimple.com">Jason Hinkle</a></p>
	
	
	<h3>Props To</h3>
	<div><i class="fa fa-thumbs-o-up"></i> Treeview by <a href="http://www.jstree.com/">jsTree</a> (MIT License)</div>
	<div><i class="fa fa-thumbs-o-up"></i> CSS by <a href="http://getbootstrap.com">Bootstrap</a> (MIT License)</div>
	<div><i class="fa fa-thumbs-o-up"></i> Font Icons by <a href="http://fortawesome.github.io/Font-Awesome/">Font Awesome</a> (CC License)</div>
	<div><i class="fa fa-thumbs-o-up"></i> Image Icons by <a href="http://www.flaticon.com/packs/font-awesome">flaticon.com</a> (CC License)</div>
	<div><i class="fa fa-thumbs-o-up"></i> CDN Hosting by <a href="https://cdnjs.com/">cdnjs.com</a></div>
	
	<h3>License</h3>
	<?php 
	
	if (is_file('LICENSE') && is_readable('LICENSE')) {
		$license = file_get_contents('LICENSE');
		echo "<pre>$license</pre>";; 
	}
	
	?>
	
	</main>

	<footer class="footer">
	  <div class="container">
		<div class="text-muted">Created out of spite by <a href="http://verysimple.com/">Jason Hinkle</a></div>
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