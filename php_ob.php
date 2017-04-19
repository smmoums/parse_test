<?php
	
	for($i=0;$i<10;$i++)
	{
		//ob_start();
		echo $i;
		//ob_flush();
		flush();
		sleep(10);
		//ob_end_flush();
	}
	
	