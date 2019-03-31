#!/usr/bin/php
<?php
	if ($argc == 1)
		return;
	while (++$i != $argc)
		echo "$argv[$i]\n";
?>
