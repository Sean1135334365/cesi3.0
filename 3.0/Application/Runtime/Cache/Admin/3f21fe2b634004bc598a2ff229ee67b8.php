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
<form class="form-inline definewidth m20" action="<?php echo U('User/wechat_list');?>" method="post" style="Float:left;margin: 0px 0px 10px 0px;padding-left: 30px">
  <input type="text" name="name" id="name" class="abc input-default" placeholder="昵称/微信号/签约号" value="">&nbsp;&nbsp;
  <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;
  <!--<button type="button" class="btn btn-success" id="addnew">新增用户</button>-->
</form>
<form action="<?php echo U('User/wechat_list');?>" method="post" id="type" style="Float:right;margin: 20px 0px 0px 0px;">
    <span style="position:absolute;right:2%;">
      <select name="" typ="type" val="<?php echo ($page_number['type']); ?>" style="width: 70%; min-width: 80px;" id="sgin_123">
          <option value="0" <?php if($page_number['type'] == 0 ): ?>selected="selected"<?php endif; ?> >全&#12288;部</option>
          <option value="1" <?php if($page_number['type'] == 1 ): ?>selected="selected"<?php endif; ?> >签&#12288;约</option>
          <option value="2" <?php if($page_number['type'] == 2 ): ?>selected="selected"<?php endif; ?> >非签约</option>
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
<div id="wechat_sign_up">
<table class="table table-bordered table-hover tab_center definewidth m10" id="stype_1" >
  <tr>
    <th>编号</th>
    <!--<th>openid</th>-->
    <th>用户微信号</th>
    <th>昵称</th>
    <th>备注</th>
    <th>头像</th>
    <th>性别</th>
    <th>城市</th>
    <!--<th>是否关注微信</th>-->
    <!--<th>access_token</th>-->
    <!--<th>refresh_token</th>-->
    <th>创建时间</th>
    <th>创建时IP</th>
    <th>签约号</th>
    <th>授权签约</th>
    <th>操作</th>
  </tr>

  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><?php echo ($i); ?></td>
      <!--<td class="omit"><?php echo ($vo["openid"]); ?></td>-->
      <td><?php echo ($vo["wx_number"]); ?></td>
      <td><?php echo ($vo["nickname"]); ?></td>
      <td><?php echo ($vo["remarks"]); ?></td>
      <td><img src="<?php echo ($vo["headimgurl"]); ?>" style="width:25px;"></td>
      <td>
        <?php if($vo['sex'] == '1'): ?>男
          <?php else: ?>
          女<?php endif; ?>
      </td>
      <td>
        <?php if($vo['province'] != ''): echo ($vo["province"]); ?>
            <?php if($vo['city'] != ''): ?>><?php echo ($vo["city"]); endif; ?>
          <?php else: ?>
            <?php echo ($vo["city"]); endif; ?>
      </td>
      <!--<td><?php echo ($vo["wxfollow"]); ?></td>-->
      <!--<td><?php echo ($vo["access_token"]); ?></td>-->
      <!--<td><?php echo ($vo["refresh_token"]); ?></td>-->
      <td><?php echo (date("Y/m/d H:i:s",$vo["w_time"])); ?></td>
      <td><?php echo ($vo["create_ip"]); ?></td>
      <td><?php echo ($vo["channel_number"]); ?></td>
      <td>
           <?php if($vo['is_auth'] == '1'): ?><font color="#62c462">已授权</font>
               <?php else: ?>
               <font color="#FF0000">未授权</font><?php endif; ?>
      </td>
      <td>
        <a href="<?php echo U('User/wechat_update',array('id'=>$vo['id']));?>">修改</a> <!--<span style="font-size:16px;">|</span>-->
          &nbsp;&nbsp;
          <span class="authorise">
              <?php if($vo['state'] == '1'): ?><a href="javascript:;" value="2" >恢复</a>
                  <?php else: ?>
                  <a href="javascript:;" value="1" >拉黑</a><?php endif; ?>
          </span>
          <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
        <!--<a href="<?php echo U('System/wechat_update',array('id'=>$vo['id']));?>" onclick="return menu_delete('<?php echo ($vo["delete"]); ?>','<?php echo ($vo["menu"]); ?>')">删除</a>-->
      </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
    <div class="inline page"><!-- pull-right-->
        <a href="<?php if($page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('User/wechat_list',array('page'=>$page_number['page']-1,'type'=>$page_number['type'])); endif; ?>">«</a>
        <?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
        <?php $__FOR_START_5724__=1;$__FOR_END_5724__=$page_number['count'];for($i=$__FOR_START_5724__;$i <= $__FOR_END_5724__;$i+=1){ if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): if($i == $page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                    <?php else: ?>
                    <a href="<?php echo U('User/wechat_list',array('page'=>$i,'type'=>$page_number['type']));?>"><?php echo ($i); ?></a>
                    <!--<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>--><?php endif; ?>
                <?php else: endif; } ?>
        <?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
        <a href="<?php if($page_number['page'] == $page_number['count'] ): ?>javascript:;<?php else: echo U('User/wechat_list',array('page'=>$page_number['page']+1,'type'=>$page_number['type'])); endif; ?>">»</a>

    </div>
</div>

<script>
    $(function(){
        $('.authorise').click(function(){
            var authorise = $(this).children().attr('value');
            var id = $(this).next().val();
//            alert(authorise);
//            alert(id);
            $.post("<?php echo U('Admin/User/channel_desc');?>",{authorise:authorise,id:id},function(code){
                if(code.status === 1) {
                    alert('修改成功!')
                    location.reload();
                } else {
                    alert('修改失败')
                }
            },'json')
        })
        })


//        $('.authorise').click(function(){
//            var authorise = $(this).children().attr('value');
//            var id = $(this).next().val();
////            alert(authorise);
////            alert(id);
//            $.post("<?php echo U('Admin/User/channel_no');?>",{authorise:authorise,id:id},function(code){
//                if(code.status === 1) {
//                    alert('修改成功!')
//                    location.reload();
//                } else {
//                    alert('修改失败')
//                }
//            },'json')
//        })
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