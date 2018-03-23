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


<!--顶部-->
<form class="form-inline definewidth m20" action="<?php echo U('Credit/credit_check_order_list');?>" method="post" style="Float:left;margin: 0px 0px 10px 0px;padding-left: 30px">
    <input type="text" name="name" id="name" class="abc input-default" placeholder="申请书/授权书编码" value="">&nbsp;&nbsp;
    <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp; <!--<a href="<?php echo U('Credit/product_redact');?>">--><!--<button type="button" class="btn btn-success" id="addnew">申请授权书及申请书</button>--><!--</a>-->
</form>
<form action="<?php echo U('Credit/credit_check_order_list');?>" method="post" id="type" style="Float:right;margin: 20px 0px 0px 0px;">
    <span style="position:absolute;right:2%;">
      <select name="errmsg" typ="type" val="<?php echo ($page_number['errmsg']); ?>" style="width: 70%; min-width: 120px;" id="sgin_123">
          <option value="" <?php if($page_number['errmsg'] == 0 ): ?>selected="selected"<?php endif; ?> >全&#12288;&#12288;部</option>
          <option value="提交成功" <?php if($page_number['errmsg'] == '提交成功' ): ?>selected="selected"<?php endif; ?> >提交成功</option>
          <option value="查询成功" <?php if($page_number['errmsg'] == '查询成功'): ?>selected="selected"<?php endif; ?> >查询成功</option>
          <option value="回退" <?php if($page_number['errmsg'] == '回退' ): ?>selected="selected"<?php endif; ?> >回&#12288;&#12288;退</option>
          <option value="初审完成" <?php if($page_number['errmsg'] == '初审完成' ): ?>selected="selected"<?php endif; ?> >初审完成</option>
      </select>
<!--      <input id="sign_up_all" type="radio" checked="checked" name="1" value="2" />全部订单
      <input id="sign_up" type="radio" name="1" value="1" />签约订单
      <input id="signing" type="radio" name="1" value="0" />非签约订单-->
    </span>
</form>
<script>
    $(function(){
        $("#sgin_123").on('change',function(){
//            var url = "<?php echo U('User/wechat_list');?>";
            var url = $('#type').attr('action');

            var split = url.split('/');
            var sp_le = split.length - 1;
            var act = split[sp_le].split('.');
            var type_val = $(this).val();
            var src = '';
            for(var i = 0;i<=sp_le;i++){
                if(i===sp_le){
                    src += "/"+ act[0] + "/type/" + type_val + ".html";
                }else{
                    if(split[i] != ''){
                        src += '/'+split[i];
                    }
                }
            }
//            console.log(src);
//            console.log(split);
//            console.log(split.length);
            $('#type').attr("action",src);
            $('#type').submit();
        })
    })
</script>





<!--主体-->
<table class="table table-bordered table-hover tab_center definewidth m10">
    <tr>
        <th>序号</th>
        <th>订单编号</th>
        <th>姓名</th>
        <th>授权书编号</th>
        <th>PDF结果</th>
        <th>备注</th>
        <th>当前状态</th>
        <!--<th>来源</th>-->
        <!--<th>类型</th>-->
        <!--<th>城市</th>-->
        <!--<th>金额下限</th>-->
        <!--<th>金额上限</th>-->
        <th>建单时间</th>
        <th>最后更新时间</th>
        <!--<th>上次登录时间</th>-->
        <!--<th>上次登录IP</th>-->
        <!--<th>操作</th>-->
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($i); ?></td>
            <td><?php echo ($vo["orderno"]); ?></td>
            <td><?php echo ($vo["name"]); ?></td>
            <td><?php echo ($vo["authorize_num"]); ?></td>
            <td>
                <?php if($vo['pdfurl'] != ''): ?><a href="<?php echo ($vo["pdfurl"]); ?>" target="_blank" download="<?php echo ($vo["name"]); ?>_征信查询结果.<?php echo ($vo["apply"]); ?>"><button type="button" class="btn btn-info btn-mini">下载</button></a><?php endif; ?>
            </td>
            <!--<td><a href="<?php echo ($vo["authorizeurl"]); ?>" download="授权书<?php echo ($vo["acode"]); ?>.<?php echo ($vo["authorize"]); ?>"><button type="button" class="btn btn-info btn-mini">下载</button></a></td>-->
            <td><?php echo ($vo["ly"]); ?></td>
            <td><?php echo ($vo["errmsg"]); ?></td>
            <td><?php echo (date('Y/m/d H:i:s',$vo["time"])); ?></td>
            <td><?php echo (date('Y/m/d H:i:s',$vo["up_time"])); ?></td>
            <!--<td><?php echo ($vo["source"]); ?></td>-->
            <!--<td><?php echo ($vo["ptname"]); ?></td>-->
            <!--<td><?php echo ($vo["city"]); ?></td>-->
            <!--<td><?php echo ($vo["min_money"]); ?></td>-->
            <!--<td><?php echo ($vo["max_money"]); ?></td>-->
            <!--<td><?php echo ($vo["add_time"]); ?></td>-->
            <!--<td>-->
            <!--</td>-->
            <!--<td><?php echo (date('Y/m/d H:i:s',$vo["time"])); ?></td>-->
            <!--<td><?php echo ($vo["enter_ip"]); ?></td>-->
            <!--<td>-->
            <!--<a href="<?php echo U('Product/product_redact',array('id'=>$vo['id']));?>">修改</a> <span style="font-size:16px;">|</span>-->
            <!--<a href="#" onclick="return menu_delete('<?php echo ($vo["delete"]); ?>','<?php echo ($vo["menu"]); ?>')">删除</a>-->
            <!--</td>-->
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>




<!--页码-->
<div class="inline page"><!-- pull-right-->
    <a href="<?php if($page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('Credit/credit_check_order_list',array('page'=>$page_number['page']-1,'errmsg'=>$page_number['errmsg'])); endif; ?>">«</a>
    <?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
    <?php $__FOR_START_30768__=1;$__FOR_END_30768__=$page_number['count'];for($i=$__FOR_START_30768__;$i <= $__FOR_END_30768__;$i+=1){ if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): if($i == $page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                <?php else: ?>
                <a href="<?php echo U('Credit/credit_check_order_list',array('page'=>$i,'errmsg'=>$page_number['errmsg']));?>"><?php echo ($i); ?></a>
                <!--<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>--><?php endif; ?>
            <?php else: endif; } ?>
    <?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
    <a href="<?php if($page_number['page'] == $page_number['count'] ): ?>javascript:;<?php else: echo U('Credit/credit_check_order_list',array('page'=>$page_number['page']+1,'errmsg'=>$page_number['errmsg'])); endif; ?>">»</a>

</div>

<!--获取授权书弹框-->
<div class="tooltips" id="tooltips">
    <div class="tlp_tle" id="tlp_tle">申请授权书及申请书<span>×</span></div>
    <div class="tlp_text">
        <div>
            <span>请输入您要获取的数量</span><br>
            <input type="text" pattern="^[0-9]{1,2}$" onkeypress="return (/[\d]/.test(String.fromCharCode(event.keyCode)) && $(this).val().length < 2)"  name="num"><br>
            <button type="button" class="btn btn-success" id="num_btn_submit">提&nbsp;&nbsp;&nbsp;交</button>
        </div>
    </div>
</div>


<script>
    $(function(){

        $('#addnew').click(function(){
            $('#tooltips').show();
        });

        $('#num_btn_submit').click(function(){
            var num = $('#tooltips>.tlp_text input[name="num"]').val();
//      console.log(num,num < 100,num > 0,num+'1');
            if(num != '' && num > 0){
                $.post("<?php echo U('Credit/accredit');?>",{num:num},function(data){

                    if(data.status === 1){

                        console.log(data.result);


                    }else{
                        console.log(data);
                        alert(data.info);
//            if(data.code === 32001){
//              console.log(data);
////              alert(data.info_code);
//            }

                    }




                });




            }







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