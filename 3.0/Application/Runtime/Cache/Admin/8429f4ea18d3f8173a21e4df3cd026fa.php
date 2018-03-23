<?php if (!defined('THINK_PATH')) exit();?><ul>
    <li>
        <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="li_title" style="margin: 0px -12px 20px -12px;text-align:center;" text-align=""><?php echo ($vo["name"]); ?>
                <div style="float: right;" class="boot_1">
                    <!--<?php if($vo["forbidden"] == 1): ?><a href="javascript:;" class="boot_up">已启用</a>
                        <?php elseif($vo["forbidden"] == 0): ?><a href="javascript:;" class="boot_up">已禁用</a><?php endif; ?>-->
                    <?php if($vo["forbidden"] == 1): ?><button type="button" class="btn btn-success"> 已启用 </button>
                        <?php else: ?><button type="button" class="btn btn-success"> 已禁用 </button><?php endif; ?>
                </div>
                <input type="hidden" value="<?php echo ($vo["forbidden"]); ?>"/>
                <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>

            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <table class="table table-bordered table-hover tab_center definewidth m10">
            <tr>
                <th>编号</th>
                <th>名称</th>
                <!--<th>编辑</th>-->
                <th>禁用</th>
            </tr>
            <?php if(is_array($t_data)): $i = 0; $__LIST__ = $t_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td><?php echo ($i); ?></td>
                    <td><?php echo ($vo["name"]); ?></td>
                    <!--<td>
                        <a href="javascript:;" class="city_save" dj="<?php echo ($vo["grade"]); ?>" yiji="<?php echo ($vo["id"]); ?>">编辑</a>
                        <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                    </td>-->
                    <td style="cursor:pointer;">
                        <div class="booo_2">
                            <?php if($vo["forbidden"] == 1): ?><a href="javascript:;" >已启用</a>
                                <?php else: ?><a href="javascript:;">已禁用</a><?php endif; ?>
                        </div>
                        <input type="hidden" value="<?php echo ($vo["forbidden"]); ?>"/>
                        <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </table>
        <div class="inline page"><!-- pull-right-->
            <?php if($t_page_number['page'] == 1 ): ?><a href="javascript:;">«</a><?php endif; ?>
            <?php if($t_page_number['page'] != 1 ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($t_page_number['page']-1); ?>" s_id="<?php echo ($id); ?>" dj="1">«</a><?php endif; ?>
            <!--<a href="<?php if($t_page_number['page'] == 1 ): ?>javascript:;<?php else: echo U('Product/area_list_page',array('page'=>$t_page_number['page']-1,'id'=>$id,'dj'=>'1')); endif; ?>">«</a>-->
            <?php if(($t_page_number['count'] > 10) AND ($t_page_number['page'] > 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
            <?php $__FOR_START_5127__=1;$__FOR_END_5127__=$t_page_number['count'];for($i=$__FOR_START_5127__;$i <= $__FOR_END_5127__;$i+=1){ if(($i > $t_page_number['page'] - 3) AND (($i < $t_page_number['page'] + 3) OR (($t_page_number['page'] <= 3) AND ($i <= 10)))): if($i == $t_page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                        <?php else: ?>
                        <a href="javascript:;" class="ajax_page" page="<?php echo ($i); ?>" s_id="<?php echo ($id); ?>" dj="1"><?php echo ($i); ?></a>
                        <!--<a href="<?php echo U('Product/area_list_page',array('page'=>$i,'id'=>$id,'dj'=>'1'));?>"><?php echo ($i); ?></a>-->
                        <!--<li class="page"><a href="<?php echo U('System/catalog_list',array('page'=>$i));?>"><?php echo ($i); ?></a></li>--><?php endif; ?>
                    <?php else: endif; } ?>
            <?php if(($t_page_number['count'] > 6) AND ($t_page_number['page'] <= $t_page_number['count'] - 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
            <?php if($t_page_number['page'] == $t_page_number['count'] ): ?><a href="javascript:;">»</a><?php endif; ?>
            <?php if($t_page_number['page'] < $t_page_number['count'] ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($t_page_number['page']+1); ?>" s_id="<?php echo ($id); ?>" dj="1">»</a><?php endif; ?>

            <!--<a href="<?php if($t_page_number['page'] == $t_page_number['count'] ): ?>javascript:;<?php else: echo U('Product/area_list_page',array('page'=>$t_page_number['page']+1,'id'=>$id,'dj'=>'1')); endif; ?>">»</a>-->
        </div>

        <script>
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

                $('.city_save').click(function(){
        //            var id = $(this).next().val();
                    var dj = $(this).attr('dj');
                    var yiji = $(this).attr('yiji');
                    $.post("<?php echo U('Admin/Product/area_list_page2');?>",{id:yiji,dj:dj},function(res){
                        $("#dj2").html(res);
                    });
                })

/*全禁止*/
                $('.boot_1').click(function(){
                    var b1 = $(this);
                    var forbidden = $(this).next().val();
                    var id = $(this).next().next().val();
                    $.post("<?php echo U('Admin/Product/all_boot_up');?>",{forbidden:forbidden,id:id},function(res){
                        if(res['status']==1){
                            if(res['forbidden'] == 1){
                                b1.children().text('已启用');
                            }else{
                                b1.children().text('已禁用');
                                $('.booo_2').children().text('已禁用');
                            }
                            layer.msg(res['info']);
                        }else{
                            layer.msg(res['info']);
                        }
                    },'json');
                })
                $('.ajax_page').click(function(){
                    var page = $(this).attr('page');
                    var dj = $(this).attr('dj');
                    var s_id = $(this).attr('s_id');
        //            alert(page);
        //            alert(dj);
        //            alert(s_id);
                    $.post("<?php echo U('Admin/Product/area_list_page');?>",{page:page,dj:dj,id:s_id},function(res){
                        $("#dj1").html(res);
                    });
                });
            })
        </script>
        <!--<script>-->
            <!--$(function(){-->
                <!---->
            <!--})-->
        <!--</script>-->

    </li>
</ul>