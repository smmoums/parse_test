<?php
	
	for($i=0;$i<60;$i++)
	{
		//ob_start();
		echo "stap $i \n";
		//ob_end_flush();
		//ob_flush();
		flush();
		sleep(1);
	}
	print date("Y-m-d H:i:s");