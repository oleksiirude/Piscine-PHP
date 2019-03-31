#!/usr/bin/php
<?php
	if ($argc == 1)
		return;
	if ($argc > 2)
	{
		echo "$argv[1]\n";
		return;
	}
	$arr = explode(" ", $argv[1]);
	$buf = array_shift($arr);
	array_push($arr, $buf);
	$str = implode(" ", $arr);
	echo "$str\n";
?>
