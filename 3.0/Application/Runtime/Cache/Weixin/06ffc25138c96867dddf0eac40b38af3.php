<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
   <title><?php if($html_title != ''): echo ($html_title); else: ?>賺客屋<?php endif; ?></title>
  <meta charset="utf-8">
  <meta name="description" content="賺客屋">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
  <meta name="viewport" content="width=device-width,initial-scale=0.9,user-scalable=0">
  <link rel="icon" type="image/png" href="/Public/Admin/assets/i/ico_logo.png">
  <link rel="apple-touch-icon-precomposed" href="/Public/Admin/assets/i/ico_logo.png">

  <!--<link rel="stylesheet" href="./view/css/pro_s.css" type="text/css">-->

  <!--<script type="text/javascript" src="/Public/js/jquery-1.8.1.min.js"></script>-->
  <script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js?<?php echo rand(10000,99999); ?>"></script>
  <!--<script type="text/javascript" src="./view/js/af_wxapply.js"></script>-->
  <script type="text/javascript" src="/Public/Weixin//js/lrz.min.js?<?php echo rand(10000,99999); ?>"></script>
  <!--<script type="text/javascript" src="./view/js/pro_s.js"></script>-->

</head>
<body>

    <link rel="stylesheet" href="/Public/Weixin/css/reset.css">
    <link rel="stylesheet" href="/Public/Weixin/css/swiper-3.4.2.min.css" type="text/css">
    <style>
        nav{
            text-align: center;
        }
        nav p{
            color: #666;
            font-size: 0.3rem;
            margin-top: 1.15rem;
            margin-bottom: 0.385rem;
        }
        nav button{
            margin:0rem auto;
            width: 3.54rem;
            height: 0.77rem;
            border-radius: 0.385rem;
            color: #dfc190;
            border:0.015rem solid #dfc190;
            background-color: #fff;
            font-size: 0.25rem;
            position: relative;
            overflow: hidden;
        }
        nav button::before{
            content: ' ';
            position: absolute;
            background: #fff;
            width: 50%;
            height: 0.77rem;
            top: 0;
            left: -2rem;
            opacity: 0.3;
            background: -webkit-gradient(linear, 0% 0%,100% 0%, from(rgba(255,255,255,0)) ,to(rgba(255,255,255,0.8))); 
            animation:Streamer 2s ease 1.5s infinite;
            -webkit-animation:Streamer 2s ease 1.5s infinite;
            -webkit-transform: skewX(-45deg);
            transform: skewX(-45deg);
            z-index: 99;
        }
        nav button:last-child::before{
            content: ' ';
            position: absolute;
            background: #fafafa;
            width: 50%;
            height: 0.77rem;
            top: 0;
            left: -2rem;
            opacity: 0.3;
            background: -webkit-gradient(linear, 0% 0%,100% 0%, from(rgba(255,255,255,0)) ,to(rgba(220,192,144,0.3))); 
            animation:Streamer 2s ease 1.75s infinite,;
            -webkit-animation:Streamer 2s ease 1.75s infinite;
            -webkit-transform: skewX(-45deg);
            transform: skewX(-45deg);
            z-index: 99;
        }
        @keyframes Streamer{
            0%   {left:-100%}
            100% {left:150%}
        }
        footer{
            position: absolute;
            left: 0;
            bottom:0;
        }
        footer .line{
            float: left;
            width: 31%;
            height: 0.016rem;
            background-color: #eee;
            margin: 0.117rem 5%;
        }
        footer p{
            font-size: 0.25rem;
            color:#999;
            float: left;
        }
        footer img{
            margin: 0.5rem 0;
            width: 100%;
        }
        .swiper-slide{
            text-align: center;
        }
        .swiper-container a{
            float: left;
            width: 100%;
        }
        .swiper-container img{
            width: 100%;
            height:30.6vw;
        }
        .swiper-pagination-bullet{
            background-color: #fff; 
            opacity: 1;
        }
        .swiper-pagination-bullet-active{
            background-color: #CDAF7D;
        }
        .swiper-pagination{
            pointer-events:none;
        }
    </style>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="swiper-slide">
                    <a href="<?php echo U('Apply/product_introduce',array('id'=>$vo['p_id']));?>"><img src="/Public<?php echo ($vo["img_roasting"]); ?>" alt=""></a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <!--<div class="swiper-slide">
                <img src="/Public/Weixin/images/ico/way_nav.png" alt="">
            </div>-->
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <nav>
        <p>请选择您需要贷款的金融机构</p>
        <button bank='0' style="background-color: #dfc190;color:#fff;">极速贷款</button><br>
        <button bank='1'>银行贷款</button>
    </nav>
    <footer>
        <div>
            <div class="line"></div><p>合作机构</p><div class="line"></div>
        </div>
        <img src="/Public/Weixin/images/ico/way_footer.png" alt="">
    </footer>
    <script src="/Public/Weixin/js/swiper-3.4.2.min.js"></script>
    <script>
        $('title').text('贷款申请');
        function resetPage(){  //移动端适配;
            var deviceWidth = document.documentElement.clientWidth;
            var scale = deviceWidth/640;
            if( deviceWidth>=640 ){
                document.documentElement.style.fontSize="100px";
            }else{
                document.documentElement.style.fontSize=100*scale+"px";
            };	
        };
        window.onload = function (){
            resetPage();
        };
        window.onresize = function (){
            resetPage();
        };
        var url_step="<?php echo U('Apply/product');?>";
        var swiper = new Swiper('.swiper-container',{pagination : '.swiper-pagination',paginationElement : 'li',paginationClickable :true
        });
        $('button').click(function(){
            sessionStorage.setItem('banks',$(this).attr('bank'))
            location.href=url_step;
        });
    </script>







</body>
</html>