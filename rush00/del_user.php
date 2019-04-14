<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<div class='upper_block'><a href="index.php"><img class='sneakers' src='img/sneakers.png'></a><span style="font-size: 30px">Admin's page/del user</span>
<?php

	session_start();
	if (!$_SESSION['logged_admin'])
		header("Location: admin.php");
	echo "<div class='reg'><form action='logout_adm.php' method='POST'>
				<img class='logged_logo' src='img/logged.png'>
    	  		<span class='logged_user'>$_SESSION[logged_admin] </span><input class='button' type='submit' name='submit'value='logout'><br>
	 		</form>
	 	</div>
	</div>
	<div class='adm_zone'>
	<div>
		<div class='reg' style='margin: 15px;'><form action='delete_user.php' method='GET'>
    		 		<input class='button' type='text' name='username' placeholder='username...' value=''/><br>
    		 		<input class='button' type='submit' name='submit' value='delete'><br>
		 		</form>
	 		</div>
		</div>
	</div>
	</div>";
?>
<pre>
<div class="database">
	<?php
			if (!file_exists("private/users"))
				header("Location: admin.php");
			$base = file_get_contents("private/users");
			$base = unserialize($base);
			echo "\n";
			echo "      Your user base:\n";
			$i = 0;
			foreach ($base as $item)
			{
				echo "      username [$item[login]]\n";
				$i++;
			}
	?>
</div>
</body>
</html>