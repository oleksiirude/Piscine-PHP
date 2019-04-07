<?php

	session_start();
	if ($_POST["submit"] == "login" && $_POST["login"] && $_POST["passwd"])
	{
		if ($_POST["login"] != "admin" && $_POST["passwd"] != "admin")
		{
			$_SESSION["logged_on_user"] = "";
			header("Location: admin.php");
		}
		else
		{
			$_SESSION["logged_admin"] = "admin";
			header("Location: admin.php");
		}
	}
	else
	{
		$_SESSION["logged_admin"] = "";
		header("Location: admin.php");
	}
?>