<?php
/*
	LVT 单日注册玩家x天内充值记录
*/
//ob_start();

date_default_timezone_set('Asia/Shanghai');
$start_date="2016-12-24";
$end_date=date("Y-m-d",strtotime("$start_date+1day"));
print "start_date : ";
print $start_date;
print "\n";
print "end_date : ";
print $end_date;
print "\n";

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
					'database'  => 'fightwar_log_0004',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
				],
		];
$server_group=[
	
		'androids1' =>[
					'host'      => '123.207.146.159',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
/*				
		'androids2' =>[
					'host'      => '123.207.141.241',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids3' =>[
					'host'      => '123.206.44.246',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids4' =>[
					'host'      => '123.207.167.15',
					'database'  => 'fightwar_log_0004',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0004","log"=>"fightwar_log_0004",
				],
		'androids5' =>[
					'host'      => '123.206.78.130',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids6' =>[
					'host'      => '123.207.156.70',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids7' =>[
					'host'      => '123.207.167.166',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids8' =>[
					'host'      => '123.207.159.121',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids9' =>[
					'host'      => '123.207.159.95',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids10' =>[
					'host'      => '123.207.157.20',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids11' =>[
					'host'      => '123.206.50.89',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids12' =>[
					'host'      => '123.207.159.136',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
 				],
		'androids13' =>[
 					'host'      => '123.207.166.207',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
 				],
		'androids14' =>[ 
					'host'      => '123.206.76.74',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
 				],
		'androids15' =>[ 
					'host'      => '123.207.170.225',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
 				],
		'androids16' =>[ 
					'host'      => '139.199.22.141',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
 				],

		'androids17' =>[ 
					'host'      => '123.206.26.202',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
 				],
				
		'androids18' =>[ 
					'host'      => '123.207.143.202',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
 				],
		'androids19' =>[ 
					'host'      => '123.206.66.235',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
 					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
 				],
		'androids20' =>[
					'host'      => '123.206.23.211',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids21' =>[
					'host'      => '123.206.25.137',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids22' =>[
					'host'      => '123.206.13.159',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids23' =>[
					'host'      => '123.207.142.179',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids24' =>[
					'host'      => '123.206.50.118',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'port'    => '10529',"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids25' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.58.143',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids26' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.165.53',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids27' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.87.130',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids28' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.164.151',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids29' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.167.62',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids30' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.95.143',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids31' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.161.218',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
*/		'androids32' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.75.212',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids33' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.74.39',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids34' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.91.167',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids35' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.153.136',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids36' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.145.248',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids37' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.14.195',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids38' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.20.198',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids39' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.172.183',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids40' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.13.47',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
				
		'androids41' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.18.170',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids42' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.88.104',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids43' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.34.135',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids44' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.169.44',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids45' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.23.182',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids46' =>[
					'driver'    => 'mysql',
					'host'      => '139.199.98.163',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids47' =>[
					'driver'    => 'mysql',
					'host'      => '139.199.99.96',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids48' =>[
					'driver'    => 'mysql',
					'host'      => '139.199.97.115',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids49' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.15.229',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids50' =>[
					'driver'    => 'mysql',
					'host'      => '139.199.97.62',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids51' =>[
					'driver'    => 'mysql',
					'host'      => '118.89.228.196',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids52' =>[
					'driver'    => 'mysql',
					'host'      => '118.89.234.248',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids53' =>[
					'driver'    => 'mysql',
					'host'      => '118.89.233.119',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids54' =>[
					'driver'    => 'mysql',
					'host'      => '118.89.233.209',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids55' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.78.130',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids56' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.156.70',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids57' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.167.166',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids58' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.159.121',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids59' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.159.95',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids60' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.157.20',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids61' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.50.89',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids62' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.159.136',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids63' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.166.207',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids64' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.76.74',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids65' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.170.225',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids66' =>[
					'driver'    => 'mysql',
					'host'      => '139.199.22.141',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids67' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.26.202',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids68' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.143.202',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids69' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.66.235',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids70' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.23.211',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids71' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.25.137',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids72' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.13.159',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids73' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.142.179',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids74' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.50.118',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids75' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.58.143',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids76' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.165.53',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids77' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.87.130',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids78' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.164.151',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids79' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.167.62',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids80' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.95.143',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids81' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.161.218',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids82' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.75.212',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids83' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.74.39',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids84' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.91.167',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids85' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.153.136',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids86' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.145.248',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids87' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.14.195',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids88' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.20.198',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids89' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.172.183',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids90' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.13.47',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids91' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.18.170',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids92' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.88.104',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids93' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.34.135',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids94' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.169.44',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids95' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.23.182',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids96' =>[
					'driver'    => 'mysql',
					'host'      => '139.199.98.163',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids97' =>[
					'driver'    => 'mysql',
					'host'      => '139.199.99.96',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids98' =>[
					'driver'    => 'mysql',
					'host'      => '139.199.97.115',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids99' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.15.229',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids100' =>[
					'driver'    => 'mysql',
					'host'      => '139.199.97.62',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids101' =>[
					'driver'    => 'mysql',
					'host'      => '118.89.228.196',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids102' =>[
					'driver'    => 'mysql',
					'host'      => '118.89.234.248',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids103' =>[
					'driver'    => 'mysql',
					'host'      => '118.89.233.119',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids104' =>[
					'driver'    => 'mysql',
					'host'      => '118.89.233.209',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login_0002","main"=>"fightwar_main_0002","log"=>"fightwar_log_0002",
				],
		'androids106' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.78.130',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids107' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.156.70',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids108' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.167.166',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids109' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.159.121',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids105' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.159.95',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids110' =>[
			'driver'    => 'mysql',
			'host'      => '123.207.157.20',
			'database'  => 'fightwar_log_0001',
			'username'  => 'root',
			'password'  => 'yuzuki',
			'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
            'port'    => '10529',
            "account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
		],
		'androids111' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.50.89',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids112' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.159.136',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids113' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.166.207',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids114' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.76.74',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids115' =>[
					'driver'    => 'mysql',
					'host'      => '139.199.22.141',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids116' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.26.202',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids117' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.143.202',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids118' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.66.235',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids119' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.23.211',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids120' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.13.159',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids121' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.142.179',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids122' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.58.143',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids123' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.165.53',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids124' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.87.130',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids125' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.164.151',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids126' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.167.62',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'androids127' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.161.218',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],

		'merges1' =>[
					'driver'    => 'mysql',
					'host'      => '118.89.218.124',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'merges2' =>[
					'driver'    => 'mysql',
					'host'      => '123.207.141.241',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'merges3' =>[
			'driver'    => 'mysql',
			'host'      => '123.206.44.246',
			'database'  => 'fightwar_main_0001',
			'username'  => 'root',
			'password'  => 'yuzuki',
			'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
			'port'    => '10529',
            "account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
		],
				'merges4' =>[
			'driver'    => 'mysql',
			'host'      => '123.207.170.225',
			'database'  => 'fightwar_main_0001',
			'username'  => 'root',
			'password'  => 'yuzuki',
			'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
			'port'    => '10529',
            "account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
		],
		'merges5' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.25.137',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],
		'merges6' =>[
					'driver'    => 'mysql',
					'host'      => '123.206.50.118',
					'database'  => 'fightwar_log_0001',
					'username'  => 'root',
					'password'  => 'yuzuki',
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => '',
					'port'    => '10529',
					"account"=>"fightwar_login","main"=>"fightwar_main_0001","log"=>"fightwar_log_0001",
				],


	];
	$script_start_stamp=time();
//$account_str ="'HUAWEI_350086000004331081','HUAWEI_350086000115709190','HUAWEI_70086000023977749','HUAWEI_70086000034411081','HUAWEI_70086000144410580','HUAWEI_70086000145622337','HUAWEI_70086000147727928','QIHOO360_1232721974','QIHOO360_1364750394','QIHOO360_2604019452','QIHOO360_2730709934','QIHOO360_2760131823','QIHOO360_2783243231','QIHOO360_398642795','QIHOO360_562816414','QIHOO360_86015949','UC_0aa35406d20e5a194e096bd6641bc418','UC_1c6467d546a1484ec8bd297adcc62b85','UC_2234ba37acfd093497848d318fb100ae','UC_3989fc345f024734b12dd9c428017e5b','UC_54c8a5cfd9ffd218493d078d98d2e8af','UC_7570549b83dbe5aebd4ec096b8ecd041','UC_84314b648cb4836d0c1bc1871cd42548','UC_946b4da2f7f85323f5e71a7d9378e980','UC_a229638e411a51c9301d8b2755efff8a','UC_a238d609d97b086b2ff8fdc8a267217d','UC_b30958635326b78decb5edf9c3566a80','UC_ba1b3952304f6e5e37ff738afbe0d4f4','UC_be8ae21e5da17da9e1ead697b7483db8','UC_d069e89a1d87191a501d252ebfb7720b','UC_d180b685e162f9090a565affae836ad6','UC_dd31bd17969590c486b5a56999c76a75','UC_ef11b412a49c07fe769bbb9826617c70','UC_f2088cf4b443c8f15b6f2ec9637f086a','UC_f336d5c99ef928325c46ce14b4dba147','UC_fcd28c0e90a549fdabaac2e0d9bae92e','XIAOMI_104330548','XIAOMI_133474880','XIAOMI_140290524','XIAOMI_152735526','XIAOMI_159219203','XIAOMI_171510394','XIAOMI_25697850','XIAOMI_28546011','XIAOMI_29781709','XIAOMI_57685049','XIAOMI_59949278','XIAOMI_68578367','XIAOMI_71677362','XIAOMI_73523237','XIAOMI_74941839','XIAOMI_75014663','XIAOMI_75240184','XIAOMI_88014052','XIAOMI_98021170'"; 
	$legion_count=["alliance"=>0,"tribe"=>0];
	$dau_all=0;
	$date = "2017-03-10";
	$payer = new PDO("mysql:host=123.207.146.159;port=10529;dbname=fightwar_log_0001","root","yuzuki",array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")) or die("fail to login $k");
	
	
	foreach ($server_group as $k=>$v)
	{
		echo "serverID : $k ,";
		echo "\n";
		//$$k=array();
		file_put_contents("vip.csv","serverID : $k \n",
					FILE_APPEND) ;
				$pdo = new PDO("mysql:host={$v["host"]};port={$v["port"]};dbname={$v["database"]}","root","yuzuki",array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")) or die("fail to login $k");
			//$pdo -> exec('set names utf-8');
	$query_dau = "SELECT
							guid,name,vip,FROM_UNIXTIME(logouttime) as date
						FROM
							{$v["main"]}.Player_Character 
						WHERE
							vip > 8
						AND guid IN (
							SELECT
								guid
							FROM
							{$v["log"]}.Log_Record_3
							where
								creationdate > '$date'
							ORDER BY
							Guid	
						)
						
				";
			$dau_class=$pdo->query($query_dau);
			if(is_bool($dau_class)){
				continue;
				}
			$dau_class->setFetchMode(PDO::FETCH_ASSOC);
			$dau_query_data=$dau_class->fetchall();//var_dump($dau_query_data);die;
			foreach($dau_query_data as $kd=>$vd)
			{
				file_put_contents("vip.csv",
					"guid:{$vd["guid"]},name:{$vd["name"]},vip:{$vd["vip"]},date:{$vd["date"]}\n",
					FILE_APPEND) ;
			}
	
		$pdo = $query_class= null;
		$script_stamp=time();
	}

	function legion ()
	{
				$query_PS = "
									SELECT
						aa.NationType as type,count(aa.NationType) as nm
					FROM
						(
							SELECT
								LegionID,
								`Name`,
								NationType
							FROM
								fightwar_main_0001.Player_Legion
						) AS aa
					JOIN (
						SELECT
							guid,
							LegionID
						FROM
							fightwar_main_0001.Player_LegionMember
						WHERE
							Guid IN (
								SELECT
									guid
								FROM
									fightwar_log_0001.Log_Record_3
								WHERE
									creationdate > '2017-01-07 00:00:00'
								GROUP BY
									guid
							)
					) AS bb ON aa.LegionID = bb.LegionID
					GROUP BY aa.NationType
					ORDER BY type 
				";
			$PS_class=$pdo->query($query_PS);
			if(!is_bool($PS_class)){
				$PS_class->setFetchMode(PDO::FETCH_ASSOC);
				$PS_data = $PS_class ->fetchall();
				//var_dump($PS_data);
				if( !$PS_data[0]["nm"] ) { $PS_data[0]["nm"]=0; }
				if( !$PS_data[1]["nm"] ) { $PS_data[1]["nm"]=0; }
				print $PS_data[0]["nm"].",".$PS_data[1]["nm"];
				print "\n";
				$legion_count["alliance"]+=$PS_data[0]["nm"];
				$legion_count["tribe"]+=$PS_data[1]["nm"];
				
				}
				/////// 函数外   var_dump($legion_count);
			
	}
	
	function account_in_month($k,$v)  ///月活跃人数
	{
		$pdo = new PDO("mysql:host={$v["host"]};port={$v["port"]};dbname={$v["database"]}","root","yuzuki",array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")) or die("fail to login $k");
		$query_PS = "
					SELECT
						Account
					FROM
						{$v["account"]}.Global_Account
					WHERE
						AccountID IN (
							SELECT
								AccountID
							FROM
							{$v["main"]}.Player_Character
							WHERE
								Guid IN (
									SELECT
										guid
									FROM
										{$v["log"]}.Log_Record_3
									WHERE
										creationdate between '2017-01-01 00:00:00' and '2017-01-31 23:59:59'
									GROUP BY
										Guid
								)
						)
				";
			$PS_class=$pdo->query($query_PS);
			if(!is_bool($PS_class)){
				$PS_class->setFetchMode(PDO::FETCH_ASSOC);
				$PS_data = $PS_class ->fetchall();
				//var_dump($PS_data);die;
				foreach($PS_data as $kd=>$vd)
					{
						//var_dump($vd["Account"]);
						//$$k[ "{$vd["Account"]}" ]="";
						//var_dump($$k);die;
						array_push($$k,$vd["Account"]) ;
					}
				$$k = array_flip($$k);	
				print sizeof($$k);
				print "\n";
				}
			else { print "empty"; }
			print "\n";
	/*
		循环外部，总人数
	$account_all = array ();
	foreach( $server_group as $k => $v )
	{
		$account_all += $$k;
	}
	$account_all_num = sizeof ( $account_all );
	echo " 总计 ： ".$account_all_num;
		
	*/
		
	}
	
	function role ()  //有某个英雄的玩家信息
	{
				$query_PS = "SELECT
						aa.Guid,
						aa.`Name`,
						aa.`Level`,
						aa.Vip,
						bb.`Level`
					FROM
						fightwar_main_0001.Player_Character AS aa
					JOIN (
						SELECT
							guid,
							`Level`
						FROM
							fightwar_main_0001.Player_Role
						WHERE
							Guid > 10000
						AND RoleID = 60034
					) AS bb ON aa.Guid = bb.guid					
				";
			$PS_class=$pdo->query($query_PS);
			if(!is_bool($PS_class)){
				$PS_class->setFetchMode(PDO::FETCH_ASSOC);
				$PS_data = $PS_class ->fetchall();
				foreach($PS_data as $k=>$v)
					{
						print "{$v['Guid']} ,{$v['Name']}, {$v['Level']}, {$v['Vip']} ";
						print "\n";
					}
				}
			else { print 0; }
			print "\n";

	}
	function aa ()  //付费非付费玩家 单连抽
	{
				$payer_pdo=new PDO("mysql:host=123.207.146.159;port=10529;dbname=fightwar_login","root","yuzuki",array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")) or die("fail to login $k");
		$payer_arr=array();
		$payer_str="";
		
		$query_payer = "select guid from fightwar_exchange.pay_orders where server_id = '$k' group by guid";
		$payer_class = $payer_pdo->query($query_payer);
		if(is_bool($payer_class))
		{
			continue;
		}
		$payer_class->setFetchMode(PDO::FETCH_ASSOC);
		$payer_data = $payer_class->fetchall();
		foreach($payer_data as $pk => $pv)
		{
			$payer_arr[] = $pv["guid"];
		}
		$payer_str = implode( ",",$payer_arr );
		//数据统计
		$pdo = new PDO("mysql:host={$v["host"]};port={$v["port"]};dbname={$v["database"]}","root","yuzuki",array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")) or die("fail to login $k");
			//$pdo -> exec('set names utf-8');
		print "付费玩家单抽";
		$query_PS = "SELECT
							count(model) as ct
						FROM
							fightwar_log_0001.Log_Record_2
						WHERE
							model = 5201 and param1=90002
							and
							creationdate between '$start_date' and '$end_date'
						AND guid IN ($payer_str)						
				";
			$PS_class=$pdo->query($query_PS);
			if(!is_bool($PS_class)){
				$payer_class->setFetchMode(PDO::FETCH_ASSOC);
				$PS_data = $PS_class ->fetchall();
				print $PS_data[0]["ct"];
				}
			else { print 0; }
			print "\n";
			
		print "付费玩家连抽";
		$query_PS = "SELECT
							count(model) as ct
						FROM
							fightwar_log_0001.Log_Record_2
						WHERE
							model = 5202 and param1=90002
							and
							creationdate between '$start_date' and '$end_date'
						AND guid IN ($payer_str)						
				";
			$PS_class=$pdo->query($query_PS);
			if(!is_bool($PS_class)){
				$payer_class->setFetchMode(PDO::FETCH_ASSOC);
				$PS_data = $PS_class ->fetchall();
				print $PS_data[0]["ct"];
				}
			else { print 0; }
			print "\n";
			
		print "免费玩家单抽";
		$query_PS = "SELECT
							count(model) as ct
						FROM
							fightwar_log_0001.Log_Record_2
						WHERE
							model = 5201 and param1=90002
							and
							creationdate between '$start_date' and '$end_date'
						AND guid not IN ($payer_str)						
				";
			$PS_class=$pdo->query($query_PS);
			if(!is_bool($PS_class)){
				$payer_class->setFetchMode(PDO::FETCH_ASSOC);
				$PS_data = $PS_class ->fetchall();
				print $PS_data[0]["ct"];
				}
			else { print 0; }
			print "\n";
		
		print "免费玩家连抽";
		$query_PS = "SELECT
							count(model) as ct
						FROM
							fightwar_log_0001.Log_Record_2
						WHERE
							model = 5202 and param1=90002
							and
							creationdate between '$start_date' and '$end_date'
						AND guid not IN ($payer_str)						
				";
			$PS_class=$pdo->query($query_PS);
			if(!is_bool($PS_class)){
				$payer_class->setFetchMode(PDO::FETCH_ASSOC);
				$PS_data = $PS_class ->fetchall();
				print $PS_data[0]["ct"];
				}
			else { print 0; }
			print "\n";
			
	
		$payer_pdo=$pdo = $query_class= null;
		$script_stamp=time();

	}
	
	function vip9 ($k,$v,$date)
	{
		file_put_contents("vip.csv","serverID : $k \n",
					FILE_APPEND) ;
				$pdo = new PDO("mysql:host={$v["host"]};port={$v["port"]};dbname={$v["database"]}","root","yuzuki",array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8")) or die("fail to login $k");
			//$pdo -> exec('set names utf-8');
	$query_dau = "SELECT
							guid,name,vip,FROM_UNIXTIME(logouttime) as date
						FROM
							{$v["main"]}.Player_Character 
						WHERE
							vip > 8
						AND guid IN (
							SELECT
								guid
							FROM
							{$v["log"]}.Log_Record_3
							where
								creationdate > '$date'
							ORDER BY
							Guid	
						)
						
				";
			$dau_class=$pdo->query($query_dau);
			if(is_bool($dau_class)){
				continue;
				}
			$dau_class->setFetchMode(PDO::FETCH_ASSOC);
			$dau_query_data=$dau_class->fetchall();//var_dump($dau_query_data);die;
			foreach($dau_query_data as $kd=>$vd)
			{
				file_put_contents("vip.csv",
					"guid:{$vd["guid"]},name:{$vd["name"]},vip:{$vd["vip"]}\n",
					FILE_APPEND) ;
			}
	
		$pdo = $query_class= null;
		$script_stamp=time();
		//print " in ".($script_stamp-$script_start_stamp)." sec \n";		
	}
	
	function vip9_role ($v)
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
							{$v["main"]}.Player_Character AS ct
						RIGHT JOIN {$v["main"]}.Player_Role AS role ON ct.guid = role.guid
						WHERE
							vip > 8
						AND ct.guid IN (
							SELECT
								guid
							FROM
								{$v["log"]}.Log_Record_3
							where
								creationdate > '2017-01-30'
						)
						ORDER BY
							Guid
				";
			$dau_class=$pdo->query($query_dau);
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