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
<script type="text/javascript" src="/Public/layer/layer.js"></script>

<form id="form-article-add" method="post" class="definewidth m20">
    <input type="hidden" name="type" value="<?php echo ($type); ?>" />
    <div align="center">名称：<input type="text" name="name" class="tab_wit5" placeholder="请填写类型" value="" style="width: 100px;"/></div>
    <br/>
    <div align="center">

    <button type="submit" class="btn btn-primary"  id="<?php switch($type): case "1": ?>save<?php break;?>
        <?php case "2": ?>save<?php break;?>
        <?php case "3": ?>save<?php break;?>
        <?php case "4": ?>save3<?php break; endswitch;?>">添加</button> &nbsp;&nbsp;
    <button type="submit" class="btn btn-primary" id="down">关闭</button>
    </div>
</form>

<script>
    $(function(){
        // $('#save').click(function(){
        //     $.post("<?php echo U('Admin/Product/add');?>",$('#form-article-add').serialize(),function(res){
        //         if(res['status']==1){

        //             layer.msg(res['msg'],{icon:1,time:4000});
        //             var index = parent.layer.getFrameIndex(window.name);
        //                 parent.layer.close(index)
        //         }else{
        //             layer.msg(res['msg'],{icon:0,time:4000});
        //         }
        //     },'json')
        // })



        $('#save3').click(function(){

            var type_text=$("#form-article-add").find("input[type='text']").val();
            var  number1=Number(type_text);
            console.log( typeof(number1) )
            if( typeof(number1)==='number' ){
                if(number1>0) {
                    if (number1 >= 12) {
                        if (number1 % 12 != 0) {
                            alert("请输入正确数字,超过12个月以12的倍数填写！")
                            return false;
                        }
                    }
                    $.post("<?php echo U('Admin/Product/add');?>", $('#form-article-add').serialize(), function (res) {
                        if (res['status'] == 1) {
//                            console.log(res)
//                            layer.msg(res.msg, {icon: 1, time: 5000});
//                            console.log(res);
//                            console.log(res.msg);
                            alert(res.msg);
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.$('.hidden').val('<?php echo ($type); ?>,<?php echo ($page); ?>').change();
                            parent.layer.close(index);
                        }else if(res['status'] == 2){
                            alert(res.msg);
                        } else {
                            layer.msg(res['msg'], {icon: 0, time: 4000});
                        }
                    }, 'json')
                }else{
                    alert("请输入正确数字");
                    return false;
                }
            }

        })
        $('#save').click(function(){

            var type_text=$("#form-article-add").find("input[type='text']").val();
            var  number1=Number(type_text);
            console.log( typeof(number1) )


                    $.post("<?php echo U('Admin/Product/add');?>",$('#form-article-add').serialize(),function(res){
                        if(res['status']==1){
                            alert("添加成功");
//                            layer.msg(res.msg,{icon:1,time:5000});
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.$('.hidden').val('<?php echo ($type); ?>,<?php echo ($page); ?>').change();
                            parent.layer.close(index);
                        }else {
                            alert("添加失败");
//                            layer.msg(res.msg,{icon:0,time:4000});
                        }
                    },'json')

        })

        $('#down').click(function(){
            var index = parent.layer.getFrameIndex(window.name);
            parent.layer.close(index)
        })

    });
    /*$(function(){
        // $('#save').click(function(){
        //     $.post("<?php echo U('Admin/Product/add');?>",$('#form-article-add').serialize(),function(res){
        //         if(res['status']==1){

        //             layer.msg(res['msg'],{icon:1,time:4000});
        //             var index = parent.layer.getFrameIndex(window.name);
        //                 parent.layer.close(index)
        //         }else{
        //             layer.msg(res['msg'],{icon:0,time:4000});
        //         }
        //     },'json')
        // })
        $('#save').click(function(){
//            console.log($(this));
            $.post("<?php echo U('Admin/Product/add');?>",$('#form-article-add').serialize(),function(res){
                console.log(res);
//                return false;
                if(res['status']==1){
                    console.log(res);
                    layer.msg(res['msg'],{icon:1,time:5000});
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.$('.hidden').val('<?php echo ($type); ?>,<?php echo ($page); ?>').change();
                    parent.layer.close(index);
                }else{
                    console.log(res);
                    layer.msg(res['msg'],{icon:0,time:4000});
                }
            },'json')
        })

        $('#down').click(function(){
            var index = parent.layer.getFrameIndex(window.name);
            parent.layer.close(index)
        })

    });*/
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