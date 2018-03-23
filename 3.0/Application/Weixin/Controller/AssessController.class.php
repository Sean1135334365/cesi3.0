<?php
namespace Weixin\Controller;
use Common\Controller\WeixinController;
use Weixin\Model\AutographModel;

class AssessController extends WeixinController {

    public function house_assess(){

        $this->display();
    }

    public function filter(){
        if(!empty($_POST)){
            $city_name = 'shanghai';
            $filter = !empty($_POST['filter'])? urlencode($_POST['filter']): '';
            $params = array();
            $signa = new AutographModel();
            $list = $signa->signature($params);
            $time_stamp = $list['time_stamp'];
            $key_id = $list['key_id'];
            $data = $list['data'];


            $url1 = "http://api.baseinfo.yunfangdata.com/$city_name/$filter/ResidentialArea?time_stamp=$time_stamp&key_id=$key_id&access_signature=$data";

            $date = json_decode(file_get_contents($url1),true);

//            echo "<pre>";
//            print_r($date);
//            exit;

            if($date['Success']){
                $result['status']=0;
                $result['info']="操作成功";
                $result['Data']="操作成功";
                $this->ajaxreturn($result);
//                message(0,$date['Data']);
            }else{
                $result['status']=1;
                $result['info']="查询失败";
                $this->ajaxreturn($result);
//                message(1,'查询失败！');
            }
        }
    }
    public function check(){
        if(!empty($_POST)){
            $city_name = 'shanghai';
            $house_type = !empty($_POST['house_type'])? urlencode(trim($_POST['house_type'])): '';
            $area = !empty($_POST['area'])? urlencode(trim($_POST['area'])): '';
            $name = !empty($_POST['filter'])? urlencode(trim($_POST['filter'])): '';

//    toward:toward,floor:floor,totalfloor:totalfloor,builted_time:builted_time
//    数据处理
            $params = array();
            $choose = '';
            if(!empty($_POST['toward'])){
                $choose .= 'toward=' . urlencode(trim($_POST['toward']));
                $params['toward'] = trim($_POST['toward']);
            }
            if(!empty($_POST['floor'])){
                $choose .= '&floor=' . urlencode(trim($_POST['floor']));
                $params['floor'] = trim($_POST['floor']);
            }
            if(!empty($_POST['totalfloor'])){
                $choose .= '&totalfloor=' . urlencode(trim($_POST['totalfloor']));
                $params['totalfloor'] = trim($_POST['totalfloor']);
            }
            if(!empty($_POST['builted_time'])){
                $choose .= '&builted_time=' . urlencode(trim($_POST['builted_time']));
                $params['builted_time'] = trim($_POST['builted_time']);
            }
            if($choose != ''){
                $choose .= '&';
            }

//        include '../Public/uploading/wechat/images/weixin/RsaHelper.php';
            $signa = new AutographModel();
            $date = $signa->signature($params);
            $time_stamp = $date['time_stamp'];
            $key_id = $date['key_id'];
            $data = $date['data'];

            $url = "http://api.xunjia.yunfangdata.com/$city_name/$house_type/$area/$name/InquiryResults?$choose"."key_id=$key_id&access_signature=$data&time_stamp=$time_stamp";
            $list = json_decode(file_get_contents($url),true);
            $arr = array();
            if($list['Success']){
                $arr = array(
                    'name' => $_POST['name'],
                    'rent' => $list['Data']['rent'],
                    'price' => $list['Data']['price'],
                    'totalprice' => $list['Data']['totalprice']
                );
            }

            if($arr){
                $result['status']=0;
                $result['info']="操作成功";
                $result['Data']="操作成功";
                $this->ajaxreturn($result);
//        $date = json_encode($arr);
//                message(0,$arr);
            }else{
                $result['status']=1;
                $result['info']="查询失败";
                $this->ajaxreturn($result);
//                message(1,'查询失败！');
//                message(1,'查询失败！'.$list['Data'].'***'.$url .'****'.$choose.'//');
            }
        }
    }
}