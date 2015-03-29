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
		  	<li><a href="./">Browser</a></li>
		  	<li class="active"><a href="instructions.php">Instructions</a></li>
		  	<li><a href="credits.php">Credits</a></li>
		  </ul>
		</div><!--/.nav-collapse -->
	  </div>
	</nav>

	<main class="container">
	
	<h1>Instructions</h1>
	
	<h3>Usage</h3>
	<p>Copy any output from the PHP <code>serialize(...)</code> function.</p>
	<p>Paste the serialized code into the object browser text area and submit the form.</p>
	
	<h3>Class Definitions</h3>
	<p>In order to view the methods/functions of a class, the class definitions must be included prior to unserialization,
	otherwise PHP interprets it as a <code>__PHP_Incomplete_Class</code>. 
	If you would like to see functions/methods in the browser tree view, you must create a file named <code>includes.php</code> in this directory.
	Add all necessary <code>require_once(...)</code> statements to load your class definitions to this file.
	The object browser will look for this file and include it prior to unserialization. </p>
	
	<h3>Example serialized code:</h3>
	<p>Copy/paste the example code below if you want to simply demo the object browser:</p>
	<pre>O:8:"stdClass":2:{s:4:"name";s:16:"This is a string";s:4:"data";a:2:{s:4:"size";i:50;s:5:"color";s:5:"green";}}</pre>
	
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