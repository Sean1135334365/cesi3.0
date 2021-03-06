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

<script src="/Public/js/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" href="/Public/Admin/assets/css/a4_style.css">
<link rel="stylesheet" href="/Public/Admin/assets/css/amazeui.min.css">
<script type="text/javascript" src="/Public/Admin/assets/js/apply.js"></script>

<style>

.a4_content table>tbody>tr>th{
    color: #666;
}
input.t_input{
  width:17.8% !important;
  height: 24px;
}
input[type=text]{
  width: 92%;
  margin-top: 5px;
  margin-bottom: 5px;
  border: none;
}
#name{
  width: 150px;
  height:20px;
  margin: 0
}
.btn{
  padding: 2px 12px;
}
div.approve_btn,div.img_library{
  width: 97.3%;
}
button.img_file{
  background: #0e90d2;
  color: #fff;
  width: 50px;
  height:30px;
  border-radius: 14px;
}
.a4_content table>tbody>tr>th, .a4_content table>tbody>tr>td{
  text-align: center;
}
button.img_file input[type=file].sp_file_img{
  width:50px;
  height:30px;
}

</style>



<div style="height: 50px;line-height: 50px;font-size: 16px;color: #32c5d2;margin-left: 30px;border-bottom: solid 1px #ddd;"> 订单编辑</div>


   <div class="tpl-block" style="margin-top: 15px">

      <!--表单开始-->
      <div class="a4_window">

        <div class="a4_container">

          <div class="a4_content" id="form">

            <form action="#" method="post">
              <input type="hidden" name="id" value="<?php echo ($indentinfo["id"]); ?>">

              <div class="found_page">
                <div class="title_text">
                  <span class="input_title">主贷人：</span>
                  <input type="text" value="<?php echo ($indentinfo["name"]); ?>" name="name" id="" class="t_input" required="" placeholder="主借人姓名">

                  <span class="input_title">借款金额：</span>
                  <input type="text" value="<?php echo ($indentinfo["amount"]); ?>" name="amount" class="t_input" required="" onkeyup="value=value.replace(/[^\d{1,}\.\d{1,}|\d{1,}]/g,'')" placeholder="借款金额">

                  <span class="input_title">进件日期：</span>
                  <input type="text" value="<?php echo ($indentinfo["warehouse_warrant_date"]); ?>" name="warehouse_warrant_date" class="t_input" required="" onkeyup="value=value.replace(/[^\d&-]|_/ig,'')" placeholder="进件日期">
                </div>

                <table class="am-table am-table-bordered am-table-centered am-text-nowrap am-text-sm" id="discuss_table_begin">
                  <tr>
                    <th rowspan="4" width="3%" class="am-text-middle ">项<br />目<br />进<br />度<br />管<br />理</th>
                    <th width="7%" class="am-text-middle"></th>
                    <th width="13%" class="am-text-middle">下户</th>
                    <th width="13%" class="am-text-middle">批复</th>
                    <th width="13%" class="am-text-middle">公证</th>
                    <th width="13%" class="am-text-middle">抵押</th>
                    <th width="13%" class="am-text-middle">过桥</th>
                    <th width="13%" class="am-text-middle">提放</th>
                    <th width="13%" class="am-text-middle">备注</th>
                  </tr>
                  <?php switch($_SESSION['yzs_userinfo']['classes']): case "1": ?><tr>
                        <th class="">资方</th>
                        <td><input type="text" value="<?php echo ($indentinfo["capital"]["paupers"]); ?>" name="capital[paupers]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["capital"]["reply"]); ?>" name="capital[reply]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["capital"]["notarization"]); ?>" name="capital[notarization]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["capital"]["pledge"]); ?>" name="capital[pledge]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["capital"]["bridge"]); ?>" name="capital[bridge]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["capital"]["put_up"]); ?>" name="capital[put_up]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["capital"]["remarks"]); ?>" name="capital[remarks]"></td>
                      </tr>
                      <tr>
                        <th>平台</th>
                        <td><?php echo ($indentinfo["platform"]["paupers"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["reply"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["notarization"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["pledge"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["bridge"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["put_up"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["remarks"]); ?></td>
                      </tr>
                      <tr>
                        <th>渠道</th>
                        <td><?php echo ($indentinfo["channel"]["paupers"]); ?></td>
                        <td><?php echo ($indentinfo["channel"]["reply"]); ?></td>
                        <td><?php echo ($indentinfo["channel"]["notarization"]); ?></td>
                        <td><?php echo ($indentinfo["channel"]["pledge"]); ?></td>
                        <td><?php echo ($indentinfo["channel"]["bridge"]); ?></td>
                        <td><?php echo ($indentinfo["channel"]["put_up"]); ?></td>
                        <td><?php echo ($indentinfo["channel"]["remarks"]); ?></td>
                      </tr><?php break;?>
                    <?php case "2": if($_SESSION['yzs_userinfo']['rank'] == '1'): ?><tr>
                          <th class="">资方</th>
                          <td><input type="text" value="<?php echo ($indentinfo["capital"]["paupers"]); ?>" name="capital[paupers]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["capital"]["reply"]); ?>" name="capital[reply]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["capital"]["notarization"]); ?>" name="capital[notarization]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["capital"]["pledge"]); ?>" name="capital[pledge]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["capital"]["bridge"]); ?>" name="capital[bridge]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["capital"]["put_up"]); ?>" name="capital[put_up]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["capital"]["remarks"]); ?>" name="capital[remarks]"></td>
                        </tr>
                        <tr>
                          <th>平台</th>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["paupers"]); ?>" name="platform[paupers]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["reply"]); ?>" name="platform[reply]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["notarization"]); ?>" name="platform[notarization]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["pledge"]); ?>" name="platform[pledge]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["bridge"]); ?>" name="platform[bridge]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["put_up"]); ?>" name="platform[put_up]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["remarks"]); ?>" name="platform[remarks]"></td>
                        </tr>
                        <tr>
                          <th>渠道</th>
                          <td><input type="text" value="<?php echo ($indentinfo["channel"]["paupers"]); ?>" name="channel[paupers]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["channel"]["reply"]); ?>" name="channel[reply]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["channel"]["notarization"]); ?>" name="channel[notarization]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["channel"]["pledge"]); ?>" name="channel[pledge]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["channel"]["bridge"]); ?>" name="channel[bridge]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["channel"]["put_up"]); ?>" name="channel[put_up]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["channel"]["remarks"]); ?>" name="channel[remarks]"></td>
                        </tr>
                        <?php else: ?>
                        <tr>
                          <th class="">资方</th>
                          <td><?php echo ($indentinfo["capital"]["paupers"]); ?></td>
                          <td><?php echo ($indentinfo["capital"]["reply"]); ?></td>
                          <td><?php echo ($indentinfo["capital"]["notarization"]); ?></td>
                          <td><?php echo ($indentinfo["capital"]["pledge"]); ?></td>
                          <td><?php echo ($indentinfo["capital"]["bridge"]); ?></td>
                          <td><?php echo ($indentinfo["capital"]["put_up"]); ?></td>
                          <td><?php echo ($indentinfo["capital"]["remarks"]); ?></td>
                        </tr>
                        <tr>
                          <th>平台</th>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["paupers"]); ?>" name="platform[paupers]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["reply"]); ?>" name="platform[reply]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["notarization"]); ?>" name="platform[notarization]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["pledge"]); ?>" name="platform[pledge]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["bridge"]); ?>" name="platform[bridge]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["put_up"]); ?>" name="platform[put_up]"></td>
                          <td><input type="text" value="<?php echo ($indentinfo["platform"]["remarks"]); ?>" name="platform[remarks]"></td>
                        </tr>
                        <tr>
                          <th>渠道</th>
                          <td><?php echo ($indentinfo["channel"]["paupers"]); ?></td>
                          <td><?php echo ($indentinfo["channel"]["reply"]); ?></td>
                          <td><?php echo ($indentinfo["channel"]["notarization"]); ?></td>
                          <td><?php echo ($indentinfo["channel"]["pledge"]); ?></td>
                          <td><?php echo ($indentinfo["channel"]["bridge"]); ?></td>
                          <td><?php echo ($indentinfo["channel"]["put_up"]); ?></td>
                          <td><?php echo ($indentinfo["channel"]["remarks"]); ?></td>
                        </tr><?php endif; break;?>
                    <?php case "3": ?><tr>
                        <th class="">资方</th>
                        <td><?php echo ($indentinfo["capital"]["paupers"]); ?></td>
                        <td><?php echo ($indentinfo["capital"]["reply"]); ?></td>
                        <td><?php echo ($indentinfo["capital"]["notarization"]); ?></td>
                        <td><?php echo ($indentinfo["capital"]["pledge"]); ?></td>
                        <td><?php echo ($indentinfo["capital"]["bridge"]); ?></td>
                        <td><?php echo ($indentinfo["capital"]["put_up"]); ?></td>
                        <td><?php echo ($indentinfo["capital"]["remarks"]); ?></td>
                      </tr>
                      <tr>
                        <th>平台</th>
                        <td><?php echo ($indentinfo["platform"]["paupers"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["reply"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["notarization"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["pledge"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["bridge"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["put_up"]); ?></td>
                        <td><?php echo ($indentinfo["platform"]["remarks"]); ?></td>
                      </tr>
                      <tr>
                        <th>渠道</th>
                        <td><input type="text" value="<?php echo ($indentinfo["channel"]["paupers"]); ?>" name="channel[paupers]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["channel"]["reply"]); ?>" name="channel[reply]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["channel"]["notarization"]); ?>" name="channel[notarization]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["channel"]["pledge"]); ?>" name="channel[pledge]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["channel"]["bridge"]); ?>" name="channel[bridge]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["channel"]["put_up"]); ?>" name="channel[put_up]"></td>
                        <td><input type="text" value="<?php echo ($indentinfo["channel"]["remarks"]); ?>" name="channel[remarks]"></td>
                      </tr><?php break;?>
                    <?php default: ?>
                    <tr>
                      <th class="">资方</th>
                      <td><?php echo ($indentinfo["capital"]["paupers"]); ?></td>
                      <td><?php echo ($indentinfo["capital"]["reply"]); ?></td>
                      <td><?php echo ($indentinfo["capital"]["notarization"]); ?></td>
                      <td><?php echo ($indentinfo["capital"]["pledge"]); ?></td>
                      <td><?php echo ($indentinfo["capital"]["bridge"]); ?></td>
                      <td><?php echo ($indentinfo["capital"]["put_up"]); ?></td>
                      <td><?php echo ($indentinfo["capital"]["remarks"]); ?></td>
                    </tr>
                    <tr>
                      <th>平台</th>
                      <td><?php echo ($indentinfo["platform"]["paupers"]); ?></td>
                      <td><?php echo ($indentinfo["platform"]["reply"]); ?></td>
                      <td><?php echo ($indentinfo["platform"]["notarization"]); ?></td>
                      <td><?php echo ($indentinfo["platform"]["pledge"]); ?></td>
                      <td><?php echo ($indentinfo["platform"]["bridge"]); ?></td>
                      <td><?php echo ($indentinfo["platform"]["put_up"]); ?></td>
                      <td><?php echo ($indentinfo["platform"]["remarks"]); ?></td>
                    </tr>
                    <tr>
                      <th>渠道</th>
                      <td><?php echo ($indentinfo["channel"]["paupers"]); ?></td>
                      <td><?php echo ($indentinfo["channel"]["reply"]); ?></td>
                      <td><?php echo ($indentinfo["channel"]["notarization"]); ?></td>
                      <td><?php echo ($indentinfo["channel"]["pledge"]); ?></td>
                      <td><?php echo ($indentinfo["channel"]["bridge"]); ?></td>
                      <td><?php echo ($indentinfo["channel"]["put_up"]); ?></td>
                      <td><?php echo ($indentinfo["channel"]["remarks"]); ?></td>
                    </tr><?php endswitch;?>
                  <tr>
                    <th rowspan="6" width="7%" class="am-text-middle">贷<br />款<br />申<br />请<br />材<br />料</th>
                    <th class="am-text-middle"></th>
                    <th class="am-text-middle" style="font-size:12px;">身份证<br /><span style="color:<?php if($img_count['identity_card_frontal'] != ''): ?>green;">(<?php echo ($img_count["identity_card_frontal"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle" style="font-size:12px;">户口本<br /><span style="color:<?php if($img_count['household_register'] != ''): ?>green;">(<?php echo ($img_count["household_register"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle" style="font-size:12px;">结婚证<br /><span style="color:<?php if($img_count['marriage_certificate'] != ''): ?>green;">(<?php echo ($img_count["marriage_certificate"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle" style="font-size:12px;">征信报告<br /><span style="color:<?php if($img_count['credit_report'] != ''): ?>green;">(<?php echo ($img_count["credit_report"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle" style="font-size:12px;">产证、产调、评估单<br /><span style="color:<?php if($img_count['pledge_house'] != ''): ?>green;">(<?php echo ($img_count["pledge_house"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle" style="font-size:12px;">银行流水<br /><span style="color:<?php if($img_count['bank'] != ''): ?>green;">(<?php echo ($img_count["bank"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle" style="font-size:12px;">备用房产证、产调<br /><span style="color:<?php if($img_count['standby_house'] != ''): ?>green;">(<?php echo ($img_count["standby_house"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                  </tr>
                  <tr>
                    <th width="7%">添加</th>
                    <td>
                      <button type="button" id="identity_card_frontal_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                       <!--  <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="identity_card_frontal" tle="身份证" title="添加图片">
                      </button>
                      <!--<button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                        <i class="am-icon-file-image-o"></i>
                        查看
                      </button>-->
                    </td>
                    <td>
                      <button type="button" id="household_register_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                       <!--  <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="household_register" tle="户口本" title="添加图片">
                      </button>
                      <!--<button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                        <i class="am-icon-file-image-o"></i>
                        查看
                      </button>-->
                    </td>
                    <td>
                      <button type="button" id="marriage_certificate_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                        <!-- <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="marriage_certificate" tle="结婚证" title="添加图片">
                      </button>
                      <!--<button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                        <i class="am-icon-file-image-o"></i>
                        查看
                      </button>-->
                    </td>
                    <td>
                      <button type="button" id="credit_report_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                        <!-- <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="credit_report" tle="征信报告" title="添加图片">
                      </button>
                      <!--<button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                        <i class="am-icon-file-image-o"></i>
                        查看
                      </button>-->
                    </td>
                    <td>
                      <button type="button" id="pledge_house_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                       <!--  <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="pledge_house" tle="产证、产调、评论单" title="添加图片">
                      </button>
                      <!-- <button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                         <i class="am-icon-file-image-o"></i>
                         查看
                       </button>-->
                    </td>
                    <td>
                      <button type="button" id="bank_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                        <!-- <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="bank" tle="银行流水" title="添加图片">
                      </button>
                      <!--<button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                        <i class="am-icon-file-image-o"></i>
                        查看
                      </button>-->
                    </td>
                    <td>
                      <button type="button" id="standby_house_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                       <!--  <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="standby_house" tle="备用房产证、产调" title="添加图片">
                      </button>
                      <!--<button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                        <i class="am-icon-file-image-o"></i>
                        查看
                      </button>-->
                    </td>
                  </tr>
                  <tr>
                    <th class="am-text-middle">备注</th>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["identity_card_frontal"]); ?>" name="remarks[identity_card_frontal]"></td>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["household_register"]); ?>" name="remarks[household_register]"></td>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["marriage_certificate"]); ?>" name="remarks[marriage_certificate]"></td>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["credit_report"]); ?>" name="remarks[credit_report]"></td>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["pledge_house"]); ?>" name="remarks[pledge_house]"></td>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["bank"]); ?>" name="remarks[bank]"></td>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["standby_house"]); ?>" name="remarks[standby_house]"></td>
                  </tr>
                  <tr>
                    <th class="am-text-middle"></th>
                    <th class="am-text-middle" style="font-size:12px;">看房照片<br /><span style="color:<?php if($img_count['see_house_img'] != ''): ?>green;">(<?php echo ($img_count["see_house_img"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle" style="font-size:12px;">公司材料<br /><span style="color:<?php if($img_count['company'] != ''): ?>green;">(<?php echo ($img_count["company"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle" style="font-size:12px;">人法网<br /><span style="color:<?php if($img_count['court'] != ''): ?>green;">(<?php echo ($img_count["court"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle" style="font-size:12px;">借款申请表<br /><span style="color:<?php if($img_count['application_form'] != ''): ?>green;">(<?php echo ($img_count["application_form"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle" style="font-size:12px;">预审报告<br /><span style="color:<?php if($img_count['check_table'] != ''): ?>green;">(<?php echo ($img_count["check_table"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle" style="font-size:12px;">其他<br /><span style="color:<?php if($img_count['household_register'] != ''): ?>green;">(<?php echo ($img_count["rests"]); ?>)<?php else: ?>red;">(0)<?php endif; ?></span></th>
                    <th class="am-text-middle"></th>
                  </tr>
                  <tr>
                    <th>添加</th>
                    <td>
                      <button type="button" id="see_house_img_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                        <!-- <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="see_house_img" tle="看房照片" title="添加图片">
                      </button>
                      <!--<button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                        <i class="am-icon-file-image-o"></i>
                        查看
                      </button>-->
                    </td>
                    <td>
                      <button type="button" id="company_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                       <!--  <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="company" tle="公司材料" title="添加图片">
                      </button>
                      <!-- <button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                         <i class="am-icon-file-image-o"></i>
                         查看
                       </button>-->
                    </td>
                    <td>
                      <button type="button" id="court_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                       <!--  <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="court" tle="法院网风险信息" title="添加图片">
                      </button>
                      <!--<button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                        <i class="am-icon-file-image-o"></i>
                        查看
                      </button>-->
                    </td>
                    <td>
                      <button type="button" id="application_form_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                       <!--  <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="application_form" tle="借款申请表" title="添加图片">
                      </button>
                      <!--<button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                        <i class="am-icon-file-image-o"></i>
                        查看
                      </button>-->
                    </td>
                    <td>
                      <button type="button" id="check_table_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                        <!-- <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" id="check_table" tle="审核表" title="添加图片">
                      </button>
                      <!--<button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                        <i class="am-icon-file-image-o"></i>
                        查看
                      </button>-->
                    </td>
                    <td>
                      <button type="button" id="rests_btn" class="am-btn am-btn-primary am-btn-xs am-round img_file" btn="estate_survey" title="添加图片">
                        <!-- <i class="am-icon-plus-square"></i> -->
                        添加
                        <input type="file" multiple="multiple" class="sp_file_img loanpic" accept="image/jpeg,image/jpg,image/png,image/gif" id="rests" tle="其他" title="添加图片">
                      </button>
                      <!--<button type="button" class="am-btn am-btn-secondary am-btn-xs am-round">
                        <i class="am-icon-file-image-o"></i>
                        查看
                      </button>-->
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <th>备注</th>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["see_house_img"]); ?>" name="remarks[see_house_img]"></td>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["company"]); ?>" name="remarks[company]"></td>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["court"]); ?>" name="remarks[court]"></td>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["application_form"]); ?>" name="remarks[application_form]"></td>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["check_table"]); ?>" name="remarks[check_table]"></td>
                    <td><input type="text" value="<?php echo ($indentinfo["remarks"]["rests"]); ?>" name="remarks[rests]"></td>
                    <td></td>
                  </tr>
                </table>

                <!--审批表-->
                <div class="approve_btn am-vertical-align">
                  <button type="button" id="approve_btn" class="am-btn am-btn-primary am-btn-lg am-round am-vertical-align-middle">
                   <!--  <i class="am-icon-table"></i> -->
                    填写审批表
                  </button>
                </div>
                <!--/审批表-->

                <div class="img_library" id="img_library">

                  <?php if(is_array($indentinfo['photograph'])): foreach($indentinfo['photograph'] as $key=>$vol): if(is_array($vol)): foreach($vol as $k=>$vo): ?><div class="a4_img_div a4_img_operate fi_im_<?php echo ($key); echo ($k); ?>" id="fi_im_<?php echo ($key); echo ($k); ?>" onclick="imgclick('fi_im_<?php echo ($key); echo ($k); ?>')">
                        <img src="/Public<?php echo ($vo); ?>" class="a4_img img_c_pointer fi_im_identity_card_frontal0">
                        <input value="<?php echo ($vo); ?>" type="hidden" class="fi_im_<?php echo ($key); echo ($k); ?>" name="images[<?php echo ($key); ?>][]">
                        <div style="width:100%;height:20px;text-align:center;font-size:16px;color:#777;">
                          <?php switch($key): case "identity_card_frontal": ?>身份证<?php break;?>
                            <?php case "household_register": ?>户口本<?php break;?>
                            <?php case "marriage_certificate": ?>结婚证<?php break;?>
                            <?php case "credit_report": ?>征信报告<?php break;?>
                            <?php case "pledge_house": ?>产证、产调、评估单<?php break;?>
                            <?php case "bank": ?>银行流水<?php break;?>
                            <?php case "standby_house": ?>备用房产证、产调<?php break;?>
                            <?php case "see_house_img": ?>看房照片<?php break;?>
                            <?php case "company": ?>公司材料<?php break;?>
                            <?php case "court": ?>人法网<?php break;?>
                            <?php case "application_form": ?>借款申请表<?php break;?>
                            <?php case "check_table": ?>审核表<?php break;?>
                            <?php case "rests": ?>其他<?php break; endswitch;?>
                        </div>
                      </div><?php endforeach; endif; endforeach; endif; ?>





                </div>
              </div>
              <div class="approve_table">
                <table class="am-table am-table-bordered am-table-centered am-text-sm am-table-compact">
                  <tr class="td_darkgray"><th colspan="8">信息汇总</th></tr>
                  <tr>
                    <td class="td_light_gray" colspan="2">信托名称</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["trust_name"]); ?>" name="trust_name"></td>
                    <td class="td_light_gray" colspan="2">合同编号</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["contract_number"]); ?>" name="contract_number"></td>
                  </tr>
                  <tr class="td_darkgray"><td colspan="8">借款信息</td></tr>
                  <tr>
                    <td width="10%" class="td_light_gray">申请金额</td>
                    <td class="am-text-middle" width="10%"><input type="text" value="<?php echo ($indentinfo["loanamount"]); ?>" required="" name="loanamount"></td>
                    <td width="10%" class="td_light_gray">申请期限</td>
                    <td class="am-text-middle" width="13%"><input type="text" value="<?php echo ($indentinfo["time_number"]); ?>" required="" name="time_number"></td>
                    <td width="10%" class="td_light_gray">借款利率</td>
                    <td class="am-text-middle" width="21%"><input type="text" value="<?php echo ($indentinfo["rate"]); ?>" name="rate"></td>
                    <td width="12%" class="td_light_gray">还款方式</td>
                    <td class="am-text-middle" width="14%"><input type="text" value="<?php echo ($indentinfo["way"]); ?>" name="way"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">款项用途</td>
                    <td colspan="3" class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["purpose"]); ?>" required="" name="purpose"></td>
                    <td class="td_light_gray">还款来源</td>
                    <td colspan="3" class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["advance"]); ?>" name="advance"></td>
                    <!--<td class="td_light_gray">放款条件</td>-->
                    <!--<td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["condition"]); ?>" name="condition"></td>-->

                    <!--<td colspan="4" class="td_light_gray"></td>-->
                  </tr>

                  <!--借款人信息-->
                  <!--<tr class="td_darkgray"><td colspan="8">借款人信息</td></tr>-->
                  <tr>
                  <tr>
                  <td colspan="8" class="tbl_td_text_left" style="position:relative;"><span style="position:absolute;">权利人① </span><center><b>借款人信息</b></center></td>
                  </tr>
                  <td class="td_light_gray">姓名</td>
                  <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["username"]); ?>" required="" name="borrower[1][username]"></td>
                  <td class="td_light_gray">性别</td>
                  <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["gender"]); ?>" required="" name="borrower[1][gender]"></td>
                  <td class="td_light_gray">身份证号</td>
                  <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["identification_id"]); ?>" required="" name="borrower[1][identification_id]"></td>
                  <td class="td_light_gray">手机号码</td>
                  <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["mobile"]); ?>" required="" name="borrower[1][mobile]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">婚姻状况</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["marriage"]); ?>" required="" name="borrower[1][marriage]"></td>
                    <td class="td_light_gray">年龄</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["age"]); ?>" required="" name="borrower[1][age]"></td>
                    <td class="td_light_gray">通讯地址</td>
                    <td colspan="3" class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["family_address"]); ?>" required="" name="borrower[1][family_address]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">职位</td>
                    <td colspan="3" class="am-text-middle tbl_td_text_left">
                      <select class="sel_check" sel="1" name="borrower[1][occupation]" style="width:35%">
                        <option value="0" <?php if($indentinfo['borrower'][1]['occupation'] == 0): ?>selected="selected"<?php endif; ?>>-请选择-</option>
                        <option value="1" <?php if($indentinfo['borrower'][1]['occupation'] == 1): ?>selected="selected"<?php endif; ?>>企业法人</option>
                        <option value="2" <?php if($indentinfo['borrower'][1]['occupation'] == 2): ?>selected="selected"<?php endif; ?>>股东</option>
                        <option value="3" <?php if($indentinfo['borrower'][1]['occupation'] == 3): ?>selected="selected"<?php endif; ?>>公司职员</option>
                        <option value="4" <?php if($indentinfo['borrower'][1]['occupation'] == 4): ?>selected="selected"<?php endif; ?>>其他</option>
                      </select>
                      <input type="text" style="width:60%;background-color:transparent;display: none;" disabled="disabled" name="borrower[1][occupation_rest]" value="<?php echo ($indentinfo["borrower"]["1"]["occupation_rest"]); ?>" placeholder="请填写职位">
                    </td>
                    <td class="td_light_gray">企业名称</td>
                    <td colspan="3" class="am-text-middle">
                      <input type="text" name="borrower[1][enterprise_name]" value="<?php echo ($indentinfo["borrower"]["1"]["enterprise_name"]); ?>">
                    </td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">负债金额</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["liabilities"]); ?>" required="" name="borrower[1][liabilities]"></td>
                    <td class="td_light_gray">对外担保情况</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["external_security"]); ?>" required="" name="borrower[1][external_security]" placeholder="无或状态"></td>
                    <!--<td class="td_light_gray">是否有非正常类贷款/信用卡</td>-->
                    <!--<td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["improper_loan"]); ?>" required="" name="borrower[1][improper_loan]" placeholder="无或状态"></td>-->
                    <td class="td_light_gray">当前逾期金额</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["present_overdue"]); ?>" required="" name="borrower[1][present_overdue]" placeholder="无或期数"></td>
                    <td class="td_light_gray">近12个月累计逾期期数</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["1"]["12_overdue"]); ?>" required="" name="borrower[1][12_overdue]" placeholder="无或期数"></td>
                  </tr>

                  <tr>
                    <td colspan="8" class="tbl_td_text_left">权利人②</td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">姓名</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["username"]); ?>" name="borrower[2][username]"></td>
                    <td class="td_light_gray">性别</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["gender"]); ?>" name="borrower[2][gender]"></td>
                    <td class="td_light_gray">身份证号</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["identification_id"]); ?>" name="borrower[2][identification_id]"></td>
                    <td class="td_light_gray">手机号码</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["mobile"]); ?>" name="borrower[2][mobile]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">婚姻状况</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["marriage"]); ?>" name="borrower[2][marriage]"></td>
                    <td class="td_light_gray">年龄</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["age"]); ?>" name="borrower[2][age]"></td>
                    <td class="td_light_gray">通讯地址</td>
                    <td colspan="3" class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["family_address"]); ?>" name="borrower[2][family_address]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">职位</td>
                    <td colspan="3" class="am-text-middle tbl_td_text_left">
                      <select class="sel_check" sel="2" name="borrower[2][occupation]" style="width:35%">
                        <option value="0" <?php if($indentinfo['borrower'][2]['occupation'] == 0): ?>selected="selected"<?php endif; ?>>-请选择-</option>
                        <option value="1" <?php if($indentinfo['borrower'][2]['occupation'] == 1): ?>selected="selected"<?php endif; ?>>企业法人</option>
                        <option value="2" <?php if($indentinfo['borrower'][2]['occupation'] == 2): ?>selected="selected"<?php endif; ?>>股东</option>
                        <option value="3" <?php if($indentinfo['borrower'][2]['occupation'] == 3): ?>selected="selected"<?php endif; ?>>公司职员</option>
                        <option value="4" <?php if($indentinfo['borrower'][2]['occupation'] == 4): ?>selected="selected"<?php endif; ?>>其他</option>
                      </select>
                      <input type="text" style="width:60%;background-color:transparent;display: none;" disabled="disabled" name="borrower[2][occupation_rest]" value="<?php echo ($indentinfo["borrower"]["2"]["occupation_rest"]); ?>" placeholder="请填写职位">
                    </td>
                    <td class="td_light_gray">企业名称</td>
                    <td colspan="3" class="am-text-middle">
                      <input type="text" name="borrower[2][enterprise_name]" value="<?php echo ($indentinfo["borrower"]["2"]["enterprise_name"]); ?>">
                    </td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">负债金额</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["liabilities"]); ?>" name="borrower[2][liabilities]"></td>
                    <td class="td_light_gray">对外担保情况</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["external_security"]); ?>" name="borrower[2][external_security]" placeholder="无或状态"></td>
                    <!--<td class="td_light_gray">是否有非正常类贷款/信用卡</td>-->
                    <!--<td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["improper_loan"]); ?>" name="borrower[2][improper_loan]" placeholder="无或状态"></td>-->
                    <td class="td_light_gray">当前逾期金额</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["present_overdue"]); ?>" name="borrower[2][present_overdue]" placeholder="无或期数"></td>
                    <td class="td_light_gray">近12个月累计逾期期数</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["2"]["12_overdue"]); ?>" name="borrower[2][12_overdue]" placeholder="无或期数"></td>
                  </tr>

                  <tr>
                    <td colspan="8" class="tbl_td_text_left">权利人③</td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">姓名</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["username"]); ?>" name="borrower[3][username]"></td>
                    <td class="td_light_gray">性别</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["gender"]); ?>" name="borrower[3][gender]"></td>
                    <td class="td_light_gray">身份证号</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["identification_id"]); ?>" name="borrower[3][identification_id]"></td>
                    <td class="td_light_gray">手机号码</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["mobile"]); ?>" name="borrower[3][mobile]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">婚姻状况</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["marriage"]); ?>" name="borrower[3][marriage]"></td>
                    <td class="td_light_gray">年龄</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["age"]); ?>" name="borrower[3][age]"></td>
                    <td class="td_light_gray">通讯地址</td>
                    <td colspan="3" class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["family_address"]); ?>" name="borrower[3][family_address]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">职位</td>
                    <td colspan="3" class="am-text-middle tbl_td_text_left">
                      <select class="sel_check" sel="3" name="borrower[3][occupation]" style="width:35%">
                        <option value="0" <?php if($indentinfo['borrower'][3]['occupation'] == 0): ?>selected="selected"<?php endif; ?>>-请选择-</option>
                        <option value="1" <?php if($indentinfo['borrower'][3]['occupation'] == 1): ?>selected="selected"<?php endif; ?>>企业法人</option>
                        <option value="2" <?php if($indentinfo['borrower'][3]['occupation'] == 2): ?>selected="selected"<?php endif; ?>>股东</option>
                        <option value="3" <?php if($indentinfo['borrower'][3]['occupation'] == 3): ?>selected="selected"<?php endif; ?>>公司职员</option>
                        <option value="4" <?php if($indentinfo['borrower'][3]['occupation'] == 4): ?>selected="selected"<?php endif; ?>>其他</option>
                      </select>
                      <input type="text" style="width:60%;background-color:transparent;display: none;" disabled="disabled" name="borrower[3][occupation_rest]" value="<?php echo ($indentinfo["borrower"]["3"]["occupation_rest"]); ?>" placeholder="请填写职位">
                    </td>
                    <td class="td_light_gray">企业名称</td>
                    <td colspan="3" class="am-text-middle">
                      <input type="text" name="borrower[3][enterprise_name]" value="<?php echo ($indentinfo["borrower"]["3"]["enterprise_name"]); ?>">
                    </td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">负债金额</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["liabilities"]); ?>" name="borrower[3][liabilities]"></td>
                    <td class="td_light_gray">对外担保情况</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["external_security"]); ?>" name="borrower[3][external_security]" placeholder="无或状态"></td>
                    <!--<td class="td_light_gray">是否有非正常类贷款/信用卡</td>-->
                    <!--<td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["improper_loan"]); ?>" name="borrower[3][improper_loan]" placeholder="无或状态"></td>-->
                    <td class="td_light_gray">当前逾期金额</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["present_overdue"]); ?>" name="borrower[3][present_overdue]" placeholder="无或期数"></td>
                    <td class="td_light_gray">近12个月累计逾期期数</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["3"]["12_overdue"]); ?>" name="borrower[3][12_overdue]" placeholder="无或期数"></td>
                  </tr>

                  <tr>
                    <td colspan="8" class="tbl_td_text_left">权利人④</td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">姓名</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["username"]); ?>" name="borrower[4][username]"></td>
                    <td class="td_light_gray">性别</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["gender"]); ?>" name="borrower[4][gender]"></td>
                    <td class="td_light_gray">身份证号</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["identification_id"]); ?>" name="borrower[4][identification_id]"></td>
                    <td class="td_light_gray">手机号码</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["mobile"]); ?>" name="borrower[4][mobile]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">婚姻状况</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["marriage"]); ?>" name="borrower[4][marriage]"></td>
                    <td class="td_light_gray">年龄</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["age"]); ?>" name="borrower[4][age]"></td>
                    <td class="td_light_gray">通讯地址</td>
                    <td colspan="3" class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["family_address"]); ?>" name="borrower[4][family_address]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">职位</td>
                    <td colspan="3" class="am-text-middle tbl_td_text_left">
                      <select class="sel_check" sel="4" name="borrower[4][occupation]" style="width:35%">
                        <option value="0" <?php if($indentinfo['borrower'][4]['occupation'] == 0): ?>selected="selected"<?php endif; ?>>-请选择-</option>
                        <option value="1" <?php if($indentinfo['borrower'][4]['occupation'] == 1): ?>selected="selected"<?php endif; ?>>企业法人</option>
                        <option value="2" <?php if($indentinfo['borrower'][4]['occupation'] == 2): ?>selected="selected"<?php endif; ?>>股东</option>
                        <option value="3" <?php if($indentinfo['borrower'][4]['occupation'] == 3): ?>selected="selected"<?php endif; ?>>公司职员</option>
                        <option value="4" <?php if($indentinfo['borrower'][4]['occupation'] == 4): ?>selected="selected"<?php endif; ?>>其他</option>
                      </select>
                      <input type="text" style="width:60%;background-color:transparent;display: none;" disabled="disabled" name="borrower[4][occupation_rest]" value="<?php echo ($indentinfo["borrower"]["4"]["occupation_rest"]); ?>" placeholder="请填写职位">
                    </td>
                    <td class="td_light_gray">企业名称</td>
                    <td colspan="3" class="am-text-middle">
                      <input type="text" name="borrower[4][enterprise_name]" value="<?php echo ($indentinfo["borrower"]["4"]["enterprise_name"]); ?>">
                    </td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">负债金额</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["liabilities"]); ?>" name="borrower[4][liabilities]"></td>
                    <td class="td_light_gray">对外担保情况</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["external_security"]); ?>" name="borrower[4][external_security]" placeholder="无或状态"></td>
                    <!--<td class="td_light_gray">是否有非正常类贷款/信用卡</td>-->
                    <!--<td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["improper_loan"]); ?>" name="borrower[4][improper_loan]" placeholder="无或状态"></td>-->
                    <td class="td_light_gray">当前逾期金额</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["present_overdue"]); ?>" name="borrower[4][present_overdue]" placeholder="无或期数"></td>
                    <td class="td_light_gray">近12个月累计逾期期数</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["4"]["12_overdue"]); ?>" name="borrower[4][12_overdue]" placeholder="无或期数"></td>
                  </tr>

                  <tr>
                    <td colspan="8" class="tbl_td_text_left">权利人⑤</td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">姓名</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["username"]); ?>" name="borrower[5][username]"></td>
                    <td class="td_light_gray">性别</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["gender"]); ?>" name="borrower[5][gender]"></td>
                    <td class="td_light_gray">身份证号</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["identification_id"]); ?>" name="borrower[5][identification_id]"></td>
                    <td class="td_light_gray">手机号码</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["mobile"]); ?>" name="borrower[5][mobile]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">婚姻状况</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["marriage"]); ?>" name="borrower[5][marriage]"></td>
                    <td class="td_light_gray">年龄</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["age"]); ?>" name="borrower[5][age]"></td>
                    <td class="td_light_gray">通讯地址</td>
                    <td colspan="3" class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["family_address"]); ?>" name="borrower[5][family_address]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">职位</td>
                    <td colspan="3" class="am-text-middle tbl_td_text_left">
                      <select class="sel_check" sel="5" name="borrower[5][occupation]" style="width:35%">
                        <option value="0" <?php if($indentinfo['borrower'][5]['occupation'] == 0): ?>selected="selected"<?php endif; ?>>-请选择-</option>
                        <option value="1" <?php if($indentinfo['borrower'][5]['occupation'] == 1): ?>selected="selected"<?php endif; ?>>企业法人</option>
                        <option value="2" <?php if($indentinfo['borrower'][5]['occupation'] == 2): ?>selected="selected"<?php endif; ?>>股东</option>
                        <option value="3" <?php if($indentinfo['borrower'][5]['occupation'] == 3): ?>selected="selected"<?php endif; ?>>公司职员</option>
                        <option value="4" <?php if($indentinfo['borrower'][5]['occupation'] == 4): ?>selected="selected"<?php endif; ?>>其他</option>
                      </select>
                      <input type="text" style="width:60%;background-color:transparent;display: none;" disabled="disabled" name="borrower[5][occupation_rest]" value="<?php echo ($indentinfo["borrower"]["5"]["occupation_rest"]); ?>" placeholder="请填写职位">
                    </td>
                    <td class="td_light_gray">企业名称</td>
                    <td colspan="3" class="am-text-middle">
                      <input type="text" name="borrower[5][enterprise_name]" value="<?php echo ($indentinfo["borrower"]["5"]["enterprise_name"]); ?>">
                    </td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">负债金额</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["liabilities"]); ?>" name="borrower[5][liabilities]"></td>
                    <td class="td_light_gray">对外担保情况</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["external_security"]); ?>" name="borrower[5][external_security]" placeholder="无或状态"></td>
                    <!--<td class="td_light_gray">是否有非正常类贷款/信用卡</td>-->
                    <!--<td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["improper_loan"]); ?>" name="borrower[5][improper_loan]" placeholder="无或状态"></td>-->
                    <td class="td_light_gray">当前逾期金额</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["present_overdue"]); ?>" name="borrower[5][present_overdue]" placeholder="无或期数"></td>
                    <td class="td_light_gray">近12个月累计逾期期数</td>
                    <td class="am-text-middle"><input type="text" value="<?php echo ($indentinfo["borrower"]["5"]["12_overdue"]); ?>" name="borrower[5][12_overdue]" placeholder="无或期数"></td>
                  </tr>







                  <!--/借款人信息-->


                  <!--抵押物基本情况-->
                  <tr class="td_darkgray"><td colspan="8">抵押物基本情况</td></tr>
                  <tr>
                    <td class="td_light_gray" colspan="2">抵押物地址</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["location"]); ?>" required="" name="guarantee[location]"></td>
                    <td class="td_light_gray" colspan="2">产证编号</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["certificate_number"]); ?>" required="" name="guarantee[certificate_number]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray" colspan="2">产权人</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["property_owner"]); ?>" required="" name="guarantee[property_owner]"></td>
                    <td class="td_light_gray" colspan="2">评估总价</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["assess_total_prices"]); ?>" name="guarantee[assess_total_prices]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray" colspan="2">评估单价</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["assess_unit_price"]); ?>" name="guarantee[assess_unit_price]"></td>
                    <td class="td_light_gray" colspan="2">建筑面积</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["area"]); ?>" required="" name="guarantee[area]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray" colspan="2">抵押类型</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["type"]); ?>" required="" name="guarantee[type]"></td>
                    <td class="td_light_gray" colspan="2">（综合）抵押率</td>
                    <td class="am-text-middle" colspan="2"><!--<?php echo ($indentinfo["guarantee"]["rate"]); ?>--><input type="text" style="width:20%;min-width:40px;border-bottom:1px solid #ccc;" value="<?php echo ($indentinfo["guarantee"]["rate"]); ?>" disabled="disabled" name="guarantee[rate]" placeholder="0.00">%</td>
                  </tr>
                  <tr>
                    <td class="td_light_gray" colspan="2">一抵余额</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["one_balance"]); ?>" name="guarantee[one_balance]"></td>
                    <td class="td_light_gray" colspan="2">一抵撤销/一抵抵押率</td>
                    <td class="am-text-middle" colspan="2"><!--<?php echo ($indentinfo["guarantee"]["one_rate"]); ?>--><input type="text" style="width:20%;min-width:40px;border-bottom:1px solid #ccc;" value="<?php echo ($indentinfo["guarantee"]["one_rate"]); ?>" disabled="disabled" name="guarantee[one_rate]" placeholder="0.00">%</td>
                  </tr>
                  <tr>
                    <td class="td_light_gray" colspan="2">一抵类型</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["one_type"]); ?>" name="guarantee[one_type]"></td>
                    <td class="td_light_gray" colspan="2">待撤销二抵余额</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["two_balance"]); ?>" name="guarantee[two_balance]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray" colspan="2">土地性质</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["property"]); ?>" required="" name="guarantee[property]"></td>
                    <td class="td_light_gray" colspan="2">建筑类型</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["building_types"]); ?>" required="" name="guarantee[building_types]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray" colspan="2">竣工年限</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["age_of_house"]); ?>" required="" name="guarantee[age_of_house]"></td>
                    <td class="td_light_gray" colspan="2">户口人数</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["registered_number"]); ?>" required="" name="guarantee[registered_number]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray" colspan="2">租赁情况</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["lease_type"]); ?>" required="" name="guarantee[lease_type]" placeholder="无或状态"></td>
                    <td class="td_light_gray" colspan="2">预告登记情况</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["pre_registration"]); ?>" name="guarantee[pre_registration]"></td>
                  </tr>
                  <tr>
                    <td class="td_light_gray am-text-middle" colspan="2">备用房情况（如有写明产权人）</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["employ"]); ?>" name="guarantee[employ]"></td>
                    <td class="td_light_gray am-text-middle" colspan="2">备用房地址</td>
                    <td class="am-text-middle" colspan="2"><input type="text" value="<?php echo ($indentinfo["guarantee"]["standby_application"]); ?>" name="guarantee[standby_application]"></td>
                  </tr>
                  <!--/抵押物基本情况-->
                  <tr class="td_darkgray"><td colspan="8">征信情况说明</td></tr>
                  <tr><td colspan="8"><textarea class="textarea" rows="5" name="credit_investigation"><?php echo ($indentinfo["credit_investigation"]); ?></textarea></td></tr>

                  <tr class="td_darkgray"><td colspan="8">司法情况说明</td></tr>
                  <tr><td colspan="8"><textarea class="textarea" rows="5" name="judiciary_condition"><?php echo ($indentinfo["judiciary_condition"]); ?></textarea></td></tr>

                  <tr class="td_darkgray"><td colspan="8">审查结论</td></tr>
                  <tr>
                    <td class="td_light_gray">审查结论</td>
                    <td colspan="7">
                      <!--<input type="text" value="<?php echo ($indentinfo["investigate"]); ?>" name="investigate">-->
                      <div class="sbm">
                        <button type="button" id="btn_investigate" u="<?php echo ($indentinfo["investigate"]); ?>" class="am-btn am-btn-primary am-btn-xs am-round am-vertical-align-middle">
                          <i class="am-icon-floppy-o"></i>
                          获取数据
                        </button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="td_light_gray">经办人</td>
                    <td class="am-text-middle" colspan="3"><input type="text" value="<?php echo ($indentinfo["responsible_person"]); ?>" name="responsible_person"></td>
                    <td class="td_light_gray">日期</td>
                    <td class="am-text-middle" colspan="3"><input type="text" value="<?php echo ($indentinfo["investigate_date"]); ?>" name="investigate_date"></td>
                  </tr>

                  <tr class="td_darkgray"><td colspan="8">审批意见</td></tr>
                  <!--<tr>
                    <td class="td_light_gray">上海富涌资产管理公司</td>
                    <td colspan="3"><input type="text" value="<?php echo ($indentinfo); ?>" name=""></td>
                    <td class="td_light_gray">日期</td>
                    <td colspan="3"><input type="text" value="<?php echo ($indentinfo); ?>" name=""></td>
                  </tr>-->
                  <tr>
                    <td class="td_light_gray">项目负责人</td>
                    <td class="am-text-middle" colspan="3"><input type="text" value="<?php echo ($indentinfo["principal"]); ?>" name="principal"></td>
                    <td class="td_light_gray">日期</td>
                    <td class="am-text-middle" colspan="3"><input type="text" value="<?php echo ($indentinfo["principal_date"]); ?>" name="principal_date"></td>
                  </tr>
                  <tr>
                    <td colspan="8">
                      <button type="button" id="approve_btn_back" class="am-btn am-btn-primary am-btn-lg am-round am-vertical-align-middle">
                        <i class="am-icon-arrow-left"></i>
                        打开创建页
                      </button>
                    </td>
                  </tr>
                </table>

              </div>
              <div class="sbm" id="sbm">
                <button type="submit" id="submit" class="am-btn am-btn-primary am-btn-lg am-round am-vertical-align-middle">
                 <!--  <i class="am-icon-floppy-o"></i> -->
                  确认修改
                </button>
                <button type="button" id="print" class="am-btn am-btn-primary am-btn-lg am-round am-vertical-align-middle">
                  <!-- <i class="am-icon-print"></i> -->
                  打印预览
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>


      <!--/表单结束-->


      <div class="ifeame_container" id="ifeame_center">
        <div class="title_bar">
          <span>审查报告</span>
          <!--<a href="javascript:;" class="am-close am-close-alt am-close-spin am-icon-times close_btn" onclick="$('#ifeame_center').remove();"></a>-->
          <a href="javascript:;" class="am-close am-close-alt am-close-spin am-icon-times close_btn" onclick="$('#ifeame_center').hide();"></a>
        </div>
        <div class="iframe_content">
          <iframe class="iframe" id="iframe" src="" r_src="<?php echo U('Order2/examine',array('id'=>$indentinfo['investigate'],'i_id'=>$indentinfo['id']));?>"></iframe>
        </div>
      </div>






    </div>
  </div>
</div>

<!--<script>







  var uploader = new plupload.Uploader({ //实例化一个plupload上传对象
    browse_button : 'img_file1',
    url : '<?php echo U(File/img_file);?>',
    flash_swf_url : '/Public/Admin/assets/js/plupload/Moxie.swf',
    silverlight_xap_url : '/Public/Admin/assets/js/plupload/Moxie.xap',
    filters: {
      mime_types : [ //只允许上传图片文件
        { title : "图片文件", extensions : "jpg,gif,png" }
      ]
    }
  });
  uploader.init(); //初始化

  //绑定文件添加进队列事件
  uploader.bind('FilesAdded',function(uploader,files){
    for(var i = 0, len = files.length; i<len; i++){
      var file_name = files[i].name; //文件名
      //构造html来更新UI
      var html = '<li id="file-' + files[i].id +'"><p class="file-name">' + file_name + '</p><p class="progress"></p></li>';
      $(html).appendTo('#img_library');
      console.log(files[i]);


      !function(i){
        previewImage(files[i],function(imgsrc){

          $('#file-'+files[i].id).append('<img src="'+ imgsrc +'" />');
        })
      }(i);


    }
  });

  //绑定文件上传进度事件
  uploader.bind('UploadProgress',function(uploader,file){
    $('#file-'+file.id+' .progress').css('width',file.percent + '%');//控制进度条
  });

  //上传按钮
  $('#upload-btn').click(function(){
    uploader.start(); //开始上传
  });

  //plupload中为我们提供了mOxie对象
  //有关mOxie的介绍和说明请看：https://github.com/moxiecode/moxie/wiki/API
  //如果你不想了解那么多的话，那就照抄本示例的代码来得到预览的图片吧
  function previewImage(file,callback){//file为plupload事件监听函数参数中的file对象,callback为预览图片准备完成的回调函数
    if(!file || !/image\//.test(file.type)) return; //确保文件是图片
    if(file.type=='image/gif'){//gif使用FileReader进行预览,因为mOxie.Image只支持jpg和png
      var fr = new mOxie.FileReader();
      fr.onload = function(){
        callback(fr.result);
        fr.destroy();
        fr = null;
      }
      fr.readAsDataURL(file.getSource());
    }else{
      var preloader = new mOxie.Image();
      preloader.onload = function() {
        preloader.downsize( 300, 300 );//先压缩一下要预览的图片,宽300，高300
        var imgsrc = preloader.type=='image/jpeg' ? preloader.getAsDataURL('image/jpeg',80) : preloader.getAsDataURL(); //得到图片src,实质为一个base64编码的数据
        callback && callback(imgsrc); //callback传入的参数为预览图片的url
        preloader.destroy();
        preloader = null;
      };
      preloader.load( file.getSource() );
    }
  }

</script>-->


<div class="load">
  <div class="back"></div>
  <div class="load_img">
    <img src="/Public/Admin/assets/img/loading.gif">
    <div class="load_text"></div>
  </div>
</div>









<script>
  var imgup = "<?php echo U('File/img_file_2');?>";
  var imgurl = "/Public";
  var print = "<?php echo U('Order2/order_print',array('id'=>$indentinfo['id']));?>";
  var iframe_u = "<?php echo U('Order2/examine');?>";
  var investigate_url = "<?php echo U('Order2/chack_data');?>";
  var name_url = "<?php echo U('Order2/chack_username');?>";
  var i_id = "<?php echo ($indentinfo["id"]); ?>";


</script>

<script src="/Public/Admin/assets/js/lrz.min.js"></script>
<script src="/Public/Admin/assets/js/images.js"></script>










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