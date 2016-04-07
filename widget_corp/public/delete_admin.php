<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php confirm_logged_in(); ?>


<?php $admin = find_admin_by_id($_GET["id"]) ?>

<?php
	if (!$admin) {
		redirect_to("manage_admin.php");
	}

	$id = $admin["id"];

	$query = "DELETE FROM admins WHERE id = {$id} LIMIT 1";
	$result = mysqli_query($connection, $query);
	if ($result && mysqli_affected_rows($connection) == 1) {  	
		$_SESSION["message"] = "Subject deleted.";
		redirect_to("manage_admins.php");
	} else {
		$message  = "Subject deleted failed.";
		redirect_to("manage_admins.php?ids={$id}");
	}
?>
