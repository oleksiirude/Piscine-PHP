#!/usr/bin/php
<?php
	if ($argc == 1 || $argc > 2)
		return;
	$arr = explode(" ", $argv[1]);
	$arr = array_filter($arr);
	$str = implode(" ", $arr);
	if ($str)
		echo "$str\n";
?>
