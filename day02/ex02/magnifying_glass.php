#!/usr/bin/php
<?php
	if ($argc == 1 || $argc > 2)
		return;
	if(!($source_code = file_get_contents($argv[1])))
		return;
	$source_code = explode("\n", $source_code);
	if (!count($source_code))
		return;
	foreach ($source_code as $line)
	{
		if ($line)
		{
			$line = preg_replace_callback("/<a.*title=\"(.*)\">/", function ($matches) {
				return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
			}, $line);
			$line = preg_replace_callback("/<a.*>(.*)</", function ($matches) {
				return (str_replace($matches[1], strtoupper($matches[1]), $matches[0]));
			}, $line);
			echo $line."\n";
		}
	}
?>
