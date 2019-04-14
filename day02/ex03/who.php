#!/usr/bin/php
<?php
	date_default_timezone_set("Europe/Kiev");

	$data = "/var/run/utmpx";
	$fd = fopen($data, "r");
	while ($line = fread($fd, 628))
	{
		$line = unpack("a256USER/a4ID/a32TERM_NAME/iPID/iACTIVE_TERM/iTIME", $line);
		if ($line[ACTIVE_TERM] == 7)
			echo $line[USER]." ".$line[TERM_NAME]."  ".date('M', $line[TIME])."  "
				.date('j', $line[TIME])." "
				.date('H', $line[TIME]).":".date('i', $line[TIME])."\n";
	}
	fclose($fd);
?>