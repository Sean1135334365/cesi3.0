/**
 * Created by 84989 on 2017/3/7.
 */
//初始化数据
var show = 1;
var page = new Array();
page[1] = 'first';
page[2] = 'second';
page[3] = 'third';
var loanamount_v = false;
var number_v =false;
var rad = '0';
var mate_y_n = 0;
var img = 0;
var imgnum = 0;
var hei;
var adult_y_n = 0;

var n = new Array();
n[1] = '①';
n[2] = '②';
n[3] = '③';
n[4] = '④';
n[5] = '⑤';
n[6] = '⑥';
n[7] = '⑦';
n[8] = '⑧';
n[9] = '⑨';
n[10] = '⑩';



$(function(){
//初始化界面
    hei = $('.form').height();
    $('.first').css('display', 'block');
    $('.second').css('display', 'none').height(hei + 'px');
    $('.third').css('display', 'none').height(hei + 'px');
    $('.schedule span:nth-of-type(' + show + ')').css({'background-color':'#958c6d','border':'1px solid #8c815d'});

    var html_hei = $('html').height();
    $('html,body,.content').css('height', html_hei + 'px');


    //检查输入内容
    $('#loanamount').blur(function(){
        checkout('loanamount');

    });

    $('#number').change(function(){
        checkout('number');
    });

    //
    //$('#loanamount').bind("input propertychange",function(){
    //    var loa_val = $(this).val();
    //    var len = loa_val.length;
    //    console.log(len);
    //    console.log(loa_val);
    //
    //    var val = Math.round(loa_val);
    //
    //
    //
    //    //if(len >= 3){
    //    //    $(this).attr('type', 'text');
    //    //}
    //    //if(len % 3 === 0){
    //    //    $(this).val(loa_val + ',');
    //    //}
    //    //var hid = loa_val.substr(-1,1);
    //    //console.log(hid);
    //
    //});


    $(document).on('click','input[type="radio"]', function(){
        //console.log($(this).val());
        //console.log($(this).attr('checked'));
        //if($(this).val() != rad){
            var num = $(this).attr('num');
            var rht = $(this).attr('rht');
            var hf = $(this).attr('hf'+ num);
            rad = $(this).val();
        if(hf != '1'){
            switch(num){
                case '1':   //权利人是否成年
                    if(rad === '1'){
                        //成年人
                        //console.log(111111);
                        console.log(1111);
                        if($(this).attr('aut'+rht) === '0'){
                            $(".file[att='"+rht+"'] span").html('上传身份证正反面');
                            $(".file[att='"+rht+"']").css('width','60%');
                            $(".adult_"+rht).css('display','block');
                            $(this).attr('aut'+rht, '1');
                            adult_y_n -= 1;
                        }
                    }else{
                        console.log(2222);
                        $(".file[att='"+rht+"'] span").html('上传出生证明');
                        $(".file[att='"+rht+"']").css('width','50%');
                        $(".adult_"+rht).css('display','none');
                        $('input[aut'+rht+'="1"]').attr('aut'+rht, '0');
                        adult_y_n +=1;

                        //未成年关闭后续操作


                    }
                    $("input[hf1='1']").attr('hf1','0');
                    $(this).attr('hf1', '1');
                    console.log(adult_y_n);
                    break;

                case '2':   //权利人婚姻状况
                    if(rad === '1'){
                        $("div.mate[att='2"+rht+"']").hide();
                        $("div#mate2"+rht).hide();
                    }else if(rad === '4'){
                        $("div.mate[att='2"+rht+"']").hide();
                        $("div#mate2"+rht).show();
                    }else{
                        $("div.mate[att='2"+rht+"']").show();
                        $("div#mate2"+rht).show();
                    }

                    $("input[hf2='1']").attr('hf2','0');
                    $(this).attr('hf2', '1');
                    break;

                case '0':   //配偶是否为权利人
                    //console.log(000000);
                    if(rad === '1'){
                        //if($("div.mate[att='2"+rht+"']").attr('po') != '1'){
                        //    mate_y_n += 1;
                        //    $("div.mate[att='2"+rht+"']").attr('po', '1');

                        var sel = $('#p_power_num').val();

                        if(sel != '1'){
                            var select = parseInt(sel) - 1;
                            console.log(select);
                            $("#p_power_num").find("option[value='"+select+"']").attr("selected",true);
                            $('#bn'+ sel).empty();





                        }
                            //$("#p_power_num").find("option[value='"+select+"']").attr("selected",true);
                        //}
                        //删除一组权利人信息操作

                        /////////////////////////
                    }else{
                        //if($("div.mate[att='2"+rht+"']").attr('po') != '0'){
                        //    $("div.mate[att='2"+rht+"']").attr('po', '0');
                        //    var sel = $('#p_power_num').val();
                        //    var select = sel + 1;
                        //    $("#p_power_num").find("option[value='"+select+"']").attr("selected",true);
                        //}
                        var sel = $('#p_power_num').val();
                        var i = parseInt(sel) + 1;
                        console.log(i);
                        var obligeehtml = '<div class="obl_num" id="bn'+i+'"><br><span>权利人'+n[i]+':</span><br><div class="adult"><input type="radio" name="adult['+i+']" checked="checked" value="1" num="1" rht="'+i+'" aut'+i+'="1"><span class="sp_rad">成年人</span><input type="radio" name="adult['+i+']" value="2" num="1" rht="'+i+'"><span class="sp_rad">未成年人</span></div><br><div class="preview" img="1'+i+'1"></div><div class="clear"></div><div class="file" att="'+i+'"><span >上传身份证正反面</span><input class="weui_uploader_input" type="file" accept="image/*" name="loanpic" id="1'+i+'1" img="1'+i+'1" multiple data-required="true" data-descriptions="loanpic" /></div><span>婚姻状况：</span><br><input type="radio" name="matrimony['+i+']" checked="checked" value="1" num="2" rht="'+i+'"><span class="sp_rad">未婚</span>&nbsp;<input type="radio" name="matrimony['+i+']" value="2" num="2" rht="'+i+'"><span class="sp_rad">已婚</span>&nbsp;<input type="radio" name="matrimony['+i+']" value="3" num="2" rht="'+i+'"><span class="sp_rad">离异再婚</span>&nbsp; <input type="radio" name="matrimony['+i+']" value="4" num="2" rht="'+i+'"><span class="sp_rad">离异未婚</span> <div class="mate" att="2'+i+'"> <span>配偶是否为权利人：</span><input type="radio" name="mate_y_n['+i+']" value="1" num="0" rht="'+i+'"><span class="sp_rad">是</span>&nbsp;<input type="radio" name="mate_y_n['+i+']" checked="checked" value="2" num="0" rht="'+i+'"><span class="sp_rad">否</span>&nbsp;<div class="preview" img="1'+i+'2"></div><div class="clear"></div> <div class="file"><span>配偶身份证正反面</span><input class="weui_uploader_input" type="file" accept="image/*" name="loanpic" id="1'+i+'2" img="1'+i+'2" multiple data-required="true" data-descriptions="loanpic" /></div></div><div class="preview"  img="1'+i+'3"></div><div class="clear"></div><div class="file obligee_btn mate2" id="mate2'+i+'"><span>婚姻证明</span><input class="weui_uploader_input" type="file" accept="image/*" name="loanpic" id="1'+i+'3" img="1'+i+'3" multiple data-required="true" data-descriptions="loanpic" /></div></div>';


                        $(".obligee").append(obligeehtml);


                    }
                    //console.log(mate_y_n);
                    $("input[hf0='1']").attr('hf0','0');
                    $(this).attr('hf0', '1');
                    break;

                case '3':   //备用房状况
                    //console.log(333);
                    if(rad === '1'){
                        //console.log(1122);
                        var standby = '<div class="preview" img="32"></div><div class="file" att="32"> <div class="clear"></div> <span>上传备用房产证照片</span> <input class="weui_uploader_input" type="file" accept="image/*" name="loanpic" id="32" multiple data-required="true" data-descriptions="loanpic" /></div>';
                        $(".file[att='"+rht+"']").after(standby);
                    }else{
                        $(".file[att='32']").remove();
                        $(".preview[img='32']").remove();
                    }
                    $("input[hf3='1']").attr('hf3','0');
                    $(this).attr('hf3', '1');
                    break;

            }

        }

    });

    $(document).on('change','#p_power_num',function(){
        var p_power_num = $('#p_power_num').val();
        var ppn = parseInt(p_power_num);
        //if(p_power_num)
        $('.obligee').empty();
        $('.fi_apl_1').remove();
        var i = 1;

        for(i;i < ppn+1;i++){
            var obligeehtml = '<div class="obl_num" id="bn'+i+'"><br><span>权利人'+n[i]+':</span><br><div class="adult"><input type="radio" name="adult['+i+']" checked="checked" value="1" num="1" rht="'+i+'" aut'+i+'="1"><span class="sp_rad">成年人</span><input type="radio" name="adult['+i+']" value="2" num="1" rht="'+i+'"><span class="sp_rad">未成年人</span></div><br><div class="preview" img="1'+i+'1"></div><div class="clear"></div><div class="file" att="'+i+'"><span >上传身份证正反面</span><input class="weui_uploader_input" type="file" accept="image/*" name="loanpic" id="1'+i+'1" img="1'+i+'1" multiple data-required="true" data-descriptions="loanpic" /></div><div class="adult_'+i+'"><span>婚姻状况：</span><br><input type="radio" name="matrimony['+i+']" checked="checked" value="1" num="2" rht="'+i+'"><span class="sp_rad">未婚</span>&nbsp;<input type="radio" name="matrimony['+i+']" value="2" num="2" rht="'+i+'"><span class="sp_rad">已婚</span>&nbsp;<input type="radio" name="matrimony['+i+']" value="3" num="2" rht="'+i+'"><span class="sp_rad">离异再婚</span>&nbsp; <input type="radio" name="matrimony['+i+']" value="4" num="2" rht="'+i+'"><span class="sp_rad">离异未婚</span> <div class="mate" att="2'+i+'"> <span>配偶是否为权利人：</span><input type="radio" name="mate_y_n['+i+']" value="1" num="0" rht="'+i+'"><span class="sp_rad">是</span>&nbsp;<input type="radio" name="mate_y_n['+i+']" checked="checked" value="2" num="0" rht="'+i+'"><span class="sp_rad">否</span>&nbsp;<div class="preview" img="1'+i+'2"></div><div class="clear"></div> <div class="file"><span>配偶身份证正反面</span><input class="weui_uploader_input" type="file" accept="image/*" name="loanpic" id="1'+i+'2" img="1'+i+'2" multiple data-required="true" data-descriptions="loanpic" /></div></div><div class="preview"  img="1'+i+'3"></div><div class="clear"></div><div class="file obligee_btn mate2" id="mate2'+i+'"><span>婚姻证明</span><input class="weui_uploader_input" type="file" accept="image/*" name="loanpic" id="1'+i+'3" img="1'+i+'3" multiple data-required="true" data-descriptions="loanpic" /></div></div>';

            $(".obligee").append(obligeehtml);
            $('.adult').css('display', 'block');
        }
    });






    //下一步
    $('.btn_r').click(function(){
        switch(page[show]){
            case 'first':
                if(loanamount_v && number_v){
                    $('.first').hide();
                    //$('.form').css('height','55%');
                    $('.second').show().height(hei + 'px');
                    $('.schedule span:nth-of-type(' + show + ')').css({'background-color':'#958c6d','border':'1px solid #8c815d'});
                    $('.btn_l').show();
                    show = 2;
                }else{
                    checkout(show);
                }
                break;
            case 'second':
                if(checkout(show)){
                    $('.second').hide();
                    //$('.button').hide();
                    $('.btn_r').hide();
                    $('.third').show().height(hei + 'px');
                    $('.schedule span:nth-of-type(' + show + ')').css({'background-color':'#958c6d','border':'1px solid #8c815d'});

                    show = 3;
                }else{
                    alert('资料填写不完整！请认真核对!资料越齐全申请成功率越高哦！');
                }
                break;
            case 'third':

                break;

        }


    });


    //上一步
    $('.btn_l').click(function(){
        switch(page[show]){
            case 'second':
                $('.second').hide();
                $('.first').show();
                show = 1;
                break;
            case 'third':
                $('.third').hide();
                $('.btn_r').show();
                $('.second').show().height(hei + 'px');
                //$('.btn_r').attr('src','./view/images/button_right.png');
                show = 2;
                break;
            case 'first':

                break;
        }
    });









    //var uploading =


    //多图上传
    var f2 = document.querySelector('.loanpic');
    //f2.onchange = uploading;
    //$(document).on('change','.loanpic',function(){
    //    console.log(111);
    //    var id = $(this).attr('id');
    //    uploading(this, id);
    //});
    $(document).on('change',f2,uploading);










});




function uploading(e) {

    var files = e.target.files;
    var len = files.length;
    for (var i=0; i < len; i++) {
        lrz(files[i],{width:1024,fieldName:"upfile"}).then(function (rst) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'apply_for-uploads.htm');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        //console.log(xhr.responseText);
                        console.log(e.target.id);
                        var img_id = e.target.id;
                        var ky = img_id.substr(0,1);
                        var obj = eval('(' + xhr.responseText + ')');
                        var cla = "'fi_im_"+img_id+imgnum+"'";
                        $('.preview[img="'+img_id+'"]').append('<img src="'+obj.return_src+'" onclick="imgclick('+cla+')" class="weui_uploader_file weui_uploader_status fi_im_'+img_id+imgnum+'" style="margin:5px;">');
                        $('.formname').prepend('<input value="'+obj.src+'"  type="hidden"  class="fi_im_'+img_id+imgnum+' fi_apl_'+ky+'" name="files['+img_id+'][]" />');
                        $('#loanpic').removeAttr('data-required data-descriptions');

                    //class="preview" img="111"
                        $('.preview[img="'+img_id+'"]').css('display','block');
                        var k = img_id.substr(1,1);
                        var y = img_id.substr(2,1);
                        img++;
                        imgnum++;




                    } else {
                        // 处理其他情况
                    }
                };
                xhr.onerror = function () {
                    // 处理错误
                };
                xhr.upload.onprogress = function (e) {
                    // 上传进度
                    var percentComplete = ((e.loaded / e.total) || 0) * 100;
                };
                // 添加参数
                var size = rst.formData.append('size', rst.fileLen);
                var base64 = rst.formData.append('base64', rst.base64);


                // 触发上传
                xhr.send(rst.formData);
                return rst;
            })

            .catch(function (err) {
                alert(err);
            })
            .always(function () {// 不管是成功失败，这里都会执行
            });

    }//for end
}

function imgclick(id){
    if(confirm('您确定要删除吗?')){
        $('.'+id).detach();
        img--;
    }
}




//检查内容合法性
function checkout(val){
    if(val === 1 || val === 'loanamount' || val === 'all'){
        if($('#loanamount').val() === '' || $('#loanamount').val() === undefined){
            $('.not_loa').html('*请先输入借款金额！').css('color', 'red');
            loanamount_v = false;
        }
        else if($('#loanamount').val() < 20 || $('#loanamount').val() > 1500){
            $('.not_loa').html('*借款金额应在二十万到一千五百万之间！<br />&nbsp;&nbsp;请重新输入！').css('color', 'red');
            loanamount_v = false;
        }else{
            var loa_val = $('#loanamount').val();
            var len = loa_val.length;
            var val = Math.round(loa_val);
            //var val = loa_val.toFixed(4);
            $('#loanamount').val(val);
            //console.log(loa_val);
            //console.log(val);
            $('.not_loa').html('*贷款金额输入完成').css('color', 'green');
            loanamount_v = true;
        }
    }
    if(val === 1 || val === 'number' || val === 'all'){
        if($('#number').val() === '0'){
            $('.not_nmb').html('*请选择贷款期限').css('color', 'red');
            number_v = false;
        }else{
            $('.not_nmb').html('*已选择').css('color', 'green');
            number_v = true;
        }
    }

    if(val === 2){

        var pp_num = parseInt($('#p_power_num').val());
        var i = 1;
        if(adult_y_n >= pp_num){
            alert('权利人数量必须大于未成年人数量！');
            return false;
        }
        if(img < (pp_num * 2) + 3){
            return false;
        }
        return true;






    }






}



