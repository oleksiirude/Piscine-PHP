#!/usr/bin/php
<?php
	if ($argc == 1)
		return;
	while (++$i != $argc)
		if ($argv[$i])	
			echo "$argv[$i]\n";
?>
