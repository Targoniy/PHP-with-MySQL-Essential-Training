<?php 
if (!isset($layout_context)) {
	$layout_context = "public"; 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Widget Corp <?php if ($layout_context == "admin") {
			echo "Admin";
		} ?>
	</title>
	<link href="../public/stylesheets/public.css" rel="stylesheet" type="text/css"  media="all" />
</head>
<body>
	<div id="header">
		<h1><a href="index.php" style="color:#D4E6F4; text-decoration: none">Widget Corp <?php if ($layout_context == "admin") {
			echo "Admin";
		} ?></h1></a>
	</div>