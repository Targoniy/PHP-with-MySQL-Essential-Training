<?php
	require_once ("redirect.php");
	require_once ("validation_function.php");
	$errors = array();
	$messege = "";
	if (isset($_POST["submit"])) {
				# code...
		$username = $_POST["username"];
		$password = $_POST["password"];
		$field_required  = array("username", "password");

		foreach ($field_required  as $field) {
			$value = trim($_POST[$field]); 
			if (!has_presence($value)) {
				$errors[$field] = ucfirst($field) . " can't be blank";
			}
		}
		if (empty($errors)) {
			if ($username == "1" && $password == "2"){
			redirect_to("index.php");
		} else {
			
			$messege = "Username/password do not match.";
			}	# code...
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
	<?php echo form_errors($errors); ?>
<form action="form_with_validation.php" method="post">
	Username: <input type="text" name="username" value="" /><br />
	Password: <input type="password" name="password" value="" /><br />
	<br />
	<input type="submit" name="submit" value="Submit">
</form>
</body>
</html>