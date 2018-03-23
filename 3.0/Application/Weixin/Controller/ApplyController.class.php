<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/10/15
 * Time: 14:30
 */

namespace Weixin\Controller;
use Common\Controller\WeixinController;
/**
 * +------------------------------------------------------------------------------
 * @desc            : 微信申请
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/10/15
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
class ApplyController extends WeixinController {
    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品选择
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/15
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function product(){
//        var_dump(explode(',','1.0,'),1);
//        var_dump(explode(',','1.0,1.5'),2);
//        var_dump(explode(',',',1.5'),3);
//        var_dump($_SESSION);
        $this->display();
    }
    public function product_way(){
        /*echo "<pre>";*/
        $sql = "select r.p_id,p.img_roasting from yzs_roasting r, yzs_product p where p.id=r.p_id";
        $list = M()->query($sql);
        $this->list = $list;
        /*print_r($list);
        exit;*/
        $this->display();
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品筛选
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/15
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function product_screen(){

        if(!empty($_POST)){
            $where = '';
//            if(!empty($_POST['data'])){
//            }


            if(!empty($_POST['city']) && (!empty($_POST['higher_up']) || $_POST['higher_up'] == '0')){
                $city = $_POST['city'];
                if($_POST['higher_up'] == '0'){
                    $where .= "state='1' and  find_in_set('$city', city)";
                }else{
                    $where .= "state='1' and  find_in_set('$city', territory)";
                }

            }
            !empty($_POST['data']) && $data = json_decode($_POST['data'],true);

            //银行或非银机构
            /*if(!empty($_POST['banks'])){
                $where .= " and banks=".$_POST['banks'];
            }*/
            if($_POST['banks'] == 1){
                $where .= " and banks=1";
            }else{
                $where .= " and banks=0";
            }
//            $rad = $_POST['rad'];


//            echo '<pre>';
////            var_dump($_POST);
//            var_dump(!empty($_POST['city']));
//            var_dump($_POST['city']);
//            var_dump(!empty($_POST['higher_up']));
//            var_dump($_POST['higher_up'] == '0');
//            var_dump((!empty($_POST['higher_up']) || $_POST['higher_up'] == '0'));
//            var_dump($_POST['higher_up']);

            /*if($data['patterns'] != ''){
                $where .= " and territory like '%".$data['territory']."%'";
            }
            if($data['territory'] != ''){
                $where .= " and territory like '%".$data['territory']."%'";
            }*/
            if($data['territory'] != ''){
                $where .= " and find_in_set('".$data['territory']."', territory)";
            }
            if($data['house'] != ''){
//                $where .= " and find_in_set('".$data['house']."', house) like '%".$data['house']."%'";
                $where .= " and find_in_set('".$data['house']."', house)";
            }
            if($data['percentage'] != ''){
                $where .= " and min_percentage <=".$data['percentage']." and max_percentage >=".$data['percentage'];
            }
            if($data['patterns'] != ''){
                $where .= " and find_in_set('".$data['patterns']."', loans_type)";
            }
            if($data['mortgage'] != ''){
                $where .= " and find_in_set('".$data['mortgage']."', impawn_type)";
            }
            if($data['interest'] != ''){
                $iet = explode(',',$data['interest']);
//                var_dump($iet);
                //判断是否签约用户
                if($_SESSION['wx_userinfo']['is_auth'] == '1' && $_SESSION['wx_userinfo']['channel_number'] != ''){
                    //签约用户
                    if($iet[0] != '' && $iet[1] != ''){
                        $where .= " and (admin_max_interest >=".$iet[0]." or admin_interest >=".$iet[0].") and (admin_min_interest <=".$iet[1]." or admin_interest <=".$iet[1].")";
                    }elseif($iet[0] != '' && $iet[1] == ''){
                        $where .= " and (admin_min_interest >=".$iet[0]." or admin_interest >=".$iet[0].")";
                    }elseif($iet[0] == '' && $iet[1] != ''){
                        $where .= " and (admin_max_interest <=".$iet[1]." or admin_interest <=".$iet[1].")";
                    }
                }else{
                    //非签约用户
                    if($iet[0] != '' && $iet[1] != ''){
                        $where .= " and (max_interest >=".$iet[0]." or interest >=".$iet[0].") and (min_interest <=".$iet[1]." or interest <=".$iet[1].")";
                    }elseif($iet[0] != '' && $iet[1] == ''){
                        $where .= " and (min_interest >=".$iet[0]." or interest >=".$iet[0].")";
                    }elseif($iet[0] == '' && $iet[1] != ''){
                        $where .= " and (max_interest <=".$iet[1]." or interest <=".$iet[1].")";
                    }
                }
//                $where .= " and interest like '%".$_POST['val']."%'";
            }

//                if(!empty($where)){
//                    $where .= " and territory like '%".$_POST['val']."%'";
//                }else{
//                    $where = "territory like '%".$_POST['val']."%'";
//                }
//        }

//            echo $where;

//            $sql = "select * from yzs_product p ";





            $db = M('product');
            $list = $db->where($where)->select();
//             echo $db->_sql();
//            $sql = $db->_sql();
            if($list){
                $Model = new \Think\Model();
                foreach($list as $k=>$v){
//                    $type = $Model->query("select GROUP_CONCAT(name) as type from yzs_product_type where id in(".$v['type'].")");

                    $city ='';
                    if(!empty($v['city'])){
                        $city = $Model->query("select GROUP_CONCAT(name) as city from yzs_territory ter where id in(".$v['city'].")");
                    }
                    $territory = '';
                    if(!empty($v['territory'])){
                        $territory = $Model->query("select GROUP_CONCAT(name) as territory from yzs_territory where id in(".$v['territory'].")");
                    }
                    $house = '';
                    if(!empty($v['house'])){
                        $house = $Model->query("select GROUP_CONCAT(name) as house from yzs_house_type where id in(".$v['house'].")");
                    }
                    $loans_type = '';
                    if(!empty($v['loans_type'])){
                        $loans_type = $Model->query("select GROUP_CONCAT(name) as loans_type from yzs_loans_type where id in(".$v['loans_type'].")");
                    }
//                    $list[$k]['type_name'] = $type;
                    $list[$k]['city_name'] = $city;
                    $list[$k]['territory_name'] = $territory;
                    $list[$k]['house_name'] = $house;
                    $list[$k]['loans_type_name'] = $loans_type;
                    $list[$k]['url_str'] = U('Apply/product_introduce',array('id'=>$v['id']));
                }
            }


//            var_dump($list);
            $ree = M('wxusers')->where("id=".$_SESSION['wx_userinfo']['id'])->find();

            $arr['info'] = '获取成功';
            $arr['code'] = '4';
            $arr['result'] = $list;
            $arr['is_auth'] = $ree['is_auth'];
//            $arr['result1'] = $_POST;
//            $arr['is_auth'] = $_SESSION['wx_userinfo']['is_auth'];
//            $arr['sql'] = $sql;
            $arr['status'] = 1;
            $this->ajaxReturn($arr);






        }/*else{
            echo '<pre>';
            var_dump($_POST);
        }*/




    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品详情
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/15
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function product_introduce(){



        if(!empty($_GET['id'])){
            $db = M('product');
            $data = $db->where('id='.$_GET['id'])->find();

            $month = explode(',',$data['month']);
            $impawn_type = explode(',',$data['impawn_type']);
//            echo count($impawn_type);
            $count_type = count($impawn_type);



            $citytext = array();
            $territory = explode(',',$data['territory']);
            $city ="select id,name from yzs_territory where id in(".$data['city'].") and forbidden='1' limit 3";/*城市*/
            $city_t = M()->query($city);
//            var_dump(M()->_sql());
//            var_dump($city_t);

            $conut = count($city_t);

            if($conut && $conut == 1){
                $region = M('territory')->where("higher_up='".$city_t[0]['id']."' and forbidden='1'")->select();/*区域*/
                $i = 1;
                foreach($region as $k=>$v){
                    if(!in_array($v['id'],$territory) && $citytext[$v['higher_up']]){
                        $citytext['state'] = false ;
                    }
                    if(!in_array($v['id'],$territory) && $i <= 2){
                        $citytext['i'][$i] = $v['name'];
                        $i++;
                    }
                }

                if($citytext['state']){
                    $ter = '全' . $city_t[0]['name'];
                }else{
                    $ter = $city_t[0]['name'] . '(除' . $citytext['i'][1] . '、' . $citytext['i'][2] . '等地以外)';
                }
            }else if($conut){
                $city_sty = "";
                foreach($city_t as $k=>$v){
                    if($k != 0){
                        $city_sty .= ",";
                    }
                    $city_sty .= "'".$v['id']."'";
                }


//                var_dump($city_sty);
                $region ="select id,name from yzs_territory where id in($city_sty)";/*区域*/

                $region_t = M()->query($region);

                $ter = "";
                $i = 1;
                foreach($region_t as $k=>$v){
                    if($i <= 3){
                        if($k != 0){
                            $ter .= "、";
                        }
                        $ter .=  $v['name'];
                    }
                    $i++;
                }
                $ter .= "等地均可做";

            }

            $this->ter = $ter;
//            var_dump($region_t);
            /*print_r($region_t);*/
           /* $city = explode(',',$data['city']);
            $territory = explode(',',$data['territory']);
            $citytext = array();
            foreach($city as $key=>$val){
                foreach($region_t as $k=>$v){
                    if($v['id'] == $val){
                        if()
                    }

            }
            }
                */

            $house ="select name as house from yzs_house_type where id in(".$data['house'].")";/*房产类型*/

            $best=M()->query($house);

            $arr = array();
            foreach($best as $k=>$v){
                $value = $v['house'];
                $arr[] = $value;
            }
            $array = implode("、",$arr);
            $best_null = rtrim($array);


            $obj=json_decode($data['apply_process']);/*申请流程*/

            $cost=json_decode($data['cost']);/*各项费用*/
            /*print_r($cost);*/


        }


        if($data['month'] != ''){
            $month = M('month')->where("id in(".$data['month'].")")->getField('month',true);
            $min_month = $month[0];
            $max_month = $month[0];
            if(count($month) > 1){
                foreach($month as $key=>$val){
                    foreach($month as $k=>$v){
                        $min_month = $min_month >= $v ? $v:$min_month;
                        $max_month = $max_month <= $v ? $v:$max_month;
                    }
                }
                if($min_month < 12){
                    $min_month_text = $min_month . "个月";
                }else{
                    $min_month_text = ($min_month / 12) . "年";
                }

                if($max_month < 12){
                    $max_month_text = $max_month . "个月";
                }else{
                    $max_month_text = ($max_month / 12) . "年";
                }
                $month_text = $min_month_text . " ~ " . $max_month_text;
            }else{
                if($month[0] < 12){
                    $month_text = $month[0] . "个月";
                }else{
                    $month_text = ($month[0] / 12) . "年";
                }
            }
//            var_dump($month);

        }
//        $month = explode(',',$data['month']);
//        $month = array(1,3,5,2,6,3,85,8,4);


//        var_dump($min_month,1);
//        var_dump($max_month,2);
        $str_len = strlen(trim($data['loan_pattern']));
        $this->is_auth = $_SESSION['wx_userinfo']['is_auth'];
        $this->data = $data;
        $this->str_len = $str_len;
        $this->count_type = $count_type;
        $this->impawn_type = $impawn_type;
        $this->month = $month_text;
        $this->obj = $obj;
        $this->cost = $cost;
//        $this->best = $best;
        $this->best = $best_null;

        $this->conut = $conut;
        $this->city_t = $city_t;


        $this->display();
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 申请页面
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/1
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function product_step(){



        if(!empty($_GET)){
//            echo "<div style='display: none;'>";
            $db = M('product');
            $data = $db->where('id='.$_GET['id'])->find();
//            var_dump($db->_sql());
            $data['month_arr'] = explode(',',$data['month']);

//            var_dump($_GET['id']);
//            var_dump($data);
//            echo "</div>";


            if($data['month'] != ''){
                $month = M('month')->where("id in(".$data['month'].")")->getField('month',true);
                $data['month_arr'] = $month;
            }


            $this->data = $data;
        }






        $this->display();
    }




    /**
     * +------------------------------------------------------------------------------
     * @desc            : 订单列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/25
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function my_order(){

        $wxid = $_SESSION['wx_userinfo']['id'];

//        $wxid = 14;
//        $list = M('wx_application')->where("uid='$wxid'")->select();

        $sql = "select a.*, p.`name` as productname, p.`img_url` as title_img from yzs_wx_application a left join yzs_product p on a.product=p.id where a.uid='$wxid' order by wx_time desc,wx_state,order_number desc";
        $list = M()->query($sql);
//        echo '<pre style="font-size: 26px">';
//        var_dump($list);

        $data = array();

        foreach($list as $k=>$v){
            $v['loanamount'] = $v['loanamount']/10000;
            $v['wx_time'] = date('Y-m-d H:i:s',$v['wx_time']);
            switch($v['wx_state']){
                case '3':
                    $v['start_time'] = date('Y-m-d H:i:s',$v['start_time']);
                    $data['3'][] = $v;
                    break;
                case '4':
                    $v['start_time'] = date('Y-m-d H:i:s',$v['start_time']);
                    $data['4'][] = $v;
                    break;
                case '5':
                    $v['start_time'] = date('Y-m-d H:i:s',$v['start_time']);
                    $data['5'][] = $v;
                    break;
                default:
                    $data['1'][] = $v;
                    break;
            }
        }





//        var_dump($data);


        $this->list = $data;

        $this->display();
    }



}


