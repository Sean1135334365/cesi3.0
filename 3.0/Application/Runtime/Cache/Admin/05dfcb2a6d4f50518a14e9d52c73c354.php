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

<link rel="stylesheet" type="text/css" href="/Public/Admin/Css/admin_style.css">
<style>
    td.tableleft{
       text-align: center;
        vertical-align: middle;
    }

</style>

<form action="<?php echo U('System/admin_grouping');?>" method="post" class="definewidth m20">
  <input type="hidden" name="id" value="<?php echo ($id); ?>" />
  <table class="table table-bordered table-hover ">
    <tr>
      <td width="12%" class="tableleft">用户名</td>
      <td><input type="text" name="adminuser_username" required="" value="<?php echo ($user["username"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">渠道名称</td>
      <td ><input type="text" name="nickname" value="<?php echo ($user["nickname"]); ?>" placeholder="非渠道可不填"/></td>
    </tr>
    <tr>
      <td class="tableleft">姓名</td>
      <td ><input type="text" name="adminuser_name" required="" value="<?php echo ($user["name"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">密码</td>
      <td ><input type="password" name="adminuser_password" required="" value="<?php echo ($user["password"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">手机号码</td>
      <td ><input type="text" name="mobile" required="" value="<?php echo ($user["mobile"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">邮箱</td>
      <td ><input type="text" name="mail" value="<?php echo ($user["mail"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">绑定城市</td>
      <td >
          <?php if($_SESSION['yzs_userinfo']['territory'] == 0): ?><select name="city" required="" class="i_weidth10">
                  <option value="">--省份--</option>
                  <option value="0" <?php if($admin_city == '0'): ?>selected<?php endif; ?>>全国</option>
                  <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" grade="<?php echo ($vo["grade"]); ?>" <?php if($vo['id'] == $admin_city): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
              <span>——</span>
              <select name="territory" required="" class="i_weidth10">
                  <option value="">--城市--</option>
                  <?php if($admin_city == '0'): ?><option value="0" selected>全国</option><?php endif; ?>
                  <?php if(is_array($territory)): $i = 0; $__LIST__ = $territory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($id["id"]); ?>" <?php if($vo['id'] == $user['territory']): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  <!--<option value="" <?php if($vo['id'] == $user['territory']): ?>disabled<?php endif; ?>></option>-->
              </select>
              <?php else: ?>
              <select name="city" required="" class="i_weidth10">
                  <option value="">--省份--</option>
                  <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" grade="<?php echo ($vo["grade"]); ?>" <?php if($vo['id'] == $admin_city): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
              <span>——</span>
              <select name="territory" required="" class="i_weidth10">
                  <option value="">--城市--</option>
                  <?php if(is_array($territory)): $i = 0; $__LIST__ = $territory;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($id["id"]); ?>" <?php if($vo['id'] == $user['territory']): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                  <!--<option value="" <?php if($vo['id'] == $user['territory']): ?>disabled<?php endif; ?>></option>-->
              </select><?php endif; ?>

        <!--<input type="text" name="territory" value="<?php echo ($user["territory"]); ?>"/>-->
      </td>
    </tr>
    <tr>
      <td class="tableleft">关联签约号</td>
      <td>
        <input type="checkbox" name="all_channel_number" value="0" <?php if($user['channel_number'] == '0' ): ?>checked="checked"<?php endif; ?> id="channel_number"><label for="channel_number">&nbsp;&nbsp;全选&#12288;</label>
        <?php if(is_array($channel_number)): $i = 0; $__LIST__ = $channel_number;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="checkbox" name="channel_number[]" class="cn_checked" <?php if($user['channel_number'] == '0' or in_array($vo['id'],explode(',',$user['channel_number'])) ): ?>checked="checked"<?php endif; ?> id="cn_checked<?php echo ($i); ?>" value="<?php echo ($vo["id"]); ?>"><label for="cn_checked<?php echo ($i); ?>">&nbsp;&nbsp;<?php echo ($vo["channel_number"]); ?>&#12288;</label><?php endforeach; endif; else: echo "" ;endif; ?>
      </td>
    </tr>
    <tr>
      <td class="tableleft">非签约是否可查</td>
      <td>
        <input type="radio" name="no_auth" <?php if($user['no_auth'] == '1' ): ?>checked="checked"<?php endif; ?> value="1">&nbsp;&nbsp;是&#12288;
        <input type="radio" name="no_auth" <?php if($user['no_auth'] == '0' ): ?>checked="checked"<?php endif; ?> value="0">&nbsp;&nbsp;否
      </td>
    </tr>



    <!--<tr>
      <td class="tableleft">年龄</td>
      <td ><input type="text" name="age" value="<?php echo ($user["age"]); ?>"/></td>
    </tr>
    <tr>
      <td class="tableleft">性别</td>
      <td >
        <input type="radio" name="gender" value="1" <?php if($user["gender"] == 1 ): ?>checked<?php endif; ?> /> 男
        <input type="radio" name="gender" value="2" <?php if($user["gender"] == 2 ): ?>checked<?php endif; ?> /> 女
        <input type="radio" name="gender" value="0" <?php if($user["gender"] == 0 ): ?>checked<?php endif; ?> /> 保密
      </td>
    </tr>
    <tr>
      <td class="tableleft">归属</td>
      <td >
        <input type="radio" name="classes" value="1" <?php if($user["gender"] == 1 ): ?>checked<?php endif; ?> /> 平台
        <input type="radio" name="classes" value="2" <?php if($user["gender"] == 2 ): ?>checked<?php endif; ?> /> 资方
        <input type="radio" name="classes" value="3" <?php if($user["gender"] == 3 ): ?>checked<?php endif; ?> /> 渠道
      </td>
    </tr>-->
      <?php if($_SESSION['yzs_userinfo']['inou'] == 0): ?><tr>
              <td class="tableleft">账号选择</td>
              <td class="radio_click">
                  <input type="radio" name="inou" value="0" id="inou1" class="sp_outer" <?php if($user['inou'] == '0' ): ?>checked="checked"<?php endif; ?>><label for="inou1">&nbsp;&nbsp;超级管理员&#12288;</label>
                  <input type="radio" name="inou" value="1" id="inou2" class="radio_outer" <?php if($user['inou'] == '1' ): ?>checked="checked"<?php endif; ?>><label for="inou2">&nbsp;&nbsp;外部账号&#12288;</label>
                  <input type="radio" name="inou" value="2" id="inou3" class="radio_inner" <?php if($user['inou'] == '2' ): ?>checked="checked"<?php endif; ?>><label for="inou3">&nbsp;&nbsp;内部账号</label>
              </td>
          </tr>
          <?php else: ?>
          <tr>
              <td class="tableleft">账号选择</td>
              <td class="radio_click">
                  <input type="radio" name="inou" value="<?php echo ($rank["inou"]); ?>" checked="checked" id="inou1"><label for="inou1">&nbsp;&nbsp;
                  <?php if($_SESSION['yzs_userinfo']['inou'] == 1): ?>外部账号<?php endif; ?>
                  <?php if($_SESSION['yzs_userinfo']['inou'] == 2): ?>内部账号<?php endif; ?></label>
              </td>
          </tr>
          <tr>
              <td class="tableleft">目录权限</td>
              <td>
                  <?php if(is_array($rank)): $i = 0; $__LIST__ = $rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="radio" name="rank" value="<?php echo ($vo["id"]); ?>" <?php if($_SESSION['admin']['rank'] == $vo['id']): ?>checked<?php endif; ?> /><label for="inou<?php echo ($vo["id"]); ?>"> <?php echo ($vo["rank"]); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
              </td>
          </tr><?php endif; ?>

      <!--<?php if($_SESSION['yzs_userinfo']['inou'] == 0): ?>-->
      <tr class="sp_num" style="display: none">
          <?php if($_SESSION['yzs_userinfo']['rank'] == 1): ?><td class="tableleft">目录权限</td>
              <td >
                   <input type="radio" name="rank"  value="1" checked/>超级管理员
              </td><?php endif; ?>
      </tr>
      <tr class="outer_num" style="display: none">
          <?php if($_SESSION['yzs_userinfo']['rank'] == 1): ?><td class="tableleft">目录权限</td>
              <td >
                  <?php if(is_array($rank)): $i = 0; $__LIST__ = $rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="radio" name="rank"  value="<?php echo ($vo["id"]); ?>" <?php if($user["rank"] == $vo['id']): ?>checked<?php endif; ?>/> <?php echo ($vo["rank"]); endforeach; endif; else: echo "" ;endif; ?>
              </td><?php endif; ?>
          <!--<?php if($_SESSION['yzs_userinfo']['rank'] == 2): ?><td class="tableleft">目录权限</td>
              <td >
                  <?php if(is_array($rank)): $i = 0; $__LIST__ = $rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["id"] == '2'): ?><input type="radio" name="rank" id="rank2" value="2" checked="checked"/><label for="rank1"> 外部账号</label>
                              <input type="hidden" name="inou" value="1"/><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </td><?php endif; ?>
          <?php if($_SESSION['yzs_userinfo']['rank'] == 3): ?><td class="tableleft">目录权限</td>
              <td >
                  <?php if(is_array($rank)): $i = 0; $__LIST__ = $rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["id"] == '3'): ?><input type="radio" name="rank" id="rank3" value="3" checked="checked"/><label for="rank1"> 内部账号</label>
                              <input type="hidden" name="inou" value="2"/><?php endif; endforeach; endif; else: echo "" ;endif; ?>
              </td><?php endif; ?>-->
      </tr>
      <tr class="inner_num" style="display: none">
          <?php if($_SESSION['yzs_userinfo']['rank'] == 1): ?><td class="tableleft">目录权限</td>
              <td >
                  <?php if(is_array($rank2)): $i = 0; $__LIST__ = $rank2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="radio" name="rank"  value="<?php echo ($vo["id"]); ?>" <?php if($user["rank"] == $vo['id']): ?>checked<?php endif; ?>/> <?php echo ($vo["rank"]); endforeach; endif; else: echo "" ;endif; ?>
              </td><?php endif; ?>
      </tr>
      <!--<?php endif; ?>-->
    <!--<tr>
      <?php if($_SESSION['yzs_userinfo']['inou'] == 0): ?><td class="tableleft">目录权限</td>
          <td >
              <?php if(is_array($rank)): $i = 0; $__LIST__ = $rank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["id"] == '1'): if($_SESSION['yzs_userinfo']['rank'] == '1'): ?><input type="radio" name="rank" required="" value="1" <?php if($user["rank"] == $vo['id']): ?>checked<?php endif; ?> /> 超级管理员<?php endif; ?>
                      <?php else: ?>
                      <input type="radio" name="rank" required="" value="<?php echo ($vo["id"]); ?>" <?php if($user["rank"] == $vo['id']): ?>checked<?php endif; ?> /> <?php echo ($vo["rank"]); endif; endforeach; endif; else: echo "" ;endif; ?>


              &lt;!&ndash;<input type="radio" name="rank" value="1" <?php if($user["rank"] == '1' ): ?>checked<?php endif; ?> /> 超级管理员&ndash;&gt;
              &lt;!&ndash;<input type="radio" name="rank" value="2" <?php if($user["rank"] == 2 ): ?>checked<?php endif; ?> /> 管理员&ndash;&gt;
              &lt;!&ndash;<input type="radio" name="rank" value="0" <?php if($user["rank"] == 0 ): ?>checked<?php endif; ?> /> 普通用户&ndash;&gt;
          </td><?php endif; ?>
    </tr>-->
    <tr>
      <td class="tableleft"></td>
      <td>
        <button type="submit" class="btn btn-primary">保存修改</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
      </td>
    </tr>
  </table>
</form>


<script>
//    var p={
//        x:'',
//        get email(){return this.x},
//        set email(newV){$('input[name="mail"]').val(newV+'@zhiyujinrong.com')}
//    };
//
//    $('input[name="adminuser_username"]').on('input',function () {
//        p.email=$(this).val();
//    });
    radio_click();
    $(".radio_click").click(function(){
        radio_click();
    });
    function radio_click(){
        if($(".radio_outer").is(':checked')){
            $(".inner_num").hide()
            $(".sp_num").hide()
            $(".outer_num").hide()
            $(".outer_num").show()
        }
        if($(".sp_outer").is(':checked')){
            $(".inner_num").hide()
            $(".sp_num").hide()
            $(".outer_num").hide()
            $(".sp_num").show()
        }
        if($(".radio_inner").is(':checked')){
            $(".inner_num").hide()
            $(".sp_num").hide()
            $(".outer_num").hide()
            $(".inner_num").show()
        }
    }
  $(function(){
    $('select[name="city"]').change(function(){
      var val = $(this).val();
      var grade = $("select[name='city'] option:selected").attr('grade');
      var value = $("select[name='city'] option:selected").attr('value');
      console.log(val);
      if(val === '0'){
//        $(this).next('span').remove();
        $('select[name="territory"]').html('<option value="">--城市--</option><option value="0">全国</option>').val('0');
//        $(this).remove();
        return false;
      }
      if(grade == 2 ){
        console.log(value);
        $('select[name="territory"]').html('<option value="">--城市--</option><option value="'+value+'" grade="'+grade+'">'+$("select[name='city'] option:selected").text()+'</option>').val(value);
        return false;
      }

      $.post("<?php echo U('System/city_check');?>",{val:val,grade:grade},function(data){
          if(data.status === 1){
            var option = '<option value="">--城市--</option>';
            $.each(data.result,function(k,v){
              option += '<option value="'+ v.id+'">'+v.name+'</option>';
            });
            $('select[name="territory"]').html(option);
          }else{
            alert(data.info);
            return false;
          }

//        return false;
      });
    });


    //初始化关联签约号

    var chec = true;
    $('.cn_checked').each(function(k,v){
//        console.log($(v));
//        console.log($(v).prop('checked'));
//        console.log($(v).is(':checked'));
      if($(v).is(':checked') === false){
        chec = false;
        $('#channel_number').prop('checked',false);
//          console.log(chec);
        return false;
      }
    });
    if(chec){
      $('#channel_number').prop('checked',true);
    }

    $("#channel_number").change(function(){
//      console.log($(this));
      var channel_number = $(this).is(':checked');
//      console.log(channel_number);
      if(channel_number){
        $('input[name="channel_number[]"]:checkbox').prop('checked',true);
      }else{
        $('input[name="channel_number[]"]:checkbox').prop('checked',false);
      }
    });
    $('.cn_checked').change(function(){
      var chec = true;
      $('.cn_checked').each(function(k,v){
//        console.log($(v));
//        console.log($(v).prop('checked'));
//        console.log($(v).is(':checked'));
        if($(v).is(':checked') === false){
          chec = false;
          $('#channel_number').prop('checked',false);
//          console.log(chec);
          return false;
        }
      });
//      console.log(chec);
      if(chec){
        $('#channel_number').prop('checked',true);
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