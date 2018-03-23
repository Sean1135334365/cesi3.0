<?php if (!defined('THINK_PATH')) exit();?><table class="table table-bordered table-hover tab_center definewidth m10">
    <tr>
        <th style="width:5%;">编号</th>
        <th style="width:10%;">订单编号</th>
        <th style="width:10%;">签约号</th>
        <th style="width:15%;">申请微信</th>
        <th style="width:10%;">申请金额</th>
        <th style="width:10%;">贷款期限</th>
        <th style="width:10%;">权利人数量</th>
        <th style="width:15%;">申请时间</th>
        <th style="width:10%;">状态</th>
        <th style="width:5%;">操作</th>
    </tr>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($i); ?></td>
            <td><?php echo ($vo["order_number"]); ?></td>
            <td><?php echo ($vo["channel_number"]); ?></td>
            <td><?php echo ($vo["nickname"]); ?></td>
            <td><?php echo ($vo["loanamount"]); ?></td>
            <td><?php echo ($vo["number"]); ?></td>
            <td><?php echo ($vo["p_power_num"]); ?></td>
            <td><?php echo (date("Y-m-d H:i:s",$vo["wx_time"])); ?></td>
            <td id="oid">
                <select name="vo.wx_state" val="<?php echo ($vo["wx_state"]); ?>" aid="<?php echo ($vo["id"]); ?>" style="width: 70%; min-width: 80px;">
                    <option value="">请选择</option>
                    <option value="0" <?php if($vo["wx_state"] == 0): ?>selected="selected"<?php endif; ?> >已提交</option>
                    <option value="1" <?php if($vo["wx_state"] == 1 ): ?>selected="selected"<?php endif; ?> >审核中</option>
                    <option value="7" <?php if($vo["wx_state"] == 7 ): ?>selected="selected"<?php endif; ?> >已进件</option>
                    <option value="3" <?php if($vo["wx_state"] == 3 ): ?>selected="selected"<?php endif; ?> >未通过</option>
                    <option value="2" <?php if($vo["wx_state"] == 2 ): ?>selected="selected"<?php endif; ?> >审核通过</option>
                    <option value="6" <?php if($vo["wx_state"] == 6 ): ?>selected="selected"<?php endif; ?> >待放款</option>
                    <option value="4" <?php if($vo["wx_state"] == 4 ): ?>selected="selected"<?php endif; ?> >完成放款</option>
                    <option value="5" <?php if($vo["wx_state"] == 5 ): ?>selected="selected"<?php endif; ?> >结清</option>
                </select>
            </td>
            <td>
                <a href="<?php echo U('Order/wx_redact',array('id'=>$vo['id']));?>">编辑</a>
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

<div class="inline page">
    <?php if($page_number['page'] == 1 ): ?><a href="javascript:;">«</a><?php endif; ?>
    <?php if($page_number['page'] != 1 ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($page_number['page']-1); ?>" qy="0">«</a><?php endif; ?>
    <?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
    <?php $__FOR_START_1645845263__=1;$__FOR_END_1645845263__=$page_number['count'];for($i=$__FOR_START_1645845263__;$i <= $__FOR_END_1645845263__;$i+=1){ if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): if($i == $page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                <?php else: ?>
                <a href="javascript:;" class="ajax_page" page="<?php echo ($i); ?>" qy="0"><?php echo ($i); ?></a><?php endif; ?>
            <?php else: endif; } ?>
    <?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
    <?php if($page_number['page'] == $page_number['count'] ): ?><a href="javascript:;">»</a><?php endif; ?>
    <?php if($page_number['page'] < $page_number['count'] ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($page_number['page']+1); ?>" qy="0">»</a><?php endif; ?>

</div>
<script>
    $(function(){
        $('.ajax_page').click(function(){
            var page = $(this).attr('page');
            var sign_up = $(this).attr('qy');
            if(sign_up === '1'){
                $.post("<?php echo U('Admin/Order/wx_apply_page');?>",{page:page,sign_up:sign_up},function(res){
                    $("#wx_sign_up").html(res);
                });
            }else if(sign_up === '0'){
                $.post("<?php echo U('Admin/Order/wx_apply_page');?>",{page:page,sign_up:sign_up},function(res){
                    $("#wx_sign_up").html(res);
                });
            }
        });
    })
</script>