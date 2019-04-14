<?php
 	if (!strcmp($_SERVER["PHP_AUTH_USER"], "zaz") && !strcmp($_SERVER["PHP_AUTH_PW"], "jaimelespetitsponeys"))
 	{
 		$img = file_get_contents("../img/42.png");
 		$img_coded = base64_encode($img);
 		echo "<html><body>\n";
 		echo "Hello Zaz<br />\n";
 		echo "<img src='data:image/png;base64,{$img_coded}'>\n";
 		echo "</body></html>\n";
 	}
 	else
 	{
 		echo "<html><body>That area is accessible for members only</body></html>\n";
 		header('WWW-Authenticate: Basic realm="Member area"');
 		header('HTTP/1.0 401 Unauthorized');
 	}
?>