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
<link rel="stylesheet" type="text/css" href="/Public/css/diyUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="/Public/css/diyUpload/css/diyUpload.css">
<script type="text/javascript" src="/Public/js/diyUpload/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="/Public/js/diyUpload/js/diyUpload.js"></script>
<style>
    .choose_menu{
        width:600px;
        margin: 30px auto;
    }
   input[type='checkbox']{
       width: 20px;
       height: 20px;
       vertical-align: bottom;
   }
    #btn_sure{
        margin-left: 50%;
    }

</style>




<!--顶部-->
<form class="form-inline definewidth m20" action="<?php echo U('Product/roasting');?>" method="post">
    <!--&lt;!&ndash;<button type="submit" class="btn btn-primary">重置</button>&nbsp;&nbsp; &ndash;&gt;<a href="<?php echo U('Product/roasting_redact');?>"><button type="button" class="btn btn-success" id="addnew">新增产品</button></a>-->
    <button type="button" class="btn btn-success" id="addnew">新增产品</button>
</form>

<!--主体-->
<table class="table table-bordered table-hover tab_center definewidth m10 tab_middle ">
    <tr>
        <th>编号</th>
        <th>图片</th>
        <!--<th>代码</th>-->
        <th>名称</th>
        <!--<th>资金方</th>-->
        <!--<th>银行类型</th>-->
        <!--<th>城市</th>-->
        <!--<th>金额下限</th>-->
        <!--<th>金额上限</th>-->
        <!--<th>添加时间</th>-->
        <!--<th>产品状态</th>-->
        <!--<th>上次登录时间</th>-->
        <!--<th>上次登录IP</th>-->
        <th>操作</th>
        <th>删除</th>
    </tr>
    <?php if(is_array($data)): $i = 0; $__LIST__ = array_slice($data,0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>



            <td><?php echo ($i); ?></td>
            <td><img src="/Public<?php echo ($vo["img_roasting"]); ?>" style="width:50px;cursor:pointer;"></td>
            <!--<td><?php echo ($vo["code"]); ?></td>-->
            <td><?php echo ($vo["name"]); ?></td>
            <!--<td><?php echo ($vo["source"]); ?></td>-->
            <!--<td>-->
                <!--<?php if($vo["banks"] == 1 ): ?>银行类<?php endif; ?>-->
                <!--<?php if($vo["banks"] == 0 ): ?>非银类<?php endif; ?>-->
            <!--</td>-->
            <!--<td><?php echo ($vo["city"]); ?></td>-->
            <!--<td><?php echo ($vo["min_money"]); ?></td>-->
            <!--<td><?php echo ($vo["max_money"]); ?></td>-->
            <!--<td><?php echo ($vo["add_time"]); ?></td>-->
            <!--<td><?php echo ($vo["state"]); ?></td>-->
            <!--<td><?php echo ($vo["enter_time"]); ?></td>-->
            <!--<td><?php echo ($vo["enter_ip"]); ?></td>-->
            <td>
                <a href="javascript:;" class="change_item" val="<?php echo ($vo['id']); ?>">替换产品</a> <span style="font-size:16px;">|</span>
                <a href="javascript:;" class="addnew_img" val="<?php echo ($vo['p_id']); ?>">替换图片</a>

                <!--<a href="#" onclick="return menu_delete('<?php echo ($vo["delete"]); ?>','<?php echo ($vo["menu"]); ?>')">删除</a>-->
            </td>
            <td><a href="javascript:;" class="deleting" val="<?php echo ($vo['id']); ?>">删除</a></td>

        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

</table>




<!--替换图片-->
<div class="tooltips" id="tooltips">
    <div class="tlp_tle" id="tlp_tle">替换图片<span>×</span></div>
    <div class="tlp_text">
        <table class="table table-hover tab_center definewidth m10" id="tk_img_th">
            <tr>
                <td width="50%" style="padding:5px;border:none;" id="tky_img">
                    <div id="yu_img" style="width: 100%;height:auto;">

                    </div>
                    <!--<img class="show_img" id="yuan_img" src="/Public<?php echo ($product["img_url"]); ?>" style="width:119px;height:105px;border-radius:5px;vertical-align: middle;">-->


                </td>
                <td style="padding:5px;border:none;" id="tk_img_btn">
                    <div id="box">
                        <div id="test" ></div>

                    </div>
                </td>

            </tr>
            <tr>
                <td colspan="2" style="padding-top:10px;border:none;">
                    <input type="button" id="img_sure" value="确定">
                </td>
            </tr>


        </table>
    </div>
</div>



<!--页码-->
<!--<div class="inline page">&lt;!&ndash; pull-right&ndash;&gt;-->
    <!--<a href="<?php if($page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('System/admin_list',array('page'=>$page_number['page']-1)); endif; ?>">«</a>-->
    <!--<?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?>-->
        <!--<a href="javascript:;">...</a>-->
    <!--<?php endif; ?>-->
    <!--<?php $__FOR_START_11215__=1;$__FOR_END_11215__=$page_number['count'];for($i=$__FOR_START_11215__;$i <= $__FOR_END_11215__;$i+=1){ ?>-->

        <!--<?php if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): ?>-->
            <!--<?php if($i == $page_number['page'] ): ?>-->
                <!--<a href="javascript:;" class="current"><?php echo ($i); ?></a>-->
                <!--<?php else: ?>-->
                <!--<a href="<?php echo U('System/admin_list',array('page'=>$i));?>"><?php echo ($i); ?></a>-->
                <!--&lt;!&ndash;<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>&ndash;&gt;-->
            <!--<?php endif; ?>-->
            <!--<?php else: ?>-->
        <!--<?php endif; ?>-->

    <!--<?php } ?>-->
    <!--<?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?>-->
        <!--<a href="javascript:;">...</a>-->
    <!--<?php endif; ?>-->
    <!--<a href="<?php if($page_number['page'] == $page_number['count'] ): ?>javascript:;<?php else: echo U('System/admin_list',array('page'=>$page_number['page']+1)); endif; ?>">»</a>-->

<!--</div>-->

   <!--<div class="shadow" style="position: absolute;left:0;top: 0;height: 100%;width: 100%;opacity:0.5;background: #000; z-index:22;display:none">

   </div>-->





<script>


    var btn_addnew_img = true;
    var btn_change_item= true;


    $(function(){

        $(document).on('click','#tlp_tle>span',function(){
            location.reload();
        });

        //替换图片确定按钮
        $(window).click(function (e) {


            // console.log(e.target.id,e);
            if(e.target.id == 'img_sure'){


                // console.log(111);

                // var data_id=$(".addnew_img").attr("val");
                var data_id = $('#tooltips > div.tlp_text').attr('img_change');
                var Img_id=$("input[name='img_url']").val();
                console.log(Img_id);
                $.post('<?php echo U("Product/present");?>',{data:data_id,img_roasting:Img_id},function(msg){
                    console.log(msg)
                    if(msg.status == 1) {
                        alert('修改成功')
                        location.reload();
                    } else {
                        alert('修改失败')
                    }

                })

                $('#tooltips').hide();

            }
        })


        //替换图片按钮

        $('.addnew_img').on('click',function(){
            if(!btn_addnew_img){
                return;
            }else{
                btn_addnew_img = false;
            }

            var img_change = $(this).attr('val');

            $('#tooltips').show();
            $('#tooltips > div.tlp_text').attr('img_change',img_change);

            var data_id=$(this).attr("val");

            $.post('<?php echo U("Product/img_url");?>',{data:data_id},function (msg) {

                $('#yu_img').before('<img class="curent_img"   src="/Public'+msg.code+'"/>')

            })




        });




        $('.deleting').click(function(){
            var id = $(this).attr('val');
            // alert(id);
//            var state = $(this).attr('state');
            var _this = $(this);
            $.post("<?php echo U('Admin/Product/roasting_deleting');?>",{id:id},function(code){
                if(code.status == 1) {
                    alert('删除成功')
                    location.reload();
                } else {
                    alert('删除失败')
                    location.reload();
                }
            },'json')
        });

        //新增产品按钮

        $("#addnew").click(function(){
            // $(".shadow").show();



            var table1='<table class="table table-bordered table-hover  definewidth m10 choose_menu">\n' +
                '     <tr>\n' +
                '         <th style="text-align: center">产品名称</th>\n' +
                '         <th style="text-align: center">类别</th>\n' +
                '         <th style="text-align: center">广告轮播</th>\n' +
                '         <th style="text-align: center">产品图片</th>\n' +
                '     </tr>\n' +
                '     <?php if(is_array($data2)): $i = 0; $__LIST__ = $data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>\n' +
                '     <tr class="tr_decide">\n' +
                '        <td style="vertical-align: middle">\n' +
                '            <?php if($vo["img_roasting"] == '' ): ?>\n' +
                '                <input type="checkbox" name="box"  value="<?php echo ($vo["id"]); ?>" disabled placeholder="">&nbsp;<?php echo ($vo["name"]); ?>\n' +
                '                <?php else: ?>\n' +
                '                <input type="checkbox" name="box"  value="<?php echo ($vo["id"]); ?>">&nbsp;<?php echo ($vo["name"]); ?>\n' +
                '<?php endif; ?>\n' +
                '        </td>\n' +
                '        <td style="text-align: center;vertical-align: middle">\n' +
                '            <?php if($vo["banks"] == 1 ): ?>银行类<?php endif; ?>\n' +
                '            <?php if($vo["banks"] == 0 ): ?>非银类<?php endif; ?>\n' +
                '        </td>\n' +
                '         <td style="text-align: center;vertical-align: middle"><img src="/Public<?php echo ($vo["img_roasting"]); ?>" style="width:50px;cursor:pointer;"></td>\n' +
                '         <td style="text-align: center;vertical-align: middle"><img src="/Public<?php echo ($vo["img_url"]); ?>" style="width:50px;cursor:pointer;"></td>\n' +
                '     </tr>\n' +
                '<?php endforeach; endif; else: echo "" ;endif; ?>\n' +
                '\n' +
                '     <tr>\n' +
                '        <td colspan="4">\n' +
                '            <input type="button" id="btn_sure" value="确定">\n' +
                '        </td>\n' +
                '     </tr>\n' +
                '\n' +
                ' </table>';
            $('table').last().remove();


            var tk = '<div class="tooltips" style="width:60%;display:block;" id="tooltips">\n' +
                '    <div class="tlp_tle" id="tlp_tle">新增产品<span>×</span></div>\n' +
                '    <div class="tlp_text">\n' +
                '<div style="width:95%;margin:0 auto;overflow: auto;">' +
                table1+
                '</div>'+
                '    </div>\n' +
                '</div>';
            $('body').append(tk);

            // $("table").after(table1)


        });

          //新增产品确定按钮
        $(document).on('click','#btn_sure',function(){
            var arr=[];
            $("input[type='checkbox']").each(function(){
                if($(this).is(':checked')){
                    arr.push($(this).val());
                };

            })
            $.post('<?php echo U("Admin/Product/activity");?>',{'data':arr},function(msg){
                if(msg.status == 1){
                    alert("添加成功");
                    location.reload();
                }else if(msg.status == 2){
                    alert("最多只能添加5条活动产品");
                    location.reload();
                }else if(msg.status == 3){
                    alert("最多只能添加5条活动产品");
                    location.reload();
                }else{
                    alert("添加失败");
                    location.reload();
                }
            })
            console.log(arr)
            $(".choose_menu").remove();
            location.reload();
        });



        //替换产品按钮

        $(".change_item").click(function () {



            if(!btn_change_item){
                return;
            }else{
                btn_change_item=false;
            }


            var this_id =$(this).attr('val');
            // console.log(this_id);
            var str="";

            $.post('<?php echo U("Product/present_activity");?>',{data:this_id},function(msg){
                  // console.log(msg.code)
                var data=msg.code;
                  console.log(data);

                  $.each(data, function(k,v){


                      var banks = v.banks=='1' ? '银行':'非银行';

                      str+='<tr class="tr_decide"><td style="vertical-align: middle"><label for="box_'+v.id+'" style="width:100%;heght:100%;text-align:center;">' +
                          '<input type="radio" name="box" id="box_'+v.id+'"  value="'+v.id+'" placeholder="">' +
                          '</td></label><td style="text-align: center;vertical-align: middle">'+v.name+'</td><td style="text-align: center;vertical-align: middle">'+banks+'</td><td style="text-align: center;vertical-align: middle"><img style="width:50px;cursor:pointer;" src="/Public'+v.img_roasting+'"/></td><td style="text-align: center;vertical-align: middle"><img style="width:50px;cursor:pointer;" src="/Public'+v.img_url+'"/></td><tr>';



                         /* console.log(k);
                          console.log(v);*/
                   });
                var table2='<table class="table table-bordered table-hover  definewidth m10 choose_menu">\n' +
                    '    <tr>\n' +
                    '<th style="text-align: center">选择</th>\n' +
                    '<th style="text-align: center">产品名称</th>\n' +
                    '        <th style="text-align: center">类别</th>\n' +
                    '        <th style="text-align: center">广告轮播</th>\n' +
                    '        <th style="text-align: center">产品图片</th>\n' +

                    '    </tr>\n' +str+
                    '<tr> <td colspan="5" style="text-align: center"><input type="button" id="change_sure" value="确定"></td></tr>\n' +
                    '</table>';

                // console.log(table2);
                var tk = '<div class="tooltips" style="width:60%;display:block;" id="tooltips">\n' +
                    '    <div class="tlp_tle" id="tlp_tle">替换产品<span>×</span></div>\n' +
                    '    <div class="tlp_text">\n' +
                    '<div style="width:95%;margin:0 auto;max-height:550px;overflow: auto;">' +
                    table2+
                    '</div>'+
                    '    </div>\n' +
                    '</div>';
                $('body').append(tk);
                // $("body").append(table2);


            })


         //替换产品确定按钮

            $(document).on('click','#change_sure',function(){
                // $(".shadow").hide();
//                console.log($("tr.tr_decide"));

//                $("tr.tr_decide").each(function () {
//                    $(this).find("td").find("input[type='radio']").attr('checked',true)
//                })


                var change_id=$('input[type="radio"][name="box"]:checked').val();
                $.post('<?php echo U("Product/present_del");?>',{p_id:change_id,data:this_id},function(msg){

                    if(msg.status == 1){
                        alert("替换成功");
                        location.reload();
                    }else if(msg.status == 2){
                        alert("已有该产品，请重新选择！");
                        location.reload();
                    } else{
                        alert("替换失败");
                        location.reload();
                    }
                })
                console.log(change_id)
                $(".choose_menu").remove();

            });

        })



    })



    $('#test').diyUpload({
        url:'<?php echo U("File/img_file",array("type"=>"roasting"));?>',
        addimg:"/Public",//设置添加按钮图片根目录
        btn_no:'2',
        success:function( data ) {

            if(data.status === 1){

                var url = data.result.src;

                var ipt = "<input type='hidden' name='img_url' value='"+url+"'>";

                $('#box').before(ipt);


                            $(".webuploader-pick").hide();
                            $(".curent_img").remove();
                            $("#tky_img").remove();
                            $("#tk_img_btn").attr('colspan','2');
                            // $("#box").css({'width':'50','margin':'0 auto'});
                            $("#tk_img_th").css({'width':'20%','margin':'0 auto'});

            }else{

            };

        }
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