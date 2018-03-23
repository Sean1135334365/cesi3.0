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
    table.tab_center td, table.tab_center th, td.tab_center, th.tab_center{
        vertical-align: middle;
    }
</style>

<!--顶部-->
<form class="form-inline definewidth m20" action="<?php echo U('Product/product_list');?>" method="post">
  <input type="text" name="name" id="name" class="abc input-default" placeholder="产品名称/产品代码" value="">&nbsp;&nbsp;
  <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <a href="<?php echo U('Product/product_redact');?>"><button type="button" class="btn btn-success" id="addnew">新增产品</button></a>
</form>

<!--主体-->
<table class="table table-bordered table-hover tab_center definewidth m10">
  <tr>
    <th>编号</th>
    <th>图片</th>
    <th>代码</th>
    <th>名称</th>
    <th>资金方</th>
    <th>银行类型</th>
    <th>城市</th>
    <th>金额下限</th>
    <th>金额上限</th>
    <th>添加时间</th>
    <th>产品状态</th>
    <!--<th>上次登录时间</th>-->
    <!--<th>上次登录IP</th>-->
    <th>操作</th>
  </tr>
  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($i); ?></td>
      <td><img src="/Public<?php echo ($vo["img_url"]); ?>" style="width:50px;cursor:pointer;"></td>
      <td><?php echo ($vo["code"]); ?></td>
      <td><?php echo ($vo["name"]); ?></td>
      <td><?php echo ($vo["source"]); ?></td>
      <td>
          <?php if($vo["banks"] == 1 ): ?>银行类<?php endif; ?>
          <?php if($vo["banks"] == 0 ): ?>非银类<?php endif; ?>
      </td>
      <td><?php echo ($vo["city"]); ?></td>
      <td><?php echo ($vo["min_money"]); ?></td>
      <td><?php echo ($vo["max_money"]); ?></td>
      <td><?php echo ($vo["add_time"]); ?></td>
      <td><?php echo ($vo["state"]); ?></td>
      <!--<td><?php echo ($vo["enter_time"]); ?></td>-->
      <!--<td><?php echo ($vo["enter_ip"]); ?></td>-->
      <td>
        <a href="<?php echo U('Product/product_redact',array('id'=>$vo['id']));?>">修改</a>
          <span style="font-size:16px;">|</span>
          <?php if($vo["state"] == 1 ): ?><a href="javascript:;" class="deleting" state="0" val="<?php echo ($vo['id']); ?>">已启用</a><?php endif; ?>
          <?php if($vo["state"] == 0 ): ?><a href="javascript:;" class="deleting" state="1" val="<?php echo ($vo['id']); ?>">已禁用</a><?php endif; ?>
          <?php if($_SESSION['yzs_userinfo']['inou'] == 0 ): ?><span style="font-size:16px;">|</span>
              <a href="javascript:;" val="<?php echo ($vo['id']); ?>" class="delete" >删除</a><?php endif; ?>

          <!--<a href="<?php echo U('Product/product_delete',array('id'=>$vo['id']));?>" class="delete">删除</a>-->

        <!--<a href="#" onclick="return menu_delete('<?php echo ($vo["delete"]); ?>','<?php echo ($vo["menu"]); ?>')">删除</a>-->
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>

<script>
    $(function(){
        $('.deleting').click(function(){
            var id = $(this).attr('val');
            var state = $(this).attr('state');
            var _this = $(this);
            $.post("<?php echo U('Admin/Product/deleting');?>",{id:id,state:state},function(code){
                if(code.status === 1) {
                    if(code.data === '1') {
                        alert('修改成功')
                        _this.attr('state','0');
                        _this.html('已启用');
                    }
                    if(code.data === '0') {
                        alert('修改成功')
                        _this.attr('state','1');
                        /*console.log(_this);*/
                        _this.html('已禁用');
                    }
                    /*location.reload();*/
                } else {
                    alert('修改失败')
                }
            },'json')
        })

        $('.delete').click(function(){
            var id = $(this).attr('val');
            $.post("<?php echo U('Admin/Product/delete');?>",{id:id},function(result){
                if(result.status == 1){
                    alert('删除成功');
                    window.location.reload();
                }else if(result.status == 0){
                    alert('删除失败');
                }
            },'json')
        })

    })
</script>




<!--页码-->
<div class="inline page"><!-- pull-right-->
  <a href="<?php if($page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('Product/product_list',array('page'=>$page_number['page']-1)); endif; ?>">«</a>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <?php $__FOR_START_201__=1;$__FOR_END_201__=$page_number['count'];for($i=$__FOR_START_201__;$i <= $__FOR_END_201__;$i+=1){ if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): if($i == $page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
        <?php else: ?>
        <a href="<?php echo U('Product/product_list',array('page'=>$i));?>"><?php echo ($i); ?></a>
        <!--<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>--><?php endif; ?>
      <?php else: endif; } ?>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <a href="<?php if($page_number['page'] == $page_number['count'] ): ?>javascript:;<?php else: echo U('Product/product_list',array('page'=>$page_number['page']+1)); endif; ?>">»</a>

</div>












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