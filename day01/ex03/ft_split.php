<?php
	function ft_split($str)
	{
		if (!$str)
			return;
		$splitted = explode(" ", $str);
		sort($splitted);
		$filtered = array_filter($splitted);
		$filtered = array_values($filtered);
		if (!(count($filtered)))
			return;
		return $filtered;
	}
?>
