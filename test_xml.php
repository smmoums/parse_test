<?php
header('Content-Type:text/xml; charset=utf-8');
	$url="http://passport.lenovo.com/interserver/authen/1.2/getaccountid?lpsust=ZAgAAAAAAAGE9MTAwMDM1NTA4MDMmYj0yJmM9NCZkPTExJmU9RTZGM0EzMTY5RjAwQTM2QzE4MzNERDM4QzhCQkU0QzkxJmg9MTM3MjkxMDg2NDI3NSZpPTQzMjAwJm89MDAwMDAwMDAwMDAwMDAwJnA9aW1laSZxPTExMTExMSZ1c2VybmFtZT0xMzgxMDUzNTg4N6z979s5fL06DibrT5d7D6s=&realm=appstore.lps.lenovo.com";
	$response=file_get_contents($url);
	$xmlResult = simplexml_load_string($response);
foreach($xmlResult->children() as $childItem) {   

 //输出xml节点名称和值    


echo $childItem->getName() . "->".$childItem."<br />";    
}