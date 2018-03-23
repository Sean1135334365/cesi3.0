<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/12/26
 * Time: 15:45
 */

namespace Weixin\Controller;
use Common\Controller\WeixinController;

/**
 * +------------------------------------------------------------------------------
 * @desc            : 客户交互
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/12/26
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
class InteractionController extends WeixinController {
    /**
     * +------------------------------------------------------------------------------
     * @desc            : 意见反馈
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/12/26
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function feedback(){
        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 提交反馈
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/12/27
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function submit_feedback(){

        if(!empty($_POST)){
            $wx_id = WX_USER_ID;
            $db = M('wx_feedback');
            $time = time();
            $ymd = date('Y-m-d', $time);

            $count = $db->where("wx_id='$wx_id' and FROM_UNIXTIME(time,'%Y-%m-%d')='$ymd'")->count('id');

            //$arr['sql'] = $db->_sql();
            //$arr['count'] = $count;
            if($count >= 100){
                $arr['info'] = '今日已超过3次';
                $arr['code'] = '0';
                $arr['status'] = 10001;
                $this->ajaxReturn($arr);
            }

            $data = array(
                'wx_id'=>$wx_id,
                'name'=>$_POST['name'],
                'mobile'=>$_POST['mobile'],
                'content'=>$_POST['data'],
                'time'=>$time
            );

            $result = $db->add($data);
            if($result){


                $email_list = M()->query("select e.email, e.name from yzs_email_remind r left join yzs_email e on find_in_set(e.id,r.email) where r.id = 2");
//                    var_dump($email_list);
                $sendto = array();
                foreach($email_list as $k=>$v){
                    $sendto[] = array($v['email'],$v['name']);
                }
//                    var_dump($sendto);




                suggest_smtp_mail(array('name'=>$_POST['name'],'mobile'=>$_POST['mobile'],'nickname'=>$_SESSION['wx_userinfo']['nickname']),$data['content'],$sendto);

                $arr['info'] = '提交成功';
                $arr['code'] = '1';
//                $arr['url'] = U('Index/index');
                $arr['status'] = 1;
                $this->ajaxReturn($arr);
            }else{
                $arr['info'] = '提交失败';
                $arr['code'] = '0';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }

        }else{
            $arr['info'] = '参数错误';
            $arr['code'] = '0';
            $arr['status'] = 10002;
            $this->ajaxReturn($arr);
        }
    }




}