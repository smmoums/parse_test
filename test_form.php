<?php
/*	
	$text=$_GET["text"];
	$myfile = fopen("newfile.csv", "w") or die("Unable to open file!");
	
	fwrite($myfile, $text."\n");
	echo "bingo";
	fclose($myfile);
	
	$myfile = fopen("newfile.csv", "r+") or die("Unable to open file!");
	$file_name="newfile.csv";
	Header("Content-type: application/octet-stream");
	Header("Accept-Ranges: bytes");
	$file_size=filesize("newfile.csv");
	Header("Accept-Length: ".$file_size);
	Header("Content-Disposition: attachment; filename=".$file_name);
	$buffer=1024;
	while(!feof($myfile)){
	 $file_data=fread($myfile,$buffer);
	 echo $file_data;
	}
	*/
	SELECT  * FROM 表名
	create view view_1 as select * from Log_Record_1 where param1=90008 and Guid = 10004
	
	create view view_1 as select Row_Number() over ( order by creationdate ) as show_num ,* from Log_Record_1 where param1=90008 and Guid = 10004

	var_dump ($model  );die;
	
	//fclose($myfile);
	
	function shan(){
		$file="newfile.csv";
		 $result = @unlink ($file); 
			if($result == false){
			echo  "1";
			}
			else{
			echo  "0";
			}
	}