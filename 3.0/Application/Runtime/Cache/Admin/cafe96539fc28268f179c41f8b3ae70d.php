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

<form action="<?php echo U('User/addition_admin');?>" method="post" class="definewidth m20">
  <table class="table table-bordered table-hover ">
    <tr>
      <td width="10%" class="tableleft">用户名</td>
      <td><input type="text" name="username" value="<?php echo ($user["username"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">昵称</td>
      <td ><input type="text" name="nickname" value="<?php echo ($user["nickname"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">姓名</td>
      <td ><input type="text" name="name" value="<?php echo ($user["name"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">密码</td>
      <td ><input type="text" name="password" value="<?php echo ($user["password"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">手机号码</td>
      <td ><input type="text" name="mobile" value="<?php echo ($user["mobile"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">邮箱</td>
      <td ><input type="text" name="mail" value="<?php echo ($user["mail"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">年龄</td>
      <td ><input type="text" name="age" value="<?php echo ($user["age"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">性别</td>
      <td >
        <input type="radio" name="gender" value="1" <?php if($user["gender"] == 1 ): ?>checked<?php endif; ?> /> 男
        <input type="radio" name="gender" value="2" <?php if($user["gender"] == 2 ): ?>checked<?php endif; ?> /> 女
        <input type="radio" name="gender" value="0" <?php if($user["gender"] == 0 ): ?>checked<?php endif; ?> /> 保密
      </td>
    </tr>

    <tr>
      <td class="tableleft">身份</td>
      <td >
        <input type="radio" name="rank" value="1" <?php if($user["rank"] == 1 ): ?>checked<?php endif; ?> /> 超级管理员
        <input type="radio" name="rank" value="2" <?php if($user["rank"] == 2 ): ?>checked<?php endif; ?> /> 管理员
        <input type="radio" name="rank" value="0" <?php if($user["rank"] == 0 ): ?>checked<?php endif; ?> /> 普通用户
      </td>
    </tr>
    <tr>
      <td class="tableleft"></td>
      <td>
        <button type="submit" class="btn btn-primary">保存修改</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
      </td>
    </tr>
  </table>
</form>
<script>
  $(function () {
    $('#backid').click(function(){
      javascript:history.go(-1);
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