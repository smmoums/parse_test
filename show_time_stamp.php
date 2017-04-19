<html>
<body>
</body>
<script>
function show_info(){alert("11111111111111111111111111");}
</script>
</html>
<?php
	date_default_timezone_set('Asia/Shanghai');
	var_dump ($_REQUEST);
	echo 'input time stamp : '.$_GET['t'];
	echo "<br/>input date date('Y-m-d',\$_GET['t']): ",date('Y-m-d ',$_GET['t']);
	echo "<br/>input time date('Y-m-d h-i-s',\$_GET['t']): ",date('Y-m-d h-i-s',$_GET['t']);
	echo '<br/>current time stamp: '.time() ;
	echo '<br/>current date : '.date('Y-m-d');
	echo '<br/>current time : '.date('Y-m-d h:i:s');
	echo  "<br/>",'strtotime("now") : ',strtotime("now");
	echo  "<br/>",'strtotime("2016-06-12 ") : ',strtotime("2016-06-12");
	echo  "<br/>",'strtotime("2016-07-10 00:00:00") : ',strtotime("2016-07-10 00:00:00");
	echo  "<br/>",'strtotime("2016-07-10 23:59:59") : ',strtotime("2016-07-10 23:59:59");
	echo  "<br/>",'strtotime("2016-07-07 00:00:00") : ',strtotime("2016-07-07 00:00:00");
	echo  "<br/>",'strtotime("first day") : ',strtotime("first day");
	echo  "<br/>",'strtotime("first day of this month") : ',strtotime("first day of this month");
	echo  "<br/>",'strtotime("first day of last month") : ',strtotime("first day of last month");
	echo  "<br/>",'strtotime("tomorrow") : ',strtotime("tomorrow");
	echo "<br/> strtotime('2016-06-16') : ",strtotime('2016-06-16');
	echo "<br/> strtotime('2016-06-17') : ",strtotime('2016-06-17') ;
	echo "<br/> strtotime('2016-06-12+1day') : ",strtotime('2016-06-12+1day');
	echo "<br/> strtotime('+1day',strtotime('2016-06-12')) : ",strtotime('+1day',strtotime('2016-06-12'));
	echo "<br/> strtotime('+1day') : ",strtotime('+1day');
	echo "<br/> strtotime('2016-06-12 06:00:00') : ",strtotime('2016-6-12 06:00:00');
	$date=date($_GET['t']);
	echo "<br/> \$date : ",$date;
	if("2016-06-12"<"2016-06-13"){
		var_dump ("2016-06-12"-"2016-06-13");
		var_dump ("2016-06-13"-"2016-06-12");
	}
	$a=24*60*60;
	echo $a;
/*echo >>EODpage
	<html>
	<script>alert("what?")
	</script>
	</html>
EODpage;	*/
		$stamp=strtotime("2016-06-12 00:00:00");
		echo  "<br/>",'strtotime("2016-06-12 00:00:00") : ',$stamp;
		$time=date("Y-m-d h:i:s",$stamp);
		echo  "<br/> date('Y-m-d h:i:s',\$stamp) : " ,$time ;
		
		
		$a=array_fill(0,16,0);
		var_dump($a);
?>	
		
		
		
		