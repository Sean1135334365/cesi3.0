<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html>
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

<script type="text/javascript" src="/Public/layer/layer.js"></script>

<!--<form class="form-inline definewidth m20" action="<?php echo U('Product/product_list');?>" method="get">-->
<!--条件查询：-->
<!--<input type="text" name="name" id="name"class="abc input-default" placeholder="产品名称/产品代码" value="">&nbsp;&nbsp;-->
<!--<button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <a href="<?php echo U('Product/product_redact');?>"><button type="button" class="btn btn-success" id="addnew">新增产品</button></a>-->
<!--</form>-->


<style>
    @media only screen and (max-width:1280px) and (min-width:968px){#table2{height: 500px;}}
    @media screen and (max-width:968px){.table2{height: auto;}}
</style>


<div class="container">
    <div class="content">
        <ul>
            <div id="architecture">
                <li>
                    <div class="li_title">建筑类型</div>
                    <div class="check_btn">
                        <!--<form class="form-inline definewidth m10" action="<?php echo U('Product/parameter_list');?>" method="get">-->
                            <!--条件查询：-->
                            <!--<input type="text" name="name" id="name" class="abc input-default" placeholder="产品名称/产品代码" value="">&nbsp;&nbsp;-->
                            <!--<button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;-->
                            <button type="button" class="btn btn-success" id="addnew">添加</button>
                            <input type="hidden" value="1"/>
                        <!--</form>-->
                    </div>
                    <table class="table table-bordered table-hover tab_center definewidth m10">
                        <tr>
                            <th>编号</th>
                            <th>名称</th>
                            <th>编辑</th>
                        </tr>
                        <?php if(is_array($ht_data)): $i = 0; $__LIST__ = $ht_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($i); ?></td>
                                <td><span class="qwer"><?php echo ($vo["name"]); ?></span></td>
                                <td>
                                    <a href="javascript:;" class="save">编辑</a>
                                    <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                                    <input type="hidden" value="1"/>
                                    <span>|</span>
                                    <a href="javascript:;" class="delete" tid="<?php echo ($vo["id"]); ?>" typ="house_type">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="inline page"><!-- pull-right-->
                        <?php if($ht_page_number['page'] == 1 ): ?><a href="javascript:;">«</a><?php endif; ?>
                        <?php if($ht_page_number['page'] != 1 ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($ht_page_number['page']-1); ?>" dj="1">«</a><?php endif; ?>
                        <?php if(($ht_page_number['count'] > 10) AND ($ht_page_number['page'] > 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
                        <?php $__FOR_START_31999__=1;$__FOR_END_31999__=$ht_page_number['count'];for($i=$__FOR_START_31999__;$i <= $__FOR_END_31999__;$i+=1){ if(($i > $ht_page_number['page'] - 3) AND (($i < $ht_page_number['page'] + 3) OR (($ht_page_number['page'] <= 3) AND ($i <= 10)))): if($i == $ht_page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                                    <?php else: ?>
                                    <a href="javascript:;" class="ajax_page" page="<?php echo ($i); ?>" dj="1"><?php echo ($i); ?></a><?php endif; ?>
                                <?php else: endif; } ?>
                        <?php if(($ht_page_number['count'] > 6) AND ($ht_page_number['page'] <= $ht_page_number['count'] - 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
                        <?php if($ht_page_number['page'] == $ht_page_number['count'] ): ?><a href="javascript:;">»</a><?php endif; ?>
                        <?php if($ht_page_number['page'] < $ht_page_number['count'] ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($ht_page_number['page']+1); ?>" dj="1">»</a><?php endif; ?>
                    </div>
                    
                    <input type="hidden" value="" class="hidden">
                </li>
            </div>

            <div id="loan">
                <li id="table2">
                    <div class="li_title">贷款类型</div>
                    <div class="check_btn">
                        <!--<form class="form-inline definewidth m10" action="<?php echo U('Product/product_list');?>" method="get">-->
                            <!--条件查询：-->
                            <!--<input type="text" name="name" id="name2" class="abc input-default" placeholder="产品名称/产品代码" value="">&nbsp;&nbsp;-->
                            <!--<button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;-->
                            <button type="button" class="btn btn-success" id="addnew2">添加</button>
                            <input type="hidden" value="2"/>
                        <!--</form>-->
                    </div>
                    <table class="table table-bordered table-hover tab_center definewidth m10">
                        <tr>
                            <th>编号</th>
                            <th>名称</th>
                            <th>编辑</th>
                        </tr>
                        <?php if(is_array($lt_data)): $i = 0; $__LIST__ = $lt_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($i); ?></td>
                                <td><span class="qwer"><?php echo ($vo["name"]); ?></span></td>
                                <td>
                                    <a href="javascript:;" class="save">编辑</a>
                                    <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                                    <input type="hidden" value="2"/>
                                    <span>|</span>
                                    <a href="javascript:;" class="delete" tid="<?php echo ($vo["id"]); ?>" typ="loans_type">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <!--                <div class="inline page">&lt;!&ndash; pull-right&ndash;&gt;
                                        <a href="<?php if($lt_page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('Product/parameter_list',array('page'=>$lt_page_number['page']-1)); endif; ?>">«</a>
                                        <?php if(($lt_page_number['count'] > 10) AND ($lt_page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
                                        <?php $__FOR_START_6860__=1;$__FOR_END_6860__=$lt_page_number['count'];for($i=$__FOR_START_6860__;$i <= $__FOR_END_6860__;$i+=1){ if(($i > $lt_page_number['page'] - 5) AND (($i < $lt_page_number['page'] + 5) OR (($lt_page_number['page'] <= 5) AND ($i <= 10)))): if($i == $lt_page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                                                    <?php else: ?>
                                                    <a href="<?php echo U('Product/parameter_list',array('page'=>$i));?>"><?php echo ($i); ?></a>
                                                    &lt;!&ndash;<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>&ndash;&gt;<?php endif; ?>
                                                <?php else: endif; } ?>
                                        <?php if(($lt_page_number['count'] > 10) AND ($lt_page_number['page'] <= $lt_page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
                                        <a href="<?php if($lt_page_number['page'] == $lt_page_number['count'] ): ?>javascript:;<?php else: echo U('Product/parameter_list',array('page'=>$lt_page_number['page']+1)); endif; ?>">»</a>
                                    </div>-->
                    <div class="inline page"><!-- pull-right-->
                        <?php if($lt_page_number['page'] == 1 ): ?><a href="javascript:;">«</a><?php endif; ?>
                        <?php if($lt_page_number['page'] > 1 ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($lt_page_number['page']-1); ?>" s_id="<?php echo ($id); ?>" dj="2">«</a><?php endif; ?>
                        <!--<a href="<?php if($t_page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('Product/area_list_page',array('page'=>$t_page_number['page']-1,'id'=>$id,'dj'=>'1')); endif; ?>">«</a>-->
                        <?php if(($lt_page_number['count'] > 10) AND ($lt_page_number['page'] > 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
                        <?php $__FOR_START_16661__=1;$__FOR_END_16661__=$lt_page_number['count'];for($i=$__FOR_START_16661__;$i <= $__FOR_END_16661__;$i+=1){ if(($i > $lt_page_number['page'] - 3) AND (($i < $lt_page_number['page'] + 3) OR (($lt_page_number['page'] <= 3) AND ($i <= 10)))): if($i == $lt_page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                                    <?php else: ?>
                                    <a href="javascript:;" class="ajax_page" page="<?php echo ($i); ?>" s_id="<?php echo ($id); ?>" dj="2"><?php echo ($i); ?></a>
                                    <!--<a href="<?php echo U('Product/area_list_page',array('page'=>$i,'id'=>$id,'dj'=>'1'));?>"><?php echo ($i); ?></a>-->
                                    <!--<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>--><?php endif; ?>
                                <?php else: endif; } ?>
                        <?php if($lt_page_number['page'] == $lt_page_number['count'] ): ?><a href="javascript:;">»</a><?php endif; ?>
                        <?php if($lt_page_number['page'] < $lt_page_number['count'] ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($lt_page_number['page']+1); ?>" dj="2">»</a><?php endif; ?>

                        <!--<a href="<?php if($t_page_number['page'] == $t_page_number['count'] ): ?>javascript:;<?php else: echo U('Product/area_list_page',array('page'=>$t_page_number['page']+1,'id'=>$id,'dj'=>'1')); endif; ?>">»</a>-->
                    </div>
                    <!--<input type="hidden" value="" class="hidden">-->
                </li>
            </div>

            <div id="repayments">
                <li>
                    <div class="li_title">还款方式</div>
                    <div class="check_btn">
                        <!--<form class="form-inline definewidth m10" action="<?php echo U('Product/product_list');?>" method="get">-->
                            <!--条件查询：-->
                            <!--<input type="text" name="name" id="name3" class="abc input-default" placeholder="产品名称/产品代码" value="">&nbsp;&nbsp;-->
                            <!--<button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;-->
                            <button type="button" class="btn btn-success" id="addnew3">添加</button>
                            <input type="hidden" value="3"/>
                        <!--</form>-->
                    </div>
                    <table class="table table-bordered table-hover tab_center definewidth m10">
                        <tr>
                            <th>编号</th>
                            <th>名称</th>
                            <th>编辑</th>
                        </tr>
                        <?php if(is_array($rp_data)): $i = 0; $__LIST__ = $rp_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($i); ?></td>
                                <td><span class="qwer"><?php echo ($vo["name"]); ?></span></td>
                                <td>
                                    <a href="javascript:;" class="save">编辑</a>
                                    <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                                    <input type="hidden" value="3"/>
                                    <span>|</span>
                                    <a href="javascript:;" class="delete" tid="<?php echo ($vo["id"]); ?>" typ="repayment_pattern">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="inline page"><!-- pull-right-->
                        <?php if($rp_page_number['page'] == 1 ): ?><a href="javascript:;">«</a><?php endif; ?>
                        <?php if($rp_page_number['page'] != 1 ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($rp_page_number['page']-1); ?>" dj="3">«</a><?php endif; ?>
                        <?php if(($rp_page_number['count'] > 10) AND ($rp_page_number['page'] > 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
                        <?php $__FOR_START_19498__=1;$__FOR_END_19498__=$rp_page_number['count'];for($i=$__FOR_START_19498__;$i <= $__FOR_END_19498__;$i+=1){ if(($i > $rp_page_number['page'] - 3) AND (($i < $rp_page_number['page'] + 3) OR (($rp_page_number['page'] <= 3) AND ($i <= 10)))): if($i == $rp_page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                                    <?php else: ?>
                                    <a href="javascript:;" class="ajax_page" page="<?php echo ($i); ?>" dj="3"><?php echo ($i); ?></a><?php endif; ?>
                                <?php else: endif; } ?>
                        <?php if(($rp_page_number['count'] > 6) AND ($rp_page_number['page'] <= $rp_page_number['count'] - 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
                        <?php if($rp_page_number['page'] == $rp_page_number['count'] ): ?><a href="javascript:;">»</a><?php endif; ?>
                        <?php if($rp_page_number['page'] < $rp_page_number['count'] ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($rp_page_number['page']+1); ?>" dj="3">»</a><?php endif; ?>
                    </div>
                    <!--<input type="hidden" value="" class="hidden">-->
                </li>
            </div>
            <div id="usury">
                <li>
                    <div class="li_title">贷款期限</div>
                    <div class="check_btn">
                        <!--<form class="form-inline definewidth m10" action="<?php echo U('Product/parameter_list');?>" method="get">-->
                        <!--条件查询：-->
                        <!--<input type="text" name="name" id="name" class="abc input-default" placeholder="产品名称/产品代码" value="">&nbsp;&nbsp;-->
                        <!--<button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;-->
                        <button type="button" class="btn btn-success" id="addnew4">添加</button>
                        <input type="hidden" value="4"/>
                        <!--</form>-->
                    </div>
                    <table class="table table-bordered table-hover tab_center definewidth m10">
                        <tr>
                            <th>编号</th>
                            <th>月份</th>
                            <th>编辑</th>
                        </tr>
                        <?php if(is_array($mt_data)): $i = 0; $__LIST__ = $mt_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($i); ?></td>
                                <td>
                                    <?php if($vo['month'] > 12): ?><span class="qwer"><?php echo ($vo['month']/12); ?></span>年<?php else: ?><span class="qwer"><?php echo ($vo["month"]); ?></span>个月<?php endif; ?>
                                </td>
                                <td>
                                    <a href="javascript:;" class="save">编辑</a>
                                    <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                                    <input type="hidden" value="4"/>
                                    <span>|</span>
                                    <a href="javascript:;" class="delete" tid="<?php echo ($vo["id"]); ?>" typ="month">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="inline page"><!-- pull-right-->
                        <?php if($mt_page_number['page'] == 1 ): ?><a href="javascript:;">«</a><?php endif; ?>
                        <?php if($mt_page_number['page'] != 1 ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($mt_page_number['page']-1); ?>" dj="4">«</a><?php endif; ?>
                        <?php if(($mt_page_number['count'] > 10) AND ($mt_page_number['page'] > 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
                        <?php $__FOR_START_27163__=1;$__FOR_END_27163__=$mt_page_number['count'];for($i=$__FOR_START_27163__;$i <= $__FOR_END_27163__;$i+=1){ if(($i > $mt_page_number['page'] - 3) AND (($i < $mt_page_number['page'] + 3) OR (($mt_page_number['page'] <= 3) AND ($i <= 10)))): if($i == $mt_page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                                    <?php else: ?>
                                    <a href="javascript:;" class="ajax_page" page="<?php echo ($i); ?>" dj="4"><?php echo ($i); ?></a><?php endif; ?>
                                <?php else: endif; } ?>
                        <?php if(($mt_page_number['count'] > 6) AND ($mt_page_number['page'] <= $mt_page_number['count'] - 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
                        <?php if($mt_page_number['page'] == $mt_page_number['count'] ): ?><a href="javascript:;">»</a><?php endif; ?>
                        <?php if($mt_page_number['page'] < $mt_page_number['count'] ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($mt_page_number['page']+1); ?>" dj="4">»</a><?php endif; ?>
                    </div>

                    <input type="hidden" value="" class="hidden">
                </li>
            </div>
            <!--<div id="source">
                <li>
                    <div class="li_title">金融机构</div>
                    <div class="check_btn">
                        &lt;!&ndash;<form class="form-inline definewidth m10" action="<?php echo U('Product/product_list');?>" method="get">&ndash;&gt;
                        &lt;!&ndash;条件查询：&ndash;&gt;
                        &lt;!&ndash;<input type="text" name="name" id="name3" class="abc input-default" placeholder="产品名称/产品代码" value="">&nbsp;&nbsp;&ndash;&gt;
                        &lt;!&ndash;<button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;&ndash;&gt;
                        <button type="button" class="btn btn-success" id="addnew4">添加</button>
                        <input type="hidden" value="4"/>
                        &lt;!&ndash;</form>&ndash;&gt;
                    </div>
                    <table class="table table-bordered table-hover tab_center definewidth m10">
                        <tr>
                            <th>编号</th>
                            <th>名称</th>
                            <th>编辑</th>
                        </tr>
                        <?php if(is_array($so_data)): $i = 0; $__LIST__ = $so_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($i); ?></td>
                                <td><?php echo ($vo["name"]); ?></td>
                                <td>
                                    <a href="javascript:;" class="save">编辑</a>
                                    <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                                    <input type="hidden" value="4"/>
                                    <span>|</span>
                                    <a href="javascript:;" class="delete" tid="<?php echo ($vo["id"]); ?>" typ="repayment_pattern">删除</a>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                    <div class="inline page">&lt;!&ndash; pull-right&ndash;&gt;
                        <?php if($so_page_number['page'] == 1 ): ?><a href="javascript:;">«</a><?php endif; ?>
                        <?php if($so_page_number['page'] != 1 ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($so_page_number['page']-1); ?>" dj="4">«</a><?php endif; ?>
                        <?php if(($so_page_number['count'] > 10) AND ($so_page_number['page'] > 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
                        <?php $__FOR_START_6072__=1;$__FOR_END_6072__=$so_page_number['count'];for($i=$__FOR_START_6072__;$i <= $__FOR_END_6072__;$i+=1){ if(($i > $so_page_number['page'] - 3) AND (($i < $so_page_number['page'] + 3) OR (($so_page_number['page'] <= 3) AND ($i <= 10)))): if($i == $so_page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                                    <?php else: ?>
                                    <a href="javascript:;" class="ajax_page" page="<?php echo ($i); ?>" dj="4"><?php echo ($i); ?></a><?php endif; ?>
                                <?php else: endif; } ?>
                        <?php if(($so_page_number['count'] > 6) AND ($so_page_number['page'] <= $so_page_number['count'] - 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
                        <?php if($so_page_number['page'] == $so_page_number['count'] ): ?><a href="javascript:;">»</a><?php endif; ?>
                        <?php if($so_page_number['page'] < $so_page_number['count'] ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($so_page_number['page']+1); ?>" dj="4">»</a><?php endif; ?>
                    </div>
                    &lt;!&ndash;<input type="hidden" value="" class="hidden">&ndash;&gt;
                </li>
            </div>-->
        </ul>

    </div>
</div>
<script>
    $('.hidden').on('change',function(){
           var msg=$(this).val();
           var arr=msg.split(',');
           console.log(msg,1);
           console.log(arr);
           /*修改地址*/
//           $.post("http://cesi3.0.com/index.php/Admin/Product/parameter_list_page.html",{dj:arr[0],page:arr[1]},function(res){
           $.post("<?php echo U('Admin/Product/parameter_list_page');?>",{dj:arr[0],page:arr[1]},function(res){
               if(arr[0] === '1'){
                   $("#architecture").html('');
                   $("#architecture").html(res);
               }else if(arr[0] === '2'){
                   //$("#loan").html('');
                   $("#loan").html(res);
               }else if(arr[0] === '3'){
                   //$("#repayments").html('');
                   $("#repayments").html(res);
               }else if(arr[0] === '4'){
                   //$("#repayments").html('');
                   $("#usury").html(res);
               }
           });
       })
    function edit_list(type){
        if(type == 1){
            var content = ["<?php echo U('Admin/Product/wechat_update',array('type'=>'1','page'=>$ht_page_number['page']));?>",'no'];
        }else if(type == 2){
            var content = ["<?php echo U('Admin/Product/wechat_update',array('type'=>'2','page'=>$ht_page_number['page']));?>",'no'];
        }else if(type == 3){
            var content = ["<?php echo U('Admin/Product/wechat_update',array('type'=>'3','page'=>$ht_page_number['page']));?>",'no'];
        }else if(type == 4){
            var content = ["<?php echo U('Admin/Product/wechat_update',array('type'=>'4','page'=>$ht_page_number['page']));?>",'no'];
        }
        layer.open({
            type: 2,
            title: '添加',
            area: ['300px', '200px'],
            shade: 0.8,
            closeBtn: 0,
            shadeClose: true,
            //content: ["<?php echo U('Admin/Product/wechat_update/type/"+type+"');?>",'no']
           content: content
//           content: ["<?php echo U('Admin/Product/wechat_update',array('type'=>'1','page'=>$ht_page_number['page']));?>",'no']
            /*end: function () {
                location.reload();
            }*/

        })
    }
    $(function(){
        $(".btn-success").unbind();
        $(".btn-success").click(function(){
            var type= $(this).next().val();
                edit_list(type);
        })

    })

    $(function(){
        $('.ajax_page').click(function(){
            var page = $(this).attr('page');
            var dj = $(this).attr('dj');
            $.post("<?php echo U('Admin/Product/parameter_list_page');?>",{page:page,dj:dj},function(res){
                if(dj === '1'){
                    $("#architecture").html(res);
                }else if(dj === '2'){
                    $("#loan").html(res);
                }else if(dj === '3'){
                    $("#repayments").html(res);
                }else if(dj === '4'){
                    $("#usury").html(res);
                }

            });
        });
    });

    $(function(){
        $(document).on('click','.delete',function(){
            var a = $(this);
            var tid = a.attr('tid');
            var typ = a.attr('typ');
            var text = a.parent().parent().find('td').eq(1).text();
            layer.confirm('您确定要删除('+text+')吗？', {
                btn: ['是','否'] //按钮
            }, function(){
                $.post("<?php echo U('Product/parameter_delete');?>",{tid:tid,typ:typ},function(res){
                    if(res.status === 1){
                        layer.msg(res.info,{icon:1,time:1000});
//                        alert(res.info);
                        a.parent().parent().remove();
                    }else{
                        layer.msg(res.info,{icon:0,time:1000});
//                        alert(res.info);
                    }
                });
            }, function(){
            });
        });
        });
//    });
    function save(obj){
        if($(obj).parent().prev().find('input').attr('bol')==="true"){
            return false;
        }else{
            var type = $(obj).next().next().val();
            var value = $(obj).parent().prev().children().text();
//                alert(value);

//            console.log();
            var id= $(obj).next().val();
            $(obj).parent().prev().children().html('<input type="text" name="name" bol="true" value='+value+' style="width: 100px;text-align:center;" class="focal" />');
            $(".focal").focus();
            $(".focal").blur(function(){
                var name = $(this).val();
                var year = $(this).parent().parent().text();
                var _this=$(this);
//                alert(name);
//                alert(type);
//                alert(value);
//                alert(year);
                console.log(year);
                if(name != ''){
                    if(type == 4){
                        var numbe=Number(name);

                        if(numbe>0) {
                            if (numbe >= 12) {
                                if (numbe % 12 != 0) {
                                    alert("请输入正确数字,超过12个月以12的倍数填写！");
                                    _this.parent().text(value);
                                    return false;
                                }
                            }
                        }else{
                            alert("请输入正确整数");
                            _this.parent().text(value);
                            return false;
                        }
                    }
                    layer.confirm('您确定修改吗？', {
                        btn: ['是','否'] //按钮
                    }, function(){
                        $.post("<?php echo U('Admin/Product/uplode');?>",{name:name,id:id,type:type,year:year},function(res) {
                            if(res['status']==1){
                                layer.msg(res['msg'],{icon:1,time:1000});
                                var name2 = _this.val();
                                _this.parent().text(name2);
                                $(this).parent().prev().find('input').attr('bol','false');
                                //                                    location.reload();
                            }else if(res['status']==2){
                                layer.msg(res['msg'],{icon:0,time:1000});
                                _this.parent().text(value);
                                _this.parent().prev().find('input').attr('bol','false');
                            }else{
                                layer.msg(res['msg'],{icon:0,time:1000});
                                _this.parent().text(name);
                                _this.parent().prev().find('input').attr('bol','false');
                            }
                        },'json');
                    }, function() {
                        _this.parent().text(value);
                    });
                }else{
                    layer.msg('不能设置为空',{icon:0,time:1000});
                    _this.parent().text(value);
                }
            });
        }
    }
    $(window).click(function(e){
        var obj= e.target;
        console.log(obj);
        if(obj.className=='save'){

            save(obj);


        }
    })


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