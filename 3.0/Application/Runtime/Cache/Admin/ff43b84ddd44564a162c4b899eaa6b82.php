<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>

  <link rel="stylesheet" href="/Public/Admin/assets/css/amazeui.min.css" />
  <link rel="stylesheet" href="/Public/Admin/assets/css/admin.css">
  <link rel="stylesheet" href="/Public/Admin/assets/css/app.css">
  <link rel="stylesheet" href="/Public/Admin/assets/css/style.css">
  <link rel="stylesheet" href="/Public/Admin/assets/css/a4_style.css">

  <script src="/Public/js/jquery-3.2.1.min.js"></script>

  <script type="text/javascript" src="/Public/Admin/assets/js/images.js"></script>
  <style>
    *{margin:0;padding:0;border:0;}
    html,body{width:100%;height:100%;overflow: inherit;background-color:#fff;}

    .process_line{
      float: left;
      width:20px;
      height: 20px;
     color: white;
      background: green; 
  </style>
</head>


<script>
  $(function(){


  function Mymove(wth ,obj){

     var color_type=new Array();
    color_type[0]='#68c54d';     
  color_type[5]='#68c54d';
  color_type[10]='#70c74c';
  color_type[15]='#82cd49';
  color_type[20]='#8fd146';
  color_type[25]='#a3d743';
  color_type[30]='#b2d940';
  color_type[35]='#c4d93d';
  color_type[40]='#d4d93a';
  color_type[45]='#e2d937';
  color_type[50]='#e9d936';
  color_type[55]='#ecd534';
  color_type[60]='#ecc833';
  color_type[65]='#ecb732';
  color_type[70]='#eca531';
  color_type[75]='#e99031';
  color_type[80]='#e47c31';
  color_type[85]='#de6831';
  color_type[90]='#d95531';
  color_type[95]='#d54531';
  color_type[100]='#d13630';

  var wth=wth;

           var  width= wth % 5;
           if(width==0){
                 width=wth
           }else if(width>98.5){
                  width=100
           }else{
             width=wth+(5-2.5)
           }

          // width = 0 ? wth : wth+(5-2.5);
      /* console.log(color_type[100]);
           console.log(color_type) ; */

           var pingce=wth;
           var wenzi="";
               
                  if(pingce<=10){
                     wenzi="&#12288;低";
                  } 
                  if(pingce>=11){
                      wenzi="较低";
                  }

                   if(pingce>35){
                    wenzi="&#12288;中";
                  }
                   if(pingce>65){
                     wenzi="较高";
                  } 
                  if(pingce>85){
                    wenzi="&#12288;高";
                  }

          if(width <= 50){
            var stime = width * 50;
            obj.animate({
                      'width':(width*2+20)+'px',
                    },stime).css({
                      'background':color_type[width],
                      'transition': ' background '+stime/1000+'s',
                      '-moz-transition': ' background '+stime/1000+'s',  /* Firefox 4 */
                      '-webkit-transition': ' background '+stime/1000+'s', /* Safari 和 Chrome */
                      '-o-transition': ' background '+stime/1000+'s' /* Opera */
                    }).before("<span style='float:left;'>"+wenzi+"&nbsp;&nbsp;</span>");
          }else{
            var stime = (width - 50)*50;
            obj.animate({
                      'width':(width*2+20)+'px',
                    },50 * 50).css({
                      'background':color_type[50],
                      'transition': ' background 1s',
                      '-moz-transition': ' background 1s',  /* Firefox 4 */
                      '-webkit-transition': ' background 1s', /* Safari 和 Chrome */
                      '-o-transition': ' background 1s' /* Opera */
                    }).before("<span style='float:left;'>"+wenzi+"&nbsp;&nbsp;</span>");
            setTimeout(function(){
                obj.animate({
                      'width':(width*2+20)+'px',
                      },stime).css({
                        'background':color_type[width],
                        'transition': ' background '+stime/1000+'s',
                        '-moz-transition': ' background '+stime/1000+'s',  /* Firefox 4 */
                        '-webkit-transition': ' background '+stime/1000+'s', /* Safari 和 Chrome */
                        '-o-transition': ' background '+stime/1000+'s' /* Opera */
                      });
            },1000)
          }




  }
      

      Mymove(<?php echo ($proportion); ?>, $(".process_span1"))
      Mymove(<?php echo ($proportion_cp); ?>, $(".process_span2"))
      Mymove(<?php echo ($financial); ?>, $(".process_span3"))
      Mymove(<?php echo ($comprehensive); ?>, $(".process_span4"))

       console.log(<?php echo ($comprehensive); ?>)
  })

</script>



<body style="padding-top:30px;padding-bottom: 30px;">
<div class="a4_container">
  <div class="a4_content">
<!--


    <div class="table_title1">企业信息</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="16%">企业名称</th>
        <th width="16%">组织机构代码</th>
        <th width="15%">法定代表人姓名</th>
        <th width="16%">企业注册号</th>
        <th width="37%" colspan="2">注册资本</th>
      </tr>
      <tr>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["Name"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["CreditCode"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["OperName"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["No"]); ?></td>
        <td colspan="2"><?php echo ($ep["bizlicinfo"]["product"]["Result"]["RegistCapi"]); ?></td>
      </tr>
      <tr>
        <th>开业日期</th>
        <th>经营期限至</th>
        <th>经营状态</th>
        <th>企业（机构）类型</th>
        <th width="15%">职工人数</th>
        <th width="22%">登记机关</th>
      </tr>
      <tr>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["TermStart"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["TeamEnd"]); ?></td>
        <td><?php echo ($ep["bizannualreport"]["product"]["Result"]["0"]["BasicInfoData"]["Status"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["EconKind"]); ?></td>
        <td><?php echo ($ep["bizannualreport"]["product"]["Result"]["0"]["BasicInfoData"]["EmployeeCount"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["BelongOrg"]); ?></td>
      </tr>
      <tr>
        <th>最后年检年度</th>
        <th>国民经济行业代码（门类）</th>
        <th>国民经济行业代码（小类）</th>
        <th>注册地址</th>
        <th colspan="2">业务范围</th>
      </tr>
      <tr>
        <td><?php echo ($ep["bizannualreport"]["product"]["Result"]["0"]["Year"]); ?></td>
        <td><?php echo ($ep["bizdetail"]["product"]["Result"]["Industry"]["Industry"]); ?></td>
        <td><?php echo ($ep["bizdetail"]["product"]["Result"]["Industry"]["SubIndustry"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["Address"]); ?></td>
        <td colspan="2"><?php echo ($ep["bizlicinfo"]["product"]["Result"]["Scope"]); ?></td>
      </tr>
    </table>


    &lt;!&ndash;企业异常信息 &ndash;&gt;
    <div class="table_title2">企业异常信息</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="5%">序号</th>
        <th width="17%">列入经营异常名录原因</th>
        <th width="12%">列入日期</th>
        <th width="24%">移出经营异常名录原因</th>
        <th width="12%">移出日期</th>
        <th width="15%">作出决定机关</th>
        <th width="15%">移除决定机关</th>
      </tr>
      <?php if(is_array($ep['bizopexception']['product']['Result'])): $k = 0; $__LIST__ = $ep['bizopexception']['product']['Result'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
          <td><?php echo ($k); ?></td>
          <td><?php echo ($vo["AddReason"]); ?></td>
          <td><?php echo ($vo["AddDate"]); ?></td>
          <td><?php echo ($vo["RomoveReason"]); ?></td>
          <td><?php echo ($vo["RemoveDate"]); ?></td>
          <td><?php echo ($vo["DecisionOffice"]); ?></td>
          <td><?php echo ($vo["RemoveDecisionOffice"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

    </table>









    <div style="width:100%;border-bottom:2px solid #ccc;margin:10px 0;"></div>


-->

    <div class="table_title5">报告生成时间 ：<?php echo ($get_time); ?></div>
    <!--<div class="table_title5">反欺诈评分：分</div>-->
    <!--<div class="table_title5">共发现XX条异常信息</div>-->
    <!--客户分析报告 -->
    <div class="table_title1">客户分析报告</div>
    <HR style="margin:10px 0;" width="100%" color=#ccc SIZE=4>
    <table class="am-table  am-text-sm iframe_table table_bord_none">
      <tr>
        <th width="10%"></th>
        <th width="45%">姓 名：<?php echo ($uesrinfo["username"]); ?></th>
        <th>身份证号：<?php echo ($uesrinfo["identification_id"]); ?></th>
      </tr>
      <tr>
        <th width="10%"></th>
        <th>手机号：<?php echo ($uesrinfo["mobile"]); ?></th>
        <th>银行卡号：--</th>
      </tr>
    </table>
    <br />

    <!--贷前风险汇总 -->
    <div class="table_title2">贷前风险汇总</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="20%">风险类别</th>
        <th width="50%">风险等级</th>
        <th width="30%">核查结果</th>
      </tr>
      <tr>
        <td>身份验证信息</td>
        <td><div class="process_line process_span1"></div></td>
        <td>
          <!--<?php if($rate['idtwo_photo'] == '2'): ?><div class="rank_red">×</div><?php endif; ?>-->
          <!--<?php if($rate['idtwo_photo'] == '1'): ?><div class="rank_green">√</div><?php endif; ?>-->
          <!--<?php if($rate['idtwo_photo'] == '3'): ?><div class="rank_yellow">○</div><?php endif; ?>-->
          <?php if($proportion > '49' and $proportion < '100' or $proportion == '100'): ?><div class="rank_red">×</div><?php endif; ?>
          <?php if($proportion == '0' or $proportion < '20'): ?><div class="rank_green">√</div><?php endif; ?>
          <?php if($proportion > '19' and $proportion < '50'): ?><div class="rank_yellow">○</div><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>公检法信息</td>
        <td><div class="process_line process_span2"></div></td>
        <td>
          <!--<?php if($rate['cp'] == '2'): ?><div class="rank_red">×</div><?php endif; ?>-->
          <!--<?php if($rate['cp'] == '1'): ?><div class="rank_green">√</div><?php endif; ?>-->
          <!--<?php if($rate['cp'] == '3'): ?><div class="rank_yellow">○</div><?php endif; ?>-->
          <?php if($proportion_cp > '49' and $proportion_cp < '100' or $proportion_cp == '100'): ?><div class="rank_red">×</div><?php endif; ?>
          <?php if($proportion_cp == '0' or $proportion_cp < '20'): ?><div class="rank_green">√</div><?php endif; ?>
          <?php if($proportion_cp > '19' and $proportion_cp < '50'): ?><div class="rank_yellow">○</div><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>金融信息</td>
        <td><div class="process_line process_span3"></div></td>
        <td>
          <!--<?php if($rate['bank'] == '2'): ?><div class="rank_red">×</div><?php endif; ?>-->
          <!--<?php if($rate['bank'] == '1'): ?><div class="rank_green">√</div><?php endif; ?>-->
          <!--<?php if($rate['bank'] == '3'): ?><div class="rank_yellow">○</div><?php endif; ?>-->
          <?php if($financial > '49' and $financial < '100' or $financial == '100'): ?><div class="rank_red">×</div><?php endif; ?>
          <?php if($financial == '0' or $financial < '20'): ?><div class="rank_green">√</div><?php endif; ?>
          <?php if($financial > '19' and $financial < '50'): ?><div class="rank_yellow">○</div><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>综合信息</td>
        <td><div class="process_line process_span4"></div></td>
        <td>
          <!--<?php if($rate['tel'] == 2): ?><div class="rank_red">×</div><?php endif; ?>-->
          <!--<?php if($rate['tel'] == 1): ?><div class="rank_green">√</div><?php endif; ?>-->
          <!--<?php if($rate['tel'] == 3): ?><div class="rank_yellow">○</div><?php endif; ?>-->
          <?php if($comprehensive > '49' and $comprehensive < '100' or $comprehensive == '100'): ?><div class="rank_red">×</div><?php endif; ?>
          <?php if($comprehensive == '0' or $comprehensive < '20'): ?><div class="rank_green">√</div><?php endif; ?>
          <?php if($comprehensive > '19' and $comprehensive < '50'): ?><div class="rank_yellow">○</div><?php endif; ?>
        </td>
      </tr>
      <!--<tr>
        <td>身份验证信息</td>
        <td><div class="process_line process_span1"></div></td>
        <td>
          <?php if($rate['idtwo_photo'] == '2'): ?><div class="rank_red">×</div><?php endif; ?>
          <?php if($rate['idtwo_photo'] == '1'): ?><div class="rank_green">√</div><?php endif; ?>
          <?php if($rate['idtwo_photo'] == '3'): ?><div class="rank_yellow">○</div><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>公检法信息</td>
        <td><div class="process_line process_span2"></div></td>
        <td>
          <?php if($rate['cp'] == '2'): ?><div class="rank_red">×</div><?php endif; ?>
          <?php if($rate['cp'] == '1'): ?><div class="rank_green">√</div><?php endif; ?>
          <?php if($rate['cp'] == '3'): ?><div class="rank_yellow">○</div><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>金融信息</td>
        <td><div class="process_line process_span3"></div></td>
        <td>
          <?php if($rate['bank'] == '2'): ?><div class="rank_red">×</div><?php endif; ?>
          <?php if($rate['bank'] == '1'): ?><div class="rank_green">√</div><?php endif; ?>
          <?php if($rate['bank'] == '3'): ?><div class="rank_yellow">○</div><?php endif; ?>
        </td>
      </tr>
      <tr>
        <td>综合信息</td>
        <td><div class="process_line process_span4"></div></td>
        <td>
          <?php if($rate['tel'] == 2): ?><div class="rank_red">×</div><?php endif; ?>
          <?php if($rate['tel'] == 1): ?><div class="rank_green">√</div><?php endif; ?>
          <?php if($rate['tel'] == 3): ?><div class="rank_yellow">○</div><?php endif; ?>
        </td>
      </tr>-->
    </table>
    <div class="explain">说明：汇总信息由贷前规则组成，详情见相应内容说明。</div>
    <br />

    <!--身份验证信息 -->
    <div class="table_title2">身份验证信息</div>
    <div class="table_title3">－身份证验证－</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="15%">姓名</th>
        <td width="50%"><?php echo ($uesrinfo["username"]); ?></td>
        <td rowspan="3" width="35%">
          <?php if($itp['msg'] == 1): if($itp['resultcode'] == '1'): ?><img src="data:image/png;base64,<?php echo ($itp["photo_base64"]); ?>" style="width:70%;max-height:100px;"><?php else: ?>查无照片<?php endif; else: ?>查询出错<?php endif; ?>
        </td>
      </tr>
      <tr>
        <th>身份证号</th>
        <td><?php echo ($uesrinfo["identification_id"]); ?></td>
      </tr>
      <tr>
        <th>结果</th>
        <td style="font-weight:bold;color:<?php if($itp['msg'] == 1 and ($itp['result'] == '身份一致' or $itp['result'] == '身份一致无照片')): ?>green<?php else: ?>red<?php endif; ?>"><?php if($itp['msg'] == 1): echo ($itp["result"]); else: ?>查询出错<?php endif; ?></td>
      </tr>
      <!--<tr>-->
      <!--<th>身份证号归属地</th>-->
      <!--<td></td>-->
      <!--</tr>-->
    </table>
    <div class="explain">说明：照片为通过权威机构查询到的证件原始照片</div>
    <br />

    <!--手机三要素 -->
    <div class="table_title3">－手机三要素－</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="15%">校验项</th>
        <td width="35%">姓名、手机号、身份证号</td>
        <!--<th rowspan="2" width="15%">手机号归属地</th>-->
        <!--<td rowspan="2" width="35%"></td>-->
      </tr>
      <tr>
        <th>结果</th>
        <td style="font-weight:bold;color:<?php if($tel_operation == '均一致'): ?>green<?php else: ?>red<?php endif; ?>"><?php echo ($tel_operation); ?></td>
      </tr>
    </table>
    <div class="explain">说明：照片为通过权威机构查询到的证件原始照片</div>
    <br />

    <!--公检法信息    公安负面信息详情 -->
    <div class="table_title2">公检法信息</div>
    <div class="table_title3">－公安负面信息详情－</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="15%">序号</th>
        <th>案件来源</th>
        <th>案件类别</th>
        <th>案件距今时间</th>
      </tr>
      <!--循环插入数据-->
      <?php if(empty($cp)): ?><tr>
          <td colspan="4">查无数据</td>
        </tr>
        <?php else: ?>
        <?php if(is_array($cp)): $i = 0; $__LIST__ = $cp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($i); ?></td>
            <td style="color:red;"><?php echo ($vo["caseSource"]); ?></td>
            <td><?php echo ($vo["caseType"]); ?></td>
            <td><?php echo ($vo["caseTime"]); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
      <!--/循环插入数据结束-->
    </table>
    <div class="explain">说明：公安数据覆盖范围为全国。</div>
    <br />

    <!--法院负面信息详情-个人-->
    <div class="table_title2">－法院负面信息详情-个人－</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="8">个人法院信息汇总</th>
      </tr>
      <tr>
        <th width="15%">执行公告</th>
        <td style="font-weight:bold;color:<?php if($cd['count_type_list']['zxgg'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($cd["count_type_list"]["zxgg"]); ?></td>
        <th width="15%">失信公告</th>
        <td style="font-weight:bold;color:<?php if($cd['count_type_list']['shixin'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($cd["count_type_list"]["shixin"]); ?></td>
        <th width="15%">曝光台</th>
        <td style="font-weight:bold;color:<?php if($cd['count_type_list']['bgt'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($cd["count_type_list"]["bgt"]); ?></td>
        <th width="15%">法院公告</th>
        <td style="font-weight:bold;color:<?php if($cd['count_type_list']['fygg'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($cd["count_type_list"]["fygg"]); ?></td>
      </tr>
      <!--循环插入数据-->
      <tr>
        <th>开庭公告</th>
        <td style="font-weight:bold;color:<?php if($cd['count_type_list']['ktgg'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($cd["count_type_list"]["ktgg"]); ?></td>
        <th>案件流程</th>
        <td style="font-weight:bold;color:<?php if($cd['count_type_list']['ajlc'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($cd["count_type_list"]["ajlc"]); ?></td>
        <th>裁判文书</th>
        <td style="font-weight:bold;color:<?php if($cd['count_type_list']['cpws'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($cd["count_type_list"]["cpws"]); ?></td>
        <th>网贷黑名单</th>
        <td style="font-weight:bold;color:<?php if($cd['count_type_list']['wdhmd'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($cd["count_type_list"]["wdhmd"]); ?></td>
      </tr>
      <!--/循环插入数据结束-->
    </table>
    <br />

    <!--执行公告-->
    <?php if(!empty($cd["zxgg"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="3" class="am-text-middle">执行公告</th>
        </tr>
        <!--循环插入数据-->
        <?php if(is_array($cd['zxgg'])): $i = 0; $__LIST__ = $cd['zxgg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>立案时间</th>
            <th>执行法院</th>
            <th>执行申请人</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["proposer"] != '' ): echo ($vo["proposer"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>执行案号</th>
            <th>案件状态</th>
            <th>执行标的</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseState"] != '' ): echo ($vo["caseState"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["execMoney"] != '' ): echo ($vo["execMoney"]); ?>元<?php else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案件概要</th>
            <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>


    <!--失信公告-->
    <?php if(!empty($cd["shixin"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="2" class="am-text-middle">失信公告</th>
        </tr>
        <!--循环插入数据-->

        <?php if(is_array($cd['shixin'])): $i = 0; $__LIST__ = $cd['shixin'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>立案时间</th>
            <th>被执行人履行情况</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["lxqk"] != '' ): echo ($vo["lxqk"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>执行案号</th>
            <th>执行法院</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>内容概要</th>
            <td style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--法院公告-->
    <?php if(!empty($cd["fygg"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="3" class="am-text-middle">法院公告</th>
        </tr>
        <!--循环插入数据-->

        <?php if(is_array($cd['fygg'])): $i = 0; $__LIST__ = $cd['fygg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>发布时间</th>
            <th>法院名称</th>
            <th>公告类型</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["ggType"] != '' ): echo ($vo["ggType"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案件概要</th>
            <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--裁判文书-->
    <?php if(!empty($cd["cpws"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="2" class="am-text-middle">裁判文书</th>
        </tr>
        <!--循环插入数据-->
        <?php if(is_array($cd['cpws'])): $i = 0; $__LIST__ = $cd['cpws'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="6" class="am-text-middle"><?php echo ($i); ?></th>
            <th>审结时间</th>
            <th>法院名称</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案号</th>
            <th>案由</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>判决结果</th>
            <td><?php if($vo["judgeResult"] != '' ): echo ($vo["judgeResult"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>内容概要</th>
            <td style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--曝光台信息-->
    <?php if(!empty($cd["bgt"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="3" class="am-text-middle">曝光台信息</th>
        </tr>
        <!--循环插入数据-->
        <?php if(is_array($cd['bgt'])): $i = 0; $__LIST__ = $cd['bgt'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>立案时间</th>
            <th>法院名称</th>
            <th>案由</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; echo ($vo["sortTimeString"]); ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案号</th>
            <th>依据</th>
            <th>标的金额</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["yiju"] != '' ): echo ($vo["yiju"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["execMoney"] != '' ): echo ($vo["execMoney"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>内容</th>
            <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--开庭公告-->
    <?php if(!empty($cd["ktgg"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="3" class="am-text-middle">开庭公告</th>
        </tr>
        <!--循环插入数据-->
        <?php if(is_array($cd['ktgg'])): $i = 0; $__LIST__ = $cd['ktgg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>开庭时间</th>
            <th>原告</th>
            <th>法院名称</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["plaintiff"] != '' ): echo ($vo["plaintiff"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案号</th>
            <th>案由</th>
            <th>标题</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["title"] != '' ): echo ($vo["title"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>内容概要</th>
            <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--案件流程-->
    <?php if(!empty($cd["ajlc"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="3" class="am-text-middle">案件流程</th>
        </tr>
        <!--循环插入数据-->
        <?php if(is_array($cd['ajlc'])): $i = 0; $__LIST__ = $cd['ajlc'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="7" class="am-text-middle"><?php echo ($i); ?></th>
            <th>立案时间</th>
            <th>案件类型</th>
            <th>判决日期</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseType"] != '' ): echo ($vo["caseType"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["sentencingDate"] != '' ): echo ($vo["sentencingDate"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案号</th>
            <th>案件状态</th>
            <th>法院名称</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseStatus"] != '' ): echo ($vo["caseStatus"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>审理状态</th>
            <th>案由</th>
            <th>诉讼标的</th>
          </tr>
          <tr>
            <td><?php if($vo["ajlcStatus"] != '' ): echo ($vo["ajlcStatus"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["actionObject"] != '' ): echo ($vo["actionObject"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>内容概要</th>
            <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--网贷黑名单-->
    <?php if(!empty($cd["wdhmd"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="3" class="am-text-middle">网贷黑名单</th>
        </tr>
        <!--循环插入数据-->
        <?php if(is_array($cd['wdhmd'])): $i = 0; $__LIST__ = $cd['wdhmd'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>贷款时间</th>
            <th>执行法院</th>
            <th>来源单位名称</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["execCourt"] != '' ): echo ($vo["execCourt"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["sourceName"] != '' ): echo ($vo["sourceName"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>未还/罚息</th>
            <th>本金/本息</th>
            <th>已还金额</th>
          </tr>
          <tr>
            <td><?php if($vo["whfx"] != '' ): echo ($vo["whfx"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["bjbx"] != '' ): echo ($vo["bjbx"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["yhje"] != '' ): echo ($vo["yhje"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>内容概要</th>
            <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <div class="explain">说明：法院数据覆盖范围为全国。</div>
      <br /><?php endif; ?>

    <div class="page"></div>







    <div class="table_title1">企业信息</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="16%">企业名称</th>
        <th width="16%">组织机构代码</th>
        <th width="15%">法定代表人姓名</th>
        <th width="16%">企业注册号</th>
        <th width="37%" colspan="2">注册资本</th>
      </tr>
      <tr>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["Name"]); ?>&nbsp;</td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["CreditCode"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["OperName"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["No"]); ?></td>
        <td colspan="2"><?php echo ($ep["bizlicinfo"]["product"]["Result"]["RegistCapi"]); ?></td>
      </tr>
      <tr>
        <th>开业日期</th>
        <th>经营期限至</th>
        <th>经营状态</th>
        <th>企业（机构）类型</th>
        <th width="15%">职工人数</th>
        <th width="22%">登记机关</th>
      </tr>
      <tr>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["TermStart"]); ?>&nbsp;</td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["TeamEnd"]); ?></td>
        <td><?php echo ($ep["bizannualreport"]["product"]["Result"]["0"]["BasicInfoData"]["Status"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["EconKind"]); ?></td>
        <td><?php echo ($ep["bizannualreport"]["product"]["Result"]["0"]["BasicInfoData"]["EmployeeCount"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["BelongOrg"]); ?></td>
      </tr>
      <tr>
        <th>最后年检年度</th>
        <th>国民经济行业代码（门类）</th>
        <th>国民经济行业代码（小类）</th>
        <th>注册地址</th>
        <th colspan="2">业务范围</th>
      </tr>
      <tr>
        <td><?php echo ($ep["bizannualreport"]["product"]["Result"]["0"]["Year"]); ?>&nbsp;</td>
        <td><?php echo ($ep["bizdetail"]["product"]["Result"]["Industry"]["Industry"]); ?></td>
        <td><?php echo ($ep["bizdetail"]["product"]["Result"]["Industry"]["SubIndustry"]); ?></td>
        <td><?php echo ($ep["bizlicinfo"]["product"]["Result"]["Address"]); ?></td>
        <td colspan="2"><?php echo ($ep["bizlicinfo"]["product"]["Result"]["Scope"]); ?></td>
      </tr>
    </table>

    <br />

    <!--企业异常信息 -->
    <div class="table_title2">企业异常信息</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="5%">序号</th>
        <th width="17%">列入经营异常名录原因</th>
        <th width="12%">列入日期</th>
        <th width="24%">移出经营异常名录原因</th>
        <th width="12%">移出日期</th>
        <th width="15%">作出决定机关</th>
        <th width="15%">移除决定机关</th>
      </tr>
      <?php if(empty($ep['bizopexception']['product']['Result'])): ?><tr>
          <td colspan="7">查无数据</td>
        </tr>
        <?php else: ?>
        <?php if(is_array($ep['bizopexception']['product']['Result'])): $k = 0; $__LIST__ = $ep['bizopexception']['product']['Result'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
            <td><?php echo ($k); ?></td>
            <td><?php echo ($vo["AddReason"]); ?></td>
            <td><?php echo ($vo["AddDate"]); ?></td>
            <td><?php echo ($vo["RomoveReason"]); ?></td>
            <td><?php echo ($vo["RemoveDate"]); ?></td>
            <td><?php echo ($vo["DecisionOffice"]); ?></td>
            <td><?php echo ($vo["RemoveDecisionOffice"]); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>

    </table>

    <br />



    <!--法院负面信息详情-企业-->
    <div class="table_title2">－法院负面信息详情-企业－</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="8">个人法院信息汇总</th>
      </tr>
      <tr>
        <th width="15%">执行公告</th>
        <td style="font-weight:bold;color:<?php if($qy_bcd['count_type_list']['zxgg'] == 0): ?>green;">0<?php else: ?>red;"><?php echo ($qy_bcd["count_type_list"]["zxgg"]); endif; ?></td>
        <th width="15%">失信公告</th>
        <td style="font-weight:bold;color:<?php if($qy_bcd['count_type_list']['shixin'] == 0): ?>green;">0<?php else: ?>red;"><?php echo ($qy_bcd["count_type_list"]["shixin"]); endif; ?></td>
        <th width="15%">曝光台</th>
        <td style="font-weight:bold;color:<?php if($qy_bcd['count_type_list']['bgt'] == 0): ?>green;">0<?php else: ?>red;"><?php echo ($qy_bcd["count_type_list"]["bgt"]); endif; ?></td>
        <th width="15%">法院公告</th>
        <td style="font-weight:bold;color:<?php if($qy_bcd['count_type_list']['fygg'] == 0): ?>green;">0<?php else: ?>red;"><?php echo ($qy_bcd["count_type_list"]["fygg"]); endif; ?></td>
      </tr>
      <!--循环插入数据-->
      <tr>
        <th>开庭公告</th>
        <td style="font-weight:bold;color:<?php if($qy_bcd['count_type_list']['ktgg'] == 0): ?>green;">0<?php else: ?>red;"><?php echo ($qy_bcd["count_type_list"]["ktgg"]); endif; ?></td>
        <th>案件流程</th>
        <td style="font-weight:bold;color:<?php if($qy_bcd['count_type_list']['ajlc'] == 0): ?>green;">0<?php else: ?>red;"><?php echo ($qy_bcd["count_type_list"]["ajlc"]); endif; ?></td>
        <th>裁判文书</th>
        <td style="font-weight:bold;color:<?php if($qy_bcd['count_type_list']['cpws'] == 0): ?>green;">0<?php else: ?>red;"><?php echo ($qy_bcd["count_type_list"]["cpws"]); endif; ?></td>
        <th colspan="2"></th>
      </tr>
      <!--/循环插入数据结束-->
    </table>
    <br />

    <!--执行公告-->
    <?php if(!empty($qy_bcd["zxgg"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="3" class="am-text-middle">执行公告</th>
        </tr>
        <!--循环插入数据-->
        <?php if(is_array($qy_bcd['zxgg'])): $i = 0; $__LIST__ = $qy_bcd['zxgg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>立案时间</th>
            <th>执行法院</th>
            <th>执行申请人</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["proposer"] != '' ): echo ($vo["proposer"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>执行案号</th>
            <th>案件状态</th>
            <th>执行标的</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseState"] != '' ): echo ($vo["caseState"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["execMoney"] != '' ): echo ($vo["execMoney"]); ?>元<?php else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案件概要</th>
            <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--失信公告-->
    <?php if(!empty($qy_bcd["shixin"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="2" class="am-text-middle">失信公告</th>
        </tr>
        <!--循环插入数据-->

        <?php if(is_array($qy_bcd['shixin'])): $i = 0; $__LIST__ = $qy_bcd['shixin'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>立案时间</th>
            <th>被执行人履行情况</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["lxqk"] != '' ): echo ($vo["lxqk"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>执行案号</th>
            <th>执行法院</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>内容概要</th>
            <td style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--法院公告-->
    <?php if(!empty($qy_bcd["fygg"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="3" class="am-text-middle">法院公告</th>
        </tr>
        <!--循环插入数据-->

        <?php if(is_array($qy_bcd['fygg'])): $i = 0; $__LIST__ = $qy_bcd['fygg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>发布时间</th>
            <th>法院名称</th>
            <th>公告类型</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["ggType"] != '' ): echo ($vo["ggType"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案件概要</th>
            <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--裁判文书-->
    <?php if(!empty($qy_bcd["cpws"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="2" class="am-text-middle">裁判文书</th>
        </tr>
        <!--循环插入数据-->
        <?php if(is_array($qy_bcd['cpws'])): $i = 0; $__LIST__ = $qy_bcd['cpws'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>审结时间</th>
            <th>法院名称</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案号</th>
            <th>案由</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>判决结果</th>
            <td><?php if($vo["judgeResult"] != '' ): echo ($vo["judgeResult"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>内容概要</th>
            <td style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--曝光台信息-->
    <?php if(!empty($qy_bcd["bgt"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="3" class="am-text-middle">曝光台信息</th>
        </tr>
        <!--循环插入数据-->
        <?php if(is_array($qy_bcd['bgt'])): $i = 0; $__LIST__ = $qy_bcd['bgt'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>立案时间</th>
            <th>法院名称</th>
            <th>案由</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; echo ($vo["sortTimeString"]); ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案号</th>
            <th>依据</th>
            <th>标的金额</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["yiju"] != '' ): echo ($vo["yiju"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["execMoney"] != '' ): echo ($vo["execMoney"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>内容</th>
            <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--开庭公告-->
    <?php if(!empty($qy_bcd["ktgg"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="3" class="am-text-middle">开庭公告</th>
        </tr>
        <!--循环插入数据-->
        <?php if(is_array($qy_bcd['ktgg'])): $i = 0; $__LIST__ = $qy_bcd['ktgg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
            <th>开庭时间</th>
            <th>原告</th>
            <th>法院名称</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["plaintiff"] != '' ): echo ($vo["plaintiff"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案号</th>
            <th>案由</th>
            <th>标题</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["title"] != '' ): echo ($vo["title"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>内容概要</th>
            <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <!--案件流程-->
    <?php if(!empty($qy_bcd["ajlc"])): ?><table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
        <tr>
          <th width="5%">序号</th>
          <th colspan="3" class="am-text-middle">案件流程</th>
        </tr>
        <!--循环插入数据-->
        <?php if(is_array($qy_bcd['ajlc'])): $i = 0; $__LIST__ = $qy_bcd['ajlc'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <th rowspan="7" class="am-text-middle"><?php echo ($i); ?></th>
            <th>立案时间</th>
            <th>案件类型</th>
            <th>判决日期</th>
          </tr>
          <tr>
            <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseType"] != '' ): echo ($vo["caseType"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["sentencingDate"] != '' ): echo ($vo["sentencingDate"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>案号</th>
            <th>案件状态</th>
            <th>法院名称</th>
          </tr>
          <tr>
            <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseStatus"] != '' ): echo ($vo["caseStatus"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>审理状态</th>
            <th>案由</th>
            <th>诉讼标的</th>
          </tr>
          <tr>
            <td><?php if($vo["ajlcStatus"] != '' ): echo ($vo["ajlcStatus"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
            <td><?php if($vo["actionObject"] != '' ): echo ($vo["actionObject"]); else: ?>/<?php endif; ?></td>
          </tr>
          <tr>
            <th>内容概要</th>
            <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <!--/循环插入数据结束-->
      </table>
      <br /><?php endif; ?>

    <div class="page"></div>



    <!--金融信息   特殊名单-->
    <div class="table_title1">金融信息</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="5">－特殊名单－</th>
      </tr>

      <tr>
        <td colspan="4">查询成功，无特殊名单相关信息</td>
      </tr>
      <!--<tr>-->
      <!--<th width="20%">平台类型</th>-->
      <!--<th>信贷平台代码</th>-->
      <!--<th>贷款申请时间</th>-->
      <!--<th>申请金额区间</th>-->
      <!--<th>申请结果</th>-->
      <!--</tr>-->
      <!--<tr>-->
      <!--<th>银行</th>-->
      <!--<td>/</td>-->
      <!--<td>/</td>-->
      <!--<td>/</td>-->
      <!--<td>/</td>-->
      <!--</tr>-->
    </table>
    <div class="explain">说明：拒绝，指判定不良被拒绝；高风险，指曾无法联系；高危行为，指关联手机号>3或手机号关联身份证>3。</div>

    <!--本人多次申请-->
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="16" class="am-text-middle">本人多次申请</th>
      </tr>
      <!--循环插入数据-->
      <tr>
        <th>类型</th>
        <th>近7天</th>
        <th>近15天</th>
        <th>近1月</th>
        <th>近2个月</th>
        <th>近3个月</th>
        <th>近4个月</th>
        <th>近5个月</th>
        <th>近6个月</th>
        <th>近7个月</th>
        <th>近8个月</th>
        <th>近9个月</th>
        <th>近10个月</th>
        <th>近11个月</th>
        <th>近12个月</th>
        <th>合计</th>
      </tr>
      <tr>
        <th>银行</th>
        <?php if($bank['count'] != 0): ?><td style="font-weight:bold;color:<?php if($bank['d7'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["d7"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['d15'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["d15"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m1'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m1"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m2'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m2"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m3'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m3"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m4'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m4"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m5'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m5"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m6'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m6"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m7'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m7"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m8'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m8"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m9'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m9"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m10'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m10"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m11'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m11"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['m12'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($bank["m12"]); ?></td>
        <td style="font-weight:bold;color:<?php if($bank['count'] > 0): ?>red<?php else: ?>green<?php endif; ?>;"><?php echo ($bank["count"]); ?></td>
        <?php else: ?>
        <th colspan="15">查询成功，无银行申请信息</th><?php endif; ?>

      </tr>
      <tr>
        <th>非银行</th>
        <?php if($nbank['count'] != 0): ?><td style="font-weight:bold;color:<?php if($nbank['d7'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["d7"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['d15'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["d15"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m1'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m1"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m2'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m2"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m3'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m3"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m4'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m4"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m5'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m5"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m6'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m6"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m7'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m7"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m8'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m8"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m9'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m9"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m10'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m10"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m11'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m11"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['m12'] == 0): ?>green<?php else: ?>red<?php endif; ?>;"><?php echo ($nbank["m12"]); ?></td>
        <td style="font-weight:bold;color:<?php if($nbank['count'] > 0): ?>red<?php else: ?>green<?php endif; ?>;"><?php echo ($nbank["count"]); ?></td>
        <?php else: ?>
        <th colspan="15">查询成功，无非银行申请信息</th><?php endif; ?>
      </tr>
      <!--/循环插入数据结束-->
    </table>
    <div class="explain">说明：多次申请数据覆盖金融机构。机构类型包括：银行、P2P、小贷、消费类分期、现金类分期、信用卡代偿和非银其他。身份证号命中次数/手机号命中次数 。</div>




    <!--多平台负债信息 -->
    <div class="table_title2">多平台负债信息</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="20%">总笔数</th>
        <td width="35%" style="font-weight:bold;color:<?php if($totaldebt['id']['total']['allnum'] == ''): ?>green;">暂无数据<?php else: ?>red;"><?php echo ($totaldebt["id"]["total"]["allnum"]); endif; ?></td>
        <th width="15%">最早借款日</th>
        <td width="30%" style="font-weight:bold;color:<?php if($totaldebt['id']['fst']['loandate'] == ''): ?>green;">暂无数据<?php else: ?>red;"><?php echo ($totaldebt["id"]["fst"]["loandate"]); endif; ?></td>
      </tr>
      <tr>
        <th>总金额</th>
        <td style="font-weight:bold;color:<?php if($totaldebt['id']['total']['amount'] == ''): ?>green;">暂无数据<?php else: ?>red;"><?php echo ($totaldebt["id"]["total"]["amount"]); endif; ?></td>
        <th>最近还款日</th>
        <td style="font-weight:bold;color:<?php if($totaldebt['id']['lst']['repaydate'] == ''): ?>green;">暂无数据<?php else: ?>red;"><?php echo ($totaldebt["id"]["lst"]["repaydate"]); endif; ?></td>
      </tr>
    </table>
    <br />
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="7%">序号</th>
        <th width="15%">贷款种类</th>
        <th width="15%">机构类型</th>
        <th width="18%">借款额度</th>
        <th width="18%">借款日期</th>
        <th width="27%">还款日期</th>
      </tr>
      <?php if(empty($totaldebt_list)): ?><tr>
          <td colspan="7">查无数据</td>
        </tr>
        <?php else: ?>
        <?php if(is_array($totaldebt_list)): $k = 0; $__LIST__ = $totaldebt_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
            <td><?php echo ($k); ?></td>
            <td><?php echo ($vo["type"]); ?></td>
            <td><?php echo ($vo["orgtype"]); ?></td>
            <td><?php echo ($vo["amount"]); ?></td>
            <td><?php echo ($vo["loandate"]); ?></td>
            <td><?php echo ($vo["repaydate"]); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>

    </table>

    <br />





    <!--综合信息 手机信息查询-->
    <div class="table_title2">综合信息</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="4" class="am-text-middle">－手机信息查询－</th>
      </tr>
      <!--循环插入数据-->
      <tr>
        <th width="25%">手机在网状态</th>
        <th width="25%">手机在网时长</th>
        <!--<th width="50%">手机消费档次</th>-->
      </tr>
      <tr>
        <th style="font-weight:bold;color:<?php if($tel['ts']['result'] == '1' and $tel['ts']['value'] != '无结果'): ?>green<?php else: ?>red<?php endif; ?>;"><?php if($tel['ts']['result'] == '1'): echo ($tel["ts"]["value"]); else: ?>查询失败<?php endif; ?></th>
        <td style="font-weight:bold;color:<?php if($tel['tp']['result'] == '1' and $tel['tp']['value'] != '无结果' and $tel['tp']['value'] != '0-6个月'): ?>green<?php else: ?>red<?php endif; ?>;"><?php if($tel['tp']['result'] == '1'): echo ($tel["tp"]["value"]); else: ?>查询失败<?php endif; ?></td>
        <!--<td>/</td>-->
      </tr>
      <!--/循环插入数据结束-->
    </table>
    <div class="explain">说明：“手机在网状态”、“手机在网时长”数据覆盖全国范围，移动、联通、电信三家运营商数据。“手机消费档次”覆盖全国范围移动、电信运营商数据。</div>
    <br />
    <br />







    <div class="check_data">
      <button i="<?php echo ($i_id); ?>" style="font-weight:bold;" class="am-btn am-btn-primary am-btn-lg am-round am-vertical-align-middle" id="btn_check_data">
        <i class="am-icon-print"></i>
        重 新 获 取
      </button>
    </div>




<!--
    &lt;!&ndash;综合信息 手机信息查询&ndash;&gt;
    <div style="display:none;">
    &lt;!&ndash;身份风险汇总&ndash;&gt;
    <div class="table_title">身份风险汇总</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="3">身份风险汇总</th>
      </tr>
      <tr>
        <th width="33%">风险类别</th>
        <th width="33%">规则</th>
        <th>风险等级</th>
      </tr>
      <tr>
        <td>基础信息核验</td>
        <td>被查询人三要素及人脸校验</td>
        <td></td>
      </tr>
      <tr>
        <td>公安负面信息</td>
        <td>被查询人命中公安负面信息</td>
        <td></td>
      </tr>
      <tr>
        <td>法院负面信息</td>
        <td>被查询人命中法院涉诉信息</td>
        <td></td>
      </tr>
      <tr>
        <td rowspan="2">金融信贷信息</td>
        <td>被查询人命中信贷负面信息</td>
        <td></td>
      </tr>
      <tr>
        <td>被查询人存在多次申请信息</td>
        <td></td>
      </tr>
      <tr>
        <td>其他综合信息</td>
        <td>被查询人手机号及芝麻信息</td>
        <td></td>
      </tr>
    </table>
    <div class="explain">说明：汇总信息由相应规则组成。</div>

    &lt;!&ndash;基础信息核验&ndash;&gt;
    <div class="table_title">-基础信息核验-</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="2">身份信息核验</th>
      </tr>
      <tr>
        <th width="33%">校验项</th>
        <th>比对结果</th>
      </tr>
      <tr>
        <td>姓名-身份证校验</td>
        <td></td>
      </tr>
      <tr>
        <td>身份证-人脸校验</td>
        <td></td>
      </tr>
    </table>
    <div class="explain">说明：身份核验通过人脸算法比对权威机构数据，校验得出，包含全国数据。</div>


    &lt;!&ndash;手机三要素校验&ndash;&gt;
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="2">手机三要素校验</th>
      </tr>
      <tr>
        <th width="33%">校验项</th>
        <th>比对结果</th>
      </tr>
      <tr>
        <td>姓名+身份证+手机</td>
        <td></td>
      </tr>
    </table>

    &lt;!&ndash;不良信息概要&ndash;&gt;
    <div class="table_title">-不良信息概要-</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="15%">序号</th>
        <th>案件来源</th>
        <th>案件类别</th>
        <th>案发日期</th>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;
      <?php if(is_array($cp)): $i = 0; $__LIST__ = $cp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <td><?php echo ($i); ?></td>
          <td><?php echo ($vo["caseSource"]); ?></td>
          <td><?php echo ($vo["caseType"]); ?></td>
          <td><?php echo ($vo["caseTime"]); ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>


    &lt;!&ndash;法院负面信息概要&ndash;&gt;
    <div class="table_title">-法院负面信息概要-</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="8">身份信息核验</th>
      </tr>
      <tr>
        <th width="15%">执行公告</th>
        <td></td>
        <th width="15%">失信公告</th>
        <td></td>
        <th width="15%">曝光台</th>
        <td></td>
        <th width="15%">法院公告</th>
        <td></td>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;
      <tr>
        <th>开庭公告</th>
        <td></td>
        <th>案件流程</th>
        <td></td>
        <th>裁判文书</th>
        <td></td>
        <th>网贷黑名单</th>
        <td></td>
      </tr>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>
    <br />

    &lt;!&ndash;执行公告&ndash;&gt;
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="5%">序号</th>
        <th colspan="3" class="am-text-middle">执行公告</th>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;
      <?php if(is_array($cd['zxgg'])): $i = 0; $__LIST__ = $cd['zxgg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <th rowspan="5" class="am-text-middle"><?php echo ($i); ?></th>
          <th>立案时间</th>
          <th>执行法院</th>
          <th>执行申请人</th>
        </tr>
        <tr>
          <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["proposer"] != '' ): echo ($vo["proposer"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>执行案号</th>
          <th>案件状态</th>
          <th>执行标的</th>
        </tr>
        <tr>
          <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["caseState"] != '' ): echo ($vo["caseState"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["execMoney"] != '' ): echo ($vo["execMoney"]); ?>元<?php else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>案件概要</th>
          <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>
    <br />

    &lt;!&ndash;失信公告&ndash;&gt;
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="5%">序号</th>
        <th colspan="2" class="am-text-middle">失信公告</th>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;

      <?php if(is_array($cd['shixin'])): $i = 0; $__LIST__ = $cd['shixin'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <th rowspan="5" class="am-text-middle">1</th>
          <th>立案时间</th>
          <th>被执行人履行情况</th>
        </tr>
        <tr>
          <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["lxqk"] != '' ): echo ($vo["lxqk"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>执行案号</th>
          <th>执行法院</th>
        </tr>
        <tr>
          <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>内容概要</th>
          <td style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>
    <br />

    &lt;!&ndash;法院公告&ndash;&gt;
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="5%">序号</th>
        <th colspan="3" class="am-text-middle">法院公告</th>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;

      <?php if(is_array($cd['fygg'])): $i = 0; $__LIST__ = $cd['fygg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <th rowspan="5" class="am-text-middle">1</th>
          <th>发布时间</th>
          <th>法院名称</th>
          <th>公告类型</th>
        </tr>
        <tr>
          <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["ggType"] != '' ): echo ($vo["ggType"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>案件概要</th>
          <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>
    <br />

    &lt;!&ndash;裁判文书&ndash;&gt;
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="5%">序号</th>
        <th colspan="2" class="am-text-middle">裁判文书</th>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;
      <?php if(is_array($cd['cpws'])): $i = 0; $__LIST__ = $cd['cpws'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <th rowspan="5" class="am-text-middle">1</th>
          <th>审结时间</th>
          <th>法院名称</th>
        </tr>
        <tr>
          <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>案号</th>
          <th>案由</th>
        </tr>
        <tr>
          <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>内容概要</th>
          <td style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>
    <br />

    &lt;!&ndash;曝光台信息&ndash;&gt;
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="5%">序号</th>
        <th colspan="3" class="am-text-middle">曝光台信息</th>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;
      <?php if(is_array($cd['bgt'])): $i = 0; $__LIST__ = $cd['bgt'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <th rowspan="5" class="am-text-middle">1</th>
          <th>立案时间</th>
          <th>法院名称</th>
          <th>案由</th>
        </tr>
        <tr>
          <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; echo ($vo["sortTimeString"]); ?></td>
          <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>案号</th>
          <th>依据</th>
          <th>标的金额</th>
        </tr>
        <tr>
          <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["yiju"] != '' ): echo ($vo["yiju"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["execMoney"] != '' ): echo ($vo["execMoney"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>内容</th>
          <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>
    <br />

    &lt;!&ndash;开庭公告&ndash;&gt;
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="5%">序号</th>
        <th colspan="3" class="am-text-middle">开庭公告</th>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;
      <?php if(is_array($cd['ktgg'])): $i = 0; $__LIST__ = $cd['ktgg'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <th rowspan="5" class="am-text-middle">1</th>
          <th>开庭时间</th>
          <th>原告</th>
          <th>法院名称</th>
        </tr>
        <tr>
          <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["plaintiff"] != '' ): echo ($vo["plaintiff"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>案号</th>
          <th>案由</th>
          <th>标题</th>
        </tr>
        <tr>
          <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["title"] != '' ): echo ($vo["title"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>内容概要</th>
          <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>
    <br />

    &lt;!&ndash;案件流程&ndash;&gt;
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="5%">序号</th>
        <th colspan="3" class="am-text-middle">案件流程</th>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;
      <?php if(is_array($cd['ajlc'])): $i = 0; $__LIST__ = $cd['ajlc'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <th rowspan="7" class="am-text-middle">1</th>
          <th>立案时间</th>
          <th>案件类型</th>
          <th>判决日期</th>
        </tr>
        <tr>
          <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["caseType"] != '' ): echo ($vo["caseType"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["sentencingDate"] != '' ): echo ($vo["sentencingDate"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>案号</th>
          <th>案件状态</th>
          <th>法院名称</th>
        </tr>
        <tr>
          <td><?php if($vo["caseNo"] != '' ): echo ($vo["caseNo"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["caseStatus"] != '' ): echo ($vo["caseStatus"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["court"] != '' ): echo ($vo["court"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>审理状态</th>
          <th>案由</th>
          <th>诉讼标的</th>
        </tr>
        <tr>
          <td><?php if($vo["ajlcStatus"] != '' ): echo ($vo["ajlcStatus"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["caseCause"] != '' ): echo ($vo["caseCause"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["actionObject"] != '' ): echo ($vo["actionObject"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>内容概要</th>
          <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>
    <br />

    &lt;!&ndash;网贷黑名单&ndash;&gt;
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th width="5%">序号</th>
        <th colspan="3" class="am-text-middle">网贷黑名单</th>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;
      <?php if(is_array($cd['wdhmd'])): $i = 0; $__LIST__ = $cd['wdhmd'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
          <th rowspan="5" class="am-text-middle">1</th>
          <th>贷款时间</th>
          <th>执行法院</th>
          <th>来源单位名称</th>
        </tr>
        <tr>
          <td><?php if($vo["sortTimeString"] != '' ): echo ($vo["sortTimeString"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["execCourt"] != '' ): echo ($vo["execCourt"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["sourceName"] != '' ): echo ($vo["sourceName"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>未还/罚息</th>
          <th>本金/本息</th>
          <th>已还金额</th>
        </tr>
        <tr>
          <td><?php if($vo["whfx"] != '' ): echo ($vo["whfx"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["bjbx"] != '' ): echo ($vo["bjbx"]); else: ?>/<?php endif; ?></td>
          <td><?php if($vo["yhje"] != '' ): echo ($vo["yhje"]); else: ?>/<?php endif; ?></td>
        </tr>
        <tr>
          <th>内容概要</th>
          <td colspan="2" style="text-overflow:ellipsis;"><?php if($vo["body"] != '' ): echo ($vo["body"]); else: ?>/<?php endif; ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>
    <div class="explain">说明：法院数据覆盖范围为全国。</div>
    <br />


    &lt;!&ndash;金融/信贷信息&ndash;&gt;
    <div class="table_title">-金融/信贷信息-</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="5">贷款申请信息</th>
      </tr>
      <tr>
        <th width="20%">平台类型</th>
        <th>信贷平台代码</th>
        <th>贷款申请时间</th>
        <th>申请金额区间</th>
        <th>申请结果</th>
      </tr>
      <tr>
        <th>银行</th>
        <td>/</td>
        <td>/</td>
        <td>/</td>
        <td>/</td>
      </tr>
      <tr>
        <th>非银行</th>
        <td>/</td>
        <td>/</td>
        <td>/</td>
        <td>/</td>
      </tr>
    </table>
    <div class="explain">说明：贷款申请信息模块查询时间段为近 24 个月。</div>

    &lt;!&ndash;贷款放款信息&ndash;&gt;
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="4" class="am-text-middle">贷款放款信息</th>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;
      <tr>
        <th>平台类型</th>
        <th>放款平台代码</th>
        <th>放款时间</th>
        <th>放款金额</th>
      </tr>
      <?php if($totaldebt_bank == '' && $totaldebt_nbank == ''): ?><tr>
          <td colspan="4">查无数据</td>
        </tr>
        </else>

        <?php if(is_array($totaldebt_bank)): $i = 0; $__LIST__ = $totaldebt_bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <?php if($i == 1 ): ?><th  rowspan="<?php echo ($td_bank['bank']); ?>">银行</th><?php endif; ?>
            <td></td>
            <td><?php echo ($vo["amount"]); ?></td>
            <td><?php echo ($vo["loandate"]); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        <?php if(is_array($totaldebt_nbank)): $i = 0; $__LIST__ = $totaldebt_nbank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <?php if($i == 1 ): ?><th  rowspan="<?php echo ($td_bank['nbank']); ?>">非银行</th><?php endif; ?>
            <td></td>
            <td><?php echo ($vo["amount"]); ?></td>
            <td><?php echo ($vo["loandate"]); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>
    <div class="explain">说明：贷款放款信息模块查询时间段为近 24 个月。</div>

    &lt;!&ndash;信贷负面信息&ndash;&gt;
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="4" class="am-text-middle">信贷负面信息</th>
      </tr>
      &lt;!&ndash;循环插入数据&ndash;&gt;
      <tr>
        <th>信贷黑名单</th>
        <th>传统金融机构逾期</th>
        <th>互联网信贷逾期</th>
        <th>催收被呼记录</th>
      </tr>
      <tr>
        <th>/</th>
        <td>/</td>
        <td>/</td>
        <td>/</td>
      </tr>
      &lt;!&ndash;/循环插入数据结束&ndash;&gt;
    </table>
    <div class="explain">说明：金融/信贷信息数据包含银行、P2P、小贷、消费类分期、现金类分期以及非银行其他。</div>

    &lt;!&ndash;手机号信息&ndash;&gt;
    <div class="table_title tt_border">其他综合信息</div>
    <div class="table_title">-手机号信息-</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="5">贷款申请信息</th>
      </tr>
      <tr>
        <th width="25%">手机在网时长</th>
        <th>手机号归属省份</th>
        <th>手机号归属城市</th>
        <th>手机号所属运营商</th>
      </tr>
      <tr>
        <th>/</th>
        <td>/</td>
        <td>/</td>
        <td>/</td>
      </tr>
    </table>
    <div class="explain">说明：“手机号信息”数据覆盖全国范围，移动、联通、电信三家运营商数据。其中手机消费档次联通和电信为上月消费档次区间,移动为最近三个月及最近六个月平均消费区间段，返回值为两个区间值，之间使用竖线分隔。</div>

    &lt;!&ndash;-个人工商信息汇总-&ndash;&gt;
    <div class="table_title">-个人工商信息汇总-</div>
    <table class="am-table am-table-bordered am-table-centered am-text-sm iframe_table">
      <tr>
        <th colspan="3">个人担任法定代表人信息</th>
      </tr>

      &lt;!&ndash;循环数据&ndash;&gt;
      <tr>
        <th rowspan="6" width="5%" class="am-text-middle">1</th>
        <th>公司名称</th>
        <td>/</td>
      </tr>
      <tr>
        <th>注册号码</th>
        <td>/</td>
      </tr>
      <tr>
        <th>公司类型</th>
        <td>/</td>
      </tr>
      <tr>
        <th>注册资本（万元）</th>
        <td>/</td>
      </tr>
      <tr>
        <th>注册币种</th>
        <td>/</td>
      </tr>
      <tr>
        <th>企业状态</th>
        <td>/</td>
      </tr>
      &lt;!&ndash;/循环数据结束&ndash;&gt;
    </table>
    <div class="explain">说明：贷款申请信息模块查询时间段为近 24 个月。</div>


    </div>-->




  </div>
</div>


<div class="load">
  <div class="back"></div>
  <div class="load_img">
    <img src="/Public/Admin/assets/img/loading.gif">
    <div class="load_text"></div>
  </div>
</div>

<!--<div class="sbm">-->
  <!--<button id="next" class="am-btn am-btn-primary am-btn-lg am-round am-vertical-align-middle">-->
    <!--查看下一个-->
    <!--<i class="am-icon-arrow-right"></i>-->
  <!--</button>-->
<!--</div>-->


<script>

  var investigate_url = "<?php echo U('Order2/chack_data');?>";
  var iframe_u = "<?php echo U('Order2/examine');?>";


</script>




</body>
</html>