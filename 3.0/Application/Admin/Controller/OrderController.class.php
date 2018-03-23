<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/11/6
 * Time: 14:06
 */

namespace Admin\Controller;
use Admin\Model\CompressFilesModel;
use Common\Controller\VerifyController;

/**
 * +------------------------------------------------------------------------------
 * @desc            : 订单处理类
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/11/6
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
class OrderController extends VerifyController {

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 订单列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/6
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function apply_list(){


    }



    /**
     * +------------------------------------------------------------------------------
     * @desc            : 订单编辑页
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/24
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function apply_info(){


        $this->display();

    }








    /**
     * +------------------------------------------------------------------------------
     * @desc            : 微信申请订单列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/6
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function wx_apply(){

        $where = "1";

        if(!empty($_GET['type'])){//签约查询
            if($_GET['type'] == '1'){
//                $where .= " and sign_up = 1";
                $where .= " and channel != ''";
            }elseif($_GET['type'] == '2'){
//                $where .= " and sign_up = 0";
                $where .= " and channel = ''";
            }
        }

//        echo '<h2 style="text-align:center;padding:20% 0;width:80%;margin:0 auto;">无此权限</h2>';
//        exit;
//        echo "<pre>";
//        print_r($_SESSION['yzs_userinfo']['territory']);
//        print_r($_SESSION['yzs_userinfo']);
//        exit;
        //将用户查询权限加入条件
        $u_where = '';
//        print_r($_SESSION);
        if(!empty($_SESSION['yzs_userinfo']['territory']) || $_SESSION['yzs_userinfo']['territory'] != '0'){
            $u_territory = $_SESSION['yzs_userinfo']['territory'];
//            print_r($u_territory);
            $territory_list = M()->query("select GROUP_CONCAT(id) as id_list from yzs_product where find_in_set('$u_territory',territory) or FIND_IN_SET('$u_territory',city)");
            $territory = $territory_list[0]['id_list'];
            $where .= " and product in($territory)";
        }
        if(!empty($_SESSION['yzs_userinfo']['channel_number']) && $_SESSION['yzs_userinfo']['channel_number'] != '0'){
            $u_channel_number = $_SESSION['yzs_userinfo']['channel_number'];
        }elseif($_SESSION['yzs_userinfo']['channel_number'] == '0'){
            $u_channel_number = '0';
        }
        if(!empty($_SESSION['yzs_userinfo']['no_auth']) && $_SESSION['yzs_userinfo']['no_auth'] != '0'){
//            $no_auth = $_SESSION['yzs_userinfo']['no_auth'] == '0'
            if(!empty($u_channel_number) && $u_channel_number != '0'){
                $where .= " and (uid in($u_channel_number) or sign_up='0')";
            }elseif($u_channel_number != '0'){
                $where .= " and sign_up='0'";
            }
        }else{
            if(!empty($u_channel_number) && $u_channel_number != '0'){
                $where .= " and uid in($u_channel_number)";
            }elseif($u_channel_number == '0'){
                $where .= " and sign_up='1'";
            }else{
                echo '<h2 style="text-align:center;padding:25px 0;width:80%;margin:0 auto;">无此权限</h2>';
                exit;
            }
        }
//        $where .= " or uid='".$_SESSION['yzs_userinfo']['id'] ."'";

        //用户权限加入结束


        $db = M('wx_application');
        $count = $db->where($where)->count();
        $sql = "select a.id, a.order_number, u.nickname,u.channel_number, a.loanamount, a.number,a.mobile,a.channel, a.p_power_num, a.wx_time, a.wx_state, a.banks ,p.name from yzs_wx_application a left join yzs_wxusers u on a.uid = u.id left join yzs_product p on a.product = p.id where $where";/*left join yzs_client c on a.cet_id = c.id*/
        $p_name = $_POST['name'];
        $p_name = str_replace("'",'',$p_name);
        if(!empty($p_name)){
            $sql .= " and (a.order_number like '%$p_name%' or u.nickname like '%$p_name%' or a.loanamount like '%$p_name%' or a.mobile like '%$p_name%')";
        }
        if(!empty($_GET['page'])){
            $page = intval($_GET['page']);
        }else{
            $page = 1;
        }
        $limit = ceil($count / 20);
        $limit_min = ($page - 1) * 20;
        $sql .= " order by a.wx_time desc, a.wx_state asc, a.wx_time desc limit $limit_min,20";
        $page_number = array(
            'page'=>$page,
            'count'=>$limit,
            'type'=>$_GET['type'],
        );
        $Model = new \Think\Model();
        $list = $Model->query($sql);
//        var_dump($Model->_sql());
//        $banks = M('product')->where("id='6'")->getField('banks');
//        var_dump($banks);
        $this->list = $list;
//        echo "<pre>";
//        print_r($list);
        $this->page_number = $page_number;


        $this->display();

    }

    public function change(){

        if(IS_POST){
            $state = $_POST['flagid'];
            $oid = $_POST['oid'];
            $orderObj = M("wx_application");
            $data['wx_state'] = $state;
            $res = $orderObj ->where("id = $oid") ->save($data);
            if($res){
                $result['status']=1;
                $result['info']="操作成功";
                $this->ajaxreturn($result);
                exit;
            }else{
                $result['status']=0;
                $result['info']='操作失败';
                $this->ajaxreturn($result);
                exit;
            }
            /*$this ->ajaxReturn($res);*/
        }

    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 微信订单编辑页面
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/15
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/

    public function wx_redact(){


        $oid = $_GET['id'];
        if(!empty($oid)) {
            $numbering = M('wx_application')->where("id=$oid")->find();
            $proof = M('wx_identification_url')->where("o_id=$oid")->find();
            $wx_nickname = M('wxusers')->where("id=".$numbering['uid'])->getField('nickname');


            $obligee_name = json_decode($numbering['obligee_name'],true);//权利人姓名
            $obligee_identification_id = json_decode($numbering['obligee_identification_id'],true);//权利人身份证
            $obligee_mobile = json_decode($numbering['obligee_mobile'],true);//权利人手机
            $adult = json_decode($numbering['adult'],true);//权利人是否成年
            $matrimony = json_decode($numbering['matrimony'],true);//权利人婚姻状况
            $mate_y_n = json_decode($numbering['mate_y_n'],true);//配偶是否有权限
            $standby = json_decode($numbering['standby'],true);//是否有备用房


            $identity_card_mate = json_decode($proof['identity_card_mate'],true);//配偶身份证
            $identity_card_frontal = json_decode($proof['identity_card_frontal'],true);//身份证 或出生证明
            $marriage_certificate = json_decode($proof['marriage_certificate'],true);//婚姻证明
            $household_register = json_decode($proof['household_register'],true);//户口本
            $standby_house = json_decode($proof['standby_house'],true);//备用房证
            $pledge_house = json_decode($proof['pledge_house'],true);//抵押房证
            $application_form = json_decode($proof['application_form'],true);//申请书
            $credit_report = json_decode($proof['credit_report'],true);//征信报告
            $estate_survey = json_decode($proof['estate_survey'],true);//产调
            $bank = json_decode($proof['bank'],true);//银行流水
            $wx_data = json_decode($proof['wx_data'],true);//其他资料

        }


        $this->numbering = $numbering;
        $this->proof = $proof;
        $this->wx_nickname = $wx_nickname;//微信名
        //权利人
        $this->obligee_name = $obligee_name;
        $this->obligee_identification_id = $obligee_identification_id;
        $this->obligee_mobile = $obligee_mobile;
        $this->adult = $adult;
        $this->matrimony = $matrimony;
        $this->mate_y_n = $mate_y_n;
        $this->standby = $standby;
        //配偶
        $this->identity_card_mate = $identity_card_mate;
        $this->identity_card_frontal = $identity_card_frontal;
        $this->marriage_certificate = $marriage_certificate;
        $this->household_register = $household_register;
        $this->standby_house = $standby_house;
        $this->pledge_house = $pledge_house;
        $this->application_form = $application_form;
        $this->credit_report = $credit_report;
        $this->estate_survey = $estate_survey;
        $this->bank = $bank;
        $this->wx_data = $wx_data;
        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 微信订单修改页面
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/15
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/

    public function wx_uplode(){





        $db = M('wx_application');
        $db2 = M('wx_identification_url');
        $o_id = $_POST['id'];

        if(!empty($o_id)){
            $data = $db->where('id='.$_POST['id'])->getField('id,obligee_name,obligee_identification_id,obligee_mobile,loanamount,number,adult,standby,matrimony,mate_y_n,wx_state');
            session('order', $data[$_POST['id']]);

            $data2 = $db2->where('o_id='.$_POST['id'])->getField('o_id,identity_card_frontal,identity_card_mate,marriage_certificate,household_register,pledge_house,standby_house,application_form,credit_report,estate_survey,bank,wx_data');

            session('order2', $data2[$_POST['id']]);
        }

        if(!empty($_POST['id'])){  //判断是否有post数据 有就处理 并返回列表页


            if($_POST['download'] == '1' && $_POST['button'] == '下载文件'){


                $urls = 'image';

                $zip = new CompressFilesModel($urls);
                foreach($_POST['identity_card_frontal'] as $key=>$value){
                    $identity_card_frontal = $value;
                }
                foreach($_POST['identity_card_mate'] as $key=>$value){
                    $identity_card_mate = $value;
                }
                foreach($_POST['marriage_certificate'] as $key=>$value){
                    $marriage_certificate = $value;
                }
                $data = array(
                    array(
                        'name'=>'身份证',
                        'list'=>$identity_card_frontal,
                    ),
                    array(
                        'name'=>'配偶身份证',
                        'list'=>$identity_card_mate,
                    ),
                    array(
                        'name'=>'户口本',
                        'list'=>$_POST['household_register'],
                    ),
                    array(
                        'name'=>'婚姻证明',
                        'list'=>$marriage_certificate,
                    ),
                    array(
                        'name'=>'抵押房产',
                        'list'=>$_POST['pledge_house'],
                    ),
                    array(
                        'name'=>'产调',
                        'list'=>$_POST['estate_survey'],
                    ),
                    array(
                        'name'=>'备用房产',
                        'list'=>$_POST['standby_house'],
                    ),
                    array(
                        'name'=>'申请书',
                        'list'=>$_POST['application_form'],
                    ),
                    array(
                        'name'=>'征信报告',
                        'list'=>$_POST['credit_report'],
                    ),
                    array(
                        'name'=>'银行流水',
                        'list'=>$_POST['bank'],
                    ),
                );
//

//                var_dump($data);

                $name = "一站式_".$_POST['loanamount']."元";

                $file_zip = $zip->file_zip($data,$name);


            }else{


                $array = array();
                $array2 = array();
                if(json_encode($_POST['obligee_name']) != $_SESSION['order']['obligee_name']){
                    $array['obligee_name'] = json_encode($_POST['obligee_name']);
                }
                if(json_encode($_POST['obligee_identification_id']) != $_SESSION['order']['obligee_identification_id']){
                    $array['obligee_identification_id'] = json_encode($_POST['obligee_identification_id']);
                }
                if(json_encode($_POST['obligee_mobile']) != $_SESSION['order']['obligee_mobile']){
                    $array['obligee_mobile'] = json_encode($_POST['obligee_mobile']);
                }
                if($_POST['loanamount'] != $_SESSION['order']['loanamount']){
                    $array['loanamount'] = $_POST['loanamount'];
                }
                if($_POST['number'] != $_SESSION['order']['number']){
                    $array['number'] = $_POST['number'];
                }
                if(json_encode($_POST['adult']) != $_SESSION['order']['adult']){
                    $array['adult'] = json_encode($_POST['adult']);
                }
                if($_POST['standby'] != $_SESSION['order']['standby']){
                    $array['standby'] = $_POST['standby'];
                }
                if(json_encode($_POST['matrimony']) != $_SESSION['order']['matrimony']){
                    $array['matrimony'] = json_encode($_POST['matrimony']);
                }
                if(json_encode($_POST['mate_y_n']) != $_SESSION['order']['mate_y_n']){
                    $array['mate_y_n'] = json_encode($_POST['mate_y_n']);
                }
                if($_POST['wx_state'] != $_SESSION['order']['wx_state']){
                    $array['wx_state'] = $_POST['wx_state'];
                }

                /*图*/
                if(json_encode($_POST['identity_card_frontal']) != $_SESSION['order2']['identity_card_frontal']){
                    $array2['identity_card_frontal'] = json_encode($_POST['identity_card_frontal']);
                }
                if(json_encode($_POST['identity_card_mate']) != $_SESSION['order2']['identity_card_mate']){
                    $array2['identity_card_mate'] = json_encode($_POST['identity_card_mate']);
                }
                if(json_encode($_POST['marriage_certificate']) != $_SESSION['order2']['marriage_certificate']){
                    $array2['marriage_certificate'] = json_encode($_POST['marriage_certificate']);
                }
                if(json_encode($_POST['household_register']) != $_SESSION['order2']['household_register']){
                    $array2['household_register'] = json_encode($_POST['household_register']);
                }
                if(json_encode($_POST['pledge_house']) != $_SESSION['order2']['pledge_house']){
                    $array2['pledge_house'] = json_encode($_POST['pledge_house']);
                }
                if(json_encode($_POST['standby_house']) != $_SESSION['order2']['standby_house']){
                    $array2['standby_house'] = json_encode($_POST['standby_house']);
                }
                if(json_encode($_POST['application_form']) != $_SESSION['order2']['application_form']){
                    $array2['application_form'] = json_encode($_POST['application_form']);
                }
                if(json_encode($_POST['credit_report']) != $_SESSION['order2']['credit_report']){
                    $array2['credit_report'] = json_encode($_POST['credit_report']);
                }
                if(json_encode($_POST['estate_survey']) != $_SESSION['order2']['estate_survey']){
                    $array2['estate_survey'] = json_encode($_POST['estate_survey']);
                }
                if(json_encode($_POST['bank']) != $_SESSION['order2']['bank']){
                    $array2['bank'] = json_encode($_POST['bank']);
                }

/*            echo "<pre>";
            var_dump(json_encode($_POST['standby_house']));
            var_dump($_SESSION['order2']['standby_house']);

            var_dump($_POST);
            echo "<br>";
            print_r(json_encode($_POST['identity_card_mate']));
            echo "<br>";
            print_r($_SESSION['order2']['identity_card_frontal']);*/


//                echo "<pre>";
//                var_dump($array);
//                var_dump($array2);
//                var_dump($_SESSION['order2']['bank']);
//                var_dump(json_encode($_POST['bank']));
//                exit;


                if(!empty($array)){     //$array有值 修改订单信息
                    $uplode = $db->where("id=$o_id")->save($array);
                    if(!empty($array2)){
                        $uplode2 = $db2->where("o_id=$o_id")->save($array2);
                        if($uplode2){
                            $this->success('修改成功',U("Admin/Order/wx_redact/id/$o_id"),3);
                            exit;
                        }else{
                            $this->error('修改失败');
                            exit;
                        }
                    }else{
                        $this->success('修改成功',U("Admin/Order/wx_redact/id/$o_id"),3);
                        exit;
                    }
                }elseif(!empty($array2)){
                    $uplode2 = $db2->where("o_id=$o_id")->save($array2);
                    if($uplode2){
                        $this->success('修改成功',U("Admin/Order/wx_redact/id/$o_id"),3);
                        exit;
                    }else{
                        $this->error('修改失败');
                        exit;
                    }
                }else{//$array没值 提示没有修改信息
                    $this->error('信息修改失败');
                    exit;
                }

            }

            }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 查询功能
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/17
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/

/*    public function look_up(){
        print_r($_POST);
        $User = M("wx_application"); // 实例化User对象
        $condition['username'] = 'thinkphp';
        $condition['loanamount'] = 'thinkphp';
        $condition['order_number'] = 'OR';
// 把查询条件传入查询方法
        $User->where($condition)->select();
    }*/


}