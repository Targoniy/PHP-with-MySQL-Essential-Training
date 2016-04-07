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
	$id = 4;
  	$menu_name = "Delete me";
  	$position = 4;
  	$visible = 1;

	$query = "DELETE FROM subjects ";
	$query .= "WHERE id = {$id} ";
	// $query .=  "LIMIT 1";

	$result = mysqli_query($connection, $query);
	if ($result && mysqli_affected_rows($connection) == 1 ) {
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