<?php
	function delete_database()
	{
		$items = file("items.txt");
		foreach ($items as $line)
			$base[] = "";
		$base = serialize($base);
		if (!file_exists("private"))
			mkdir("private");
		file_put_contents("private/items", $base);
	}

	session_start();
	delete_database();
	$_SESSION["database_alive"] = 0;
	header("Location: admin.php")
?>