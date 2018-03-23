<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
   <title><?php if($html_title != ''): echo ($html_title); else: ?>賺客屋<?php endif; ?></title>
  <meta charset="utf-8">
  <meta name="description" content="賺客屋">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
  <meta name="viewport" content="width=device-width,initial-scale=0.9,user-scalable=0">
  <link rel="icon" type="image/png" href="/Public/Admin/assets/i/ico_logo.png">
  <link rel="apple-touch-icon-precomposed" href="/Public/Admin/assets/i/ico_logo.png">

  <!--<link rel="stylesheet" href="./view/css/pro_s.css" type="text/css">-->

  <!--<script type="text/javascript" src="/Public/js/jquery-1.8.1.min.js"></script>-->
  <script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js?<?php echo rand(10000,99999); ?>"></script>
  <!--<script type="text/javascript" src="./view/js/af_wxapply.js"></script>-->
  <script type="text/javascript" src="/Public/Weixin//js/lrz.min.js?<?php echo rand(10000,99999); ?>"></script>
  <!--<script type="text/javascript" src="./view/js/pro_s.js"></script>-->

</head>
<body>


<link rel="stylesheet" href="/Public/Weixin/css/reset.css">

<style>
   
    textarea,input{       
        width: 90vw;
        box-sizing: border-box;
        border:1px solid #eee;
        color: #333;
        padding: 0.2rem 0.3rem;
        background-color: #f5f5f5;
        font-size: 0.28rem;
    }
    textarea{
        resize: none;
        margin:0.4rem 5vw 0.3rem;
        height: 1.9rem;
    }
    textarea:focus{
        border-color: #eee;
    }
    input{
        height: 0.7rem;
        margin:0 5vw 0.3rem;
    }
    button{
        width: 2.1rem;
        height: 0.7rem;
        float: right;
        margin-right: 5vw;
        border:none;
        border-radius: 0.7rem;
        color: #fff;
        background-color: #dfc190;
        opacity: 0.6;
        pointer-events: none;
    }
    p{
        width: 100vw;
        font-size: 0.28rem;
        color: #999;
        position: absolute;
        top:93vh;
        text-align: center;
    }
</style>

<textarea name="" id="data" cols="30" rows="10" placeholder="请描述您的问题或建议(必填)" required maxlength="300"></textarea>
<input type="text" name="" id="mobile" placeholder="您的手机号码(选填)">
<input type="text" name="" id="name" placeholder="您的称呼(选填)">
<button type="submit">提交</button>
<p>联系电话:400-920-8131</p>

<script>
    $('title').text('意见反馈');
    $('textarea').on('input',function(){
        if($('textarea').val().length>0){
            $('button').css({'opacity':'1','pointer-events':'all'});
        }else{
            $('button').css({'opacity':'0.6','pointer-events':'none'});
        }
    });
    function resetTop(){
        $('p').css('top',$(window).height()*0.92+'px');
    }
    function resetPage(){  //移动端适配;
	    var deviceWidth = document.documentElement.clientWidth;
	    var scale = deviceWidth/640;
	    if( deviceWidth>=640 ){
	            document.documentElement.style.fontSize="100px";
	    }else{
	            document.documentElement.style.fontSize=100*scale+"px";
	    };  
	};
	window.onload = function (){
        resetTop();
	    resetPage();
	};
	window.onresize = function (){
	    resetPage();
    };
    var url="<?php echo U('Interaction/submit_feedback');?>";
    
    $('button').click(function(){
        var times;
        var date=new Date(); 
        var expireDays=1; 
        //将date设置为1天以后的时间 
        date.setTime(date.getTime()+expireDays*24*60*60*1000);
        var arrCookie=document.cookie.split("; ");
        $(arrCookie).each(function(index,val){
            var arr=val.split('=');
            if(arr[0]=='times'){
                times=arr[1];
            }
        });
        if(times!=undefined){
            times++;
        }else{
            times=1;
        };
        document.cookie='times='+times+';expires='+date.toGMTString();
        if(times<=3){
            var mobile =/^(0|86|17951)?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/;
		    if(mobile.test($('#mobile').val())||$('#mobile').val()==''){
                $.post(url,{'data':$('#data').val(),'mobile':$('#mobile').val(),'name':$('#name').val()},function(res){
                    if(res.code=='10002'){
                        alert('请完善您想反馈的信息');
                    }else if(res.code=='0'){
                        alert('提交失败，请重新提交');
                    }else if(res.code=='1'){
                        alert('您的反馈已成功提交');
                    }
                },'json');  
            }else{
                alert('请完善您想反馈的信息');
            }
             
        }else{
            alert('您已超出每日反馈上限');
        }
        
    })
    
</script>








</body>
</html>