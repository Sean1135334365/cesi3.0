<?php
namespace Admin\Controller;
use Common\Controller\VerifyController;
class IndexController extends VerifyController {
    public function index(){
        if(empty($_SESSION['yzs_userinfo'])){
            $this->redirect('Login/login', array(), 0, '');
        }
        $db = M('catalogue');
        $list = $db->where('state=1')->select();
        $u_id = $_SESSION['yzs_userinfo']['rank'];
        $user_num_list = M('rank_catalogue')->where("r_id='$u_id'")->getField('c_id',true);

        $system = array();//定义系统目录
        $operation =array();//定义业务目录
        foreach($list as $k=>$v){
            $items = array();
            if($v['superior'] == 0){//判断是否为目录
                foreach($list as $key=>$val){
                    if($val['superior'] == $v['id'] && (in_array($val['id'],$user_num_list) || in_array($v['id'],$user_num_list) || $_SESSION['yzs_userinfo']['id'] == '1' || $_SESSION['yzs_userinfo']['id'] == '3')){//获取目录下的子菜单
                        $arr = array(
                            'id'        => $val['id'],
                            'text'      => $val['menu'],
                            'href'      => $val['menu_url'],
                        );
                        $items[] = $arr;
                    }
                }
                //判断目录类别
                if(!empty($items)){
                    if($v['sort'] == 1){//系统
                        $system[] = array(
                            'text'  => $v['menu'],
                            'items' => $items
                        );
                    }elseif($v['sort'] == 2){//业务
                        $operation[] = array(
                            'text'        => $v['menu'],
                            'items'      => $items
                        );
                    }
                }
            }
        }
        $data = array(
            array(
                'id'  => '1',
                'homePage'  => $system[0]['items'][0]['id'],
                'menu'=> $system
            ),
            array(
                'id'        => '2',
                'homePage'  => $operation[0]['items'][0]['id'],
                'menu'      => $operation
            )
        );

        $menu = json_encode($data,true);
        $this->json = $menu;
        $this->display();
    }



//    public function xxx(){
//        $s = "[{id:'1',menu:[{text:'系统管理',items:[{id:'12',text:'机构管理',href:'Index/xxx.html'},{id:'3',text:'角色管理',href:'Role/index.html'},{id:'4',text:'用户管理',href:'Login/login.html'},{id:'6',text:'菜单管理',href:'Menu/index.html'}]}]},{id:'6',text:'菜单管理',href:'Menu/index.html'}]}]},{id:'7',homePage : '9',menu:[{text:'业务管理',items:[{id:'9',text:'查询业务',href:'Node/index.html'}]}]}]";
//        $m = array(
//            array(
//                'id'=> '1',
//                'menu'=>array(
//                    array(
//                        'text'=>'系统管理',
//                        'items'=>array(
//                            array(
//                                'id'=>'12',
//                                'text'=>'机构管理',
//                                'href'=>'Index/xxx.html'
//                            ),
//                            array(
//                                'id'=>'3',
//                                'text'=>'角色管理',
//                                'href'=>'Role/index.html'
//                            ),
//                            array(
//                                'id'=>'4',
//                                'text'=>'用户管理',
//                                'href'=>'Login/login.html'
//                            ),
//                            array(
//                                'id'=>'6',
//                                'text'=>'菜单管理',
//                                'href'=>'Menu/index.htmll'
//                            ),
//                            array(
//                                'id'=>'4',
//                                'text'=>'用户管理',
//                                'href'=>'Login/login.html'
//                            )
//                        )
//                    )
//                )
//            ),
//            array(
//                'id'=>'7',
//                'homePage'=>'9',
//                'menu'=>array(
//                    array(
//                        'text'=>'业务管理',
//                        'items'=>array(
//                            array(
//                                'id'=>'9',
//                                'text'=>'查询业务',
//                                'href'=>'Node/index.html'
//                            )
//                        )
//                    )
//                )
//            )
//
//        );
//        $n = json_encode($m,true);
//        $i = json_decode($s,true);
//        var_dump($s);
//        echo "<br/>";
//        var_dump($n);
//        echo "<br/><pre>";
//        var_dump($i);
//
////        $this->display();
//    }

}