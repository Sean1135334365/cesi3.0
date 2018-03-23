<?php
/**
 * +------------------------------------------------------------------------------
 * @desc            : 微信公众号管理
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2016/9/20
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/

namespace Admin\Controller;
use Base\Controller\WeiXinController;

class AccountController extends WeiXinController {
    /**
     * +------------------------------------------------------------------------------
     * @desc            : 自定义菜单
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2016/9/20
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
     public function user_defined_menu(){
         $token = $this->access_token();
         $data = file_get_contents('https://api.weixin.qq.com/cgi-bin/menu/get?access_token='.$token);
         $menu = json_decode($data,true);
         if(empty($menu['conditionalmenu'])){
             $this->menu = $menu['menu']['button'];
         }else{
             $this->menu = $menu['conditionalmenu'][0]['button'];//下标0需要做地区验证
         }

//         echo '<pre>';
//         var_dump($menu['menu']['button']);
//         echo '</pre>';
//         $this->menu = $menu;

         $this->display();
     }




}