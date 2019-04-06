<?php
	function auth($login, $passwd)
	{
		if (!$data = file_get_contents("../private/passwd"))
			exit("ERROR\n");
		$hashed = hash("whirlpool", $passwd);
		$data = unserialize($data);
		foreach ($data as $key => $value)
			if ($value["login"] == $login && $value["passwd"] == $hashed)
				return (TRUE);
		return (FALSE);			
	}
?>