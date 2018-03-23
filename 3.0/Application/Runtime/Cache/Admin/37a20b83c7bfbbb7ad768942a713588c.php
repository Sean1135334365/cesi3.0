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


<link rel="stylesheet" type="text/css" href="/Public/css/tooltip.css">
<script type="text/javascript" src="/Public/js/tooltip.js"></script>


<!--顶部-->
<form class="form-inline definewidth m20" action="<?php echo U('Credit/authorization_list');?>" method="post">
  <input type="text" name="num" id="name" class="abc input-default" placeholder="申请书/授权书编码" value="">&nbsp;&nbsp;
  <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <!--<a href="<?php echo U('Credit/product_redact');?>">-->
    <button type="button" class="btn btn-success" id="addnew">申请授权书及申请书</button><!--</a>-->
</form>





<!--主体-->
<table class="table table-bordered table-hover tab_center definewidth m10">
  <tr>
    <th>序号</th>
    <th>申请书及授权书编码</th>
    <th>申请书</th>
    <th>授权书</th>
    <!--<th>来源</th>-->
    <!--<th>类型</th>-->
    <!--<th>城市</th>-->
    <!--<th>金额下限</th>-->
    <!--<th>金额上限</th>-->
    <th>状态</th>
    <th>申请时间</th>
    <!--<th>上次登录时间</th>-->
    <!--<th>上次登录IP</th>-->
    <!--<th>操作</th>-->
  </tr>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($i); ?></td>
      <td><?php echo ($vo["acode"]); ?></td>
      <td><a href="<?php echo ($vo["applyurl"]); ?>" target="_blank" download="申请书<?php echo ($vo["acode"]); ?>.<?php echo ($vo["apply"]); ?>"><button type="button" class="btn btn-info btn-mini">下载</button></a></td>
      <td><a href="<?php echo ($vo["authorizeurl"]); ?>" target="_blank" download="授权书<?php echo ($vo["acode"]); ?>.<?php echo ($vo["authorize"]); ?>"><button type="button" class="btn btn-info btn-mini">下载</button></a></td>
      <!--<td><?php echo ($vo["name"]); ?></td>-->
      <!--<td><?php echo ($vo["source"]); ?></td>-->
      <!--<td><?php echo ($vo["ptname"]); ?></td>-->
      <!--<td><?php echo ($vo["city"]); ?></td>-->
      <!--<td><?php echo ($vo["min_money"]); ?></td>-->
      <!--<td><?php echo ($vo["max_money"]); ?></td>-->
      <!--<td><?php echo ($vo["add_time"]); ?></td>-->
      <td>
        <?php switch($vo["state"]): case "1": ?><span style="color:#37AD29;font-weight:bold;">未使用</span><?php break;?>
          <?php case "2": ?><span style="color:#EFB72B;font-weight:bold;">正在使用</span><?php break;?>
          <?php default: ?><span style="color:#EA2727;font-weight:bold;">已使用</span><?php endswitch;?>
        <!--<?php echo ($vo["state"]); ?>-->
      </td>
      <td><?php echo (date('Y/m/d H:i:s',$vo["time"])); ?></td>
      <!--<td><?php echo ($vo["enter_ip"]); ?></td>-->
      <!--<td>-->
        <!--<a href="<?php echo U('Product/product_redact',array('id'=>$vo['id']));?>">修改</a> <span style="font-size:16px;">|</span>-->
        <!--<a href="#" onclick="return menu_delete('<?php echo ($vo["delete"]); ?>','<?php echo ($vo["menu"]); ?>')">删除</a>-->
      <!--</td>-->
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>




<!--页码-->
<div class="inline page"><!-- pull-right-->
  <a href="<?php if($page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('Credit/authorization_list',array('page'=>$page_number['page']-1)); endif; ?>">«</a>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <?php $__FOR_START_31913__=1;$__FOR_END_31913__=$page_number['count'];for($i=$__FOR_START_31913__;$i <= $__FOR_END_31913__;$i+=1){ if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): if($i == $page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
        <?php else: ?>
        <a href="<?php echo U('Credit/authorization_list',array('page'=>$i));?>"><?php echo ($i); ?></a>
        <!--<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>--><?php endif; ?>
      <?php else: endif; } ?>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <a href="<?php if($page_number['page'] == $page_number['count'] ): ?>javascript:;<?php else: echo U('Credit/authorization_list',array('page'=>$page_number['page']+1)); endif; ?>">»</a>

</div>

<!--获取授权书弹框-->
<div class="tooltips" id="tooltips">
  <div class="tlp_tle" id="tlp_tle">申请授权书及申请书<span>×</span></div>
  <div class="tlp_text">
    <div>
      <span>请输入您要获取的数量</span><br>
      <input type="text" pattern="^[0-9]{1,2}$" onkeypress="return (/[\d]/.test(String.fromCharCode(event.keyCode)) && $(this).val().length < 2)"  name="num"><br>
      <button type="button" class="btn btn-success" id="num_btn_submit">提&nbsp;&nbsp;&nbsp;交</button>
    </div>
  </div>
</div>


<script>
  $(function(){

    $('#addnew').click(function(){
      $('#tooltips').show();
    });

    $('#num_btn_submit').click(function(){
      var num = $('#tooltips>.tlp_text input[name="num"]').val();
//      console.log(num,num < 100,num > 0,num+'1');
      if(num != '' && num > 0){
        $.post("<?php echo U('Credit/accredit');?>",{num:num},function(data){

          if(data.status === 1){

            console.log(data.result);


          }else{
            console.log(data);
            alert(data.info);
//            if(data.code === 32001){
//              console.log(data);
////              alert(data.info_code);
//            }

          }




        });




      }







    });





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