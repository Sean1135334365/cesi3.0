<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/11/20
 * Time: 19:42
 */

namespace Admin\Controller;
//use Common\Controller\VerifyController;
use Think\Controller;
/**
 * +------------------------------------------------------------------------------
 * @desc            : 短信提醒
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/11/20
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
//class SendController extends VerifyController {
class SendController extends Controller {




    /**
     * +------------------------------------------------------------------------------
     * @desc            : 发送短信
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/20
     * @param           : string $to 手机号集合字符串,示例："130xxxxxxxx,130xxxxxxx,……"
     * @param           : array $datas 内容数据 格式为数组 例如：array('Marry','Alon')，如不需替换请填 null
     * @param           : int $tempID 模板ID
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function send($to,$datas,$tempId){
        //主帐号
        $accountSid= '8a48b5515493a1b70154998a575807cf';

        //主帐号Token
        $accountToken= '7d9b6a413a2d4fb5b34e6954787ad9fe';

        //应用Id
        $appId='8a216da85fc7a0a4015fd9525ad805d1';//一站式
//        $appId='aaf98f8954939ed50154998e8e2008a4';//质玉

        //请求地址，格式如下，不需要写https://
        $serverIP='sandboxapp.cloopen.com';

        //请求端口
        $serverPort='8883';

        //REST版本号
        $softVersion='2013-12-26';

        // 初始化REST SDK

        $rest = new \Admin\Model\CCPRestSmsSDKModel($serverIP,$serverPort,$softVersion);

        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);

        // 发送模板短信
//        echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
//            echo "result error!";
            return 'result error!';
//            break;
        }
        if($result->statusCode!=0) {
//            echo "error code :" . $result->statusCode . "<br>";
//            echo "error msg :" . $result->statusMsg . "<br>";
            $arr = array(
                'statusCode' => $result->statusCode,
                'statusMsg' => $result->statusMsg
            );

            return $arr;
            //TODO 添加错误处理逻辑
        }else{
//            echo "Sendind TemplateSMS success!<br/>";
            // 获取返回信息
            $smsmessage = $result->TemplateSMS;
//            echo "dateCreated:".$smsmessage->dateCreated."<br/>";
//            echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
            $arr = array(
                'dateCreated' => $smsmessage->dateCreated,
                'smsMessageSid' => $smsmessage->smsMessageSid,
            );

            return $arr;
            //TODO 添加成功处理逻辑
        }

    }









}