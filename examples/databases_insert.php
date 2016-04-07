<?php
$dbhost     = "localhost";
$dbuser     = "widget_cms";
$dbpas      = "ukraine";
$dbname     = "widget_corp";
$connection = mysqli_connect($dbhost, $dbuser, $dbpas, $dbname);
if (mysqli_connect_errno()) {
    # code...
    die("Vafli: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}
?>
<?php	
  	$menu_name = "Edit me' yes";
  	$position = 4;
  	$visible = 1;
  	$menu_name = mysqli_real_escape_string($connection, $menu_name);

	$query = "INSERT INTO subjects (";
	$query .= " menu_name, position, visible";
	$query .= ") VALUES (";
	$query .= " '{$menu_name}', {$position}, {$visible}";
	$query .= ")";


	$result = mysqli_query($connection, $query);
	if ($result) {
		echo "Norm";
		# code...
	} else {
		die("Database query falied. " . mysqli_error($connection));
	}
?>
<html>
	<head>
		<title>Databases</title>
	</head>
	<body>
	
	</body>
</html>
<?php
	// >>// 5. Close connection
	mysqli_close($connection);
?>