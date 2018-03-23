<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/10/31
 * Time: 15:25
 */

namespace Weixin\Controller;
use Admin\Controller\LoginController;
use Admin\Controller\SendController;
use Common\Controller\WeixinController;

class ApiwechatController extends WeixinController {

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 获取ticket
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/31
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function ticket($num = 1){
        $db = M('access_token');
        $ticket_data = $db->where('id=2')->find();
        $time = time();
        $times = $time + 180;  //预处理时间 防止token使用时过期
        if(!$ticket_data || (($ticket_data['t_time'] + $ticket_data['expires_in']) <= $times && $ticket_data['state'] == '1')){
            //判断token是否过期
            if(($ticket_data['t_time'] + $ticket_data['expires_in']) >= $time){
                $state = $db->where('id=2')->save(array('state'=>'3'));
            }else{
                $state = $db->where('id=2')->save(array('state'=>'2'));
            }
            $access_token = $this->access_token();
            $jsapi = file_get_contents("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=$access_token&type=jsapi");
            $jsapi = json_decode($jsapi,true);
            if($jsapi['errcode'] == 0){

                $data = array(
                    'access_token'  => $jsapi['ticket'],
                    'expires_in'    => $jsapi['expires_in'],
                    't_time'        => $time,
                    'state'         => '1'
                );
                $db->where('id=2')->save($data);
                return $jsapi['ticket'];
            }else{
                $jsapi = json_encode($jsapi);
                \Think\Log::write("微信jsapi_ticket接口调用失败!\r\n返回结果：".$jsapi."\r\n调用时间：".date('Y-m-d H:i:s',time()));
                return false;
            }
        }else{
            //获取成功 判断access_token是否超过有效期 state=3时为超过并已有用户在重新获取，需等待2秒后重新获取
            if($ticket_data['state'] == '1'){
                return $ticket_data['access_token'];
            }else{
                sleep(2);
                if($num <= 3){
                    return $this->ticket($num+1);
                }else{
                    return false;
                }
            }
        }

    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 微信JS_SDK权限验证配置
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/31
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function js_sdk_check(){
        $ticket = $this->ticket();

        if(!$ticket){
            $arr['info'] = '获取失败';
            $arr['code'] = '20001';
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }

        $appid = $this->appid;

        //获取当前url信息
//        $localhost=$_SERVER['SERVER_NAME'];
//        $self=$_SERVER['REQUEST_URI'];
//        $string=$_SERVER["QUERY_STRING"];
//
        $noncestr='';
//随机字符串
        $str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//        $str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        for($i=0;$i<16;$i++){
            $rand=rand(0,61);
            $noncestr.=$str[$rand];
        }

        $timestamp=time();
//        $url='http://'.$localhost.$self . (!empty($string) ? '?' . $string : '');
//        $url=$_SERVER['HTTP_REFERER'];
//        $url1=explode('//',$_POST['url']);
//        $url2=explode('/',$url1[1]);
//        $url=$url1[0].'//'.$url2[0];
        $url= $_POST['url'];



        $signature='jsapi_ticket='.$ticket.'&noncestr='.$noncestr.'&timestamp='.$timestamp.'&url='.$url;

        $jsapilist=array(
            'openLocation',
            'getLocation',
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'onMenuShareQZone',
            /*
            'startRecord',
            'stopRecord',
            'onVoiceRecordEnd',
            'playVoice',
            'pauseVoice',
            'stopVoice',
            'onVoicePlayEnd',
            'uploadVoice',
            'downloadVoice',
            'chooseImage',
            'previewImage',
            'uploadImage',
            'downloadImage',
            'translateVoice',
            'getNetworkType',
            'hideOptionMenu',
            'showOptionMenu',
            'hideMenuItems',
            'showMenuItems',
            'hideAllNonBaseMenuItem',
            'showAllNonBaseMenuItem',
            'closeWindow',
            'scanQRCode',
            'chooseWXPay',
            'openProductSpecificView',
            'addCard',
            'chooseCard',
            'openCard'*/
        );
       /* $jsapilist=array(
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'onMenuShareQZone',
            'startRecord',
            'stopRecord',
            'onVoiceRecordEnd',
            'playVoice',
            'pauseVoice',
            'stopVoice',
            'onVoicePlayEnd',
            'uploadVoice',
            'downloadVoice',
            'chooseImage',
            'previewImage',
            'uploadImage',
            'downloadImage',
            'translateVoice',
            'getNetworkType',
            'openLocation',
            'getLocation',
            'hideOptionMenu',
            'showOptionMenu',
            'hideMenuItems',
            'showMenuItems',
            'hideAllNonBaseMenuItem',
            'showAllNonBaseMenuItem',
            'closeWindow',
            'scanQRCode',
            'chooseWXPay',
            'openProductSpecificView',
            'addCard',
            'chooseCard',
            'openCard',
        );*/

        /*'onMenuShareTimeline',
'onMenuShareAppMessage',
'onMenuShareQQ',
'onMenuShareWeibo',
'onMenuShareQZone',
'startRecord',
'stopRecord',
'onVoiceRecordEnd',
'playVoice',
'pauseVoice',
'stopVoice',
'onVoicePlayEnd',
'uploadVoice',
'downloadVoice',
'chooseImage',
'previewImage',
'uploadImage',
'downloadImage',
'translateVoice',
'getNetworkType',
'openLocation',
'getLocation',
'hideOptionMenu',
'showOptionMenu',
'hideMenuItems',
'showMenuItems',
'hideAllNonBaseMenuItem',
'showAllNonBaseMenuItem',
'closeWindow',
'scanQRCode',
'chooseWXPay',
'openProductSpecificView',
'addCard',
'chooseCard',
'openCard',*/



//        $signature = array(
//            'appid'=> $appid,
//            'timestamp'=> $timestamp,
//            'noncestr'=>$noncestr,
//            'signature'=>sha1($signature),
//            'jsapilist'=>json_encode($jsapilist)
//        );
        $signature = array(
            'appid'=> $appid,
            'timestamp'=> $timestamp,
            'noncestr'=>$noncestr,
            'signature'=>sha1($signature),
            'jsapilist'=>$jsapilist
        );

        $arr3 = array(
            'ticket'=>$ticket,
            'noncestr'=>$noncestr,
            'timestamp'=>$timestamp,
            'url'=>$url,
            'signature'=>$signature,
            'server'=>$_SERVER
        );

        $arr['info'] = '获取成功';
        $arr['code'] = '4';
        $arr['data'] = $arr3;
        $arr['result'] = $signature;
        $arr['status'] = 1;
        $this->ajaxReturn($arr);

    }



    /**
     * +------------------------------------------------------------------------------
     * @desc            : 首次加载时根据获取定位城市数据查询默认列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/2
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function initial_check(){

        if(!empty($_POST)){
            $city = $_POST['city'];
//            $city = '上海市';

            $c_where = "where name like '%$city%' and grade='2' and forbidden='1'";

            $Model = new \Think\Model();

            $cityid = $Model->query("select `id` from yzs_territory $c_where");

//            $district = $Model->query("select * from yzs_territory where higher_up in(select `id` from yzs_territory $c_where)");
//            $district = $Model->query("select * from yzs_territory where higher_up in($cityid)");
//			$arr['order'] =

            $arr['name'] = $city;
            $arr['state'] = 0;
            if(!$cityid){
                $arr['name'] = '上海市';
                $arr['state'] = 1;
                $city = '上海市';
                $c_where = "where name like '%$city%' and grade='2' and forbidden='1'";
                $district = $Model->query("select * from yzs_territory where higher_up in(select `id` from yzs_territory $c_where) and forbidden='1'");
            }else{
            $district = $Model->query("select * from yzs_territory where higher_up in(select `id` from yzs_territory $c_where) and forbidden='1'");
//                $district = $Model->query("select * from yzs_territory where higher_up in($cityid)");
            }


            $citydata = M('territory')->where("name like '%$city%' and grade='2' and forbidden='1'")->find();
            $house_type = M('house_type')->select();
            $cityinfo = M('territory')->where("grade != 3 and forbidden='1'")->select();

            $citylist = array();
            foreach($cityinfo as $key=>$val){
                if($val['higher_up'] == '0'){
                    $dow = '';
                    foreach($cityinfo as $k=>$v){
                        if($v['higher_up'] == $val['id']){
                            $dow[] = array(
                                'id'=>$v['id'],
                                'name'=>$v['name'],
                            );
                        }
                    }
                    $citylist[] = array(
                        'id'=>$val['id'],
                        'name'=>$val['name'],
                        'dow'=>$dow
                    );
                }
            }







            $arr1 = array(
                'district'=>$district,
                'house_type'=>$house_type
            );

            $arr['info'] = '获取成功';
            $arr['code'] = '0';
            $arr['info'] = $citydata;
            $arr['citylist'] = $citylist;
            $arr['result'] = $arr1;
            $arr['status'] = 1;
            $this->ajaxReturn($arr);

        }else{
            $arr['info'] = '参数错误';
            $arr['code'] = '0';
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }


    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品详情接口
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/2
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function productinfo(){

        if(!empty($_GET['id'])){

            $db = M('product');
            $data = $db->where('id='.$_GET['id'])->find();

//            if($data['img_url']){
//
//            }

            $arr['info'] = '获取成功';
            $arr['code'] = '0';
            $arr['result'] = $data;
            $arr['status'] = 1;
            $this->ajaxReturn($arr);

        }else{

            $arr['info'] = '参数错误';
            $arr['code'] = '0';
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }


    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 发送短信验证码
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/23
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function send_note(){

        if(!empty($_POST)){

            $mobile = !empty($_POST['mobile']) ? $_POST['mobile']: false;
            $verify = !empty($_POST['verify']) ? $_POST['verify']: false;

            /** @var $a_ctl LoginController */
            $a_ctl = A('Admin/login');
            if(!$a_ctl->check_verify($verify)){
                $arr['info'] = '验证码错误';
                $arr['code'] = 10001;
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
            if(!preg_match('/^1[34578]{1}[0-9]{1}\d{8}$/',$mobile)){
                $arr['info'] = '手机格式错误';
                $arr['code'] = 10002;
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
            /** @var $a_send sendController */
            $a_send = A('Admin/send');

            $rand = rand(1000,9999);
            session('wx_note_check',array('mobile'=>$mobile,'code'=>$rand,'time'=>time()));

//            $mobile = '13564973665';
            $data = array($rand,'15分钟');

            $res =  $a_send->send($mobile,$data,219904);


            $arr['info'] = '获取成功';
            $arr['code'] = 1;
            $arr['result'] = $res;
            $arr['status'] = 1;
            $this->ajaxReturn($arr);

        }else{
            $arr['info'] = '非法操作';
            $arr['code'] = 10004;
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }

    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 验证短信验证码
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/23
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function note_check(){

        if(!empty($_POST)){
            if(!empty($_POST['channel'])){
                //渠道号验证

                $wxid = $_SESSION['wx_userinfo']['id'];
                $channel = M('wxusers')->where("id='$wxid'")->find();
                if($_POST['channel'] == $channel['channel_number']){
                    $arr['info'] = '验证成功';
                    $arr['code'] = 1;
                    $arr['status'] = 1;
                    $this->ajaxReturn($arr);
                }else{
                    $arr['info'] = '签约号不正确';
                    $arr['code'] = 12001;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }




            }elseif(!empty($_POST['mobile']) && !empty($_POST['note_check'])){
                $time = time() - (60 * 15);
                $mobile = $_POST['mobile'];
                $note_check = $_POST['note_check'];
                $wx_note_check = $_SESSION['wx_note_check'];
                if($wx_note_check['time'] <= $time){
                    //验证码超时
                    $arr['info'] = '验证码超时';
                    $arr['code'] = 10021;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }elseif($wx_note_check['mobile'] != $mobile){
                    //手机号不一致
                    $arr['info'] = '手机号不一致';
                    $arr['code'] = 10022;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }elseif($wx_note_check['code'] != $note_check){
                    //验证码错误
                    $arr['info'] = '验证码错误';
                    $arr['code'] = 10023;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }else{
                    $data = array(
                        'mobile'=>$wx_note_check['mobile']
                    );
                    $arr['info'] = '验证成功';
                    $arr['code'] = 1;
                    $arr['result'] = $data;
                    $arr['status'] = 1;
                    $this->ajaxReturn($arr);
                }
            }else{
                $arr['info'] = '参数错误';
                $arr['code'] = 10004;
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }else{
            $arr['info'] = '非法操作';
            $arr['code'] = 10004;
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }
    }



    /**
     * +------------------------------------------------------------------------------
     * @desc            : 征信查询提交
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/24
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function tofindzx(){


        if(!empty($_POST)){
            if(!empty($_POST['authorize_num']) && !empty($_POST['name']) && !empty($_POST['idcard_num']) && !empty($_POST['phone_num']) && !empty($_POST['fronttobase']) && !empty($_POST['oppositetobase']) && !empty($_POST['applytobase']) && !empty($_POST['authorizetobase']) && !empty($_POST['hztobase']))
            {
                $authorize = M('apply_for_authorisation')->where("acode='".$_POST['authorize_num']."' and state='1'")->find();
                if(!$authorize){
                    $arr['info'] = '授权书编号不正确或已被使用';
                    $arr['code'] = 11001;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }

                preg_match_all('/./us',$_POST['name'],$name);
                $cot_name  = count($name[0]);
                if($cot_name < 2 || $cot_name >4){
                    $arr['info'] = '姓名格式不正确';
                    $arr['code'] = 11002;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }

                if(!preg_match('/^\d{17}(\d|x)$/i',$_POST['idcard_num'])){
                    $arr['info'] = '身份证格式不正确';
                    $arr['code'] = 11003;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }

                if(!preg_match('/^1[34578]{1}[0-9]{1}\d{8}$/',$_POST['phone_num'])){
                    $arr['info'] = '手机格式错误';
                    $arr['code'] = 11004;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }

                if(!$fronttobase = $this->img_convert($_POST['fronttobase'])){
                    $arr['info'] = '身份证正面照大小错误';
                    $arr['code'] = 11005;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }
                if(!$oppositetobase = $this->img_convert($_POST['oppositetobase'])){
                    $arr['info'] = '身份证背面照大小错误';
                    $arr['code'] = 11006;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }
                if(!$applytobase = $this->img_convert($_POST['applytobase'])){
                    $arr['info'] = '申请书照片大小错误';
                    $arr['code'] = 11007;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }
                if(!$authorizetobase = $this->img_convert($_POST['authorizetobase'])){
                    $arr['info'] = '授权书照片大小错误';
                    $arr['code'] = 11008;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }
                if(!$hztobase = $this->img_convert($_POST['hztobase'])){
                    $arr['info'] = '合照大小错误';
                    $arr['code'] = 11009;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }


                $ckey = $this->tokhbyckey();

                $tofindzx = array(
                    'name'=>$_POST['name'],
                    'uid'=>$_SESSION['wx_userinfo']['id'],
                    'IDcard_num'=>$_POST['idcard_num'],
                    'phone_num'=>$_POST['phone_num'],
                    'authorize_num'=>$_POST['authorize_num'],
                    'sum_bit'=>'4',
                    'ckey'=>$ckey['ckey'],
                    'fronttobase'=>$fronttobase,
                    'oppositetobase'=>$oppositetobase,
                    'applytobase'=>$applytobase,
                    'authorizetobase'=>$authorizetobase,
                    'hztobase'=>$hztobase,
                    'ly'=>'查询',
                );

                if(!empty($_POST['id']) || $_POST['id'] != ''){
                    $info = M('tofindzx')->where("id='".$_GET['id']."' and uid='".WX_USER_ID."'")->find();





                }


                $url = C('CREDIT_API.zxcxsjtj');

                $result = json_decode(post($url,$tofindzx),true);

                if($result['errcode'] == '1'){
                    $time = time();
                    $addtofindzx = array(
                        'name'=>$_POST['name'],
                        'uid'=>$_SESSION['wx_userinfo']['id'],
                        'idcard_num'=>$_POST['idcard_num'],
                        'phone_num'=>$_POST['phone_num'],
                        'authorize_num'=>$_POST['authorize_num'],
                        'sum_bit'=>'4',
                        'ckey'=>$ckey['ckey'],
                        'fronttobase'=>$_POST['fronttobase'],
                        'oppositetobase'=>$_POST['oppositetobase'],
                        'applytobase'=>$_POST['applytobase'],
                        'authorizetobase'=>$_POST['authorizetobase'],
                        'hztobase'=>$_POST['hztobase'],
                        'time'=>$time,
                        'finally_time'=>$time,
                        'state'=>'正在查询',
                        'orderno'=>$result['orderNo'],
                        'errmsg'=>$result['errmsg'],
                        'ly'=>'查询',
                    );

                    $db_result = M('tofindzx')->add($addtofindzx);

                    if(empty($_POST['id']) || $_POST['id'] == ''){
                        $acode = array('state'=>'2');
                        $up = M('apply_for_authorisation')->where("acode='".$_POST['authorize_num']."'")->save($acode);
                    }else{
                        $state = array(
                            'errmsg'=> '作废',
                            'state'=> '作废',
                            'ly'=> '已重新提交,该订单作废,新订单编号为：'.$result['orderNo'],
                        );
                        $db_result = M('tofindzx')->where('id=')->add($addtofindzx);
                    }

                    $arr['info'] = '验证成功';
                    $arr['code'] = 1;
                    $arr['result'] = $result;
//                    $arr['data'] = $tofindzx;
//                    $arr['session'] = $_SESSION;
                    $arr['status'] = 1;
                    $this->ajaxReturn($arr);
                    exit;
                }else{
                    \Think\Log::write("快加认证（提交查询信息失败）\r\n返回结果：".json_encode($result)."\r\n调用时间：".date('Y-m-d H:i:s',time()));
                    $arr['info'] = '提交失败';
                    $arr['code'] = 11010;
                    $arr['data'] = $result;
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }
                
            }else{
                $arr['info'] = '参数错误';
                $arr['code'] = 11100;
                $arr['data'] = $_POST;
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }


        }









    }






    /**
     * +------------------------------------------------------------------------------
     * @desc            : 图片文件压缩
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/25
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
//    private function img_compress(){
//
//        $image = @imagecreatefrompng ("banner.png");
//        imagepng ($image,null,0); /*压缩等级0-9，压缩后9最小，1最大*/
//        imagedestroy ($image);
//
//
//
//    }








    /**
     * +------------------------------------------------------------------------------
     * @desc            : 图片文件转base64编码
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/25
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    private function img_convert($file) {

        $file_url = './Public' . $file;

        $img_data = filesize($file_url);
        if($img_data <= (1024*600)){
            $fp = fopen($file_url,'r+',2);
            $fred = fread($fp,$img_data);
            $base64_encode = base64_encode($fred);

//            $bace64 = chunk_split($base64_encode);

            fclose($fp);

//            return $data;
            return $base64_encode;
        }else{
            $data = array(
                'file' => $file,
                'file_url' => $file_url,
                'img_data' => $img_data,
            );


//            var_dump($img_data);
            return $data;
//            return false;
        }


    }



















    /**
     * +------------------------------------------------------------------------------
     * @desc            : 开户授权
     * +------------------------------------------------------------------------------
     * @access          : private
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/20
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    private function tokhbyckey(){


        $db = M('kjzx_ckey');
        $ckey = $db->where('id=1')->find();

        if(empty($ckey['ckey'])){

            $data = array(
                'khgsname'=> '上海帮贡投资管理中心(有限合伙)',
                'khlevel'=> '张中',
                'khrname'=> '1',
                'khsfznum'=> '310102198309301635',
                'khphonenum'=> '18019035363',
            );

            $url = C('CREDIT_API.khkh');

            $result = json_decode(post($url,$data),true);

            if($result['errcode'] == '1' || $result['errcode'] == '9' || !empty($result['ckey'])){
                $result['time'] = time();
                $db->where('id=1')->save($result);
                return $result;
            }else{
                \Think\Log::write("快加认证（开户授权信息获取失败）\r\n返回结果：".json_encode($result)."\r\n调用时间：".date('Y-m-d H:i:s',time()));
                return false;
            }

        }else{
            return $ckey;
        }

    }



}