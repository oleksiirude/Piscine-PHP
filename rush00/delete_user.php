<?php
	session_start();

	if ($_GET['username'] && $_GET['submit'])
	{
		$base = file_get_contents("private/users");
		$base = unserialize($base);
		
		$i = 0;
		foreach ($base as $item)
		{
			if ($item['login'] == $_GET['username'] && $i == $_GET['id'])
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
			file_put_contents("private/users", $base);
			header("Location: del_user.php");
		}
	}
	header("Location: del_user.php");
?>