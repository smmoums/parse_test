<?php
/*
 $a="result=0&userName=890086000001006890&productName=\u6708\u5361&payType=4&amount=30.00&orderId=A20160922100141979CA669630&notifyTime=1474509731684&requestId=1474509691111_13289-androids1-7-30&sign=iMQX\/SnlKTEST73SyhXX+bbnJudaRyzMbax8eZLcmewO26yw6CiYb\/8Ri7o78Krh2T\/3geU5D8ZFvGB1Ll9GfjRwTlKbGGfdkOk3vVE7CEJCA2vc1MbecqNtsDLVXrarQK8W\/pf5w32sMmEBIyIZBtDAmZoJMyfc1J6No6CSq1Z1K8ejCEm\/tbIuDZ52JmZcrnlxZuQ01otAxZ7P+rTj9HV6tewhPbgtPytiPSa+QuU1hTUsabJN+6COtgNwdOYOWbLy3Hj4oo2Z9jDH8KZKIUqLSPW6aoRC9FCYsa2d4Rn64TeBGclhFeHzzcmYokKb80xXEP1Oo+2G1H7smnh89Q==";
 $a=urlencode($a);
 echo $a;

 $a="a\/a\/\b/\/";
 $b = str_replace('\\','',$a);
 echo $b;
 */
$public_key="MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEArU8/TECAXV3Nhnt24nBGVGIqNvkwMCk+Fc0m7IMb5hwk2MfykMkZrAbckE8YWchMaoN9uPLVTweqPqAoeXL6omSvtP7x223nlUdsy7dWtZj65sNposbwySAhqIwgNM5DNGGOOjzLsL4zbtXLspe4Yobd5RkjHwNqs7yZMyCF+mdzZXNL10FYFAPZKMOKERYIZz/U5zOkbJkqeKyXZwxRcW5QTvoomxS7x620+mk4ZbIKnRZJ9M/gyAdr6+XnRmIKwatZUFX781UFX/9BGshC7AVhZTTiOijBkXGqqEjGT2Y45Kbd97lfSEArZD55LNR8k7dCIiJgQ16YoqMBwQ/VnwIDAQAB";
$private_key="MIIEvgIBADANBgkqhkiG9w0BAQEFAASCBKgwggSkAgEAAoIBAQCtTz9MQIBdXc2Ge3bicEZUYio2+TAwKT4VzSbsgxvmHCTYx/KQyRmsBtyQTxhZyExqg3248tVPB6o+oCh5cvqiZK+0/vHbbeeVR2zLt1a1mPrmw2mixvDJICGojCA0zkM0YY46PMuwvjNu1cuyl7hiht3lGSMfA2qzvJkzIIX6Z3Nlc0vXQVgUA9kow4oRFghnP9TnM6RsmSp4rJdnDFFxblBO+iibFLvHrbT6aThlsgqdFkn0z+DIB2vr5edGYgrBq1lQVfvzVQVf/0EayELsBWFlNOI6KMGRcaqoSMZPZjjkpt33uV9IQCtkPnks1HyTt0IiImBDXpiiowHBD9WfAgMBAAECggEBAKz3PWYdrb8BAkDoccMWaKqI+ja5ReWbE7JweBtt0mc6yW9tRmJHwg5VHsYLmnLom5NmPhBakpb4QGmWMC7dmNSABnhuRPVJX+o1SZibFrfQwP+UIZZqVB92qQDtMKti++GIR4lJ6cQwX2aLi2tnTodOsKCYENw/7bsKTB+hovU/qEtpJwcLPdoGTSOHCKinh6vhSkf7Oyz5h+PQ+c7l2XnzmKarSXdmnovLB9sBAwNrJcepZ8BPXL10bv6AoXbzqgC+DrnsT3n9O1dVOQWSQ9FvFQ38vi3Q9akk2ckdOhYhqofg256KmUvjvGyenu41KzePeCAtXwLjSKkdI28ULAECgYEA7qZkargoXYbz5YgYJzqtO8dd5b3NbDf0WJjIvKAE4iP/wLFMucm3UVyDQ+DxyE6z92J8wEarrYvrC9QOjHE3IlrQOUYyimLBqcGui7ahKA0IB8Rm+7OW4LeWrNDBZndfzyTf5DmVGfX6CfvILnyyMLcUJ747pDxxzKqMqzV9dgECgYEAuejHdLFDXQNpb45J842k8ZsbkQqzPNvIVegTHPeCNMsl1l4QcJKPrs02RWlq27vN9sl1Vwbm0EBqXvJT05ZvKtfuCxqbtMQjof019o8ygjpff5jeGoY2j1uv5zMniFkTsMcGPR+yNgIRrqpJaoZZJBLbvT5RTIl8SrqQiZMRi58CgYEAv89YsjWlq9ZFvVwvHYiZp4xLudVdf/dRGsxhuslaY2/PpU5bfo/UGT6j+jCX5AjtuI2d+uRSI8BrgCxGLTbpu2EGLqJvCK7rPMeAxKZazNf8dlGy++aSA7dLEUcPyo1zogffM43ceusqtk95y3NJvMHJH1BUm2JBjOAfA5SQbAECgYA/Si703BAJz0qKrs8gOh1oHxzgYNsqIcxu6oXvO5e5L1ufQgCowkxl/vi14rB9Q89Xb7ghu3jCdtt/nVHKW5FW7ZHdd96ASLG0yQYg/Rj92q9+OeWK9BwI6/bTZ8fSlDiu2uKV1n+OAWBRrSk3OauJK15ha6CzxK5qpl7kZwv3EwKBgCrkqiCqXrTSoME0tLfGivOdx09rigeWXcUyIBDqz9iSWCffw+wVZeDGHjU2ptZBYZxYBtQeXVpNXTGoAfJ8dmFAiMLjOD5yp7I/qAs4yErPKvuLdDX3zwtSHVnOnNbfZPj3i3QibD6WDr/dmCL9VM7DW9ccKj+VsKOEf74Jjc2c";
$public_pem = chunk_split($public_key,64,"\n");
$public_pem = "-----BEGIN PUBLIC KEY-----\n".$public_pem."-----END PUBLIC KEY-----\n"; 
//var_dump($public_pem);
$private_pem = chunk_split($private_key,64,"\n");
$private_pem = "-----BEGIN PRIVATE KEY-----\n".$private_pem."-----END PRIVATE KEY-----\n"; 
//var_dump($private_pem);

$data="huawei";
$binary_signature = "";

// At least with PHP 5.2.2 / OpenSSL 0.9.8b (Fedora 7)
// there seems to be no need to call openssl_get_privatekey or similar.
// Just pass the key as defined above
openssl_sign($data, $binary_signature, $private_pem, OPENSSL_ALGO_SHA1);

// Check signature
$ok = openssl_verify($data, $binary_signature, $public_pem, OPENSSL_ALGO_SHA1);
echo "check #1: ";
if ($ok == 1) {
    echo "signature ok (as it should be)\n";
} elseif ($ok == 0) {
    echo "bad (there's something wrong)\n";
} else {
    echo "ugly, error checking signature\n";
}
var_dump( base64_encode($binary_signature)  ) ;
$ok = openssl_verify($data, $binary_signature, $public_key, OPENSSL_ALGO_SHA1);
echo "check #2: ";
if ($ok == 1) {
    echo "ERROR: Data has been tampered, but signature is still valid! Argh!\n";
} elseif ($ok == 0) {
    echo "bad signature (as it should be, since data has beent tampered)\n";
} else {
    echo "ugly, error checking signature\n";
}
