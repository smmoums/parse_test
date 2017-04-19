<?php

/**
 * 阿里云短信发码接口类
 * @author wangsong <skyshappiness@gmail.com> 2017-01-04
 */
class Alicode_SendPhoneCode {
    private $connect_timeout = 30000;                                            //30 second
    private $read_timeout = 80000;                                               //80 second
    private $access_key_id = 'LTAIRNzlvBvf1zMr';                                                     //阿里云颁发给用户的访问服务所用的密钥ID
    private $access_key_secret = '78tMKSphmoUzajCxMimvxTviJFqepw';                                                 //阿里云官方颁发给访问者密钥
    private $format = 'JSON';                                                   //返回值的类型，默认JSON，可选XML
    private $version = '2016-09-27';                                            //API版本号
    private $signature_method = 'HMAC-SHA1';                                    //签名方式，目前支持HMAC-SHA1
    private $time_stamp;                                                        //请求的时间戳。日期格式按照ISO8601标准表示，并需要使用UTC时间。格式为YYYY-MM-DDThh:mm:ssZ 例:2015-11-23T04:00:00Z
    private $signature_version = '1.0';                                         //签名算法版本，目前版本是1.0
    private $signature_nonce;                                                   //唯一随机数，用于防止网络重放攻击
    private $region_id = '';                                                    //机房信息（选填）
    private $action = 'SingleSendSms';                                          //操作接口名
    private $date_format = 'Y-m-d\TH:i:s\Z';                                    //日期格式
    private $headers = array();                                                 //HTTP 数据头部设置
    private $http_uri = 'http://sms.aliyuncs.com/';                             //POST 请求地址
    private $curl_method = 'POST';                                              //CURL请求方式

    /**
     * 构造方法定义基本参数
     * @param type $key
     * @param type $secret
     */
    public function __construct($key = '', $secret = '') {
        if($key != ''){
            $this->access_key_id = $key;
        }
        
        if($secret != ''){
            $this->access_key_secret = $secret;
        }
        $this->headers["x-sdk-client"] = "php/2.0.0";
    }
    
    /**
     * set魔术方法定义基本参数
     * @param type $name
     * @param type $value
     */
    public function __set($name = '', $value = '') {
        if($name != '' && $value != ''){
            $this->$name = $value;
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    /**
     * 短信发送验证码
     */
    public function sendCode(array $data){
        if(!isset($data['SignName']) || !isset($data['TemplateCode']) || !isset($data['RecNum']) || !isset($data['ParamString'])){
            return FALSE;
        }
        
        $data['Action'] = $this->action;
        $data['Format'] = $this->format;
        $data['Version'] = $this->version;
        $data['AccessKeyId'] = $this->access_key_id;
        $data['SignatureMethod'] = $this->signature_method;
        date_default_timezone_set("GMT");
        $data['Timestamp'] = date($this->date_format);
        $data['SignatureVersion'] = $this->signature_version;
        $data['SignatureNonce'] = uniqid();
        if($this->region_id != ''){
            $data['RegionId'] = $this->region_id;
        }
        $data['Signature'] = base64_encode($this->_createSign($data));
        $send_result = $this->_curl($this->http_uri, "POST", $data, $this->headers);
        return json_decode($send_result, TRUE);
    }
    
    /**
     * 签名制作
     * @param array $data
     */
    private function _createSign(array $data){
        ksort($data);
        $sign_str = http_build_query($data);
        $sign_str = $this->curl_method.'&%2F&'.$this->_percentEncode($sign_str);
        $access_secret = $this->access_key_secret . '&';
        $signature = hash_hmac('sha1', $sign_str, $access_secret, true);
        return $signature;
    }
    
    /**
     *  强制转换
     * （+）替换成%20、星号（*）替换成%2A、%7E 替换回波浪号（~）
     *  @param type $sign_str
     */
    private function _percentEncode($sign_str){
        $res = urlencode($sign_str);
        $res = preg_replace('/\+/', '%20', $res);
        $res = preg_replace('/\*/', '%2A', $res);
        $res = preg_replace('/%7E/', '~', $res);
        return $res;
    }
    
    
    private function _curl($url, $httpMethod = "GET", $postFields = null, $headers = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $httpMethod);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FAILONERROR, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $post_str = is_array($postFields) ? $this->_getPostHttpBody($postFields) : $postFields;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_str);

        if ($this->read_timeout) {
            curl_setopt($ch, CURLOPT_TIMEOUT, $this->read_timeout);
        }
        if ($this->connect_timeout) {
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connect_timeout);
        }
        //https request
        if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == "https") {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        }
        if (is_array($headers) && 0 < count($headers)) {
            $httpHeaders = $this->_getHttpHearders($headers);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpHeaders);
        }
        $body = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if (curl_errno($ch)) {
            throw new ClientException("Speicified endpoint or uri is not valid.", "SDK.ServerUnreachable");
        }
        curl_close($ch);
        return $body;
    }
    
    
    private function _getPostHttpBody($postFildes) {
        $content = "";
        foreach ($postFildes as $apiParamKey => $apiParamValue) {
            $content .= "$apiParamKey=" . urlencode($apiParamValue) . "&";
        }
        return substr($content, 0, -1);
    }

    private function _getHttpHearders($headers) {
        $httpHeader = array();
        foreach ($headers as $key => $value) {
            array_push($httpHeader, $key . ":" . $value);
        }
        return $httpHeader;
    }
}