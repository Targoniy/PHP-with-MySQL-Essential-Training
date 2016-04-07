<?php 
	$name = "test";
	$value = 3;
	$expire = time();
	// setcookie($name, $value, $expire);
	// setcookie($name);
	setcookie($name, $value, time() + 221);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Cookies
	</title>
</head>
<body>
	<pre>
		<?php
			$test = isset($_COOKIE["test"])? $test = $_COOKIE["test"] : "";
			print_r ($test);
		 ?>
		

	</pre>
</body>
</html>