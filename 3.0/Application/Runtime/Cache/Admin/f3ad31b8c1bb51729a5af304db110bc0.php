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

<link rel="stylesheet" href="/Public/Admin/assets/css/wxuserinfo.css">

<!--

<script type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.0&key=fee399d954419577377ddc18f93f5d07"></script>

<script>

  AMap.service('AMap.DistrictSearch',function(){//回调函数
    //实例化DistrictSearch
//    districtSearch = new AMap.DistrictSearch();
    //TODO: 使用districtSearch对象调用行政区查询的功能
    var districtSearch = new AMap.DistrictSearch({
      level : 'country',
      subdistrict : 2
    });

    districtSearch.search('中国',function(status, result){
      //TODO : 按照自己需求处理查询结果
      console.log(status);
      console.log(result);
//      var arr = new Array();
//      $.each(result.districtList[0].districtList,function(k,v){
//
////        console.log(k,v);
////        console.log(v.districtList);
//        arr[k] = new Array();
//        arr[k]['adcode'] = v.adcode;
//        arr[k]['citycode'] = v.citycode;
//        arr[k]['level'] = v.level;
//        arr[k]['name'] = v.name;
////        arr[k]['arr'] = v.districtList;
////        var a = v.districtList;
//        if(result.districtList[0].districtList[k].length > 0){
//
//          $.each(result.districtList[0].districtList[k].districtList,function(key,val){
//            arr[k][key] = new Array();
//            arr[k][key]['adcode'] = val.adcode;
//            arr[k][key]['citycode'] = val.citycode;
//            arr[k][key]['level'] = val.level;
//            arr[k][key]['name'] = val.name;
//          });
//        }
//
//      });


//      console.log(arr);
//      console.log(JSON.stringify(result));








//      var d = $.toJSON(result);
      var d = JSON.stringify(result);


//
      $.post("<?php echo U('User/wechat_update');?>",{data:d},function(data){

        console.log(data);







      });








    })





  })












</script>
-->

<form action="<?php echo U('User/wechat_update');?>" method="post" class="definewidth m20">
    <input type="hidden" name="id" value="<?php echo ($id); ?>" />
    <table class="table table-bordered table-hover ">
        <tr>
            <td width="10%" class="tableright" style="text-align: center;vertical-align:middle;">
                <img src="<?php echo ($user["headimgurl"]); ?>" class="portrait">
            </td>
            <td class="tab_middle">
                <div>昵&#12288;称：<?php echo ($user["nickname"]); ?></div>
                <div>备&#12288;注：<input type="text" name="remarks" class="tab_wit5" value="<?php echo ($user["remarks"]); ?>" style="width:120px;"/></div>
                <!--<div>OPENID：<?php echo ($user["openid"]); ?></div>-->
                <div class="contract">签约号：<?php echo ($user["channel_number"]); ?></div>
                <div>微信号：<input type="text" name="wx_number" class="tab_wit5" value="<?php echo ($user["wx_number"]); ?>" style="width:120px;"/></div>
                <div>
                    地&#12288;区：
                    <?php if($user['province'] != ''): echo ($user["province"]); ?>
                        <?php if($user['city'] != ''): ?>><?php echo ($user["city"]); endif; ?>
                        <?php else: ?>
                        <?php echo ($vo["city"]); endif; ?>
                </div>
            </td>
        </tr>
        <!--<tr>
           <td class="tableleft">姓名</td>
           <td ><input type="text" name="name" value="<?php echo ($user["name"]); ?>"/></td>
         </tr>
         <tr>
           <td class="tableleft">手机号码</td>
           <td ><input type="text" name="mobile" value="<?php echo ($user["mobile"]); ?>"/></td>
         </tr>
         <tr>
           <td class="tableleft">邮箱</td>
           <td ><input type="text" name="mail" value="<?php echo ($user["mail"]); ?>"/></td>
         </tr>
         <tr>
           <td class="tableleft">年龄</td>
           <td ><input type="text" name="age" value="<?php echo ($user["age"]); ?>"/></td>
         </tr>-->
        <!--<tr>
            <td class="tableleft">性别</td>
            <td >
                <?php if($user["sex"] == 1 ): ?>&#12288;男<?php endif; ?>
                <?php if($user["sex"] == 2 ): ?>&#12288;女<?php endif; ?>
                <?php if($user["sex"] == 0 ): ?>&#12288;保密<?php endif; ?>
            </td>
        </tr>-->

        <tr>
            <td class="tableleft" style="text-align: center;">授权状态</td>
            <td >
                <input type="radio" name="is_auth" class="accredit" style="margin: 0;" a_id="<?php echo ($id); ?>" value="1" <?php if($user["is_auth"] == 1 ): ?>checked<?php endif; ?> /> 授权
                <input type="radio" name="is_auth" class="accredit" style="margin: 0;" a_id="<?php echo ($id); ?>" value="0" <?php if($user["is_auth"] == 0 ): ?>checked<?php endif; ?> /> 未授权
        </tr>
        <tr>
            <td class="tableleft"></td>
            <td>
                <button type="submit" class="btn btn-primary">保存修改</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
            </td>
        </tr>
    </table>
</form>

<script>
    $(function(){
        /*$('.accredit').click(function(){
            var accredit = $(this).val();
            var id = $(this).attr('a_id');
//            alert(accredit);
//            alert(id);
            $.post("<?php echo U('Admin/User/channel_no');?>",{accredit:accredit,id:id},function(code){
                if(code.status === 1) {
                    alert('修改成功!')
//                    $('.contract').html("签约号："+code.channel_number+"");
                    location.reload();
                } else {
                    alert('修改失败')
                }
            },'json')
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