<?php
if (isset($_POST['submit'])){
	$user     = $_POST["name"];
	$password = $_POST["password"];
	$message = "Login in {$user}";
}else{
	$message = "Please login in";
}
?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<body>
		<div class="container" style="font-size:26px">
			<h1 class="text-center">Hello World</h1>
			<?php echo "$message"; ?>
		<form action="index2.php" method="post" class="form-horizontal" role="form">
				<div class="form-group">
					
				</div>
				<input type="text" name="name" >
				<input type="password" name="password" >

				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<button type="submit" name="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
		</form>
	</body>
</html>
eq