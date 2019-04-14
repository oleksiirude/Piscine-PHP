#!/usr/bin/php
<?php
	if ($argc < 2 || !is_readable($argv[1]))
		return;
	if(!($source_code = file_get_contents($argv[1])))
		return;
	echo preg_replace_callback("/<a [\w\W]*?<\/a>/i", function($match)
	{
		$title = preg_replace_callback("/title=(\".*?\")/", function($m1)
		{
			return ("title=".strtoupper($m1[1]));
		}, $match[0]);

		return (preg_replace_callback("/(>[\w\W]*?<)/i", function($m2)
		{
			return (strtoupper($m2[1]));
		}, $title));
		return ($match[0]);
	}, $source_code);
?>