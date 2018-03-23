<?php if (!defined('THINK_PATH')) exit();?><li>
    <div class="li_title">
        <?php if($type == 1 ): ?>建筑类型<?php endif; ?>
        <?php if($type == 2 ): ?>贷款类型<?php endif; ?>
        <?php if($type == 3 ): ?>还款方式<?php endif; ?>
        <?php if($type == 4 ): ?>贷款期限<?php endif; ?>
        <!--建筑类型-->

    </div>
    <div class="check_btn">
        <!--<form class="form-inline definewidth m10" action="<?php echo U('Product/product_list');?>" method="get">
            &lt;!&ndash;条件查询：&ndash;&gt;
            <input type="text" name="name" id="name" class="abc input-default" placeholder="产品名称/产品代码" value="">&nbsp;&nbsp;
            <button type="submit" class="btn btn-primary">查询</button>&nbsp;&nbsp;-->
            <button type="button" class="btn btn-success addnew" id="addnew">添加</button>
            <input type="hidden" value="<?php echo ($type); ?>"/>
        <?php if($type == 1 ): ?><input type="hidden" class="sjb" sjb="house_type"/><?php endif; ?>
        <?php if($type == 2 ): ?><input type="hidden" class="sjb" sjb="loans_type"/><?php endif; ?>
        <?php if($type == 3 ): ?><input type="hidden" class="sjb" sjb="repayment_pattern"/><?php endif; ?>
        <?php if($type == 4 ): ?><input type="hidden" class="sjb" sjb="month"/><?php endif; ?>
        <!--</form>-->
    </div>
    <table class="table table-bordered table-hover tab_center definewidth m10">
        <tr>
            <th>编号</th>
            <th>
                <?php if($type == 4 ): ?>月份<?php else: ?>名称<?php endif; ?>
            </th>
            <th>编辑</th>
        </tr>
        <?php if(is_array($ht_data)): $i = 0; $__LIST__ = $ht_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($i); ?></td>
                <td>

                    <?php if($type == 4): if($vo['month'] > 12): ?><span><?php echo ($vo['month']/12); ?></span>年<?php else: ?><span><?php echo ($vo["month"]); ?></span>个月<?php endif; else: ?><span><?php echo ($vo["name"]); ?></span><?php endif; ?>


                </td>
                <td>
                    <a href="javascript:;" class="save">编辑</a>
                    <input type="hidden" value="<?php echo ($vo["id"]); ?>"/>
                    <input type="hidden" value="<?php echo ($type); ?>"/>
                    <span>|</span>
                    <?php if($type == 1 ): ?><a href="javascript:;" class="delete" tid="<?php echo ($vo["id"]); ?>" typ="house_type">删除</a><?php endif; ?>
                    <?php if($type == 2 ): ?><a href="javascript:;" class="delete" tid="<?php echo ($vo["id"]); ?>" typ="loans_type">删除</a><?php endif; ?>
                    <?php if($type == 3 ): ?><a href="javascript:;" class="delete" tid="<?php echo ($vo["id"]); ?>" typ="repayment_pattern">删除</a><?php endif; ?>
                    <?php if($type == 4 ): ?><a href="javascript:;" class="delete" tid="<?php echo ($vo["id"]); ?>" typ="month">删除</a><?php endif; ?>
                    <!--<a href="javascript:;" class="delete" tid="<?php echo ($vo["id"]); ?>" typ="house_type">删除</a>-->
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <div class="inline page"><!-- pull-right-->
        <?php if($ht_page_number['page'] == 1 ): ?><a href="javascript:;">«</a><?php endif; ?>
        <?php if($ht_page_number['page'] != 1 ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($ht_page_number['page']-1); ?>" dj="<?php echo ($type); ?>">«</a><?php endif; ?>
        <?php if(($ht_page_number['count'] > 10) AND ($ht_page_number['page'] > 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
        <?php $__FOR_START_30296__=1;$__FOR_END_30296__=$ht_page_number['count'];for($i=$__FOR_START_30296__;$i <= $__FOR_END_30296__;$i+=1){ if(($i > $ht_page_number['page'] - 3) AND (($i < $ht_page_number['page'] + 3) OR (($ht_page_number['page'] <= 3) AND ($i <= 10)))): if($i == $ht_page_number['page'] ): ?><a href="javascript:;" class="current"><?php echo ($i); ?></a>
                    <?php else: ?>
                    <a href="javascript:;" class="ajax_page" page="<?php echo ($i); ?>" dj="<?php echo ($type); ?>"><?php echo ($i); ?></a><?php endif; ?>
                <?php else: endif; } ?>
        <?php if(($ht_page_number['count'] > 6) AND ($ht_page_number['page'] <= $ht_page_number['count'] - 3) ): ?><a href="javascript:;">...</a><?php endif; ?>
        <?php if($ht_page_number['page'] == $ht_page_number['count'] ): ?><a href="javascript:;">»</a><?php endif; ?>
        <?php if($ht_page_number['page'] < $ht_page_number['count'] ): ?><a href="javascript:;" class="ajax_page" page="<?php echo ($ht_page_number['page']+1); ?>" dj="<?php echo ($type); ?>">»</a><?php endif; ?>
    </div>
    <input type="hidden" value="" class="hidden">
</li>

<script>
    $('.hidden').on('change',function(){
           var msg=$(this).val();
           var arr=msg.split(',');
           console.log(msg);
           console.log(arr);
           /*修改地址*/
//           $.post("http://cesi3.0.com/index.php/Admin/Product/parameter_list_page.html",{dj:arr[0],page:arr[1]},function(res){
           $.post("<?php echo U('Admin/Product/parameter_list_page');?>",{dj:arr[0],page:arr[1]},function(res){
               if(arr[0] === '1'){
                   $("#architecture").html('');
                   $("#architecture").html(res);
               }else if(arr[0] === '2'){
                   $("#loan").html('');
                   $("#loan").html(res);
               }else if(arr[0] === '3'){
                   $("#repayments").html('');
                   $("#repayments").html(res);
               }else if(arr[0] === '4'){
                   $("#usury").html('');
                   $("#usury").html(res);
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
                }else if(dj === '4'){
                    $("#usury").html(res);
                }else{
                    $("#repayments").html(res);
                }

            });
        });
    })
    $(function(){
        $(".addnew").unbind();
        $(".addnew").click(function(){
            var type= $(this).next().val();
            edit_list(type);
        })
    })
    function edit_list(type){
        if(type == 1){
            var content = ["<?php echo U('Admin/Product/wechat_update',array('type'=>'1','page'=>$ht_page_number['page']));?>",'no'];
        }else if(type == 2){
            var content = ["<?php echo U('Admin/Product/wechat_update',array('type'=>'2','page'=>$ht_page_number['page']));?>",'no'];
        }else if(type == 3){
            var content = ["<?php echo U('Admin/Product/wechat_update',array('type'=>'3','page'=>$ht_page_number['page']));?>",'no'];
        }else if(type == 4){
            var content = ["<?php echo U('Admin/Product/wechat_update',array('type'=>'4','page'=>$ht_page_number['page']));?>",'no'];
        }
        layer.open({
            type: 2,
            title: '添加',
            area: ['300px', '200px'],
            shade: 0.8,
            closeBtn: 0,
            shadeClose: true,
            //content: ["<?php echo U('Admin/Product/wechat_update/type/"+type+"');?>",'no']
            content: content
//           content: ["<?php echo U('Admin/Product/wechat_update',array('type'=>'1','page'=>$ht_page_number['page']));?>",'no']
            /*end: function () {
             location.reload();
             }*/

        })
    }
</script>