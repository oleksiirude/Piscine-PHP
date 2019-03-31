#!/usr/bin/php
<?php
	function ascii_sort($a, $b)
	{
		$len_a = strlen($a);
		$len_b = strlen($b);
		while ($i < $len_a && $i < $len_b)
		{
			if ($a[$i] > $b[$i])
				return (TRUE);
			if ($a[$i] < $b[$i])
				return (FALSE);
			$i++;
		}
	}

	if ($argc == 1)
		return;
	array_shift($argv);
	$str = implode(" ", $argv);
	$argv = explode(" ", $str);
	foreach($argv as $elem)
		if (ctype_digit($elem))
			$digits[] = $elem;
		else if (ctype_alpha($elem))
			$strings[] = $elem;
		else
			$other[] = $elem;
	if(!empty($strings))
	{
		natcasesort($strings);
		$final[] = $strings;
	}
	if (!empty($digits))
	{
		usort($digits, "ascii_sort");
		$final[] = $digits;
	}
	if (!empty($other))
	{
		usort($other, "ascii_sort");
		$final[] = $other;
	}
	foreach($final as $elem)
		foreach($elem as $part)
			echo "$part\n";
?>
