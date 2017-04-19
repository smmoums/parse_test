<?php
	/*
	$query_info=["a"=>"a","b"=>"b"];
	$context = stream_context_create(array(		     //传入数组类型的$option参数
    'http' => array(			      //以HTTP请求为键的设置数组
	'method'  => 'POST',			 //设置请求方法为POST
	'header'  => "Content-type: application/x-www-form-urlencoded",//通过设置头文件来设置POST数据格式
	'content' => http_build_query($query_info),	   //用http_build_query()方法将数组拼合成数据字符串
	'timeout' => 20			      //设置请求的超时时间。
		) 
	));
		
				$res=file_get_contents('http://139.196.14.52/opposdk/pay.php',null,$context);
				//$res=file_get_contents('http://139.129.21.196/pay.php',null,$context);
				print $res;
		
	$post_data='{"result":"0","userName":"890086000001006890","productName":"60\u94bb\u77f3","payType":"4","amount":"6.00","orderId":"A20160919135419081B1EFED91","notifyTime":"1474265794538","requestId":"147426446609910191","sign":"EeRXzztj4ojDBCa97S5rOt8TTaUFjrLkLhWWSnv8CQyQ3kVaMg+GAUVn+gwX5yk9FGFTXqyeTZy2ezs7fJB7XFv3+k+t5H4Z\/SGNt84lxVFI9oK3qpGdgq\/3WgBggUYfmZk+4QElgFacfG\/t6HNWJCKoz9SpNqF6CfQnWIGb6jfZkFxEOeIHtjiMOvES8FzTvyd4JF0+Sx5dnq8ob51TX6m8o5oZmNx6fB4MoS0hI6Z0Nw+x66TWFYttUJ1HIwRvWYVWS902Rw6gMtdtfmxHy0WqnuvzQTP01xDwrEJ9fdHm6Q5sSvzR5DkcxJ8k9aWTZOaxQEi2mJ0pImDXpNPUEw=="}';
    $post_data_arr=json_decode($post_data,1);
	//ksort($post_data_arr);
	$post_query=http_build_query( $post_data_arr );	
	var_dump( $post_query );
	*/
	//////curl/////
	$endpoint = 'https://sms.aliyuncs.com/%20?Format=XML%20&Version=2016-09-27%20&Signature=Pc5WB8gokVn0xfeu%2FZV%2BiNM1dgI%3D%20&SignatureMethod=HMAC-SHA1%20&SignatureNonce=e1b44502-6d13-4433-9493-69eeb068e955%20&SignatureVersion=1.0%20&AccessKeyId=key-test%20&Timestamp=2015-11-23T12:00:00Z';
	//"authtoken":"MDNhNmVmN2U3YzAyYmQ2ZDVjMjYuMTE4NjU1NjkzLjE0NzY3NjM4NTUxOTM=
	$receipt="MDNhNmVmN2U3YzAyYmQ2ZDVjMjYuMTE4NjU1NjkzLjE0NzY3NjM4NTUxOTM";
	$headers = array(
	"Content-type:application/json",
	"sid:1234sbv",
	"sign:2345"
);
	//$receipt=urldecode( $receipt );
	//echo $receipt;die;
	$postData = json_encode(   
            array('sid' => $receipt)   
        );   
	$ch = curl_init($endpoint);     
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);     
        curl_setopt($ch, CURLOPT_POST, true);     
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);     
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
       curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);  //这两行一定要加，不加会报SSL 错误  
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);   
  
  
        $response = curl_exec($ch);     
        $errno    = curl_errno($ch);     
        $errmsg   = curl_error($ch);     
        curl_close($ch);
		var_dump ( $response );

	