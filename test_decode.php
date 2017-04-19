<?php
	$source="\u6e38\u620fID\u53c2\u6570\u65e0\u6548\u3002";
	//$source="什么东西";
	//$code=urldecode($source);
	//linux
	//$code=preg_replace("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $source);
	//windows
	$code=preg_replace_callback("#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2LE', 'UTF-8', pack('H4', '\\1'))", $source);
	//$code=unescape($source);
	echo $code;
	
	function to_utf8($str) {

    $str = rawurldecode($str);

    preg_match_all("/(?:%u.{4})|&#x.{4};|&#\d+;|.+/U",$str,$r);

    $ar = $r[0];

    //print_r($ar);

    foreach($ar as $k=>$v) {

        if(substr($v,0,2) == "%u"){

            $ar[$k] = iconv("UCS-2BE","UTF-8",pack("H4",substr($v,-4)));

  }

        elseif(substr($v,0,3) == "&#x"){

            $ar[$k] = iconv("UCS-2BE","UTF-8",pack("H4",substr($v,3,-1)));

  }

        elseif(substr($v,0,2) == "&#") {

             

            $ar[$k] = iconv("UCS-2BE","UTF-8",pack("n",substr($v,2,-1)));

        }

    }

    return join("",$ar);

}