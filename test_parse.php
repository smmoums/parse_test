<?php
$cookie="sst1game940c6f01734e47999c48c43f3f60d396123722=";
$code=substr($cookie,0,-10);
$time=substr($cookie,10,-1);
/*
$con = mysql_connect("123.207.170.225:10529","root","yuzuki");
if (!$con)
{
	die("connection error");
}
mysql_select_db("fightwar_log_0001",$con);
$result = mysql_query("SELECT
					count(DISTINCT(guid)) AS cn
				FROM
					fightwar_log_0001.Log_Record_3
				WHERE
					creationdate BETWEEN '2016-12-01'
				AND '2016-12-02'
				AND ServerID = 'uc'");
while($row = mysql_fetch_array($result))
{
	var_dump($row);
}
/////////////////////////////////////////////////////
$pdo = new PDO("mysql:host=123.207.170.225;port=10529;dbname=fightwar_login","root","yuzuki",array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"));
$query = $pdo->query("SELECT
					count(DISTINCT(guid)) AS cn
				FROM
					fightwar_log_0001.Log_Record_3
				WHERE
					creationdate BETWEEN '2016-12-01'
				AND '2016-12-02'
				AND ServerID = 'uc'");
$result = $query->fetchall();
var_dump($result);
$pdo = null;
//////////////////////////////////////////////////////////
$messy_check = preg_match("/^[0-9a-zA-Z]{3,100}$/",$cookie);
$a ='{"paramap":"{\"roleName\":\"1\",\"amount\":\"1.00\",\"roleId\":\"10001\",\"signType\":\"MD5\",\"serverId\":\"60\",\"accountId\":\"43ea7fad0a7965fe0dbdf4aec57d1d1d\",\"grade\":\"1\",\"callbackInfo\":\"10001-60-1-1\",\"cpOrderId\":\"14815630\",\"notifyUrl\":\"http:\\\/\\\/123.207.146.159\\\/ucsdk\\\/pay.php\"}"}';
$b=json_decode($a,1);
$c=["a"=>1,"b"=>2,"c"=>3];
var_dump(json_encode($c));
var_dump($b);die;
//// timestamp convert /////
$a="1477446791";
$date = date("Y-m-d H:i:s",$a);
print $date;

///////// array combine 		////////
$a = [1,1,1,1,1];
$b = ["'QQWX_o2bwHwV6oPVH5YpMWmho8DbXj5yU'"=>4,"QQWX_o2bwHwV6oPVH5YpMWmho8DbXj5yU"=>5,"''''AAAAAAAAAAAAAAAAAAAAAAAAA@_{('"=>6,7,8];
$c = $a + $b ;
var_dump ($c);
//////////////////////chop///////////////////

if(1)
$str = "11,11,234,,,";
$final = chop($str,",");
//echo $final;
$a="a|b|c|d";
$b = preg_replace( "/a\|/","",$a );
for($i=0,$j=0;$i<5,$j<10;$i++,$j++)
{
	print "i : $i ";
	print "j : $j ";
	print "\n";
}
print date("Y-m-d\TH:i:s\Z");

$z='102';
print $z[2];
print "\n";*/
/*
print urldecode("%2F");
print "\n";
print strrev($z);
$curl = curl_init();

//var_dump($GLOBALS);
print json_encode( $GLOBALS );
print json_encode( [1=>1,2=>2,3=>3] );

$a='alblcldl';
$c=explode("l",$a,2);


$x="_input_charset=utf-8&body=diamond&it_b_pay=30m";
parse_str($x,$y);
$a = 10;
$c = $a++;
echo $a;
echo "\n";
echo $c;
$a = 10;
$c = ++$a;
echo $a;
echo "\n";
echo json_encode( "abc" );*/
$i=81;
while($i < 1000000)
{
	if(test($i))
	{
		echo $i;
		die;
	}
	else
	{
		$i++;
	}
}
function test($i)
{
	if(fmod($i,8)!=1 )	{ return 0;	}
	if(fmod($i,5)!=0 )	{ return 0;	}
	if(fmod($i,6)!=3 )	{ return 0;	}
	if(fmod($i,7)!=0 )	{ return 0;	}
	if(fmod($i,9)!=0 )	{ return 0;	}
	return 1;
}