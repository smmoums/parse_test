<?php
$host = '127.0.0.1'; 
$port = '8090'; 
$null = NULL; 

//����tcp socket
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);
socket_bind($socket, 0, $port);
//socket_bind($socket,$host, $port);

//�����˿�
socket_listen($socket);

//���ӵ�client socket �б�
$clients = array($socket);

//����һ����ѭ��,������������ ,״̬
while (true) {
    
    $changed = $clients;
    socket_select($changed, $null, $null, 0, 10);
    
    //������µ�����
    if (in_array($socket, $changed)) {
        //���ܲ������µ�socket����
        $socket_new = socket_accept($socket); 
        $clients[] = $socket_new;
        
        //ͨ��socket��ȡ����ִ��handshake
        $header = socket_read($socket_new, 1024); 
        perform_handshaking($header, $socket_new, $host, $port);
        
        //��ȡclient ip ����json����,������֪ͨ
        socket_getpeername($socket_new, $ip);
        $response = mask(json_encode(array('type'=>'system', 'message'=>$ip.' connected')));
        send_message($response);
        $found_socket = array_search($socket, $changed);
        unset($changed[$found_socket]);
    }
    
    //��ѯ ÿ��client socket ����
    foreach ($changed as $changed_socket) {    
        
        //�����client���ݷ��͹���
        while(socket_recv($changed_socket, $buf, 1024, 0) >= 1)
        {
            //���뷢�͹���������
            $received_text = unmask($buf); 
            $tst_msg = json_decode($received_text);  
            $user_name = $tst_msg->name; 
            $user_message = $tst_msg->message; 
            
            //����Ϣ���ͻ��������ӵ� client ��ȥ
            $response_text = mask(json_encode(array('type'=>'usermsg', 'name'=>$user_name, 'message'=>$user_message)));
            send_message($response_text);
            break 2; 
        }
        
        //���offline��client
        $buf = @socket_read($changed_socket, 1024, PHP_NORMAL_READ);
        if ($buf === false) { 
            $found_socket = array_search($changed_socket, $clients);
            socket_getpeername($changed_socket, $ip);
            unset($clients[$found_socket]);
            $response = mask(json_encode(array('type'=>'system', 'message'=>$ip.' disconnected')));
            send_message($response);
        }
    }
}
// �رռ�����socket
socket_close($sock);

//������Ϣ�ķ���
function send_message($msg)
{
    global $clients;
    foreach($clients as $changed_socket)
    {
        @socket_write($changed_socket,$msg,strlen($msg));
    }
    return true;
}


//��������
function unmask($text) {
    $length = ord($text[1]) & 127;
    if($length == 126) {
        $masks = substr($text, 4, 4);
        $data = substr($text, 8);
    }
    elseif($length == 127) {
        $masks = substr($text, 10, 4);
        $data = substr($text, 14);
    }
    else {
        $masks = substr($text, 2, 4);
        $data = substr($text, 6);
    }
    $text = "";
    for ($i = 0; $i < strlen($data); ++$i) {
        $text .= $data[$i] ^ $masks[$i%4];
    }
    return $text;
}

//��������
function mask($text)
{
    $b1 = 0x80 | (0x1 & 0x0f);
    $length = strlen($text);
    
    if($length <= 125)
        $header = pack('CC', $b1, $length);
    elseif($length > 125 && $length < 65536)
        $header = pack('CCn', $b1, 126, $length);
    elseif($length >= 65536)
        $header = pack('CCNN', $b1, 127, $length);
    return $header.$text;
}

//���ֵ��߼�
function perform_handshaking($receved_header,$client_conn, $host, $port)
{
    $headers = array();
    $lines = preg_split("/\r\n/", $receved_header);
    foreach($lines as $line)
    {
        $line = chop($line);
        if(preg_match('/\A(\S+): (.*)\z/', $line, $matches))
        {
            $headers[$matches[1]] = $matches[2];
        }
    }

    $secKey = $headers['Sec-WebSocket-Key'];
    $secAccept = base64_encode(pack('H*', sha1($secKey . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
    $upgrade  = "HTTP/1.1 101 Web Socket Protocol Handshake\r\n" .
    "Upgrade: websocket\r\n" .
    "Connection: Upgrade\r\n" .
    "WebSocket-Origin: $host\r\n" .
    "WebSocket-Location: ws://$host:$port/demo/shout.php\r\n".
    "Sec-WebSocket-Accept:$secAccept\r\n\r\n";
    socket_write($client_conn,$upgrade,strlen($upgrade));
}