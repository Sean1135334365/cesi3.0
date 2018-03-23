<?php
/**
 * +------------------------------------------------------------------------------
 * @desc            : 系统管理
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2016/9/9
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/

namespace Admin\Controller;
use Common\Controller\VerifyController;

class SystemController extends VerifyController {

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 目录管理
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/9
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function index(){
//        $db = M('catalogue');
//        $list = $db->order('id')->select();

        $p_menu = $_POST['menu'];
        $p_menu = str_replace("'",'',$p_menu);
        $db = M('catalogue');
        $count = $db->count('id');

        if(!empty($_GET['page'])){
            $page = intval($_GET['page']);
        }else{
            $page = 1;
        }
        $limit = ceil($count / 20);
        $limit_min = ($page - 1) * 20;

        if(!empty($p_menu)){
            $where = "menu like '%$p_menu%'";
        }else{
            $where = "1";
        }
        if(empty($_SESSION['catalogue_list'])){
            $menu = $db->select();
            session('catalogue_list', $menu);
        }
        $catalogue_list = $_SESSION['catalogue_list'];
        $list = $db->where($where)->order('state desc, sort, id, superior')->limit("$limit_min,20")->select();

        $data = array();

        $data = array();
        foreach($list as $k=>$v){
            $superior = '';
            if($v['superior'] == 0){
                $tier = '一级目录';
            }else{
                $tier = '二级目录';
                foreach($list as $key=>$val){
                    if($v['superior'] == $val['id']){
                        $superior = $val['menu'];
                    }
                }
            }
            $data[] = array(
                'id'=>$v['id'],
                'menu'=>$v['menu'],
                'sort'=>$v['sort'],
                'tier'=> $tier,
                'superior'=>$superior,
                'act'=>$v['act'],
                'state'=>$v['state'],
                'delete'=>$v['superior']
            );
        }

        $page_number = array(
            'page'=>$page,
            'count'=>$limit,
        );
        $this->data = $data;
        $this->page_number = $page_number;
        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 目录新增及修改
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/12
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function catalogue(){
        $db = M('catalogue');
        if(!empty($_GET['id'])){
            $list = $db->where('id='.$_GET['id'])->find();
            $this->list = $list;
        }
//        var_dump($_SESSION['yzs_userinfo']['id']);
//        var_dump($_SESSION['yzs_userinfo']['id'] == '1' || $_SESSION['yzs_userinfo']['id'] == '3');
        if(!empty($_POST)){
            if($_SESSION['yzs_userinfo']['id'] == '1' || $_SESSION['yzs_userinfo']['id'] == '3'){
                if($_POST['tier'] == 1){
                    $crt = $_POST['act'];
                    $act = '';
                }elseif($_POST['tier'] == 2){
                    $supe = $db->where('id='.$_POST['superior'])->find();
                    $crt = $supe['crt'];
                    $act = $_POST['act'];
                    $url = '/index.php/Admin/'.$supe['crt'].'/'.$_POST['act'].'.html';
                }


                $array = array(
                    'menu'=>$_POST['menu'],
                    'superior'=>$_POST['superior'],
                    'crt'=>$crt,
                    'act'=>$act,
                    'menu_url'=>$url,
                    'sort'=>$_POST['sort'],
                    'state'=>$_POST['state']
                );
                if(empty($_POST['id']) || $_POST['id'] == 0){
                    $result = $db->add($array);
                }else{
                    $result = $db->where('id='.$_POST['id'])->save($array);
                }
                if(!$result){
                    $this->error('修改失败');
                    exit;
                }else{
                    $this->success('修改成功',U('System/index'),3);
                    exit;
                }
            }else{
                $this->error('无操作权限',U('System/index'),3);
            }

        }


        $supe = $db->where('superior=0')->select();
        $this->supe = $supe;

        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 目录禁用
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/12
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function delete_menu(){
        if(!empty($_GET['id']) && $_SESSION['yzs_userinfo']['rank'] == '1'){
            $db = M('catalogue');
            $state = $_GET['state'] == '1' ? '0': '1';
            $state_text = $_GET['state'] == '1' ? '禁用': '启用';
//            echo $state . $state_text;
            $result = $db->where('id='.$_GET['id'].' or superior='.$_GET['id'])->save(array('state'=>$state));
//            $result1 = true;
            if($result){
//                $result1 = $db->where('superior='.$_GET['id'])->save('state=0');
            }
            if($result == 0 || $result){
//                $this->success($state_text.'成功',U('System/catalog_list'),0);
                $this->redirect('System/index', array('page'=>$_GET['page']),0);
                exit;
            }else{
                $this->error($state_text.'失败');
                exit;
            }

        }else{
            $this->error('无操作权限');
        }

    }

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
        /*$a = '123456';
        print_r(md5($a));*/
//        $db = M('admin_users');
//        $list = $db->select();
//        $i=1;
//        foreach($list as $k=>$v){
//            $list[$k]['password'] = '';
//
//            $etime = intval($v['enter_time']);
//            $enter_time = date('Y-m-d',$etime) . '<br/>' .date('H:i:s',$etime);
//            $list[$k]['enter_time'] = $enter_time;
//            $list[$k]['number'] = $i;
//            $i++;
//        }
//        $this->data = $list;


        if($_SESSION['yzs_userinfo']['territory'] != 0){
            $where = "territory=".$_SESSION['yzs_userinfo']['territory'];
        }else{
            $where = "1";
        }
        if($_SESSION['yzs_userinfo']['founder']!=0){
            $admin_id = $_SESSION['yzs_userinfo']['id'];
            $ids = getChildrenIds($admin_id);

            if(!empty($ids)){
                $str = $admin_id.$ids;
                $where .= " and id IN(".$str.")";
            }else{
                $where .= " and id = ".$_SESSION['yzs_userinfo']['id'];
            }
        }

        if($_SESSION['yzs_userinfo']['classes'] == '3'){
            $where .= " and id=".$_SESSION['yzs_userinfo']['id']." or founder=".$_SESSION['yzs_userinfo']['id'];
        }
        if($_SESSION['yzs_userinfo']['id'] != 1 && $_SESSION['yzs_userinfo']['id'] != 3){
            $where .= " and id != 1";
        }


        $p_name = $_POST['name'];
        $p_name = str_replace("'",'',$p_name);
        $db = M('admin_users');
        $count = $db->count();

        if(!empty($_GET['page'])){
            $page = intval($_GET['page']);
        }else{
            $page = 1;
        }
        $limit = ceil($count / 20);
        $limit_min = ($page - 1) * 20;

        if(!empty($p_name)){
            $where .= " and username like '%$p_name%' or nickname like '%$p_name%' or name like '%$p_name%'";
        }/*else{
            $where .= " and status='1'";
        }*/
        $list = $db->where($where)->order('rank')->limit("$limit_min, 20")->select();
//        var_dump($db->_sql());
//        echo $db->getLastSql(); exit;
        foreach($list as $k=>$v){
            $list[$k]['register_time'] = date('Y-m-d\<\b\r \/\>H:i:s',$v['register_time']);
            $list[$k]['enter_time'] = date('Y-m-d\<\b\r \/\>H:i:s',$v['enter_time']);
            $list[$k]['founder'] = $db->where('id='.$list[$k]['founder'])->getField('name');
            $list[$k]['rank'] = M('rank')->where('id='.$v['rank'])->getField('rank');
            if(!empty($v['territory']) && $v['territory'] != '0'){
                $list[$k]['territory'] = M('territory')->where('id='.$v['territory'])->getField('name');
            }elseif($v['territory'] == '0'){
                $list[$k]['territory'] = '全国';
            }

        }




        $page_number = array(
            'page'=>$page,
            'count'=>$limit,
        );

        $this->data = $list;
        $this->page_number = $page_number;


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
//        echo "<pre>";
//        $get_id = $_GET['id'];
//        print_r($_SESSION['yzs_userinfo']);
//        print_r($_SESSION);
        $db = M('admin_users');
//        $admin_users = $db->where('id='.$_POST['id'])->find();
////        print_r($admin_users);
//        if($admin_users[''])
        if(!empty($_POST['id'])){  //判断是否有post数据 有就处理 并返回列表页
            $array = array();
            $_SESSION['yzs_userinfo']['rank'] != '1' and $this->error('无操作权限');
            $id = $_POST['id'];
            if(!empty($_POST['adminuser_username']) && $_POST['adminuser_username'] != $_SESSION['admin']['username']){
                $array['username'] = $_POST['username'];
            }
            if(!empty($_POST['nickname']) && $_POST['nickname'] != $_SESSION['admin']['nickname']){
                $array['nickname'] = $_POST['nickname'];
            }

            if(!empty($_POST['adminuser_name']) && $_POST['adminuser_name'] != $_SESSION['admin']['name']){
                $array['name'] = $_POST['adminuser_name'];
            }
            if(!empty($_POST['adminuser_password']) && $_POST['adminuser_password'] != $_SESSION['admin']['password']){
                $array['password'] = md5($_POST['adminuser_password']);
            }
            if(!empty($_POST['mobile']) && $_POST['mobile'] != $_SESSION['admin']['mobile']){
                $array['mobile'] = $_POST['mobile'];
            }
            if(!empty($_POST['mail']) && $_POST['mail'] != $_SESSION['admin']['mail']){
                $array['mail'] = $_POST['mail'];
            }

            if((!empty($_POST['territory']) || $_POST['territory'] == '0') && $_POST['territory'] != $_SESSION['admin']['territory']){
                $array['territory'] = $_POST['territory'];
            }


            if(!empty($_POST['channel_number']) && implode(',',$_POST['channel_number']) != $_SESSION['admin']['channel_number']){
                if(!empty($_POST['all_channel_number']) || $_POST['all_channel_number'] == '0'){
                    $array['channel_number'] = $_POST['all_channel_number'];
                }else{
                    $array['channel_number'] = implode(',',$_POST['channel_number']);
                }
            }

            if((!empty($_POST['no_auth']) || $_POST['no_auth'] == '0') && $_POST['no_auth'] != $_SESSION['admin']['no_auth']){
                $array['no_auth'] = $_POST['no_auth'];
            }

//            if(!empty($_POST['gender']) && $_POST['gender'] != $_SESSION['admin']['gender']){
//                $array['gender'] = $_POST['gender'];
//            }
//            if(!empty($_POST['age']) && $_POST['age'] != $_SESSION['admin']['age']){
//                $array['age'] = $_POST['age'];
//            }
            if(!empty($_POST['rank']) && $_POST['rank'] != $_SESSION['admin']['rank']){
                $array['rank'] = $_POST['rank'];
            }
            if(!empty($_POST['inou']) && $_POST['inou'] != $_SESSION['admin']['inou']){
                $array['inou'] = $_POST['inou'];
            }
//            if(!empty($_POST['classes']) && $_POST['classes'] != $_SESSION['admin']['classes']){
//                $array['classes'] = $_POST['classes'];
//            }
            if(!empty($_POST['radio']) && $_POST['radio'] != ''){
                $array['radio'] = $_POST['radio'];
            }

            if(!empty($array)){     //$array有值 修改管理员信息
                $up = $db->where("id='$id'")->save($array);
//                var_dump($db->_sql());exit;
                if($up){
                    $this->success('修改成功',U('System/admin_list'),3);
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
            $data = $db->where('id='.$_GET['id'])->getField('id,username,password,nickname,name,mobile,mail,territory,channel_number,no_auth,age,gender,rank,inou');
//            $data[$_GET['id']]['channel_number'] = explode(',',$data[$_GET['id']]['channel_number']);
            $this->user = $data[$_GET['id']];
            session('admin', $data[$_GET['id']]);
            $this->id = $_GET['id'];

            if(!empty($data[$_GET['id']]['territory']) && $data[$_GET['id']]['territory'] != '0'){
                $admin_territory = M('territory')->where("id='".$data[$_GET['id']]['territory']."'")->find();
                if($admin_territory['higher_up'] != '0'){
                    $admin_city = M('territory')->where("id='".$admin_territory['higher_up']."'")->getField('id');
                    $this->admin_city = $admin_city;
                    $territory = M('territory')->where("higher_up='".$admin_city."'")->select();
                    $this->territory =$territory;
                }else{
                    $this->admin_city = $data[$_GET['id']]['territory'];
                    $this->territory =array($admin_territory);

                }
            }elseif($data[$_GET['id']]['territory'] == '0'){
                $this->admin_city = '0';
                $this->territory ='0';
            }

        }
        if($_SESSION['yzs_userinfo']['inou'] == '0'){
            $rank = M('rank')->where("inou=1")->select();//外
            $rank2 = M('rank')->where("inou=2")->select();//内
        }else{
           $r_id = $_SESSION['yzs_userinfo']['rank'];
           $r_inou = $_SESSION['yzs_userinfo']['inou'];
//            $rank = M('rank')->where("id=".$_SESSION['yzs_userinfo']['rank'])->find();
            $rank = M('rank')->where("inou =$r_inou and id >=$r_id")->select();
        }
        $this->rank = $rank;
        $this->rank2 = $rank2;
        if($_SESSION['yzs_userinfo']['rank'] == '1' || $_SESSION['yzs_userinfo']['territory'] == '0'){
            $territory_where = 1;
        }else{
            $territory_where = "id=".$_SESSION['yzs_userinfo']['territory'];
        }
        $territory_where .= " and forbidden=1 and higher_up='0'";
        $city = M('territory')->where($territory_where)->select();
        $this->city = $city;

        $channel_number = M('wxusers')->where("is_auth='1' and channel_number != ''")->select();
        $this->channel_number = $channel_number;


        $this->display();
    }



    /**
     * +------------------------------------------------------------------------------
     * @desc            : 异步查询城市列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/12/13
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function city_check(){
        if(!empty($_POST)){
            if($_POST['grade'] == '1'){
                $territory = M('territory')->where("forbidden=1 and higher_up=".$_POST['val'])->select();
            }else{
                $territory = M('territory')->where("forbidden=1 and id=".$_POST['val'])->select();
            }
            $this->territory =$territory;
            if($territory){
                $arr['info'] = '获取成功';
                $arr['code'] = '4';
                $arr['result'] = $territory;
                $arr['status'] = 1;
                $this->ajaxReturn($arr);
            }else{
                $arr['info'] = '区域加载失败！';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }else{
            $arr['info'] = '参数错误！';
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }

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
            $inou = $_POST['rank'];
            $db = M('admin_users');
            $array = array();
            if($_POST['adminuser_username'] != '' && strlen($_POST['adminuser_username']) >= 3){
                $username = $_POST['adminuser_username'];

                $user_check = $db->where("username='$username'")->count();
                if($user_check > 0 || $user_check){
                    $this->error('用户名已存在');
                }
                $array['username'] = $username;
            }else{
                $this->error('用户名错误');
            }
            if($_POST['nickname'] != ''){
                $array['nickname'] = $_POST['nickname'];
            }/*else{
                $this->error('昵称不能为空');
            }*/
            if($_POST['adminuser_name'] != ''){
                $array['name'] = $_POST['adminuser_name'];
            }else{
                $this->error('姓名格式错误');
            }
            if($_POST['adminuser_password'] != '' && strlen($_POST['adminuser_password']) >= 6){
                $array['password'] = md5($_POST['adminuser_password']);
            }else{
                $this->error('密码长度错误');
            }
            if($_POST['mobile'] != '' && strlen($_POST['mobile']) == 11){
                $array['mobile'] = $_POST['mobile'];
            }else{
                $this->error('手机号错误');
            }
            if($_POST['mail'] != '' && strlen($_POST['mail']) > 8){
                $array['mail'] = $_POST['mail'];
            }/*else{
                $this->error('邮箱错误');
            }*/


            if(!empty($_POST['territory']) || $_POST['territory'] == '0'){
//                $array['territory'] = $_POST['territory'];
                $array['territory'] = $_POST['territory'];
            }else{
                $this->error('请选择城市');
            }

            if(!empty($_POST['channel_number'])){
                if(!empty($_POST['all_channel_number'])){
                    $array['channel_number'] = $_POST['all_channel_number'];
                }else{
                    $array['channel_number'] = implode(',',$_POST['channel_number']);
                }
            }

            if(!empty($_POST['no_auth']) || $_POST['no_auth'] == '0'){
                $array['no_auth'] = $_POST['no_auth'];
            }else{
                $this->error('参数错误');
            }

            if(!empty($_POST['inou'])){
                $array['inou'] = $_POST['inou'];
            }elseif($_POST['inou'] == '0'){
                $array['inou'] = $_POST['inou'];
            }else{
                $this->error('参数错误');
            }
            /*if($_POST['age'] != ''){
                $array['age'] = $_POST['age'];
            }*//*else{
                $this->error('年龄错误');
            }*/

            if($_POST['rank'] != ''){
                $array['rank'] = $_POST['rank'];
            }else{
                $this->error('未赋予权限');
            }
            /*if($_POST['classes'] != ''){
                $array['classes'] = $_POST['classes'];
            }else{
                $this->error('未确定归属');
            }*/

            $array['founder'] = $_SESSION['yzs_userinfo']['id'];
            $array['register_time'] = time();
            $array['register_ip'] = get_client_ip();
            /*$password = md5($_POST['password']);
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
            );*/
//            echo "<pre>";
//            print_r($_SESSION['yzs_userinfo']);
//            print_r($_POST);
//            print_r($array);
//            exit;
            $result = $db->add($array);
            if($result){
                $this->success('修改成功',U('System/admin_list'),3);
                exit;
            }else{
                $this->error('修改失败');
                exit;
            }
        }
        if($_SESSION['yzs_userinfo']['inou'] == '0'){
            $rank = M('rank')->where("inou=1")->select();//外
            $rank2 = M('rank')->where("inou=2")->select();//内
        }else{
            $r_id = $_SESSION['yzs_userinfo']['rank'];
            $r_inou = $_SESSION['yzs_userinfo']['inou'];
//            $rank = M('rank')->where("id=".$_SESSION['yzs_userinfo']['rank'])->find();
            $rank = M('rank')->where("inou =$r_inou and id >$r_id")->select();
        }
        $this->rank = $rank;
        $this->rank2 = $rank2;
        if($_SESSION['yzs_userinfo']['rank'] == '1' || $_SESSION['yzs_userinfo']['territory'] == '0'){
//            $territory_where = 1;
            $territory_where = "forbidden=1 and higher_up='0'";
            $city = M('territory')->where($territory_where)->select();

        }else{
            $territory_where = "id=".$_SESSION['yzs_userinfo']['territory'] . " and forbidden=1";
            $territory = M('territory')->where($territory_where)->find();
            if($territory['higher_up'] != '0'){
                $city = M('territory')->where("id=".$territory['higher_up'])->find();
            }else{
                $city = $territory;
            }
        }
        $this->city = $city;
        $this->territory = $territory;
        $channel_number = M('wxusers')->where("is_auth='1' and channel_number != ''")->select();
        $this->channel_number = $channel_number;




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
//            $result = $db->where('id='.$_GET['id'])->delete();
//            $result = $db->where('id='.$_GET['id'])->delete();

            $status = $_GET['status'] == '1' ? '0': '1';
            $status_text = $_GET['status'] == '1' ? '禁用': '启用';
//            echo $status . $status_text;exit;
            $result = $db->where('id='.$_GET['id'])->save(array('status'=>$status));
//            $result1 = true;
//            if($result){
//                $result1 = $db->where('superior='.$_GET['id'])->save('state=0');
//            }



            if($result == 0 || $result){
//                $this->success($state_text.'成功',U('System/catalog_list'),0);
                $this->redirect('System/admin_list', array('page'=>$_GET['page']),0);
                exit;
            }else{
                $this->error($status_text.'失败');
                exit;
            }
//            if($result){
//                $this->success('删除成功',U('System/admin_list'),3);
//                exit;
//            }else{
//                $this->error('删除失败');
//                exit;
//            }

        }
    }





    /**
     * +------------------------------------------------------------------------------
     * @desc            : 权限管理
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/5/25
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function jurisdiction_list(){
/*        $this->title = '身份列表';//页面名称
        $p_rank = $_POST['rank'];
        $p_rank = str_replace("'",'',$p_rank);
        //身份列表
        $db = M('rank');
//        $list = $db->select();
        $count = $db->count();

        if(!empty($_GET['page'])){
            $page = intval($_GET['page']);
        }else{
            $page = 1;
        }
        $limit = ceil($count / 20);
        $limit_min = ($page - 1) * 20;

        if(!empty($p_rank)){
            $where = "rank like '%$p_rank%'";
        }else{
            $where = "1";
        }


        $list = $db->where($where)->order('id')->limit("$limit_min, 20")->select();

//
//
//        $Model = new \Think\Model();
//        $catalogue = $Model->query("select r.id as id, r.rank, c.id as cid, c.menu, c.sort, c.superior from yzs_rank r left join yzs_rank_catalogue rc on r.id=rc.r_id left join yzs_catalogue c on rc.c_id=c.id order by r.id, rc.r_id, rc.c_id, c.id, c.sort");
//
//
//        $data = array();
//        foreach($catalogue as $k=>$v){
//            $list[$v['id']]['id'] = $v['id'];
//            $list[$v['id']]['rank'] = $v['rank'];
//            $list[$v['id']]['catalogue'][] = array(
//                'cid'=>$v['cid'],
//                'menu'=>$v['menu'],
//                'sort'=>$v['sort'],
//                'superior'=>$v['superior']
//            );
//        }
//


        $page_number = array(
            'page'=>$page,
            'count'=>$limit,
        );

        $this->list = $list;
        $this->page_number = $page_number;

//        $this->data = $data;

        $this->display();
//        echo '<pre>';
//        var_dump($list);
//        var_dump($catalogue);*/
        $db = M('rank');
        $list = $db->where("inou=1")->order('id')->select();//外部账号
        $list2 = $db->where("inou=2")->order('id')->select();//内部账号
        $this->list = $list;
        $this->list2 = $list2;
        $this->display();

    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 身份权限修改
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/6/29
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function jurisdiction_update(){
        $this->title = '身份权限修改';//页面名称
        $inou = $_GET['inou'];
        if(!empty($_POST)){
//            echo "<pre>";
//            print_r($_POST);
            if($_SESSION['yzs_userinfo']['inou']=='0'){
                if(empty($_POST['id']) && !empty($_POST['name'])){
                    $date['rank'] = $_POST['name'];
                    $date['inou'] = $_POST['inou'];
                    $id = M('rank')->add($date);
//                    var_dump($date);
//                    var_dump(M('rank')->_sql());
//                    exit;
                }else{
                    $id = $_POST['id'];
                    if($_POST['name'] != $_SESSION['admin_rank_name']){
                        $name_up = M('rank')->where("id=$id")->save(array('rank'=>$_POST['name']));
                    }
                }

                $c_id = $_POST['c_id'];
                foreach($c_id as $k=>$v){
                    if($v != '0'){
                        unset($_POST['cs_id'][intval($v)]);
                    }else{
                        unset($c_id[$k]);
                    }

                }
                foreach($_POST['cs_id'] as $k=>$v){
                    foreach($v as $key=>$val){
                        $c_id[] = $val;
                    }
                }
                $r_c = array();
                foreach($c_id as $k=>$v){
                    $r_c[] = array('r_id'=>$id,'c_id'=>$v);
                }

                $db = M('rank_catalogue');

//            $count = $db->where('r_id='.$id)->count();
                if(!empty($_POST['id'])){
                    $db->where('r_id='.$id)->delete();
                }
                $result = $db->addAll($r_c);


                if($result || (!empty($name_up) && $name_up)){
                    $this->success('修改成功',U('System/jurisdiction_list'),3);
                    exit;
                }else{
                    $this->error('修改失败');
                    exit;
                }
            }else{
                $this->error('无操作权限',U('System/jurisdiction_list'),3);
                exit;
            }



        }
        $where['state'] = '1';
        $data = M('catalogue')->where($where)->getField('id,menu,sort,superior');
//        var_dump(M('catalogue')->_sql());
        if(!empty($_GET['id'])){
            $rank = M('rank')->where('id='.$_GET['id'])->getField('rank');
            $list = M('rank_catalogue')->where('r_id='.$_GET['id'])->select();
            $arr = array();
            if(!empty($list)){
                foreach($list as $k=>$v){
                    $arr[] = $v['c_id'];
                }
                $where['id'] = array('in',$arr);
                $where['_logic'] = 'and';
                $array = M('catalogue')->where($where)->getField('id',true);
                foreach($data as $k=>$v){
//                if($v['sort'] == '2'){
                    $data[$k]['already'] = in_array($v['superior'],$array) || in_array($v['id'],$array) ? '1': '0';
//                }else{
//                    $data[$k]['already'] = in_array($v['id'],$array) ? '1': '0';
//                }
                }

            }

            $this->rank = $rank;
            session('admin_rank_name',$rank);
            $this->id = $_GET['id'];
        }
        $result = array();
        $independent = array();
        $indep = true;
        foreach($data as $k=>$v){
            if($v['superior'] == '0'){
                $result[$k] = $v;
                foreach($data as $key=>$val){
                    if($val['superior'] == $v['id']){
                        $result[$k]['next'][] = $val;
                    }
                }
            }/*elseif($v['sort'] == '0'){
                $v['superior'] = '0';
                $independent['next'][] = $v;
                if(empty($v['already']) || $v['already'] == '0'){
                    $indep = false;
                }
            }*/

//            var_dump($v);
        }
//        $independent['id'] = '0';
//        $independent['menu'] = '独立目录';
//        if($indep){
//            $independent['already'] = '1';
//        }else{
//            $independent['already'] = '0';
//        }
//        $result['independent'] = $independent;
//        var_dump($result);

////        var_dump(count($result));
//        var_dump($result);
//        var_dump($data);
//        echo '</pre>';


        $this->cont = count($result)+1;
        $this->data = $result;
        $this->inou = $inou;



        $this->display();

    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 提交记录
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/7/25
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function log(){
        $this->title = '系统操作记录';//页面名称
        $db = M('log');
//        $count = $db->count('id');
        $count = $db->where("ctr != 'File'")->count('id');

        if(!empty($_GET['page'])){
            $page = intval($_GET['page']);
        }else{
            $page = 1;
        }
        $limit = ceil($count / 20);
        $limit_min = ($page - 1) * 20;


        $page_number = array(
            'page'=>$page,
            'count'=>$limit,
        );

        $this->page_number = $page_number;


//        $list = $db->where($where)->order('id')->limit("$limit_min, 20")->select();


        $sql = "select
                l.id,
                l.ctr,
                (select c.menu from yzs_catalogue c where l.ctr=c.crt and c.sort=0) as ctrname,
                l.act,
                (select c.menu from yzs_catalogue c where l.ctr=c.crt and l.act=c.act) as actname,
                l.user_id,
                l.user_name,
                l.get,
                l.post,
                l.time
                from yzs_log l where l.ctr != 'File' order by l.`time` desc limit $limit_min,20";



        $Model = new \Think\Model();
        $result = $Model->query($sql);

//        echo '<pre>';
        foreach($result as $k=>$v){
//            var_dump($v);
            $post = json_decode($v['post'],true);
            $get = json_decode($v['get'],true);
            $result[$k]['time'] = date('Y/m/d H:i:s',$v['time']);
            switch($v['ctr']){
                case 'Login':
                    if($v['act'] == 'check_code'){
                        $result[$k]['cz'] = '登录';
                    }

                    break;
                case 'File':
                    //图片文件上传操作



                    break;
                case 'Order':
                    if(!empty($post['oid'])){
                        $result[$k]['cz'] = '修改';
                    }elseif(count($post) <= 2){
                        $result[$k]['cz'] = '查询';
                    }else{
                        $result[$k]['cz'] = '新增';
                    }

                    break;
                case 'System':
                    if(!empty($post['id'])){
                        $result[$k]['cz'] = '修改';
                    }elseif(count($post) <= 2){
                        $result[$k]['cz'] = '查询';
                    }else{
                        $result[$k]['cz'] = '新增';
                    }

                    break;
                //后续增加

            }




            /*
                        array(10) {
                            ["id"]=>
              string(2) "30"
              ["ctr"]=>
              string(6) "System"
              ["ctrname"]=>
              string(12) "系统管理"
              ["act"]=>
              string(9) "catalogue"
              ["actname"]=>
              NULL
              ["user_id"]=>
              string(1) "3"
              ["user_name"]=>
              string(4) "will"
              ["get"]=>
              string(0) ""
              ["post"]=>
              string(93) "{"id":"","sort":"2","menu":"\u64cd\u4f5c\u8bb0\u5f55","superior":"1","act":"log","state":"1"}"
              ["time"]=>
              string(10) "1500951134"
            }*/

        }




        $this->list = $result;
        $this->display();

    }















}