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
  label{
    display:inline;
  }
</style>


<form action="<?php echo U('System/jurisdiction_update');?>" method="post">
  <input type="hidden" name="id" value="<?php echo ($id); ?>" />
  <input type="hidden" name="inou" value="<?php echo ($inou); ?>" />

  <table class="table table-bordered table-hover definewidth m10">
    <thead>
    <tr>
      <th class="tab_wit4">权限名称</th>
      <!--<th>目录类别</th>-->
      <th class="tab_wit4">一级目录</th>
      <!--<th>部门</th>-->
      <th>二级目录</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td class="tab_middle" rowspan="<?php echo ($cont); ?>" align="center" class="" valign="middle"><input type="text" name="name" value="<?php echo ($rank); ?>" id="username" required="" placeholder="权限名称 / RankName"></td>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td class="tab_center">
          <label for="<?php echo ($vo["id"]); ?>">
            <input type="checkbox" data-am-ucheck name="c_id[]" id="<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["id"]); ?>" <?php if($vo["already"] == 1 ): ?>checked<?php endif; ?> /><?php echo ($vo["menu"]); ?>
          </label>
        </td>
        <td class="tableleft">
          <?php if(is_array($vo["next"])): $i = 0; $__LIST__ = $vo["next"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vol): $mod = ($i % 2 );++$i;?><label for="<?php echo ($vol["id"]); ?>">
              <input type="checkbox" data-am-ucheck name="cs_id[<?php echo ($vo["id"]); ?>][]" value="<?php echo ($vol["id"]); ?>" id="<?php echo ($vol["id"]); ?>" superior="<?php echo ($vol["superior"]); ?>" <?php if($vol["already"] == 1 ): ?>checked<?php endif; ?>/><?php echo ($vol["menu"]); ?>
            </label>&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
        </td>

      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <tr>
      <td colspan="3">
        <button type="submit" class="btn btn-primary">保存修改</button> &nbsp;&nbsp;<button type="button" class="btn btn-success" name="backid" id="backid">返回列表</button>
      </td>
    </tr>
    </tbody>
  </table>



</form>









<script>

  $(function(){
//
//    $('#backid').click(function(){
//      javascript:history.go(-1);
//    });

    $('input[type="checkbox"]').click(function () {
      this.blur();
      this.focus();
    });
    $("form input[type='checkbox']").change(function() {
      if($(this).attr('superior') != '' && $(this).attr('superior') != undefined){
        var superior = $(this).attr('superior');
        if($(this).is(':checked')) {
          $("input[superior='" + superior + "']").each(function () {
            if ($(this).is(':checked')) {
              $('#' + superior).prop('checked',true);
            }else{
              $('#' + superior).prop('checked',false);
              return false;
            }
          });
        }else{
          $('#' + superior).prop('checked',false);
        }
      }else{
        var id = $(this).attr('id');
        if($(this).is(':checked')){
          $("input[superior='" + id + "']").prop('checked',true);
        }else{
          $("input[superior='" + id + "']").prop('checked',false);
        }
      }
    });

    var inou=sessionStorage.getItem('inou');
      console.log(inou);
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