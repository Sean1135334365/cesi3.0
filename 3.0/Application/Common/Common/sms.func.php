<?php
include "smsdk/CCPRestSDK.php";

//主帐号
$accountSid= '8a48b5515493a1b70154998a575807cf';

//主帐号Token
$accountToken= '7d9b6a413a2d4fb5b34e6954787ad9fe';

//应用Id
$appId='aaf98f8954939ed50154998e8e2008a4';

//请求地址，格式如下，不需要写https://
$serverIP='sandboxapp.cloopen.com';

//请求端口 
$serverPort='8883';

//REST版本号
$softVersion='2013-12-26';


/**
  * 发送模板短信
  * @param to 手机号码集合,用英文逗号分开
  * @param datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
  * @param $tempId 模板Id
  */       
function sendTemplateSMS($to,$datas,$tempId)
{
     // 初始化REST SDK
     global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
     $rest = new REST($serverIP,$serverPort,$softVersion);
     $rest->setAccount($accountSid,$accountToken);
     $rest->setAppId($appId);
    
     // 发送模板短信
    // echo "Sending TemplateSMS to $to <br/>";
     $result = $rest->sendTemplateSMS($to,$datas,$tempId);
     if($result == NULL ) {
//         echo "result error!";
         break;
     }
     if($result->statusCode!=0) {
         //echo "error code :" . $result->statusCode . "<br>";
         //echo "error msg :" . $result->statusMsg . "<br>";
         //TODO 添加错误处理逻辑
     }else{
        // echo "Sendind TemplateSMS success!<br/>";
         // 获取返回信息
         $smsmessage = $result->TemplateSMS;
        // echo "dateCreated:".$smsmessage->dateCreated."<br/>";
        // echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
         //TODO 添加成功处理逻辑
     }
}


?>