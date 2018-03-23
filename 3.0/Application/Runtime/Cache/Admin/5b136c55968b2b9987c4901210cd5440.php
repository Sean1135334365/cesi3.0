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
<link rel="stylesheet" type="text/css" href="/Public/Admin/assets/css/modularity_style.css" />
<style>
    @media only screen and (max-width:1280px) and (min-width:968px){#table2{height: 500px;}}
    @media screen and (max-width:968px){.table2{height: auto;}}
</style>
<div class="container">
    <div class="content">
        <ul>
            <?php if($_SESSION['yzs_userinfo']['inou'] == 0): ?><div>
                    <li>
                        <div class="li_title">内部账号</div>
                        <div class="check_btn">
                            <?php if($_SESSION['yzs_userinfo']['founder'] == 0): ?><a href="<?php echo U('System/jurisdiction_update',array('inou'=>2));?>" style="color: #f5f5f5">
                                <button type="button" class="btn btn-success addnew">新增</button></a>
                                <?php else: ?>
                                <button type="button" class="btn btn-success addnew founder">新增</button><?php endif; ?>
                        </div>
                        <table class="table table-bordered table-hover tab_center definewidth m10">
                            <tr>
                                <th>编号</th>
                                <th>职位名称</th>
                                <!--<th>权限</th>-->
                                <th>管理操作</th>
                            </tr>
                            <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><span class="qwer"><?php echo ($vo["rank"]); ?></span></td>
                                    <!--<td>...</td>-->
                                    <td>
                                        <?php if($_SESSION['yzs_userinfo']['founder'] == 0): ?><a href="<?php echo U('System/jurisdiction_update',array('id'=>$vo['id']));?>">编辑</a>
                                            <?php else: ?>
                                            <a href="javascript:;" class="founder">编辑</a><?php endif; ?>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </li>
                </div>

                <div>
                    <li>
                        <div class="li_title">外部账号</div>
                        <div class="check_btn">
                            <?php if($_SESSION['yzs_userinfo']['founder'] == 0): ?><a href="<?php echo U('System/jurisdiction_update',array('inou'=>1));?>" style="color: #f5f5f5">
                                <button type="button" class="btn btn-success addnew">新增</button></a>
                                <?php else: ?>
                                <button type="button" class="btn btn-success addnew founder">新增</button><?php endif; ?>
                        </div>
                        <table class="table table-bordered table-hover tab_center definewidth m10">
                            <tr>
                                <th>编号</th>
                                <th>职位名称</th>
                                <!--<th>权限</th>-->
                                <th>管理操作</th>
                            </tr>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><span class="qwer"><?php echo ($vo["rank"]); ?></span></td>
                                    <!--<td>...</td>-->
                                    <td>
                                        <?php if($_SESSION['yzs_userinfo']['founder'] == 0): ?><a href="<?php echo U('System/jurisdiction_update',array('id'=>$vo['id']));?>">编辑</a>
                                            <?php else: ?>
                                            <a href="javascript:;" class="founder">编辑</a><?php endif; ?>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </li>
                </div><?php endif; ?>
            <?php if($_SESSION['yzs_userinfo']['inou'] == 1): ?><div>
                    <li>
                        <div class="li_title">外部账号</div>
                        <div class="check_btn">
                            <?php if($_SESSION['yzs_userinfo']['founder'] == 0): ?><a href="<?php echo U('System/jurisdiction_update',array('inou'=>1));?>" style="color: #f5f5f5">
                                <button type="button" class="btn btn-success addnew">新增</button></a>
                                <?php else: ?>
                                <button type="button" class="btn btn-success addnew founder">新增</button><?php endif; ?>
                        </div>
                        <table class="table table-bordered table-hover tab_center definewidth m10">
                            <tr>
                                <th>编号</th>
                                <th>职位名称</th>
                                <!--<th>权限</th>-->
                                <th>管理操作</th>
                            </tr>
                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><span class="qwer"><?php echo ($vo["rank"]); ?></span></td>
                                    <!--<td>...</td>-->
                                    <td>
                                        <a href="<?php echo U('System/jurisdiction_update',array('id'=>$vo['id']));?>">编辑</a>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </li>
                </div><?php endif; ?>
            <?php if($_SESSION['yzs_userinfo']['inou'] == 2): ?><div>
                    <li>
                        <div class="li_title">内部账号</div>
                        <div class="check_btn">
                            <?php if($_SESSION['yzs_userinfo']['founder'] == 0): ?><a href="<?php echo U('System/jurisdiction_update',array('inou'=>2));?>" style="color: #f5f5f5">
                                <button type="button" class="btn btn-success addnew">新增</button></a>
                                <?php else: ?>
                                <button type="button" class="btn btn-success addnew founder">新增</button><?php endif; ?>
                        </div>
                        <table class="table table-bordered table-hover tab_center definewidth m10">
                            <tr>
                                <th>编号</th>
                                <th>职位名称</th>
                                <!--<th>权限</th>-->
                                <th>管理操作</th>
                            </tr>
                            <?php if(is_array($list2)): $i = 0; $__LIST__ = $list2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td><?php echo ($i); ?></td>
                                    <td><span class="qwer"><?php echo ($vo["rank"]); ?></span></td>
                                    <!--<td>...</td>-->
                                    <td>
                                         <a href="<?php echo U('System/jurisdiction_update',array('id'=>$vo['id']));?>">编辑</a>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </li>
                </div><?php endif; ?>

        </ul>

    </div>
</div>
<script>
    $(function () {
        /*$('.addnew').click(function(){
            var founder = $(this).attr("founder");
                if(founder == 0){
                    sessionStorage.setItem('inou',$(this).attr('inou'));
                    window.location.href="<?php echo U('System/jurisdiction_update');?>";
                }else{
                    alert("无此权限！");
                }
        });*/

        $('.founder').click(function(){
            alert("无操作权限！");
        })

    });

</script>

<!--<form class="form-inline definewidth m20 c_width70" action="<?php echo U('System/jurisdiction_list');?>" method="post">-->
  <!--菜单名称：-->
  <!--<input type="text" name="rank" id="menuname"class="abc input-default" placeholder="" value="">&nbsp;&nbsp;-->
  <!--<button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <button type="button" class="btn btn-success" id="addnew" founder="<?php echo ($_SESSION['yzs_userinfo']['founder']); ?>">新增权限</button>-->
<!--</form>-->

<!--<table class="table table-bordered table-hover tab_center definewidth m10 c_width70">-->
  <!--<thead>-->
  <!--<tr>-->
    <!--&lt;!&ndash;<th class="table-check">-->
      <!--<label class="am-checkbox am-secondary">-->
        <!--<input type="checkbox" class="tpl-table-fz-check" data-am-ucheck>-->
      <!--</label>-->
    <!--</th>&ndash;&gt;-->
    <!--<th class="tab_wit1">编号</th>-->
    <!--&lt;!&ndash;<th>目录类别</th>&ndash;&gt;-->
    <!--<th>职位名称</th>-->
    <!--&lt;!&ndash;<th>部门</th>&ndash;&gt;-->
    <!--<th>权限</th>-->
    <!--<th class="tab_wit2">管理操作</th>-->
  <!--</tr>-->
  <!--</thead>-->
  <!--<tbody>-->
  <!--<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
    <!--<tr>-->
      <!--&lt;!&ndash;<td>-->
        <!--<label class="am-checkbox am-secondary">-->
          <!--<input type="checkbox" data-am-ucheck name="id" value="<?php echo ($vo["id"]); ?>">-->
        <!--</label>-->
      <!--</td>&ndash;&gt;-->
      <!--<td><?php echo ($vo["id"]); ?></td>-->
      <!--<td><?php echo ($vo["rank"]); ?></td>-->
      <!--<td>...</td>-->
      <!--<td>-->
          <!--<?php if($_SESSION['yzs_userinfo']['founder'] == 0): ?>-->
              <!--<a href="<?php echo U('System/jurisdiction_update',array('id'=>$vo['id']));?>">编辑</a>-->
              <!--<?php else: ?>-->
              <!--<a href="javascript:;" class="founder">编辑</a>-->
          <!--<?php endif; ?>-->

      <!--</td>-->
    <!--</tr>-->
  <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
  <!--</tbody>-->
<!--</table>-->


<!--&lt;!&ndash;<div class="page">&ndash;&gt;-->
  <!--<div class="inline page c_width70">&lt;!&ndash; pull-right&ndash;&gt;-->
    <!--<a href="<?php if($page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('System/jurisdiction_list',array('page'=>$page_number['page']-1)); endif; ?>">«</a>-->
    <!--<?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?>-->
      <!--<a href="javascript:;">...</a>-->
    <!--<?php endif; ?>-->
    <!--<?php $__FOR_START_7451__=1;$__FOR_END_7451__=$page_number['count'];for($i=$__FOR_START_7451__;$i <= $__FOR_END_7451__;$i+=1){ ?>-->

      <!--<?php if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): ?>-->
        <!--<?php if($i == $page_number['page'] ): ?>-->
          <!--<a href="javascript:;" class="current"><?php echo ($i); ?></a>-->
          <!--<?php else: ?>-->
          <!--<a href="<?php echo U('System/jurisdiction_list',array('page'=>$i));?>"><?php echo ($i); ?></a>-->
          <!--&lt;!&ndash;<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>&ndash;&gt;-->
        <!--<?php endif; ?>-->
        <!--<?php else: ?>-->
      <!--<?php endif; ?>-->

    <!--<?php } ?>-->
    <!--<?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?>-->
      <!--<a href="javascript:;">...</a>-->
    <!--<?php endif; ?>-->
    <!--<a href="<?php if($page_number['page'] == $page_number['count'] ): ?>javascript:;<?php else: echo U('System/jurisdiction_list',array('page'=>$page_number['page']+1)); endif; ?>">»</a>-->

  <!--</div>-->
<!--&lt;!&ndash;</div>&ndash;&gt;-->

<!--<script>-->
  <!--$(function () {-->
      <!--$('#addnew').click(function(){-->
        <!--var founder = $(this).attr("founder");-->
        <!--if(founder == 0){-->
            <!--window.location.href="<?php echo U('System/jurisdiction_update');?>";-->
        <!--}else{-->
            <!--alert("无此权限！");-->
        <!--}-->
      <!--});-->

      <!--$('.founder').click(function(){-->
          <!--alert("无此权限！");-->
      <!--})-->

  <!--});-->

<!--</script>-->












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