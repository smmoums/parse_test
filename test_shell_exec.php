<?php       
function start($file){
    $path = dirname(__FILE__).'/';
    $runfile = $path.$file.'.run';
    $diefile = $path.$file.'.die';
    $file = $path."data/{$file}.php";
    clearstatcache();
    if(file_exists($runfile)){
        $oldpid = file_get_contents($runfile);
        $nowpid = shell_exec("ps aux | grep 'php -f process.php' | grep ${oldpid} | awk '{print $2}'");
        //���runfile�е�pid�ſ���ƥ�䵽�������еģ������ϴη���runfile��ʱ����������С��5min�򷵻�
        if(($oldpid == $nowpid) && (time() - fileatime($runfile) < 300)){
            echo "$file is circle runing no";
            return;
        }else{
            //pid�Ų�ƥ������Ѿ���300��û������ѭ����䣬ֱ��ɱ������,��������
            $pid = file_get_contents($runfile);
            shell_exec("ps aux | grep 'php -f process.php' | grep {$pid} | xargs --if-no-run-empty kill");
        }
    }else{
        //���ļ�pidд��run�ļ�
        if(!($newpid = getmypid()) || !file_put_contents($runfile,$newpid)){
            return;
        }
        while(true){
            //�յ����������ºţ��������̣���ɾ������ļ�
            if(file_exists($diefile) && unlink($runfile) && unlink($diefile)){
                return;
            }
            /*�������ػ�����Ҫ������*/
            file_put_contents($file,"I'm Runing Now".PHP_EOL,FILE_APPEND);
            /***********************/
            touch($runfile);
            sleep(5);
        }
    }
}
start("test");
/*
PHPд�ػ�����ʱҪע�⼸�㣺
1.���Ⱦ��Ǻ���clearstatcache()���������ٷ��ֲ����֪���ú���������ļ�״̬����ģ�����һ���ű��ж�μ��ͬһ���ļ��Ļ���״̬ʱ������øú����ͻ�����ܸú���Ӱ����У�stat(), lstat(), file_exists(), is_writable(),is_readable(), is_executable(), is_file(), is_dir(), is_link(),filectime(), fileatime(), filemtime(), fileinode(), filegroup(),fileowner(), filesize(), filetype(), fileperms().
2.�ڶ�����иýű�ʱ����������ǰ���м�⣬�ϴ�ִ��ѭ����ʱ��������ڴ���300s����pid�Ų�ƥ�䶼�������ý��̣�ʱ����ÿ��ִ��ѭ��ʽ��Ҫ����touch����
3.�Զ�����Ҳ�õ���crontab���ճ̱������ļ�������ճ̱�
crontab -e
#���ճ̱�insetģʽ
/3 * * * * /usr/bin/php -f process.php
#ÿ3����ִ��һ�Σ����ý��̹ҵ�
�����ͻ���ok�ˣ�Ҫ���о��幦�ܵĻ�����Ķ����롣

*/

