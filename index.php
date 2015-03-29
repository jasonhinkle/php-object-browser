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
	<title>PHP Object Browser</title>

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
		  	<li class="active"><a href="./">Browser</a></li>
		  	<li><a href="instructions.php">Instructions</a></li>
		  	<li><a href="credits.php">Credits</a></li>
		  </ul>
		</div><!--/.nav-collapse -->
	  </div>
	</nav>

	<main class="container">
<?php

if (is_file('includes.php') && is_readable('includes.php')) {
	require_once 'includes.php';
	echo '<div class="alert alert-info"><i class="fa fa-info-circle"></i> Class definitions from includes.php loaded.</div>';
}

define('RECURSION_SANITY_LIMIT',25);
define('BASE_URL', str_replace('index.php', '', full_url($_SERVER)));
error_reporting(E_ALL & ~E_NOTICE);
$PARSED_OBJS = array();

$data = isset($_POST['data']) ? $_POST['data'] : '';


if ($data) {
	$obj = unserialize($data);
	
	if ($obj) {
		echo '<div id="ajax-loader"><i class="fa fa-cog fa-spin fa-5x"></i></div>';
		echo "<div id='tree-1' style='display: none;'>\n<ul>\n";
		recurse_var("", $obj);
		echo "<ul>\n</div>\n";
	}
	else {
		echo '<div class="alert alert-danger"><strong>Error:</strong> The string could not be unserialized.</div>';
	}
}
else {
	echo '<div id="form-container">
		<form action="index.php" method="post">
		<h3>PHP Object To Inspect:</h3>
		<p id="data-container"><textarea class="form-control" name="data" id="data" placeholder="Copy/paste serialized PHP code here"></textarea></p>
		<p id="submit-container"><input class="btn btn-primary" type="submit" value="Let\'s Do This..."></p>
		</form>
		</div>
	';
}

/**
 * 
 * @param string $varname a name for the value being recursed
 * @param mixed $value the value to recurse
 * @param string $path string representation of the object path
 * @param int $level number of levels deep into the recursion
 */
function recurse_var($varname, &$value, $path = '/', $level = 0)
{
	global $PARSED_OBJS;
	
	$classname = @get_class($value);
	$is_incomplete_class = $classname == '__PHP_Incomplete_Class';
	$is_object = is_object($value) || $is_incomplete_class;
	$is_array = is_array($value);
	$icon = 'value.png';
	
	$cache_key = md5(print_r($value,true));
	
	if (($is_object || $is_array) && $level > RECURSION_SANITY_LIMIT) {
		$icon = $is_object ? 'object.png' : 'array.png';
		$value = "!!! RECURSION LIMIT !!!";
		$is_array = false;
		$is_object = false;
	}
	
	if (($is_object) && array_key_exists($cache_key,$PARSED_OBJS)) {
		$icon = 'object.png';
		$value = "DUP OF ".$PARSED_OBJS[$cache_key]."";
		$is_array = false;
		$is_object = false;
	}
	
	// ensure var is encoded properly
	$varname = htmlentities($varname);
	
	if ($is_object) {

		$icon = 'object.png';
		
		// do this to make the property class type visible
		if ($is_incomplete_class) {
			// can't access "__PHP_Incomplete_Class_Name" directly so we have to enumerate properties
			$innerVars = get_object_vars($value);
			foreach ($innerVars as $innerVar => $innerVal) {
				if ($innerVar == '__PHP_Incomplete_Class_Name') {
					$classname = $innerVal;
					break;
				}
			}
		}
		
		$styleClass = $level == 0 ? "jstree-open" : "";
		echo "<li class='$styleClass' data-jstree='{\"icon\":\"".BASE_URL."assets/images/$icon\"}'><strong>$varname</strong> ($classname)\n";
		echo "<ul>\n";
		
		$innerVars = get_object_vars($value);
		foreach ($innerVars as $innerVar => $innerVal) {
			recurse_var($innerVar, $innerVal, $path . $innerVar . '/', $level + 1);
		}
		
		$methods = get_class_methods($value);
		foreach ($methods as $method) {
			echo "<li data-jstree='{\"icon\":\"".BASE_URL."assets/images/function.png\"}'><strong>$method</strong> (Function)\n";
		}
		
		echo "</ul></li>\n";

	}
	elseif ($is_array) {

		$icon = 'array.png';
		$styleClass = $level == 0 ? "jstree-open" : "";

		//echo "<li class='$styleClass'><strong>$varname</strong> (Array)";
		echo "<li class='$styleClass' data-jstree='{\"icon\":\"".BASE_URL."assets/images/$icon\"}'><strong>$varname</strong> (Array)";
		echo "<ul>\n";
		foreach ($value as $innerVar => $innerVal) {
			recurse_var($innerVar, $innerVal, $path . $innerVar . '/', $level + 1);
		}
		echo "</ul></li>\n";
	}
	else {
		if ($varname != '__PHP_Incomplete_Class_Name')
			echo "<li data-jstree='{\"icon\":\"".BASE_URL."assets/images/$icon\"}'><strong>$varname</strong> = " . (is_string($value) ? '"' . htmlentities($value) . '"' : $value) . "</li>\n";
	}
	
	// if (!array_key_exists($cache_key,$PARSED_OBJS)) // this sometimes makes things even more weird
	$PARSED_OBJS[$cache_key] = $path;

}

/**
 * @param array $_SERVER
 * @param bool $use_forwarded_host may need to be set to true if behind a load balancer
 * @return string
 */
function url_origin($s, $use_forwarded_host=false)
{
	$ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
	$sp = strtolower($s['SERVER_PROTOCOL']);
	$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
	$port = $s['SERVER_PORT'];
	$port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
	$host = ($use_forwarded_host && isset($s['HTTP_X_FORWARDED_HOST'])) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
	$host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
	return $protocol . '://' . $host;
}

/**
 * @param array $_SERVER
 * @param bool $use_forwarded_host may need to be set to true if behind a load balancer
 * @return string
 */
function full_url($s, $use_forwarded_host=false)
{
	return url_origin($s, $use_forwarded_host) . $s['REQUEST_URI'];
}

?>

	<p class="top-buffer text-danger"><strong><i class="fa fa-exclamation-triangle"></i> Warning:</strong> This utility may possibly be used to 
	run untrusted code.  Do not leave it installed on an unprotected public server. 
	<a href="http://php.net/manual/en/function.unserialize.php">More info...</a></p>
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