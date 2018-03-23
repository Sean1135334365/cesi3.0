<?php if (!defined('THINK_PATH')) exit();?><ul>
    <li>
        <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="li_title" style="margin: 0px -12px 20px -12px;text-align:center;" text-align=""><?php echo ($vo["name"]); ?>

                <!--<botton class="btn btn-success" style="float: right;margin:0 10px;" id="buoot_1">添加</botton>
                <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>

                <?php if($vo["grade"] == '2' and $vo["higher_up"] == '0'): ?><div style="float: right;margin:0 10px;" class="boot_1">
                        <?php if($vo["forbidden"] == 1): ?><a href="javascript:;" class="boot_up">已启用</a>
                            <?php elseif($vo["forbidden"] == 0): ?><a href="javascript:;" class="boot_up">已禁用</a><?php endif; ?>
                    </div>
                    <input type="hidden" value="<?php echo ($vo["forbidden"]); ?>"/>
                    <input type="hidden" value="<?php echo ($vo["id"]); ?>"/><?php endif; ?>-->
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <table class="table table-bordered table-hover tab_center definewidth m10">
            <tr>
                <th>编号</th>
                <th>名称</th>
                <!--<th>编辑</th>-->
                <th>禁用</th>
            </tr>
            <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="otr">
                    <td><?php echo ($i); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <!--<td>
                        <a href="javascript:;" qy="" class="save">编辑</a>
                        <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>

                    </td>-->
                    <td style="cursor:pointer;">
                        <!--<div class="booo_2">&lt;!&ndash; 区域禁止&ndash;&gt;
                        <?php if($vo["forbidden"] == 1): ?><a href="javascript:;">已启用</a>
                            <?php else: ?><a href="javascript:;">已禁用</a><?php endif; ?>
                        </div>-->
                        <div class="boot_1">
                            <?php if($vo["forbidden"] == 1): ?><a href="javascript:;" class="boot_up">已启用</a>
                                <?php elseif($vo["forbidden"] == 0): ?><a href="javascript:;" class="boot_up">已禁用</a><?php endif; ?>
                        </div>
                        <input type="hidden" value="<?php echo ($vo["forbidden"]); ?>"/>
                        <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <!--<div class="inline page">&lt;!&ndash; pull-right&ndash;&gt;
            <?php if($t_page_number['page'] == 1 ): ?><a href="javascript:;">«</a><?php endif; ?>
            <?php if($t_page_number['page'] != 1 ): ?><a href="javascript:;" class="ajax_page2" page="<?php echo ($t_page_number['page']-1); ?>" s_id="<?php echo ($id); ?>" dj="2">«</a><?php endif; ?>
            &lt;!&ndash;<a href="<?php if($t_page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('Product/area_list_page2',array('page'=>$t_page_number['page']-1,'id'=>$id,'dj'=>'2')); endif; ?>">«</a>&ndash;&gt;
            <?php if(($t_page_number['count'] > 10) AND ($t_page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
            <?php $__FOR_START_71__=1;$__FOR_END_71__=$t_page_number['count'];for($i=$__FOR_START_71__;$i <= $__FOR_END_71__;$i+=1){ if(($i > $t_page_number['page'] - 5) AND (($i < $t_page_number['page'] + 5) OR (($t_page_number['page'] <= 5) AND ($i <= 10)))): if($i == $t_page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                        <?php else: ?>
                        <a href="javascript:;" class="ajax_page2" page="<?php echo ($i); ?>" s_id="<?php echo ($id); ?>" dj="2"><?php echo ($i); ?></a>
                        &lt;!&ndash;<a href="<?php echo U('Product/area_list_page2',array('page'=>$i,'id'=>$id,'dj'=>'2'));?>"><?php echo ($i); ?></a>&ndash;&gt;
                        &lt;!&ndash;<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>&ndash;&gt;<?php endif; ?>
                    <?php else: endif; } ?>
            <?php if(($t_page_number['count'] > 10) AND ($t_page_number['page'] <= $t_page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
            <?php if($t_page_number['page'] == $t_page_number['count'] ): ?><a href="javascript:;">»</a><?php endif; ?>
            <?php if($t_page_number['page'] < $t_page_number['count'] ): ?><a href="javascript:;" class="ajax_page2" page="<?php echo ($t_page_number['page']+1); ?>" s_id="<?php echo ($id); ?>" dj="2">»</a><?php endif; ?>

            &lt;!&ndash;<a href="<?php if($t_page_number['page'] == $t_page_number['count'] ): ?>javascript:;<?php else: echo U('Product/area_list_page2',array('page'=>$t_page_number['page']+1,'id'=>$id,'dj'=>'2')); endif; ?>">»</a>&ndash;&gt;
        </div>-->

        <script>

            var page_url = "<?php echo U('Admin/Product/area_list_page2');?>";
            var page_num= "<?php echo ($t_page_number['page']); ?>";
            var page_dj = "2";
            var page_id = "<?php echo ($id); ?>";

            //区域禁止
            $(function(){
                $('.booo_2').click(function(){
                    var b1 = $(this);
                    var forbidden = $(this).next().val();
                    var id = $(this).next().next().val();
                    $.post("<?php echo U('Admin/Product/boot_up');?>",{forbidden:forbidden,id:id},function(res){
                        if(res['status']==1){
                            if(res['forbidden'] == 1){
                                b1.children().text('已启用');
                            }else{
                                b1.children().text('已禁用');
                            }
                            layer.msg(res['info']);
                        }else{
                            layer.msg(res['info']);
                        }
                    },'json');
                })
            })
            function edit_list(id){
                layer.open({
                    type: 2,
                    title: '添加',
                    area: ['300px', '200px'],
                    shade: 0.8,
                    closeBtn: 0,
                    shadeClose: true,
                    content: ["<?php echo U('Admin/Product/area_add',array('id'=>$id,'page'=>$t_page_number['page'],'dj'=>'2'));?>",'no']
//                    content: ["<?php echo U('Admin/Product/area_list',array('id'=>$id,'page'=>$t_page_number['page'],'dj'=>'2'));?>",'no'],
                })
            }

            $(function(){
                $("#buoot_1").click(function(){
                    var id= $(this).next().val();
                    edit_list(id);
                })

            })
            $(function() {
                $('.boot_1').click(function () {
                    var b1 = $(this);
                    var forbidden = $(this).next().val();
                    var id = $(this).next().next().val();
                    $.post("<?php echo U('Admin/Product/all_boot_up');?>", {forbidden: forbidden, id: id}, function (res) {
                        if (res['status'] == 1) {
                            if(res['forbidden'] == 1){
                                b1.children().text('已启用');
                            }else{
                                b1.children().text('已禁用');
                                $('.booo_2').children().text('已禁用');
                            }
                            layer.msg(res['info']);
//                            var bot_stste = forbidden == '1' ? '已禁用' : '已启用';
//                            var bot_stste_num = forbidden == '1' ? '0' : '1';
//                            $('.boot_1 a.boot_up').html(bot_stste);
//                            $('.boot_1').next().val(bot_stste_num);
                        } else {
                            layer.msg(res['info']);
                        }
                    }, 'json');
                })
            });
            $(function(){
                $(".save").click(function(){
                    if($(this).parent().prev().find('input').attr('bol')==="true"){
                        return false;
                    }else{
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
                                $.post("<?php echo U('Admin/Product/area_uplode');?>",{name:name,id:id},function(res) {
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

                })
            })
            $(function(){
                $('.ajax_page2').click(function(){
                    var page = $(this).attr('page');
                    var dj = $(this).attr('dj');
                    var s_id = $(this).attr('s_id');
        //            alert(page);
        //            alert(dj);
        //            alert(s_id);
                    $.post("<?php echo U('Admin/Product/area_list_page2');?>",{page:page,dj:dj,id:s_id},function(res){
                        $("#dj2").html(res);
                    });
                });
            })
        </script>
    </li>
</ul>