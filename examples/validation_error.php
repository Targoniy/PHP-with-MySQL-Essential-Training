<!DOCTYPE html>
<html>
<head>
	<title>
		Validation Error
	</title>
</head>
<body>
	<?php 
		require_once("validation_function.php");
		$errors = array();

		$username = trim("");
	?>
	<?php echo form_errors($errors);  ?>
</body>	
</html>