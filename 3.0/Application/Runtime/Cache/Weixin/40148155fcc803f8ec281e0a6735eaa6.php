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


<link rel="stylesheet" href="/Public/Weixin/css/swiper-3.4.2.min.css" type="text/css">

<style>
    *{
        padding: 0;
        margin: 0;
        list-style: none;
    }
    html,body{
        height: 100%;
        overflow: auto;
        margin: 0;
    }

    header {
        position: fixed;
        top: 0;
        width: 100%;
        height: 1.4rem;
        font-size: 0.3rem;
        background: #fff;
        z-index: 100;
        overflow: hidden;
        padding-bottom: 0.2rem;
    }
    .long_string{
        position: absolute;
        left: 49%;
        top: 25%;
        font-size: 0.6rem;
        color: #eee;
    }

    header ul {
        width: 100%;
        display: -webkit-box;
        text-align: center;
        height: 100%;
    }

    header ul li {
        height: 100%;
        line-height: 1.4rem;
        color: #666;
        overflow: hidden;
    }


    header ul li:nth-child(1) {
        -webkit-box-flex: 1;
    }

    header ul li:nth-child(2) {
        -webkit-box-flex: 1;
    }

    .div_svg{
        float: left;
        margin-left: 0.8rem;
        margin-top: 0.08rem;
    }
    .div_type{
        float: left;
        margin-left: 0.1rem;
    }

    section{
        width:6rem ;
        font-size: 0.3rem;
        padding: 0.2rem;
        margin-top: 1.4rem;
    }

    .wrapper{
        margin-top: 0.2rem;
        height: 1.6rem;
        overflow: hidden;
        background: #FFFFFF;
        border: 0.02rem solid #EEEEEE;
        box-shadow: 0 0.02rem 0.01rem 0 rgba(149,149,149,0.08);
        border-radius: 0.08rem;
    }

    .color{
        color: #dfc18f;
        border-bottom: solid 0.03rem #dfc18f;
    }
    .pic_icon,.text_word{
        float: left;
        margin-left: 0.2rem;
    }
    .text_word{
        margin-top: 0.4rem;
    }
    .pic_icon{
        margin-top: 0.35rem;
        width: 0.8rem;
        height: 0.8rem;
        border:solid 0.02rem #ccc ;
        border-radius: 50%;
        overflow: hidden;

    }
    .pic_icon>img{
        max-width: 0.8rem;
        height: auto;
    }
    .arrow_icon{
        float: right;
        margin-top: 0.7rem;
        margin-right: 0.2rem;
    }
    .wrapper>.text_word>h4{
        color: #666;
    }
    .wrapper>.text_word>p{
        width: 3.8rem;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        margin-top: 0.1rem;
        font-size: 0.23rem;
        color: #999;
    }
    .swiper-slide{
        height: 500px;
    }
    .swiper-slide-active{
        height: auto;
    }

</style>






<header>
    <div class="long_string">|</div>
    <ul>
        <li class="li_svg_ico color" ico="1">
            <div class="div_svg " ico="11" style="display: none;">
                <svg width="0.4rem" height="0.4rem" viewBox="0 0 29 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Group-2-Copy-7" fill="#999999" fill-rule="nonzero">
                            <g id="Group-12" transform="translate(0.000000, 1.000000)">
                                <path d="M0.935483871,26 L0.935483871,27 L28.0645161,27 L28.0645161,26 L0.935483871,26 Z M0,25 L29,25 L29,28 L0,28 L0,25 Z" id="Rectangle-28"></path>
                                <path d="M3,24 L3,25 L26,25 L26,24 L3,24 Z M2,23 L27,23 L27,26 L2,26 L2,23 Z" id="Rectangle-28-Copy"></path>
                                <path d="M2,8 L2,9 L27,9 L27,8 L2,8 Z M1,7 L28,7 L28,10 L1,10 L1,7 Z" id="Rectangle-28-Copy-2"></path>
                                <polygon id="Line-7" points="3 9 4 9 4 24 3 24"></polygon>
                                <polygon id="Line-7-Copy-3" points="13 9 14 9 14 24 13 24"></polygon>
                                <polygon id="Line-7-Copy-2" points="5 9 6 9 6 24 5 24"></polygon>
                                <polygon id="Line-7-Copy-4" points="15 9 16 9 16 24 15 24"></polygon>
                                <polygon id="Line-7-Copy" points="25 9 26 9 26 24 25 24"></polygon>
                                <polygon id="Line-7-Copy-5" points="23 9 24 9 24 24 23 24"></polygon>
                                <path d="M9.5,16 C8.67157288,16 8,16.6715729 8,17.5 L8,23 L11,23 L11,17.5 C11,16.6715729 10.3284271,16 9.5,16 Z M9.5,15 C10.8807119,15 12,16.1192881 12,17.5 L12,24 L7,24 L7,17.5 C7,16.1192881 8.11928813,15 9.5,15 Z" id="Rectangle-29"></path>
                                <path d="M19.5,16 C18.6715729,16 18,16.6715729 18,17.5 L18,23 L21,23 L21,17.5 C21,16.6715729 20.3284271,16 19.5,16 Z M19.5,15 C20.8807119,15 22,16.1192881 22,17.5 L22,24 L17,24 L17,17.5 C17,16.1192881 18.1192881,15 19.5,15 Z" id="Rectangle-29-Copy"></path>
                                <path d="M14.5,6.5 C13.3954305,6.5 12.5,5.6045695 12.5,4.5 C12.5,3.3954305 13.3954305,2.5 14.5,2.5 C15.6045695,2.5 16.5,3.3954305 16.5,4.5 C16.5,5.6045695 15.6045695,6.5 14.5,6.5 Z M14.5,5.5 C15.0522847,5.5 15.5,5.05228475 15.5,4.5 C15.5,3.94771525 15.0522847,3.5 14.5,3.5 C13.9477153,3.5 13.5,3.94771525 13.5,4.5 C13.5,5.05228475 13.9477153,5.5 14.5,5.5 Z" id="Oval-11"></path>
                                <path d="M2.75193551,7.93188945 C2.51340956,8.07102959 2.20725069,7.99046147 2.06811055,7.75193551 C1.92897041,7.51340956 2.00953853,7.20725069 2.24806449,7.06811055 L14.2480645,0.0681105496 C14.4865904,-0.0710295921 14.7927493,0.00953853014 14.9318895,0.248064487 C15.0710296,0.486590444 14.9904615,0.792749309 14.7519355,0.93188945 L2.75193551,7.93188945 Z" id="Line-8"></path>
                            </g>
                            <g id="Group-11" transform="translate(20.723678, 4.959489) rotate(-327.000000) translate(-20.723678, -4.959489) translate(13.223678, 4.459489)">
                                <path d="M7.33351251,1 C7.10031902,1 6.91127834,0.776142375 6.91127834,0.5 C6.91127834,0.223857625 7.10031902,0 7.33351251,0 L9.86691751,0 C10.100111,0 10.2891517,0.223857625 10.2891517,0.5 C10.2891517,0.776142375 10.100111,1 9.86691751,1 L7.33351251,1 Z" id="Line-9"></path>
                                <path d="M11.4222342,1 C11.1890407,1 11,0.776142375 11,0.5 C11,0.223857625 11.1890407,0 11.4222342,0 L13.9556392,0 C14.1888327,0 14.3778733,0.223857625 14.3778733,0.5 C14.3778733,0.776142375 14.1888327,1 13.9556392,1 L11.4222342,1 Z" id="Line-9-Copy-3"></path>
                                <path d="M0.422234167,1 C0.189040676,1 1.13686838e-13,0.776142375 1.13686838e-13,0.5 C1.13686838e-13,0.223857625 0.189040676,0 0.422234167,0 L4.64457584,0 C4.87776933,0 5.06681001,0.223857625 5.06681001,0.5 C5.06681001,0.776142375 4.87776933,1 4.64457584,1 L0.422234167,1 Z" id="Line-9-Copy-4"></path>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="div_svg" ico="12">
                <svg width="0.4rem" height="0.4rem" viewBox="0 0 29 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="产品列表-copy-9" transform="translate(-226.000000, -111.000000)" fill="#CDAF7D" fill-rule="nonzero">
                        <g id="Group-2" transform="translate(226.000000, 111.000000)">
                            <g id="Group-12" transform="translate(0.000000, 1.000000)">
                                <path d="M0.935483871,26 L0.935483871,27 L28.0645161,27 L28.0645161,26 L0.935483871,26 Z M0,25 L29,25 L29,28 L0,28 L0,25 Z" id="Rectangle-28"></path>
                                <path d="M3,24 L3,25 L26,25 L26,24 L3,24 Z M2,23 L27,23 L27,26 L2,26 L2,23 Z" id="Rectangle-28-Copy"></path>
                                <path d="M2,8 L2,9 L27,9 L27,8 L2,8 Z M1,7 L28,7 L28,10 L1,10 L1,7 Z" id="Rectangle-28-Copy-2"></path>
                                <polygon id="Line-7" points="3 9 4 9 4 24 3 24"></polygon>
                                <polygon id="Line-7-Copy-3" points="13 9 14 9 14 24 13 24"></polygon>
                                <polygon id="Line-7-Copy-2" points="5 9 6 9 6 24 5 24"></polygon>
                                <polygon id="Line-7-Copy-4" points="15 9 16 9 16 24 15 24"></polygon>
                                <polygon id="Line-7-Copy" points="25 9 26 9 26 24 25 24"></polygon>
                                <polygon id="Line-7-Copy-5" points="23 9 24 9 24 24 23 24"></polygon>
                                <path d="M9.5,16 C8.67157288,16 8,16.6715729 8,17.5 L8,23 L11,23 L11,17.5 C11,16.6715729 10.3284271,16 9.5,16 Z M9.5,15 C10.8807119,15 12,16.1192881 12,17.5 L12,24 L7,24 L7,17.5 C7,16.1192881 8.11928813,15 9.5,15 Z" id="Rectangle-29"></path>
                                <path d="M19.5,16 C18.6715729,16 18,16.6715729 18,17.5 L18,23 L21,23 L21,17.5 C21,16.6715729 20.3284271,16 19.5,16 Z M19.5,15 C20.8807119,15 22,16.1192881 22,17.5 L22,24 L17,24 L17,17.5 C17,16.1192881 18.1192881,15 19.5,15 Z" id="Rectangle-29-Copy"></path>
                                <path d="M14.5,6.5 C13.3954305,6.5 12.5,5.6045695 12.5,4.5 C12.5,3.3954305 13.3954305,2.5 14.5,2.5 C15.6045695,2.5 16.5,3.3954305 16.5,4.5 C16.5,5.6045695 15.6045695,6.5 14.5,6.5 Z M14.5,5.5 C15.0522847,5.5 15.5,5.05228475 15.5,4.5 C15.5,3.94771525 15.0522847,3.5 14.5,3.5 C13.9477153,3.5 13.5,3.94771525 13.5,4.5 C13.5,5.05228475 13.9477153,5.5 14.5,5.5 Z" id="Oval-11"></path>
                                <path d="M2.75193551,7.93188945 C2.51340956,8.07102959 2.20725069,7.99046147 2.06811055,7.75193551 C1.92897041,7.51340956 2.00953853,7.20725069 2.24806449,7.06811055 L14.2480645,0.0681105496 C14.4865904,-0.0710295921 14.7927493,0.00953853014 14.9318895,0.248064487 C15.0710296,0.486590444 14.9904615,0.792749309 14.7519355,0.93188945 L2.75193551,7.93188945 Z" id="Line-8"></path>
                            </g>
                            <g id="Group-11" transform="translate(20.723678, 4.959489) rotate(-327.000000) translate(-20.723678, -4.959489) translate(13.223678, 4.459489)">
                                <path d="M7.33351251,1 C7.10031902,1 6.91127834,0.776142375 6.91127834,0.5 C6.91127834,0.223857625 7.10031902,0 7.33351251,0 L9.86691751,0 C10.100111,0 10.2891517,0.223857625 10.2891517,0.5 C10.2891517,0.776142375 10.100111,1 9.86691751,1 L7.33351251,1 Z" id="Line-9"></path>
                                <path d="M11.4222342,1 C11.1890407,1 11,0.776142375 11,0.5 C11,0.223857625 11.1890407,0 11.4222342,0 L13.9556392,0 C14.1888327,0 14.3778733,0.223857625 14.3778733,0.5 C14.3778733,0.776142375 14.1888327,1 13.9556392,1 L11.4222342,1 Z" id="Line-9-Copy-3"></path>
                                <path d="M0.422234167,1 C0.189040676,1 1.13686838e-13,0.776142375 1.13686838e-13,0.5 C1.13686838e-13,0.223857625 0.189040676,0 0.422234167,0 L4.64457584,0 C4.87776933,0 5.06681001,0.223857625 5.06681001,0.5 C5.06681001,0.776142375 4.87776933,1 4.64457584,1 L0.422234167,1 Z" id="Line-9-Copy-4"></path>
                            </g>
                        </g>
                    </g>
                </g>
            </svg>
            </div>
            <div class="div_type">银行类</div>
        </li>
        <li class="li_svg_ico" ico="2">
            <div class="div_svg" ico="22" style="display: none">
                <svg width="0.4rem" height="0.4rem" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Group-9-Copy" fill-rule="nonzero">
                            <path d="M18.875,5.41621796 C18.7520111,5.37049595 18.5893777,5.32213075 18.3945895,5.27638102 C17.6572337,5.10319896 16.6184084,5 15.5000292,5 C14.3816216,5 13.34278,5.103199 12.6054154,5.27638158 C12.410604,5.32213635 12.2479549,5.37050718 12.1249603,5.4162337 L12.1247779,7.06536243 L18.875,7.06536243 L18.875,5.41621796 Z M11.961051,5.4874489 C11.9571485,5.48952153 11.953356,5.49158033 11.9496744,5.49362462 C11.9584625,5.48874471 11.9682367,5.48200233 11.9785472,5.473263 L11.961051,5.4874489 Z M19.9616566,8.06536243 L11.0384018,8.06536243 C11.0139696,8.02192651 11.001169,7.97816113 11,7.93429964 L11,5.0569039 C11,4.47319609 13.014723,4 15.5000292,4 C17.985277,4 20,4.47319609 20,5.0569039 L20,7.93429964 C19.998831,7.97816113 19.9860888,8.02192651 19.9616566,8.06536243 Z" id="Path" fill="#CDAF7D"></path>
                            <path d="M10,10 L10,27 L21,27 L21,10 L10,10 Z M22,12 L20,12 L20,15 L22,15 L22,28 L9,28 L9,9 L22,9 L22,12 Z" id="Combined-Shape"></path>
                            <path d="M22,19 L22,27 L27,27 L27,20 C27,19.4477153 26.5522847,19 26,19 L22,19 Z M21,18 L26,18 C27.1045695,18 28,18.8954305 28,20 L28,28 L21,28 L21,18 Z" id="Rectangle-26-Copy-3" fill="#CDAF7D"></path>
                            <path d="M3.75746437,17.5914103 C3.31229737,17.7027021 3,18.1026852 3,18.5615528 L3,27 L9,27 L9,16.2807764 L3.75746437,17.5914103 Z M3.51492875,16.6212678 L10,15 L10,28 L2,28 L2,18.5615528 C2,17.6438175 2.62459475,16.8438513 3.51492875,16.6212678 Z" id="Rectangle-26-Copy-4" fill="#CDAF7D"></path>
                            <path d="M10,8 L10,9 L21,9 L21,8 L10,8 Z M9,7 L22,7 L22,10 L9,10 L9,7 Z" id="Rectangle-26-Copy" fill="#CDAF7D"></path>
                            <path d="M21,9.5 C21,9.22385763 21.2238576,9 21.5,9 C21.7761424,9 22,9.22385763 22,9.5 L22,10.5 C22,10.7761424 21.7761424,11 21.5,11 C21.2238576,11 21,10.7761424 21,10.5 L21,9.5 Z" id="Line-5" fill="#CDAF7D"></path>
                            <path d="M10,15.5 C10,15.7761424 9.77614237,16 9.5,16 C9.22385763,16 9,15.7761424 9,15.5 L9,9.5 C9,9.22385763 9.22385763,9 9.5,9 C9.77614237,9 10,9.22385763 10,9.5 L10,15.5 Z" id="Line-6" fill="#CDAF7D"></path>
                            <path d="M22,14.5 C22,14.7761424 21.7761424,15 21.5,15 C21.2238576,15 21,14.7761424 21,14.5 L21,12.5 C21,12.2238576 21.2238576,12 21.5,12 C21.7761424,12 22,12.2238576 22,12.5 L22,14.5 Z" id="Line-6-Copy" fill="#CDAF7D"></path>
                            <path d="M1,28 L1,29 L29,29 L29,28 L1,28 Z M0,27 L30,27 L30,30 L0,30 L0,27 Z" id="Rectangle-26-Copy-2" fill="#CDAF7D"></path>
                            <polygon id="Line-2" fill="#CDAF7D" points="16 5 15 5 15 0 16 0"></polygon>
                            <polygon id="Line-3" fill="#CDAF7D" points="11.8888889 13 11.8888889 12 19.1111111 12 19.1111111 13"></polygon>
                            <polygon id="Line-3-Copy" fill="#CDAF7D" points="11.8888889 16 11.8888889 15 19.1111111 15 19.1111111 16"></polygon>
                            <polygon id="Line-3-Copy-2" fill="#CDAF7D" points="11.8888889 19 11.8888889 18 19.1111111 18 19.1111111 19"></polygon>
                            <polygon id="Line-3-Copy-3" fill="#CDAF7D" points="11.8888889 22 11.8888889 21 19.1111111 21 19.1111111 22"></polygon>
                            <polygon id="Line-3-Copy-9" fill="#CDAF7D" points="11.8888889 25 11.8888889 24 19.1111111 24 19.1111111 25"></polygon>
                            <polygon id="Line-3-Copy-4" fill="#CDAF7D" points="5 22 5 21 7 21 7 22"></polygon>
                            <polygon id="Line-3-Copy-7" fill="#CDAF7D" points="23 23 23 22 26 22 26 23"></polygon>
                            <polygon id="Line-3-Copy-5" fill="#CDAF7D" points="5 20 5 19 7 19 7 20"></polygon>
                            <polygon id="Line-3-Copy-6" fill="#CDAF7D" points="5 24 5 23 7 23 7 24"></polygon>
                            <polygon id="Line-3-Copy-8" fill="#CDAF7D" points="23 25 23 24 26 24 26 25"></polygon>
                            <path d="M22,18.5 C22,18.7761424 21.7761424,19 21.5,19 C21.2238576,19 21,18.7761424 21,18.5 L21,16.5 C21,16.2238576 21.2238576,16 21.5,16 C21.7761424,16 22,16.2238576 22,16.5 L22,18.5 Z" id="Line-4" fill="#CDAF7D"></path>
                        </g>
                    </g>
                </svg>
            </div>
            <div class="div_svg" ico="21">
                <svg width="0.4rem" height="0.4rem" viewBox="0 0 30 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <!-- Generator: Sketch 48.2 (47327) - http://www.bohemiancoding.com/sketch -->
                <desc>Created with Sketch.</desc>
                <defs></defs>
                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="产品列表-copy-9" transform="translate(-45.000000, -109.000000)" fill-rule="nonzero">
                        <g id="Group-9" transform="translate(45.000000, 109.000000)">
                            <path d="M18.875,5.41621796 C18.7520111,5.37049595 18.5893777,5.32213075 18.3945895,5.27638102 C17.6572337,5.10319896 16.6184084,5 15.5000292,5 C14.3816216,5 13.34278,5.103199 12.6054154,5.27638158 C12.410604,5.32213635 12.2479549,5.37050718 12.1249603,5.4162337 L12.1247779,7.06536243 L18.875,7.06536243 L18.875,5.41621796 Z M11.961051,5.4874489 C11.9571485,5.48952153 11.953356,5.49158033 11.9496744,5.49362462 C11.9584625,5.48874471 11.9682367,5.48200233 11.9785472,5.473263 L11.961051,5.4874489 Z M19.9616566,8.06536243 L11.0384018,8.06536243 C11.0139696,8.02192651 11.001169,7.97816113 11,7.93429964 L11,5.0569039 C11,4.47319609 13.014723,4 15.5000292,4 C17.985277,4 20,4.47319609 20,5.0569039 L20,7.93429964 C19.998831,7.97816113 19.9860888,8.02192651 19.9616566,8.06536243 Z" id="Path" fill="#979797"></path>
                            <path d="M10,10 L10,27 L21,27 L21,10 L10,10 Z M22,12 L20,12 L20,15 L22,15 L22,28 L9,28 L9,9 L22,9 L22,12 Z" id="Combined-Shape"></path>
                            <path d="M22,19 L22,27 L27,27 L27,20 C27,19.4477153 26.5522847,19 26,19 L22,19 Z M21,18 L26,18 C27.1045695,18 28,18.8954305 28,20 L28,28 L21,28 L21,18 Z" id="Rectangle-26-Copy-3" fill="#979797"></path>
                            <path d="M3.75746437,17.5914103 C3.31229737,17.7027021 3,18.1026852 3,18.5615528 L3,27 L9,27 L9,16.2807764 L3.75746437,17.5914103 Z M3.51492875,16.6212678 L10,15 L10,28 L2,28 L2,18.5615528 C2,17.6438175 2.62459475,16.8438513 3.51492875,16.6212678 Z" id="Rectangle-26-Copy-4" fill="#979797"></path>
                            <path d="M10,8 L10,9 L21,9 L21,8 L10,8 Z M9,7 L22,7 L22,10 L9,10 L9,7 Z" id="Rectangle-26-Copy" fill="#979797"></path>
                            <path d="M21,9.5 C21,9.22385763 21.2238576,9 21.5,9 C21.7761424,9 22,9.22385763 22,9.5 L22,10.5 C22,10.7761424 21.7761424,11 21.5,11 C21.2238576,11 21,10.7761424 21,10.5 L21,9.5 Z" id="Line-5" fill="#979797"></path>
                            <path d="M10,15.5 C10,15.7761424 9.77614237,16 9.5,16 C9.22385763,16 9,15.7761424 9,15.5 L9,9.5 C9,9.22385763 9.22385763,9 9.5,9 C9.77614237,9 10,9.22385763 10,9.5 L10,15.5 Z" id="Line-6" fill="#979797"></path>
                            <path d="M22,14.5 C22,14.7761424 21.7761424,15 21.5,15 C21.2238576,15 21,14.7761424 21,14.5 L21,12.5 C21,12.2238576 21.2238576,12 21.5,12 C21.7761424,12 22,12.2238576 22,12.5 L22,14.5 Z" id="Line-6-Copy" fill="#979797"></path>
                            <path d="M1,28 L1,29 L29,29 L29,28 L1,28 Z M0,27 L30,27 L30,30 L0,30 L0,27 Z" id="Rectangle-26-Copy-2" fill="#979797"></path>
                            <polygon id="Line-2" fill="#979797" points="16 5 15 5 15 0 16 0"></polygon>
                            <polygon id="Line-3" fill="#979797" points="11.8888889 13 11.8888889 12 19.1111111 12 19.1111111 13"></polygon>
                            <polygon id="Line-3-Copy" fill="#979797" points="11.8888889 16 11.8888889 15 19.1111111 15 19.1111111 16"></polygon>
                            <polygon id="Line-3-Copy-2" fill="#979797" points="11.8888889 19 11.8888889 18 19.1111111 18 19.1111111 19"></polygon>
                            <polygon id="Line-3-Copy-3" fill="#979797" points="11.8888889 22 11.8888889 21 19.1111111 21 19.1111111 22"></polygon>
                            <polygon id="Line-3-Copy-9" fill="#979797" points="11.8888889 25 11.8888889 24 19.1111111 24 19.1111111 25"></polygon>
                            <polygon id="Line-3-Copy-4" fill="#979797" points="5 22 5 21 7 21 7 22"></polygon>
                            <polygon id="Line-3-Copy-7" fill="#979797" points="23 23 23 22 26 22 26 23"></polygon>
                            <polygon id="Line-3-Copy-5" fill="#979797" points="5 20 5 19 7 19 7 20"></polygon>
                            <polygon id="Line-3-Copy-6" fill="#979797" points="5 24 5 23 7 23 7 24"></polygon>
                            <polygon id="Line-3-Copy-8" fill="#979797" points="23 25 23 24 26 24 26 25"></polygon>
                            <path d="M22,18.5 C22,18.7761424 21.7761424,19 21.5,19 C21.2238576,19 21,18.7761424 21,18.5 L21,16.5 C21,16.2238576 21.2238576,16 21.5,16 C21.7761424,16 22,16.2238576 22,16.5 L22,18.5 Z" id="Line-4" fill="#979797"></path>
                        </g>
                    </g>
                </g>
            </svg>
            </div>
            <div class="div_type"> 非银类</div>
        </li>
    </ul>
    <div style="width: 100%;height: 0.2rem;margin-top:0.02rem;background: -webkit-gradient(linear, 0% 0%,0% 100%, from(#f0f0f0) ,to(transparent));"></div>
</header>

<div class="wraper swiper-container">
    <div class="swiper-wrapper">
      <div class="swiper-slide swiper-slide-active">
        <section>
            <!--银行类-->


            <?php if(is_array($list['bank'])): $i = 0; $__LIST__ = $list['bank'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Introduce/product_pic',array('id'=>$vo['id']));?>">
                    <div class="wrapper">
                        <div class="pic_icon"><img src="/Public<?php echo ($vo["source_logurl"]); ?>"></div>
                        <div class="text_word">
                            <h4><?php echo ($vo["name"]); ?></h4>
                            <p><?php echo ($vo["trait"]); ?></p>
                        </div>
                        <div class="arrow_icon">
                            <svg width="0.18rem" height="0.24rem" viewBox="0 0 8 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch -->
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.442764946">
                                    <g id="填写-01-copy" transform="translate(-331.000000, -291.000000)" fill="#666666">
                                        <polygon id="Shape-Copy-5" transform="translate(335.000000, 298.000000) scale(1, -1) translate(-335.000000, -298.000000) " points="331 291.808375 331.828214 291 339 298 331.828214 305 331 304.191625 337.343573 298"></polygon>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>



        </section>
      </div>
      <div class="swiper-slide swiper-slide-active">
        <section>
            <!--非银类-->
            <?php if(is_array($list['nbank'])): $i = 0; $__LIST__ = $list['nbank'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Introduce/product_pic',array('id'=>$vo['id']));?>">
                    <div class="wrapper">
                        <div class="pic_icon"><img src="/Public<?php echo ($vo["source_logurl"]); ?>"></div>
                        <div class="text_word">
                            <h4><?php echo ($vo["name"]); ?></h4>
                            <p><?php echo ($vo["trait"]); ?></p>
                        </div>
                        <div class="arrow_icon">
                            <svg width="0.18rem" height="0.24rem" viewBox="0 0 8 14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch -->
                                <desc>Created with Sketch.</desc>
                                <defs></defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.442764946">
                                    <g id="填写-01-copy" transform="translate(-331.000000, -291.000000)" fill="#666666">
                                        <polygon id="Shape-Copy-5" transform="translate(335.000000, 298.000000) scale(1, -1) translate(-335.000000, -298.000000) " points="331 291.808375 331.828214 291 339 298 331.828214 305 331 304.191625 337.343573 298"></polygon>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>

        </section>
      </div>
    </div>
</div>



<script type="text/javascript" src="/Public/Weixin/js/rem.js"></script>
<script src="/Public/Weixin/js/swiper-3.4.2.min.js"></script>


<script language="javascript">

    $("header ul li").click(function(){

        var li_click = $(this).attr('ico');
        if(li_click === '1'){
            $(this).find('div[ico="11"]').hide();
            $(this).find('div[ico="12"]').show();
            $('li.li_svg_ico[ico="2"]').find('div[ico="21"]').show();
            $('li.li_svg_ico[ico="2"]').find('div[ico="22"]').hide();
        }else if(li_click === '2'){
            $(this).find('div[ico="21"]').hide();
            $(this).find('div[ico="22"]').show();
            $('li.li_svg_ico[ico="1"]').find('div[ico="11"]').show();
            $('li.li_svg_ico[ico="1"]').find('div[ico="12"]').hide();
        }
        $(this).addClass("color").siblings().removeClass("color");
        // $(this).find(".show").show();
        // $(this).find(".show").next().hide();
        // $(this).next().find(".show").show();
        // $(this).next().find(".show").next().hide();
        mySwiper.slideTo($(this).index())
    });

    var mySwiper = new Swiper('.swiper-container', {
        onTransitionStart: function(swiper) {
            //你的事件
            $("header ul li").eq(swiper.activeIndex).addClass("color").siblings().removeClass("color")
            // console.log(swiper.activeIndex);
            if(swiper.activeIndex === 0){
                $('li.li_svg_ico[ico="1"]').find('div[ico="11"]').hide();
                $('li.li_svg_ico[ico="1"]').find('div[ico="12"]').show();
                $('li.li_svg_ico[ico="2"]').find('div[ico="21"]').show();
                $('li.li_svg_ico[ico="2"]').find('div[ico="22"]').hide();
            }else if(swiper.activeIndex === 1){
                $('li.li_svg_ico[ico="2"]').find('div[ico="21"]').hide();
                $('li.li_svg_ico[ico="2"]').find('div[ico="22"]').show();
                $('li.li_svg_ico[ico="1"]').find('div[ico="11"]').show();
                $('li.li_svg_ico[ico="1"]').find('div[ico="12"]').hide();
            }

        }
    })
    // $(".swiper-slide").css("width","6rem")




</script>










</body>
</html>