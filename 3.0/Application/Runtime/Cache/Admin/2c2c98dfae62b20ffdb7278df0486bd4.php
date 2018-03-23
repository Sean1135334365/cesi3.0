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

<form class="form-inline definewidth m20" action="<?php echo U('System/index');?>" method="post">
  <input type="text" name="menu" id="menuname" class="abc input-default" placeholder="" value="">&nbsp;&nbsp;
  <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew" founder="<?php echo ($_SESSION['yzs_userinfo']['founder']); ?>">新增菜单</button>
</form>
<table class="table table-bordered table-hover definewidth m10">
  <thead>
  <tr>
    <th>目录名称</th>
    <th>目录类别</th>
    <th>目录级别</th>
    <th>所属目录</th>
    <th>ACTION</th>
    <th>目录状态</th>
    <th>管理操作</th>
  </tr>
  </thead>
  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($vo["menu"]); ?></td>
      <td>
        <?php if($vo["sort"] == 1 ): ?>系统<?php endif; ?>
        <?php if($vo["sort"] == 2 ): ?>业务<?php endif; ?>
      </td>
      <td><?php echo ($vo["tier"]); ?></td>
      <td><?php echo ($vo["superior"]); ?></td>
      <td><?php echo ($vo["act"]); ?></td>
      <td>
        <?php if($vo["state"] == '1' ): ?>启用<?php endif; ?>
        <?php if($vo["state"] == '0' ): ?>禁用<?php endif; ?>
      </td>
      <td>
          <a href="<?php echo U('System/catalogue',array('id'=>$vo['id']));?>">编辑</a> <span style="font-size:16px;">|</span>
          <?php if($_SESSION['yzs_userinfo']['founder'] == 0): ?><a href="<?php echo U('System/delete_menu',array('id'=>$vo['id']));?>" onclick="return menu_delete('<?php echo ($vo["delete"]); ?>','<?php echo ($vo["menu"]); ?>')">删除</a>
          <?php else: ?>
              <a href="javascript:;" class="founder">删除</a><?php endif; ?>
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>


<div class="inline page c_width70"><!-- pull-right-->
  <a href="<?php if($page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('System/index',array('page'=>$page_number['page']-1)); endif; ?>">«</a>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <?php $__FOR_START_25036__=1;$__FOR_END_25036__=$page_number['count'];for($i=$__FOR_START_25036__;$i <= $__FOR_END_25036__;$i+=1){ if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): if($i == $page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
        <?php else: ?>
        <a href="<?php echo U('System/index',array('page'=>$i));?>"><?php echo ($i); ?></a>
        <!--<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>--><?php endif; ?>
      <?php else: endif; } ?>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <a href="<?php if($page_number['page'] == $page_number['count'] ): ?>javascript:;<?php else: echo U('System/index',array('page'=>$page_number['page']+1)); endif; ?>">»</a>

</div>


<script>
  $(function () {

    $('#addnew').click(function(){
        var founder = $(this).attr("founder");
        if(founder == 0){
            window.location.href="<?php echo U('System/catalogue');?>";
        }else{
            alert("无操作权限！");
        }
    });
    $('.founder').click(function(){
        alert("无操作权限！");
    })

  });
  function menu_delete(data,text){
    if(data === '0'){
      return confirm("你确定要删除一级目录（"+text+"）么？删除一级目录同时会将目录下的子目录一起删除哦！");
    }else{
      return confirm("你确定要删除目录（"+text+"）么！")
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