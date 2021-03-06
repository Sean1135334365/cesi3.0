<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单信息</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/style.css" />
    <script type="text/javascript" src="/Public/Admin/Js/jquery.js"></script>
    <!--<script type="text/javascript" src="/Public/Admin/Js/jquery.sorted.js"></script>-->
    <script type="text/javascript" src="/Public/Admin/Js/bootstrap.js"></script>
    <script type="text/javascript" src="/Public/Admin/Js/ckform.js"></script>
    <script type="text/javascript" src="/Public/Admin/Js/common.js"></script>
    <script type="text/javascript" src="/Public/Admin/Js/rem.js"></script>
    <!--<style type="text/css">
      body {
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>-->
</head>
<!--<link rel="stylesheet" type="text/css" href="/Public/css/diyUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="/Public/css/diyUpload/css/diyUpload.css">
<script type="text/javascript" src="/Public/js/diyUpload/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="/Public/js/diyUpload/js/diyUpload.js"></script>-->
<!--<script type="text/javascript" src="/Public/Admin/assets/js/lrz.min.js"></script>-->
<script type="text/javascript" src="/Public/Admin/Js/image-zooming.js"></script>
<script type="text/javascript" src="/Public/Admin/Js/wx_order_update.js"></script>

<style>


    .table td,.table th{
        border-top: 0;
    }
    .table_border{
        border: solid 1px #ccc !important;
    }

    .table,td,tr{
        border: none;
    }
    .table tr {
        font-size: 14px;
    }

    .table tr th,
    .table tr td {
        text-align: center;
        vertical-align: middle;
    }

    .table tr td.td_left,
    .table tr th.td_left {
        width: 10%;
        min-width: 130px;
        text-align: left ;
        vertical-align: middle;
    }

    .table tr td.td_right,
    .table tr th.td_right {
        width: 40%;
        text-align: center ;
        vertical-align: middle;
    }


    .table img {
        max-width: 200px;
        max-height: 120px;
        margin: 10px;
        cursor: pointer;
    }
    /*.table select{*/
    /*padding:5px 25px;*/
    /*}*/

    .wx_file_img {
        position: absolute;
        z-index: -111;
    }

    button.img_file {
        position: relative;
        width: 100px;
        height: 100px;
        margin: 10px;
        padding: 0;
        border: 0;
        background-color: transparent;
        cursor: pointer;
    }

    button.img_file img.add_img {
        width: 100px;
        margin: 0;
    }

    button.img_file input[type=file].sp_file_img {
        width: 100px;
        height: 100px;
        position: absolute;
        z-index: 10;
        opacity: 0;
        top: 0;
        left: 0;
        cursor: pointer;
    }
    div.large {
        height: 80%;
        width: 80vw;
        min-width: 320px;
        position: fixed;
        top: 50%;
        left: 50%;
        z-index: 99;
        border: 1px solid #ccc;
        background-color: #fff;
        display: none;
        overflow: hidden;
        transform: translate3d(-50%,-50%,0px);
        -webkit-transform: translate3d(-50%,-50%,0px);
        -moz-transform: translate3d(-50%,-50%,0px);
        -ms-transform: translate3d(-50%,-50%,0px);
        -o-transform: translate3d(-50%,-50%,0px);
    }
    div.large svg{
        position: absolute;
        width: 6%;
        height: 100%;
        top: 0%;
        z-index: 10;
    }
    div.large svg.turnL{
        left: 0%;
    }
    div.large svg.turnR{
        right:0%;
    }
    svg{
        background: #fff;
        opacity: 0.4;
        transition: all 0.3s linear;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s linear;
        -ms-transition: all 0.3s linear;
        -o-transition: all 0.3s linear;
    }
    svg:hover{
        background: #333;
        opacity: 0.4;
    }
    div#banner{
        width: 100%;
        height: 20%;
        overflow-x: auto;
        overflow-y: hidden;
        text-align: center;
        position: absolute;
        bottom: 0px;
        left: 0px;
        z-index: 11;
        transition: all 0.3s linear;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s linear;
        -ms-transition: all 0.3s linear;
        -o-transition: all 0.3s linear;
        background-color: #fff;
    }
    div#banner nav{
        width: 80vw;
        height: 3vh;
        box-sizing: border-box;
        border-top:1px solid #ccc;
        border-bottom: 1px solid #ccc;
        text-align: center;
    }
    div#banner nav p:first-child{
        border-left: 1px solid #ccc;
    }
    div#banner nav p{
        display: inline-block;
        line-height: 100%;
        height: 2vh;
        line-height: 2.1vh;
        margin: 0.5vh 0;
        color: #666;
        cursor: pointer;
        padding: 0 16px;
        border-right: 1px solid #ccc; 
        vertical-align: top;
        box-sizing: border-box;
    }
    div#banner div{
        float: left;
        width: 13vh;
        height: 80%;
        position: relative;
        box-sizing: border-box;
        border: 1px solid #ccc;
        cursor: pointer;
        transform: scale(0.8);
        -webkit-transform: scale(0.8);
        -moz-transform: scale(0.8);
        -ms-transform: scale(0.8);
        -o-transform: scale(0.8);
    }
    div#banner div img{
        width: 100%;
        max-width: 100%;
        max-height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        margin: auto;
    }
    div#contairner{
        width: 88%;
        height: 80%;
        margin:0 auto;
        transition: all 0.3s linear;
        -webkit-transition: all 0.3s linear;
        -moz-transition: all 0.3s linear;
        -ms-transition: all 0.3s linear;
        -o-transition: all 0.3s linear;
    }
    div.img_d {
        height: 100%;
        width: 100%;
        max-width: 100%;
        max-height: 100%;
        overflow: hidden;
        text-align: center;
        position: relative;
        background-color: #dedede;
    }

    div.img_d img {
        width: 50%;
        max-height: 100%;
        display: block;
        margin: 0 auto;
        position: absolute;
        top: 50%;
        left: 50%;
        transform-origin: 0px 0px;
        -webkit-transform-origin: 0px 0px;
        -moz-transform-origin: 0px 0px;
        -ms-transform-origin: 0px 0px;
        -o-transform-origin: 0px 0px;
        transform: scale(1) translate3d(-50%,-50%,0px);
        -webkit-transform: scale(1) translate3d(-50%,-50%,0px);
        -moz-transform: scale(1) translate3d(-50%,-50%,0px);
        -ms-transform: scale(1) translate3d(-50%,-50%,0px);
        -o-transform: scale(1) translate3d(-50%,-50%,0px);
        transition: transform 0.3s linear;
        -webkit-user-select:none;
        -moz-user-select:none;
        -ms-user-select:none;
        user-select:none;
    }

    div.widget-title {
        background-color: #eaeaea;
        padding: 1px;
    }

    table.table>tbody>tr>td.td_right{
        width: 20%;
    }
    table.table>tbody>tr>td.td_left{
        width:30%;
        vertical-align: bottom;
    }

    .table tr td img{
        max-width: 100px;
        max-height: 60px;
        margin:0 0 0 10px;
    }

    h5 {
        margin: 5px 20px;
    }

    input{
        padding: 4px 4px 2px 6px !important;
    }
    input[type='text']{
        margin-bottom: 20px !important;
    }


    @media only screen and (min-width:641px){
        .pc_hidden{
            display: none !important;
        }
    }



    @media only screen and (max-width:640px) {
        body{
            padding-left: 0.1rem ;
            padding-right: 0.1rem ;
        }
        #wrapper{
            margin:0.1rem 0 !important;
            padding: 0 !important;
        }
        .table tr{
            font-size: 0.2rem;
        }
        .table tr td{
            text-align: left !important;
        }
        .table tr td.td_left{
            min-width:0 !important;
        }
        table.table>tbody>tr>td.td_left{
            width: 82%;
        }
        table.table>tbody>tr>td.td_right{
            width: 50%;
        }
        .picture_left{
            display: none;
        }

        .download_show{
            display: none;
        }
        .download_hidden{
            display: block !important;
        }

        .table tr td img{
           margin-top: 0.1rem;
            max-width:0.8rem;
            max-height:0.4rem;
        }
        #dashed{
            border-bottom: none !important;
        }


    }
    .head-tittles {
        display: inline-block;
    }
    .headright {
        position: relative;
        right: -61.5%;
    }

</style>


<body>

<div id="wrapper" width="80%" height="100%" style="margin: 0px 20px;padding: 20px;">

    <div class="widget-box">
        <div class="widget-content nopadding">
            <div class="widget-title table_border">
                <h5 class="head-tittles">产品名称：<?php echo ($product_name); ?>&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                <input type="hidden" name="order_number" value="<?php echo ($numbering["order_number"]); ?>">
                <!--<h5 class="head-tittles headright" >订单编号:<?php echo ($numbering["order_number"]); ?></h5>-->
                <font class="head-tittles headright" color="#66666">订单编号:<?php echo ($numbering["order_number"]); ?></font>
            </div>
            <div class="widget-content nopadding">
                <table class="table table_border" style="border-top: none !important;">
                    <tr style="height: 80px !important;">
                        <td>
                            微信：&nbsp;<?php echo ($wx_nickname); ?>
                        </td>
                        <td>贷款金额：&nbsp;<?php echo ($numbering["loanamount"]); ?> &nbsp;元
                        <td>
                            借款期限：&nbsp;
                            <?php if($numbering["number"] == 3): ?>3个月<?php endif; ?>
                            <?php if($numbering["number"] == 6): ?>6个月<?php endif; ?>
                            <?php if($numbering["number"] == 12): ?>12个月<?php endif; ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="widget-content nopadding">
                <table class="table table_border">
                    <tr style="height: 34px;">
                        <th class="td_left" style="text-align: -webkit-left;text-indent: 1em;border-bottom: solid 1px #ccc;border-right:solid 1px #ccc ;">权利人信息：
                            （<?php echo ($numbering["p_power_num"]); ?>人）
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <?php $__FOR_START_23929__=0;$__FOR_END_23929__=$numbering["p_power_num"];for($i=$__FOR_START_23929__;$i < $__FOR_END_23929__;$i+=1){ ?><table class="table" style="border-bottom: dashed 1px #ccc;">
                                    <tr style="overflow: hidden;">
                                        <td colspan="3" >权利人
                                            <?php echo ($i+1); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%" class="td_right">姓名：</td>
                                        <td class="td_left">
                                            <?php echo ($obligee_name[$i+1]["obligee"]); ?>
                                        </td>


                                        <td class="td_right" class="picture_left" rowspan="11" style="width:50%">

                                            <table class="picture_left" style="width:100%;">
                                                <tr>
                                                    <td class="td_right">身份证正反面：</td>
                                                    <td class="td_left" style="width: 100%;">
                                                        <?php if(is_array($identity_card_frontal[$i+1])): $key = 0; $__LIST__ = $identity_card_frontal[$i+1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="identity_card_frontal<?php echo ($i+1); echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td_right" >配偶身份证正反面：</td>
                                                    <td class="td_left">
                                                        <?php if(is_array($identity_card_mate[$i+1])): $key = 0; $__LIST__ = $identity_card_mate[$i+1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="identity_card_mate<?php echo ($i+1); echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="td_right">婚姻证明：</td>
                                                    <td class="td_left">
                                                        <?php if(is_array($marriage_certificate[$i+1])): $key = 0; $__LIST__ = $marriage_certificate[$i+1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="marriage_certificate<?php echo ($i+1); echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </td>
                                                </tr>
                                            </table>

                                        </td>
                                    </tr>


                                    <tr>
                                        <td class="td_right">是否成年人：</td>
                                        <td class="td_left">
                                            <?php if($adult[$i+1] == 1): ?>&nbsp;已成年&nbsp;&nbsp;<?php endif; ?>
                                            <?php if($adult[$i+1] == 2): ?>&nbsp;未成年&nbsp;&nbsp;<?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td_right">身份证号码：</td>
                                        <td class="td_left">
                                            <?php echo ($obligee_identification_id[$i+1]["obligee"]); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td_right">手机号码：</td>
                                        <td class="td_left">
                                            <?php echo ($obligee_mobile[$i+1]); ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="td_right">婚姻状况：</td>
                                        <td class="td_left">
                                            <?php if($matrimony[$i+1] == 1 ): ?>未婚<?php endif; ?>
                                            <?php if($matrimony[$i+1] == 2 ): ?>已婚<?php endif; ?>
                                            <?php if($matrimony[$i+1] == 3 ): ?>离异再婚<?php endif; ?>
                                            <?php if($matrimony[$i+1] == 4 ): ?>离异未婚<?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>

                                        <td class="td_right">配偶是否权利人：</td>
                                        <td class="td_left">
                                            <?php if($mate_y_n[$i+1] == 1): ?>&nbsp;是&nbsp;&nbsp;<?php endif; ?>
                                            <?php if($mate_y_n[$i+1] == 2): ?>&nbsp;否&nbsp;&nbsp;<?php endif; ?>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="td_right">配偶姓名：</td>
                                        <td class="td_left">
                                            <?php echo ($obligee_name[$i+1]["mate"]); ?>
                                        </td>
                                    </tr>
                                    <tr style="border-bottom: dashed 1px #ccc;" id="dashed">
                                        <td class="td_right">配偶身份证号码：</td>
                                        <td class="td_left">
                                            <?php echo ($obligee_identification_id[$i+1]["mate"]); ?>
                                        </td>
                                    </tr>


                                    <tr class="pc_hidden">
                                        <td  >身份证正反面：</td>
                                        <td   style="width: 100%;">
                                            <?php if(is_array($identity_card_frontal[$i+1])): $key = 0; $__LIST__ = $identity_card_frontal[$i+1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="identity_card_frontal<?php echo ($i+1); echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </td>
                                    </tr>
                                    <tr class="pc_hidden">
                                        <td  id="td_right2">配偶身份证正反面：</td>
                                        <td >
                                            <?php if(is_array($identity_card_mate[$i+1])): $key = 0; $__LIST__ = $identity_card_mate[$i+1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="identity_card_mate<?php echo ($i+1); echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </td>
                                    </tr>
                                    <tr class="pc_hidden">
                                        <td  id="td_right3">婚姻证明：</td>
                                        <td >
                                            <?php if(is_array($marriage_certificate[$i+1])): $key = 0; $__LIST__ = $marriage_certificate[$i+1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="marriage_certificate<?php echo ($i+1); echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </td>
                                    </tr>


                                </table><?php } ?>

                        </td>
                    </tr>
                </table>
            </div>
            <div class="widget-title" style="border:solid 1px #ccc">
                <h5>材料信息</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table_border" style="border-top: none !important;">
                    <tr style="border-bottom: dashed 1px #ccc;">
                        <td class="td_right">户口簿照片：</td>
                        <td class="td_left" style="width: 90% !important;">
                            <?php if(is_array($household_register)): $key = 0; $__LIST__ = $household_register;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="household_register<?php echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_right">房产证照片：</td>
                        <td class="td_left" style="width: 90% !important;">
                            <?php if(is_array($pledge_house)): $key = 0; $__LIST__ = $pledge_house;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="pledge_house<?php echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_right">备用房：</td>
                        <td class="td_left" style="width: 90% !important;">
                            <?php if($mate_y_n[$i+1] == 1): ?>&nbsp;是&nbsp;&nbsp;<?php endif; ?>
                            <?php if($mate_y_n[$i+1] == 2): ?>&nbsp;否&nbsp;&nbsp;<?php endif; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: dashed 1px #ccc;">
                        <td class="td_right">备用房照片：</td>
                        <td class="td_left" style="width: 90% !important;">
                            <?php if(is_array($standby_house)): $key = 0; $__LIST__ = $standby_house;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="standby_house<?php echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                    </tr>
                    <!--<tr>
                      <th colspan="2">申请书</th>
                    </tr>-->
                    <tr>
                        <td class="td_right">申请书照片：</td>
                        <td class="td_left" style="width: 90% !important;">
                            <?php if(is_array($application_form)): $key = 0; $__LIST__ = $application_form;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="application_form<?php echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                    </tr>

                </table>
            </div>
            <div class="widget-title"style="border:solid 1px #ccc">
                <h5>附加资料（可选项）</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table_border"style="border-top: none !important;">
                    <tr style="border-bottom: dashed 1px #ccc;">
                        <td class="td_right">征信报告：</td>
                        <td class="td_left" style="width: 90% !important;">
                            <?php if(is_array($credit_report)): $key = 0; $__LIST__ = $credit_report;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="credit_report<?php echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: dashed 1px #ccc;">
                        <td class="td_right">产调：</td>
                        <td class="td_left" style="width: 90% !important;">
                            <?php if(is_array($estate_survey)): $key = 0; $__LIST__ = $estate_survey;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="estate_survey<?php echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="td_right">银行流水：</td>
                        <td class="td_left" style="width: 90% !important;">
                            <?php if(is_array($bank)): $key = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><img src="/Public<?php echo ($vo); ?>" class="img_x" img="bank<?php echo ($key); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                    </tr>

                </table>
            </div>
            <!--<div class="widget-content nopadding download_show">
                <table class="table">
                    <tr style="font-size:18px;font-weight:bold;">
                        <th class="td_left">订单状态：</th>
                        <th class="td_right">
                            <?php if($numbering["wx_state"] == 0 ): ?>已提交<?php endif; ?>
                            <?php if($numbering["wx_state"] == 1 ): ?>审核中<?php endif; ?>
                            <?php if($numbering["wx_state"] == 7 ): ?>已进件<?php endif; ?>
                            <?php if($numbering["wx_state"] == 3 ): ?>未通过<?php endif; ?>
                            <?php if($numbering["wx_state"] == 2 ): ?>审核通过<?php endif; ?>
                            <?php if($numbering["wx_state"] == 6 ): ?>待放款<?php endif; ?>
                            <?php if($numbering["wx_state"] == 4 ): ?>完成放款<?php endif; ?>
                            <?php if($numbering["wx_state"] == 5 ): ?>结清<?php endif; ?>
                        </th>
                        <th class="td_left" style="font-size:18px;font-weight:bold;width: 24%;">是否需要下载文件：</th>
                        <th class="td_right">
                            <input type="submit" name="button" id="download" class="btn btn-primary" value="下载">
                        </th>
                    </tr>
                </table>

            </div>

            <div class="widget-content nopadding download_hidden" style="display: none">
                <table class="table">
                    <tr style="font-size:16px;font-weight:bold;">
                        <th>订单状态：</th>
                        <th >
                            <?php if($numbering["wx_state"] == 0 ): ?>已提交<?php endif; ?>
                            <?php if($numbering["wx_state"] == 1 ): ?>审核中<?php endif; ?>
                            <?php if($numbering["wx_state"] == 7 ): ?>已进件<?php endif; ?>
                            <?php if($numbering["wx_state"] == 3 ): ?>未通过<?php endif; ?>
                            <?php if($numbering["wx_state"] == 2 ): ?>审核通过<?php endif; ?>
                            <?php if($numbering["wx_state"] == 6 ): ?>待放款<?php endif; ?>
                            <?php if($numbering["wx_state"] == 4 ): ?>完成放款<?php endif; ?>
                            <?php if($numbering["wx_state"] == 5 ): ?>结清<?php endif; ?>
                        </th>

                    </tr>
                </table>

            </div>


            <div class="widget-content nopadding download_hidden" style="display: none;font-size: 16px">
                <table class="table">
                    <tr style="font-size:16px;font-weight:bold;">
                        <th style="font-size:16px;font-weight:bold;width: 60%;">是否需要下载文件：</th>
                        <th >
                            <input type="submit" name="button" id="download" class="btn btn-primary" value="下载">
                        </th>

                    </tr>
                </table>

            </div>

        </div>-->
    </div>

</div>
<div class="large">
    <svg t="1515133518042" class="icon turnL" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4589" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200"><defs><style type="text/css"></style></defs><path d="M376.2368 533.0176c-12.4992 12.4992-32.7552 12.4992-45.2544 0l0 0c-12.4992-12.4992-12.4992-32.7552 0-45.2544l316.7808-316.7808c12.4992-12.4992 32.7552-12.4992 45.2544 0l0 0c12.4992 12.4992 12.4992 32.7552 0 45.2544L376.2368 533.0176z" p-id="4590"></path><path d="M693.0176 807.7632c12.4992 12.4992 12.4992 32.7552 0 45.2544l0 0c-12.4992 12.4992-32.7552 12.4992-45.2544 0L330.9824 536.2368c-12.4992-12.4992-12.4992-32.7552 0-45.2544l0 0c12.4992-12.4992 32.7552-12.4992 45.2544 0L693.0176 807.7632z" p-id="4591"></path></svg>
    <svg t="1515133510400" class="icon turnR" style="" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="4478" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200"><defs><style type="text/css"></style></defs><path d="M647.763 490.982c12.499-12.499 32.755-12.499 45.253 0v0c12.499 12.499 12.499 32.755 0 45.253l-316.781 316.781c-12.499 12.499-32.755 12.499-45.253 0v0c-12.499-12.499-12.499-32.755 0-45.253l316.781-316.781z" p-id="4479"></path><path d="M330.982 216.237c-12.499-12.499-12.499-32.755 0-45.253v0c12.499-12.499 32.755-12.499 45.253 0l316.781 316.781c12.499 12.499 12.499 32.755 0 45.253v0c-12.499 12.499-32.755 12.499-45.253 0l-316.781-316.781z" p-id="4480"></path></svg>
    <div id="contairner">
        <div class="img_d" id="remove">
            <img src="" alt="" img=''>
        </div>
    </div>
    <div id="banner">
        <nav>
            <p id="banner_p">图片列表</p>
            <p id="banner_reset">合适尺寸</p>
            <p id="banner_close" style="font-weight:bold;">关闭</p>
        </nav>
    </div>
</div>
</body>
<script>
       

    /*$('#value_type').click(function() {
      var value = $(this).val();
      if(value == 0) {
        $('#download').hide()
      } else {
        $('#download').show()
      }
    })
    $('#value_type2').click(function() {
      var value = $(this).val();
      if(value == 0) {
        $('#download').hide()
      } else {
        $('#download').show()
      }
    })
    /!*    $('#value_type').click(function(){
     var value = $('#value_type').val();
     if(value==0){
     $('#download').hide()
     }else{
     $('#download').show()
     }
     })*!/*/

    //  var public_img = '/Public';
    //
    //  var img_url = '<?php echo U("File/img_file2",array("type"=>"weixin"));?>';
</script>
</html>