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
<style>
    tr,td{
        vertical-align: middle!important;
    }
</style>
<form class="form-inline definewidth m20" action="<?php echo U('System/admin_list');?>" method="post">
  <input type="text" name="name" id="menuname"class="abc input-default" placeholder="姓名" value="">
  <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>

<table class="table table-bordered table-hover tab_center definewidth m10">
  <tr>
    <th>编号</th>
    <th>用户名</th>
    <th>渠道名称</th>
    <th>姓名</th>
    <th>手机号码</th>
    <th>邮箱</th>
    <th>城市</th>
    <th>目录权限</th>
    <th>创建人</th>
    <!--<th>注册时间</th>
    <th>注册IP</th>
    <th>上次登录时间</th>
    <th>上次登录IP</th>-->
    <th>操作</th>
  </tr>
  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($i); ?></td>
      <td><?php echo ($vo["username"]); ?></td>
      <td><?php echo ($vo["nickname"]); ?></td>
      <td><?php echo ($vo["name"]); ?></td>
      <td><?php echo ($vo["mobile"]); ?></td>
      <td><?php echo ($vo["mail"]); ?></td>
      <td><?php echo ($vo["territory"]); ?></td>
      <td><?php echo ($vo["rank"]); ?></td>
      <td><?php echo ($vo["founder"]); ?></td>
      <!--<td><?php echo ($vo["register_time"]); ?></td>
      <td><?php echo ($vo["register_ip"]); ?></td>
      <td><?php echo ($vo["enter_time"]); ?></td>
      <td><?php echo ($vo["enter_ip"]); ?></td>-->
      <td>
        <a href="<?php echo U('System/admin_grouping',array('id'=>$vo['id']));?>">修改</a> <span style="font-size:16px;">|</span>
        <a href="<?php echo U('System/delete_admin',array('id'=>$vo['id'],'status'=>$vo['status']));?>" onclick="return menu_delete('<?php echo ($vo["username"]); ?>','<?php echo ($vo["status"]); ?>')"><?php if($vo['status'] == '1'): ?>已启用<?php else: ?>已禁用<?php endif; ?></a>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>

<div class="inline page"><!-- pull-right-->
  <a href="<?php if($page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('System/admin_list',array('page'=>$page_number['page']-1)); endif; ?>">«</a>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <?php $__FOR_START_10464__=1;$__FOR_END_10464__=$page_number['count'];for($i=$__FOR_START_10464__;$i <= $__FOR_END_10464__;$i+=1){ if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): if($i == $page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
        <?php else: ?>
        <a href="<?php echo U('System/admin_list',array('page'=>$i));?>"><?php echo ($i); ?></a>
        <!--<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>--><?php endif; ?>
      <?php else: endif; } ?>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <a href="<?php if($page_number['page'] == $page_number['count'] ): ?>javascript:;<?php else: echo U('System/admin_list',array('page'=>$page_number['page']+1)); endif; ?>">»</a>

</div>

<script>
  $(function () {

    $('#addnew').click(function(){
      window.location.href="<?php echo U('System/addition_admin');?>";
    });

  });





  function menu_delete(text,btn){
//    var state = $(btn).find('span.text').html();
    if(btn === '1'){
      if(confirm("是否要禁用该管理员（"+text+"）么！")){
//        $(btn).find('span.ico').removeClass('am-icon-toggle-on').addClass('am-icon-toggle-off');
//          $(btn).find('span.text').html('启用');
        return true;
      }else{
        return false;
      }
    }else{
      if(confirm("是否要启用该管理员（"+text+"）么！")){
//        $(btn).find('span.ico').removeClass('am-icon-toggle-on').addClass('am-icon-toggle-off');
//        $(btn).find('span.text').html('禁用');
        return true;
      }else{
        return false;
      }
    }

  }

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