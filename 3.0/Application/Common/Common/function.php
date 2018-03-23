<?php

/**
 * +------------------------------------------------------------------------------
 * @desc            : 发送get/post请求
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/8/14
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
function post($url, $data = null){
    $curl = curl_init();
    curl_setopt($curl,CURLOPT_HTTPHEADER,"content-type: application/x-www-form-urlencoded; 
charset=UTF-8");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}



/**
 * +------------------------------------------------------------------------------
 * @desc            : Email邮件发送
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/12/7
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
function smtp_mail1($money, $num, $id){


    vendor( "PHPMailer_v.class#phpmailer" );
//    vendor( "PHPMailer.PHPMailerAutoload" );



    \Think\Log::write("发送邮件：实例（PHPMailer_v）".date('Y-m-d H:i:s',time()));
    $sendto_email =array(
        array('849891012@qq.com','will'),
//        array('baohongxiang@zhiyujinrong.com','will'),
//        array('zhangzhong@zhiyujinrong.com','张中'),
//        array('184148209@qq.com','周'),
//        array('yintao@zhiyujinrong.com','殷涛'),
//        array('zhujia@zhiyujinrong.com','祝佳'),
//        array('yinyujie@zhiyujinrong.com','殷煜杰'),
        array('caiwenli@zhiyujinrong.com','蔡文丽'),
//        array('heyi@zhiyujinrong.com','何轶'),
//        array('will@zhiyujinrong.com','will'),
//        array('will@zhiyujinrong.com','will'),
//        array('Bottle.he@innomative.com','bottle'),
//        array('Shangzhi.pan@innomative.com','shangzhi')
    );  //收件人邮箱

    $subject = '賺客屋！';                 //标题
    $user_name = '賺客屋';                //用户名

    $mail = new PHPMailer(true);
    $mail->IsSMTP();                  // send via SMTP
    $mail->Host = "smtp.163.com";   // SMTP servers
//    $mail->Host = "smtp.qq.com";   // SMTP servers
//    $mail->Host = "smtp.exmail.qq.com";   // SMTP servers
    $mail->SMTPSecure = 'ssl';
//    $mail->Port = 465;   // SMTP servers
    $mail->Port = 994;   // SMTP servers
    $mail->SMTPAuth = true;           // turn on SMTP authentication

//    $mail->Username = "automachine@zhiyujinrong.com";     // SMTP username  注意：普通邮件认证不需要加 @域名
    $mail->Username = "nyz950406@163.com";     // SMTP username  注意：普通邮件认证不需要加 @域名
//    $mail->Username = "will_zhangwei@qq.com";     // SMTP username  注意：普通邮件认证不需要加 @域名
//    $mail->Username = "will@zhiyujinrong.com";     // SMTP username  注意：普通邮件认证不需要加 @域名

//    $mail->Password = "5UqtWPoUwf7Zcxn8"; // SMTP password
    $mail->Password = "1314...yize"; // SMTP password
//    $mail->Password = "awcseycagkvgbcaf"; // POP3/SMTP password
//    $mail->Password = "s42WCYKFDWWs5SG5"; // SMTP password

//    $mail->From = "automachine@zhiyujinrong.com";      // 发件人邮箱
    $mail->From = "nyz950406@163.com";      // 发件人邮箱
//    $mail->From = "will_zhangwei@qq.com";      // 发件人邮箱
//    $mail->From = "will@zhiyujinrong.com";      // 发件人邮箱

    $mail->FromName =  "賺客屋";  // 发件人
//    exit;
    $mail->CharSet = "utf-8";   // 这里指定字符集！
    $mail->Encoding = "base64";
    foreach($sendto_email as $k => $v){
        $mail->AddAddress($sendto_email[$k][0],$sendto_email[$k][1]);  // 收件人邮箱和姓名

        \Think\Log::write("发送邮件：（收件人：".$sendto_email[$k][1]."；邮箱:".$sendto_email[$k][0].date('Y-m-d H:i:s',time()));

//        var_dump($v);
    }
//exit;
//    $mail->AddReplyTo("automachine@zhiyujinrong.com","賺客屋");
    $mail->AddReplyTo("nyz950406@163.com","賺客屋");
//    $mail->AddReplyTo("will_zhangwei@qq.com","一站式金融服务中心");
//    $mail->AddReplyTo("will@zhiyujinrong.com","一站式金融服务中心");
    //$mail->WordWrap = 50; // set word wrap 换行字数
    //$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment 附件
    //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");
    $mail->IsHTML(true);  // send as HTML
    // 邮件主题
    $mail->Subject = $subject;
    // 邮件内容

    $mail->Body = "
    <html><head>
    <meta http-equiv='Content-Language' content='zh-cn'>
    <meta http-equiv='Content-Type' content='text/html; charset=GB2312'>
    </head>
    <body style='font-size:24px;background-color: #f5f5f5;'>
    <div style='font-size: 16px;width:636px;border:1px solid #ccc;margin:0 auto;border-radius:10px;color: #666;text-align: center;'>
        <b style='color: #999;font-size: 22px;line-height: 87px;'>重要提醒</b>
        <div style='width: 600px;height: 1px;background:#eee;margin:-10px auto 0px;'></div>
        <p style='font-size: 22px;margin: 20px 0px;'>您有一笔新的订单已申请提交！</p>
        <p style='font-size: 22px;margin: 20px 0px;'>订单编号：".$num."</p>
        <p style='font-size: 22px;margin: 20px 0px;'>申请额度：".$money."万元</p>
        <p style='margin: 20px 0px;'>请尽快处理！</p>
        <p style='margin: 20px 0px;'>".date('Y年m月d日 H时i分s秒')."</p>
        <a href='http://zkw.zhiyujinrong.com/index.php/Home/Order/orderinfo/id/$id.html'><button style='padding: 10px 23px;font-size:16px;background:#4990e2 !important;color:#fff !important;border-color:#3875bc;'>点击查看订单</button></a>
        <div style='width: 600px;height: 1px;background:#eee;margin:30px auto 0px;'></div>
        <div style='height:80px'>
        <img src='http://zkw.zhiyujinrong.com/Public/images/Email/email.jpg' style='width:30px;float:left;margin:25px 10px 25px 170px'>
        <p style='line-height:80px;margin:0;float:left;color: #666;'>技术服务由賺客屋提供</p> </div>
    </div>
    </body>
    </html>
    ";
    $mail->AltBody ="text/html";

//    exit;
    $mail->Send();
    $mail->ClearAddresses();
}



/**
 * +------------------------------------------------------------------------------
 * @desc            : Email邮件发送(公众号意见反馈)
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/12/7
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
function suggest_smtp_mail($info, $data){


    vendor( "PHPMailer_v.class#phpmailer" );
//    vendor( "PHPMailer.PHPMailerAutoload" );

    $sendto_email =array(
        array('849891012@qq.com','will'),
//        array('1269921938@qq.com','zxj')
//        array('baohongxiang@zhiyujinrong.com','will'),
        array('zhangzhong@zhiyujinrong.com','张中'),
        array('184148209@qq.com','周'),
        array('yintao@zhiyujinrong.com','殷涛'),
        array('zhujia@zhiyujinrong.com','祝佳'),
        array('yinyujie@zhiyujinrong.com','殷煜杰'),
        array('caiwenli@zhiyujinrong.com','蔡文丽'),
        array('heyi@zhiyujinrong.com','何轶'),
//        array('will@zhiyujinrong.com','will'),
//        array('will@zhiyujinrong.com','will'),
//        array('Bottle.he@innomative.com','bottle'),
//        array('Shangzhi.pan@innomative.com','shangzhi')
    );  //收件人邮箱

    $subject = '賺客屋！';                 //标题
    $user_name = '賺客屋';                //用户名

    $mail = new PHPMailer();
    $mail->IsSMTP();                  // send via SMTP
//   $mail->Host = "smtp.163.com";   // SMTP servers
//    $mail->Host = "smtp.qq.com";   // SMTP servers
     $mail->Host = "smtp.exmail.qq.com";   // SMTP servers
    $mail->SMTPSecure = 'ssl';
     $mail->Port = 465;   // SMTP servers
//   $mail->Port = 994;   // SMTP servers
    $mail->SMTPAuth = true;           // turn on SMTP authentication

     $mail->Username = "automachine@zhiyujinrong.com";     // SMTP username  注意：普通邮件认证不需要加 @域名
//   $mail->Username = "nyz950406@163.com";     // SMTP username  注意：普通邮件认证不需要加 @域名
//    $mail->Username = "will_zhangwei@qq.com";     // SMTP username  注意：普通邮件认证不需要加 @域名
//    $mail->Username = "will@zhiyujinrong.com";     // SMTP username  注意：普通邮件认证不需要加 @域名

     $mail->Password = "5UqtWPoUwf7Zcxn8"; // SMTP password
//   $mail->Password = "1314...yize"; // SMTP password
//    $mail->Password = "awcseycagkvgbcaf"; // POP3/SMTP password
//    $mail->Password = "s42WCYKFDWWs5SG5"; // SMTP password

     $mail->From = "automachine@zhiyujinrong.com";      // 发件人邮箱
//   $mail->From = "nyz950406@163.com";      // 发件人邮箱
//    $mail->From = "will_zhangwei@qq.com";      // 发件人邮箱
//    $mail->From = "will@zhiyujinrong.com";      // 发件人邮箱

    $mail->FromName =  "賺客屋";  // 发件人
//    exit;
    $mail->CharSet = "utf-8";   // 这里指定字符集！
    $mail->Encoding = "base64";
    foreach($sendto_email as $k => $v){
        $mail->AddAddress($sendto_email[$k][0],$sendto_email[$k][1]);  // 收件人邮箱和姓名
//        var_dump($v);
    }
//exit;
     $mail->AddReplyTo("automachine@zhiyujinrong.com","賺客屋");
//   $mail->AddReplyTo("nyz950406@163.com","賺客屋");
//    $mail->AddReplyTo("will_zhangwei@qq.com","一站式金融服务中心");
//    $mail->AddReplyTo("will@zhiyujinrong.com","一站式金融服务中心");
    //$mail->WordWrap = 50; // set word wrap 换行字数
    //$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment 附件
    //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");
    $mail->IsHTML(true);  // send as HTML
    // 邮件主题
    $mail->Subject = $subject;
    // 邮件内容

    $html = "<div  style='height:55px;padding:0 35px;text-align:center;'><p style='font-size:22px;color:#2b4f93;margin:0;line-height:60px;font-weight:700;'>客户意见反馈</p></div><div style='height:40px;padding:0 35px;text-align:center;margin-bottom:5px'>";

    if(!empty($info['mobile']) && $info['mobile'] != ''){
        $html .= "<p style='float:right;font-size:17px;color:#999;margin:0;line-height:40px;margin-left:35px;'>手机号码：".$info['mobile']."</p>";
    }
    if(!empty($info['name']) && $info['name'] != ''){
        $html .= "<p style='float:right;font-size:17px;color:#999;margin:0;line-height:40px;margin-left:35px;'>客户名称：".$info['name']."</p>";
    }
    if(!empty($info['nickname']) && $info['nickname'] != ''){
        $html .= "<p style='float:right;font-size:17px;color:#999;margin:0;line-height:40px;margin-left:35px;'>微信名称：".$info['nickname']."</p>";
    }

    $html .= "</div>
    <hr style='background-color:#eee;height:1px;border:none;margin:0;'>
    <p style='font-size:18px;color:#333;padding:0 35px;margin:30px 0;line-height:36px;'>$data</p>";
    $mail->Body = "
    <html><head>
    <meta http-equiv='Content-Language' content='zh-cn'>
    <meta http-equiv='Content-Type' content='text/html; charset=GB2312'>
    </head>
    <body style='background-color: #f5f5f5;'>
    <div style='border:1px solid #ccc;width:640px;margin:0 auto;'>
        $html
        <hr style='background-color:#eee;height:1px;border:none;width:90%;margin:0 auto;'>
        <div style='height:60px;'><div style='height:60px;margin:0 auto;width:200px;'><img src='http://zkw.zhiyujinrong.com/Public/images/Email/email.jpg' alt='' style='width:20px;height:20px;margin:20px 10px 20px 30px;float:left;'><p style='font-size:14px;color:#666;margin:0;float:right;line-height:60px;'>技术服务有賺客屋提供</p></div></div>
    </div>
    </body>
    </html>
    ";
    $mail->AltBody ="text/html";

//    exit;
    $mail->Send();
}











