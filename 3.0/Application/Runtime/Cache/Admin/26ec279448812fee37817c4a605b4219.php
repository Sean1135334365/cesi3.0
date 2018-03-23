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
<table class="table table-hover tab_center definewidth m10">
  <tr>
    <td width="70%" class="td_left" style="border: none;">
      <form class="form-inline m20" action="<?php echo U('Order/wx_apply');?>" method="post">
        <input type="text" name="name" id="name" class="abc input-default" placeholder="订单号/金额/认证手机" value="">&nbsp;&nbsp;
        <button type="submit" class="btn btn-primary">查询</button>
        <!--<button type="submit" class="btn btn-primary" id="enquiries">查询</button>-->
        <!--  <span style="position:absolute;right:2%;">
              <select name="1" val="" style="width: 70%; min-width: 120px;" id="sgin_123">
                  <option value="2" >全部订单</option>
                  <option value="1" >签约订单</option>
                  <option value="0" >非签约订单</option>
              </select>
        &lt;!&ndash;      <input id="sign_up_all" type="radio" checked="checked" name="1" value="2" />全部订单
              <input id="sign_up" type="radio" name="1" value="1" />签约订单
              <input id="signing" type="radio" name="1" value="0" />非签约订单&ndash;&gt;
          </span>-->

      </form>
    </td>
    <td class="td_right" style="border: none;">
      <form class="form-inline m20" action="<?php echo U('Order/wx_apply');?>" method="post" id="type">
    <span style="position:absolute;right:2%;">
      <select name="" typ="type" val="<?php echo ($page_number['type']); ?>" style="width: 70%; min-width: 74px;" id="sgin_123">
        <option value="0" <?php if($page_number['type'] == 0 ): ?>selected="selected"<?php endif; ?> >全&#12288;部</option>
        <option value="1" <?php if($page_number['type'] == 1 ): ?>selected="selected"<?php endif; ?> >签&#12288;约</option>
        <option value="2" <?php if($page_number['type'] == 2 ): ?>selected="selected"<?php endif; ?> >非签约</option>
      </select>
      <!--      <input id="sign_up_all" type="radio" checked="checked" name="1" value="2" />全部订单
            <input id="sign_up" type="radio" name="1" value="1" />签约订单
            <input id="signing" type="radio" name="1" value="0" />非签约订单-->
    </span>
      </form>
    </td>
  </tr>


</table>



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

<div id="wx_sign_up">
<!--主体-->
<table class="table table-bordered table-hover tab_center definewidth m10">
  <!--<tr>
    <th>编号</th>
    <th>图片</th>
    <th>代码</th>
    <th>名称</th>
    <th>来源</th>
    <th>类型</th>
    <th>城市</th>
    <th>金额下限</th>
    <th>金额上限</th>
    <th>添加时间</th>
    <th>产品状态</th>
    &lt;!&ndash;<th>上次登录时间</th>&ndash;&gt;
    &lt;!&ndash;<th>上次登录IP</th>&ndash;&gt;
    <th>操作</th>
  </tr>-->
  <tr>
    <!--<th class="center">选择</th>-->
    <th style="width:5%;">编号</th>
    <th style="width:10%;">订单编号</th>
    <th style="width:5%;">签约号</th>
    <th style="width:8%;">认证手机</th>
    <th style="width:10%;">申请微信</th>
    <th style="width:7%;">申请金额</th>
    <th style="width:7%;">银行类型</th>
    <th style="width:8%;">贷款期限</th>
    <th style="width:8%;">产品名称</th>
    <th style="width:13%;">申请时间</th>
    <th style="width:10%;">状态</th>
    <!--<th></th>-->
    <!--<th>公证日期</th>-->
    <!--<th>出借人</th>-->
    <!--<th>权利人数量</th>-->
    <!--<th>户口</th>-->
    <!--<th>备房</th>-->
    <!--<th>图片</th>-->
    <!--<th>发布时间</th>-->
    <!--<th>授权</th>-->
    <!--<th>状态</th>-->
    <th style="width:15%;">操作</th>
  </tr>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($i); ?></td>
      <td><?php echo ($vo["order_number"]); ?></td>
      <td><?php echo ($vo["channel"]); ?></td>
      <td><?php echo ($vo["mobile"]); ?></td>
      <td><?php echo ($vo["nickname"]); ?></td>
      <td><?php echo ($vo["loanamount"]); ?></td>
      <td>
          <?php if($vo["banks"] == 1 ): ?>银行类<?php endif; ?>
          <?php if($vo["banks"] == 0 ): ?>非银类<?php endif; ?>
      </td>
      <td><?php echo ($vo["number"]); ?></td>
      <td><?php echo ($vo["name"]); ?></td>
      <td><?php echo (date("Y-m-d H:i:s",$vo["wx_time"])); ?></td>
      <td id="oid">
          <select name="vo.wx_state" val="<?php echo ($vo["wx_state"]); ?>" aid="<?php echo ($vo["id"]); ?>" style="width: 70%; min-width: 80px;">
              <option value="">请选择</option>
              <option value="0" <?php if($vo["wx_state"] == 0): ?>selected="selected"<?php endif; ?> >已提交</option>
              <option value="1" <?php if($vo["wx_state"] == 1 ): ?>selected="selected"<?php endif; ?> >审核中</option>
              <option value="7" <?php if($vo["wx_state"] == 7 ): ?>selected="selected"<?php endif; ?> >已进件</option>
              <option value="3" <?php if($vo["wx_state"] == 3 ): ?>selected="selected"<?php endif; ?> >未通过</option>
              <option value="2" <?php if($vo["wx_state"] == 2 ): ?>selected="selected"<?php endif; ?> >审核通过</option>
              <option value="6" <?php if($vo["wx_state"] == 6 ): ?>selected="selected"<?php endif; ?> >待放款</option>
              <option value="4" <?php if($vo["wx_state"] == 4 ): ?>selected="selected"<?php endif; ?> >完成放款</option>
              <option value="5" <?php if($vo["wx_state"] == 5 ): ?>selected="selected"<?php endif; ?> >结清</option>
              <option value="8" <?php if($vo["wx_state"] == 8 ): ?>selected="selected"<?php endif; ?> >撤单</option>
          </select>
          <!--<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>-->
        <!--<?php switch($vo["wx_state"]): case "1": ?>订单已提交<?php break;?>
          <?php case "2": ?>审核已通过<?php break;?>
          <?php case "3": ?>审核未通过<?php break;?>
          <?php case "4": ?>已放款<?php break;?>
          <?php case "5": ?>已结清<?php break;?>
          <?php case "6": ?>待放款<?php break;?>
          <?php default: ?>default<?php endswitch;?>-->
      </td>



     <!-- <td><img src="/Public<?php echo ($vo["img_url"]); ?>" style="width:50px;cursor:pointer;"></td>
      <td><?php echo ($vo["code"]); ?></td>
      <td><?php echo ($vo["name"]); ?></td>
      <td><?php echo ($vo["source"]); ?></td>
      <td><?php echo ($vo["ptname"]); ?></td>
      <td><?php echo ($vo["city"]); ?></td>
      <td><?php echo ($vo["min_money"]); ?></td>
      <td><?php echo ($vo["max_money"]); ?></td>
      <td><?php echo ($vo["add_time"]); ?></td>
      <td><?php echo ($vo["state"]); ?></td>-->
      <!--<td><?php echo ($vo["enter_time"]); ?></td>-->
      <!--<td><?php echo ($vo["enter_ip"]); ?></td>-->
      <td>
        <a href="<?php echo U('Order/wx_redact',array('id'=>$vo['id']));?>">编辑</a> <!--<span style="font-size:16px;">|</span>
        <a href="#" onclick="return menu_delete('<?php echo ($vo["delete"]); ?>','<?php echo ($vo["menu"]); ?>')">删除</a>-->
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>

<!--

<table class="table" id="clientlist">
  <thead>
  <tr>
    &lt;!&ndash;<th class="center">选择</th>&ndash;&gt;
    <th style="width:5%;">编号</th>
    <th style="width:10%;">订单编号</th>
    <th style="width:10%;">贷款编号</th>
    <th style="width:15%;">申请微信</th>
    <th style="width:10%;">申请金额</th>
    <th style="width:10%;">贷款期限</th>
    <th style="width:10%;">权利人数量</th>
    <th style="width:15%;">申请时间</th>
    <th style="width:10%;">状态</th>
    &lt;!&ndash;<th></th>&ndash;&gt;
    &lt;!&ndash;<th>公证日期</th>&ndash;&gt;
    &lt;!&ndash;<th>出借人</th>&ndash;&gt;
    &lt;!&ndash;<th>权利人数量</th>&ndash;&gt;
    &lt;!&ndash;<th>户口</th>&ndash;&gt;
    &lt;!&ndash;<th>备房</th>&ndash;&gt;
    &lt;!&ndash;<th>图片</th>&ndash;&gt;
    &lt;!&ndash;<th>发布时间</th>&ndash;&gt;
    &lt;!&ndash;<th>授权</th>&ndash;&gt;
    &lt;!&ndash;<th>状态</th>&ndash;&gt;
    <th style="width:5%;">操作</th>
  </tr>
  </thead>
  <tbody>

  <?php
$i = 1; foreach($list as $k=>$v){ ?>
  <tr>
    &lt;!&ndash;<td></td>&ndash;&gt;
    <td><?php echo $i; ?></td>
    <td><?php echo $v['order_number']; ?></td>
    <td><?php echo $v['all_doc_number']; ?></td>
    <td><?php echo $v['wxname']; ?></td>
    <td><?php echo $v['loanamount']; ?></td>
    <td><?php echo $v['number']; ?></td>
    <td><?php echo $v['p_power_num']; ?></td>
    <td><?php echo date('Y-m-d H:i:s', $v['wx_time']); ?></td>
    <td>
      <?php
 ?>
      <select name="wx_state" val="<?php echo $v['wx_state']; ?>" aid="<?php echo $v['id'] ?>">
        <option value="">请选择</option>
        <option value="0" <?php echo $v['wx_state']==0?'selected="selected"':'' ?>>已提交</option>
        <option value="1" <?php echo $v['wx_state']==1?'selected="selected"':'' ?>>审核中</option>
        <option value="7" <?php echo $v['wx_state']==7?'selected="selected"':'' ?>>已进件</option>
        <option value="3" <?php echo $v['wx_state']==3?'selected="selected"':'' ?>>未通过</option>
        <option value="2" <?php echo $v['wx_state']==2?'selected="selected"':'' ?>>审核通过</option>
        <option value="6" <?php echo $v['wx_state']==6?'selected="selected"':'' ?>>待放款</option>
        <option value="4" <?php echo $v['wx_state']==4?'selected="selected"':'' ?>>完成放款</option>
        <option value="5" <?php echo $v['wx_state']==5?'selected="selected"':'' ?>>结清</option>
      </select>





    </td>
    <td><a href="./wx_order-update-<?php echo $v['id'] ?>.htm">编辑</a></td>
  </tr>


  <?php
 $i++; } ?>


  </tbody>

</table>
-->


<!--页码-->
<div class="inline page"><!-- pull-right-->
  <a href="<?php if($page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('Order/wx_apply',array('page'=>$page_number['page']-1,'type'=>$page_number['type'])); endif; ?>">«</a>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <?php $__FOR_START_29437__=1;$__FOR_END_29437__=$page_number['count'];for($i=$__FOR_START_29437__;$i <= $__FOR_END_29437__;$i+=1){ if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): if($i == $page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
        <?php else: ?>
        <a href="<?php echo U('Order/wx_apply',array('page'=>$i,'type'=>$page_number['type']));?>"><?php echo ($i); ?></a>
        <!--<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>--><?php endif; ?>
      <?php else: endif; } ?>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <a href="<?php if($page_number['page'] == $page_number['count'] ): ?>javascript:;<?php else: echo U('Order/wx_apply',array('page'=>$page_number['page']+1,'type'=>$page_number['type'])); endif; ?>">»</a>

</div>
</div>
<script>


/*    $(function(){
        $('#enquiries').click(function(){
            var name = $(this).prev().val();
            $.post("<?php echo U('Admin/Order/look_up');?>",{name:name},function(data){


            })
        })
    })*/

    $(function(){
        $('select[name="vo.wx_state"]').on('change',function(){
            var flagid = $(this).val();
            var oid = $(this).attr('aid');
            var val = $(this).attr('val');
            var html = $('select[name="vo.wx_state"][aid="'+oid+'"] option[value="'+flagid+'"]').html();
            if(flagid === '0'){
                alert('选择状态错误!');
                location.reload();
                return;
            }else{
                if(confirm('确定将状态改为('+html+')')){
                    $.post("<?php echo U('Admin/Order/change');?>",{flagid:flagid,oid:oid},function(code, message){
                        if(code == 0) {
                            alert('选择状态错误，请联系管理员!')
                            location.reload();
                        } else {
                            alert('修改成功')
                        }
                    });
                }
                else{
//        var select = parseInt(flagid) - 1;
                    $('select[aid="'+oid+'"]').find("option").attr('selected',false);
                    $('select[aid="'+oid+'"]').find("option[value='"+val+"']").attr('selected',true);
                }
            }
            /*alert(flagid);
            alert(oid);*/
        })
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