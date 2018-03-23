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

<script type="text/javascript" src="/Public/Admin/assets/js/big_data.js"></script>


<style> 
.am-btn-group, .am-btn-group-stacked{
  top: -3px;
 }
 .am-input-group{
  top: -8px;
 }
 
  tr,th,td{
     text-align: center;
  }
  .am-table>tbody>tr>td, .am-table>tbody>tr>th, .am-table>tfoot>tr>td, .am-table>tfoot>tr>th, .am-table>thead>tr>td, .am-table>thead>tr>th{
    vertical-align: middle;
  }
 .form-inline>input{
  padding: 4px 0 4px 5px;
 }
 .am-btn{
  background: #fff;
  border: solid 1px #ddd;
 }

</style>




      <!--顶部-->
<table class="table table-hover tab_center definewidth m10">
  <tr>
    <td width="70%" class="td_left" style="border: none;text-align: left">
      <form class="form-inline m20" action="<?php echo U('Order2/apply_list');?>" method="post">
        <?php if($user["classes"] != '1' ): ?><button type="button" class="btn am-btn-default btn-success" id="addnew"><span class="am-icon-plus"></span> 创建</button>
                <!--<button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>-->
                <!--<button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>-->
                <button type="button" class="btn am-btn-default btn-danger"><span class="am-icon-trash-o"></span> 删除</button><?php endif; ?>
        <input type="text" name="name" id="name" class="abc input-default" placeholder="借款人/合同编号/信托" value="" style="width:190px;">
        &nbsp;
        <button type="submit" class="btn btn-primary">查询</button>
      
      </form>
    </td>
   
  </tr>


</table>

      <!--列表开始-->
      <style>
        .am-table-hover>tbody>tr:hover>td{
          background-color:#e9e9e9;
        }
      </style>

      <div class="am-g tbl_content">
        <div class="am-u-sm-12">
          <table class="table table-hover tab_center definewidth m10" style="border-bottom: solid 1px #ddd">
            <thead>
            <tr>
              <th width="3%" class="table-check "><input type="checkbox" class="tpl-table-fz-check"></th>
              <!--<th class="table-id">ID</th>
              <th class="table-title">标题</th>
              <th class="table-type">类别</th>
              <th class="table-author am-hide-sm-only">作者</th>
              <th class="table-date am-hide-sm-only">修改日期</th>
              <th class="table-set">操作</th>-->
              <!--<th>ID</th>-->
              <th width="11%">项目管理</th>
              <!--<th width="5%">大数据信息</th>-->
              <th width="8%">操作员</th>
              <th width="8%">主贷人</th>
              <th width="10%">借款金额</th>
              <th width="10%">申请日期</th>
              <th width="14%">信托名称</th>
              <th width="8%">经办人</th>
              <th width="8%">项目负责人</th>
              <th width="14%">订单提交时间</th>
              <th width="6%">订单状态</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><input type="checkbox" name="id"></td>
                <td>
                  <a href="<?php echo U('Order2/apply_update',array('id'=>$vo['id']));?>">
                    <button class="am-btn  am-btn-xs am-text-secondary" title="编辑">
                      <img id="editor2"  src="/Public/Admin/assets/images/editor2.png"/><!-- 编辑-->
                      <img src="/Public/Admin/assets/images/editor1.png" style="display: none;"/><!-- 编辑-->
                    </button>
                  </a>
                  <a href="<?php echo U('File/file_zip_2',array('id'=>$vo['id']));?>">
                    <button class="am-btn am-btn-default am-btn-xs am-text-secondary" title="下载材料">
                      <img id="download2"  src="/Public/Admin/assets/images/download2.png"/><!--材料-->
                       <img src="/Public/Admin/assets/images/download1.png" style="display: none;"/><!--材料-->
                    </button>
                  </a>
                  <button i="<?php echo ($vo["id"]); ?>" user="<?php echo ($vo["name"]); ?>" u="<?php echo ($vo["investigate"]); ?>" class="am-btn am-btn-default am-btn-xs am-text-secondary btn_investigate" title="<?php if($vo['investigate'] == 0 or $vo['investigate'] == ''): ?>获取数据<?php else: ?>查看信息<?php endif; ?>">
                    <img id="lookfor2" src="/Public/Admin/assets/images/lookfor2.png"/>
                    <img src="/Public/Admin/assets/images/lookfor1.png" style="display: none;"/>
                  </button>
                  <a href="<?php echo U('Order2/investigation_report',array('id'=>$vo['id']));?>">
                    <button i="<?php echo ($vo["id"]); ?>" user="<?php echo ($vo["name"]); ?>" u="<?php echo ($vo["investigate"]); ?>" class="am-btn am-btn-default am-btn-xs am-text-secondary" title="填写调查报告">
                      <img id="write2" src="/Public/Admin/assets/images/write2.png"/>
                      <img src="/Public/Admin/assets/images/write1.png" style="display: none;" />
                    </button>
                  </a>
                  <!--<span style="font-size:16px;">|</span>-->
                  <!--<a href="<?php echo U('System/delete_menu',array('id'=>$vo['id'], state=>$vo[state],page=>$page_number['page']));?>" onclick="return menu_delete('<?php echo ($vo["delete"]); ?>','<?php echo ($vo["menu"]); ?>',this)"><button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-toggle-on ico"></span><span class="text"><?php if($vo["state"] == 1 ): ?>禁用<?php else: ?>启用<?php endif; ?></span></button></a>-->
                </td>
                <!--<td><?php echo ($vo["id"]); ?></td>-->
                <td><?php echo ($vo["a_name"]); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["amount"]); ?></td>
                <td><?php echo ($vo["warehouse_warrant_date"]); ?></td>
                <td><?php echo ($vo["trust_name"]); ?></td>
                <td><?php echo ($vo["responsible_person"]); ?></td>
                <td><?php echo ($vo["principal_date"]); ?></td>
                <!--<td><?php echo ($vo["act"]); ?></td>-->
                <td time="<?php echo ($vo["id"]); ?>"><span class="i_time" oid="<?php echo ($vo["id"]); ?>"><?php echo ($vo["i_time"]); ?></span></td>
                <td>
                  <?php switch($vo["order_state"]): case "1": ?>已创建<?php break;?>
                    <?php case "2": ?>预审中<?php break;?>
                    <?php case "3": ?>下户<?php break;?>
                    <?php case "4": ?>批复<?php break;?>
                    <?php case "5": ?>公证<?php break;?>
                    <?php case "6": ?>抵押<?php break;?>
                    <?php case "7": ?>过桥<?php break;?>
                    <?php case "8": ?>提放<?php break;?>
                    <?php default: ?>
                      未知<?php endswitch;?>
                </td>
                <!--<td>-->
                  <!--<?php if($vo["state"] == 1 ): ?>启用<?php else: ?>禁用<?php endif; ?>-->
                <!--</td>-->
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>



<div class="inline page"><!-- pull-right-->
  <a href="<?php if($page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('Order2/apply_list',array('page'=>$page_number['page']-1,'type'=>$page_number['type'])); endif; ?>">«</a>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <?php $__FOR_START_28052__=1;$__FOR_END_28052__=$page_number['count'];for($i=$__FOR_START_28052__;$i <= $__FOR_END_28052__;$i+=1){ if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): if($i == $page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
        <?php else: ?>
        <a href="<?php echo U('Order2/apply_list',array('page'=>$i,'type'=>$page_number['type']));?>"><?php echo ($i); ?></a>
        <!--<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>--><?php endif; ?>
      <?php else: endif; } ?>
  <?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
  <a href="<?php if($page_number['page'] == $page_number['count'] ): ?>javascript:;<?php else: echo U('Order2/apply_list',array('page'=>$page_number['page']+1,'type'=>$page_number['type'])); endif; ?>">»</a>

</div>
</div>


<div class="load">
  <div class="back"></div>
  <div class="load_img">
    <img src="/Public/Admin/assets/img/loading.gif">
    <div class="load_text"></div>
  </div>
</div>





 <div class="ifeame_container" id="ifeame_center">
  <div class="title_bar">
    <span id="title_text">审查报告</span>
    <a href="javascript:;" class="am-close am-close-alt am-close-spin am-icon-times close_btn" onclick="$('#ifeame_center').hide();"></a>
  </div>
  <div class="iframe_content">
    <iframe class="iframe" id="iframe"></iframe>
  </div>
</div>



<script>
  $(function(){
     
       $(".am-btn").on('mouseover',function(){
            $(this).children().first().hide();
            $(this).children().last().show();
            $(this).css("background","#ddd")

        })
    $(".am-btn").on('mouseout',function(){
            $(this).children().first().show();
            $(this).children().last().hide();
             $(this).css("background","#fff")
        })


  })


  var investigate_url = "<?php echo U('Order2/chack_data');?>";
  var name_url = "<?php echo U('Order2/chack_username');?>";
  var iframe_u = "<?php echo U('Order2/examine');?>";



  $(function () {

    $('.i_time').on('click',function(){
        var val = $(this).html();
        var oid = $(this).attr('oid');
        var val1 = val.substr(0,10);
        var val2 = val.substr(14,8);
        $(this).parent().html('<input type="text" name="'+oid+'" value="'+val1+' '+val2+'">&nbsp;<button class="am-btn am-btn-default am-btn-xs am-text-secondary i_time_input" oid="'+oid+'"><span class="am-icon-pencil-square-o"></span> 编辑</button>');

      $('.i_time_input').on('click',function(){
        console.log(111);
        var oid = $(this).attr('oid');
        var val = $('input[name="'+oid+'"]').val();
        $.post("<?php echo U('Order2/apply_amend');?>",{oid:oid,val:val},function(data){
          if(data.status == 1){
            var html='<span class="i_time" oid="<?php echo ($vo["id"]); ?>">'+data.i_time+'</span>';
            $('button[oid="'+oid+'"]').parent().html(html);
            alert(data.info);
          }else{
            alert(data.info);
          }



        });



      });
    });


    $('#addnew').click(function(){
      window.location.href="<?php echo U('Order2/apply_add');?>";
    });

  });
//  function menu_delete(data,text,btn){
//    var state = $(btn).find('span.text').html();
//    if(state === '禁用'){
//      if(data === '0'){
//        if(confirm("你确定要禁用一级目录（"+text+"）么？删除一级目录同时会将目录下的子目录一起禁用哦！")){
//          $(btn).find('span.ico').removeClass('am-icon-toggle-on').addClass('am-icon-toggle-off');
////          $(btn).find('span.text').html('启用');
//          return true;
//        }else{
//          return false;
//        }
//      }else{
//        if(confirm("你确定要禁用目录（"+text+"）么！")){
//          $(btn).find('span.ico').removeClass('am-icon-toggle-on').addClass('am-icon-toggle-off');
////          $(btn).find('span.text').html('启用');
//          return true;
//        }else{
//          return false;
//        }
//      }
//    }else{
//      if(confirm("你确定要启用目录（"+text+"）么！")){
//        $(btn).find('span.ico').removeClass('am-icon-toggle-on').addClass('am-icon-toggle-off');
////        $(btn).find('span.text').html('禁用');
//        return true;
//      }else{
//        return false;
//      }
//    }
//
//  }



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