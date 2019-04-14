<!DOCTYPE html>
<html>
<head>
	<title>Sneakers store</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<div class='upper_block'><a href="index.php"><img class='sneakers' src='img/sneakers.png'></a><span class='title'>Sneakers <b>e</b>-store</span>
		<form action='admin.php'><input class='admin_button' type='submit' name='submit' value='admin'><br></form>
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
?>
		</div>
	<div class="cart"><a href="cart.php"><img src="img/cart.png" style="width: 80%;"></a></div>
	<div class="items_zone">
		<div style="width: 1600px; margin-left: 44px; margin-top: 20px">
			<?php
				$base = file_get_contents("private/items");
				$base = unserialize($base);
				if ($_SESSION["database_alive"])
					foreach ($base as $item)
					{
						echo "<div class='item_to_print'><img class='item' src='$item[path]'><br><br>
							<span class='info'>For: $item[gender]</span>
							<span class='info'>Model: $item[name]</span>
							<span class='info'>Size:  $item[size]</span>
							<span class='info'>Brand: $item[brand]</span>
							<span class='info'>Price: $item[price] UAH</span>
						<form class='to_cart' action='to_cart.php' method='POST'>
							<input name='ID' style='display: none' value='$item[id]'>
							<input style='background-color: #63964D;' type='submit' name='submit' value='to cart'></form>
						</div>";
					}
			?>
		</div>
	</div>
	<p align="right" style="font-family: monospace; color: green"><i>&#169 olrudenk && jsemyzhe 2019</i></p>
</body>
</html>