<?php

	function auth($login, $passwd)
	{
		if (!$data = file_get_contents("private/users"))
			header("Location: index.php");
		$hashed = hash("whirlpool", $passwd);
		$data = unserialize($data);
		foreach ($data as $key => $value)
			if ($value["login"] == $login && $value["passwd"] == $hashed)
				return (TRUE);
		return (FALSE);			
	}

	function put_into_file($data)
	{
		$hashed = hash("whirlpool", $_POST["passwd"]);
		$arr = array("login" => $_POST["login"], "passwd" => $hashed);
		$data[] = $arr;
		$tofile = serialize($data);
		$_SESSION["logged_on_user"] = $_POST["login"];
		file_put_contents("private/users", $tofile);
		header("Location: index.php");
	}

	session_start();
	if ($_POST["submit"] == "register" && $_POST["login"] && $_POST["passwd"])
	{
		if (!file_exists("private"))
			mkdir("private");
		if (!file_get_contents("private/users"))
			put_into_file($data);
		else
		{
			$data = unserialize(file_get_contents("private/users"));
			foreach ($data as $key => $value)
			{
				if ($value["login"] == $_POST["login"])
				{
					$_SESSION["logged_on_user"] = "";
					header("Location: index.php");
					exit();
				}
			}
			put_into_file($data);
		}
	}
	else if ($_POST["submit"] == "login" && $_POST["login"] && $_POST["passwd"])
	{
		if (auth($_POST["login"], $_POST["passwd"]))
		{
			$_SESSION["logged_on_user"] = $_POST["login"];
			header("Location: index.php");
		}
		else
		{
			$_SESSION["logged_on_user"] = "";
			header("Location: index.php");
		}
	}
	else
		{
			$_SESSION["logged_on_user"] = "";
			header("Location: index.php");
		}
?>