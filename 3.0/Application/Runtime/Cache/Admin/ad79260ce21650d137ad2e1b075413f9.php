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
<script type="text/javascript" src="/Public/layer/layer.js"></script>
<style>
    .cate{
        line-height: 40px;
    }
    .cate-success{
        color: #ffffff;
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        background-color: #4169E1;
        *background-color: #4169E1;
        background-image: -moz-linear-gradient(top, #4169E1, #4169E1);
        background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#4169E1), to(#4169E1));
        background-image: -webkit-linear-gradient(top, #4169E1, #4169E1);
        background-image: -o-linear-gradient(top, #4169E1, #4169E1);
        background-image: linear-gradient(to bottom, #4169E1, #4169E1);
        background-repeat: repeat-x;
        border-color: #4169E1 #4169E1 #4169E1;
        border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#4169E1', endColorstr='#4169E1', GradientType=0);
        filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
    }
    .li_title{
        text-align:center;
    }

</style>
<div class="container" style="min-width: 1290px;">
    <div class="content">
        <ul class="expmenu">
                <li style="float: left;width: 100%;margin: 0px;">
                    <?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span class="cate">
                        <button type="button" style="width: 68px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap"  class="btn btn-primary" dj="<?php echo ($vo["grade"]); ?>" yiji="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></button>
                    </span>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
                </li>
        </ul>
        <div id="dj1">
               <!-- <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="li_title" style="margin: 0px -12px 20px -12px;text-align:center;" text-align=""><?php echo ($vo["name"]); ?>
                        <div style="float: right;"id="boot_up">
                        <?php if($vo["forbidden"] == 1): ?><a href="javascript:;">已启用</a>
                            <?php else: ?>
                            <a href="javascript:;">已禁用</a><?php endif; ?>
                        </div>
                        <input type="hidden" value="<?php echo ($vo["forbidden"]); ?>"/>
                        <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                <table class="table table-bordered table-hover tab_center definewidth m10" >
                    <tr>
                        <th>编号</th>
                        <th>名称</th>
                        <th>编辑</th>
                        <th>禁用</th>
                    </tr>
                    <?php if(is_array($t_data)): $i = 0; $__LIST__ = $t_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                            <td><?php echo ($i); ?></td>
                            <td><?php echo ($vo["name"]); ?></td>
                            <td>
                                <a href="javascript:;" class="city_save">编辑</a>
                                <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                            </td>
                            <td>
                                <div class="booo_3">
                                    <?php if($vo["forbidden"] == 1): ?><a href="javascript:;">已启用</a>
                                        <?php else: ?><a href="javascript:;">已禁用</a><?php endif; ?>
                                </div>
                                <input type="hidden" value="<?php echo ($vo["forbidden"]); ?>"/>
                                <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                            </td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </table>
                <div class="inline page">&lt;!&ndash; pull-right&ndash;&gt;
                <a href="<?php if($t_page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('Product/area_list',array('page'=>$t_page_number['page']-1,'id'=>$id,'dj'=>'1')); endif; ?>">«</a>
                <?php if(($t_page_number['count'] > 10) AND ($t_page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
                <?php $__FOR_START_128__=1;$__FOR_END_128__=$t_page_number['count'];for($i=$__FOR_START_128__;$i <= $__FOR_END_128__;$i+=1){ if(($i > $t_page_number['page'] - 5) AND (($i < $t_page_number['page'] + 5) OR (($t_page_number['page'] <= 5) AND ($i <= 10)))): if($i == $t_page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                            <?php else: ?>
                            <a href="<?php echo U('Product/area_list',array('page'=>$i,'id'=>$id,'dj'=>'1'));?>"><?php echo ($i); ?></a>
                            &lt;!&ndash;<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>&ndash;&gt;<?php endif; ?>
                        <?php else: endif; } ?>
                <?php if(($t_page_number['count'] > 10) AND ($t_page_number['page'] <= $t_page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
                <a href="<?php if($t_page_number['page'] == $t_page_number['count'] ): ?>javascript:;<?php else: echo U('Product/area_list',array('page'=>$t_page_number['page']+1,'id'=>$id,'dj'=>'1')); endif; ?>">»</a>
            </div>-->
        </div>
        <div id="dj2">
        </div>
        <input type="hidden" value="" id="hidden">
    </div>
</div>

<script>
    $(function(){

            /*$('.booo_3').click(function(){
                var forbidden = $(this).next().val();
                var id = $(this).next().next().val();
                $.post("<?php echo U('Admin/Product/boot_up');?>",{forbidden:forbidden,id:id},function(res){
                    if(res['status']==1){
                        layer.msg(res['info']);
                    }else{
                        layer.msg(res['info']);
                    }
                },'json');
            })*/


        $('.btn-primary').click(function(){
//            var id = $(this).next().val();
            var dj = $(this).attr('dj');
            var yiji = $(this).attr('yiji');
            $.post("<?php echo U('Admin/Product/area_list_page');?>",{id:yiji,dj:dj},function(res){
                $('#dj1').html('');
                $('#dj2').html('');
                if(dj === '1'){
                    $("#dj1").html(res);
                }else{
                    $("#dj2").html(res);
                }
            });

        })
        $('#hidden').on('change',function(){
            var msg=$(this).val();
            var arr=msg.split(',');
            /*修改地址*/
//            $.post("http://cesi3.0.com/index.php/Admin/Product/area_list_page2.html",{id:arr[0],dj:arr[1],page:arr[2]},function(data){
            $.post("<?php echo U('Admin/Product/area_list_page2');?>",{id:arr[0],dj:arr[1],page:arr[2]},function(data){
                if(arr[1] === '1'){
                    $('#dj1').html('');
                    $("#dj1").html(data);
                }else{
                    $('#dj2').html('');
                    $("#dj2").html(data);
                }
            });
        })


/*        $('#boot_up').click(function(){
            var forbidden = $(this).next().val();
            var id = $(this).next().next().val();
            $.post("<?php echo U('Admin/Product/all_boot_up');?>",{forbidden:forbidden,id:id},function(res){
                if(res['status']==1){
                    layer.msg(res['info']);
                    location.reload();
                }else{
                    layer.msg(res['info']);
                }
            },'json');
        })*/

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