<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/10/27
 * Time: 13:59
 */

namespace Common\Controller;
use Think\Controller;
/**
 * +------------------------------------------------------------------------------
 * @desc            : name
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/10/27
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
class WeixinController extends Controller {

//    /** 读取config微信配置参数 */
//    private $wx_config;

    /** 微信参数设置 */
    protected $appid;
    protected $appsecret;
    protected $openid = '';

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 微信页面访问公共函数
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/27
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function _initialize(){
        /** 读取微信配置参数 */
        $wx_config =  C('WEIXIN');
        $this->appid = $wx_config['appid'];
        $this->appsecret = $wx_config['appsecret'];
//        session(null);
//        echo '<pre>';
        if(!empty($_SESSION['wx_userinfo']) && $_SESSION['wx_userinfo']['openid'] != ''){
            //微信用户信息已获取
            define('WX_USER_ID',$_SESSION['wx_userinfo']['id']);









        }else{
//            var_dump(cookie());
//            var_dump($_SESSION);exit;

            //微信用户信息未获取
            session(null);
            $cok_userid = cookie('yzs_user');
//            $cok_userid = '';
            if($cok_userid != ''){//优先读取cookie
                $users = $this->wechat_userinfo($cok_userid);
                if($users){
                    session('wx_userinfo',$users);
                }else{

                }
            }elseif(!empty($_GET['code'])){//没有cookie时做微信授权获取
//                var_dump($_GET,2);
                $users = $this->openid($_GET);
//                var_dump($users,1);
                session('wx_userinfo',$users);
                cookie('yzs_user',$users['id'],2592000);
            }else{
                $this->accredit();
                exit;
            }

        }

//        exit;
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 微信授权跳转
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/28
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function accredit(){
        $rurl = urlencode('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);

        $appid = $this->appid;
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$rurl&response_type=code&scope=snsapi_userinfo&state=snsapi_base#wechat_redirect";

//        var_dump($rurl);
//        var_dump($appid);
//        var_dump($url);
//        exit;

        header('Location:' . $url);

        exit;


    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 获取用户openid
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/27
     * @param           : Array $getcode accredit()获取的返回$_GET
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function openid($getcode){
        $appid = $this->appid;
        $secret = $this->appsecret;
        $code = $getcode['code'];
        $ae_token = file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code");

        $result = json_decode($ae_token,true);
//        var_dump($appid,'appid');
//        var_dump($secret,'secret');
//        var_dump($code,'code');
//        var_dump($ae_token,'ae_token');
//        var_dump($result,'result');
        if(!empty($result['openid'])){
            return $this->wechat_userinfo($result);
        }else{
            return false;
        }
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 获取微信用户详细信息
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/30
     * @param           : Array || string $data 微信接口获取的get或cookie返回的id
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function wechat_userinfo($data){

        if(is_array($data)){
            $openid = $data['openid'];
            $where = "openid='$openid'";
//            var_dump($openid,'wu1');
        }else{
            $wxuserid = $data;
            $where = "id=$wxuserid";
//            var_dump($wxuserid,'wu2');
        }
        $db = M('wxusers');
        $users = $db->where($where)->find();
        $u_openid = empty($openid) ? $users['openid']: $openid;
//        var_dump($db->_sql(),'sql');
        $time = time();
        if(!$users || $users['u_time'] < ($time - 2592000)){//用户为空或距离上次获取信息超过一个月的重新获取最新信息
            $token = $this->access_token();
            $json_list = file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$token."&openid=".$u_openid."&lang=zh_CN");
//            var_dump($token,4.0);
//            var_dump($openid,4.1);
            $list = json_decode($json_list,true);
//            var_dump($list,4.2);
            if(!$users){
                $arr = array(
                    'openid'    =>$list['openid'],
                    'nickname'  =>$list['nickname'],
                    'sex'       =>$list['sex'],
                    'province'  =>$list['province'],
                    'city'      =>$list['city'],
                    'country'   =>$list['country'],
                    'headimgurl'=>$list['headimgurl'],
                    'privilege' =>$list['privilege'],
                    'unionid'   =>$list['unionid'],
                    'w_time'    =>$time,
                    'u_time'    =>$time,
                    'create_ip' =>get_client_ip(),
                    'is_auth'   =>'0'
                );
                $result = $db->add($arr);
            }else{
                $arr = array(
                    'nickname'  =>$list['nickname'],
                    'province'  =>$list['province'],
                    'city'      =>$list['city'],
                    'country'   =>$list['country'],
                    'headimgurl'=>$list['headimgurl'],
                    'privilege' =>$list['privilege'],
                    'u_time'    =>$time
                );
                $result = $db->where('id='.$users['id'])->save($arr);
            }

            if($result){
                $users = $db->where('id='.$result)->find();
                return $users;
            }else{
                return false;
            }

        }else{
            return $users;
        }

    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 获取access_token
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/27
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function access_token($num = 1){
        $db = M('access_token');
        $token = $db->where('id=1')->find();

        $time = time();
        $times = $time + 180;  //预处理时间 防止token使用时过期
//        var_dump($token['t_time']);
//        var_dump($time);
//        var_dump($times);
//        var_dump(($time - $token['t_time']));
        if(!$token || (($token['t_time'] + $token['expires_in']) <= $times && $token['state'] == '1')) {
            //判断token是否过期
            if(($token['t_time'] + $token['expires_in']) >= $time){
                $state = $db->where('id=1')->save(array('state'=>'3'));
            }else{
                $state = $db->where('id=1')->save(array('state'=>'2'));
            }
            if($state){
                //重新获取token
                $appid = $this->appid;
                $secret = $this->appsecret;
                $token=file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret");
                $arr=json_decode($token,true);
                if(!empty($arr['access_token'])){
                    $time = time();
//                    $sting = $time + $arr['expires_in'];
                    $data = array(
                        'access_token'  => $arr['access_token'],
                        'expires_in'    => $arr['expires_in'],
                        't_time'        => $time,
                        'state'         => '1'
                    );
                    $db->where('id=1')->save($data);
                    return $arr['access_token'];
                }else{
                    return false;
                }
            }else{
                //修改状态失败时递归一次
                if($num = 1){
                    return $this->access_token(2);
                }else{
                    return false;
                }

            }
        }else {
            //获取成功 判断access_token是否超过有效期 state=3时为超过并已有用户在重新获取，需等待2秒后重新获取
            if($token['state'] != '3'){
                return $token['access_token'];
            }else{
                sleep(2);
                if($num <= 3){
                    return $this->access_token($num+1);
                }else{
                    return false;
                }
            }
        }



    }





























}