<?php

	if ($_POST['gender'] && $_POST['id'] && $_POST['size'] && $_POST['price'] && $_POST['brand'] && $_POST['name'] && !$_FILES["error"])
	{
		$name = $_FILES['addfile']['name'];
		$file = $_FILES['addfile']['tmp_name'];

		$arr['gender'] = $_POST['gender'];
		$arr['id'] = $_POST['id'];
		$arr['size'] = $_POST['size'];
		$arr['price'] = $_POST['price'];
		$arr['brand'] = $_POST['brand'];
		$arr['name'] = $_POST['name'];
		if ($_POST['gender'] == 'm')
		{
			move_uploaded_file($file, "items/men/{$name}");
			$arr["path"] = "items/men/".$name;
		}
		else if ($_POST['gender'] == 'w')
		{
			move_uploaded_file($file, "items/women/{$name}");
			$arr["path"] = "items/women/".$name;
		}
		$base = file_get_contents("private/items");
		$base = unserialize($base);
		$base[] = $arr;
		$base = serialize($base);
		if (!file_exists("private"))
			mkdir("private");
		file_put_contents("private/items", $base);
		header("Location: admin.php");
	}
?>