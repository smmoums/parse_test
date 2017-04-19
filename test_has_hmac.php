<?php
	$p = "POST&%2F&AccessKeyId%3Dtestid%26Action%3DSingleSendSms%26Format%3DXML%26ParamString%3D%257B%2522name%2522%253A%2522d%2522%252C%2522name1%2522%253A%2522d%2522%257D%26RecNum%3D13098765432%26RegionId%3Dcn-hangzhou%26SignName%3D%25E6%25A0%2587%25E7%25AD%25BE%25E6%25B5%258B%25E8%25AF%2595%26SignatureMethod%3DHMAC-SHA1%26SignatureNonce%3D9e030f6b-03a2-40f0-a6ba-157d44532fd0%26SignatureVersion%3D1.0%26TemplateCode%3DSMS_1650053%26Timestamp%3D2016-10-20T05%253A37%253A52Z%26Version%3D2016-09-27";
	$method= "sha1";
	$key = "testsecret&";
	$result = base64_encode(hash_hmac($method,$p,$key,1));
	
	print percentEncode($result);
	print "\n";
	function percentEncode($str)  
{  
    // 使用urlencode编码后，将"+","*","%7E"做替换即满足ECS API规定的编码规范  
    $res = urlencode($str);  
    $res = preg_replace('/\+/', '%20', $res);  
    $res = preg_replace('/\*/', '%2A', $res);  
    $res = preg_replace('/%7E/', '~', $res);  
    return $res;  
}  