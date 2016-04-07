<?php
  $dbhost = "localhost";
  $dbuser = "widget_cms";
  $dbpas = "secretpassword";
  $dbname = "widget_corp";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpas, $dbname);
  if (mysqli_connect_errno()) {
  	# code...
  	die("Vafli: " . mysql_connect_error() . " (" . mysql_connect_errno() . ")");  
  }
?>
<?php	
	$query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE visible = 1 ";
	$query .= "ORDER BY position ASC";

	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("Database query falied.");
		# code...
	}
?>
<html>
	<head>
		<title>Databases</title>
	</head>
	<body>
	<ul>
	<?php
		
		while ($subject = mysqli_fetch_assoc($result)) {
			// var_dump($row);
	?>
			<li><?php echo $subject["menu_name"] . "(" . $subject["id"] .")"; ?></li>
	<?php 
		}
	
	 ?>
	 <ul>
	 <?php
	 mysqli_free_result($result);
	   ?>
	</body>
</html>
<?php
	// >>// 5. Close connection
	mysqli_close($connection);
?>