#!/usr/bin/php
<?php
	if ($argc == 1)
		return;
	array_shift($argv);
	$str = implode(" ", $argv);
	$argv = explode(" ", $str);
	sort($argv);
	$len = count($argv);
	foreach ($argv as $str)
	{
		if ($str)
		echo "$str\n";
	}
?>
