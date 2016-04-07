<?php
	require_once ("redirect.php");
	if (isset($_POST["submit"])) {
				# code...
		$username = $_POST["username"];
		$password = $_POST["password"];
		if ($username == "1" && $password == "2"){
			redirect_to("index.php");
		} else {
			
			$messege = "Login in: {$username}";
			}
	} else {
		$messege = "Please login in:";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Vova
	</title>
</head>
<body>
	<?php echo "{$messege}"; ?><br />
<form action="form_single.php" method="post">
	Username: <input type="text" name="username" value="" /><br />
	Password: <input type="password" name="password" value="" /><br />
	<br />
	<input type="submit" name="submit" value="Submit">
</form>
	
</body>
</html>