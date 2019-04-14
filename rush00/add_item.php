<!DOCTYPE html>
<html>
<head>
	<title>Admin page</title>
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
	<div class='upper_block'><a href="index.php"><img class='sneakers' src='img/sneakers.png'></a><span style="font-size: 30px">Admin's page/add item</span>
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
		<div class='reg' style='margin: 15px;'><form enctype='multipart/form-data' action='create_item.php' method='POST'>
    		 		<input class='button' type='text' name='gender' placeholder='gender...' value=''/><br>
    		 		<input class='button' type='text' name='id' placeholder='id...' value=''/><br>
    		 		<input class='button' type='text' name='size' placeholder='size...' value=''/><br>
    		 		<input class='button' type='text' name='price' placeholder='price...' value=''/><br>
    		 		<input class='button' type='text' name='brand' placeholder='brand...' value=''/><br>
    		 		<input class='button' type='text' name='name' placeholder='name...' value=''/><br>
    		 		<span style='font-size: 16px;'>Photo:</span><input class='button' type='file' name='addfile' accept='image/*'/><br><br>
    		 		<input class='button' type='submit' name='submit' value='add item'><br>
		 		</form>
	 		</div>
		</div>
	</div>
	</div>";
?>
</body>
</html>