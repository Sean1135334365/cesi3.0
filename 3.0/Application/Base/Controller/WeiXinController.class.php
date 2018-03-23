<?php
/**
 * +------------------------------------------------------------------------------
 * @desc            : 微信接口
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2016/9/19
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
namespace Base\Controller;
use Think\Controller;

class WeiXinController extends Controller {
    var $appid = 'wx85f89c9b389be1a9';
    var $appsecret = '1b5c4bb382cfbcee8ec7115cda77218d';
    var $openid = '';
    /**
     * +------------------------------------------------------------------------------
     * @desc            : 初始化公众号信息
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/20
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
//    public function __construct() {
//
//    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 检查用户是否存在或获取用户详细信息并保存
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/8/29
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function preserve_users($type){
        $openid = $this->openid;
        $db = M('users');
        $users = $db->where('openid='.$openid)->find();
        if(!$users){
            $token = $this->access_token();
            $json_list = file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$token."&openid=".$openid."&lang=zh_CN");
            $list = json_decode($json_list,true);
            $db->data($list);
        }
    }



    /**
     * +------------------------------------------------------------------------------
     * @desc            : 连接微信获取access_token
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/8/29
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function access_token(){
        $db = M('token_ticket');
        $list = $db->where('id=1')->find();
        $time = time() - 20;  //预处理时间 防止token使用时过期
        if(!$list || $list['tokentime'] >= $time) {
            //重新获取token
            $token=file_get_contents('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wx85f89c9b389be1a9&secret=1b5c4bb382cfbcee8ec7115cda77218d');
            $arr=json_decode($token,true);
            if(!empty($arr['access_token'])){
                $time = time();
                $sting = $time + $arr['expires_in'];
                $data = array(
                    'access_token'  => $arr['access_token'],
                    'tokentime'     => $sting
                );
                $db->data($arr);
                return $arr['access_token'];
            }else{
                return false;
            }
        }else {
            return $list['access_token'];
        }
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 发送post数据
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/20
     * @param           : String $url 目标地址URL
     * @param           : Array $post_data 要发送的post数据
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    function curl_data($url, $post_data) {
//        $url = "http://localhost/web_services.php";
//        $post_data = array ("username" => "bob","key" => "12345");
        echo 111;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
        // post数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $output = curl_exec($ch);
        curl_close($ch);
        //打印获得的数据
        return $output;
    }





}