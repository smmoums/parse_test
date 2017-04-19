<?php
$appkey="cad91810aed5c851c6a13b65c86c1afb";
$token="3d7448586194179fc0e74ad81d4d5ec3";
$sign="appid=wx78062e368f7becbb&noncestr=5Gc3OrZBH5KtPSroHDDEw58UcbKojDrO&package=Sign=WXPay&partnerid=1439696602&prepayid=wx201703081957593da76cc5330260066605&timestamp=2348751987&key=PFqfscHL2M60GBPX1OkYroBbk8y3t1Mu";
print $sign;
//cad91810aed5c851c6a13b65c86c1afb3d7448586194179fc0e74ad81d4d5ec33d7448586194179fc0e74ad81d4d5ec3
print "\n";
$sign=md5($sign);
print $sign;
//49c3eabe25f8fbb367f93820b5a38a2d