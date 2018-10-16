<?php
//预留数据库接口
$music = array(
    "XXme - escape(TV size).mp3",
    "BeautifulWorld.mp3",
    "戸松遥 - ひとり.mp3",
    "XXme - 真夏のセツナ.mp3",
    "トリカゴ.mp3",
    "緋色月下、狂咲ノ絶.mp3",
    "无邪気さへの上书き.mp3",
);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <title>webPlayer</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="webPlayer">
    <meta name="author" content="webPlayer">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">

    <!-- Web Fonts -->
    <link rel='stylesheet' type='text/css' href='/google-analytics/css.css'>

    <!-- CSS Global Compulsory-->
    <link rel="stylesheet" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/plugins/animate.css">
    <link rel="stylesheet" href="/assets/plugins/line-icons/line-icons.css">
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/assets/plugins/font-awesome/css/font-awesome.min.css">

    <!-- CSS Page Style -->
    <link rel="stylesheet" href="/assets/css/pages/page_coming_soon.css">

    <!-- CSS Theme -->
    <link rel="stylesheet" href="/assets/css/theme-colors/default.css" id="style_color">

    <!-- ////// -->

    <!-- CSS Header and Footer -->

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/css/sky-forms.css">
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/skyforms/custom/custom-sky-forms.css">
    <!--[if lt IE 9]><link rel="stylesheet" href="assets/plugins/sky-forms-pro/skyforms/css/sky-forms-ie8.css"><![endif]-->

    <!-- CSS Theme -->

    <!-- CSS Customization -->
    <link rel="stylesheet" href="/assets/css/custom.css">

   <!-- CSS Header and Footer -->
   <link rel="stylesheet" href="/assets/css/headers/header-default.css">
   <link rel="stylesheet" href="/assets/css/footers/footer-v1.css">
   
   <link rel="stylesheet" href="/dist/polyfill.object-fit.css">


</head>

<style type="text/css">
    ::-webkit-scrollbar {display:none}

    .coming-soon-bg-cover:before {
        top: 0;
        z-index: -1;
        width: 100%;
        content: " ";
        height: 100%;
        position: absolute;
        background: rgba(0,0,0,0);
    }
    .inplay{
        color:red;
        font-size: 18px;
        font-weight: bold;
        /* background-color: yellow; */
    }
    /* #player{
        opacity: 0.4;
    }
    #player:hover{
        opacity: 1;
    } */
    .inrow{
        color:blue!important;
        font-size: 30px;
        font-weight: bold;
    }
    #video{
        position: absolute!important;
        width: 100%!important;
        height:100%!important;
        margin:0 auto 0!important;
        object-fit: cover!important;
        z-index:-1!important;
    }
   
  
    @media screen and (min-width: 460px) {
        #player{
            width:400px;
            position:absolute;
            right:0px;
            top:10px;
            z-index:999;
        }
    }

    @media screen and (max-width: 460px) {
        .phone_hidden{
            display: none!important;
        }
        #player{
            width:100%;
            position:fixed;
            right:0px;
            bottom:0px;
            z-index:999;
            padding:0!important;
        }
        .panel{
            margin-bottom: 0px!important;
        }
        #role_lrc{
            display:none;
        }
        video{
            display:none;
        }

    }
</style>

<body class="coming-soon-page">
    <video id="video" muted playsinline webkit-playsinline preload="auto">
        您的浏览器不支持 video 标签。
    </video>

    <div class="col-md-3" id="player">
        <!-- Turquoise Panel -->
        <div class="panel panel-sea" style="padding:0;">
            <div class="panel-heading">
                <h3 class="panel-title">
                    CkeckPlayer
                </h3>
            </div>

            <div class="panel-heading" style="">
                <div class="col-md-5" style="height:30px;border:0;padding-top:3px;width:100%">
                    <i class="fa fa-backward" style="font-size:20px;"></i>
                    &nbsp;&nbsp;

                    <i class="fa fa-play action-play" style="display:none;font-size:20px;"></i>
                    <i class="fa fa-pause action-pause" style="font-size:20px;"></i>
                    &nbsp;&nbsp;

                    <i class="fa fa-forward" style="font-size:20px;"></i>

                    &nbsp;&nbsp;

                    <span class="currentTime" style="font-size:20px;">00:00</span>
                    &nbsp;/&nbsp;
                    <span class="duration" style="font-size:20px;">00:00</span>
                </div>

                <div id="slider1" class="col-md-7 sky-form label-rounded" style="height:30px;border:0;padding:0;width:100%">
                    <div id="slider1-rounded" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" >
                        <a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0%;"></a>
                    </div>
                </div>

                <div style="clear:both"></div>
                <audio src="" id="audio" preload="auto" style="width:100%;"></audio>
                <!-- controls="1" loop="1"  -->
            </div>
            <div class="panel-body phone_hidden" style="text-align:center;background-color:#eee;font-size:16px;height:55px;overflow:hidden">
                <span class="lrc_show" style="text-align:center;"></span>
            </div>
            <div class="panel-body phone_hidden">
                <h4>音乐列表</h4>
                <?php
                    // $i=0;
                    // $resource=opendir("./music/");
                    // while ($row=readdir($resource)) {
                    //     if($row !="." and $row!=".." and strpos($row,".mp3")){
                    //         echo "<a href='javascript:;' class='music_list' style='font-size:16px;' data='".$i."'>".explode(".mp3",$row)[0]."</a><br>";
                    //         $i++;
                    //     }
                    // }
                    foreach ($music as $k => $v) {
                        if (strpos($v, ".mp3")) {
                            echo "<a href='javascript:;' class='music_list' style='font-size:16px;' data='" . $k . "'>" . explode(".mp3", $v)[0] . "</a><br>";
                            $i++;
                        }
                    }
                ?>
            </div>
            <div class="panel-body phone_hidden">
                <input type="radio" name="play_type" class="play_type" value="1" checked>列表循环
                <input type="radio" name="play_type" class="play_type" value="2">单曲循环
                <input type="radio" name="play_type" class="play_type" value="3">列表顺序
            </div>
           
            <div class="panel-body">
                <span id="msg"></span>
            </div>

        </div>
        <!-- End Turquoise Panel -->
    </div>
    <div class="coming-soon-border"></div>
    <div class="coming-soon-bg-cover"></div>

    <div class="container cooming-soon-content">
        <!-- Coming Soon Content -->
        <div class="row">
            <div class="col-md-12 coming-soon">
                <h1>端午</h1>
                    <span class="lrc_show" style="color:#fff;background-color:#000;font-size:20px;">2018-06-18</span>
                <br>
            </div>
        </div>

        <!-- Coming Soon Plugn -->
        <div class="coming-soon-plugin">
            <div id="defaultCountdown"></div>
        </div>

        <div class="coming-soon-plugin" id="role_lrc">
            <div style="width: 500px!important;height:200px;">
                <div style="position:absolute;opacity:0.5;background-color:#333;height:200px;width:100%;left:0;right:0;margin-left: auto;margin-right: auto;">
                </div>
                <div style="position:absolute;height:200px;width:100%;left:0;right:0;margin-left: auto;margin-right: auto;overflow:hidden;">
                    <div id="lrc_role" style="width:100%;font-size:25px;margin-top:80px;">
                    </div>
                </div>
            </div>
        </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

    <!--=== Sticky Footer ===-->
    <div class="container sticky-footer">
        <p class="copyright-space">
            2017-2020 &copy; ckeck.cn Powered by <a target="_blank" href="http://www.Aliyun.com">Aliyun.com</a>
        </p>
    </div>
    <!--=== End Sticky-Footer ===-->

    

</body>
<!-- JS Global Compulsory -->
    <script type="text/javascript" src="/assets/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/jquery/jquery-migrate.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- JS Implementing Plugins -->
    <script type="text/javascript" src="/assets/plugins/back-to-top.js"></script>
    <script type="text/javascript" src="/assets/plugins/smoothScroll.js"></script>
    <script type="text/javascript" src="/assets/plugins/countdown/jquery.plugin.js"></script>
    <script type="text/javascript" src="/assets/plugins/countdown/jquery.countdown.js"></script>
    <script type="text/javascript" src="/assets/plugins/backstretch/jquery.backstretch.min.js"></script>
    <!-- JS Customization -->
    <script type="text/javascript" src="/assets/js/custom.js"></script>
    <!-- JS Page Level -->
    <script type="text/javascript" src="/assets/js/app.js"></script>
    <script type="text/javascript" src="/assets/js/plugins/style-switcher.js"></script>
    <!-- JS Implementing Plugins -->
    <script src="/assets/plugins/sky-forms-pro/skyforms/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/jquery/jquery-ui.js"></script>


    <script type="text/javascript" src="/dist/polyfill.object-fit.js"></script>


    <!-- JS Page Level -->

    <script type="text/javascript">
        //音乐查询接口 妄想自动获取歌词
        // $.getJSON("http://musicapi.leanapp.cn/search?keywords="+"xx:me",function(data){
        //     console.log(data);
        // });
    </script>

    <script type="text/javascript">

        var now = 0;
        var music_list=[];
        var audio=document.getElementById("audio");
        var video=document.getElementById("video");


        $(".music_list").each(function(index, el) {
            music_list.push($(this).html());
        });

        function show_status(s){
            if(s==1){//正在播放
                $(".action-play").hide();
                $(".action-pause").show();
            }else{//暂停
                $(".action-play").show();
                $(".action-pause").hide();
            }
        }
        //秒转分
        function sec2mion(sec){
            min=("0"+Math.floor(sec/60)).slice(-2);
            sec=("0"+Math.floor(sec%60)).slice(-2);
            return min+":"+sec;
        }

        function msg(message){
            $("#msg").html(message);
        }

        function play(music){
            msg("正在播放："+music+".mp3");
            $("title").html("正在播放："+music);


            audio.src = "http://p8hrmswib.bkt.clouddn.com/music/"+music+".mp3";
            video.src = "http://p8hrmswib.bkt.clouddn.com/video/"+music+".mp4";

            audio.oncanplaythrough=function (){
                $('#slider1').slider({
                    min: 0,
                    max: audio.duration,
                });
                $(".duration").html(sec2mion(audio.duration.toFixed(0)));
                $(".action-pause").hide();
                $(".action-play").show();
                $(".music_list").removeClass('inplay');
                $(".music_list:contains('"+music+"')").addClass('inplay');
                $(".playcon").remove();
                $(".music_list:contains('"+music+"')").before('<i class="fa fa-play playcon"></i>');
                $("#lrc_role").css("margin-top",0);
                show_lrc(music);
                audio.play();
                video.play();
                sync();
                show_status(1);

            }
        }
        //显示歌词
        function show_lrc(music){
            var ar;
            var ti;
            $.get(
                '/music/'+music+'.lrc',
                function(data) {
                    var time = [];
                    var lrc = [];
                    var height = [];
                    split = data.split("\r\n");
                    for (var i = 0; i < split.length; i++){
                        txt=split[i];
                        var lrc_regex=/^\[\d{2}:\d{2}\.\d{2}\]/;
                        if(lrc_regex.test(txt)){
                            lrc.push(txt.split("]")[1]);
                            time.push(parseFloat(txt.match(/\[(\S*):/)[1]*60)+parseFloat(txt.match(/:(\S*)\]/)[1]));
                        }
                        //获取歌词文件，解析歌词和时间 分别放入数组
                    }
                    console.log(lrc);
                    try{
                        clearInterval(lrc1);
                    }catch(err){
                        console.log(err);
                    }
                    lrc_list='';
                    for (var i = 0; i < lrc.length; i++) {
                        lrc_list=lrc_list+"<span id='l"+i+"' class='role-lrc-list' style='color:#fff'>"+lrc[i]+"</span><br />";
                    }
                    $("#lrc_role").html(lrc_list);
                    $(".role-lrc-list").each(function(index, el) {
                        height.push($(this).position().top);
                    });
                    //每0.2s,遍历时间数组，获取播放位置，提取歌词
                    lrc1=setInterval(function(){
                        currentTime=audio.currentTime;
                        $(".currentTime").html(sec2mion(audio.currentTime.toFixed(0)));
                        $('#slider1').slider({
                            value: currentTime,
                        });
                        for (var ii = 0; ii < time.length; ii++) {
                            if((currentTime >= time[ii] && currentTime < time[ii+1]) || currentTime > time[time.length-1]){
                                $(".lrc_show").html(lrc[ii]);
                                $(".role-lrc-list").removeClass('inrow');
                                $("#l"+ii+"").addClass('inrow');
                                $("#lrc_role").css("margin-top",-height[ii]+80);
                            }
                        }
                    },200);
                }
            );
        }
        
        //强制同步音画，开启后卡顿，无卵用
        function sync(){
            // console.log("开启同步");
            // try{
            //     clearInterval(sync);
            // }catch(err){
            //     console.log(err);
            // }
            // sync=setInterval(function(){
            //     vc=parseInt(video.currentTime);
            //     ac=parseInt(audio.currentTime);
            //     console.log(vc+"|"+ac)
            //     if(vc!=ac){
            //         video.currentTime=audio.currentTime;//同步时间
            //     }
            //     // console.log("同步于"+currentTime);
            // },200);
        }

        $("#audio").bind('ended',function () {
            play_type=$(".play_type:checked").val();
            msg("本首歌曲播放完毕，开始播放下一首");
            setTimeout(function(){
                if(play_type==1){//列表循环
                    now=parseInt(now)+1;
                    if(now>=music_list.length){
                        now=0;
                    }
                    msg("列表循环");
                    play(music_list[now]);
                }else if(play_type==2) {//单曲循环
                    now=now
                    msg("单曲循环");
                    play(music_list[now]);
                }else if(play_type==3){//列表顺序
                    now=parseInt(now)+1;
                    if(now<music_list.length){
                        msg("顺序播放");
                        play(music_list[now]);
                    }else{
                        msg("顺序播放完成");
                    }
                }
            },1000);
        });
        //点击播放
        $(".music_list").click(function(){
            now=$(this).attr("data");
            show_status(0);
            play($(this).html());
        });
        //拖动进度条
        $('#slider1').slider({
            slide: function(event, ui){
                audio.currentTime=ui.value;
                video.currentTime=ui.value;
            }
        });
        //播放
        $(".action-play").click(function(){
            show_status(1);
            audio.play();
            video.play();
        });
        //暂停
        $(".action-pause").click(function(){
            show_status(0);
            audio.pause();
            video.pause();
        });
        //下一首
        $(".fa-forward").click(function(){
            now=parseInt(now)+1;
            if(now>=music_list.length){
                now=0;
            }
            show_status(0);
            play(music_list[now]);
        });
        //上一首
        $(".fa-backward").click(function(){
            now=parseInt(now)-1;
            if(now<0){
                now=music_list.length-1;
            }
            show_status(0);
            play(music_list[now]);
        });
        //载入时播放
        $(document).ready(function(){
            // check_system();
            now=0;
            play(music_list[now]);
            $("#player").draggable();
            $("#role_lrc").draggable();
        });
        //进度条
        document.addEventListener('DOMContentLoaded', function () {
            objectFit.polyfill({
                selector: 'video',
                fittype: 'cover'
            });
        });

        function check_system(){
            var system ={
                win : false,
                mac : false,
                xll : false
            };
            //检测平台
            var p = navigator.platform;
            system.win = p.indexOf("Win") == 0;
            system.mac = p.indexOf("Mac") == 0;
            system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
            //跳转语句，如果是手机访问就自动跳转到wap.baidu.com页面
            if(system.win||system.mac||system.xll){
                $(".phone_hidden").show();
                console.log(p);
            }else{
                $(".phone_hidden").hidden();
                alert("请使用电脑打开");
                // window.location.href="/index5.php";
            }
        }

        //平台、设备和操作系统


        jQuery(document).ready(function() {
            App.init();
            StyleSwitcher.initStyleSwitcher();
            PageComingSoon.initPageComingSoon();
        });
    </script>

    <script>
        $.backstretch([
            <?php
            $resource = opendir("./img/");
            while ($row = readdir($resource)) {
                if ($row != "." and $row != "..") {
                    echo '"img/' . ($row) . '",';
                }
            }
            ?>
        ], {
            fade: 1000,
            duration: 7000
        });

        var PageComingSoon = function () {
        return {
            //Coming Soon
            initPageComingSoon: function () {
                var newTime = new Date();
                newTime = new Date(2018, 6-1, 18, 00, 00);
                $('#defaultCountdown').countdown({until: newTime})
            }

        };
    }();
    </script>

    <!--[if lt IE 9]>
        <script src="/assets/plugins/respond.js"></script>
        <script src="/assets/plugins/html5shiv.js"></script>
        <script src="/assets/plugins/placeholder-IE-fixes.js"></script>
    <![endif]-->
</html>
