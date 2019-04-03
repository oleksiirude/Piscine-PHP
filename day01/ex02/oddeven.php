#!/usr/bin/php
<?php
	while (42) 
	{
		$sign = 0;

		echo "Enter a number: ";
		$str = trim(fgets(STDIN));
		if (feof(STDIN))
		{
			echo "\n";
			return;
		}
		if ($str[0] == "-" && ctype_digit(($str[1])))
		{
			$sign = 1;
			$str = str_replace("-", "", $str);
		}
		$len = strlen($str);
		$elem = $str[$len - 1];
		if (ctype_digit($str))
		{
			$elem = $elem / 2;
			if (stristr($elem, '.'))
			{
				if ($sign)
					$str = "-".$str;
				echo "$str is odd\n";
			}
			else
			{
				if ($sign)
					$str = "-".$str;
				echo "$str is even\n";
			}
		}
		else
			echo "'$str' is not a number\n";
	}	
?>
