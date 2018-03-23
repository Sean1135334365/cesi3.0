<?php if (!defined('THINK_PATH')) exit();?><li id="table2">
    <div class="li_title">贷款类型</div>
    <div class="check_btn">
        <!--<form class="form-inline definewidth m10" action="<?php echo U('Product/product_list');?>" method="get">
            &lt;!&ndash;条件查询：&ndash;&gt;
            <input type="text" name="name" id="name2" class="abc input-default" placeholder="产品名称/产品代码" value="">&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;-->
            <button type="button" class="btn btn-success" id="addnew2">添加</button>
            <input type="hidden" value="2"/>
        <!--</form>-->
    </div>
    <table class="table table-bordered table-hover tab_center definewidth m10">
        <tr>
            <th>编号</th>
            <th>名称</th>
            <th>编辑</th>
        </tr>
        <?php if(is_array($ht_data)): $i = 0; $__LIST__ = $ht_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($i); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td>
                    <a href="javascript:;" class="save">编辑</a>
                    <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                    <input type="hidden" value="2"/>
                    <span>|</span>
                    <a href="javascript:;" class="delete" tid="<?php echo ($vo["id"]); ?>" typ="loans_type">删除</a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div class="inline page"><!-- pull-right-->
        <?php if($ht_page_number['page'] == 1 ): ?><a href="javascript:;">«</a><?php endif; ?>
        <?php if($ht_page_number['page'] != 1 ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($ht_page_number['page']-1); ?>" dj="2">«</a><?php endif; ?>
        <?php if(($ht_page_number['count'] > 10) AND ($ht_page_number['page'] > 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
        <?php $__FOR_START_1318562594__=1;$__FOR_END_1318562594__=$ht_page_number['count'];for($i=$__FOR_START_1318562594__;$i <= $__FOR_END_1318562594__;$i+=1){ if(($i > $ht_page_number['page'] - 3) AND (($i < $ht_page_number['page'] + 3) OR (($ht_page_number['page'] <= 3) AND ($i <= 10)))): if($i == $ht_page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                    <?php else: ?>
                    <a href="javascript:;" class="ajax_page" page="<?php echo ($i); ?>" dj="2"><?php echo ($i); ?></a><?php endif; ?>
                <?php else: endif; } ?>
        <?php if(($ht_page_number['count'] > 6) AND ($ht_page_number['page'] <= $ht_page_number['count'] - 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
        <?php if($ht_page_number['page'] == $ht_page_number['count'] ): ?><a href="javascript:;">»</a><?php endif; ?>
        <?php if($ht_page_number['page'] < $ht_page_number['count'] ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($ht_page_number['page']+1); ?>" dj="2">»</a><?php endif; ?>
    </div>
    <input type="hidden" value="" id="hidden">
</li>

<script>
    $('#hidden').on('change',function(){
           var msg=$(this).val();
           var arr=msg.split(',');
           console.log(msg);
           console.log(arr);
           /*修改地址*/
           $.post("http://cesi3.0.com/index.php/Admin/Product/parameter_list_page.html",{dj:arr[0],page:arr[1]},function(res){
               if(arr[0] === '1'){
                   $("#architecture").html('');
                   $("#architecture").html(res);
               }else if(arr[0] === '2'){
                   $("#loan").html('');
                   $("#loan").html(res);
               }else if(arr[0] === '3'){
                   $("#repayments").html('');
                   $("#repayments").html(res);
               }
           });
       })
    $(function(){
        $('.ajax_page').click(function(){
            var page = $(this).attr('page');
            var dj = $(this).attr('dj');
            //            alert(page);
            //            alert(dj);
            //            alert(s_id);
            $.post("<?php echo U('Admin/Product/parameter_list_page');?>",{page:page,dj:dj},function(res){
                if(dj === '1'){
                    $("#architecture").html(res);
                }else if(dj === '2'){
                    $("#loan").html(res);
                }else{
                    $("#repayments").html(res);
                }

            });
        });
    })
    $(function(){
        $("#addnew2").click(function(){
            var type= $(this).next().val();
            edit_list2(type);
        })
    })
    function edit_list2(type){
        layer.open({
            type: 2,
            title: '添加',
            area: ['300px', '200px'],
            shade: 0.8,
            closeBtn: 0,
            shadeClose: true,
            content: ["<?php echo U('Admin/Product/wechat_update',array('type'=>'2','page'=>$ht_page_number['page']));?>",'no']      
            //content: ["<?php echo U('Admin/Product/wechat_update/type/"+type+"');?>",'no']
            /*end: function () {
                location.reload();
            }*/

        })
    }
    $(function(){




        $('.delete').click(function(){
            var a = $(this);
            var tid = a.attr('tid');
            var typ = a.attr('typ');
            var text = a.parent().parent().find('td').eq(1).text();
            layer.confirm('您确定要删除('+text+')吗？', {
                btn: ['是','否'] //按钮
            }, function(){
                $.post("<?php echo U('Product/parameter_delete');?>",{tid:tid,typ:typ},function(res){
                    if(res.status === 1){
                        layer.msg(res.info,{icon:1,time:1000});
//                        alert(res.info);
                        a.parent().parent().remove();
                    }else{
                        layer.msg(res.info,{icon:0,time:1000});
//                        alert(res.info);
                    }
                });
            }, function(){


            });

        });







        $(".save").click(function(){
            if($(this).parent().prev().find('input').attr('bol')==="true"){
                return false;
            }else{
                var type = $(this).next().next().val();
                var value = $(this).parent().prev().text();
                var id= $(this).next().val();
                $(this).parent().prev().html('<input type="text" name="name" bol="true" value='+value+' style="width: 100px;text-align:center;" class="focal" />');
                $(".focal").blur(function(){
                    var name = $(this).val();
                    var _this=$(this);
                    console.log(_this);
                    layer.confirm('您确定修改吗？', {
                        btn: ['是','否'] //按钮
                    }, function(){
                        $.post("<?php echo U('Admin/Product/uplode');?>",{name:name,id:id,type:type},function(res) {
                            if(res['status']==1){
                                layer.msg(res['msg'],{icon:1,time:1000});
                                var name2 = _this.val();
                                _this.parent().text(name2);
                                $(this).parent().prev().find('input').attr('bol','false');
                                //                                    location.reload();
                            }else{
                                layer.msg(res['msg'],{icon:0,time:1000});
                                _this.parent().text(name);
                                _this.parent().prev().find('input').attr('bol','false');
                            }
                        },'json');
                    }, function() {
                        _this.parent().text(value);
                    });

                });
            }

        });
    });
</script>