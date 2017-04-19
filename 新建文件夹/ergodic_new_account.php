<?php
/*
	LVT 单日注册玩家x天内充值记录
*/
//ob_start();
$log_path = "/root/logs/crontab/LVT.log";

date_default_timezone_set('Asia/Shanghai');
$route_server_group=[
		'androids1' =>[
					'host'      => '123.207.146.159',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids2' =>[
					'host'      => '123.207.141.241',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids3' =>[
					'host'      => '123.206.44.246',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		'androids4' =>[
					'host'      => '123.207.167.15',
					'database'  => 'fightwar_login',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		];

$today = date("Y-m-d H:i:s");
//方便直接运行 ，输入变量date
if(isset( $argv[1] ))
{
	if( isDateTime($argv[1]))
	{
		$today = $argv[1];
		print "by command";
	}
	else
	{
		die("wrong input type");
	}
}
print $today."\n";

$start_stamp = strtotime("$today-1day");
$start_date = date("Y-m-d H:i:s",$start_stamp);
$end_stamp = strtotime($today) ;
$end_date = date("Y-m-d H:i:s",$end_stamp);
$script_start_stamp=time();

$account_arr = array();
$account_str = "";


foreach ($route_server_group as $k=>$v)
{
	$local_db = new PDO("mysql:host=139.129.21.196;dbname=fightwar_admin","root","123qwe",array(PDO::ATTR_PERSISTENT => true,PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")) or die("fail to login $k");
	
	echo "serverID : $k ";
	$pdo = new PDO("mysql:host={$v["host"]};port={$v["port"]};dbname={$v["database"]}","root","yuzuki",array(PDO::ATTR_PERSISTENT => true,PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")) or die("fail to login $k");
		//$pdo -> exec('set names utf-8');
	
		$query_account= "SELECT account,FROM_UNIXTIME(CreationDate,'%Y-%m-%d') as date,serverID as sdk as date from fightwar_login.Global_Account where CreationDate between $start_stamp and $end_stamp ";
		$account_class=$pdo->query($query_account);
		if(is_bool($account_class)){
			continue;
			}
		$account_class->setFetchMode(PDO::FETCH_ASSOC);
		$account_query_data=$account_class->fetchall();//var_dump($account_query_data);die;
		foreach($account_query_data as $kd=>$vd)
		{
		$account_arr[]="( '{$vd["account"]}','{$vd["date"]}','{$vd["sdk"]}' )";
		}
	$account_str = implode(",",$account_arr);
	//var_dump($account_str);die;
	$query_insert="replace into fightwar_admin.new_account (`account`,`creationdate`,`sdk`) values $account_str";
	
	$local_db->exec($query_insert);
	
	$local_db=null;
	$pdo = $query_class= null;
	$script_stamp=time();
	
	print " in ".($script_stamp-$script_start_stamp)." sec \n";

}
//判断是否为时间格式的字符串
function isDateTime($dateTime){
    $ret = strtotime($dateTime);
    return $ret !== FALSE && $ret != -1;
}