<?php
	$file = 'launch-count.txt';
	$ip_file = 'launch-last-ip.txt';
	$lastm = filemtime($file);
	$now = time();
	$delta = $now - $lastm;

	var_dump($lastm);
	var_dump($now);
	echo 'delta';
	var_dump($delta);
	
	$ip = $_SERVER['REMOTE_ADDR'];
	
	if ($delta < 2 && file_get_contents($ip_file) != $ip)
	{
		$i = file_get_contents($file);
		$i ++;
	}
	else
	{
		$i = 1;
	}
	
	var_dump(file_put_contents($file, $i));
	var_dump($i);
	
	file_put_contents($ip_file, $ip)
?>
