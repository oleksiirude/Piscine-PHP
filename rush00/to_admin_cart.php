<!DOCTYPE html>
<html>
<head>
	<title>Your cart</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<div class='upper_block'><a href="index.php"><img class='sneakers' src='img/sneakers.png'></a><span class='title'>Your cart</span>
<?php

	session_start();
	if (!$_SESSION["logged_on_user"])
	{
	 	echo "<div class='reg'><form action='reg_or_log.php' method='POST'>
    		 		<input class='button' type='text' name='login' placeholder='login...' value=''/>
    		  		<input class='button' type='submit' name='submit' value='login'><br>
    		 		<input class='button' type='password' name='passwd' placeholder='password...' value=''/>
    		 		<input class='button' type='submit' name='submit' value='register'><br>
		 		</form>
	 		</div>
		</div>";
	}
	else
	{
		echo "<div class='reg'><form action='logout.php' method='POST'>
					<img class='logged_logo' src='img/logged.png'>
    		  		<span class='logged_user'>$_SESSION[logged_on_user] </span><input class='button' type='submit' name='submit' value='logout'><br>
		 		</form>
	 		</div>
		</div>";
	}
	if ($_SESSION['in_cart'])
		$arr = file_get_contents("private/cart");
		$arr = unserialize($arr);
		foreach ($arr as $key)
			$arr = $key;
		foreach ($key as $data)
		if (!$_SESSION[logged_on_user])
			$name = "username";
		else
			$name = $_SESSION[logged_on_user];
		echo "<div class='cart_zone'>
			<div class='cart_mini_zone'>
				<span class='hello'>Hi, admin</span><br>
				<span class='hello'>You have one order from user $name: $data[name], $data[size], $data[price] UAH</span><br>
		 		</div>
			</div>";
?>
	</div>
</body>
</html>