<?php
	session_start();
	$_SESSION["logged_admin"] = "";
	header("Location: admin.php");
?>