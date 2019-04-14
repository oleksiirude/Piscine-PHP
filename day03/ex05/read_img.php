<?php
	$img = "../img/42.png";

	if (file_exists($img))
	{
		header("Content-Type: image/png");
		readfile($img);
		exit(0);
	}
?>