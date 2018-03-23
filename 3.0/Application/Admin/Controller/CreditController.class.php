<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/11/20
 * Time: 13:59
 */

namespace Admin\Controller;
use Admin\Model\CompressFilesModel;
use Common\Controller\VerifyController;

/**
 * +------------------------------------------------------------------------------
 * @desc            : 征信查询类
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/11/20
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
class CreditController extends VerifyController {
    /**
     * +------------------------------------------------------------------------------
     * @desc            : 申请书及授权书列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/20
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function authorization_list(){
        $num = $_POST['num'];
        $num = str_replace("'",'',$num);
            $db = M('apply_for_authorisation');
        $count = $db->count('id');

        if(!empty($_GET['page'])){
            $page = intval($_GET['page']);
        }else{
            $page = 1;
        }
        $limit = ceil($count / 20);
        $limit_min = ($page - 1) * 20;

        if(!empty($num)){
//            $where = "acode like '%".$_POST['num']."%'";
            $where = "acode like '%$num%'";
        }else{
            $where = "1";
        }

        $list = $db->where($where)->order('state,time desc')->limit("$limit_min,20")->select();

        foreach($list as $k=>$v){
            $applyurl = explode('.',$v['applyurl']);
            $authorizeurl = explode('.',$v['authorizeurl']);
            $apply = $applyurl[count($applyurl) -1];
            $authorize = $authorizeurl[count($authorizeurl) -1];

            $list[$k]['apply'] = $apply;
            $list[$k]['authorize'] = $authorize;

        }


        $page_number = array(
            'page'=>$page,
            'count'=>$limit,
        );

        $this->page_number = $page_number;
        $this->list = $list;

        $this->display();


    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 征信查询订单
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/12/1
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function credit_check_order_list(){
        $name = $_POST['name'];
        $name = str_replace("'",'',$name);
        $errmsg = $_POST['errmsg'];
        $where = '1';
        if(!empty($name)){
//        if(!empty($_POST['name'])){
            $where .= " and orderno like '%$name%' or name like '%$name%'";
//            $where .= " and orderno like '%".$_POST['name']."%' or name like '%".$_POST['name']."%'";
        }
        if(!empty($errmsg)){
//        if(!empty($_GET['errmsg'])){
            $where .= " and errmsg='$errmsg'";
        }

        $db = M('tofindzx');

        $count = $db->where($where)->count('id');

        if(!empty($_GET['page'])){
            $page = intval($_GET['page']);
        }else{
            $page = 1;
        }
        $limit = ceil($count / 20);
        $limit_min = ($page - 1) * 20;


        $list = $db->where($where)->limit("$limit_min,20")->select();

        foreach($list as $k=>$v){
            $pdfurl = explode('.',$v['pdfname']);
//            $authorizeurl = explode('.',$v['pdfname']);
            $apply = $pdfurl[1];
//            $authorize = $authorizeurl[count($authorizeurl) -1];

            $list[$k]['apply'] = $apply;
//            $list[$k]['authorize'] = $authorize;

        }

        $page_number = array(
            'page'=>$page,
            'count'=>$limit,
            'errmsg'=>$errmsg
        );

        $this->page_number = $page_number;
        $this->list = $list;

        $this->display();


    }







    /**
     * +------------------------------------------------------------------------------
     * @desc            : 获取申请书及授权书
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/20
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function accredit(){

        if(!empty($_POST['num'])){

            $ckey = $this->tokhbyckey();

            if(!$ckey){
                //获取ckey失败
                $arr['info'] = '加载失败！';
                $arr['status'] = 0;
                $arr['code'] = 32002;
                $this->ajaxReturn($arr);
                return false;
            }

            $num = $_POST['num'];
            $url = C('CREDIT_API.sqkbsqshsqs');
            $data = array(
                'ckey'=> $ckey['ckey'],
                'num'=> $num
            );

            $result = json_decode(post($url,$data),true);

            if($result['errcode'] == '1' || (is_array($result['result']) && count($result['result']) == $num)){
                $data_arr = array();
                foreach($result['result'] as $k=>$v){
                    $v['errmsg'] = $result['errmsg'];
                    $v['errcode'] = $result['errcode'];
                    $v['state'] = '1';
                    $v['time'] = time();

                    $data_arr[] = $v;
                }
                $db = M('apply_for_authorisation');

                $data1 = $db->addAll($data_arr);

            }else{
                \Think\Log::write("快加认证（获取授权书及申请书失败）\r\n返回结果：".json_encode($result)."\r\n调用时间：".date('Y-m-d H:i:s',time()));
                $arr['info'] = $result['errmsg'];
                $arr['info_code'] = $result['errcode'];
                $arr['status'] = 0;
                $arr['code'] = 32001;
                $this->ajaxReturn($arr);
                return false;

            }

            $dt = array(
                'ckey' => $ckey,
                'sqs' => $result,
                'data_arr' => $data_arr,
                'data' => $data1,
            );

            $arr['info'] = '获取成功';
            $arr['code'] = '4';
            $arr['result'] = $dt;
            $arr['status'] = 1;
            $this->ajaxReturn($arr);

        }else{
            $arr['info'] = '参数错误！';
            $arr['status'] = 0;
            $arr['code'] = 32001;
            $this->ajaxReturn($arr);
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