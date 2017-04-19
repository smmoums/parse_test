<?php 
$t=time(); 
set_time_limit(1000); 
$myFile="e:/insert.sql"; 
$fhandler=fopen($myFile,'wb');

$categ_id = 1;
if($fhandler)
{

	$i=0; 
	while($i<1000000)//1,000,000 
	{
	$categ_id  +=1;
	$categ_fid = rand(0,10) ;
	$SortPath;
	$address; 
	$p_identifier;
	$pro_specification;
	$name  = getname() ;
	$description = strrev(rand(10000000,99999999)); 
	$add_date;
	$picture_url;
	$thumb_url; 
	$shop_url; 
	$shop_thumb_url; 
	$brand_id; 
	$unit; 
	$square_meters_unit;
	$market_price;
	$true_price;
	$square_meters_price;
	$sql="$categ_id\t$categ_fid\t'0,262,268,'\t0\t '2342'\t'423423'\t$name\t$description\t'2012-01-09 09:55:43'\t'upload/product/20111205153432_53211.jpg'\t'upload/product/thumb_20111205153432_53211.jpg'\tNULL\tNULL\t38\t'件'\t''\t123\t123\t0"; 
 
	$i++; 
	fwrite($fhandler,$sql."\r\n"); 
	} 
	echo"写入成功,耗时：",time()-$t; 
} 
function getname()
{
	$al = "qwertyuiopasdfghjklzxcvbnm";
	$num = rand(0,25);
	return substr($al,$num,1);
}
/*

mysql:

create TABLE tenmillion
	(`categ_id` int(11) not null,
	`categ_fid` int(11) not null,
	`SortPath`  char(11) default "",
	`address`   char(11) default "", 
	`p_identifier` char(11) default "",
	`pro_specification` char(11) default "",
	`name` char(11) default "",
	`description` int(11) default 0, 
	`add_date` datetime,
	`picture_url` varchar(50) default "",
	`thumb_url` varchar(50) default "", 
	`shop_url` varchar(50) default "", 
	`shop_thumb_url` varchar(50) default "", 
	`brand_id` varchar(50) default "", 
	`unit` varchar(50) default "", 
	`square_meters_unit` varchar(50) default "",
	`market_price` varchar(50) default "",
	`true_price` varchar(50) default "",
	`square_meters_price` varchar(50) default "",
	primary key (`categ_id`)) engine = innodb default charset=utf8; 

LOAD DATA local INFILE 'e:/insert.sql' 
	INTO TABLE tenmillion
	(`categ_id`,
	`categ_fid`,
	`SortPath`,
	`address`, 
	`p_identifier`,
	`pro_specification`,
	`name`, `description`, 
	`add_date`, `picture_url`,
	`thumb_url`, 
	`shop_url`, 
	`shop_thumb_url`, 
	`brand_id`, 
	`unit`, 
	`square_meters_unit`,
	`market_price`,
	`true_price`,
	`square_meters_price`); 
	
delimiter $
SET AUTOCOMMIT = 0$$
create procedure test() 
begin 
declare i decimal (10) default 0 ; 
dd:loop 
INSERT INTO `million` (`categ_id`, `categ_fid`, `SortPath`, `address`, `p_identifier`, `pro_specification`, `name`, `add_date`, `picture_url`, `thumb_url`, `is_display_front`, `create_html_time`, `hit`, `buy_sum`, `athor`, `templete _style`, `is_hot`, `is_new`, `is_best`) VALUES 
(268, 2, '0,262,268,', 0, '2342', '423423', '123123', '2012-01-09 09:55:43', 'upload/product/20111205153432_53211.jpg', 'upload/product/thumb_20111205153432_53211.jpg', 1, 0, 0, 0, 'admin', '0', 0, 0, 0); 
commit; 
set i = i+1; 
if i= 1000000 then leave dd; 
end if; 
end loop dd ; 
end;$ 
delimiter ; 
call test; 

*/