<?php
	if ($_POST["submit"] == "OK" && $_POST["login"] && $_POST["oldpw"] && $_POST["newpw"])
	{
		if (!$data = file_get_contents("../private/passwd"))
			exit("ERROR\n");
		$data = unserialize($data);
		foreach ($data as $key => $value)
		{
			if ($value["login"] == $_POST["login"])
				{
					$_POST["oldpw"] = hash("whirlpool", $_POST["oldpw"]);
					if ($data[$key]["passwd"] != $_POST["oldpw"])
					 	exit("ERROR\n");
					$data[$key]["passwd"] = hash("whirlpool", $_POST["newpw"]);
					$tofile = serialize($data);
					file_put_contents("../private/passwd", $tofile);
					exit("OK\n");
				}	
		}
		exit("ERROR\n");
	}
	else
		exit("ERROR\n");
?>