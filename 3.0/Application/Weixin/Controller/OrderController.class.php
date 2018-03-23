<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/11/3
 * Time: 10:59
 */

namespace Weixin\Controller;
use Common\Controller\WeixinController;

/**
 * +------------------------------------------------------------------------------
 * @desc            : 订单信息处理类
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/11/3
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
class OrderController extends WeixinController {
    /**
     * +------------------------------------------------------------------------------
     * @desc            : 订单处理
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/3
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function order_for(){
        

//        echo "<pre>";
//        var_dump($_POST);
//exit;

        if(!empty($_POST)){
//            echo '<pre>';
//            var_dump($_POST);
//            exit;

            //获取元素值
//            var_dump($_POST);
            $file_url = $_POST['file'];     //图片URL
            $usermobile = !empty($_POST['mobile']) ? $_POST['mobile']:'';   //短信验证手机号
            $channel = !empty($_POST['channel']) ? $_POST['channel']:'';   //签约号
            $product = !empty($_POST['product']) ? intval($_POST['product']): '';
            $loanamount = !empty($_POST['loanamount']) ? intval($_POST['loanamount']) * 10000: '';    //申请金额
            $number = !empty($_POST['number']) ? $_POST['number']: '';   //贷款期限
            $p_power_num = !empty($_POST['pawn']) ? $_POST['pawn']: '';   //权利人数量
            $adult = !empty($_POST['adult']) ? json_encode($_POST['adult']): '';   //权利人是否成年
            $matrimony = !empty($_POST['matrimony']) ? json_encode($_POST['matrimony']): '';   //婚姻状况
            $mate_y_n = !empty($_POST['mate_y_n']) ? json_encode($_POST['mate_y_n']): '';   //配偶是否为权利人
            $standby = !empty($_POST['standby']) ? $_POST['standby']: '';   //是否有备用房
            $territory_id = !empty($_POST['territory_id']) ? $_POST['territory_id']: '';   //产品城市id
            if(!empty($_POST['banks'])){
                $banks = !empty($_POST['banks']) ? $_POST['banks']: '';
            }else{
                $banks = M('product')->where("id='$product'")->getField('banks');//银行非银行
            }
            $wx_time = time();   //申请时间
            $wx_state = 0;   //订单状态 0:订单已提交 1:已受理 审核中 2:审核已通过 3：审核未通过 4：已放款  5：已结清  6：待放款'

            //region 生成订单编号
//            echo 111;
//            $dayCount = db_find("SELECT id FROM sdb_wx_application WHERE date_format(from_UNIXTIME(wx_time),'%Y-%m-%d %H:%i:%s') = date_format(now(),'%Y-%m-%d %H:%i:%s')");

            $num = "YZS";
            list($m,$s) = explode(' ', microtime());
            $tm = $s;
            $ms = floor($m * 10000);
            $rand = rand(100,999);

            $order_number = $num . $tm . $ms . $rand;

//            $order_number = '';
//            $date = date('ymdhis',$wx_time);
//            $rand = rand(100,999);
//            $num = count($dayCount)+1;
////            echo "select id from sdb_client where all_doc_number='ZY" . $date . $rand . $num . "'";
//            $num_check = db_find("select id from sdb_client where all_doc_number='ZY" . $date . $rand . $num . "'");
//            $num = count($num_check) + $num;
//            $order_number = 'ZY' . $date . $rand . $num;

            //endregion

/*
            $application = array(
                'uid'=>$_SESSION['wx_userinfo']['id'],
                'order_number'=>$order_number,
                'loanamount'=>$loanamount,
                'number'=>$number,
                'p_power_num'=>$p_power_num,
                'adult'=>$adult,
                'matrimony'=>$matrimony,
                'mate_y_n'=>$mate_y_n,
                'standby'=>$standby,
                'wx_time'=>$wx_time,
                'wx_state'=>$wx_state,
            );*/



            //region 定义图片变量
            $icf = array();  //身份证或出生证明
            $icm = array();   //配偶身份证
            $mc = array();    //婚姻证明
            $hr = array();  //户口本
            $sh = array();   //备用房证
            $ph = array();    //抵押房证
            $cr = array();   //征信报告
            $es = array();   //产调
            $ba = array();    //银行流水
            $dt = array();  //其他
            $af = array();    //申请书

            foreach($file_url as $k=>$v){
                $s1 = ($k /100) % 10;
                $s2 = ($k /10) % 10;
                $s3 = $k % 10;
                if($s1 == 1){
                    switch($s3){
                        case 1:
                            $icf[$s2] = $v;
                            break;
                        case 2:
                            $icm[$s2] = $v;
                            break;
                        case 3:
                            $mc[$s2] = $v;
                            break;
                    }
                }elseif($s2 == 3){
                    switch($s3){
                        case 1:
                            $ph = $v;

                            break;
                        case 2:
                            $sh = $v;
                            break;
                    }
                }/*elseif($s2 == 4){
                    switch($s3){
                        case 1:
                            $cr = $v;
                            break;
                        case 2:
                            $es = $v;
                            break;
                        case 3:
                            $ba = $v;
                            break;

                    }
                }*/elseif($s3 == 2){
                    $hr = $v;
                }elseif($s3 == 4){
                    $af = $v;
                }elseif($s3 == 5){
                    $cr = $v;
                }elseif($s3 == 6){
                    $es = $v;
                }elseif($s3 == 7){
                    $ba = $v;
                }else{
                    $dt = $v;
                }
            }

            //图片数据
            $identity_card_frontal = json_encode($icf);  //身份证或出生证明
            $identity_card_mate = json_encode($icm);   //配偶身份证
            $marriage_certificate = json_encode($mc);    //婚姻证明
            $household_register = json_encode($hr);  //户口本
            $standby_house = json_encode($sh);   //备用房证
            $pledge_house = json_encode($ph);    //抵押房证
            $application_form = json_encode($af);    //申请书
            $credit_report = json_encode($cr);   //征信报告
            $estate_survey = json_encode($es);   //产调
            $bank = json_encode($ba);   //银行流水
            $wx_data = json_encode($dt); //其他


            //endregion

            $application = array(
                'uid'=>$_SESSION['wx_userinfo']['id'],
                'mobile'=>$usermobile,
                'channel'=>$channel,
                'order_number'=>$order_number,
                'product'=>$product,
                'loanamount'=>$loanamount,
                'number'=>$number,
                'p_power_num'=>$p_power_num,
                'adult'=>$adult,
                'matrimony'=>$matrimony,
                'mate_y_n'=>$mate_y_n,
                'standby'=>$standby,
                'territory_id'=>$territory_id,
                'banks'=>$banks,
                'wx_time'=>$wx_time,
                'wx_state'=>$wx_state,
            );
            $db1 = M('wx_application');
            $db1->startTrans();
            $o_id = $db1->add($application);
            if($o_id){
                $identification_url = array(
                    'o_id'=>$o_id,
                    'identity_card_frontal'=>$identity_card_frontal,
                    'identity_card_mate'=>$identity_card_mate,
                    'marriage_certificate'=>$marriage_certificate,
                    'household_register'=>$household_register,
                    'standby_house'=>$standby_house,
                    'pledge_house'=>$pledge_house,
                    'application_form'=>$application_form,
                    'credit_report'=>$credit_report,
                    'estate_survey'=>$estate_survey,
                    'bank'=>$bank,
                    'wx_data'=>$wx_data,
                );

//                var_dump($identification_url);

                $db2 = M('wx_identification_url');
                $db2->startTrans();
                $url_id = M('wx_identification_url')->add($identification_url);


                if($url_id){
//            //短信通知
//            $Mobile = array('18019035363','13661910994','13761112188');
//
//            $allMobile = implode(',',$Mobile);
//            $dataarr = array($_POST['loanamount']);
//            $channel = db_find_one("select u.`channel` from sdb_wxuser w left join sdb_user u on w.openid = u.wxopenid where w.uid = '$uid'");
//            if($channel['channel']){
//                $dataarr[] = '微信来源：' . $channel['channel'];
//            }else{
//                $dataarr[] = '';
//            }
//            include "./xiunophp/sms.func.php";
//            sendTemplateSMS($allMobile,$dataarr,161833);
                    $db1->commit();
                    $db2->commit();

//                    $this->redirect('Order/product_success',array('id'=>$url_id),0,'提交成功');

                    $data = array(
                        'order_number'=>$order_number,
                        'loanamount'=>$loanamount/10000,
                        'number'=>$number
                    );



//                    $this->redirect('Order/product_success',$data,0,'提交成功');
//            exit;
                    $email_list = M()->query("select e.email, e.name from yzs_email_remind r left join yzs_email e on find_in_set(e.id,r.email) where r.id = 1");
//                    var_dump($email_list);
                    $sendto = array();
                    foreach($email_list as $k=>$v){
                        $sendto[] = array($v['email'],$v['name']);
                    }
//                    var_dump($sendto);


                    $money = $loanamount/10000;
                    $o_num = $order_number;
                    \Think\Log::write("发送邮件：开始".date('Y-m-d H:i:s',time()));
                    $ex = smtp_mail1($money,$o_num,$o_id,$sendto);

                    var_dump($ex);
//                    exit;
                    $this->data = $data;
                    $this->display();

//                    include './weixin/view/apply_for_result.html';
//                    echo "<div style='width:100%;text-align:center;margin-top:15%;'><h3>资料上传成功</h3><h4>工作人员会尽快与您联系！请您耐心等待！</h4></div>";
                }else{
                    //数据库订单表添加失败

                    $db2->rollback();
                    $this->error('提交失败！请重新提交');


//                    echo "<div style='width:100%;text-align:center;margin-top:15%;'><h2>资料上传失败！请点击<a href='./apply_for.htm'>返回</a>重新上传资料</h2></div>";
                }
            }else{
                //数据库订单表添加失败

                $db1->rollback();
                $this->error('提交失败！请重新提交');

//                echo "<div style='width:100%;text-align:center;margin-top:15%;'><h4>资料上传失败！请点击<a href='./apply_for.htm'>返回重新上传</a>资料</h4></div>";

            }

        }else{
            //数据库订单表添加失败
            $this->error('参数错误！请重新提交');
//            include './weixin/view/apply_for.html';

//                echo "<div style='width:100%;text-align:center;margin-top:15%;'><h4>资料上传失败！请点击<a href='./apply_for.htm'>返回重新上传</a>资料</h4></div>";
        }
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : name
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/3
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function product_success(){


//        $this->error('错误');

//        $data = array(
//            'order_number'=>$order_number,
//            'loanamount'=>$loanamount,
//            'number'=>$number
//        );
        $this->order_number = $_GET['order_number'];
        $this->loanamount = $_GET['loanamount'];
        $this->number = $_GET['number'];


        $this->display();
    }















}