<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>一站式金融服务平台</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="icon" type="image/png" href="/Public/Admin/assets/i/ico_logo.png">
  <link rel="apple-touch-icon-precomposed" href="/Public/Admin/assets/i/ico_logo.png">
  <meta name="apple-mobile-web-app-title" content="一站式金融服务平台" />
  <link rel="stylesheet" type="text/css" href="/Public/Admin/assets/css/log_style.css" />
  <link rel="stylesheet" type="text/css" href="/Public/Admin/assets/css/log_body.css"/>


  <script src="/Public/js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="container">
  <section id="content">
    <form action="<?php echo U('Login/check_code');?>" method="post" id="register">
      <h1>会员登录</h1>
      <div>
        <input type="text" placeholder="账号/邮箱/手机号" required="" name="username" id="username" />
      </div>
      <div>
        <input type="password" placeholder="密码" required="" name="password" id="password" />
      </div>
      <div class="">
        <span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>			</div>
      <div>
        <!-- <input type="submit" value="Log in" /> -->
        <input type="submit" value="登录" class="btn btn-primary" id="js-btn-login"/>
        <a href="#">忘记密码?</a>
        <!-- <a href="#">Register</a> -->
      </div>
    </form><!-- form -->
    <div class="button" id="hint">
      <a href="#"></a>
    </div> <!-- button -->
  </section><!-- content -->
</div>
<!-- container -->



<script>
  $(function() {
    $("#verify_img").click(function () {
      var rand = parseInt(Math.random()*10000+1);
      console.log(rand);
      var verifyURL = "<?php echo U('Login/img_code',array());?>?"+rand;
      $("#verify_img").attr("src", verifyURL);
    });

    function check(){
      if($('#username').val().length < 3){
        if($('#username').val().length == 0){
          return alert('请填写账号！');
        }else{
          return alert('账号格式不正确！');
        }
      }
      if($('#password').val().length < 4){
        if($('#password').val().length == 0){
          return alert('请填写密码！');
        }else{
          return alert('密码格式不正确！');
        }
      }
      /*if($('#verify').val().length < 4){
        if($('#verify').val().length == 0){
          return alert('请填写验证码！');
        }else{
          return alert('验证码有四位哦！');
        }
      }*/
      return true;
    }


    $('#register').submit(function(){
      if(check() === true){

        var username = $('#username').val();
        var password = $('#password').val();
        $.post("<?php echo U('Login/check_code');?>",{'username':username,'password':password},function(data){

          console.log(data);
            if(data.status === 1){

              $('#hint>a').html(data.info);
              $('#hint>a').css('color','green');
//              $('#hint>a').attr('href',data.url);

              setTimeout(function(){window.location.href = data.url;},800);


            }else{
              $('#hint>a').html(data.info);
              $('#hint>a').css('color','red');

            }





        });


        return false;

      }else{
        return false;
      }
    });

  });
</script>


</body>

</html>