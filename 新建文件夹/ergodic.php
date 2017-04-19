<?php
//ob_start();
$log_path = "/root/logs/crontab/遍历查询.log";
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


date_default_timezone_set('Asia/Shanghai');
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
$bag_data_str = "";

$today = date("Y-m-d");
print $today."\n";
$start_stamp = strtotime("$today-1day");
$start_date = date("Y-m-d H:i:s",$start_stamp);
$end_stamp = strtotime($today) ;
$end_date = date("Y-m-d H:i:s",$end_stamp);
$script_start_stamp=time();

	foreach ($server_group as $k=>$v)
	{
		echo "serverID : $k ";
		file_put_contents("vip_role.csv","serverID : $k \n",FILE_APPEND) ;
		$pdo = new PDO("mysql:host={$v["host"]};port={$v["port"]};dbname={$v["database"]}","root","yuzuki",array(PDO::ATTR_PERSISTENT => true,PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")) or die("fail to login $k");
			//$pdo -> exec('set names utf-8');
		
			$query_bag= "SELECT
							bag.guid,
							bag.General
						FROM
							fightwar_main_0001.Player_Character AS ct
						JOIN fightwar_main_0001.Player_Bag AS bag ON ct.Guid = bag.Guid
						WHERE
							ct.Vip > 5
				";
			$bag_class=$pdo->query($query_bag);
			if(is_bool($bag_class)){
				continue;
				}
			$bag_class->setFetchMode(PDO::FETCH_ASSOC);
			$bag_query_data=$bag_class->fetchall();//var_dump($dau_query_data);die;
			foreach($bag_query_data as $kd=>$vd)
			{
				$bags_arr = json_decode( $vd["General"],1 );
				//var_dump($bags_arr);die;
				foreach( $bags_arr as $id)
				{					
					if($id["id"] == "85207")
					{
					$bag_data_str .="$k ,{$vd["guid"]}, 85207,{$id["num"]} \n";
					}
					if($id["id"] == "85208")
					{
					$bag_data_str .="$k ,{$vd["guid"]}, 85208,{$id["num"]} \n";
					}
				}
			}
	
		$pdo = $query_class= null;
		$script_stamp=time();
		
		print " in ".($script_stamp-$script_start_stamp)." sec \n";
	}
	print $bag_data_str;
function vip9 ()
{
	$query_dau = "SELECT
							ct.guid,
							ct. NAME,
							ct.vip,
							role.ruid,
							role.NAME as uname,
							role.level,
							role.color,
							role.star,
							role.washcount,
							role.skilllevel
						FROM
							fightwar_main_0001.Player_Character AS ct
						RIGHT JOIN fightwar_main_0001.Player_Role AS role ON ct.guid = role.guid
						WHERE
							vip > 8
						AND ct.guid IN (
							SELECT
								guid
							FROM
								fightwar_log_0001.Log_Record_3
							where
								creationdate > '2016-12-02'
						)
						ORDER BY
							Guid
				";
if(is_bool($dau_class)){
				continue;
				}
			$dau_class->setFetchMode(PDO::FETCH_ASSOC);
			$dau_query_data=$dau_class->fetchall();//var_dump($dau_query_data);die;
			foreach($dau_query_data as $kd=>$vd)
			{
				file_put_contents("vip_role.csv",
					"guid:{$vd["guid"]},name:{$vd["NAME"]},vip:{$vd["vip"]},hero:{$vd["uname"]},level:{$vd["level"]},品质:{$vd["color"]},星级:{$vd["star"]},技能:{$vd["skilllevel"]},养成次数:{$vd["washcount"]},\n",
					FILE_APPEND) ;
			}
	
		$pdo = $query_class= null;
		$script_stamp=time();
		print " in ".($script_stamp-$script_start_stamp)." sec \n";				
}
//{"id":81073,"num":3},{"id":70023,"num":15},{"id":31006,"num":3},{"id":85206,"num":13},{"id":81190,"num":1},{"id":82030,"num":2},{"id":89001,"num":7},{"id":81140,"num":1},{"id":81195,"num":1},{"id":82072,"num":1},{"id":81130,"num":1},{"id":81142,"num":2},{"id":82081,"num":1},{"id":81083,"num":3},{"id":83080,"num":2},{"id":81191,"num":1},{"id":81192,"num":1},{"id":51070,"num":1},{"id":20001,"num":1},{"id":83042,"num":1},{"id":81081,"num":2},{"id":89011,"num":1},{"id":81193,"num":1}]