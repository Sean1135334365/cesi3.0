<?php if (!defined('THINK_PATH')) exit();?><table class="table table-bordered table-hover tab_center definewidth m10">
    <tr>
        <th>编号</th>
<!--        <th>openid</th>-->
        <th>用户微信号</th>
        <th>昵称</th>
        <th>备注</th>
        <th>头像</th>
        <th>性别</th>
        <th>城市</th>
        <th>是否关注微信</th>
        <!--<th>access_token</th>-->
        <!--<th>refresh_token</th>-->
        <th>授权</th>
        <th>创建时间</th>
        <th>创建时IP</th>
        <th>渠道号</th>
        <th>操作</th>
    </tr>

    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
            <td><?php echo ($i); ?></td>
            <!--<td class="omit"><?php echo ($vo["openid"]); ?></td>-->
            <td><?php echo ($vo["wx_number"]); ?></td>
            <td><?php echo ($vo["nickname"]); ?></td>
            <td><?php echo ($vo["remarks"]); ?></td>
            <td><img src="<?php echo ($vo["headimgurl"]); ?>" style="width:25px;"></td>
            <td>
                <?php if($vo['sex'] == '1'): ?>男
                    <?php else: ?>
                    女<?php endif; ?>
            </td>
            <td>
                <?php if($vo['province'] != ''): echo ($vo["province"]); ?>
                    <?php if($vo['city'] != ''): ?>><?php echo ($vo["city"]); endif; ?>
                    <?php else: ?>
                    <?php echo ($vo["city"]); endif; ?>
            </td>
            <td><?php echo ($vo["wxfollow"]); ?></td>
            <!--<td><?php echo ($vo["access_token"]); ?></td>-->
            <!--<td><?php echo ($vo["refresh_token"]); ?></td>-->
            <td>
                <?php if($vo['is_auth'] == '1'): ?>已授权
                    <?php else: ?>
                    未授权<?php endif; ?>
            </td>
            <td><?php echo (date("Y/m/d H:i:s",$vo["w_time"])); ?></td>
            <td><?php echo ($vo["create_ip"]); ?></td>
            <td><?php echo ($vo["channel_number"]); ?></td>
            <td>
                <a href="<?php echo U('User/wechat_update',array('id'=>$vo['id']));?>">修改</a> <!--<span style="font-size:16px;">|</span>-->
                &nbsp;&nbsp;
                <span class="authorise">
                    <?php if($vo['is_auth'] == '1'): ?><a href="javascript:;" value="0" >禁止</a>
                    <?php else: ?>
                        <a href="javascript:;" value="1" >授权</a><?php endif; ?>
                </span>
                <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                <!--<a href="<?php echo U('System/wechat_update',array('id'=>$vo['id']));?>" onclick="return menu_delete('<?php echo ($vo["delete"]); ?>','<?php echo ($vo["menu"]); ?>')">删除</a>-->
            </td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class="inline page">
    <?php if($page_number['page'] == 1 ): ?><a href="javascript:;">«</a><?php endif; ?>
    <?php if($page_number['page'] != 1 ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($page_number['page']-1); ?>" qy="1">«</a><?php endif; ?>
    <?php if(($page_number['count'] > 10) AND ($page_number['page'] > 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
    <?php $__FOR_START_801179668__=1;$__FOR_END_801179668__=$page_number['count'];for($i=$__FOR_START_801179668__;$i <= $__FOR_END_801179668__;$i+=1){ if(($i > $page_number['page'] - 5) AND (($i < $page_number['page'] + 5) OR (($page_number['page'] <= 5) AND ($i <= 10)))): if($i == $page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                <?php else: ?>
                <a href="javascript:;" class="ajax_page" page="<?php echo ($i); ?>" qy="1"><?php echo ($i); ?></a><?php endif; ?>
            <?php else: endif; } ?>
    <?php if(($page_number['count'] > 10) AND ($page_number['page'] <= $page_number['count'] - 5) ): ?><a href="javascript:;">...</a><?php endif; ?>
    <?php if($page_number['page'] == $page_number['count'] ): ?><a href="javascript:;">»</a><?php endif; ?>
    <?php if($page_number['page'] < $page_number['count'] ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($page_number['page']+1); ?>" qy="1">»</a><?php endif; ?>

</div>

<script>
    $(function(){
        $('.ajax_page').click(function(){
            var page = $(this).attr('page');
            var sign_up = $(this).attr('qy');
            $.post("<?php echo U('Admin/User/wechat_list_page');?>",{page:page,sign_up:sign_up},function(res){
                $("#wechat_sign_up").html(res);
            });
        });
    })
    $(function(){
        $('.authorise').click(function(){
            var authorise = $(this).children().attr('value');
            var id = $(this).next().val();
//            alert(authorise);
//            alert(id);
            $.post("<?php echo U('Admin/User/channel_no');?>",{authorise:authorise,id:id},function(code){
                if(code.status === 1) {
                    alert('修改成功!')
                    location.reload();
                } else {
                    alert('修改失败')
                }
            },'json')
        })
    })
</script>