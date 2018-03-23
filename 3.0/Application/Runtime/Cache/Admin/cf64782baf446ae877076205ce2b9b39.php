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


<form action="<?php echo U('System/catalogue',array('id'=>$list['id']));?>" method="post" class="definewidth m20">
  <input type="hidden" name="id" value="<?php echo ($list["id"]); ?>" />
  <table class="table table-bordered table-hover m10">
    <tr>
      <td class="tableleft">目录类别</td>
      <td>
        <select name="sort">
          <option value="">--请选择类别--</option>
          <option value="1" <?php if($list['sort'] == 1 ): ?>selected="selected"<?php endif; ?>>系统</option>
          <option value="2" <?php if($list['sort'] == 2 ): ?>selected="selected"<?php endif; ?>>业务</option>
        </select>
      </td>
    </tr>
    <tr>
      <td width="10%" class="tableleft">目录级别</td>
      <td>
        <select name="tier">
          <option value="">--请选择目录级别--</option>
          <option value="1" <?php if(($list['superior'] == 0) AND ($list['id'] != '') ): ?>selected="selected"<?php endif; ?>>一级菜单</option>
          <option value="2" <?php if($list['superior'] != 0 ): ?>selected="selected"<?php endif; ?>>二级菜单</option>
        </select>
      </td>
    </tr>
    <tr>
      <td class="tableleft">目录名称</td>
      <td><input type="text" name="menu" value="<?php echo ($list['menu']); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">所属目录</td>
      <td>
        <select name="superior">
          <option value="">--请选择上级目录--</option>
          <?php if(is_array($supe)): $i = 0; $__LIST__ = $supe;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($list['superior'] == $vo['id']): ?>selected="selected"<?php endif; ?>><?php echo ($vo["menu"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        &nbsp;&nbsp;<span style="font-size:12px;color:#c3c3c3;">注：一级目录不需要选择</span>
      </td>
    </tr>
    <tr>
      <td class="tableleft">控制器名称</td>
      <td>
        <input type="text" name="act" value="<?php if($list['superior'] == '0' or $list['superior'] == ''): echo ($list['crt']); else: echo ($list['act']); endif; ?>"/>&nbsp;&nbsp;
        <span style="font-size:12px;color:#c3c3c3;">注：新建目录需自定义名称（必须为英文字母或下划线，一级目录为controller，二级目录为action）</span>
      </td>
    </tr>
    <tr>
      <td class="tableleft">目录状态</td>
      <td>
        <input type="radio" name="state" value="1" <?php if($list['state'] == '1' ): ?>checked<?php endif; ?>/> 启用
        <input type="radio" name="state" value="0" <?php if($list['state'] == '0' ): ?>checked<?php endif; ?>/> 禁用
      </td>
    </tr>
    <tr>
      <td class="tableleft"></td>
      <td>
        <button type="submit" class="btn btn-primary" type="button">保存</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
      </td>
    </tr>
  </table>
</form>












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