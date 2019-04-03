#!/usr/bin/php
<?php

	$arr = explode(" ", $argv[1]);
	$buf = array_shift($arr);
	array_push($arr, $buf);
	$str = implode(" ", $arr);
	if ($str)
		echo "$str\n";
?>
