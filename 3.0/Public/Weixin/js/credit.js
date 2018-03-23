$('input[type="file"]').on('change',function(){
    var fileObj=this.files[0];
	if (typeof (fileObj) == "undefined" || fileObj.size <= 0) {
        alert("请选择图片");
        return;
    }else{
        var _this=$(this).parent();
        $(this).parent().find('i').removeClass('icon-camerafull');
        $(this).parent().find('i').addClass('icon-shuaxin rotate');
        uploading(_this);
        $(this).prop('outerHTML','');   
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
                        var url = public_for+'/'+obj.result.src;
                        _this.find('.img_1').attr('src',url);
                        _this.find('input[type="hidden"]').attr('info',obj.result.src);
                        setTimeout(function(){
                            _this.find('i').removeClass('icon-shuaxin rotate');
                            _this.find('i').addClass('icon-chenggong');
                        },300);
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
                setTimeout(function(){
                    _this.find('i').removeClass('icon-shuaxin rotate');
                    _this.find('i').addClass('icon-icon_wrong');
                },300);
            })
            .always(function () {// 不管是成功失败，这里都会执行
            });

    }//for end
}
$('footer button').click(function(){
    if($('#name').val() != "" && $('#IDcard_num').val() != "" && $('#phone_num').val() != "" && $('#authorize_num').val() != "" && $('#fronttobase').attr('info') != "" && $('#oppositetobase').attr('info') != "" && $('#applytobase').attr('info') != "" && $('#authorizetobase').attr('info') != "" && $('#hztobase').attr('info') != ""){
        $.post(Sub,{'name':$('#name').val(),'idcard_num':$('#IDcard_num').val(),'phone_num':$('#phone_num').val(),'authorize_num':$('#authorize_num').val(),'fronttobase':$('#fronttobase').attr('info'),'oppositetobase':$('#oppositetobase').attr('info'),'applytobase':$('#applytobase').attr('info'),'authorizetobase':$('#authorizetobase').attr('info'),'hztobase':$('#hztobase').attr('info'),'id':$('#id').val()},function(data){
            if(data.status === 1){
            	var str="";
            	str="<section>订单编号："+data.result.orderNo+"</section>";
            	
                $(".success .suc_p").append(str);
                $('#shade').show();
            	$(".success").show();
            	$("html,body").css({"overflow":"hidden","height":"100%"});
            	
            	$(".success button").click(function(){
            		location.href="/index.php/Weixin/Credit/detail.html"
                })
                $('footer button').unbind();
            }else{
                $(".warn_fail .suc_p").text(data.info);
            	$('#shade').show();
            	$(".warn_fail").show();
            }
            
            
        })
    }else{
        alert('请完善你的信息')
    }  
})