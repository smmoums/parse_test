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
        //如果runfile中的pid号可以匹配到正在运行的，并且上次访问runfile的时间和现在相差小于5min则返回
        if(($oldpid == $nowpid) && (time() - fileatime($runfile) < 300)){
            echo "$file is circle runing no";
            return;
        }else{
            //pid号不匹配或者已经有300秒没有运行循环语句，直接杀掉进程,重新启动
            $pid = file_get_contents($runfile);
            shell_exec("ps aux | grep 'php -f process.php' | grep {$pid} | xargs --if-no-run-empty kill");
        }
    }else{
        //将文件pid写入run文件
        if(!($newpid = getmypid()) || !file_put_contents($runfile,$newpid)){
            return;
        }
        while(true){
            //收到结束进程新号，结束进程，并删除相关文件
            if(file_exists($diefile) && unlink($runfile) && unlink($diefile)){
                return;
            }
            /*这里是守护进程要做的事*/
            file_put_contents($file,"I'm Runing Now".PHP_EOL,FILE_APPEND);
            /***********************/
            touch($runfile);
            sleep(5);
        }
    }
}
start("test");
/*
PHP写守护进程时要注意几点：
1.首先就是函数clearstatcache()函数那里，查官方手册可以知道该函数是清除文件状态缓存的，当在一个脚本中多次检查同一个文件的缓存状态时如果不用该函数就会出错，受该函数影响的有：stat(), lstat(), file_exists(), is_writable(),is_readable(), is_executable(), is_file(), is_dir(), is_link(),filectime(), fileatime(), filemtime(), fileinode(), filegroup(),fileowner(), filesize(), filetype(), fileperms().
2.在多次运行该脚本时，会在运行前进行检测，上次执行循环的时间距离现在大于300s或者pid号不匹配都会重启该进程（时间在每次执行循环式都要更新touch）。
3.自动重启也用到了crontab的日程表，将该文件添加入日程表：
crontab -e
#打开日程表，inset模式
/3 * * * * /usr/bin/php -f process.php
#每3分钟执行一次，放置进程挂掉
这样就基本ok了，要是有具体功能的话还需改动代码。

*/

