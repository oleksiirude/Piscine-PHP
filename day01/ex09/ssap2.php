#!/usr/bin/php
<?php
	function mysort($e1, $e2)
	{
		$i = 0;
    	$chars = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
    	$le1 = strtolower($e1);
    	$le2 = strtolower($e2);
    	$len1 = strlen($le1);
    	$len2 = strlen($le2);
    	while ($i < $len1 || $i < $len2)
    	{
        	$index_e1 = strpos($chars, $le1[$i]);
        	$index_e2 = strpos($chars, $le2[$i]);
        	if ($index_e1 < $index_e2)
            	return (FALSE);
        	else if ($index_e1 > $index_e2)
            	return (TRUE);
        	$i++;
        }
	}

	if ($argc > 1)
	{
		array_shift($argv);
		foreach ($argv as $elem)
		{
			$tmp_arr = explode(" ", $elem);
			foreach ($tmp_arr as $word)
				if ($word)
					$final_arr[] = $word;
		}
		if ($final_arr)
			usort($final_arr, "mysort");
		if ($final_arr)
			foreach ($final_arr as $word)
				echo $word."\n";
	}
?>