<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>

  <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/bootstrap-responsive.css" />
  <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/style.css" />
  <script type="text/javascript" src="/Public/Admin/Js/jquery.js"></script>
  <!--<script type="text/javascript" src="/Public/Admin/Js/jquery.sorted.js"></script>-->
  <script type="text/javascript" src="/Public/Admin/Js/bootstrap.js"></script>
  <script type="text/javascript" src="/Public/Admin/Js/ckform.js"></script>
  <script type="text/javascript" src="/Public/Admin/Js/common.js"></script>

  <style type="text/css">
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
  </style>

</head>
<body>

<!--<link rel="stylesheet" type="text/css" href="/Public/css/diyUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="/Public/css/diyUpload/css/diyUpload.css">
<script type="text/javascript" src="/Public/js/diyUpload/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="/Public/js/diyUpload/js/diyUpload.js"></script>-->
<script type="text/javascript" src="/Public/Admin/assets/js/lrz.min.js"></script>
<script type="text/javascript" src="/Public/Admin/Js/image-zooming.js"></script>

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
        width: 1%;
        min-width: 130px;
        text-align: right !important;
        vertical-align: middle;
    }

    .table tr td.td_right,
    .table tr th.td_right {
        width: 44%;
        text-align: left !important;
    }

    .table img {
        max-width: 60px;
        max-height: 60px;
        margin: 10px;
        cursor: pointer;
    }
    .wx_file_img {
        position: absolute;
        z-index: -111;
    }

    button.img_file {
        position: relative;
        width: 50px;
        height: 50px;
        margin: 10px;
        padding: 0;
        border: 0;
        background-color: transparent;
        cursor: pointer;
    }

    button.img_file img.add_img {
        width: 50px;
        margin: 0;
    }

    button.img_file input[type=file].sp_file_img {
        width: 50px;
        height: 50px;
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
        max-width: 100%;
        max-height: 100%;
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        margin: auto;
    }
    div.widget-title {
        background-color: #eaeaea;
        padding: 1px;
    }

    h5 {
        margin: 5px 20px;
    }

    input{
        padding: 4px 4px 2px 6px !important;
    }
    input,select{
        margin-bottom: 0 !important;
    }

    input[type="radio"], input[type="checkbox"]{
        margin: 0 !important;
    }

    .td_top{
        margin-top: 20px !important;
    }
    .img_remove{
        position: relative;
        display: inline-block;
    }
    .img_remove::after{
        content: '';
        background-image: url('/Public/Admin/assets/images/close.png');
        background-size: 10px 10px;
        width: 10px;
        height: 10px;
        position: absolute;
        top: 5px;
        right: 5px;
        cursor: pointer;
        z-index: 9;
    }

</style>

<div id="wrapper" width="100%" height="100%" style="margin: 0px 20px;padding: 20px;">

    <form action="<?php echo U("Order/wx_uplode");?>" method="post" id="download_from" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo ($numbering["id"]); ?>">
    <div class="widget-box">
        <div class="widget-content nopadding">
            <div class="widget-title table_border">
                <h5>订单编号:<?php echo ($numbering["order_number"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;</h5>
                <input type="hidden" name="order_number" value="<?php echo ($numbering["order_number"]); ?>">
            </div>
            <div class="widget-content nopadding">
                <table class="table table_border" style="border-top: none !important;">
                    <!--<tr>
   <th>微信</th>-->
                    <!--<th>贷款人姓名</th>-->
                    <!--<th>身份证号</th>-->
                    <!--<th>手机号</th>-->
                    <!--<th>借款金额</th>
<th>借款期限</th>-->
                    <!--</tr>-->
                    <tr style="height: 80px !important;">
                        <td>
                            微信：&nbsp;&nbsp;<?php echo ($wx_nickname); ?>
                        </td>
                        <!--<td><input style="text-align:center;" type="text" name="username" id="username" value="<?php echo ($list['username']); ?>" placeholder="未录入申请人姓名"></td>-->
                        <!--<td><input style="text-align:center;" type="text" name="identification_id" id="identification_id" value="<?php echo ($list['identification_id']); ?>" placeholder="未录入申请人身份证号码"></td>-->
                        <!--<td><input style="text-align:center;" type="text" name="usermobile" id="usermobile" value="<?php echo ($list['usermobile']); ?>" placeholder="未录入申请人手机号码"></td>-->
                        <td>贷款金额：&nbsp;&nbsp;<input class="af_input" name="loanamount" type="number" value="<?php echo ($numbering["loanamount"]); ?>" style="width:120px;margin-bottom: 4px;" id="loanamount" placeholder="请输入借款金额" pattern="^[0-9,]+$" data-pattern="^[0-9,]+$" data-required="true" data-descriptions="loanamount" step="0.0001"> &nbsp;元
                            <!--<input style="text-align:right;" type="text" name="loanamount" id="loanamount" value="<?php echo ($list['loanamount']); ?>">元</td>-->
                        <td>
                            借款期限：&nbsp;&nbsp;<!--<input style="text-align:right;" type="text" name="number" value="<?php echo ($list['number']); ?>">个月-->
                            <select name="number" val="<?php echo ($numbering["number"]); ?>" id="number" style="width:120px;height: 28px;margin-bottom: 4px;">
                                <option value="3" <?php if($numbering["number"] == 3): ?>selected="selected"<?php endif; ?> >3个月</option>
                                <option value="6" <?php if($numbering["number"] == 6): ?>selected="selected"<?php endif; ?> >6个月</option>
                                <option value="12" <?php if($numbering["number"] == 12): ?>selected="selected"<?php endif; ?> >12个月</option>
                            </select>
                        </td>
                    </tr>
                </table>
            </div>
            <!--<div class="widget-title">
 <h5>权利人信息</h5>
</div>-->
            <div class="widget-content nopadding">
                <table class="table table_border">
                    <tr style="height: 34px;">
                        <th  style="text-indent: 1em;border-bottom: solid 1px #ccc;border-right:solid 1px #ccc ;">权利人信息：<!--</th>-->
                            <!--<th class="td_right">-->
                            （<?php echo ($numbering["p_power_num"]); ?>人）
                            <input type="hidden" name="p_power_num" value="<?php echo ($numbering["p_power_num"]); ?>">
                        </th>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <?php $__FOR_START_15346__=0;$__FOR_END_15346__=$numbering["p_power_num"];for($i=$__FOR_START_15346__;$i < $__FOR_END_15346__;$i+=1){ ?><table class="table" style="border-bottom: dashed 1px #ccc;">
                                    <tr class="td_top">
                                        <td colspan="4">权利人
                                            <?php echo ($i+1); ?>
                                        </td>
                                    </tr>
                                    <tr class="td_top">
                                        <td class="td_left">姓&#12288;&#12288;&#12288;&#12288;&#12288;名：</td>
                                        <td class="td_right">
                                            <input type="text" name="obligee_name[<?php echo ($i+1); ?>][obligee]" id="<?php echo ($i+1); ?>_obligee" value="<?php echo ($obligee_name[$i+1]["obligee"]); ?>" placeholder="未录入权利人姓名">
                                        </td>

                                        <td class="td_left">是&#12288;否&#12288;成&#12288;年：</td>
                                        <td class="td_right">
                                            <input type="radio" name="adult[<?php echo ($i+1); ?>]" value="1" <?php if($adult[$i+1] == 1): ?>checked="checked"<?php endif; ?> >&nbsp;已成年&nbsp;&nbsp;
                                            <input type="radio" name="adult[<?php echo ($i+1); ?>]" value="2" <?php if($adult[$i+1] == 2): ?>checked="checked"<?php endif; ?> >&nbsp;未成年&nbsp;&nbsp;
                                        </td>
                                    </tr>
                                    <tr class="td_top">
                                        <td class="td_left">身&nbsp;&nbsp;份&nbsp;&nbsp;证&nbsp;&nbsp;号&nbsp;&nbsp;码：</td>
                                        <td class="td_right">
                                            <input type="text" name="obligee_identification_id[<?php echo ($i+1); ?>][obligee]" id="obligee_identification_id<?php echo ($i+1); ?>_obligee" value="<?php echo ($obligee_identification_id[$i+1]["obligee"]); ?>" placeholder="未录入权利人身份证号码">
                                        </td>

                                        <td class="td_left">手&#12288;机&#12288;号&#12288;码：</td>
                                        <td class="td_right">
                                            <input type="text" name="obligee_mobile[<?php echo ($i+1); ?>]" id="obligee_mobile<?php echo ($i+1); ?>" value="<?php echo ($obligee_mobile[$i+1]); ?>" placeholder="未录入权利人手机号码">
                                        </td>
                                    </tr>

                                    <tr class="td_top">
                                        <td class="td_left">婚&#12288;姻&#12288;状&#12288;况：</td>
                                        <td class="td_right  setcolspan5 setcolspan1" colspan="1">
                                            <select name="matrimony[<?php echo ($i+1); ?>]" val="<?php echo ($matrimony[$i+1]); ?>" class="select_married" style="width:100px;">
                                                <option value="1" <?php if($matrimony[$i+1] == 1 ): ?>selected="selected"<?php endif; ?> >未婚</option>
                                                <option value="2" <?php if($matrimony[$i+1] == 2 ): ?>selected="selected"<?php endif; ?> >已婚</option>
                                                <option value="3" <?php if($matrimony[$i+1] == 3 ): ?>selected="selected"<?php endif; ?> >离异再婚</option>
                                                <option value="4" <?php if($matrimony[$i+1] == 4 ): ?>selected="selected"<?php endif; ?> >离异未婚</option>
                                            </select>
                                        </td>
                                        <td class="td_left wife_msg">配偶是否权利人：</td>
                                        <td class="td_right wife_msg">
                                            <input type="radio" name="mate_y_n[<?php echo ($i+1); ?>]" value="1" <?php if($mate_y_n[$i+1] == 1): ?>checked="checked"<?php endif; ?>>&nbsp;是&nbsp;&nbsp;
                                            <input type="radio" name="mate_y_n[<?php echo ($i+1); ?>]" value="2" <?php if($mate_y_n[$i+1] == 2): ?>checked="checked"<?php endif; ?>>&nbsp;否&nbsp;&nbsp;
                                        </td>

                                    </tr>
                                    <tr class="td_top wife_msg">
                                        <td class="td_left">配&#12288;偶&#12288;姓&#12288;名：</td>
                                        <td class="td_right">
                                            <input type="text" name="obligee_name[<?php echo ($i+1); ?>][mate]" id="obligee_name<?php echo ($i+1); ?>_mate" value="<?php echo ($obligee_name[$i+1]["mate"]); ?>" placeholder="未录入权利人姓名">
                                        </td>

                                        <td class="td_left">配偶身份证号码：</td>
                                        <td class="td_right">
                                            <input type="text" name="obligee_identification_id[<?php echo ($i+1); ?>][mate]" id="obligee_identification_id[<?php echo ($i+1); ?>]_mate" value="<?php echo ($obligee_identification_id[$i+1]["mate"]); ?>" placeholder="未录入权利人身份证号码">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td_left">身&#12288;份&#12288;证：</td>
                                        <td class="td_right setcolspan5">
                                            <?php if(is_array($identity_card_frontal[$i+1])): $key = 0; $__LIST__ = $identity_card_frontal[$i+1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="identity_card_frontal<?php echo ($i+1); echo ($key); ?>">
                                                    <input type="hidden" name="identity_card_frontal[<?php echo ($i+1); ?>][]" img="identity_card_frontal<?php echo ($i+1); echo ($key); ?>" value="<?php echo ($vo); ?>">
                                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                            <button class="img_file" btn="identity_card_frontal[<?php echo ($i+1); ?>]">
                                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="identity_card_frontal[<?php echo ($i+1); ?>]" title="添加图片">
                                            </button>
                                        </td>

                                    </tr>
                                    <tr>

                                        <td class="td_left wife_msg">配偶身份证：</td>
                                        <td class="td_right wife_msg">
                                            <?php if(is_array($identity_card_mate[$i+1])): $key = 0; $__LIST__ = $identity_card_mate[$i+1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="identity_card_mate<?php echo ($i+1); echo ($key); ?>">
                                                    <input type="hidden" name="identity_card_mate[<?php echo ($i+1); ?>][]" img="identity_card_mate<?php echo ($i+1); echo ($key); ?>" value="<?php echo ($vo); ?>">
                                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                            <button class="img_file" btn="identity_card_mate[<?php echo ($i+1); ?>]">
                                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="identity_card_mate[<?php echo ($i+1); ?>]" title="添加图片">
                                            </button>
                                        </td>
                                        <td class="td_left wife_msg">婚姻证明：</td>
                                        <td class="td_right wife_msg">
                                            <?php if(is_array($marriage_certificate[$i+1])): $key = 0; $__LIST__ = $marriage_certificate[$i+1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="marriage_certificate<?php echo ($i+1); echo ($key); ?>">
                                                    <input type="hidden" name="marriage_certificate[<?php echo ($i+1); ?>][]" img="marriage_certificate<?php echo ($i+1); echo ($key); ?>" value="<?php echo ($vo); ?>">
                                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                            <button class="img_file" btn="marriage_certificate[<?php echo ($i+1); ?>]">
                                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="marriage_certificate[<?php echo ($i+1); ?>]" title="添加图片">
                                            </button>
                                        </td>

                                    </tr>


                                </table>
                                <table class="table table_border" style="border-top: none !important;">



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

                    <!--<tr>
                        <td class="td_left">身&#12288;份&#12288;证：</td>
                        <td class="td_right setcolspan5">
                            <?php if(is_array($identity_card_frontal)): $i = 0; $__LIST__ = $identity_card_frontal;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $k = $key; ?>
                                <?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="img_remove">
                                        <img src="/Public<?php echo ($v); ?>" class="img_x" img="identity_card_frontal<?php echo ($i+1); echo ($key); ?>">
                                        <input type="hidden" name="identity_card_frontal[<?php echo ($i+1); ?>][]" img="identity_card_frontal<?php echo ($i+1); echo ($key); ?>" value="<?php echo ($v); ?>">
                                        <div style="    text-align: center;font-size: 10px;">权利人<?php echo ($k); ?></div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                            <button class="img_file" btn="identity_card_frontal[<?php echo ($i+1); ?>]" style="vertical-align:text-bottom;">
                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="identity_card_frontal[<?php echo ($i+1); ?>]" title="添加图片">
                            </button>
                        </td>

                        <td class="td_left">房&nbsp;&nbsp;产&nbsp;&nbsp;证：</td>
                        <td class="td_right">
                            <?php if(is_array($pledge_house)): $key = 0; $__LIST__ = $pledge_house;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="pledge_house<?php echo ($key); ?>">
                                    <input type="hidden" name="pledge_house[]" value="<?php echo ($vo); ?>" img="pledge_house<?php echo ($key); ?>">
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <button class="img_file" btn="pledge_house">
                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="pledge_house" title="添加图片">
                            </button>
                        </td>


                    </tr>
                    <tr>

                        <td class="td_left wife_msg">配偶身份证：</td>
                        <td class="td_right wife_msg">
                            <?php if(is_array($identity_card_mate[$i+1])): $key = 0; $__LIST__ = $identity_card_mate[$i+1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="identity_card_mate<?php echo ($i+1); echo ($key); ?>">
                                    <input type="hidden" name="identity_card_mate[<?php echo ($i+1); ?>][]" img="identity_card_mate<?php echo ($i+1); echo ($key); ?>" value="<?php echo ($vo); ?>">
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <button class="img_file" btn="identity_card_mate[<?php echo ($i+1); ?>]">
                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="identity_card_mate[<?php echo ($i+1); ?>]" title="添加图片">
                            </button>
                        </td>
                        <td class="td_left wife_msg">婚姻证明：</td>
                        <td class="td_right wife_msg">
                            <?php if(is_array($marriage_certificate[$i+1])): $key = 0; $__LIST__ = $marriage_certificate[$i+1];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="marriage_certificate<?php echo ($i+1); echo ($key); ?>">
                                    <input type="hidden" name="marriage_certificate[<?php echo ($i+1); ?>][]" img="marriage_certificate<?php echo ($i+1); echo ($key); ?>" value="<?php echo ($vo); ?>">
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <button class="img_file" btn="marriage_certificate[<?php echo ($i+1); ?>]">
                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="marriage_certificate[<?php echo ($i+1); ?>]" title="添加图片">
                            </button>
                        </td>

                    </tr>-->

                    <tr>
                        <td class="td_left">房&nbsp;&nbsp;产&nbsp;&nbsp;证：</td>
                        <td class="td_right">
                            <?php if(is_array($pledge_house)): $key = 0; $__LIST__ = $pledge_house;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="pledge_house<?php echo ($key); ?>">
                                    <input type="hidden" name="pledge_house[]" value="<?php echo ($vo); ?>" img="pledge_house<?php echo ($key); ?>">
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <button class="img_file" btn="pledge_house">
                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="pledge_house" title="添加图片">
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td class="td_left">备&#12288;用&#12288;房：</td>
                        <td class="td_right beiyong_house setcol" colspan="3">
                            <input type="radio" class="beiyong_house_yes" name="mate_y_n[<?php echo ($i+1); ?>]" value="1" <?php if($mate_y_n[$i+1] == 1): ?>checked="checked"<?php endif; ?>>&nbsp;是&nbsp;&nbsp;
                            <input type="radio" class="beiyong_house_no" name="mate_y_n[<?php echo ($i+1); ?>]" value="2" <?php if($mate_y_n[$i+1] == 2): ?>checked="checked"<?php endif; ?>>&nbsp;否&nbsp;&nbsp;
                        </td>

                        <td class="td_left house_msg">备&nbsp;&nbsp;用&nbsp;&nbsp;房：</td>
                        <td class="td_right house_msg">
                            <?php if(is_array($standby_house)): $key = 0; $__LIST__ = $standby_house;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="standby_house<?php echo ($key); ?>">
                                    <input type="hidden" name="standby_house[]" value="<?php echo ($vo); ?>" img="standby_house<?php echo ($key); ?>">
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <button class="img_file" btn="standby_house">
                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="standby_house" title="添加图片">
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td  class="td_left">户&#12288;口&#12288;簿：</td>
                        <td class="td_right setcolspan3" colspan="3">
                            <?php if(is_array($household_register)): $key = 0; $__LIST__ = $household_register;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="household_register<?php echo ($key); ?>">
                                    <input type="hidden" name="household_register[]" value="<?php echo ($vo); ?>" img="household_register<?php echo ($key); ?>">
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <button class="img_file" btn="household_register">
                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="household_register" title="添加图片">
                            </button>
                        </td>
                    </tr>

                </table>
            </div>
            <div class="widget-title"style="border:solid 1px #ccc">
                <h5>附加资料（可选项）</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table_border"style="border-top: none !important;">
                    <!--<tr>-->
                    <!--<th colspan="2">附加资料（可选项）</th>-->
                    <!--</tr>-->
                    <tr>
                        <td class="td_left">申&nbsp;&nbsp;请&nbsp;&nbsp;书：</td>
                        <td class="td_right">
                            <?php if(is_array($application_form)): $key = 0; $__LIST__ = $application_form;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="application_form<?php echo ($key); ?>">
                                    <input type="hidden" name="application_form[]" value="<?php echo ($vo); ?>" img="application_form<?php echo ($key); ?>">
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <button class="img_file" btn="application_form">
                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="application_form" title="添加图片">
                            </button>
                        </td>

                        <td class="td_left">征信报告：</td>
                        <td class="td_right">
                            <?php if(is_array($credit_report)): $key = 0; $__LIST__ = $credit_report;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="credit_report<?php echo ($key); ?>">
                                    <input type="hidden" name="credit_report[]" value="<?php echo ($vo); ?>" img="credit_report<?php echo ($key); ?>">
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <button class="img_file" btn="credit_report">
                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="credit_report" title="添加图片">
                            </button>
                        </td>
                    </tr>
                    <tr style="border-bottom: dashed 1px #ccc;">
                        <td class="td_left">产&#12288;&#12288;调：</td>
                        <td class="td_right">
                            <?php if(is_array($estate_survey)): $key = 0; $__LIST__ = $estate_survey;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="estate_survey<?php echo ($key); ?>">
                                    <input type="hidden" name="estate_survey[]" value="<?php echo ($vo); ?>" img="estate_survey<?php echo ($key); ?>">
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <button class="img_file" btn="estate_survey">
                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="estate_survey" title="添加图片">
                            </button>
                        </td>

                        <td class="td_left">银行流水：</td>
                        <td class="td_right">
                            <?php if(is_array($bank)): $key = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="img_remove">
                                    <img src="/Public<?php echo ($vo); ?>" class="img_x" img="bank<?php echo ($key); ?>">
                                    <input type="hidden" name="bank[]" value="<?php echo ($vo); ?>" img="bank<?php echo ($key); ?>">
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <button class="img_file" btn="bank">
                                <img src="/Public/Admin/assets/images/add.png" class="add_img" title="添加图片">
                                <input type="file" class="sp_file_img loanpic" accept="image/*" id="bank" title="添加图片">
                            </button>
                        </td>
                    </tr>

                </table>
            </div>
            <div class="widget-content nopadding">
                <table class="table">
                    <tr style="font-size:20px;font-weight:bold;">
                        <th class="td_left">订单状态：</th>
                        <th class="td_right">
                            <select name="wx_state" val="<?php echo ($numbering["wx_state"]); ?>" style="width:100px;">
                                <option value="0" <?php if($numbering["wx_state"] == 0 ): ?>selected="selected"<?php endif; ?> >已提交</option>
                                <option value="1" <?php if($numbering["wx_state"] == 1 ): ?>selected="selected"<?php endif; ?> >审核中</option>
                                <option value="7" <?php if($numbering["wx_state"] == 7 ): ?>selected="selected"<?php endif; ?> >已进件</option>
                                <option value="3" <?php if($numbering["wx_state"] == 3 ): ?>selected="selected"<?php endif; ?> >未通过</option>
                                <option value="2" <?php if($numbering["wx_state"] == 2 ): ?>selected="selected"<?php endif; ?> >审核通过</option>
                                <option value="6" <?php if($numbering["wx_state"] == 6 ): ?>selected="selected"<?php endif; ?> >待放款</option>
                                <option value="4" <?php if($numbering["wx_state"] == 4 ): ?>selected="selected"<?php endif; ?> >完成放款</option>
                                <option value="5" <?php if($numbering["wx_state"] == 5 ): ?>selected="selected"<?php endif; ?> >结清</option>
                            </select>
                        </th>
                        <!--<th class="td_left" style="font-size:18px;font-weight:bold;width: 18%;">下载文件：</th>-->
                        <th class="td_right" style="height: 60px;line-height: 60px">
                            <!--<p><input type="radio" name="download" value="1" id="value_type2" checked="checked"><span style="font-size:12px;">&nbsp;yes&nbsp;&nbsp;</span></p>-->
                            <!--<input type="radio" name="download" value="0" id="value_type"><span style="font-size:12px;">&nbsp;no&nbsp;&nbsp;</span>-->
                            <!--<select name="download" id="value_type" style="width:100px;">-->
                            <!--<option value="0">不下载</option>-->
                            <!--<option value="1" selected="selected">下载</option>-->
                            <!--</select>-->
                            <!--&nbsp;&nbsp;&nbsp;&nbsp;-->
                            <input type="hidden" name="download" value="1" id="value_type2" checked="checked">
                            <input type="submit" name="button" id="download" class="btn btn-success" value="下载文件" >
                        </th>
                    </tr>
                    <!--<tr style="font-size:20px;font-weight:bold;">
                        <th class="td_left">是否下载文件：</th>
                        <th class="td_right">
                            <select name="download" id="value_type" style="width:100px;">
                                <option value="0">不下载</option>
                                <option value="1" selected="selected">下载</option>
                            </select>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="submit" name="button" id="download" class="btn btn-primary" value="下载文件">
                        </th>
                    </tr>-->
                    <tr>
                        <td colspan="4" style="text-align: left">
                            <input type="submit" id="button" class="btn btn-primary" onclick="return checkform();" value="&#12288;保&#12288;存&#12288;" style="margin: 16px 0 0 30px;"> &nbsp;&nbsp;&nbsp;
                            <input style="margin-top: 16px" type="button" name="button2" id="button2" class="btn btn-success" value="&#12288;返&#12288;回&#12288;" onClick="javascript:window.location.href='<?php echo U("Order/wx_apply");?>'">
                        </td>
                        <!--<td colspan="2">
    <input type="submit" id="button" class="btn btn-primary" onclick="return checkform();" value="返回列表"style="border: solid 1px #3587C7;color: #3587C7;background: white;"> &nbsp;&nbsp;&nbsp;
    <input type="button" name="button2" id="button2" class="btn btn-primary" value="确定保存" onClick="javascript:window.location.href='<?php echo U("Order/wx_apply");?>'">
   </td>-->
                    </tr>
                </table>

            </div>
        </div>
    </div>

    </form>
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
<div id="mask"></div>
<script>
    $(".house_msg").hide()
    $(".beiyong_house").click(function () {
        if($(".beiyong_house_yes").is(':checked')){
            $(".house_msg").show()
            $(".setcol").attr("colspan","1")
        }else if($(".beiyong_house_no").is(':checked')){
            $(".house_msg").hide()
            $(".setcol").attr("colspan","3")
        }
    })
//    $(".wife_msg").hide()

    $(".select_married").change(function () {
        if($(".select_married").get(0).selectedIndex==1){
            $(".wife_msg").show()
            $(".setcolspan5").attr("colspan","1")
        }else if($(".select_married").get(0).selectedIndex==2){
            $(".wife_msg").show()
            $(".setcolspan5").attr("colspan","1")
        }else{
            $(".wife_msg").hide()
            $(".setcolspan1").attr("colspan","3")

        }
    })


    $('#value_type').click(function() {
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
    $(function() {
        $('.img_remove::after').click(function() {
            console.log(1,$(this));
            $(this).remove();
        })
    })
    $('.img_remove').click(function(e){
        var e=window.event||e;
        var self=$(this);
        if($(e.target).attr('class')=='img_remove'){
            $(self).remove();
        }
    })

    var public_img = '/Public';

    var img_url = '<?php echo U("File/img_file2",array("type"=>"weixin"));?>';
</script>

<script type="text/javascript" src="/Public/Admin/Js/wx_order_update.js"></script>









<script>

  var pswtext;
  $(function(){

    $('#backid').click(function(){
      javascript:history.go(-1);
    });

//    $('#password').keydown(function(){
//      console.log($('#password').val());
//    });
//
//    $('#password').bind('inpt propertychange',function(){
//      console.log($('#password').val());
//      $('#password').attr('type','text');
//    });




  });





</script>


</body>
</html>