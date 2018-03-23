<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/11/27
 * Time: 16:28
 */

namespace Weixin\Controller;
use Common\Controller\WeixinController;

/**
 * +------------------------------------------------------------------------------
 * @desc            : 征信类
 * +------------------------------------------------------------------------------
 * @access          : Class
 * @author          : will<849891012@qq.com>
 * @since           : 2017/11/27
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
class CreditController extends WeixinController {

    /**
     * +------------------------------------------------------------------------------
     * @desc            : name
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/27
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function credit(){
        $this->html_title = '征信查询';
        if(!empty($_GET['id'])){
            $data = M('tofindzx')->where("id='".$_GET['id']."' and uid='".WX_USER_ID."'")->find();
            $this->data =$data;
        }

        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 征信查询订单
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/27
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function search_history(){
        $this->html_title = '查询征信订单列表';

        $list = M('tofindzx')->where("uid='".WX_USER_ID."'")->select();

        $arr = array();
        $arr['list'] = $list;
        foreach($list as $k=>$v){

            //姓名处理
            preg_match_all('/./us',$v['name'],$user_name);
//            var_dump($user_name[0]);
            $name_cnt = count($user_name[0]);
            if($name_cnt == 2){
                $v['name'] = $user_name[0][0] . '*';
            }else{
                $v['name'] = $user_name[0][0];
                for($i = 0;$i<$name_cnt;$i++){
                    if($i == ($name_cnt - 1)){
                        $v['name'] .= $user_name[0][$i];
                    }else{
                        $v['name'] .= "*";
                    }
                }
            }

            //手机号处理
            preg_match_all('/./us',$v['phone_num'],$phone_num);
            $phone = $phone_num[0];
            $num_cnt = count($phone);
            $v['phone_num'] = '';
            for($i = 0;$i < $num_cnt;$i++){
                if($i < 3 || $i > 6){
                    $v['phone_num'] .=  $phone[$i];
                }else{
                    $v['phone_num'] .= '*';
                }
            }
//            var_dump($v['phone_num']);
//            var_dump($v);

            switch($v['errmsg']){
                case '提交成功':case '初审完成':case '正在查询':
                    $arr['ongoing'][] = $v;
                    break;
                case '查询成功':
                    $arr['accomplish'][] = $v;
                    break;
                case '回退':case '状态异常':
                    $arr['send_back'][] = $v;
                    break;
            }
        }



        $this->list =$arr;

        $this->display();
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 查询征信订单详情
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/27
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function detail(){
        $this->html_title = '查询征信订单详情';

        if(!empty($_GET['id'])){
            $data = M('tofindzx')->where("id='".$_GET['id']."' and uid='".WX_USER_ID."'")->find();

            //姓名处理
            preg_match_all('/./us',$data['name'],$user_name);
//            var_dump($user_name[0]);
            $name_cnt = count($user_name[0]);
            if($name_cnt == 2){
                $data['name'] = $user_name[0][0] . '*';
            }else{
                $data['name'] = $user_name[0][0];
                for($i = 0;$i<$name_cnt;$i++){
                    if($i == ($name_cnt - 1)){
                        $data['name'] .= $user_name[0][$i];
                    }else{
                        $data['name'] .= "*";
                    }
                }
            }

            //手机号处理
            preg_match_all('/./us',$data['phone_num'],$phone_num);
            $phone = $phone_num[0];
            $num_cnt = count($phone);
            $data['phone_num'] = '';
            for($i = 0;$i < $num_cnt;$i++){
                if($i < 3 || $i > 6){
                    $data['phone_num'] .=  $phone[$i];
                }else{
                    $data['phone_num'] .= '*';
                }
            }


//            var_dump($data);

            $this->data = $data;

        }

        $this->display();
    }











}