<?php

	if ($_GET['name'] && $_GET['submit'])
	{
		if (!file_exists("private/users"))
			header("Location: admin.php");
		$base = file_get_contents("private/items");
		$base = unserialize($base);
		
		$i = 0;
		foreach ($base as $item)
		{
			if ($item['name'] == $_GET['name'])
			{
				unset($base[$i]);
				$new_base = array_values($base);
				$done = 1;
				break;
			}
			$i++;
		}
		if ($done)
		{
			$base = serialize($new_base);
			file_put_contents("private/items", $base);
			header("Location: del_item.php");
		}
	}
	header("Location: del_item.php");
?>