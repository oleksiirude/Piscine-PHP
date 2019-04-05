#!/usr/bin/php
<?php
	date_default_timezone_set("Europe/Paris");

	function error_msg()
	{
		echo "Wrong Format\n";
		exit(-1);
	}

	function parse_and_validate_day($day)
	{
		if (ctype_digit($day))
		{
			if ($day < 1 || $day > 31)
				error_msg();
			return ($day);
		}
	}

	function parse_and_validate_year($year)
	{
		if (ctype_digit($year))
		{
			if ($year < 1970 || $year > 3000)
				error_msg();
			return ($year);
		}
	}

	function parse_and_validate_time($time)
	{
		if (strlen($time) != 8)
			error_msg();
		if ($time[2] != ":" && time[5] != ":")
			error_msg();
		$arr = explode(":", $time);
		if (!ctype_digit($arr[0]) || !ctype_digit($arr[1]) || !ctype_digit($arr[2]))
			error_msg();
		if ($arr[0] < 0 || $arr[0] > 23)
			error_msg();
		if (($arr[1] < 0 || $arr[1] > 59) || ($arr[2] < 0 || $arr[2] > 59))
			error_msg();
		return ($arr);
	}

	function validate_dayname($dayname)
	{
		if (!preg_match("/^[L|l]undi$|^[M|m]ardi$|^[M|m]ercredi$|^[J|j]eudi$|^[V|v]endredi$|^[S|s]amedi$|^[D|d]imanche$/", $dayname))
			error_msg();

	}

	function parse_and_validate_month($month)
	{
		if (preg_match("/^[J|j]anvier$/", $month))
			return (1);
		else if (preg_match("/^[F|f]evrier$/", $month))
			return (2);
		else if (preg_match("/^[M|m]ars$/", $month))
			return (3);
		else if (preg_match("/^[A|a]vril$/", $month))
			return (4);
		else if (preg_match("/^[M|m]ai$/", $month))
			return (5);
		else if (preg_match("/^[J|j]uin$/", $month))
			return (6);
		else if (preg_match("/^[J|j]uillet$/", $month))
			return (7);
		else if (preg_match("/^[A|a]out$/", $month))
			return (8);
		else if (preg_match("/^[S|s]eptembre$/", $month))
			return (9);
		else if (preg_match("/^[O|o]ctobre$/", $month))
			return (10);
		else if (preg_match("/^[N|n]ovembre$/", $month))
			return (11);
		else if (preg_match("/^[D|d]ecembre$/", $month))
			return (12);
		else
			error_msg();

	}

	if ($argc != 2)
		error_msg();
	$data = explode(" ", $argv[1]);
	if (count($data) != 5)
		error_msg();
	validate_dayname($data[0]);
	$date = parse_and_validate_day($data[1]);
	$month = parse_and_validate_month($data[2]);
	$year = parse_and_validate_year($data[3]);
	$time = parse_and_validate_time($data[4]);
	echo mktime($time[0], $time[1], $time[2], $month, $date, $year)."\n";
?>
