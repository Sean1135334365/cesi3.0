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


<form class="form-inline definewidth m20" action="index.html" method="get">
  菜单名称：
  <input type="text" name="menuname" id="menuname"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
  <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew">新增用户</button>
</form>

<table class="table table-bordered table-hover definewidth m10">
  <tr>
    <th>编号</th>
    <th>用户名</th>
    <th>昵称</th>
    <th>姓名</th>
    <th>手机号码</th>
    <th>邮箱</th>
    <th>年龄</th>
    <th>性别</th>
    <th>权限级别</th>
    <th>注册时间</th>
    <th>注册IP</th>
    <th>上次登录时间</th>
    <th>上次登录IP</th>
    <th>操作</th>
  </tr>
  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($vo["number"]); ?></td>
      <td><?php echo ($vo["username"]); ?></td>
      <td><?php echo ($vo["nickname"]); ?></td>
      <td><?php echo ($vo["name"]); ?></td>
      <td><?php echo ($vo["mobile"]); ?></td>
      <td><?php echo ($vo["mail"]); ?></td>
      <td><?php echo ($vo["age"]); ?></td>
      <td><?php echo ($vo["gender"]); ?></td>
      <td><?php echo ($vo["rank"]); ?></td>
      <td><?php echo ($vo["register_time"]); ?></td>
      <td><?php echo ($vo["register_ip"]); ?></td>
      <td><?php echo ($vo["enter_time"]); ?></td>
      <td><?php echo ($vo["enter_ip"]); ?></td>
      <td>
        <a href="<?php echo U('User/admin_grouping',array('id'=>$vo['id']));?>">修改</a> <span style="font-size:16px;">|</span>
        <a href="<?php echo U('User/delete_admin',array('id'=>$vo['id']));?>" onclick="return menu_delete('<?php echo ($vo["delete"]); ?>','<?php echo ($vo["menu"]); ?>')">删除</a>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>


<script>
  $(function () {

    $('#addnew').click(function(){
      window.location.href="<?php echo U('User/addition_admin');?>";
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