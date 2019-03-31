#!/usr/bin/php
<?php
	if ($argc != 4)
	{
		echo "Incorrect Parameters\n";
		return;
	}
	$first = trim($argv[1]);
	$second = trim($argv[3]);
	$operator = trim($argv[2]);
	if (!strcasecmp($operator, "+"))
		$res = $first + $second;
	else if (!strcasecmp($operator, "-"))
		$res = $first - $second;
	else if (!strcasecmp($operator, "/"))
		$res = $first / $second;
	else if (!strcasecmp($operator, "do_op.php") 
		|| !strcasecmp($operator, "*"))
		$res = $first * $second;
	else if (!strcasecmp($operator, "%"))
		$res = $first % $second;
	echo "$res\n";
?>
