<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/10/12
 * Time: 14:26
 */

namespace Admin\Controller;
use Common\Controller\VerifyController;

/**
 * +------------------------------------------------------------------------------
 * @desc            : 产品管理
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/10/12
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
class ProductController extends VerifyController {

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/12
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function product_list(){

        $name = $_GET['name'];
        $menu = $_POST['menu'];
        $menu = str_replace("'",'',$menu);
        $p_name = $_POST['name'];
        $p_name = str_replace("'",'',$p_name);
//        if(!empty($_GET['name'])){
//            $where = "menu like '%".$_POST['menu']."%'";
//        }else{
//            $where = "1";
//        }
        if(!empty($name)){
            $where = "menu like '%$menu%'";
        }else{
            $where = "1";
        }

        $db = M('product');
        $count = $db->count('id');

//        (select GROUP_CONCAT(name) from yzs_territory ter where id in(p.city)) as tername,
        $sql = "select p.*, (select `name` from yzs_product_type pt where id=p.type)as ptname,
                (select `name` from yzs_loans_type lt where id=p.loans_type) as ltname from yzs_product p where ";
//        if(!empty($_POST['name'])){
//            $sql .= "code like '%".$_POST['name']."%' or name like '%".$_POST['name']."%'";
//        }else{
//            $sql .= "1";
//        }
        if(!empty($p_name)){
            $sql .= "code like '%$p_name%' or name like '%$p_name%'";
        }else{
            $sql .= "1";
        }
        if(!empty($_GET['page'])){
            $page = intval($_GET['page']);
        }else{
            $page = 1;
        }

        $limit = ceil($count / 20);
        $limit_min = ($page - 1) * 20;


        $sql .= " limit $limit_min,20";

//        var_dump($sql);
        $Model = new \Think\Model();
        $list = $Model->query($sql);
//        var_dump($Model->_sql());

        foreach($list as $key=>$val){
            if(!empty($val['city']) && $val['city'] != ''){
                $city = $Model->query("select GROUP_CONCAT(name) as city from yzs_territory ter where id in(".$val['city'].")");
                $list[$key]['city'] = $city[0]['city'];
            }
        }

//        $list = $db->where($where)->order('state desc, id')->limit("$limit_min,20")->select();


//        var_dump($list);

        $page_number = array(
            'page'=>$page,
            'count'=>$limit,
        );
        $this->data = $list;
        $this->page_number = $page_number;

        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品删除
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2018/3/19
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
    **/
    public function delete(){
        if(!empty($_POST)){
            $db = M('product');
            $id = $_POST['id'];
            $res = $db->where("id=$id")->delete();
            /*$sql = $db->_sql();*/
            if($res){
                $arr['info'] = '删除成功';
                $arr['code'] = '1';
                $arr['status'] = 1;
            }else{
                $arr['info'] = '删除失败';
                $arr['code'] = '10001';
                $arr['status'] = 0;
            }
            echo json_encode($arr);
            exit;
        }
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品是否禁用
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/30
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function deleting(){
        if(!empty($_POST)){
            $db = M('product');
            $id = $_POST['id'];
            $data['state'] = $_POST['state'];
            $res = $db->where("id=$id")->save($data);
            /*$sql = $db->_sql();*/
            if($res){
                $arr['info'] = '修改成功';
                $arr['code'] = '1';
                $arr['data'] = $_POST['state'];
                /*$arr['data'] = $sql;*/
                $arr['status'] = 1;
                $this->ajaxReturn($arr);
            }else{
                $arr['info'] = '修改失败';
                $arr['code'] = '10001';
                /*$arr['data'] = $sql;*/
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品编辑页面
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/12
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function product_redact(){
        /*echo "<pre>";
        $str = 'qwe112..32sdda1230.15.12.111.11.3.11';
        $pattern = '/\d+\.?\d+/';
        if(preg_match_all($pattern, $str, $match)){
            print_r($match);
        }else{
            echo '没有找到！';
        }
        exit;*/
//        获取基础配置数据
//        echo "<pre>";
//        print_r($_SESSION['wxuser']['state']);//微信用户是否授权
//        exit;
        $city = M('territory')->where("forbidden='1'")->order('higher_up')->select();
        $month = M('month')->order('month+0')->select();
//        var_dump($territory);
        $loans_type = M('loans_type')->select();

        $house = M('house_type')->select();

        $type = M('product_type')->select();

        $r_p = M('repayment_pattern')->select();

        if(!empty($_GET['id'])){

            $data = M('product')->where('id='.$_GET['id'])->find();
            /*echo "<pre>";
            print_r($data);
            exit;*/
//            var_dump($data);
//            解析相关id数据
            $data['city'] = explode(',',$data['city']);
            $data['territory'] = explode(',',$data['territory']);
            $data['type'] = explode(',',$data['type']);
            $data['house'] = explode(',',$data['house']);
            $data['loans_type'] = explode(',',$data['loans_type']);
            $data['impawn_type'] = explode(',',$data['impawn_type']);
            $data['month'] = explode(',',$data['month']);
            $data['repayment_pattern'] = explode(',',$data['repayment_pattern']);
            $data['cost'] = json_decode($data['cost'],true);
            $data['apply_process'] = json_decode($data['apply_process'],true);

            foreach($city as $k=>$v){//给已选择的地区及区域加入状态
                if(in_array($v['id'],$data['city'])){
                    $city[$k]['state'] = '1';
                }
                if(in_array($v['id'],$data['territory'])){
                    $city[$k]['state'] = '1';
                }
            }
            foreach($loans_type as $k=>$v){//给已选择的贷款类型加人状态
                if(in_array($v['id'],$data['loans_type'])){
                    $loans_type[$k]['state'] = '1';
                }
            }
            foreach($house as $k=>$v){//给已选择的房屋类型加人状态
                if(in_array($v['id'],$data['house'])){
                    $house[$k]['state'] = '1';
                }
            }
            foreach($type as $k=>$v){//给已选择的产品类型加入状态
                if(in_array($v['id'],$data['type'])){
                    $type[$k]['state'] = '1';
                }
            }
            foreach($r_p as $k=>$v){//给已选择的产品类型加入状态
                if(in_array($v['id'],$data['repayment_pattern'])){
                    $r_p[$k]['state'] = '1';
                }
            }
//var_dump($r_p);
//            $month_p = $data['month'];

            $this->product = $data;
//            $this->month_p = $month_p;
            /*echo "<pre>";
            print_r($data);
            exit;*/



            $this->url = U('Product/product_update',array('id'=>$_GET['id']));

        }else{

            $this->url = U('Product/product_add');

        }

        foreach($city as $key=>$val){
            if($val['higher_up'] == '0'){
                $cy[$key] = $val;
                foreach ($city as $k=>$v){
                    if($v['higher_up'] == $val['id']){
                        $cy[$key]['down'][] = $v;
                    }
                }
            }
        }



        $this->city = $cy;
        $this->month = $month;
        $this->loans_type = $loans_type;
        $this->house = $house;
        $this->type = $type;
        $this->r_p = $r_p;
        /*echo "<pre style='display:none;'>";
        print_r($month);
        echo "</pre>";*/

        $this->display();

    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 异步加载区域信息
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/13
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function territory(){
        if(!empty($_POST['id'])){
            $id = $_POST['id'];
            $grade = M('territory')->where("id = $id")->find();
            if($grade['grade'] =='1'){
                $city = M('territory')->where("higher_up = $id and forbidden = 1")->select();
            }elseif($grade['grade'] =='2'){
                $city = M('territory')->where("id = $id")->select();
            }
//            $city = M('territory')->where("higher_up=".$_POST['id'])->select();


            if($city){
                $arr['info'] = '获取成功';
                $arr['code'] = '4';
                $arr['result'] = $city;
                $arr['grade'] = $grade['grade'];
                $arr['status'] = 1;
                $this->ajaxReturn($arr);
            }else{
                $arr['info'] = '区域加载失败！';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }else{
            $arr['info'] = '参数错误！';
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 新增产品
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/12
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function product_add(){
        if(!empty($_POST) ){
            if(!empty($_POST['showcasing'])){
                $str = $_POST['showcasing'];
                $pattern = '/[0-9]+\.{0,1}[0-9]+|[0-9]+/';
                preg_match_all($pattern, $str, $match);
                foreach($match as $key[0]=>$value){
//                    print_r($match);
                    if(!empty($value[1])){
                        $data['min_interest'] = $value[0];
                        $data['max_interest'] = $value[1];
                        $data['interest'] = '';
                    }else{
                        $data['interest'] = $value[0];
                        $data['min_interest'] = '';
                        $data['max_interest'] = '';
                    }
                    /*print_r($match);
                    print_r($value);*/
                }
            }

            if(!empty($_POST['admin_showcasing'])){
                $str1 = $_POST['admin_showcasing'];
//                $pattern1 = '/[\d]+\.?\d?/';
                $pattern1 = '/[0-9]+\.{0,1}[0-9]+|[0-9]+/';
                preg_match_all($pattern1, $str1, $match1);
                foreach($match1 as $k[0]=>$v){
                    if(!empty($v[1])){
                        $data['admin_min_interest'] = $v[0];
                        $data['admin_max_interest'] = $v[1];
                        $data['admin_interest'] = '';
                    }else{
                        $data['admin_interest'] = $v[0];
                        $data['admin_min_interest'] = '';
                        $data['admin_max_interest'] = '';
                    }
                }
            }

            if(!empty($_POST['month'])){
                $_POST;
            }else{
                $_POST['month'] = array('47','30','31','4'); //测试
//                $_POST['month'] = array('1','13','3','15'); //正式
            }
            $data = $_POST;

//            $data['type'] = implode(',',$_POST['type']);
            $data['city'] = !empty($_POST['city']) ? implode(',',$_POST['city']): $this->error('参数错误');
            $data['territory'] = !empty($_POST['city']) ? implode(',',$_POST['territory']): $this->error('参数错误');
            $data['house'] = !empty($_POST['city']) ? implode(',',$_POST['house']): $this->error('参数错误');
            $data['loans_type'] = !empty($_POST['city']) ? implode(',',$_POST['loans_type']): $this->error('参数错误');
            $data['city'] = !empty($_POST['city']) ? implode(',',$_POST['city']): $this->error('参数错误');
            $data['territory'] = !empty($_POST['city']) ? implode(',',$_POST['territory']): $this->error('参数错误');
            $data['month'] = !empty($_POST['city']) ? implode(',',$_POST['month']): $this->error('参数错误');
            $data['impawn_type'] = !empty($_POST['city']) ? implode(',',$_POST['impawn_type']): $this->error('参数错误');
            $data['repayment_pattern'] = !empty($_POST['city']) ? implode(',',$_POST['repayment_pattern']): $this->error('参数错误');
            $data['cost'] = !empty($_POST['city']) ? json_encode($_POST['cost']): $this->error('参数错误');
            $data['apply_process'] = !empty($_POST['city']) ? json_encode($_POST['apply_process']): $this->error('参数错误');

            //生成编号
            $data['code'] = 'P'.$_SESSION['yzs_userinfo']['id'].'S'.date('YmdHis',time()).rand(100,999);

            $data['add_time'] = time();
            $data['state'] = '1';


            //更新数据
            $resul = M('product')->add($data);

            if($resul){
                $this->success('修改成功',U('Product/product_list'),3);
            }else{
                $this->error('修改失败');
            }
        }else{

            $this->error('参数错误');
        }



//        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品修改
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/12
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function product_update(){
//        header('Content-type: text/html; charset=utf8');
        if(!empty($_POST)){
//            echo '<pre>';
            if(!empty($_POST['showcasing'])){
                $str = $_POST['showcasing'];
                $pattern = '/[0-9]+\.{0,1}[0-9]+|[0-9]+/';
                preg_match_all($pattern, $str, $match);
                foreach($match as $key[0]=>$value){
//                    print_r($match);
                    if(!empty($value[1])){
                        $data['min_interest'] = $value[0];
                        $data['max_interest'] = $value[1];
                        $data['interest'] = '';
                    }else{
                        $data['interest'] = $value[0];
                        $data['min_interest'] = '';
                        $data['max_interest'] = '';
                    }
                    /*print_r($match);
                    print_r($value);*/
                }
            }

            if(!empty($_POST['admin_showcasing'])){
                $str1 = $_POST['admin_showcasing'];
//                $pattern1 = '/[\d]+\.?\d?/';
                $pattern1 = '/[0-9]+\.{0,1}[0-9]+|[0-9]+/';
                preg_match_all($pattern1, $str1, $match1);
                foreach($match1 as $k[0]=>$v){
                    if(!empty($v[1])){
                        $data['admin_min_interest'] = $v[0];
                        $data['admin_max_interest'] = $v[1];
                        $data['admin_interest'] = '';
                    }else{
                        $data['admin_interest'] = $v[0];
                        $data['admin_min_interest'] = '';
                        $data['admin_max_interest'] = '';
                    }
                }
            }


            $data = $_POST;





            /*exit;*/
//            $data['type'] = implode(',',$_POST['type']);
            $data['city'] = implode(',',$_POST['city']);
            $data['territory'] = implode(',',$_POST['territory']);
            $data['house'] = implode(',',$_POST['house']);
            $data['loans_type'] = implode(',',$_POST['loans_type']);
            $data['city'] = implode(',',$_POST['city']);
            $data['territory'] = implode(',',$_POST['territory']);
            $data['month'] = implode(',',$_POST['month']);
            $data['impawn_type'] = implode(',',$_POST['impawn_type']);
            $data['repayment_pattern'] = implode(',',$_POST['repayment_pattern']);
            $data['cost'] = json_encode($_POST['cost']);
            $data['apply_process'] = json_encode($_POST['apply_process']);


            //更新数据
            $resul = M('product')->where('id='.$_GET['id'])->save($data);
            if($resul){
                $this->success('修改成功',U('Product/product_list'),3);
            }else{
                $this->error('修改失败');
            }
        }else{

            $this->error('参数错误');
        }


//        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品参数列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/16
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function parameter_list(){


        //region 建筑类型
        $ht_db = M('house_type');
        $ht_count = $ht_db->count();
//        echo "<pre>";
//        print_r($ht_count);

        $ht_page = 1;
        $ht_limit = ceil($ht_count / 10);
        $ht_limit_min = ($ht_page - 1) * 10;
        $house_type = $ht_db->limit("$ht_limit_min, 10")->select();

        $ht_page_number = array(
            'page'=>$ht_page,
            'count'=>$ht_limit,
        );

        $this->ht_data = $house_type;
        $this->ht_page_number = $ht_page_number;



//        var_dump($ht_limit);
//        var_dump($house_type);

        //endregion

        //region 贷款类型
        $lt_db = M('loans_type');
        $lt_count = $lt_db->count();

        $lt_page = 1;
        $lt_limit = ceil($lt_count / 10);
        $lt_limit_min = ($lt_page - 1) * 10;
        $loans_type = $lt_db->limit("$lt_limit_min, 10")->select();

        $lt_page_number = array(
            'page'=>$lt_page,
            'count'=>$lt_limit,
        );

        $this->lt_data = $loans_type;
        $this->lt_page_number = $lt_page_number;



//        var_dump($lt_limit);
//        var_dump($loans_type);

        //endregion

        //region 还款方式
        $rp_db = M('repayment_pattern');
        $rp_count = $rp_db->count();

        $rp_page = 1;
        $rp_limit = ceil($rp_count / 10);
        $rp_limit_min = ($rp_page - 1) * 10;
        $repayment_pattern = $rp_db->limit("$rp_limit_min, 10")->select();

        $rp_page_number = array(
            'page'=>$rp_page,
            'count'=>$rp_limit,
        );

        $this->rp_data = $repayment_pattern;
        $this->rp_page_number = $rp_page_number;


        //region 贷款期限
        $mt_db = M('month');
        $mt_count = $mt_db->count();
//        echo "<pre>";
//        print_r($ht_count);

        $mt_page = 1;
        $mt_limit = ceil($mt_count / 10);
        $mt_limit_min = ($mt_page - 1) * 10;
        $mouse_type = $mt_db->order('CONVERT(month,SIGNED)')->limit("$mt_limit_min, 10")->select();

        $mt_page_number = array(
            'page'=>$mt_page,
            'count'=>$mt_limit,
        );

        $this->mt_data = $mouse_type;
        $this->mt_page_number = $mt_page_number;
//        var_dump($rp_limit);
//        var_dump($repayment_pattern);

        //endregion

        /*//region 地区列表
        $t_db = M('territory');
        $t_count = $t_db->count();

        $t_page = 1;
        $t_limit = ceil($t_count / 10);
        $t_limit_min = ($t_page - 1) * 10;

        $territory = $t_db->limit("$t_limit_min, 10")->select();

        $t_page_number = array(
            'page'=>$t_page,
            'count'=>$t_limit,
        );

        $this->t_data = $territory;
        $this->t_page_number = $t_page_number;*/

//        var_dump($t_db->_sql());
//        var_dump($ht_limit);
//        var_dump($house_type);

        //endregion


        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 参数设置分页
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/24
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/

    public function parameter_list_page(){
//        print_r($_POST);
        $type = $_POST['dj'];
        if($type == 1){
            $ht_db = M('house_type');
        }elseif($type == 2){
            $ht_db = M('loans_type');
        }elseif($type == 3){
            $ht_db = M('repayment_pattern');
        }elseif($type == 4){
            $ht_db = M('month');
        }
        $ht_count = $ht_db->count();


        $ht_page = !empty($_POST['page']) ? $_POST['page']: 1;
        $ht_limit = ceil($ht_count / 10);
        $ht_limit_min = ($ht_page - 1) * 10;
        if($type == 4){
            $house_type = $ht_db->order('CONVERT(month,SIGNED)')->limit("$ht_limit_min, 10")->select();
        }else{
            $house_type = $ht_db->limit("$ht_limit_min, 10")->select();
        }
        $ht_page_number = array(
            'page'=>$ht_page,
            'count'=>$ht_limit,
        );

        $this->type = $type;
        $this->ht_data = $house_type;
        $this->ht_page_number = $ht_page_number;
        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 删除配置
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/29
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function parameter_delete(){

        if(!empty($_POST)){
            $db = M($_POST['typ']);
            $result = $db->where("id='".$_POST['tid']."'")->delete();

            if($result){
                $arr['info'] = '删除成功';
                $arr['code'] = '1';
                $arr['status'] = 1;
                $this->ajaxReturn($arr);
            }else{
                $arr['info'] = '删除失败';
                $arr['code'] = '001';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }else{
            $arr['info'] = '删除失败';
            $arr['code'] = '002';
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }

    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品参数列表分页接口
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/26
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function parameter_page(){

        $p_name = $_POST['name'];
        $p_name = str_replace("'",'',$p_name);
        if(!empty($_POST)){
            $type = '';
            if(!empty($_POST['type'])){
                $type = $_POST['type'];
            }else{
                $arr['info'] = 'type值为空';
                $arr['code'] = '002';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
            $db = M($type);
            //获取总页数
            $count = '';
            if(!empty($_POST['cot'])){
                $count = intval($_POST['cot']);
            }else{
                $arr['info'] = 'cot值为空';
                $arr['code'] = '003';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
            //获取当前页数
            $page = '';
            if(array_key_exists('cot',$_POST)){
                $page = intval($_POST['cot']);
            }else{
                $arr['info'] = 'page值为空';
                $arr['code'] = '004';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
            $limit = ceil($count / 10);
            $limit_min = ($page - 1) * 10;
            //获取模糊查询条件
            $where = '1';
            if(!empty($p_name)){
                $where .= " and name like '%$p_name%'";
            }else{
                $arr['info'] = 'name值为空';
                $arr['code'] = '003';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }





            $list = $db->limit("$limit_min, 20")->select();

//            $page_number = array(
//                'page'=>$page,
//                'count'=>$limit,
//            );

            if($list){
                $arr['info'] = '查询成功';
                $arr['code'] = '000';
                $arr['list'] = $list;
//                $arr['page'] = $page_number;
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }else{
                $arr['info'] = '查询失败';
                $arr['code'] = '005';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }else{
            $arr['info'] = '参数错误';
            $arr['code'] = '001';
            $arr['result'] = array();
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }

    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品参数列表模糊查询接口
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/10/26
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function indistinct_check(){
        $p_name = $_POST['name'];
        $p_name = str_replace("'",'',$p_name);
        if(!empty($_POST)){
            $type = '';
            if(!empty($_POST['type'])){
                $type = $_POST['type'];
            }else{
                $arr['info'] = 'type值为空';
                $arr['code'] = '002';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
            $db = M($type);
            $where = '1';
            if(!empty($p_name)){
                $where .= " and name like '%$p_name%'";
            }else{
                $arr['info'] = 'name值为空';
                $arr['code'] = '003';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }





        }else{
            $arr['info'] = '参数错误';
            $arr['code'] = '001';
            $arr['result'] = array();
            $arr['status'] = 0;
            $this->ajaxReturn($arr);
        }





    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 参数列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/20
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function area_list(){
    //region 地区列表
    $t_db = M('territory');
    $province = $t_db->where('higher_up=0')->select();/*省市*/
//        $type = $t_db->where("id=1")->select();
////        $city = $t_db->where("higher_up=1")->select();/*城市*/
//        $t_count = $t_db->where('id=1')->count();
//        $t_page = !empty($_GET['page']) ? $_GET['page']: 1;
//        $t_limit = ceil($t_count / 10);
//        $t_limit_min = ($t_page - 1) * 10;
//
//        $territory = $t_db->where("higher_up=1")->limit("$t_limit_min, 10")->select();
//
//        $t_page_number = array(
//            'page'=>$t_page,
//            'count'=>$t_limit,
//        );

    $this->province = $province;
//        $this->type = $type;
////        $this->city = $city;
//        $this->t_data = $territory;
//        $this->t_page_number = $t_page_number;
    $this->display();

}

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 省市、地区分页
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/21
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function area_list_page(){
        if(!empty($_POST['id']) || !empty($_GET['id']))
            $t_db = M('territory');
            $id = !empty($_POST['id']) ? $_POST['id']: $_GET['id'];
            $type = $t_db->where("id=$id")->select();/*省市名称*/
//            $city_1 = $t_db->where("higher_up=$id")->select();/*城市*/
            $t_count = $t_db->where("higher_up=$id")->count();
            $t_page = !empty($_POST['page']) ? $_POST['page']: 1;
            $t_limit = ceil($t_count / 10);
            $t_limit_min = ($t_page - 1) * 10;
            $territory = $t_db->where("higher_up=$id")->limit("$t_limit_min, 10")->select();
//        echo '<pre>';
//        var_dump($territory);
//        $t_db->_sql();
            $t_page_number = array(
                'page'=>$t_page,
                'count'=>$t_limit,
            );
            $this->type = $type;
            $this->id = $id;
//            $this->city_1 = $t_count;
            $this->t_data = $territory;
            $this->t_page_number = $t_page_number;
//            $this->html = $this->display('area_list_page');
            if($_POST['dj'] == '1'){
                $this->display();
            }elseif($_POST['dj'] == '2'){
                $this->display('area_list_page2');
            }

    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 区域分页
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/21
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    /*public function area_list_page2(){
//        echo '<pre>';
//        var_dump($_POST);
//        var_dump($_GET);exit;


        if(!empty($_POST['id']) || !empty($_GET['id']))
        $t_db = M('territory');
        $id = !empty($_POST['id']) ? $_POST['id']: $_GET['id'];
        $type = $t_db->where("id=$id")->select();
//        $city_2 = $t_db->where("higher_up=$id and grade='3'")->select();//区域

        $t_count = $t_db->where("higher_up=$id")->count();

        $t_page = !empty($_POST['page']) ? $_POST['page']: 1;
        $t_limit = ceil($t_count / 10);
        $t_limit_min = ($t_page - 1) * 10;

        $territory = $t_db->where("higher_up=$id")->limit("$t_limit_min, 10")->select();

        $t_page_number = array(
            'page'=>$t_page,
            'count'=>$t_limit,
        );
        $this->type = $type;
        $this->id = $id;
//        $this->city_2 = $city_2;
        $this->t_data = $territory;
        $this->t_page_number = $t_page_number;
        $this->display();


    }*/

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 是否禁用
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/21
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function boot_up(){
    if(IS_POST){
        $id = $_POST['id'];
        $t_db = M('territory');
        $mem_alive = $t_db ->where("id=$id")->find();
        $forbidden = $t_db->where("id=".$mem_alive['higher_up'])->getField('forbidden');
        if($forbidden == 1){
            if($mem_alive['forbidden'] == 1){
                $res = $t_db->where("id=$id")->setField('forbidden','0'); /*setField ->更新某个字段的值 、save用来更新多条*/
                $yzs_alive = $t_db ->where("id=$id")->getField('forbidden');
            }else{
                $res = $t_db->where("id=$id")->setField('forbidden','1');
                $yzs_alive = $t_db ->where("id=$id")->getField('forbidden');
            }
        }else{
            $res = $t_db->where("id=$id")->setField('forbidden','0');
            $yzs_alive = $t_db ->where("id=$id")->getField('forbidden');
        }
//        echo "<pre>";
//        print_r($mem_alive['forbidden']);
//        print_r($mem_alive['higher_up']);
//        exit;
//        if($mem_alive['forbidden'] == 1){
//            $res = $t_db->where("id=$id")->setField('forbidden','0'); /*setField ->更新某个字段的值 、save用来更新多条*/
//            $yzs_alive = $t_db ->where("id=$id")->getField('forbidden');
//        }else{
//            $res = $t_db->where("id=$id")->setField('forbidden','1');
//            $yzs_alive = $t_db ->where("id=$id")->getField('forbidden');
//        }
        if($res){
            $result['status']=1;
            $result['info']='操作成功';
            $result['forbidden']=$yzs_alive;
            $this->ajaxreturn($result);
            exit;
        }else{
            $result['status']=0;
            $result['info']='操作有误';
            $this->ajaxreturn($result);
            exit;
        }
    }
}

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 全部禁止
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/21
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function all_boot_up(){
        if(IS_POST){
            $id = $_POST['id'];
            $t_db = M('territory');
            $mem_alive = $t_db ->where("id=$id")->getField('forbidden'); /*得到forbidden的值*/
            if($mem_alive == 1){
                $res = $t_db -> where("higher_up=$id || id=$id")->setField('forbidden','0');/*setField ->更新某个字段的值 、save用来更新多条*/
                $yzs_alive = $t_db ->where("id=$id")->getField('forbidden');
            }else{
                $res = $t_db->where("id=$id")->setField('forbidden','1');
                $yzs_alive = $t_db ->where("id=$id")->getField('forbidden');
            }
            if($res){
                $result['status']=1;
                $result['info']='操作成功';
                $result['forbidden']=$yzs_alive;
                $this->ajaxreturn($result);
                exit;
            }else{
                $result['status']=0;
                $result['info']='操作有误';
                $this->ajaxreturn($result);
                exit;
            }
        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 添加区域
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/21
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    /*public function area_add(){
//        $id = $_GET['id'];
//        $page = $_GET['page'];
//        $dj = $_GET['dj'];
        $this->id = $_GET['id'];
        $this->page = $_GET['page'];
        $this->dj = $_GET['dj'];
        $this->display();
    }*/

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 添加区域ajax
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/21
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
/*    public function area_ajax(){
        if (IS_POST) {
            if ($_POST['name'] != '') {
                $array['name'] = $_POST['name'];
                $array['grade'] = '3';
                $array['higher_up'] = $_POST['id'];
                $array['forbidden'] = '1';
            }
            $User = M("territory");
            if (!empty($array)) {
                $insert_id=$User->add($array);
            }
            if ($insert_id) {
                $res = [
                    'status' => 1,
                    'msg' => '添加成功！',
                    'name' => $array['name']
                ];
            } else {
                $res = [
                    'status' => 0,
                    'msg' => '添加失败！'
                ];
            }
            echo json_encode($res);
            exit;
        }
    }*/

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 区域编辑页面
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/21
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    /*public function area_uplode(){
        if (IS_POST) {
            $id = $_POST['id'];
            $User = M("territory");
            $data = $User->where("id=$id")->find();
            session('territory', $data[$_POST['id']]);

            if ($_POST['name'] != $_SESSION['territory']['name']) {
                $array['name'] = $_POST['name'];
            }
            if (!empty($array)) {
                $uplode = $User->where("id=$id")->save($array);
            }
            if ($uplode) {
                $res = [
                    'status' => 1,
                    'msg' => '修改成功！'
                ];
                $this->name=$_POST['name'];
            } else {
                $res = [
                    'status' => 0,
                    'msg' => '修改失败！'
                ];
            }
            echo json_encode($res);
            exit;
        }
    }*/

    /**
     * +------------------------------------------------------------------------------
     * @desc            : Ajax页面
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/20
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function wechat_update(){
//        print_r($_GET);
//        print_r($_POST);

        $type = $_GET['type'];
        $this->type = $type;
        $this->page = $_GET['page'];
        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 添加
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/20
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function add(){
//        echo json_encode($_POST);
//        /*var_dump($_POST);*/exit;
        $type = $_POST['type'];

        switch ($type){
            case 1:
                if (IS_POST) {
                    if ($_POST['name'] != '') {
                        $array['name'] = $_POST['name'];
                    }
                    $User = M("house_type");
                    if (!empty($array)) {
                        $insert_id=$User->add($array);
                    }
                    if ($insert_id) {
                        $res = [
                            'status' => 1,
                            'msg' => '添加成功！'
                        ];
                    } else {
                        $res = [
                            'status' => 0,
                            'msg' => '添加失败！'
                        ];
                    }
                    echo json_encode($res);
                    exit;
                }
                break;
            case 2:
                if (IS_POST) {
                    if ($_POST['name'] != '') {
                        $array['name'] = $_POST['name'];
                    }
                    $User = M("loans_type");
                    if (!empty($array)) {
                        $insert_id=$User->add($array);
                    }
                    if ($insert_id) {
                        $res = [
                            'status' => 1,
                            'msg' => '添加成功！'
                        ];
                    } else {
                        $res = [
                            'status' => 0,
                            'msg' => '添加失败！'
                        ];
                    }
                    echo json_encode($res);
                    exit;
                }
                break;
            case 3:
                if (IS_POST) {
                    if ($_POST['name'] != '') {
                        $array['name'] = $_POST['name'];
                    }
                    $User = M("repayment_pattern");
                    if (!empty($array)) {
                        $insert_id=$User->add($array);
                    }
                    if ($insert_id) {
                        $res = [
                            'status' => 1,
                            'msg' => '添加成功！'
                        ];
                    } else {
                        $res = [
                            'status' => 0,
                            'msg' => '添加失败！'
                        ];
                    }
                    echo json_encode($res);
                    exit;
                }
                break;
            case 4:
                if (IS_POST) {
                    $User = M("month");
                    $name = $_POST['name'];
                    $data = $User->where("month=$name")->find();
                    if($data){
                        $res = [
                            'status' => 2,
                            'msg' => '该月份已有，请重新输入！'
                        ];
                        echo json_encode($res);
                        exit;
                    }else{
                        if ($_POST['name'] != '') {
                            $array['month'] = $_POST['name'];
                        }
                        if (!empty($array)) {
                            $insert_id=$User->add($array);
                        }
                        if ($insert_id) {
                            $res = [
                                'status' => 1,
                                'msg' => '添加成功！'
                            ];
                        } else {
                            $res = [
                                'status' => 0,
                                'msg' => '添加失败！'
                            ];
                        }
                        echo json_encode($res);
                        exit;
                    }
                }
                break;
            default:
                break;
        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 编辑
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/11/20
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function uplode(){
        $type = $_POST['type'];
        switch ($type){
            case 1:
                if (IS_POST) {
                    $id = $_POST['id'];
                    $User = M("house_type");
                    $data = $User->where("id=$id")->find();
                    session('house_type', $data[$_POST['id']]);

                    if ($_POST['name'] != $_SESSION['house_type']['name']) {
                        $array['name'] = $_POST['name'];
                    }
                    if (!empty($array)) {
                        $uplode = $User->where("id=$id")->save($array);
                    }
                    if ($uplode) {
                        $res = [
                            'status' => 1,
                            'msg' => '修改成功！'
                        ];
                    } else {
                        $res = [
                            'status' => 0,
                            'msg' => '修改失败！'
                        ];
                    }
                    echo json_encode($res);
                    exit;
                }
                break;
            case 2:
                if (IS_POST) {
                    $id = $_POST['id'];
                    $User = M("loans_type");
                    $data = $User->where("id=$id")->find();
                    session('loans_type', $data[$_POST['id']]);

                    if ($_POST['name'] != $_SESSION['loans_type']['name']) {
                        $array['name'] = $_POST['name'];
                    }
                    if (!empty($array)) {
                        $uplode = $User->where("id=$id")->save($array);
                    }
                    if ($uplode) {
                        $res = [
                            'status' => 1,
                            'msg' => '修改成功！'
                        ];
                    } else {
                        $res = [
                            'status' => 0,
                            'msg' => '修改失败！'
                        ];
                    }
                    echo json_encode($res);
                    exit;
                }
                break;
            case 3:
                if (IS_POST) {
                    $id = $_POST['id'];
                    $User = M("repayment_pattern");
                    $data = $User->where("id=$id")->find();
                    session('repayment_pattern', $data[$_POST['id']]);

                    if ($_POST['name'] != $_SESSION['repayment_pattern']['name']) {
                        $array['name'] = $_POST['name'];
                    }
                    if (!empty($array)) {
                        $uplode = $User->where("id=$id")->save($array);
                    }
                    if ($uplode) {
                        $res = [
                            'status' => 1,
                            'msg' => '修改成功！'
                        ];
                    } else {
                        $res = [
                            'status' => 0,
                            'msg' => '修改失败！'
                        ];
                    }
                    echo json_encode($res);
                    exit;
                }
                break;
            case 4:
                if (IS_POST) {
                        $yesr = trim($_POST['year']);
                        if($yesr === "年"){
                            $name = $_POST['name']*12;
                        }else{
                            $name = $_POST['name'];
                        }
                    $User = M("month");
//                    $name = $_POST['name'];
                    $data = $User->where("month=$name")->find();
                    if($data){
                        $res = [
                            'status' => 2,
                            'msg' => '该月份已有，请重新输入！'
                        ];
                        echo json_encode($res);
                        exit;
                    }else{
                        $id = $_POST['id'];
//                        $User = M("month");
                        $data = $User->where("id=$id")->find();
                        session('month', $data[$_POST['id']]);
//                    print_r($_SESSION);

                        if ($name != $_SESSION['month']['month']) {
                            $array['month'] = $name;
                        }
                        if (!empty($array)) {
                            $uplode = $User->where("id=$id")->save($array);
                        }
                        if ($uplode) {
                            $res = [
                                'status' => 1,
                                'msg' => '修改成功！'
                            ];
                        } else {
                            $res = [
                                'status' => 0,
                                'msg' => '修改失败！'
                            ];
                        }
                        echo json_encode($res);
                        exit;
                    }

                }
                break;
            default:
                break;
        }

    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 活动推荐
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/12/14
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function roasting(){
//        echo "<pre>";
//        $arr = [1,4,2,6];
//        $arr2  =array(
//            array()
//        );
//        foreach($arr as $k=>$v){
//            $arr2[$k]['p_id'] = $v;
//        }
//        $res = M('roasting')->addAll($arr2);
//        $id = '1';
//        $User = M("product");
//        $data = $User->where("id=$id")->find();
//        session('product', $data);
//print_r($_SESSION['product']);
//        $id = '6';
//        $User = M('product');
//        $activity = $User->where("id!=$id")->getField('id,name,img_roasting,img_url,banks');
//        print_r($activity);
//        exit;
        $g_name = $_GET['name'];
        $menu = $_POST['menu'];
        $menu = str_replace("'",'',$menu);
        $p_name = $_POST['name'];
        $p_name = str_replace("'",'',$p_name);
        if(!empty($g_name)){
            $where = "menu like '%$menu%'";
        }else{
            $where = "1";
        }

//        $db = M('roasting');
//        $count = $db->count('id');

//        (select GROUP_CONCAT(name) from yzs_territory ter where id in(p.city)) as tername,
        $sql = "select r.id,r.p_id,p.name,p.img_roasting,p.banks,p.img_url from yzs_roasting r, yzs_product p where p.id=r.p_id and ";/*
        $sql = "select p.*, (select `name` from yzs_product_type pt where id=p.type)as ptname,
                (select `name` from yzs_loans_type lt where id=p.loans_type) as ltname,(select `name` from yzs_roasting rt where p_id=p.id) from yzs_product p where ";*/
        if(!empty($p_name)){
            $sql .= "code like '%$p_name%' or name like '%$p_name%'";
        }else{
            $sql .= "1";
        }
//        if(!empty($_GET['page'])){
//            $page = intval($_GET['page']);
//        }else{
//            $page = 1;
//        }

//        $limit = ceil($count / 20);
//        $limit_min = ($page - 1) * 20;
//        $sql .= " limit $limit_min,20";

//        var_dump($sql);
        $Model = new \Think\Model();
        $list = $Model->query($sql);
//        var_dump($Model->_sql());

        foreach($list as $key=>$val){
            if(!empty($val['city']) && $val['city'] != ''){
                $city = $Model->query("select GROUP_CONCAT(name) as city from yzs_territory ter where id in(".$val['city'].")");
                $list[$key]['city'] = $city[0]['city'];
            }
        }

//        $list = $db->where($where)->order('state desc, id')->limit("$limit_min,20")->select();


//        var_dump($list);

//        $page_number = array(
//            'page'=>$page,
//            'count'=>$limit,
//        );
//        echo "<pre>";
//        $User = M('product');
//        $list1 = $User->order("img_roasting is not null and img_roasting!='' desc")->getField('id,name,img_roasting,img_url,banks');
//        print_r($list1);
        $list1 = M()->query("select * from yzs_product where state = '1' and id not in(select distinct(p_id) from yzs_roasting where p_id!='0') and img_roasting != ''");
//        $list1 = M()->query("select * from yzs_product where id not in(select distinct(p_id) from yzs_roasting where p_id!='0' ORDER BY img_roasting DESC)");
//        var_dump($list1);
        $this->data2 = $list1;
        $this->data = $list;
//        echo "<pre>";
//        print_r($list1);
//        $this->page_number = $page_number;

        $this->display();
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 活动推荐编辑页面
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/12/14
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function roasting_redact(){
        $city = M('territory')->where("forbidden='1'")->order('higher_up')->select();
//        var_dump($territory);
        $loans_type = M('loans_type')->select();

        $house = M('house_type')->select();

        $type = M('product_type')->select();

        $r_p = M('repayment_pattern')->select();

        if(!empty($_GET['id'])){

            $data = M('product')->where('id='.$_GET['id'])->find();
            /*echo "<pre>";
            print_r($data);
            exit;*/
//            var_dump($data);
//            解析相关id数据
            $data['city'] = explode(',',$data['city']);
            $data['territory'] = explode(',',$data['territory']);
            $data['type'] = explode(',',$data['type']);
            $data['house'] = explode(',',$data['house']);
            $data['loans_type'] = explode(',',$data['loans_type']);
            $data['impawn_type'] = explode(',',$data['impawn_type']);
            $data['month'] = explode(',',$data['month']);
            $data['repayment_pattern'] = explode(',',$data['repayment_pattern']);
            $data['cost'] = json_decode($data['cost'],true);
            $data['apply_process'] = json_decode($data['apply_process'],true);

            foreach($city as $k=>$v){//给已选择的地区及区域加入状态
                if(in_array($v['id'],$data['city'])){
                    $city[$k]['state'] = '1';
                }
                if(in_array($v['id'],$data['territory'])){
                    $city[$k]['state'] = '1';
                }
            }
            foreach($loans_type as $k=>$v){//给已选择的贷款类型加人状态
                if(in_array($v['id'],$data['loans_type'])){
                    $loans_type[$k]['state'] = '1';
                }
            }
            foreach($house as $k=>$v){//给已选择的房屋类型加人状态
                if(in_array($v['id'],$data['house'])){
                    $house[$k]['state'] = '1';
                }
            }
            foreach($type as $k=>$v){//给已选择的产品类型加入状态
                if(in_array($v['id'],$data['type'])){
                    $type[$k]['state'] = '1';
                }
            }
            foreach($r_p as $k=>$v){//给已选择的产品类型加入状态
                if(in_array($v['id'],$data['repayment_pattern'])){
                    $r_p[$k]['state'] = '1';
                }
            }
//var_dump($r_p);

            $this->product = $data;
            /*echo "<pre>";
            print_r($data);
            exit;*/



            $this->url = U('Product/product_update',array('id'=>$_GET['id']));

        }else{

            $this->url = U('Product/product_add');

        }

        foreach($city as $key=>$val){
            if($val['higher_up'] == '0'){
                $cy[$key] = $val;
                foreach ($city as $k=>$v){
                    if($v['higher_up'] == $val['id']){
                        $cy[$key]['down'][] = $v;
                    }
                }
            }
        }

//        echo '<pre>';
//        var_dump($type);

        $this->city = $cy;
        $this->loans_type = $loans_type;
        $this->house = $house;
        $this->type = $type;
        $this->r_p = $r_p;

        $this->display();

    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 活动推荐删除
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/12/14
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function roasting_deleting(){
        if(!empty($_POST)){
            $db = M('roasting');
            $id = $_POST['id'];
//            $data['state'] = $_POST['state'];
            $res = $db->where("id=$id")->delete();
//            $res = $db->where("id=$id")->save($data);
            /*$sql = $db->_sql();*/
            if($res){
                $arr['info'] = '删除成功';
                $arr['code'] = '1';
//                $arr['data'] = $_POST['state'];
                /*$arr['data'] = $sql;*/
                $arr['status'] = 1;
                $this->ajaxReturn($arr);
            }else{
                $arr['info'] = '删除失败';
                $arr['code'] = '10001';
                /*$arr['data'] = $sql;*/
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 选择是否为活动产品
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/12/14
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function activity(){
//        echo '11111';
//        var_dump($_POST);
//        var_dump(11111);
        if(!empty($_POST)){
            $db = M('roasting');
            $count = $db->count('id');
            $arr2  =array();
            $data = $_POST['data'];
            $leng = count($data);
            $chang = $count+$leng;
//            var_dump($count);
//            var_dump($leng);
//            var_dump($chang);
            if($count >= '5' || $chang > 5){
                $arr['info'] = '修改失败';
                $arr['code'] = '10001';
                $arr['status'] = 2;
                $this->ajaxReturn($arr);
            }else{
                foreach($data as $k=>$v){
                    $arr2[]['p_id'] = $v;
                }

                $res = M('roasting')->addAll($arr2);
                if($res){
                    $arr['info'] = '修改成功';
                    $arr['code'] = '1';
                    $arr['status'] = 1;
                    $this->ajaxReturn($arr);
                }else{
                    $arr['info'] = '修改失败';
                    $arr['code'] = '10001';
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }
                        /*echo "$leng";*/
                /*var_dump($data);
                var_dump($arr2);
                var_dump($_POST);*/

            }
        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 替换活动图片
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/12/15
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function present(){
        if(!empty($_POST)){
            $id = $_POST['data'];
            $User = M("product");
            $data = $User->where("id=$id")->find();
            session('product', $data[$_POST['id']]);

            if ($_POST['img_roasting'] != $_SESSION['product']['img_roasting']) {
                $array['img_roasting'] = $_POST['img_roasting'];
            }
            if (!empty($array)) {
                $res = $User->where("id=$id")->save($array);
            }
            if($res){
                $arr['info'] = '修改成功';
                $arr['code'] = '1';
                $arr['status'] = 1;
                $this->ajaxReturn($arr);
            }else{
                $arr['info'] = '修改失败';
                $arr['code'] = '10001';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 需要替换的产品图片
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/12/15
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function img_url(){
        if(!empty($_POST)){
            $id = $_POST['data'];
            $User = M('product');
            $activity = $User->where("id=$id")->find();
//            print_r($activity);
            if($activity){
//                $arr['info'] = '修改成功';
                $arr['code'] = $activity['img_roasting'];
                $arr['status'] = 1;
                $this->ajaxReturn($arr);
            }else{
//                $arr['info'] = '修改失败';
                $arr['code'] = '10001';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 替换活动产品
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/12/15
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function present_del(){
        if(!empty($_POST)){
            $db = M('roasting');
            $p_id_1 = $_POST['p_id'];
            $id = $_POST['data'];
//            $data['state'] = $_POST['state'];
            $ar = $db->where("p_id=$p_id_1")->find();
            if($ar){
                $arr['info'] = '修改失败';
                $arr['code'] = '10001';
                $arr['status'] = 2;
                $this->ajaxReturn($arr);
            }else{
                $res = $db->where("id=$id")->delete();
                if($res){
                    $p_id['p_id'] = $_POST['p_id'];
                    $res2 = M('roasting')->add($p_id);
                    if($res2){
                        $arr['info'] = '修改成功';
                        $arr['code'] = '1';
                        $arr['status'] = 1;
                        $this->ajaxReturn($arr);
                    }else{
                        $arr['info'] = '修改失败';
                        $arr['code'] = '10001';
                        $arr['status'] = 0;
                        $this->ajaxReturn($arr);
                    }
                }else{
                    $arr['info'] = '替换失败';
                    $arr['code'] = '10001';
                    $arr['status'] = 0;
                    $this->ajaxReturn($arr);
                }
            }

        }
    }

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 单选择替换产品列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2017/12/15
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function present_activity(){
        if(!empty($_POST)){
            $id = $_POST['data'];
            $User = M('product');
            /*$activity = $User->where("id!=$id")->order("img_roasting is not null and img_roasting!='' desc")->getField('id,name,img_roasting,img_url,banks');*/
            $activity = M()->query("select * from yzs_product where state ='1' and img_roasting != '' and id not in(select distinct(p_id) from yzs_roasting where p_id!='0') ORDER BY img_roasting DESC");
//            print_r($activity);
            if($activity){
//                $arr['info'] = '修改成功';
                $arr['code'] = $activity;
                $arr['status'] = 1;
                $this->ajaxReturn($arr);
            }else{
//                $arr['info'] = '修改失败';
                $arr['code'] = '10001';
                $arr['status'] = 0;
                $this->ajaxReturn($arr);
            }
        }
    }



    /**
     * +------------------------------------------------------------------------------
     * @desc            : 产品推广介绍列表
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/12/25
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function introduce(){


        $where = "state=1";
        if(!empty($_POST['name'])){
            $name = $_POST['name'];
            $where .= " and name like '%$name%'";
        }


        $db = M('product');
        $count = $db->where($where)->count('id');


        if(!empty($_GET['page'])){
            $page = intval($_GET['page']);
        }else{
            $page = 1;
        }

        $limit = ceil($count / 20);
        $limit_min = ($page - 1) * 20;

        $list = $db->where($where)->order('state desc, add_time desc')->limit("$limit_min,20")->select();


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
     * @desc            : 产品推广介绍编辑
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/12/25
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function introduce_up(){

        if(!empty($_POST)){

            if(!empty($_POST['id'])){
                $id = $_POST['id'];
                $where = "id=$id";
            }else{
                $this->error('参数错误');
            }

            $arr = array();
            if($_POST['source_logurl']){
                $arr['source_logurl'] = $_POST['source_logurl'];
            }
            if($_POST['introduce_img']){
                $arr['introduce_img'] = $_POST['introduce_img'];
            }


            $result = M('product')->where($where)->save($arr);






        }

        if(!empty($_GET['id'])){
            $p_id = $_GET['id'];
            $data = M('product')->where("id=$p_id")->find();




            $this->data = $data;
        }


        $this->display();



    }

























}