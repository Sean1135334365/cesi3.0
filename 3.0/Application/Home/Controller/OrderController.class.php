<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/12/27
 * Time: 20:14
 */

namespace Home\Controller;
use Think\Controller;

class OrderController extends Controller {

    /**
     * +------------------------------------------------------------------------------
     * @desc            : name
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/12/27
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function orderinfo(){

        $oid = $_GET['id'];
//        $oid = 5;
        if(!empty($oid)) {
            $numbering = M('wx_application')->where("id=$oid")->find();
            $product_name = M('product')->where("id=$oid")->getField('name');//产品名称
            $proof = M('wx_identification_url')->where("o_id=$oid")->find();
            if(!empty($numbering['uid'])){
                $wx_nickname = M('wxusers')->where("id=".$numbering['uid'])->getField('nickname');
            }else{
                $this->error("数据不存在！ 错误编码：30001");
            }

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
        $this->product_name = $product_name;
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


}