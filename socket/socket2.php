<?php
//ȷ�������ӿͻ���ʱ���ᳬʱ
set_time_limit(0);
 
$ip = '127.0.0.1';
$port = 8090;
 
/*
 +-------------------------------
 *  @socketͨ����������
 +-------------------------------
 *  @socket_create
 *  @socket_bind
 *  @socket_listen
 *  @socket_accept
 *  @socket_read
 *  @socket_write
 *  @socket_close
 +--------------------------------
 */
 
/*----------------  ���²��������ֲ��ϵ�  -------------------*/
if(($sock = socket_create(AF_INET,SOCK_STREAM,SOL_TCP)) < 0) {
  echo "socket_create() ʧ�ܵ�ԭ����:".socket_strerror($sock)."\n";
}
 
if(($ret = socket_bind($sock,$ip,$port)) < 0) {
  echo "socket_bind() ʧ�ܵ�ԭ����:".socket_strerror($ret)."\n";
}
 
if(($ret = socket_listen($sock,4)) < 0) {
  echo "socket_listen() ʧ�ܵ�ԭ����:".socket_strerror($ret)."\n";
}
 
$count = 0;
 
do {
  if (($msgsock = socket_accept($sock)) < 0) {
    echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n";
    break;
  } else {
     
    //�����ͻ���
    $msg ="���Գɹ���\n";
    socket_write($msgsock, $msg, strlen($msg));
    socket_write($msgsock, $count, strlen($msg));
    echo "���Գɹ��˰�\n";
	//file_put_contents("socket.log","���Գɹ�",FILE_APPEND);
    $buf = socket_read($msgsock,8192);
     
     
    $talkback = "�յ�����Ϣ:$buf\n";
    echo $talkback;
     
    if(++$count >= 5){
		echo $count;
		break;
    };
     
   
  }
  //echo $buf;
  socket_close($msgsock);
 
} while (true);
 
socket_close($sock);
?>
