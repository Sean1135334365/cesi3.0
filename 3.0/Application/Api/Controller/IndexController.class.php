<?php
namespace Api\Controller;
use Think\Controller;

/**
 * +------------------------------------------------------------------------------
 * @desc            : 快加回调接口
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/11/25
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/

class IndexController extends Controller {
    /**
     * +------------------------------------------------------------------------------
     * @desc            : 快加征信查询回调
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/25
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function index(){

        if(!empty($_GET['token']) && !empty($_POST['orderNo']) && !empty($_POST['errmsg'])){
//            $db = M('kjzx_cke');
            $ckey = M('kjzx_ckey')->where('id=1')->find();
            $check_token = md5('18019035363' . $ckey['ckey']);
            if(strtolower($_GET['token']) == $check_token){

                $info = M('tofindzx')->where("orderNo='". $_POST['orderNo'] ."'")->find();
                if($info){
                    $state = '';
                    $ly = '';
                    $data = array();
                    switch($_POST['errmsg']){
                        case '提交成功':
                            $state = '正在查询';
                            $ly = '提交成功';
                            break;
                        case '初审完成':
                            $state = '正在查询';
                            $ly = '初审完成,等待查询';
                            break;
                        case '正在查询':
                            $state = '正在查询';
                            $ly = '正在查询,等待结果';
                            break;
                        case '回退':
                            $state = '回退';
                            $ly = '被退回,请重新编辑提交';
                            break;
                        case '查询成功':
                            $state = '查询成功';
                            $ly = '查询成功';
                            !empty($_POST['pdfurl']) && $data['pdfurl'] = $_POST['pdfurl'];
                            !empty($_POST['pdfname']) && $data['pdfname'] = $_POST['pdfname'];
                            !empty($_POST['pdftime']) && $data['pdftime'] = $_POST['pdftime'];
                            break;
                        default:
                            $state = $_POST['errmsg'];
                            $ly = '状态异常';
                            break;
                    }
//                    $_POST['errmsg']

//                    if($_POST['errmsg'] == '')
                    $data['errmsg'] = $_POST['errmsg'];
                    $data['ly'] = $ly;
                    $data['state'] = $state;
                    $data['up_time'] = time();

//                    $data = array(
////                        'state_num'=>$_POST['errmsg'],
//                        'errmsg'=>$_POST['errmsg'],
//                        'ly'=>$ly,
//                        'state'=>$state,
//                        'up_time'=>time()
//                    );

                    $up_state = M('tofindzx')->where("orderNo='". $_POST['orderNo'] ."'")->save($data);

                    \Think\Log::write("快加认证（回调成功）\r\n返回结果：".json_encode($_POST)."\r\n调用时间：".date('Y-m-d H:i:s',time()));
                    if($up_state){
                        if($state == '查询成功'){
                            $authorize_num = M('tofindzx')->where("orderNo='". $_POST['orderNo'] ."'")->find();
                            $acode = array('state'=>'3');
                            $up = M('apply_for_authorisation')->where("acode='".$authorize_num['authorize_num']."'")->save($acode);
                        }
                        $ret = array(
                            "info"=>"接收成功",
                            "status"=> "1"
                        );
                        $rtn = json_encode($ret);
                        echo $rtn;
                    }else{
                        $ret = array(
                            "info"=>"接收失败",
                            "status"=> "0"
                        );
                        \Think\Log::write("快加认证（回调存入失败）\r\n返回结果：".json_encode($_POST)."\r\n调用时间：".date('Y-m-d H:i:s',time()));
                        $rtn = json_encode($ret);
                        echo $rtn;
                    }
                }else{
                    $ret = array(
                        "info"=>"无此订单",
                        "status"=> "0003"
                    );
                    \Think\Log::write("快加认证（回调无此订单）\r\n返回结果：".json_encode($_POST)."\r\n调用时间：".date('Y-m-d H:i:s',time()));
                    $rtn = json_encode($ret);
                    echo $rtn;
                }
            }else{
                $ret = array(
                    "info"=>"身份验证失败",
                    "status"=> "0002"
                );
                \Think\Log::write("快加认证（回调身份验证失败）\r\n返回结果：".json_encode($_POST)."
\n返回结果GET：".json_encode($_GET)."\r\n调用时间：".date('Y-m-d H:i:s',time()));
                $rtn = json_encode($ret);
                echo $rtn;
            }
        }else{
            $ret = array(
                "info"=>"参数错误",
                "status"=> "0001"
            );
            \Think\Log::write("快加认证（回调参数错误）\r\n返回结果：".json_encode($_POST)."
\n返回结果GET：".json_encode($_GET)."\r\n调用时间：".date('Y-m-d H:i:s',time()));
            $rtn = json_encode($ret);
            echo $rtn;
        }

    }
}