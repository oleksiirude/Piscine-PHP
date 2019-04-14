#!/usr/bin/php
<?php
	function calc($one, $two, $operator)
	{
		if ($operator == "+")
			$res = $one + $two;
		else if ($operator == "-")
			$res = $one - $two;
		else if ($operator == "*")
			$res = $one * $two;
		else if ($operator == "/")
			$res = $one / $two;
		else if ($operator == "%")
			$res = $one % $two;
		echo "$res\n";
	}

	function error_msg($sign)
	{
		if ($sign)
			echo "Syntax Error\n";
		else
			echo "Incorrect Parameters\n";
		exit(-1);
	}

	$unique_operator = 0;
	$order = 0;

	if ($argc != 2)
		error_msg(0);
	$str = str_replace(' ','', $argv[1]);
	$arr = str_split($str);
	foreach($arr as $char)
	{
		if (ctype_alpha($char) || ctype_punct($char))
		{
			if (!strcasecmp($char, "-") 
				|| !strcasecmp($char, "+") 
				|| !strcasecmp($char, "/") 
				|| !strcasecmp($char, "*") 
				|| !strcasecmp($char, "%"))
			{
				if ($unique_operator == 1)
					error_msg(1);
				$operator = $char;
				$i = 1;
				if (!$order)
					error_msg(1);
			}
			else
				error_msg(1);
		}
		$order = 1;
	}
	if (empty($operator))
		error_msg(1);
	$len = count($arr) - 1;
	if ($arr[$len] == $operator)
		error_msg(1);
	$str = implode($arr);
	$arr = explode($operator, $str);
	calc($arr[0], $arr[1], $operator);
?>
