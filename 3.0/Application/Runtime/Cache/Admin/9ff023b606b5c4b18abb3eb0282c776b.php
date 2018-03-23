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


<!--上传图片时引用文件-->
<link rel="stylesheet" type="text/css" href="/Public/css/diyUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="/Public/css/diyUpload/css/diyUpload.css">
<script type="text/javascript" src="/Public/js/diyUpload/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="/Public/js/diyUpload/js/diyUpload.js"></script>






<style>
  .table-hover tbody tr:hover > td{
    background-color: #fff;
  }
  .table-hover tbody tr:hover > th{
    background-color: #eaeaea;
  }
  .table-hover tbody tr >td:hover{
   background-color: #f5f5f5;
  }
  button.abolish{
      font-size: 15px;
  }
  .table th{
      padding-right: 15px;
  }
  textarea {
    resize: none;
  }
</style>

<form action="<?php echo ($url); ?>" method="post" class="definewidth m20 c_width80">
  <table class="table table-bordered table-hover th_right m10" style="min-width:776px;">
    <tr>
      <th width="12%" class="tableleft">产品名称</th>
      <td width="38%"><input type="text" name="name" value="<?php echo ($product["name"]); ?>" placeholder="例如：紫金系列"/></td>
      <th width="12%" class="tableleft">订单编号</th>
      <td width="38%"><input type="text" name="code" value="<?php echo ($product["code"]); ?>" disabled placeholder="产品代码由系统自动生成"/></td>
    </tr>
    <tr>
      <th class="tableleft">产品特点</th>
      <td ><input type="text" name="trait" value="<?php echo ($product["trait"]); ?>" placeholder="例如：有房就能贷"/></td>
      <th class="tableleft">资金通道</th>
      <td ><input type="text" name="source" value="<?php echo ($product["source"]); ?>" placeholder="平台/渠道全称/合作方全称"/></td>
    </tr>
    <tr>
      <th class="tableleft">抵押成数</th>
      <td ><!--<input type="text" class="input_min_max" name="min_percentage" value="<?php echo ($product["min_percentage"]); ?>"/> 成 -&nbsp;&nbsp;-->最高 <input type="text" class="input_min_max" name="max_percentage" value="<?php echo ($product["max_percentage"]); ?>" style="width: 80px;"/> 成</td>
      <th class="tableleft">房产要求</th>
      <td ><input type="text" name="house_demand" value="<?php echo ($product["house_demand"]); ?>" placeholder="例如：房龄、面积"/></td>
    </tr>
    <tr>
      <th class="tableleft">申请金额</th>
      <td ><input type="text" onkeydown="onlyNum();" class="input_min_max" name="min_money" value="<?php echo ($product["min_money"]); ?>" style="width: 80px;"/>&nbsp;&nbsp;-&nbsp;&nbsp;<input type="text" onkeydown="onlyNum();" class="input_min_max" name="max_money" value="<?php echo ($product["max_money"]); ?>" style="width: 80px;"/> 万元</td>
      <th class="tableleft">签约用户</th>
        <td ><input type="text" class="input_min_max interest" name="admin_showcasing" value="<?php echo ($product["admin_showcasing"]); ?>" style="width: 80px;"/> %<!-- -&nbsp;&nbsp;<input type="text" class="input_min_max" name="max_interest" value="<?php echo ($product["max_interest"]); ?>" style="width: 80px;"/> % --><!--&#12288;&#12288;&#12288;&#12288;&#12288;&#12288;&#12288;&#12288;&#12288;&#12288; <b>非签约用户利息</b> &nbsp;<input type="text" class="input_min_max interest" name="showcasing" value="<?php echo ($product["showcasing"]); ?>" style="width: 80px;"/> %-->

        </td>
    </tr>
    <tr>
        <th class="tableleft">银行类型</th>
        <td >
            <input name="banks" type="radio" value="1" <?php if($product["banks"] == 1 ): ?>checked="checked"<?php endif; ?> />&nbsp;银行类
            &#12288;&#12288;
            <input name="banks" type="radio" value="0" <?php if($product["banks"] == 0 ): ?>checked="checked"<?php endif; ?> />&nbsp;非银类

        </td>
      <th class="tableleft">非签约用户</th>
        <td ><input type="text" class="input_min_max interest" name="showcasing" value="<?php echo ($product["showcasing"]); ?>" style="width: 80px;"/> %
        </td>
    </tr>
      <!--<th class="tableleft">最高金额</th>-->
      <!--<td ><input type="text" name="max_money" value="<?php echo ($product["max_money"]); ?>"/> 万元</td>-->
    <!--<tr>-->
      <!--&lt;!&ndash;<th class="tableleft">最高月数</th>&ndash;&gt;-->
      <!--&lt;!&ndash;<td ></td>&ndash;&gt;-->
    <!--<tr>-->
      <th class="tableleft">贷款期数</th>
      <td >
         <?php if(is_array($month)): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="month[]" value="<?php echo ($vo["id"]); ?>" <?php if(in_array($vo['id'],$product['month'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;<?php if($vo['month'] > 12): echo ($vo['month']/12); ?>年<?php else: echo ($vo["month"]); ?>个月<?php endif; endforeach; endif; else: echo "" ;endif; ?>
        <!--<input type="checkbox" name="month[]" value="6" <?php if(in_array('6',$product['month'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;6个月
        <input type="checkbox" name="month[]" value="9" <?php if(in_array('9',$product['month'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;9个月
        <input type="checkbox" name="month[]" value="12" <?php if(in_array('12',$product['month'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;12个月
        <input type="checkbox" name="month[]" value="24" <?php if(in_array('24',$product['month'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;24个月
        <input type="checkbox" name="month[]" value="36" <?php if(in_array('36',$product['month'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;36个月
        <input type="checkbox" name="month[]" value="48" <?php if(in_array('48',$product['month'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;48个月
        <input type="checkbox" name="month[]" value="60" <?php if(in_array('60',$product['month'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;60个月-->



        <!--<input type="text" class="input_min_max" name="min_month" value="<?php echo ($product["min_month"]); ?>" /> 个月 -&nbsp;&nbsp;<input type="text" class="input_min_max" name="max_month" value="<?php echo ($product["max_month"]); ?>"/> 个月-->
      </td>
      <th class="tableleft">抵押种类</th>
      <td >
        <input type="checkbox" name="impawn_type[]" value="0" <?php if(in_array('0',$product['impawn_type'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;不限
        <input type="checkbox" name="impawn_type[]" value="1" <?php if(in_array('1',$product['impawn_type']) and !in_array('0',$product['impawn_type'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;一抵&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="impawn_type[]" value="2" <?php if(in_array('2',$product['impawn_type']) and !in_array('0',$product['impawn_type'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;二抵&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="impawn_type[]" value="3" <?php if(in_array('3',$product['impawn_type']) and !in_array('0',$product['impawn_type'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;转单&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="impawn_type[]" value="4" <?php if(in_array('4',$product['impawn_type']) and !in_array('0',$product['impawn_type'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;C一抵&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="checkbox" name="impawn_type[]" value="5" <?php if(in_array('5',$product['impawn_type']) and !in_array('0',$product['impawn_type'])): ?>checked="checked" check="1"<?php endif; ?>>&nbsp;C二抵&nbsp;&nbsp;&nbsp;&nbsp;
        <!--<input type="text" name="impawn_type" value="<?php echo ($product["impawn_type"]); ?>" placeholder="一抵、二抵、不限为空"/>-->
      </td>
      <!--<th class="tableleft">产品类型</th>
      <td >

        <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>&nbsp;<input type="checkbox" name="type[]" class="checkbox_city" value="<?php echo ($vo["id"]); ?>" <?php if($vo['state'] == '1'): ?>checked="checked" check="1"<?php endif; ?> st="<?php echo ($vo["name"]); ?>">&nbsp;<?php echo ($vo["name"]); endforeach; endif; else: echo "" ;endif; ?>


        &lt;!&ndash;<input type="text" name="type" value="<?php echo ($product["type"]); ?>" placeholder="例如：抵押/现金"/>&ndash;&gt;
      </td>-->
      <!--<th colspan="2" class="tableleft"></th>-->
      <!--<td ><input type="text" name="type" value="<?php echo ($product["type"]); ?>" placeholder="例如：抵押/现金"/></td>-->
    </tr>
    <!--<tr>-->
      <!--<th class="tableleft">最高抵押成数</th>-->
      <!--<td ><input type="text" name="max_percentage" value="<?php echo ($product["max_percentage"]); ?>"/>成</td>-->
    <!--</tr>-->
    <tr>
      <th class="tableleft tab_middle">城市及区域</th>
      <td colspan="3">
        <!--<input type="text" name="mobile" value="<?php echo ($user["mobile"]); ?>"/>-->
        <table class="table table-bordered table-hover th_center" style="margin-bottom:5px;">
          <tr>
            <th  width="20%">省/市</th>
            <th>城市</th>
          </tr>
          <tr>
            <td>
              <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['higher_up'] == '0'): ?>&nbsp;<input type="checkbox" name="city[]" class="checkbox_city" value="<?php echo ($vo["id"]); ?>" <?php if($vo['state'] == '1'): ?>checked="checked" check="1"<?php endif; ?> st="<?php echo ($vo["name"]); ?>">&nbsp;<?php echo ($vo["name"]); ?>
                  <br><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </td>
            <td id="territory">
              <!--<input type="checkbox" value="">&nbsp;区域-->
              <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i; if($vol['grade'] == '2' and $vol['state'] == 1): ?><span style="font-weight:bold;"><?php echo ($vol["name"]); ?>:</span>
                      <input type="checkbox" name="city[]" class="territory<?php echo ($vol["id"]); ?>" value="<?php echo ($vol["id"]); ?>" <?php if($vol['state'] == '1'): ?>checked="checked" check="1"<?php endif; ?> st="<?php echo ($vol["name"]); ?>"><span>&nbsp;<?php echo ($vol["name"]); ?></span>
                      <br><?php endif; ?>
                <?php if($vol['grade'] == '1' and $vol['state'] == 1): ?><span style="font-weight:bold;"><?php echo ($vol["name"]); ?>:</span>
                    <?php if(is_array($vol['down'])): $i = 0; $__LIST__ = $vol['down'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['higher_up'] != '0'): ?><input type="checkbox" name="territory[]" class="territory<?php echo ($vol["id"]); ?>" value="<?php echo ($vo["id"]); ?>" <?php if($vo['state'] == '1'): ?>checked="checked"<?php endif; ?>><span>&nbsp;<?php echo ($vo["name"]); ?></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <br><?php endif; endforeach; endif; else: echo "" ;endif; ?><!--
              <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i; if($vol['state'] == '1'): ?><span style="font-weight:bold;"><?php echo ($vol["name"]); ?>:</span>
                  <?php if(is_array($vol['down'])): $i = 0; $__LIST__ = $vol['down'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo['higher_up'] != '0'): ?>&nbsp;<input type="checkbox" name="territory[]" class="territory<?php echo ($vo["higher_up"]); ?>" value="<?php echo ($vo["id"]); ?>" <?php if($vo['state'] == '1'): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo ($vo["name"]); endif; endforeach; endif; else: echo "" ;endif; ?>
                  <br><?php endif; endforeach; endif; else: echo "" ;endif; ?>-->

            </td>
          </tr>
        </table>

      </td>
    </tr>
    <tr>
      <th class="tableleft">建筑类型</th>
      <td >
        <?php if(is_array($house)): $i = 0; $__LIST__ = $house;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>&nbsp;<input type="checkbox" name="house[]" value="<?php echo ($vo["id"]); ?>" <?php if($vo['state'] == '1'): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo ($vo["name"]); endforeach; endif; else: echo "" ;endif; ?>
        <!--<input type="text" name="house" value="<?php echo ($house["impawn_type"]); ?>" placeholder="一抵、二抵、不限为空"/>-->
      </td>
      <th class="tableleft">贷款类型</th>
      <td >
        <?php if(is_array($loans_type)): $i = 0; $__LIST__ = $loans_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>&nbsp;<input type="checkbox" name="loans_type[]" value="<?php echo ($vo["id"]); ?>" <?php if($vo['state'] == '1'): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo ($vo["name"]); endforeach; endif; else: echo "" ;endif; ?>
        <!--<input type="text" name="loans_type" value="<?php echo ($product["loans_type"]); ?>" placeholder="一抵、二抵、不限为空"/>-->
      </td>
    </tr>
    <tr>
      <th>放款方式</th>
      <td><input type="text" name="loan_pattern" value="<?php echo ($product["loan_pattern"]); ?>"></td>
      <!--<th>房产要求</th>-->
      <!--<td><input type="text" name="house_request" value=""></td>-->
      <th>还款方式</th>
      <td>
        <!--<input type="checkbox" name="repayment_pattern[]" value="还款方式1">&nbsp;还款方式1-->
        <!--<input type="checkbox" name="repayment_pattern[]" value="还款方式2">&nbsp;还款方式2-->
        <!--<input type="checkbox" name="repayment_pattern[]" value="还款方式3">&nbsp;还款方式3-->
        <!--<input type="checkbox" name="repayment_pattern[]" value="还款方式4">&nbsp;还款方式4-->
        <!--<input type="checkbox" name="repayment_pattern[]" value="还款方式5">&nbsp;还款方式5-->
        <?php if(is_array($r_p)): $i = 0; $__LIST__ = $r_p;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>&nbsp;<input type="checkbox" name="repayment_pattern[]" value="<?php echo ($vo["id"]); ?>" <?php if($vo['state'] == '1'): ?>checked="checked"<?php endif; ?>>&nbsp;<?php echo ($vo["name"]); endforeach; endif; else: echo "" ;endif; ?>


        <!--<input type="text" name="repayment_pattern" value="">-->
      </td>
    </tr>
    <tr>
      <th>征信要求</th>
      <td><textarea name="credit_request" id="" cols="16" rows="4" value="<?php echo ($product["credit_request"]); ?>"><?php echo ($product["credit_request"]); ?></textarea> </td>
      <th>所需材料</th>
      <td><textarea id="" cols="16" rows="4" name="materials" value="<?php echo ($product["materials"]); ?>"><?php echo ($product["materials"]); ?></textarea></td>
    </tr>
   <!-- <tr>
      &lt;!&ndash;<th>各项费用</th>
      <td>
        <ul class="model">
          <li class=""><input type="text" name="cost[]" value=""><button type="button" class="btn cancel abolish">一</button></li>
          <li class="btn_add"><button type="button" class="btn btn-success" ipt="cost[]">+ 添加</button></li>
        </ul>&ndash;&gt;
      </td>
    </tr>-->
    <tr>
      <th>各项费用</th>
      <td>
          <style>
              li {list-style-type:none;}
          </style>
        <ul class="model">

          <?php if(is_array($product['cost'])): $i = 0; $__LIST__ = $product['cost'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="" style="list-style-type:none;"><span style='font-size:16px; padding: 0px 4px 0px 0px;'><?php echo ($i); ?></span>&nbsp;<input type="text" name="cost[]" value="<?php echo ($vo); ?>"><button type="button" class="btn cancel abolish">×</button></li><?php endforeach; endif; else: echo "" ;endif; ?>
          <li class="btn_add" style="list-style-type:none;"><button type="button" class="btn btn-success" ipt="cost[]">+ 添加</button></li>
        </ul>
      </td>
      <th>申请流程</th>
      <td>
        <ul class="model">
          <?php if(is_array($product['apply_process'])): $i = 0; $__LIST__ = $product['apply_process'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class=""><span style='font-size:16px; padding: 0px 4px 0px 0px;'><?php echo ($i); ?></span>&nbsp;<input type="text" name="apply_process[]" value="<?php echo ($vo); ?>"><button type="button" class="btn cancel abolish">×</button></li><?php endforeach; endif; else: echo "" ;endif; ?>
          <li class="btn_add" style="list-style-type:none;"><button type="button" class="btn btn-success" ipt="apply_process[]">+ 添加</button></li>
        </ul>
      </td>
    </tr>


    <tr>
      <th class="tableleft">注&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;释</th>
      <td colspan="3" >
        <!--<textarea name="interpretation" class="textarea" id="" rows="1"></textarea>-->
        <input type="text" style="width:90%" name="interpretation" value="<?php echo ($product["interpretation"]); ?>"/>
      </td>
    </tr>
    <tr>
      <th class="tableleft tab_middle">产品图片</th>
      <td style="overflow: hidden">
          <?php if($product['img_url'] != ''): ?><img class="show_img" src="/Public<?php echo ($product["img_url"]); ?>" img_url="<?php echo ($product["img_url"]); ?>" style="float:left;width:119px;height:105px;border-radius:5px;vertical-align: middle;">
              <input type="hidden" img_url="<?php echo ($product["img_url"]); ?>"/><?php endif; ?>

        <div id="box" style="float: left;">
          <div id="test" ></div>

        </div>
        <!--<div class="clear"></div>-->
      </td>

      <th class="tableleft tab_middle">产品轮播图</th>
      <td style="overflow: hidden">
          <?php if($product['img_roasting'] != ''): ?><img class="show_img1" src="/Public<?php echo ($product["img_roasting"]); ?>" img_url1="<?php echo ($product["img_roasting"]); ?>" style="float:left;width:119px;height:105px;border-radius:5px;vertical-align: middle;">
              <input type="hidden" img_url1="<?php echo ($product["img_roasting"]); ?>"/><?php endif; ?>
        <div id="box1" style="float: left;">
          <div id="test1" ></div>

        </div>
        <!--<div class="clear"></div>-->
      </td>
    </tr>

    <tr>
      <td class="tableleft"></td>
      <td colspan="3">
        <button type="submit" class="btn btn-primary">保&nbsp;&nbsp;&nbsp;&nbsp;存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
      </td>
    </tr>
  </table>
</form>



<!--<script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>-->
<script type="text/javascript">

  $(function(){

      var show_img=document.getElementsByClassName("show_img")[0];
      var show_img1=document.getElementsByClassName("show_img1")[0];
      //底部图片初始化
      if(show_img){
          $(".show_img").hide();
          var img_url=$(".show_img").attr("src");
          var div = '<div class="parentFileBox" style="width: 130px"> \
						<ul class="fileBoxUl">\
						<li id="fileBox_\'+file_id+\'" class="diyUploadHover"> \
                            <div class="viewThumb"><img src="'+img_url+'"></div>\
                             </li>\
                            </ul>\
					</div>';

   $("#box").prepend(div);

          $("#test").find(".webuploader-pick").html('' +
              '<div style="border:solid 1px #84d0ff">' +
              '<a class="diyInstead" href="javascript:void(0)">替&nbsp;换</a></div>')
          $("#test").find(".webuploader-pick").css({
              "text-align":"center",
              "line-height":"40px",
              "width":"60px",
              "height":"40px",
          })



      }else{
          $("#test").show();
      }
      if(show_img1){
          $(".show_img1").hide();
          var img_url1=$(".show_img").attr("src");
          var div1 = '<div class="parentFileBox" style="width: 130px"> \
						<ul class="fileBoxUl">\
						<li id="fileBox_\'+file_id+\'" class="diyUploadHover"> \
                            <div class="viewThumb"><img src="'+img_url1+'"></div>\
                             </li>\
                            </ul>\
					</div>';

          $("#box1").prepend(div1);

          $("#test1").find(".webuploader-pick").html('' +
              '<div style="border:solid 1px #84d0ff">' +
              '<a class="diyInstead" href="javascript:void(0)">替&nbsp;换</a></div>')
          $("#test1").find(".webuploader-pick").css({
              "text-align":"center",
              "line-height":"40px",
              "width":"60px",
              "height":"40px",
          })
      }else{
          $("#test1").show();
      }




    $(document).on('change','.checkbox_city',function(){
      var checkbox_city = $(this);
        console.log(checkbox_city.is(':checked'),checkbox_city.attr('check') === '1');
      if(checkbox_city.is(':checked')){
//        if(checkbox_city.attr('check') === '1'){
//          console.log('false');
//          return;
//        }

        var val = checkbox_city.val();

        $.post('<?php echo U("Product/territory");?>',{id:val},function(data){


          if(data.status === 1){

//            checkbox_city.attr('st');

            var checkbox = '<span style="font-weight:bold;">'+checkbox_city.attr('st')+':</span>';
            $.each(data.result,function(k,v){
//              console.log(k,v);
                if(data.grade == 1){
                    checkbox += '<input type="checkbox" name="territory[]" class="territory'+ v.higher_up+'" value="'+ v.id+'"><span>&nbsp;'+v.name+'</span>';
                }else if(data.grade == 2){
                    checkbox += '<input type="checkbox" name="territory[]" class="territory'+ v.id+'" checked value="'+ v.id+'"><span>&nbsp;'+v.name+'</span>';
                }

            });

//            console.log(checkbox);
//            console.log($('input[name="territory[]"').length);
//            if($('input[name="territory[]"').length > 0){
              checkbox = checkbox+'<br>';
//            }

            $('#territory').append(checkbox);

//            console.log(data.result);

            checkbox_city.attr('check','1');
          }else{

          }

        },'json');
      }else{
              var className = 'territory'+$(this).attr('value');
              var cityName=$(this).attr('st');
              $('.'+className).next().remove();
              $('.'+className).remove();
              $(this).parent().next().find('span').each(function(index,val){
                  if($(val).text().indexOf(cityName)!=-1){
                      $(val).nextAll('br').eq(0).remove();
                      $(val).remove();
                  }
              });
      }

    });

    $('.btn_add>button').click(function(){
      var name = $(this).attr('ipt');
      var li = $(this).parent();
      var ul = li.parent();
      if((ul.find('li').length >= 10 && name == "cost[]") || (name == "apply_process[]" && ul.find('li').length >= 10)){
        return false;
      }
//      console.log($('.btn_add').hasClass('btn'));

      var input = '<li><input type="text" name="'+name+'"><button type="button" class="btn cancel abolish" >×</button></li>';<!--style="background: red;width: 25px;height: 25px;padding: 0;font-size: 24px;border-radius: 8px;margin: 0 0 10px 5px;color: #fff;font-weight: bold;"-->
      li.before(input);
      var li_length = ul.find('li').length;
      ul.find('li').each(function(k,v){
        if(k < li_length-1){
          $(this).find('span').remove();
          $(this).prepend("<span style='font-size:16px; padding: 0px 4px 0px 0px;'>"+(k+1)+"</span>");
//          v.prepend("<span>"+k+1+"</span>");
        }
      });
//      console.log(name);
//      console.log(ul);
//      console.log(ul.find('li').length);

    });

    $(document).on('click','.abolish',function(){
      var li = $(this).parent();
      var ul = li.parent();
      if(ul.find('li').length <= 2){
        li.find('input').val('');
      }else{
        li.remove();
      }
      var li_length = ul.find('li').length;
      ul.find('li').each(function(k,v){
        if(k < li_length-1){
          $(this).find('span').remove();
          $(this).prepend("<span style='font-size:16px; padding: 0px 4px 0px 0px;'>"+(k+1)+"</span>");
        }
      });
    });


  });




      $('.interest').blur(function(){
      var str = $(this).val();
          var patt = new RegExp(/[^\d\.]+/,"g");//匹配除了数字和小数点以外的分隔符
      var result;
      var arr=[];//存放分隔符的集合
      var Interest=[];//存放利率的集合
      while ((result = patt.exec(str)) != null) {
          arr.push(result[0]);
      }

      if(arr.length==1){
          var mes=str.split(arr[0]);
          $.each(mes,function(index,val){
              if(isNaN(Number(val))){
                  return alert('请输入正确的数据格式');
              }else{
                  Interest.push(val);
              }
          });
          $.each(Interest,function(index,val){
              var point=val.split('.');
              if(point[1]==''){
                  return alert('请输入正确的数据格式');
              }else{
                  //success
              }
          })

      }else if(arr.length==0){
          var Interest=Number(str);
//          alert(Interest);
      }else{
          alert('请输入正确的数据格式2');
      }
  });
  function onlyNum(){
    if(!(event.keyCode==46)&&!(event.keyCode==8)&&!(event.keyCode==37)&&!(event.keyCode==39))
    if(!((event.keyCode>=48&&event.keyCode<=57)||(event.keyCode>=96&&event.keyCode<=105)))
    event.returnValue=false;  //执行至该语句时，阻止输入；可类比阻止冒泡原理或者禁止右键功能；
  }





  /*
   * 服务器地址,成功返回,失败返回参数格式依照jquery.ajax习惯;
   * 其他参数同WebUploader
   */

//  var addimg = "/Public";
  $('#test').diyUpload({
    url:'<?php echo U("File/img_file",array("type"=>"Product"));?>',
    addimg:"/Public",//设置添加按钮图片根目录
    success:function( data ) {

      if(data.status === 1){

        var url = data.result.src;

        var ipt = "<input type='hidden' name='img_url' value='"+url+"'>";

        $('#box').before(ipt);
      }else{
      }
    }
  });
  $('#test1').diyUpload({
    url:'<?php echo U("File/img_file",array("type"=>"roasting"));?>',
    addimg:"/Public",//设置添加按钮图片根目录
    success:function( data ) {

      if(data.status === 1){

        var url = data.result.src;

        var ipt = "<input type='hidden' name='img_roasting' value='"+url+"'>";

        $('#box1').before(ipt);
      }else{
      }
    }
  });
</script>















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