#!/usr/bin/php
<?php
	if ($argc == 1)
		return;
	$str = preg_replace("/\s+/", " ", $argv[1]);
	$str = trim($str);
	if ($str)
		echo $str."\n";
?>