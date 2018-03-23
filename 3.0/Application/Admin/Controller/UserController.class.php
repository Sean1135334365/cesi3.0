<?php
/**
 * +------------------------------------------------------------------------------
 * @desc            : 用户管理
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2016/9/8
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
namespace Admin\Controller;
use Common\Controller\VerifyController;

class UserController extends VerifyController {
    /**
     * +------------------------------------------------------------------------------
     * @desc            : 管理员列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/8
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function admin_list(){
        $db = M('admin_users');
        $list = $db->select();
        $i=1;
        foreach($list as $k=>$v){
            $list[$k]['password'] = '';

            $etime = intval($v['enter_time']);
            $enter_time = date('Y-m-d',$etime) . '<br/>' .date('H:i:s',$etime);
            $list[$k]['enter_time'] = $enter_time;
            $list[$k]['number'] = $i;
            $i++;
        }
        $this->data = $list;
        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 管理员信息修改
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/9
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function admin_grouping(){
        $db = M('admin_users');
        if(!empty($_POST['id'])){  //判断是否有post数据 有就处理 并返回列表页
            $array = array();
            $id = $_POST['id'];
            if($_POST['nickname'] != $_SESSION['admin']['nickname']){
                $array['nickname'] = $_POST['nickname'];
            }
            if($_POST['name'] != $_SESSION['admin']['name']){
                $array['name'] = $_POST['name'];
            }
            if($_POST['password'] != $_SESSION['admin']['password']){
                $array['password'] = md5($_POST['password']);
            }
            if($_POST['mobile'] != $_SESSION['admin']['mobile']){
                $array['mobile'] = $_POST['mobile'];
            }
            if($_POST['mail'] != $_SESSION['admin']['mail']){
                $array['mail'] = $_POST['mail'];
            }
            if($_POST['gender'] != $_SESSION['admin']['gender']){
                $array['gender'] = $_POST['gender'];
            }
            if($_POST['rank'] != $_SESSION['admin']['rank']){
                $array['rank'] = $_POST['rank'];
            }
            if(!empty($array)){     //$array有值 修改管理员信息
                $up = $db->where("id='$id'")->save($array);
                if($up){
                    $this->success('修改成功',U('User/admin_list'),3);
                    exit;
                }else{
                    $this->error('修改失败');
                    exit;
                }
            }else{      //$array没值 提示没有修改信息
                $this->error('信息修改失败');
                exit;
            }
        }
        if(!empty($_GET['id'])){
            $db = M('admin_users');

            $data = $db->where('id='.$_GET['id'])->getField('id,username,password,nickname,name,mobile,mail,age,gender,rank');
            $this->user = $data[$_GET['id']];
            session('admin', $data[$_GET['id']]);
            $this->id = $_GET['id'];
        }
        $this->display();
    }



    /**
     * +------------------------------------------------------------------------------
     * @desc            : 新增管理员
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/13
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function addition_admin(){
        if(!empty($_POST)){
            $password = md5($_POST['password']);
            $time = time();
            $ip = get_client_ip();
            $array = array(
                'username'=>$_POST['username'],
                'password'=>$password,
                'nickname'=>$_POST['nickname'],
                'name'=>$_POST['name'],
                'mobile'=>$_POST['mobile'],
                'mail'=>$_POST['mail'],
                'age'=>$_POST['age'],
                'gender'=>$_POST['gender'],
                'rank'=>$_POST['rank'],
                'register_time'=>$time,
                'register_ip'=>$ip
            );
            $db = M('admin_users');
            $result = $db->add($array);
            if($result){
                $this->success('修改成功',U('User/admin_list'),3);
                exit;
            }else{
                $this->error('修改失败');
                exit;
            }
        }
        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 删除管理员
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/12
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function delete_admin(){
        if(!empty($_GET['id'])){
            $db = M('admin_users');
            $result = $db->where('id='.$_GET['id'])->delete();
            if($result){
                $this->success('删除成功',U('User/admin_list'),3);
                exit;
            }else{
                $this->error('删除失败');
                exit;
            }

        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 微信用户列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/5/2
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function wechat_list(){
        $type = $_GET['type'];
        $p_name = $_POST['name'];
        $p_name = str_replace("'",'',$p_name);
        $where = "1";//预设筛选条件

        if(!empty($p_name)){//模糊查询
            $where .= " and nickname like '%$p_name%' or wx_number like '%$p_name%' or channel_number like '%$p_name%'";
        }

        if(!empty($type)){//签约查询
            if($type == '1'){
//                $where .= " and is_auth = 1 and channel_number != ''";
                $where .= " and channel_number != ''";
            }elseif($type == '2'){
//                $where .= " and is_auth = 0";
                $where .= " and channel_number = ''";
            }
        }

        $db = M('wxusers');
        $count = $db->where($where)->count();
        if(!empty($_GET['page'])){
            $page = intval($_GET['page']);
        }else{
            $page = 1;
        }
        $limit = ceil($count / 20);
        $limit_min = ($page - 1) * 20;
        $result = $db->where($where)->order('is_auth desc, channel_number desc, w_time desc')->limit("$limit_min, 20")->select();
//        var_dump($db->_sql());
        $page_number = array(
            'page'=>$page,
            'count'=>$limit,
            'type'=>$type,
        );
        $this->list = $result;
        $this->page_number = $page_number;



/*
        switch($type){
            case 2:




                $count = $db->where("channel_number = ''")->count();
                if(!empty($_GET['page'])){
                    $page = intval($_GET['page']);
                }else{
                    $page = 1;
                }
                $limit = ceil($count / 20);
                $limit_min = ($page - 1) * 20;
                $result = $db->where("channel_number = ''")->order('w_time desc')->limit("$limit_min, 20")->select();
                $page_number = array(
                    'page'=>$page,
                    'count'=>$limit,
                );
                $this->list = $result;
                $this->page_number = $page_number;
                break;
            case 1:
                $db = M('wxusers');
                $count = $db->where("channel_number <> ''")->count();
                if(!empty($_GET['page'])){
                    $page = intval($_GET['page']);
                }else{
                    $page = 1;
                }
                $limit = ceil($count / 20);
                $limit_min = ($page - 1) * 20;
                $result = $db->where("channel_number <> ''")->order('w_time desc')->limit("$limit_min, 20")->select();
                $page_number = array(
                    'page'=>$page,
                    'count'=>$limit,
                );
                $this->list = $result;
                $this->page_number = $page_number;
                break;
            case 0:
                $db = M('wxusers');
                $count = $db->count();
//        $page = !empty($_POST['page']) ? $_POST['page']: 1;
                if(!empty($_GET['page'])){
                    $page = intval($_GET['page']);
                }else{
                    $page = 1;
                }
                $limit = ceil($count / 20);
                $limit_min = ($page - 1) * 20;
                $result = $db->order('channel_number desc')->limit("$limit_min, 20")->select();
                $page_number = array(
                    'page'=>$page,
                    'count'=>$limit,
                );
//        echo "<pre>";
//        print_r($result);
//        exit;
                $this->list = $result;
                $this->page_number = $page_number;
                break;
            default:
                break;

        }*/

//        $this->type = $type;
        $this->display();

/*        $db = M('wxusers');
//        $result = $db->where("is_auth != '0'")->select();
        $result = $db->select();
        $this->list = $result;

        $this->display();*/
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 微信用户修改
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/7
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function wechat_update(){
//        $db = M('product');
//        $data = $db->where('id=1')->find();
//
//        $house ="select name as house from yzs_house_type where id in(".$data['house'].")";
//        $best=M()->query($house);
//        foreach($best as $k=>$v){
//            for($i=0;$i<=$k;$i++){
//                $s = 0;
//                $s +=$i;
//            }
//
//            echo "<pre>";
//            print_r(implode(' ',$v));
//        }
//        echo "<pre>";
//        print_r($data);
//        echo "<br>";
//        print_r($best);
//        exit;

        /*echo "<pre>";
        print_r($_GET);
        exit;*/
//        print_r($_POST);
//        exit;
        $db = M('wxusers');

        if(!empty($_POST['id'])){  //判断是否有post数据 有就处理 并返回列表页
            $array = array();
            $id = $_POST['id'];
            if($_POST['remarks'] != $_SESSION['wxuser']['remarks']){
                $array['remarks'] = $_POST['remarks'];
            }
            if($_POST['wx_number'] != $_SESSION['wxuser']['wx_number']){
                $array['wx_number'] = $_POST['wx_number'];
            }
            if($_POST['is_auth'] != $_SESSION['wxuser']['is_auth']){
                $array['is_auth'] = $_POST['is_auth'];
            }

            if($_POST['is_auth'] == '1'){
                $sql = $db->where("id=$id")->find();
                if(empty($sql['channel_number']) || $sql['channel_number'] == ''){
                    $count = $db->where("channel_number != '' and channel_number is not null")->count();
                    $cha_num = $count + 1;
                    $array['channel_number'] = 'SP' . sprintf('%03d',$cha_num);
                }
            }
            /*if($_POST['channel_number'] != $_SESSION['wxuser']['channel_number']){
                $array['channel_number'] = $_POST['channel_number'];
            }*/

            if(!empty($array)){     //$array有值 修改信息
                $up = $db->where("id='$id'")->save($array);
                if($up){
                    $this->success('修改成功',U('User/wechat_list'),3);
                    exit;
                }else{
                    $this->error('修改失败');
                    exit;
                }
            }else{      //$array没值 提示没有修改信息
                $this->error('信息修改失败');
                exit;
            }
        }
        if(!empty($_GET['id'])){
            $db = M('wxusers');
            $data = $db->where('id='.$_GET['id'])->getField('id,nickname,openid,province,city,sex,is_auth,headimgurl,remarks,wx_number,channel_number,state');
            $this->user = $data[$_GET['id']];
            session('wxuser', $data[$_GET['id']]);
            $this->id = $_GET['id'];
        }

        $this->display();

        
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 微信列表页拉黑功能
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/29
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/

    public function channel_desc(){
        if(!empty($_POST)){
            $db = M('wxusers');
            $id = $_POST['id'];
            $data['state'] = $_POST['authorise'];
            $res = $db->where("id=$id")->save($data);
//            $sql = $db->_sql();
            if($res){
                $arr['info'] = '修改成功';
                $arr['code'] = '1';
//                $arr['data'] = $sql;
                $arr['status'] = 1;
                $this->ajaxReturn($arr);
            }else{
                $arr['info'] = '修改失败';
                $arr['code'] = '10001';
//                $arr['data'] = $sql;

                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 增加渠道号
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/25
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function channel_no(){
        if(!empty($_POST)){
            $db = M('wxusers');
            $id = $_POST['id'];
            $data['is_auth'] = $_POST['accredit'];
            if($_POST['accredit'] == '1'){
                $sql = $db->where("id=$id")->find();
                if(empty($sql['channel_number']) || $sql['channel_number'] == ''){
                    $count = $db->where("channel_number != '' and channel_number is not null")->count();
                    $cha_num = $count + 1;
                    $data['channel_number'] = 'SP' . sprintf('%03d',$cha_num);
                }
            }
            $res = $db->where("id=$id")->save($data);
            if($res){
                $arr['info'] = '修改成功';
                $arr['code'] = '1';
                $arr['iii'] = $count;
                $arr['data'] = $cha_num;
                $arr['status'] = 1;
                $this->ajaxReturn($arr);
            }else{
                $arr['info'] = '修改失败';
                $arr['code'] = '10001';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }else{
            $arr['info'] = '参数错误';
            $arr['code'] = '10001';
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }

    }


}