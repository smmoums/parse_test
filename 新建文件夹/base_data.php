<?php
	$server_group=[
		"test","","","",
	];
	$server_config=[
		"test"=>[
				'host'=> '139.196.14.52','username'=>'root','password'=>'yuzuki','port'=>'10529',
				"account"=>"fightwar_login_0001","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				"open_date"=>"2016-10-26","exchange"=>"123.207.146.159",
				],
		"androids1"=>[
				'host'=> '123.207.146.159','username'=>'root','password'=>'yuzuki','port'=>'10529',
				"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				"open_date"=>"2016-10-26","exchange"=>"123.207.146.159",
				],
		"androids2"=>[
				'host'=> '123.207.141.241','username'=>'root','password'=>'yuzuki','port'=>'10529',
				"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				"open_date"=>"2016-10-27","exchange"=>"123.207.146.159",
				],
		"androids3"=>[
				'host'=> '123.206.44.246','username'=>'root','password'=>'yuzuki','port'=>'10529',
				"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				"open_date"=>"2016-11-02","exchange"=>"123.207.146.159",
				],
		"androids4"=>[
				'host'=> '123.207.167.15','username'=>'root','password'=>'yuzuki','port'=>'10529',
				"account"=>"fightwar_login","main"=>"fightwar_main_0004","log"=>"fightwar_log_0004",
				"open_date"=>"2016-11-09","exchange"=>"123.207.146.159",
				],
			
	];
	$channal_group = [
		"UC"=>"UC","QIHOO360"=>"360","XIAOMI"=>"XIAOMI","PEAPODS"=>"PEAPODS","GIONEE"=>"GIONEE","BAIDU"=>"BAIDU",
				"HUAWEI"=>"HUAWEI","LENOVO"=>"LENOVO","COOLPAD"=>"COOLPAD","MEIZU"=>"MEIZU","VIVO"=>"VIVO","OPPO"=>"OPPO",
				//
				"PP"=>"PP","XY"=>"XY","I4"=>"I4","TBT"=>"TBT","KUAIYONG"=>"KUAIYONG","HAIMA"=>"HAIMA"
	];
	
	
	$current_date=date("Y-m-d",strtotime("-1day"));
	echo $current_date;
	$data=array();
	$date=date();
	/*
	支付
	select 'id',sum(cash) as sm,count(cash) as cn,count(distinct(guid)) as guid 
		from fightwar_exchange.pay_orders 
		where ins_date between '2016-11-02' and '2016-11-03' and server_id = 'androids3' and sdk ='XY'
	老用户
	select 'id',count(guid) as old_account from fightwar_log_0001.Log_Record_3 
		where creationdate between '2016-10-26' and '2016-10-27' and guid in 
			( select guid from fightwar_log_0001.Log_Record_7 where creationdate between '2016-10-27' and '2016-10-27'
			 and serverID='XY')
	注册
	SELECT 'id',count(Account) as new_register FROM fightwar_login.`Global_Account` 
		where creationdate between '1478651010' and '1478951010' and serverID='XY'
	登录
	 select 'id',count(guid) as login_account from fightwar_log_0001.Log_Record_7 
		where creationdate between '2016-10-27' and '2016-10-27' and serverID='XY'
	有效用户
	 select 'id',count(guid) as qualified_account from fightwar_log_0001.Log_Record_4 
		where creationdate between '2016-10-27' and '2016-10-27' and serverID='XY'
			and level=6
	*/	
	foreach( $server_group as $k=>$v )
	{
		foreach($channal_group as $channal)
		{
			$query_login_data="
						select bb.old_account,cc.new_register,dd.login_account,ee.qualified_account from 
				(select  count(guid) as old_account from fightwar_log_0001.Log_Record_3 
					where creationdate between '2016-10-26' and '2016-10-27' and guid in 
						( select guid from fightwar_log_0001.Log_Record_7 where creationdate between '2016-10-27' and '2016-10-27'
						 and serverID='XY')) as bb
				,
				(SELECT count(Account) as new_register FROM fightwar_login.`Global_Account` 
					where creationdate between '1478651010' and '1478951010' and serverID='XY'
				) as cc
				,
				(
					select count(guid) as login_account from fightwar_log_0001.Log_Record_7 
					where creationdate between '2016-10-27' and '2016-10-27' and serverID='XY'
				) as dd
				,
				(
					select count(guid) as qualified_account from fightwar_log_0001.Log_Record_4 
					where creationdate between '2016-10-27' and '2016-10-27' and serverID='XY'
					and level=6
				) as ee
			";
			$pdo_login = new PDO("mysql:host={$server_config[$v]["host"]};port={$server_config[$v]["port"]};dbname={$server_config[$v]["account"]}","root","yuzuki") or die("$k login pdo fail"); 
			$login_class=$pdo_login->query($query_login_data);
			$login_class->setFetchMode(PDO::FETCH_ASSOC);
			$login_data=login_class->fetchall();
			$query_pay_data="
				select IFNULL(sum(cash),0) as sm,count(cash) as cn,count(distinct(guid)) as guid 
				from fightwar_exchange.pay_orders 
				where ins_date between '2016-11-02' and '2016-11-03' and server_id = 'androids3' and sdk ='XY'
			";
			$pdo_pay = new PDO("mysql:host={$server_config[$v]["exchange"]};port={$server_config[$v]["port"]};dbname={$server_config[$v]["account"]}","root","yuzuki") or die("$k pay pdo fail"); 
			$pay_class = $pdo_pay->query( $query_pay_data );
			$pay_class->setFetchMode(PDO::FETCH_ASSOC);
			$pay_data=login_class->fetchall();
			$data[]="($k,$channal,
					  {$login_data["old_account"]},{$login_data["new_register"]},{$login_data["login_account"]},{$login_data["qualified_account"]},
					  {$pay_data["sm"]},{$pay_data["cn"]},{$pay_data["guid"]} )";
		}
		
	}
	$insert_data = implode(",",$data);
	$query_insert = "insert into fightwar_admin.fightwar_base_data () values $insert_data";
	$pdo_pay = new PDO("mysql:host=139.129.21.196;dbname=fightwar_admin","root","") or die("$k pay pdo fail"); 
	$pay_class = $pdo_pay->query( $query_insert );
	
	