#!/usr/bin/php
<?php
	echo "Enter a number: ";
	fscanf(STDIN, "%s\n", $str);
	if (feof(STDIN))
	{
		echo "\n";
		return;
	}
	if (ctype_digit($str))
	{
		$res = $str / 2;
		if (stristr($res, '.') == TRUE)
			echo "$str is odd\n";
		else
			echo "$str is even\n";
	}
	else
		echo "'$str' is not a number\n";	
?>
