<?php
	session_start();
	$base = file_get_contents("private/items");
	$base = unserialize($base);
	foreach ($base as $item)
	{
		if ($item['id'] == $_POST['ID'])
		{
			$tocart[] = $item;
			break;
		}
	}
	$_SESSION['in_cart'] = 1;
	$arr[] = $tocart;
	$arr = serialize($arr);
	file_put_contents("private/cart", $arr);
	header("Location: index.php");
?>