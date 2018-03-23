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
  <script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js?<?php echo rand(10000,99999) ?>"></script>
  <!--<script type="text/javascript" src="./view/js/af_wxapply.js"></script>-->
  <script type="text/javascript" src="/Public/Weixin//js/lrz.min.js?<?php echo rand(10000,99999) ?>"></script>
  <!--<script type="text/javascript" src="./view/js/pro_s.js"></script>-->

</head>
<body>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="/Public/Weixin/css/reset.css">
    <link rel="stylesheet" href="/Public/Weixin/css/credit.css">
    <script src="/Public/Weixin/js/lrz.min.js"></script>
    <title>个人征信查询</title>
    <style>
        @font-face {font-family: "iconfont";
            src: url('iconfont.eot?t=1511772630603'); /* IE9*/
            src: url('iconfont.eot?t=1511772630603#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('data:application/x-font-woff;charset=utf-8;base64,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') format('woff'),
            url('iconfont.ttf?t=1511772630603') format('truetype'), /* chrome, firefox, opera, Safari, Android, iOS 4.2+*/
            url('iconfont.svg?t=1511772630603#iconfont') format('svg'); /* iOS 4.1- */
        }
        
        .iconfont {
            font-family:"iconfont" !important;
            font-size:16px;
            font-style:normal;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        .icon-camerafull:before { content: "\e665";position: absolute;top: 25%;left: 25%; }
        
        .icon-chenggong:before { content: "\e65d"; }
        
        .icon-cuowu:before { content: "\e627"; }
        
        .icon-face-fail:before { content: "\e64e"; }
        
        .icon-shuaxin:before { content: "\e654";position: absolute;top: 25%;left: 25%; }
        
        .icon-icon_wrong:before { content: "\e501";position: absolute;top: 25%;left: 25%;color: #ff8787; }
        .content>div>i.icon-chenggong:before{position: absolute;top: 25%;left: 25%;color:#76f778;}
        .content>div>i.icon_wrong:before{position: absolute;top: 25%;left: 25%;color: #ff8787;}
      
      
    </style>

    <header>
        <p>
            查询阶段：国家法定工作日上午9:00-12:00;<br>下午14:00-16:30,其他时间段或非工作日可提交并上传资料，但报告需顺延至下一个工作日时段反馈。四个工作日内有征信查询记录的客户不予查询.
        </p>
    </header>


    <!-- 报错模块 -->
    <div id="shade" style="display:none;"></div>
    <div class="warn_name warn" style="display:none;">
        <i class="iconfont icon-cuowu"></i>
        <p>请输入真实姓名!</p>
        <button>确认</button>
    </div>
    <div class="success warn" style="display:none;">
        <i class="iconfont icon-chenggong"></i>
        <p>提交成功</p>
        <p class="suc_p">30分钟内会有专人为您审核材料<br>请您耐心等待</p>
        <button>确认并关闭</button>
    </div>
    <div class="warn_fail warn" style="display:none;">
        <i class="iconfont icon-face-fail"></i>
        <p>提交失败</p>
        <p class="suc_p">信息可能不完整或不符合要求<br>请返回进行修改</p>
        <button>返回修改</button>
    </div>


    <nav>
        <div class="content1">
            <p>1</p>
            <hr>
            <p>2</p>
        </div>
        <div class="content2">
            <p>编辑资料</p>
            <div class="line"></div>
            <p>完成提交</p>
        </div>
    </nav>
    <div class="shortcut"></div>
    <ul class="contairner">
        <li><span>姓名</span><input type="text" placeholder="请输入姓名" id="name" name="name"></li>
        <li><span>身份证号码</span><input type="text" placeholder="请输入二代身份证号码" id="IDcard_num" name="IDcard_num" required></li>
        <li><span>手机号码</span><input type="text" placeholder="请输入手机号码" id="phone_num" name="phone_num" required></li>
        <li><span>授权书编号:</span>&#12288;<span id="number">1028389098712389097</span><input type="text" placeholder="后8位编号" id="authorize_num" name="authorize_num" required></li>
    </ul>
    <div class="shortcut" style="margin-top:0;"></div>
    <div class="photo_contairner" style="overflow:hidden;">
        <div class="content">
            <div>
                <input type="file" class="files" required>
                <img src="/Public/Weixin/images/ico/phone.png" alt="" class="phone">
                <img src="/Public/Weixin/images/ico/img-01.png" alt="" class="img_1">
                <input type="hidden" id="fronttobase" name="fronttobase" info="">
                <i class="iconfont icon-camerafull"></i>
            </div>
            <p class="circle">1</p>
            <p class="note">上传身份证正面照片(含申请书编号)</p>
            <p class="mobile">请将手机横向拍摄</p>
        </div>
        <div class="content">
            <div>
                <input type="file" class="files" required>
                <img src="/Public/Weixin/images/ico/phone.png" alt="" class="phone">
                <img src="/Public/Weixin/images/ico/img-02.png" alt="" class="img_1">
                <input type="hidden" id="oppositetobase" name="oppositetobase" info="">
                <i class="iconfont icon-camerafull"></i>
            </div>
            <p class="circle">2</p>
            <p class="note">上传身份证反面照片(含申请书编号)</p>
            <p class="mobile">请将手机横向拍摄</p>
        </div>
        <div class="content" style="float:left;width:2.8rem;height:8.65rem;">
            <div style="transform: rotateZ(90deg);height:2.8rem;">
                <input type="file" class="files" style="width:200%" required>
                <img src="/Public/Weixin/images/ico/phone.png" alt="" class="phone">
                <img src="/Public/Weixin/images/ico/img-03.png" alt="" class="img_1">
                <input type="hidden" id="applytobase" name="applytobase" info="">
                <i class="iconfont icon-camerafull" style="left:100%;transform: translate3d(-50%,-50%,0) rotateZ(-90deg);"></i>
            </div>
            <p class="circle" style="margin-top:3.1rem;">3</p>
            <p class="note">上传申请书</p>
            <p class="mobile">请将手机竖向拍摄</p>
        </div>
        <div class="content" style="float:left;width:2.8rem;height:8.65rem;margin:0;">
            <div style="transform: rotateZ(90deg);height:2.8rem;">
                <input type="file" class="files" style="width:200%" required>
                <img src="/Public/Weixin/images/ico/phone.png" alt="" class="phone">
                <img src="/Public/Weixin/images/ico/img-03.png" alt="" class="img_1">
                <input type="hidden" id="authorizetobase" name="authorizetobase" info="">
                <i class="iconfont icon-camerafull" style="left:100%;transform: translate3d(-50%,-50%,0) rotateZ(-90deg);"></i>
            </div>
            <p class="circle" style="margin-top:3.1rem;">4</p>
            <p class="note">上传授权书</p>
            <p class="mobile">请将手机竖向拍摄</p>
        </div>  
        <div class="content" style="margin-top:8.65rem;">
                <div>
                    <input type="file" class="files" required>
                    <img src="/Public/Weixin/images/ico/phone.png" alt="" class="phone">
                    <img src="/Public/Weixin/images/ico/img-04.png" alt="" class="img_1">
                    <input type="hidden" id="hztobase" name="hztobase" info="">
                    <i class="iconfont icon-camerafull"></i>
                </div>
                <p class="circle">5</p>
                <p class="note">上传本人与身份证和申请书合影</p>
                <p class="mobile" style="font-size:0.22rem;line-height:0.33rem;">请将手机横向拍摄,注意不能戴眼镜、帽子、围巾等装饰品、不能口含香烟等，必须正脸对准摄像头拍照</p>
            </div>
    </div>
    <footer>
        <button>提交查询</button>
    </footer>
</body>
<script>
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
        resetPage();
    };
    window.onresize = function (){
        resetPage();
    };
    function reset(){
        $('.warn').hide();
        $('#shade').hide();
    }

    var public_for = "/Public";
    var UpLoad='<?php echo U("File/img_file",array("type"=>"zhengxin"));?>';
    var Sub="<?php echo U('Apiwechat/tofindzx');?>";
    //验证信息是否合理
    $("#name").blur(function(){
        var username = /^[\u4E00-\u9FA5A-Za-z]+$/;
        if(!username.test($("#name").val())){
            $('.warn_name').show();
            $('#shade').show();
        }else{
            
        }
    });
    $("#IDcard_num").blur(function(){
        var username = /^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/;
        if(!username.test($("#IDcard_num").val())){
            
        }else{
            
        }
    });
    $("#phone_num").blur(function(){
        var username =/^(0|86|17951)?(13[0-9]|15[012356789]|17[013678]|18[0-9]|14[57])[0-9]{8}$/;
        if(!username.test($("#phone_num").val())){
            
        }else{
            
        }
    });
    $('.warn button').click(function(){
        reset();
    });
    $('#shade').click(function(){
        reset();
    });
</script>
<script src="/Public/Weixin/js/iconfont_credit.js"></script>
<script src="/Public/Weixin/js/credit.js"></script>







</body>
</html>