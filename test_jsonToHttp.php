<?php
$json='{"order_sn":"2017041416463654610","total_fee":"6","attach":"","product_id":"com.holagames.yxgsd.ios.d60","player_id":"\u6e38\u620f\u89d2\u8272id","game_id":"11004","channel_id":"1002","server_id":"http:\/\/123.207.146.159\/iossdk\/iospay.php","is_test":"2","pay_result":"success","sign_type":"md5","sign":"94a36e583aed7aaf1c7c5c9008c85b89"}';
$arr=json_decode($json,1);
$http=http_build_query($arr);
//$http=urldecode($http);
echo $http;
echo "\n";
echo md5("channel_id=1002game_id=11004is_test=2order_sn=2017041416463654610pay_result=successplayer_id=\u6e38\u620f\u89d2\u8272idproduct_id=com.holagames.yxgsd.ios.d60server_id=http://123.207.146.159/iossdk/iospay.phpserver_secret=8deee906ba8d70687d6de453d52f9e3asign_type=md5total_fee=6");
//94a36e583aed7aaf1c7c5c9008c85b89
