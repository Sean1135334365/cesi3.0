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
<!--
<form class="form-inline definewidth m20" action="<?php echo U('System/admin_list');?>" method="post">
  菜单名称：
  <input type="text" name="name" id="menuname"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
  <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>-->

<style>
  ::-webkit-scrollbar {
    width: 10px;
    height: 10px;
  }
  ::-webkit-scrollbar-track {
    background:#ddd;
    opacity:0.7;
    -webkit-box-shadow:rgba(50,50,50,0.3);
    border-radius:10px;
  }
  ::-webkit-scrollbar-thumb {
    border-radius:3px;
    background:rgba(68,182,174,0.3);
    -webkit-box-shadow:rgba(68,182,174,0.5);
  }
  ::-webkit-scrollbar-thumb:window-inactive {
    background-color:rgba(68,182,174,0.5);
  }
  ::-webkit-scrollbar-track-piece{
    background:#F3F3F3;
    opacity:0.5;
    -webkit-box-shadow:rgba(50,50,50,0.5);
    border-radius:3px;
  }
  table tr th,table tr td{
    vertical-align: middle !important;
  }

  table{
    min-width:1000px;
  }

</style>



<table class="table table-bordered table-hover tab_center definewidth m10">
  <tr>
    <th width="5%">编号</th>
    <th width="10%">微信名</th>
    <th width="8%">姓名</th>
    <th width="12%">手机号</th>
    <th>内容</th>
    <th width="13%">提交时间</th>
    <th width="5%">操作</th>
  </tr>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($i); ?></td>
      <td><?php echo ($vo["nickname"]); ?></td>
      <td><?php echo ($vo["name"]); ?></td>
      <td><?php echo ($vo["mobile"]); ?></td>
      <td><?php echo ($vo["content"]); ?></td>
      <td>
        <?php echo (date("Y年m月d日",$vo["time"])); ?>
        <br/>
        <?php echo (date("H时i分s秒",$vo["time"])); ?>
      </td>
      <td>
        <!--<a href="<?php echo U('System/admin_grouping',array('id'=>$vo['id']));?>">修改</a> <span style="font-size:16px;">|</span>-->
        <!--<a href="<?php echo U('System/delete_admin',array('id'=>$vo['id'],'status'=>$vo['status']));?>" onclick="return menu_delete('<?php echo ($vo["username"]); ?>','<?php echo ($vo["status"]); ?>')"><?php if($vo['status'] == '1'): ?>禁用<?php else: ?>启用<?php endif; ?></a>-->
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>
<!--

<div class="inline page">&lt;!&ndash; pull-right&ndash;&gt;
  <a href="<?php if($page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('System/admin_list',array('page'=>$page_number['page']-1)); endif; ?>">«</a>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <?php $__FOR_START_5772__=1;$__FOR_END_5772__=$page_number['count'];for($i=$__FOR_START_5772__;$i <= $__FOR_END_5772__;$i+=1){ if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): if($i == $page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
        <?php else: ?>
        <a href="<?php echo U('System/admin_list',array('page'=>$i));?>"><?php echo ($i); ?></a>
        &lt;!&ndash;<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>&ndash;&gt;<?php endif; ?>
      <?php else: endif; } ?>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <a href="<?php if($page_number['page'] == $page_number['count'] ): ?>javascript:;<?php else: echo U('System/admin_list',array('page'=>$page_number['page']+1)); endif; ?>">»</a>

</div>
-->











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