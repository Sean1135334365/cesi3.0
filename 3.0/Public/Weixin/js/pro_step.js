for(var i=0;i<$('.idcard').length;i++){
	$('.idcard').eq(i).html('<input type="file" accept="image/*" multiple="multiple" data-required="true">'+'<div><img src="/Public/Weixin/images/ico/Page.png" alt=""></div>'+$('.idcard').eq(i).html());
}
$('.data').click(function(){
	$(this).parent().attr('value',$(this).attr('value'));
})
$("input[name^='adult']").on('click',function(){
	if($(this).attr('bol')=='true'){
		$(this).parent().parent().find('.choose2').css('display','block');
		$(this).parent().parent().find('.age_cg').text('上传身份证正反面');
	}else{
		$(this).parent().parent().find('.choose1').css('display','none');
		$(this).parent().parent().find('.age_cg').text('上传出生证明');
	}
});

//前后按钮功能
$('#contairner1 .next p').on('click',function(){
	var min=Number($('#loanamount').attr('min_num'));
 	var max=Number($('#loanamount').attr('max_num'));
	 var num=Number($('#loanamount').val());
	 console.log(min,num,max);
	 if(num<min||num>max){
		$('.loa_vesity').css('visibility','visible');
		$('.vesity>div').eq(0).html("!");
		$('.vesity>div').eq(0).css('background','#D0011B');
 		$('.loa_vesity>p').html("金额"+min+"万~"+max+"万");
		return false;
	}if($('#number').attr('value')==""){
		$('.num_vesity').css('visibility','visible');
		$('.num_vesity>div').text('!');
		$('.num_vesity>div').css('background','#D0011B');
		$('.num_vesity>p').text('请选择贷款期限');
		return false;
	}else{
		$('.part1').html('<svg width="19px" height="15px" viewBox="0 0 19 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch --><desc>Created with Sketch.</desc><defs></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Group-10" transform="translate(-1.000000, -3.000000)" fill="#FFFFFF"><path d="M7.70423759,14.4434562 L18.2038166,3 L19.569106,4.39086989 L8,17 L7.94305937,16.9419925 L7.6888977,17.2009568 L1,10.3864772 L2.36106302,9 L7.70423759,14.4434562 Z" id="Combined-Shape"></path></g></g></svg>');
		$('.part1').css({'background-color':' #CDAF7D','color':'#fff'});
		$('.step1>div>div>.turnleft').css('background-color','#cdaf7d');
		$('.step2>div>div>.turnright').css('background-color','#cdaf7d');
		$('.part2').css('color','#cdaf7d');
		$('.part2').parent().css('border-color','#cdaf7d');
		$('#contairner1').css('display','none');
		$('#contairner2').css('display','block');
		$('.title').css('display','none');
		$('.step2>p').css('color','#cdaf7d');
	}

});
$('#contairner2 .next p').eq(1).on('click',function(){
	var v=true;
	$('.people_dev').each(function(index,ele){
		var index=index+1;
		if($(this).find(".obligee_dev>.idcard").length<3){
			v=false;
			alert("权利人"+index+"的身份证信息不全");
			return false;
		}if($(this).find('.sel').attr('value')==1||$(this).find('.sel').attr('value')==2){
			if($(this).find(".married_dev>.idcard").length<2){
				v=false;
				alert("权利人"+index+"的婚姻证明信息不全");
				return false;
			}if($(this).find(".married_msg_dev>.idcard").length<3){
				v=false;
				alert("权利人"+index+"的配偶身份证信息不全");
				return false;
			}
		}if($(this).find('.sel').attr('value')==3){
			if($(this).find(".married_dev>.idcard").length<2){
				v=false;
				alert("权利人"+index+"的婚姻证明信息不全");
				return false;
			}
		}	
	});
	if($('.mate_msg_hk').next().find(".idcard").length-1<=$("input[name^='pawn']").val()){
		v=false;
		alert("户口本照片信息不全");
		return false;
	}
	if($('.mate_msg_fc').next().find(".idcard").length<2){
		v=false;
		alert("房产证照片信息不全");
		return false;
	}
	if($('.mate_msg_jk').next().find(".idcard").length<2){
		v=false;
		alert("借款申请书信息不全");
		return false;
	}
	if($("input[name='standby']:checked").attr('value')=="1"){
		if($('#byfc').find(".idcard").length<2){
			v=false;
			alert("备用房产证明不全");
			return false;
		}
	}if(v){
		$('.part2').html('<svg width="19px" height="15px" viewBox="0 0 19 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch --><desc>Created with Sketch.</desc><defs></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Group-10" transform="translate(-1.000000, -3.000000)" fill="#FFFFFF"><path d="M7.70423759,14.4434562 L18.2038166,3 L19.569106,4.39086989 L8,17 L7.94305937,16.9419925 L7.6888977,17.2009568 L1,10.3864772 L2.36106302,9 L7.70423759,14.4434562 Z" id="Combined-Shape"></path></g></g></svg>');
		$('.part2').css({'background-color':' #CDAF7D','color':'#fff'});
		$('.step2>div>div>.turnleft').css('background-color','#cdaf7d');
		$('.step3>div>div>.turnright').css('background-color','#cdaf7d');
		$('.part3').css('color','#cdaf7d');
		$('.part3').parent().css('border-color','#cdaf7d');
		$('#contairner2').css('display','none');
		$('#contairner3').css('display','block');
		$('.step3>p').css('color','#cdaf7d');
	}	
});
$('#contairner2 .next p').eq(0).on('click',function(){
	$('.part1').text('1');
	$('.part1').css({'background-color':'transparent','color':'#cdaf7d'});
	$('.step1>div>div>.turnleft').css('background-color','#ccc');
	$('.step2>div>div>.turnright').css('background-color','#ccc');
	$('.part2').css('color','#ccc');
	$('.part2').parent().css('border-color','#ccc');
	$('#contairner1').css('display','block');
	$('#contairner2').css('display','none');
	$('.title').css('display','block');
	$('.step2>p').css('color','#ccc');
});

$('#contairner3 .next p').eq(0).on('click',function(){
	$('.part2').text('2');
	$('.part2').css({'background-color':'transparent','color':'#cdaf7d'});
	$('.step2>div>div>.turnleft').css('background-color','#ccc');
	$('.step3>div>div>.turnright').css('background-color','#ccc');
	$('.part3').css('color','#ccc');
	$('.part3').parent().css('border-color','#ccc');
	$('#contairner2').css('display','block');
	$('#contairner3').css('display','none');
	$('.title').css('display','none');
	$('.step3>p').css('color','#ccc');
});
addselect($('#contairner1>.sele>p').eq(1),$('#contairner1>.sele>.sel>div.date'),function(){
	$('.num_vesity').css('visibility','visible');
	$('.num_vesity>div').html('<svg width="19px" height="15px" viewBox="0 0 19 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch --><desc>Created with Sketch.</desc><defs></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Group-10" transform="translate(-1.000000, -3.000000)" fill="#FFFFFF"><path d="M7.70423759,14.4434562 L18.2038166,3 L19.569106,4.39086989 L8,17 L7.94305937,16.9419925 L7.6888977,17.2009568 L1,10.3864772 L2.36106302,9 L7.70423759,14.4434562 Z" id="Combined-Shape"></path></g></g></svg>');
	$('.num_vesity>div').css('background','#87DA95');
	$('.num_vesity>p').text('');
	$('#contairner1>.sele>.sel>div.date').parent().parent().find('input[name="options"]').val($('#contairner1>.sele>.sel>div.date').attr('value'));
});
addselect($('#contairner2>.options>p').eq(0),$('#contairner2>.options>.sel>div.date'),function(num){
	k=0;
	var num=Number(num)-1;
	$("input[name='pawn']").val(num+1);
	$('#content').html('');
	for(var i=0;i<num;i++){
		var odiv=$('#contairner2>.people').clone(true);
		odiv.css('display','block');
		odiv.addClass('people_dev');
		var t=i+2;
		$(odiv).find('input[type="hidden"]').each(function(){
			if($(this).attr('name')=="matrimony"){

			}else{
				$(this).attr('name',$(this).attr('name')+"[1"+t+$(this).attr('a')+"]");
			}
			
		});
		$(odiv).find('input[name="matrimony"]').each(function(){
			$(this).attr('name',$(this).attr('name')+"["+t+"]");
		});
		$(odiv).find('input[name="adult"]').eq(0).attr({'id':$(odiv).find('input[name="adult"]').eq(0).attr('id')+i,'name':$(odiv).find('input[name="adult"]').eq(0).attr('name')+"["+t+"]"});
		$(odiv).find('input[name^="adult"]').eq(1).attr({'id':$(odiv).find('input[name^="adult"]').eq(1).attr('id')+i,'name':$(odiv).find('input[name^="adult"]').eq(1).attr('name')+"["+t+"]"});
		$(odiv).find("input[name='mate_y_n']").eq(0).attr({'id':$(odiv).find("input[name='mate_y_n']").eq(0).attr('id')+i,'name':$(odiv).find("input[name='mate_y_n']").eq(0).attr('name')+"["+t+"]"});
		$(odiv).find("input[name='mate_y_n']").attr({'id':$(odiv).find("input[name='mate_y_n']").attr('id')+i,'name':$(odiv).find("input[name='mate_y_n']").attr('name')+"["+t+"]"});
		$(odiv).find('label').eq(0).attr('for',$(odiv).find('label').eq(0).attr('for')+i);
		$(odiv).find('label').eq(1).attr('for',$(odiv).find('label').eq(1).attr('for')+i);
		$(odiv).find('label').eq(2).attr('for',$(odiv).find('label').eq(2).attr('for')+i);
		$(odiv).find('label').eq(3).attr('for',$(odiv).find('label').eq(3).attr('for')+i);
		$(odiv).find('p').eq(0).text(i+2);
		$('#content').append(odiv);
	}	
});
function addselect(nodea,nodeb,fn){
	nodea.click(function(){
		$('.shade').css('display','block');
		$(this).parent().find('.sel').css('display','block');
		var oy=$(window).height()-nodeb.parent().height();
		$(this).parent().find('.sel').css('top',oy/2+'px');
	});
	nodeb.on('click',function(){
		nodeb.removeClass('active');
		nodeb.css('color','#333');
		nodeb.find('span').text('');
		$(this).addClass('active');
		$(this).find('span').html('<svg width="19px" height="15px" viewBox="0 0 19 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch --><defs></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Group-10" transform="translate(-1.000000, -3.000000)" fill="#FFFFFF"><path d="M7.70423759,14.4434562 L18.2038166,3 L19.569106,4.39086989 L8,17 L7.94305937,16.9419925 L7.6888977,17.2009568 L1,10.3864772 L2.36106302,9 L7.70423759,14.4434562 Z" id="Combined-Shape"></path></g></g></svg>');
		$('.shade').css('display','none');
		$(this).css('color','#cdaf7d');
		$(this).parent().css('display','none');
		$(this).parent().parent().find('input').attr('value',$(this).attr('value'));
		var msg=$(this).text();
		msg = msg.substr(0, msg.length); 
		console.log(msg);
		$(this).parent().parent().find('input[type="text"]').val(msg);
		if(typeof(fn)=='function'){
			fn(msg);
		}	
	});
}
$('.married').click(function(){
	$('.shade').css('display','block');
	$(this).parent().find('.sel').css('display','block');
	var oy=$(window).height()-$(this).parent().find('.sel').height();
		$(this).parent().find('.sel').css('top',oy/2+'px');
	window.event? window.event.cancelBubble = true : e.stopPropagation();
});
$('.married').parent().find('.sel>div.date').on('click',function(){
	$('.married').parent().find('.sel>div.date').removeClass('active');
	$('.married').parent().find('.sel>div.date').css('color','#333');
	$('.married').parent().find('.sel>div.date').find('span').text('');
	$(this).addClass('active');
	$(this).find('span').html('<svg width="19px" height="15px" viewBox="0 0 19 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch --><defs></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Group-10" transform="translate(-1.000000, -3.000000)" fill="#FFFFFF"><path d="M7.70423759,14.4434562 L18.2038166,3 L19.569106,4.39086989 L8,17 L7.94305937,16.9419925 L7.6888977,17.2009568 L1,10.3864772 L2.36106302,9 L7.70423759,14.4434562 Z" id="Combined-Shape"></path></g></g></svg>');
	
	$('.shade').css('display','none');
	$(this).css('color','#cdaf7d');
	$(this).parent().css('display','none');
	$(this).parent().attr('value',$(this).attr('value'));
	var msg=$(this).text();
	msg = msg.substr(0, msg.length);
	$(this).parent().parent().find('.married p').text(msg);
	$(this).parent().parent().find('.married input').attr('value',$(this).attr('value'));
	window.event? window.event.cancelBubble = true : e.stopPropagation();
	if(msg=='已婚'||msg=='离异再婚'||msg=='丧偶再婚'){
		$(this).parent().parent().find('.choose3').css('display','block');
	}if(msg=='离异未婚'||msg=="丧偶未婚"){
		$(this).parent().parent().find('.choose3').css('display','none');
		$(this).parent().parent().find('.choose4').css('display','block');
	}if(msg=='未婚'){
		$(this).parent().parent().find('.choose3').css('display','none');
	}
});
//图片上传
$('.shade').click(function(){
	$('.shade').css('display','none');
	$(".sel").css('display','none');
	$('#vaild').hide();
})
$('.idcard input').on('change',function(){
	var fileObj=this.files[0];
	if (typeof (fileObj) == "undefined" || fileObj.size <= 0) {
        alert("请选择图片");
        return;
    }else{
    	var _this=$(this).parent();
        uploading(_this);    
    }
});
function uploading(_this,e) {
	var e=e||window.event;
    var files = e.target.files;
    var len = files.length;
    for (var i=0; i < len; i++) {
        lrz(files[i],{width:1024,fieldName:"upfile"}).then(function (rst) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', UpLoad);
                xhr.onload = function () {
                    if (xhr.status === 200) {
						var obj = eval('(' + xhr.responseText + ')');
                        _this.find('div').css('pointer-events','all');
                        _this.find('img').attr('src',public_for+obj.result.src);
                        _this.find('img').css({'width':'100%','height':'100%'});
                        _this.find("input[type='file']").prop('outerHTML','');
						_this.find("input[type='hidden']").attr('value',obj.result.src);
						var op=document.createElement('i');
						$(op).addClass('iconfont icon-jianhao');
						$(op).click(function(){
							if(confirm('是否删除图片')){
								$(this).parent().remove();
							}
							
						})
						_this.prepend(op);
						addfile(_this);
						_this=_this.next();
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
function addfile(_thisp){
	var odiv=document.createElement('div');
	$(odiv).addClass('idcard');
	_thisp.parent().find('.upcard').css('display','none');
	var name_msg=_thisp.find('input[type="hidden"]').attr('name');
	_thisp.after(odiv);
	$(odiv).html('<input type="file" accept="image/*" multiple="multiple" data-required="true">'+'<div><img src="/Public/Weixin/images/ico/Page.png" alt=""></div>'+'<input type="hidden" name='+name_msg+' value="">');
	$('.idcard input').unbind();
	$('.idcard input').on('change',function(){
		var fileObj=this.files[0];
		if (typeof (fileObj) == "undefined" || fileObj.size <= 0) {
	        alert("请选择图片");
	        return;
	    }else{
	    	var _this=$(this).parent();
	        uploading(_this);
	    }
	});
}
//配偶是否权利人
var k=0;
$("input[name^='mate']").on('change',function(){
	if(k==0&&$(this).attr('bol')=='true'&&$("input[name='pawn']").val()>1){
		$('#content>.people').last().remove();
		$("input[name='pawn']").val($("input[name='pawn']").val() - 1);
		var a= $("input[name='pawn']").val()-1;
		$("input[name='pawn']").attr('value',a+1);
		$('#contairner2>.options>.sel>div.date').removeClass('active');
		$('#contairner2>.options>.sel>div.date').css('color','#333');
		$('#contairner2>.options>.sel>div.date').find('span').text('');
		$('#contairner2>.options>.sel>div.date').eq(a).addClass('active');
		$('#contairner2>.options>.sel>div.date').eq(a).find('span').html('<svg width="19px" height="15px" viewBox="0 0 19 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch --><desc>Created with Sketch.</desc><defs></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Group-10" transform="translate(-1.000000, -3.000000)" fill="#FFFFFF"><path d="M7.70423759,14.4434562 L18.2038166,3 L19.569106,4.39086989 L8,17 L7.94305937,16.9419925 L7.6888977,17.2009568 L1,10.3864772 L2.36106302,9 L7.70423759,14.4434562 Z" id="Combined-Shape"></path></g></g></svg>');
		
		k++;
	}
})
$("input[name='standby']").on('change',function(){
	if($(this).attr('value')=='1'){
		$('#byfc').css('display','block')
	}else{
		$('#byfc').css('display','none')
	}
})

$('#loanamount').blur(function(){
 	var min=Number($(this).attr('min_num'));
 	var max=Number($(this).attr('max_num'));
 	var num=Number($(this).val());
	$('.vesity').eq(0).css('visibility','visible');
 	if(min<=num&&num<=max){
		$('.vesity>div').eq(0).html('<svg width="19px" height="15px" viewBox="0 0 19 15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><!-- Generator: Sketch 43 (38999) - http://www.bohemiancoding.com/sketch --><desc>Created with Sketch.</desc><defs></defs><g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g id="Group-10" transform="translate(-1.000000, -3.000000)" fill="#FFFFFF"><path d="M7.70423759,14.4434562 L18.2038166,3 L19.569106,4.39086989 L8,17 L7.94305937,16.9419925 L7.6888977,17.2009568 L1,10.3864772 L2.36106302,9 L7.70423759,14.4434562 Z" id="Combined-Shape"></path></g></g></svg>');
		
		$('.vesity>div').eq(0).css('background','#87DA95');
 		$('.vesity>p').html("");
 	}else{
 		$('.vesity>div').eq(0).html("!");
		$('.vesity>div').eq(0).css('background','#D0011B');
 		$('.loa_vesity>p').html("金额"+min+"万~"+max+"万");
 	}
 });
 $('#vaild>.tietle>div>p').click(function(){
	$('#vaild>.tietle>div>p').css({'color':'#666','border-bottom':'1px solid transparent'});
	$(this).css({'color':'#cdaf7d','border-bottom':'1px solid #dfc190'});
	
	 if($(this).attr('type')==1){
		//$('#vaild>button').attr('type','submit');
		$('#vaild>button').css('opacity','0.5');
		 $('.vai_content1').show();
		 $('.vai_content2').hide();
	 }if($(this).attr('type')==2){
		//$('#vaild>button').attr('type','button');
		$('#vaild>button').css('opacity','0.5');
		$('.vai_content1').hide();
		$('.vai_content2').show();
	}
 })
 $('#phone_num').blur(function(){
	 var username =/^(0|86|17951)?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/;
	 if(!username.test($('#phone_num').val())){
		$(this).siblings().show();
	 }else{
		$(this).siblings().hide();
	 }
 });

$('#email_num').next().click(function(){
	var username =/^(0|86|17951)?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/;
	if(username.test($('#phone_num').val())){
		$.post(set_note,{'mobile':$('#phone_num').val(),'verify':$('#pic_num').val()},(res) => {
			//$("input[name='mobile']").val(res.info);
			if(res.code==1){
				$('#warn_msg').css('visibility','hidden');
				var _this=$(this);
				$(this).css({'color':'#999','pointer-events':'none'});
				$(this).text('60秒后重新发送');
				var i=0;
				var timer=setInterval(() => {
					i++;
					var a=60-i;
					if(a>0){
						_this.text(a+'秒后重新发送');
					}else{
						clearInterval(timer);
						_this.css({'color':'#CDAF7D','pointer-events':'all'});
						_this.text('获取验证');
					}
				},1000)
			}else{
				$('#warn_msg').css('visibility','visible');
			}
		});
	}
});

$('#id_num').on('input',function(){
	$("input[name='channel']").val($(this).val());
});
$('#phone_num').on('input',function(){
	$("input[name='mobile']").val($(this).val());
});
$('#email_num').on('input',function(){
	$("input[name='note_check']").val($(this).val());
});
$('#vaild input').on('input',function(){
	var username =/^(0|86|17951)?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/;
	var a=/^\d{4}$/;
	if(username.test($('#phone_num').val())&&a.test($('#pic_num').val())){
		$('#yz').css('opacity','1');
	}if($('.vai_content1').css('display')=="block"){
		if($('#id_num').val()!=""){
			$('#vaild>button').css('opacity','1');
		};
	}if($('.vai_content2').css('display')=="block"){
		if(username.test($('#phone_num').val())&&a.test($('#pic_num').val())&&a.test($('#email_num').val())){
			$('#vaild>button').css('opacity','1');
		}
	}
})
$('#vaild>button').trigger('click');
$('#vaild>button').click(function(){
	if($('.vai_content1').css('display')=="block" && $('#id_num').val()!=""){
		$.post(note_check,{'channel':$('#id_num').val()},function(data){
			if(data.status==1){
				$('#vaild>button').attr('type','submit');
				$('input').each(function(){
					if($(this).val() === ""){
						$(this).remove();
					}
				});
				$("input[name='note_check']").remove();
				$("input[name='mobile']").remove();
				$('#contairner2>.people').last().remove();
				$('#loading').show();
				$('#loading_shade').show();
				$('#order').submit();
			}else{
				alert('请输入正确的签约号');
			}
		})
		
	}else{
		var username =/^(0|86|17951)?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/;
		if(username.test($('#phone_num').val())){
			$.post(note_check,{'mobile':$('#phone_num').val(),'note_check':$('#email_num').val()},function(data){
				if(data.status==1){
					$('#vaild>button').attr('type','submit');
					$('input').each(function(){
						if($(this).val() === ""){
							$(this).remove();
						}
					});
					$("input[name='channel']").remove();
					$('#contairner2>.people').last().remove();
					$("input[name='mobile']").val(data.result.mobile);
					$('#loading').show();
					$('#loading_shade').show();
					$('form').submit();
					
				}
			})
		}
	}
})

