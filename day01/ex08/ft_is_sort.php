<?php
	function ft_is_sort($tab)
	{
		if (empty($tab))
			return (TRUE);
		foreach($tab as $str)
		{
			if ($i)
				if ($buf > $str)
					return (FALSE);
			$buf = $str;
			$i = 1;
		}
		return (TRUE);
	}
?>
