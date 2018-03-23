<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/12/28
 * Time: 12:10
 */

namespace Admin\Controller;
use Common\Controller\VerifyController;


/**
 * +------------------------------------------------------------------------------
 * @desc            : 客户意见
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/12/28
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
class InteractionController extends VerifyController {

    /**
     * +------------------------------------------------------------------------------
     * @desc            : name
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/12/28
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function feedback_list(){

        $list = M('wx_feedback')->query("select f.*, w.nickname from yzs_wx_feedback f left join yzs_wxusers w on f.wx_id=w.id order by `time` desc");

        $this->list = $list;

        $this->display();
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 邮件提醒
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2018/3/8
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function email_list(){

//        echo '<pre>';


        $db = M('email_remind');
        $db1 = M('email');

//        $data = $db->query("select *");
        $list = $db->where("state = '1'")->select();
//        var_dump($db->_sql());


//        var_dump($list);

        $arr = array();

        foreach($list as $k=>$v){
            $arr[$v['category']]['y'] = $db1->where("id in(".$v['email'].")")->select();
//            $arr[$v['category']]['y'] = M()->query("select e.* from yzs_email_remind r left join yzs_email e on find_in_set(e.id,r.email) where r.id = 2");
//            var_dump($db1->_sql());
//            echo "//////////////";
            $arr[$v['category']]['n'] = $db1->where("id not in(".$v['email'].")")->select();
//            var_dump($db1->_sql());
        }


//        var_dump($arr);






        $this->list = $arr;



//        echo '</pre>';


        $this->display();







    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 模糊查询
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2018/3/16
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
    **/
    public function search(){
        if (IS_POST) {
            if ($_POST['name'] != '') {
                $e_name = $_POST['name'];
                $category = $_POST['code'];
            }
            if($_POST['table'] == 'left' && $category == '1'){
                $sql = "select e.* from yzs_email e	LEFT JOIN yzs_email_remind r on find_in_set(e.id, r.email) where (e.email like '%$e_name%' or e.`name` like '%$e_name%') and r.category=$category";
            }elseif($_POST['table'] == 'right' && $category == '1'){
                $sql = "select e.* from yzs_email e	LEFT JOIN yzs_email_remind r on not find_in_set(e.id, r.email) where (e.email like '%$e_name%' or e.`name` like '%$e_name%') and r.category=$category";
            }
//            if($category == '1'){
//                $sql = "select e.* from yzs_email e	LEFT JOIN yzs_email_remind r on find_in_set(e.id, r.email) where (e.email like '%$e_name%' or e.`name` like '%$e_name%') and r.category=$category";
//            }elseif($category == '2'){
//                $sql = "select e.* from yzs_email e	LEFT JOIN yzs_email_remind r on not find_in_set(e.id, r.email) where (e.email like '%$e_name%' or e.`name` like '%$e_name%') and r.category=$category";
//            }

            $Model = new \Think\Model();
            $list = $Model->query($sql);
//            echo "<pre>";
//            print_r($list);
                if ($list) {
                    $res = [
                        'code' => 1,
                        'data' => $list,
                        'msg' => '查询成功'
                    ];
                } else {
                    $res = [
                        'code' => 0,
                        'msg' => '查询失败！'
                    ];
                }
            echo json_encode($res);
            exit;
        }

    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 邮箱添加
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2018/3/16
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function email_add(){
        if (IS_POST) {
//            print_r($_SESSION['yzs_userinfo']['inou']);
//            exit;
            if($_SESSION['yzs_userinfo']['inou'] == '0'){
                if ($_POST['email'] != '') {
                    $array['email'] = $_POST['email'];
                }
                if ($_POST['name'] != '') {
                    $array['name'] = $_POST['name'];
                }
                $category = $_POST['code'];
//            $category = 1;  //测试
                $email = $_POST['email'];
                $db = M("email");
                $map['email'] = $email;
                $arr = $db->where($map)->find();
                if(empty($arr)){
                    $User = M("email");
                    $User2 = M("email_remind");
                    if (!empty($array)) {
                        $insert_id = $User->add($array);

                        $sql = $User2->where("category=$category")->find();
                        if(strstr($sql['email'],"$insert_id")){

                        }else{
                            $str = $sql['email'].','.$insert_id;
                            $date['email'] = $str;
                        }
//                    var_dump($User2->_sql());
//                    print_r($sql['email']);


                        $update = $User2->where("id=".$sql['id'])->save($date);

                    }
                    if ($update) {
                        $new_add = $User->where("id=$insert_id")->find();
                        $res = [
                            'code' => 1,
                            'data' => $new_add,
                            'msg' => '添加成功'
                        ];
                    } else {
                        $res = [
                            'code' => 0,
                            'msg' => '添加失败！'
                        ];
                    }
                }else{
                    $res = [
                        'code' => 2,
                        'msg' => '邮箱已存在！'
                    ];
                }
            }else{
                $res = [
                    'code' => 3,
                    'msg' => '无此权限！'
                ];
            }

            echo json_encode($res);
            exit;
        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 批量添加
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2018/3/16
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
    **/
    public function email_add_all(){
        if(IS_POST){
            if($_SESSION['yzs_userinfo']['inou'] == '0'){
                if(is_array($_POST['id'])){
                    $all_id = implode(',',$_POST['id']);
                }else{
                    $all_id = $_POST['id'];
                }
                $category = $_POST['code']; //分类

                $User = M('email');

                $User2 = M('email_remind');

                $date = $User->where("id in(".$all_id.")")->select();


                $sql = $User2->where("category=$category")->find();

                $str = $sql['email'].','.$all_id;

                $date2['email'] = $str;

                $update = $User2->where("id=".$sql['id'])->save($date2);

                if ($update) {

                    $res = [
                        'code' => 1,
                        'msg' => '添加成功！',
                        'data' => $date
                    ];

                } else {

                    $res = [
                        'code' => 0,
                        'msg' => '添加失败！'
                    ];
                }
            }else{
                $res = [
                    'code' => 3,
                    'msg' => '无此权限！'
                ];
            }
            echo json_encode($res);

            exit;
        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 移除
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2018/3/16
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
    **/
    public function delete(){
        if(IS_POST){
            if($_SESSION['yzs_userinfo']['inou'] == '0'){
                if(is_array($_POST['id'])){
                    $all_id2 = $_POST['id'];
                    $all_id = implode(',',$_POST['id']);
                }else{
                    $all_id = $_POST['id'];
                    $all_id2 = explode(',',$all_id);
                }


                $category = $_POST['code'];

//            $category = 1;  //测试

                $User = M('email');

                $User2 = M('email_remind');

                $date = $User->where("id in(".$all_id.")")->select();

                $sql = $User2->where("category=$category")->find();

                $email = explode(',',$sql['email']);

                foreach($email as $k=>$v){

                    if(in_array($v,$all_id2)){
                        unset($email[$k]);
                    }



                }

                if(empty($email)){
                    $str = '0';
                }else{
                    $str = implode(',',$email);
                }



                $date2['email'] = $str;
                $update = $User2->where("id=".$sql['id'])->save($date2);

                if ($update) {

                    $res = [
                        'code' => 1,
                        'msg' => '移除成功',
                        'data' => $date
                    ];

                } else {

                    $res = [
                        'code' => 0,
                        'msg' => '移除失败！'
                    ];
                }
            }else{
                $res = [
                    'code' => 3,
                    'msg' => '无此权限！'
                ];
            }
            echo json_encode($res);

            exit;
        }
    }









}