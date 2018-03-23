<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/7
 * Time: 17:48
 */

namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller {

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 登录界面
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/8
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function login(){
        $_SESSION = array();
        $this->display();
     }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 验证码
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/8
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function img_code(){
        $Verify = new \Think\Verify();
        $Verify->codeSet = '0123456789';
        $Verify->fontSize = 14;
        $Verify->length   = 4;


        $Verify->useCurve = false;
        $Verify->useNoise = false;
        $Verify->useImgBg = false;
        $Verify->bg = array(238,242,246);
        $Verify->entry();
        return $this;
    }
    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 登录验证
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/8
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function check_code(){
        if(I('username')){
            $username = I('username');
            $password = I('password');
//            $verify = I('verify');
            $db = M('admin_users');
            $data = $db->where("username='$username'")->find();
            if($data['status'] != '1'){
                $arr['info'] = '该账号已冻结,请联系管理员操作！';
                $arr['code'] = '001';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
            $psw = md5($password);
//            if(!$this->check_verify($verify)){
//                $this->error('验证码错误');
//            }
            if($data['password'] != $psw){
//                $this->error('密码错误');

                $arr['info'] = '用户名或密码错误';
                $arr['code'] = '002';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
            $date = empty($data['enter_time']) ? '/-/-/ -:-:-':date('Y-m-d H:i:s',intval($data['enter_time']));
            $enter_ip = empty($data['enter_ip']) ? '---,---,---':$data['enter_ip'];
            $array = array(
                'id'            => $data['id'],
                'username'      => $data['username'],
                'nickname'      => $data['nickname'],
                'name'          => $data['name'],
                'mobile'        => $data['mobile'],
                'channel_number'=> $data['channel_number'],
                'no_auth'       => $data['no_auth'],
                'inou'          => $data['inou'],
//                'age'           => $data['age'],
//                'gender'        => $data['gender'],
                'rank'          => $data['rank'],
                'founder'       => $data['founder'],
                'territory'     => $data['territory'],
                'register_time' => $data['register_time'],
                'register_ip'   => $data['register_ip'],
                'enter_time'    => $date,
                'enter_ip'      => $enter_ip,
                'classes'       => $data['classes']
            );
            session('yzs_userinfo', $array);
            $time = time();
            $ip = get_client_ip();
            $db->where('id='.$data['id'])->save(array('enter_time'=>$time,'enter_ip'=>$ip));
//            $this->success('登录成功',U('Index/index'),3);

            $ctr = CONTROLLER_NAME;
            $act = ACTION_NAME;

            if($ctr.'/'.$act != 'File/img_file')
                $get = !empty($_GET) ? json_encode($_GET):'';
            $post = json_encode($_POST);

            $log = array(
                'ctr'=>$ctr,
                'act'=>$act,
                'user_id'=>$_SESSION['yzs_userinfo']['id'],
                'user_name'=>$_SESSION['yzs_userinfo']['name'],
                'get'=>$get,
                'post'=>$post,
                'time'=>time()
            );

            $up = M('log')->add($log);


            $arr['info'] = '登录成功';
            $arr['code'] = '1';
            $arr['url'] = U('Index/index');
            $arr['status'] = 1;
            $this->ajaxReturn($arr);

        }else{
//            $this->error('登录失败');
            $arr['info'] = '登录失败';
            $arr['code'] = '0';
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 退出登录
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/13
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function quit(){
        $_SESSION['userinfo'] = '';
        $this->success('成功退出',U('Login/login'),3);


    }








}