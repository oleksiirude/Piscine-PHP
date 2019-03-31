#!/usr/bin/php
<?php
	if ($argc == 1)
		return;
	$str = implode(" ", $argv);
	$argv = explode(" ", $str);
	sort($argv);
	$len = count($argv);
	while (++$i < $len)
		echo "$argv[$i]\n";
?>
