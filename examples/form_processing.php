<html>
	<head>
		<title>Form Processing</title>
	</head>
	<body>
		<pre>
		<?php
			// Ultra-simple form processing
			// Just retrieve the value and return it to the browser
			
			// $username = $_POST['username'];
			// $password = $_POST['password'];
			
			// echo "{$username}.{$password}";
		print_r($_POST);
		?>
		</pre>
		<br />
		<?php 
			// if (isset($_POST["username"]))
			// {
			// $username = $_POST["username"];
			// } else 
			// {
			// 	$username = "";
			// }
			// if (isset($_POST["password"]))
			// {
			// $password = $_POST["password"];
			// } else 
			// {
			// 	$password = "";
			// }
		if (isset($_POST["submit"])) {
			# code...
		$username = isset($_POST["username"]) ? $_POST["username"]:"non";
		$password = isset($_POST["password"]) ? $_POST["password"]:"nom";
		} else {
			
			$username = "1";
			$password = "2";	
		}


			echo "{$username}:{$password}";
		
		?>
	</body>
</html>