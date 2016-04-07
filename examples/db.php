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
<!DOCTYPE html>
<html>
<head>
	<title>
		database
	</title>
</head>
<body>
	<?php
		$query = "SELECT * ";
		$query .= "FROM subjects ";
		$query .= "WHERE visible = 1 ";
		$query .= "ORDER BY position ASC";

		$result = mysqli_query($connection, $query);
		if (!$result) {
		    die("Database query falied.");
		}
		?>
		<ul>
		<?php 
		while ($row = mysqli_fetch_array($result)) { ?>
		<li><?php echo $row["menu_name"] . " (" . $row["id"] . ") " . "<br>"; ?></li>
		<?php } ?>
	<?php 
	mysqli_free_result($result); ?>
</body>
</html>
<?php
mysqli_close($connection);
?>