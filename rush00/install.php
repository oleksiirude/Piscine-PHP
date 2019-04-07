<?php
	function create_item($line)
	{
		$tmp = explode(" ", $line);
		$arr["gender"] = $tmp[0];
		$arr["id"] = $tmp[1];
		$arr["size"] = $tmp[2];
		$arr["price"] = $tmp[3];
		$arr["brand"] = $tmp[4];
		$arr["name"] = $tmp[5];
		$arr["path"] = $tmp[6];
		return ($arr);
	}

	function install_database()
	{
		$items = file("items.txt");
		foreach ($items as $line)
			$base[] = create_item($line);
		$base = serialize($base);
		if (!file_exists("private"))
			mkdir("private");
		file_put_contents("private/items", $base);
	}

	session_start();
	install_database();
	$_SESSION["database_alive"] = 1;
	header("Location: admin.php")
?>