<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <title>....</title>
    <style>
    div#mask{width:100%;height:100%;background:#000;position:fixed;left:0;top:0;z-index:999}
    </style>
    <script>
    window.onload=function(){
        var oDiv=document.getElementById('mask');
        oDiv.onclick=function(){
            var iHeight=css(oDiv,'height');
            var iTarget=-iHeight;
            var timer=null;
             
            timer=setInterval(function(){
                var iTop=css(oDiv,'top');
                var iSpeed=Math.floor((iTarget-iTop)/8);
                var t=iTop+iSpeed;
                if(iTop<=iTarget){
                    clearInterval(timer);
                }else{
                    oDiv.style.top=t+'px'; 
                }
            },10);
             
             
        }
    }
    function css(obj,attr){
        var result;
        if(obj.currentStyle){
            result=obj.currentStyle[attr];
        }else{
            result=getComputedStyle(obj,false)[attr];
        }
        return parseInt(result);
    }
    </script>
</head>
<body>
    <img src="http://127.0.0.1:88/laravel-fb/resources/assets/img/x.png">
</body>
</html>