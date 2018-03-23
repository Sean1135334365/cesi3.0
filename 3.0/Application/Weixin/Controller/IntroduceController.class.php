<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/12/25
 * Time: 15:54
 */

namespace Weixin\Controller;
use Common\Controller\WeixinController;

/**
 * +------------------------------------------------------------------------------
 * @desc            : 微信产品介绍类
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/12/25
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
class IntroduceController extends WeixinController {

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品介绍
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/12/25
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function product_prensentation(){

        $result = M('product')->where("state='1' and introduce_img!=''")->select();
        $list = array();
        foreach($result as $k=>$v){
            if($v['banks'] == '1'){
                $list['bank'][] = $v;
            }else{
                $list['nbank'][] = $v;
            }
        }

        $this->list = $list;
        $this->display();
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 介绍图片
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/12/25
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function product_pic(){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
        }else{
            $this->error('操作失败');
        }
        $result = M('product')->where("id='$id'")->find();
        $this->info = $result;

        $this->display();
    }







}