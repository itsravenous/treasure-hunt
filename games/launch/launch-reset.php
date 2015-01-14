<?php
	$file = 'launch-count.txt';

	while(true)
	{
		file_put_contents($file, '0');
		sleep(4);
	}
?>
