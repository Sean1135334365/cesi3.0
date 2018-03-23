<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=0.9,user-scalable=0">
  <title>跳转提示</title>
    <script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
  <style type="text/css">
    *{ padding: 0; margin: 0; }
    body{ background: #FFF; font-family: '微软雅黑';  font-size: 16px; }
    .system-message{width: 9.92rem;
    margin: 5.76rem auto 0;text-align: center;}
    .system-message img{width: 5.87rem;height: 5.33rem;}
    .system-message h1{ font-size: 20px; font-weight: normal; margin: 1.1rem 0 0.53rem;color: #8491aa; }
    .system-message .errmsg{font-size: 14px;color: #b9c1d1;margin-bottom: 1.1rem;}
    #wait{color: #e57575;font-size: 14px!important;}
    .system-message .jump{ margin-bottom:20px;color: #8491aa;font-size: 14px;}
    .system-message .jump a{ color: #333;}
    .system-message .success,.system-message .error{ font-size: 14px;color: #b9c1d1;}
    .system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display:none}
    #wait {
      font-size:46px;
    }
    #btn-stop,#href{
      display: inline-block;
      font-size: 16px;
      text-align: center;
      vertical-align: middle;
      cursor: pointer;
      border: 1px solid #cdad7d;
      border-radius: 1rem;
      background-color: #fff;
      width: 6.4rem;
      height: 2.13rem;
      line-height: 2.13rem;
      color: #cdad7d;
      font-weight: bold;
      text-decoration:none;
    }

    #btn-stop:hover,#href:hover{
      background-color: #ff0000;
    }
  </style>
</head>
<body>
<div class="system-message">
  <img src="/Public/Weixin/images/ico/Group 2.png" alt="" />
  <h1>提交失败</h1>
  <?php if(isset($message)) {?>
  <p class="error"><?php echo($message); ?></p>
  <?php }else{?>
  <p class="error"><?php echo($error); ?></p>
  <?php }?>  
  <p class="detail"></p>
  <p class="errmsg">请返回进行修改</p>
  <p class="jump">
    <b id="wait"><?php echo($waitSecond); ?></b> 秒后页面将自动跳转
  </p>
  <div>
    <a id="href" id="btn-now" href="<?php echo($jumpUrl); ?>">返回修改</a>
  </div>
</div>
<script type="text/javascript">
  (function(){
    var wait = document.getElementById('wait'),href = document.getElementById('href').href;
    var interval = setInterval(function(){
      var time = --wait.innerHTML;
      if(time <= 0) {
        location.href = href;
        clearInterval(interval);
      };
    }, 1000);
    window.stop = function (){
      console.log(111);
      clearInterval(interval);
    }
  })();
  function resetPage(){  //移动端适配;
    var deviceWidth = document.documentElement.clientWidth;
    var scale = deviceWidth/640;
    console.log(deviceWidth);
    if( deviceWidth>=640 ){
            document.documentElement.style.fontSize="100px";
    }else{
            document.documentElement.style.fontSize=28.85*scale+"px";
    };  
  };
  window.onload = function (){
    resetPage();
  };
  window.onresize = function (){
    resetPage();
  };

</script>
</body>
</html>