#!/usr/bin/php
<?php
	function download_pictures($link, $name, $dir_name)
	{
		$path = $dir_name."/".$name;
		echo $link."\n";
		$fd = fopen($path, w);
		$ch = curl_init($link);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$buf = curl_exec($ch);
		if (curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200)
			fwrite($fd, $buf);
		else
			unlink($path);
		curl_close($ch);
		fclose($fd);
	}

	function get_dir_name($name)
	{
		preg_match("/^https?:\/\/(.*)/", $name, $matches);
		return ($matches[1]);
	}

	function get_names($links)
	{
		foreach ($links as $line)
		{
			preg_match("/.*\/(.*)$/", $line, $matches);
			$names[] = $matches[1];	
		}
		return ($names);
	}

	function parse_and_validate_links($source_code, $dir_name)
	{
		foreach ($source_code as $line)
		{
			$line = trim($line);
			preg_match("/<.*img.*src=\"(.*?[.jpg|.svg|.png|.gif|.webp|.jpeg|.PNG|.JPG|.SVG|.GIF|.WEBP|.JPEG])\".*>/", $line, $matches);
			if ($matches[1])
			{
				if (strncasecmp("http", $matches[1], 4))
					$matches[1] = "https://".$dir_name.$matches[1];	
				$links[] = $matches[1];	
			}
		}
		return ($links);
	}

	$i = -1;
	if ($argc == 1 || $argc > 2)
	{
		echo "Usage: ./photos \"http[s]://www.42.fr\"\n";
		return;
	}
	if(!($source_code = trim(@file_get_contents($argv[1]))))
	{
		echo "Program cannot work with <$argv[1]> URL. Aborting...\n";
		return;
	}
	$source_code = explode("\n", $source_code);
	$dir_name = get_dir_name($argv[1]);
	$links = parse_and_validate_links($source_code, $dir_name);
	if (!$links)
	{
		echo "There is no available pics for download at <$argv[1]> URL. Aborting...\n";
		return;
	}
	$names = get_names($links);
	if (!file_exists($dir_name))
		mkdir($dir_name);
	else
	{
		echo "Directory <$dir_name> already exists! Aborting...\n";
		return;
	}
	foreach ($links as $link)
		download_pictures($link, $names[++$i], $dir_name);
?>