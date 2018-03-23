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


<link rel="stylesheet" href="/Public/Admin/assets/css/a4_style.css">
<!--<link rel="stylesheet" href="/Public/Admin/assets/css/print/print.css">-->
<link rel="stylesheet" href="/Public/Admin/assets/css/amazeui.min.css">

<style>
.a4_content table>tbody>tr>th{
    color: #666;
}
input.t_input{
  width:17.8% !important;
  height: 24px;
}
input[type=text]{
  width: 99%;
  margin-top: 5px;
  margin-bottom: 5px;
  border: none;

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

 
</style>


<div style="height: 50px;line-height: 50px;font-size: 16px;color: #32c5d2;margin-left: 30px;border-bottom: solid 1px #ddd;">调查报告</div>


    <div class="tpl-block" style="margin-top: 15px">

    
      <!--表单开始-->

      <div class="a4_window">
        <div class="a4_container">
          <div class="a4_content" id="form">
            <form action="#" method="post">
              <input type="hidden" name="id" value="<?php echo ($indentinfo["id"]); ?>">
              <input type="hidden" name="i_id" value="<?php echo ($indentinfo["i_id"]); ?>">
              <div class="spa4_content">
                <div class="table_title1" style="position: relative;">调&nbsp;&nbsp;查&nbsp;&nbsp;报&nbsp;&nbsp;告<span style="position: absolute; float:right;font-size:12px;top:7px;right:20px;">-抵押类</span></div>
                <!--项目基本信息-->
                <table class="am-table am-table-bordered am-table-centered am-text-sm am-table-compact">
                  <!--<tr>-->
                  <!--<th colspan="7" class="table_title1">信用调查报告（抵押类）</th>-->
                  <!--</tr>-->
                  <tr>
                    <th colspan="7" class="  tbl_td_text_font7 td_light_dark_golden">基本信息</th>
                  </tr>
                  <tr><td colspan="7" class="tbl_bord"></td></tr>
                  <tr>
                    <th width="15%">合同编号</th>
                    <th width="14%">客户姓名</th>
                    <!--<th>客户类型</th>-->
                    <th width="30%" colspan="2">批复额度（万）</th>
                    <th width="15%">获客渠道</th>
                    <th width="14%">外访/经办</th>
                    <th width="12%">预审/经办</th>
                  </tr>
                  <tr>
                    <td><input type="text" name="basic_info[contract_number]" value="<?php echo ($indentinfo["basic_info"]["contract_number"]); ?>"></td>
                    <td><input type="text" name="basic_info[name]" value="<?php echo ($indentinfo["basic_info"]["name"]); ?>"></td>
                    <!--<td><input type="text" name="basic_info[user_type]" value="<?php echo ($indentinfo["basic_info"]["user_type"]); ?>"></td>-->
                    <td colspan="2"><input type="text" name="basic_info[agree]" value="<?php echo ($indentinfo["basic_info"]["agree"]); ?>"></td>
                    <td><input type="text" name="basic_info[channel]" value="<?php echo ($indentinfo["basic_info"]["channel"]); ?>"></td>
                    <td><input type="text" name="basic_info[outbound]" value="<?php echo ($indentinfo["basic_info"]["outbound"]); ?>"></td>
                    <td><input type="text" name="basic_info[preliminary_hearing]" value="<?php echo ($indentinfo["basic_info"]["preliminary_hearing"]); ?>"></td>
                  </tr>
                  <tr>
                    <th>其他说明</th>
                    <td colspan="6"><input type="text" name="basic_info[other_description]" value="<?php echo ($indentinfo["basic_info"]["other_description"]); ?>"></td>
                  </tr>
                  <tr><td colspan="7" class="tbl_bord"></td></tr>
                  <tr>
                    <th>合同编号</th>
                    <th>借款人</th>
                    <th width="14%">抵押人</th>
                    <th>担保人</th>
                    <th>借款金额（万）</th>
                    <th>借款期限(月)</th>
                    <th>保证金</th>
                  </tr>
                  <tr>
                    <td><input type="text" name="basic_info[contract_number]" disabled value="<?php echo ($indentinfo["basic_info"]["contract_number"]); ?>"></td>
                    <td><input type="text" name="basic_info[name]" disabled value="<?php echo ($indentinfo["basic_info"]["name"]); ?>"></td>
                    <td><input type="text" name="basic_info[pledger]" value="<?php echo ($indentinfo["basic_info"]["pledger"]); ?>"></td>
                    <td><input type="text" name="basic_info[surety]" value="<?php echo ($indentinfo["basic_info"]["surety"]); ?>"></td>
                    <td><input type="text" name="basic_info[loanamount]" value="<?php echo ($indentinfo["basic_info"]["loanamount"]); ?>"></td>
                    <td><input type="text" name="basic_info[time_number]" value="<?php echo ($indentinfo["basic_info"]["time_number"]); ?>"></td>
                    <td><input type="text" name="basic_info[cash_deposit]" value="<?php echo ($indentinfo["basic_info"]["cash_deposit"]); ?>"></td>
                  </tr>
                  <tr>
                    <th colspan="2">抵押房产位置</th>
                    <th>抵押类型</th>
                    <th>一抵负债（万）</th>
                    <th>评估值（万）</th>
                    <th>抵押率%</th>
                    <th>付息方式</th>
                  </tr>
                  <tr>
                    <td colspan="2"><input type="text" name="basic_info[location]" value="<?php echo ($indentinfo["basic_info"]["location"]); ?>"></td>
                    <td><input type="text" name="basic_info[guarantee_type]" value="<?php echo ($indentinfo["basic_info"]["guarantee_type"]); ?>"></td>
                    <td><input type="text" name="basic_info[guarantee_one_balance]" value="<?php echo ($indentinfo["basic_info"]["guarantee_one_balance"]); ?>"></td>
                    <td><input type="text" name="basic_info[guarantee_assess_total_prices]" value="<?php echo ($indentinfo["basic_info"]["guarantee_assess_total_prices"]); ?>"></td>
                    <td><input type="text" name="basic_info[guarantee_assess_rate]" value="<?php echo ($indentinfo["basic_info"]["guarantee_assess_rate"]); ?>"></td>
                    <td><input type="text" name="basic_info[way]" value="<?php echo ($indentinfo["basic_info"]["way"]); ?>"></td>
                  </tr>
                  <tr>
                    <th rowspan="2">每月付息%</th>
                    <th rowspan="2">前置利息%</th>
                    <th rowspan="2">每月付费%</th>
                    <th rowspan="2">前置费用%</th>
                    <th rowspan="2">渠道返点%</th>
                    <th colspan="2">综合费率（%/月）</th>
                  </tr>
                  <tr>
                    <td>不含返点</td>
                    <td>含返点</td>
                  </tr>
                  <tr>
                    <td><input type="text" name="basic_info[monthly_interest]" value="<?php echo ($indentinfo["basic_info"]["monthly_interest"]); ?>"></td>
                    <td><input type="text" name="basic_info[preposition_interest]" value="<?php echo ($indentinfo["basic_info"]["preposition_interest"]); ?>"></td>
                    <td><input type="text" name="basic_info[monthly_cost]" value="<?php echo ($indentinfo["basic_info"]["monthly_cost"]); ?>"></td>
                    <td><input type="text" name="basic_info[preposition_cost]" value="<?php echo ($indentinfo["basic_info"]["preposition_cost"]); ?>"></td>
                    <td><input type="text" name="basic_info[channel_rebate]" value="<?php echo ($indentinfo["basic_info"]["channel_rebate"]); ?>"></td>
                    <td><input type="text" name="basic_info[nrebate]" value="<?php echo ($indentinfo["basic_info"]["nrebate"]); ?>"></td>
                    <td><input type="text" name="basic_info[rebate]" value="<?php echo ($indentinfo["basic_info"]["rebate"]); ?>"></td>
                  </tr>
                </table>
                <!--相关人员信息-->
                <table class="am-table am-table-bordered am-table-centered am-text-sm am-table-compact">
                  <tr>
                    <th colspan="7" class="tbl_td_text_font7 td_light_dark_golden">人员信息</th>
                  </tr>
                  <?php if(is_array($indentinfo['relatedusersinfo'])): $k = 0; $__LIST__ = $indentinfo['relatedusersinfo'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo["username"] != ''): ?><tr>
                    <td colspan="7" class="tbl_bord tbl_td_text_left">
                      <?php switch($k): case "1": ?><b>权利人①</b><?php break;?>
                        <?php case "2": ?><b>权利人②</b><?php break;?>
                        <?php case "3": ?><b>权利人③</b><?php break;?>
                        <?php case "4": ?><b>权利人④</b><?php break;?>
                        <?php case "5": ?><b>权利人⑤</b><?php break; endswitch;?>
                    </td>
                  </tr>
                  <tr>
                    <th width="12%">姓名</th>
                    <th width="12%">性别</th>
                    <th width="8%">年龄</th>
                    <th colspan="2" width="29%">身份证号码</th>
                    <!--<th width="12%">有效期</th>-->
                    <th width="10%">婚姻状况</th>
                    <th width="13%">联系电话</th>
                  </tr>
                  <tr>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][username]" value="<?php echo ($vo["username"]); ?>"></td>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][gender]" value="<?php echo ($vo["gender"]); ?>"></td>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][age]" value="<?php echo ($vo["age"]); ?>"></td>
                    <td colspan="2"><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][identification_id]" value="<?php echo ($vo["identification_id"]); ?>"></td>
                    <!--<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;年&nbsp;&nbsp;&nbsp;月&nbsp;&nbsp;&nbsp;日</td>-->
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][marriage]" value="<?php echo ($vo["marriage"]); ?>"><!--未婚单身/离异--></td>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][mobile]" value="<?php echo ($vo["mobile"]); ?>"></td>
                  </tr>
                  <tr>
                    <th colspan="3">户籍地址</th>
                    <th colspan="2">现住地址</th>
                    <th colspan="2">单位地址</th>
                  </tr>
                  <tr>
                    <td colspan="3"><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][census_register_site]" value="<?php echo ($vo["census_register_site"]); ?>"></td>
                    <td colspan="2"><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][family_address]" value="<?php echo ($vo["family_address"]); ?>"></td>
                    <td colspan="2"><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][unit_site]" value="<?php echo ($vo["unit_site"]); ?>"></td>
                  </tr>
                  <tr>
                    <th rowspan="2">征信查询日期</th>
                    <th rowspan="2">近一年查询次数</th>
                    <th colspan="5">贷款信息（近二年）</th>
                  </tr>
                  <tr>
                    <th>贷款笔数</th>
                    <th colspan="2">贷款类型/余额</th>
                    <th>逾期次数</th>
                    <th>最长月数</th>
                  </tr>
                  <tr>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][refer_data]" value="<?php echo ($vo["unit_site"]); ?>" placeholder="例:2017/05/12"></td>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][refer_frequency]" value="<?php echo ($vo["refer_frequency"]); ?>" placeholder="次"></td>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][stroke_count]" value="<?php echo ($vo["stroke_count"]); ?>" placeholder="笔"></td>
                    <td colspan="2"><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][type_balance]" value="<?php echo ($vo["type_balance"]); ?>" placeholder="元"></td>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][overdue_frequency]" value="<?php echo ($vo["overdue_frequency"]); ?>" placeholder="次"></td>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][month_frequency]" value="<?php echo ($vo["month_frequency"]); ?>" placeholder="个月"></td>
                  </tr>
                  <tr>
                    <th colspan="6">信用卡信息(近两年)</th>
                    <th rowspan="2">当月还款合计</th>
                  </tr>
                  <tr>
                    <th>信用卡张数</th>
                    <th colspan="2">授信总额</th>
                    <th>已用额度</th>
                    <th>逾期次数</th>
                    <th>最长月数</th>
                  </tr>
                  <tr>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][credit_card_info]" value="<?php echo ($vo["credit_card_info"]); ?>" placeholder="张"></td>
                    <td colspan="2"><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][credit_limit]" value="<?php echo ($vo["credit_limit"]); ?>" placeholder="元"></td>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][use_limit]" value="<?php echo ($vo["use_limit"]); ?>" placeholder="元"></td>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][cc_overdue_frequency]" value="<?php echo ($vo["cc_overdue_frequency"]); ?>" placeholder="次"></td>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][cc_month_frequency]" value="<?php echo ($vo["cc_month_frequency"]); ?>" placeholder="个月"></td>
                    <td><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][cc_hkhj]" value="<?php echo ($vo["cc_hkhj"]); ?>" placeholder="元"></td>
                  </tr>
                  <tr>
                    <th>其他说明</th>
                    <td colspan="6"><input type="text" name="relatedusersinfo[<?php echo ($k); ?>][cc_other_description]" value="<?php echo ($vo["cc_other_description"]); ?>" placeholder="被执行信息查询结果"></td>
                  </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <!--<div class="page"></div>-->
                <!--相关企业信息-->
                 <table class="am-table am-table-bordered am-table-centered am-text-sm am-table-compact">
                   <!--<tr>-->
                     <!--<th colspan="7" class="table_title1">信用调查报告（抵押类）</th>-->
                   <!--</tr>-->
                   <tr>
                     <th colspan="7" class="tbl_td_text_font7 td_light_dark_golden">相关企业信息</th>
                   </tr>
                   <tr><td colspan="7" class="tbl_bord"></td></tr>
                   <tr>
                     <th width="30%" colspan="2">企业名称</th>
                     <th width="30%">统一社会信用代码</th>
                     <th width="15%">注册资本</th>
                     <th width="25%">营业期限</th>
                   </tr>
                   <tr>
                     <td colspan="2"><input type="text" name="enterprise[name]" value="<?php echo ($indentinfo["enterprise"]["name"]); ?>"></td>
                     <td><input type="text" name="enterprise[code]" value="<?php echo ($indentinfo["enterprise"]["code"]); ?>"></td>
                     <td><input type="text" name="enterprise[registered_capital]" value="<?php echo ($indentinfo["enterprise"]["registered_capital"]); ?>" placeholder="万元"></td>
                     <td><input type="text" name="enterprise[operating_period]" value="<?php echo ($indentinfo["enterprise"]["operating_period"]); ?>"></td>
                   </tr>
                   <tr>
                     <th>法定代表人</th>
                     <th>实际控制人</th>
                     <th colspan="2">通讯地址</th>
                     <th>股东构成</th>
                   </tr>
                   <tr>
                     <td><input type="text" name="enterprise[legal_person]" value="<?php echo ($indentinfo["enterprise"]["legal_person"]); ?>"></td>
                     <td><input type="text" name="enterprise[control_person]" value="<?php echo ($indentinfo["enterprise"]["control_person"]); ?>"></td>
                     <td colspan="2"><input type="text" name="enterprise[contact_address]" value="<?php echo ($indentinfo["enterprise"]["contact_address"]); ?>"></td>
                     <td><input type="text" name="enterprise[shareholder_structure]" value="<?php echo ($indentinfo["enterprise"]["shareholder_structure"]); ?>"></td>
                   </tr>
                   <tr>
                     <th>其他说明</th>
                     <td colspan="4"><input type="text" name="enterprise[other_description]" value="<?php echo ($indentinfo["enterprise"]["other_description"]); ?>" placeholder="被执行信息查询结果"></td>
                   </tr>
                 </table>
                <!--资产负债信息-->
                <table class="am-table am-table-bordered am-table-centered am-text-sm am-table-compact">
                  <!--<tr>-->
                  <!--<th colspan="7" class="table_title1">信用调查报告（抵押类）</th>-->
                  <!--</tr>-->
                  <tr>
                    <th colspan="7" class="  tbl_td_text_font7 td_light_dark_golden">资产负债信息</th>
                  </tr>
                  <tr><th colspan="7" class="tbl_bord tbl_td_text_font6">抵押房产信息</th></tr>
                  <tr>
                    <th colspan="2">抵押物所属区域</th>
                    <th>小区名称</th>
                    <th>房产权利人</th>
                    <th colspan="3">房产证/不动产权证编号</th>
                  </tr>
                  <tr>
                    <td colspan="2"><input type="text" name="balance_sheet[location]" value="<?php echo ($indentinfo["balance_sheet"]["location"]); ?>"></td>
                    <td><input type="text" name="balance_sheet[a_housing_estate]" value="<?php echo ($indentinfo["balance_sheet"]["a_housing_estate"]); ?>"></td>
                    <td><input type="text" name="balance_sheet[property_owner]" value="<?php echo ($indentinfo["balance_sheet"]["property_owner"]); ?>"></td>
                    <td colspan="3"><input type="text" name="balance_sheet[certificate_number]" value="<?php echo ($indentinfo["balance_sheet"]["certificate_number"]); ?>"></td>
                  </tr>
                  <tr>
                    <th>土地性质/房产类型</th>
                    <th>房产面积（㎡）</th>
                    <th>楼层/总层</th>
                    <th>竣工年限</th>
                    <th>单价/平米（元）</th>
                    <th colspan="2">评估总价（万元）</th>
                  </tr>
                  <tr>
                    <td><input type="text" name="balance_sheet[property]" value="<?php echo ($indentinfo["balance_sheet"]["property"]); ?>"></td>
                    <td><input type="text" name="balance_sheet[area]" value="<?php echo ($indentinfo["balance_sheet"]["area"]); ?>"></td>
                    <td><input type="text" name="balance_sheet[storey]" value="<?php echo ($indentinfo["balance_sheet"]["storey"]); ?>"></td>
                    <td><input type="text" name="balance_sheet[age_of_house]" value="<?php echo ($indentinfo["balance_sheet"]["age_of_house"]); ?>"></td>
                    <td><input type="text" name="balance_sheet[assess_unit_price]" value="<?php echo ($indentinfo["balance_sheet"]["assess_unit_price"]); ?>"></td>
                    <!--<td></td>-->
                    <td colspan="2"><input type="text" name="balance_sheet[assess_total_prices]" value="<?php echo ($indentinfo["balance_sheet"]["assess_total_prices"]); ?>"></td>
                  </tr>
                  <tr>
                    <th>抵押情况</th>
                    <td colspan="6"><input type="text" name="balance_sheet[guaranty_condition]" value="<?php echo ($indentinfo["balance_sheet"]["guaranty_condition"]); ?>" placeholder="抵押权人：抵押金额：抵押期限：他证编号："></td>
                  </tr>
                  <tr>
                    <th>产权分析</th>
                    <td colspan="6"><input type="text" name="balance_sheet[property_analyze]" value="<?php echo ($indentinfo["balance_sheet"]["property_analyze"]); ?>" placeholder="产权人之间关系：产权人与借款人之间关系;产权是否清晰"></td>
                  </tr>
                  <tr>
                    <th>变现能力分析</th>
                    <td colspan="6"><textarea class="textarea" rows="2" name="balance_sheet[bxnlfx]" placeholder="房产现状：产权人自住/XX居住/出租(租金：)/空置，户口：有XX户口/无户口，交通：便利/一般/不便,周边配置；齐全/一般/较差，综合快速变现能力：较强/一般/较差。"><?php echo ($indentinfo["balance_sheet"]["bxnlfx"]); ?></textarea></td>
                  </tr>
                  <tr>
                    <td colspan="7" class="tbl_bord"><br /></td>
                  </tr>
                  <!-- <tr>
                     <th colspan="2">房产位置</th>
                     <th>房产权利人</th>
                     <th colspan="2">房产证/不动产权证编号</th>
                     <th>评估值（万元）</th>
                     <th>余额（万元）</th>
                   </tr>
                   <tr>
                     <td colspan="2"></td>
                     <td></td>
                     <td colspan="2">字第号/沪（）字不动产权证明编号</td>
                     <td></td>
                     <td></td>
                   </tr>-->
                  <tr><th colspan="7" class="table_title3">相关负债情况</th></tr>
                  <tr>
                    <th>债权人</th>
                    <th>债务人</th>
                    <th>债务金额</th>
                    <th>债务期限</th>
                    <th colspan="3">债务说明</th>
                  </tr>
                  <tr>
                    <td><input type="text" name="balance_sheet[creditor]" value="<?php echo ($indentinfo["balance_sheet"]["creditor"]); ?>"></td>
                    <td><input type="text" name="balance_sheet[debtor]" value="<?php echo ($indentinfo["balance_sheet"]["debtor"]); ?>"></td>
                    <td><input type="text" name="balance_sheet[amount_of_indebtedness]" value="<?php echo ($indentinfo["balance_sheet"]["amount_of_indebtedness"]); ?>"><!--万元--></td>
                    <td><input type="text" name="balance_sheet[debt_maturities]" value="<?php echo ($indentinfo["balance_sheet"]["debt_maturities"]); ?>"></td>
                    <td colspan="3"><input type="text" name="balance_sheet[debt_explain]" value="<?php echo ($indentinfo["balance_sheet"]["debt_explain"]); ?>"><!--债务类型，剩余本金等说明--></td>
                  </tr>
                </table>
                <!--综合分析及调查结论-->
                <table class="am-table am-table-bordered am-table-centered am-text-sm" style="width: 100%">
                  <!--<tr>-->
                  <!--<th colspan="7" class="table_title1">信用调查报告（抵押类）</th>-->
                  <!--</tr>-->
                  <tr>
                    <th colspan="2" class="  tbl_td_text_font7 td_light_dark_golden">综合分析及调查结论</th>
                  </tr>
                  <tr><td colspan="2" class="tbl_bord"></td></tr>
               <!--   <tr>
                    <th width="20%">经营状况分析</th>
                    <td width="80%">客户描述的情况；材料能够印证的情况；自主判断的情况</td>
                  </tr>-->
                  <tr>
                    <th>贷款人描述</th>
                    <td><textarea class="textarea" rows="2" name="synthesize[name]"><?php echo ($indentinfo["synthesize"]["name"]); ?></textarea></td>
                  </tr>
                  <tr>
                    <th>用途及还款</th>
                    <td><textarea class="textarea" rows="2" name="synthesize[purpose_advance]"><?php echo ($indentinfo["synthesize"]["purpose_advance"]); ?></textarea></td>
                  </tr>
                  <tr>
                    <th>结&nbsp;&nbsp;&nbsp;&nbsp;论</th>
                    <td><textarea class="textarea" rows="2" name="synthesize[verdict]" placeholder="1，弊 2，利 3，其他说明；综合以上情况 风控人员同意办理"><?php echo ($indentinfo["synthesize"]["verdict"]); ?></textarea></td>
                  </tr>
                </table>
              </div>
              <div class="sbm" id="sbm">
                <button type="submit" id="submit" class="am-btn am-btn-primary am-btn-lg am-round am-vertical-align-middle">
                  <!-- <i class="am-icon-floppy-o"></i> -->
                  确认修改
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>



      <!--/表单结束-->

    </div>
  </div>
</div>















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