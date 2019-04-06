<?php
	function put_into_file($data)
	{
		$hashed = hash("whirlpool", $_POST["passwd"]);
		$arr = array("login" => $_POST["login"], "passwd" => $hashed);
		$data[] = $arr;
		$tofile = serialize($data);
		file_put_contents("../private/passwd", $tofile);
		exit("OK\n");
	}

	if ($_POST["submit"] == "OK" && $_POST["login"] && $_POST["passwd"])
	{
		if (!file_exists("../private"))
			mkdir("../private");
		if (!file_get_contents("../private/passwd"))
			put_into_file($data);
		else
		{
			$data = unserialize(file_get_contents("../private/passwd"));
			foreach ($data as $key => $value)
				if ($value["login"] == $_POST["login"])
					exit("ERROR\n");
			put_into_file($data);
		}
	}
	else
		exit("ERROR\n");
?>