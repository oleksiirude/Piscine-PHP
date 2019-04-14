<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<div class='upper_block'><a href="index.php"><img class='sneakers' src='img/sneakers.png'></a><span style="font-size: 30px">Admin's page</span>
<?php
	session_start();
	if (!$_SESSION["logged_admin"])
	{
	 	echo "<div class='reg'><form action='reg_adm.php' method='POST'>
    		 		<input class='button' type='text' name='login' placeholder='login...' value=''/><br>
    		 		<input class='button' type='password' name='passwd' placeholder='password...' value=''/><br>
    		 		<input class='button' type='submit' name='submit' value='login'><br>
		 		</form>
	 		</div>
		</div>";
	}
	else
	{
		echo "<div class='reg'><form action='logout_adm.php' method='POST'>
					<img class='logged_logo' src='img/logged.png'>
    		  		<span class='logged_user'>$_SESSION[logged_admin] </span><input class='button' type='submit' name='submit' value='logout'><br>
		 		</form>
	 		</div>
		</div>
		<div class='adm_zone'>
		<div>
			<a href='install.php' class='menu'>Install database</a><br>
			<a href='delete_base.php' class='menu'>Delete database</a><br>
			<a href='add_item.php' class='menu'>Add item</a><br>
			<a href='del_item.php' class='menu'>Delete item</a><br>
			<a href='del_user.php' class='menu'>Delete user</a><br>
			<a href='to_admin_cart.php' class='menu'>See closed carts</a><br>
		</div>
	</div>";
	}
?>
</body>
</html>