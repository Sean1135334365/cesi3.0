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
<style>
    table.tab_center td, table.tab_center th, td.tab_center, th.tab_center{
        vertical-align: middle;
    }
</style>


<!--顶部-->
<form class="form-inline definewidth m20" action="<?php echo U('Product/introduce');?>" method="post">
  <input type="text" name="name" id="name" class="abc input-default" placeholder="产品名称/产品代码" value="">&nbsp;&nbsp;
  <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <!--<a href="<?php echo U('Product/product_redact');?>"><button type="button" class="btn btn-success" id="addnew">新增产品</button></a>-->
</form>

<!--主体-->
<table class="table table-bordered table-hover tab_center definewidth m10">
  <tr>
    <th>编号</th>
    <th>产品图标</th>
    <th>产品名称</th>
    <th>类别</th>
    <th>介绍图片</th>
    <th>操作</th>
  </tr>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($i); ?></td>
      <td><img src="/Public<?php echo ($vo["img_url"]); ?>" style="width:50px;cursor:pointer;"></td>
      <td><?php echo ($vo["name"]); ?></td>
      <!--<td><?php echo ($vo["code"]); ?></td>-->
      <td>
        <?php if($vo["banks"] == 1 ): ?>银行类<?php endif; ?>
        <?php if($vo["banks"] == 0 ): ?>非银类<?php endif; ?>
      </td>
      <td><?php if($vo['introduce_img'] != ''): ?><button type="button" class="btn btn-success img_new" img_url="/Public<?php echo ($vo["introduce_img"]); ?>">查看</button><?php endif; ?></td>
      <td>
        <a href="<?php echo U('Product/introduce_up',array('id'=>$vo['id']));?>">编辑</a><!-- <span style="font-size:16px;">|</span>
        <?php if($vo["state"] == 1 ): ?><a href="javascript:;" class="deleting" state="0" val="<?php echo ($vo['id']); ?>">已启用</a><?php endif; ?>
        <?php if($vo["state"] == 0 ): ?><a href="javascript:;" class="deleting" state="1" val="<?php echo ($vo['id']); ?>">已禁用</a><?php endif; ?>-->

        <!--<a href="#" onclick="return menu_delete('<?php echo ($vo["delete"]); ?>','<?php echo ($vo["menu"]); ?>')">删除</a>-->
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>





<!--获取授权书弹框-->
<style>
  ::-webkit-scrollbar {
    width: 0px;
    height: 0px;
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
</style>
<div class="tooltips" id="tooltips" >
  <div class="tlp_tle" id="tlp_tle" style="position: absolute;top: 0;">产品介绍图片<span>×</span></div>
  <div class="tlp_text">
    <div>
      <img src="" alt="">
    </div>
  </div>
</div>




<script>
  $(function(){

    $('.img_new').click(function(){
      var img_url=$(this).attr('img_url');
      $('#tooltips').css({'height':'70%','overflow-y':'auto'});
      $('#tooltips img').attr('src',img_url);
      $('#tooltips').show();
    });
    $('#tooltips').on('scroll',function(){
      var st=$('#tooltips').scrollTop();
      $('#tlp_tle').css('top',st+'px');
    })

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