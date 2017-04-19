<?php
ob_start();
date_default_timezone_set('Asia/Shanghai');
$log_path = "/root/logs/crontab/regist_dau.log";
$test = "0";
$today = date("Y-m-d");
//$today = '2016-12-02';
try
{
	$hw_date=shell_exec("hwclock -r");
	$hw_date=substr($hw_date,0,24);
}
catch( Exception  $e ) 
{
	print $e->getMessage();
	$hw_date = "";
}

$server_group=[
		/**/
		'androids5' =>[
					'host'      => '123.206.78.130',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids6' =>[
					'host'      => '123.207.156.70',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids7' =>[
					'host'      => '123.207.167.166',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids8' =>[
					'host'      => '123.207.159.121',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids9' =>[
					'host'      => '123.207.159.95',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids10' =>[
					'host'      => '123.207.157.20',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids11' =>[
					'host'      => '123.206.50.89',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',
				],
		'androids12' =>[
					'host'      => '123.207.159.136',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',
 				],
		'androids13' =>[
 					'host'      => '123.207.166.207',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',
 				],
		'androids14' =>[ 
					'host'      => '123.206.76.74',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',
 				],
		'androids15' =>[ 
					'host'      => '123.207.170.225',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',
 				],
		'androids16' =>[ 
					'host'      => '139.199.22.141',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',
 				],
		'androids17' =>[ 
					'host'      => '123.206.26.202',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',
 				],
				
		'androids18' =>[ 
					'host'      => '123.207.143.202',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',
 				],
		'androids19' =>[ 
					'host'      => '123.206.66.235',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',
 				],
		'androids20' =>[
					'host'      => '123.206.23.211',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids21' =>[
					'host'      => '123.206.25.137',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids22' =>[
					'host'      => '123.206.13.159',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids23' =>[
					'host'      => '123.207.142.179',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids24' =>[
					'host'      => '123.206.50.118',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
				
	];
$channal_group = [
				"UC"=>"UC","QIHOO360"=>"360",
				/**/
				"XIAOMI"=>"XIAOMI","PEAPODS"=>"PEAPODS","GIONEE"=>"GIONEE","BAIDU"=>"BAIDU",
				"HUAWEI"=>"HUAWEI","LENOVO"=>"LENOVO","COOLPAD"=>"COOLPAD","MEIZU"=>"MEIZU","VIVO"=>"VIVO","OPPO"=>"OPPO",
				"TT"=>"TT","4399"=>"4399","DCN"=>"当乐","QQ"=>"QQ","HOLA"=>"HOLA","PYW"=>"PYW",
				"ANZHI"=>"ANZHI","MZW"=>"MZW","IQIYI"=>"IQIYI","LETV"=>"LETV","QQWX"=>"微信",
				"XIAO7"=>"XIAO7","AHAIMA"=>"安卓海马",
				//
				"PP"=>"PP","XY"=>"XY","I4"=>"I4","TBT"=>"TBT","KUAIYONG"=>"KUAIYONG","HAIMA"=>"HAIMA"
				
			];
$account_data = array();
$dau_data = array();
$account_all = array();
$insert_data_arr = array();
$register_data=array();
$login_data = array();

print $today."\n";
$start_stamp = strtotime("$today-1day");
$start_date = date("Y-m-d H:i:s",$start_stamp);
$end_stamp = strtotime($today) ;
$end_date = date("Y-m-d H:i:s",$end_stamp);
$script_start_stamp=time();
	foreach ($server_group as $k=>$v)
	{
		echo "serverID : $k ";
		file_put_contents("vip.csv","serverID : $k \n",FILE_APPEND) ;
		$pdo = new PDO("mysql:host={$v["host"]};port={$v["port"]};dbname={$v["database"]}","root","yuzuki",array(PDO::ATTR_PERSISTENT => true,PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")) or die("fail to login $k");
		foreach($channal_group as $kc=>$channal)
		{/**/
			//注册用户数去重
			$query_account="select  account from fightwar_login.Global_Account where
				serverID = '$kc' and 
				creationdate between '$start_stamp' and '$end_stamp'";
			$query_class=$pdo->query($query_account);
			if(!is_bool($query_class))
			{
				$query_class->setFetchMode(PDO::FETCH_ASSOC);
				$query_data=$query_class->fetchall();
			}
			
			if(!empty($query_data))
			{	
				foreach ($query_data as $ka=>$va)
				{
					if( !isset( $account_data[$kc][$va["account"]] ) )
					{
						$account_data[$kc][$va["account"]] = 0;
					}
					else
					{
						$account_data[$kc][$va["account"]] += 1;
					}
					
				}

			}
			//注册未去重
			if ( !isset($register_data[$kc]) )
			{
				$register_data[$kc]=0;
			}
			$register_repeat_query="select count(AccountID) as cn from fightwar_login.Global_Account 
				where creationdate between '$start_stamp' and '$end_stamp' and ServerID = '$kc'";
			$register_repeat_class = $pdo->query($register_repeat_query);
			if(!is_bool($register_repeat_class))
			{
				$register_repeat_class->setFetchMode(PDO::FETCH_ASSOC);
				$register_query_data=$register_repeat_class->fetchall();
				
				$register_data[$kc] += $register_query_data[0]["cn"];
			}

			//DAU 去重
			$query_dau = "select account from fightwar_login.Global_Account where AccountID in
			(select AccountID from fightwar_main_0001.Player_Character where guid
			in (select guid from fightwar_log_0001.Log_Record_3 
						where creationdate between '$start_date' and '$end_date' and ServerID = '$kc'
						group by guid
						)			
			)";
			//$dau_data[$kc]=array();
			$dau_class=$pdo->query($query_dau);
			if(!is_bool($dau_class))
			{
				$dau_class->setFetchMode(PDO::FETCH_ASSOC);
				$dau_query_data=$dau_class->fetchall(); 
			//print sizeof($dau_query_data)."\n";				
			}
			if(!empty($dau_query_data))
			{	
				foreach ($dau_query_data as $ka=>$va)
				{
					if(!isset($dau_data[$kc][$va["account"]]))
					{
						$dau_data[$kc][$va["account"]] = 0;
					}
					else
					{
						$dau_data[$kc][$va["account"]] += 1;
					}
				}	
			}
			
			//dau_repeat
			if ( !isset($login_data[$kc]) )
			{
				$login_data[$kc]=0;
			}
			$login_query="select count(distinct(guid)) as cn from fightwar_log_0001.Log_Record_3 
				where creationdate between '$start_date' and '$end_date' and ServerID = '$kc'";
			$login_class = $pdo->query($login_query);
			//var_dump($login_class);
			if(!is_bool($login_class))
			{
			$login_class->setFetchMode(PDO::FETCH_ASSOC);
			$login_query_data=$login_class->fetchall();
			//var_dump($login_query_data);
			
			$login_data[$kc] += $login_query_data[0]["cn"];
			print "$k $kc {$login_query_data[0]["cn"]} \n";	
			}
			
		}
		
		$pdo = $query_class= null;
		$script_stamp=time();
		print " in ".($script_stamp-$script_start_stamp)." sec \n";
	}

//var_dump( $account_data,$dau_data,$login_data );die;
foreach($channal_group as $kc=>$channal)
{
	$register_num=isset($account_data[$kc]) ? sizeof($account_data[$kc]):0;
	$dau_num = isset($dau_data[$kc]) ? sizeof($dau_data[$kc]) : 0;
	$register_repeat_num = isset($register_data[$kc]) ? $register_data[$kc] : 0;
	$dau_repeat_num = isset($login_data[$kc]) ? $login_data[$kc] : 0;
	$insert_data_arr[]="('$start_date','$kc',$register_num,$register_repeat_num,$dau_num,$dau_repeat_num,'$hw_date')";	
}
$insert_data_str = implode(",",$insert_data_arr);
print $insert_data_str;
print "\n";
if($test == 1){die;}
$query_insert = "insert into fightwar_admin.base_data
	(`date`,`channal`,`register`,`register_repeat`,`dau`,`dau_repeat`,`hd_date`) values $insert_data_str";
print $query_insert."\n";
$pdo = new PDO("mysql:host=localhost;dbname=fightwar_admin","root","123qwe",array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")) or die("fail to login $k");
$insert_rows = $pdo->exec($query_insert);
print $insert_rows;
print "\n";
$pdo = null;
echo "\n ####end####";
$content = ob_get_contents();
print $content;
file_put_contents($log_path,$content,FILE_APPEND);
ob_end_clean();