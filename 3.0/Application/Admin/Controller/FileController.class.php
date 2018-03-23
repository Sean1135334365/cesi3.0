<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/7/4
 * Time: 11:45
 */

namespace Admin\Controller;
use Common\Controller\VerifyController;
/**
 * +------------------------------------------------------------------------------
 * @desc            : 文件处理
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/7/4
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/


class FileController extends VerifyController {
    /**
     * +------------------------------------------------------------------------------
     * @desc            : 上传图片处理
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/7/4
     * @param           : url $paper_file 上传图片存放目录文件夹
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function img_file(){

        $url = './Public/uploading/images/';
        $img_url = '/uploading/images/';
        $upfile = $_FILES["file"];
        if(!empty($_GET['type'])){
            $savePath = $_GET['type'];
        }else{
            $savePath = date('Y-m-d',time());
        }



        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     $url; // 设置附件上传根目录
        $upload->autoSub   =     true;
        $upload->subName   =     $savePath;
//        $upload->savePath  =     $savePath; // 设置附件上传根目录
        $upload->saveName  = 'YZS' . date('YmdHis',time()) . '_' . rand(1000,9999);

//        var_dump($_FILES);exit;



        // 上传单个文件
        $info   =   $upload->uploadOne($upfile);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
//            echo $url . $info['savepath'].$info['savename'];

            $name = $upfile['name'];
            $size = $upfile['size'];


            $array = array(
                'filesize' => $size,
                'orgfilename' => $name,
            );

            $src = $img_url . $info['savepath'].$info['savename'];
//            $return_src = $url . $info['savepath'].$info['savename'];

//            echo json_encode(array('src' => $src, 'size' => $size, 'error' => 0 , 'data' => $array));




            $arr['info'] = '获取成功';
            $arr['code'] = '4';
            $arr['result'] = array('src' => $src, 'size' => $size, 'error' => 0 , 'data' => $array);
            $arr['status'] = 1;
            $this->ajaxReturn($arr);



        }


    }

    public function img_file2(){

        /*$url = './Public/uploading/images/';
        $img_url = '/uploading/images/';*/
        $url = './Public/uploading/wechat/images/';
        $img_url = '/uploading/wechat/images/';
        $upfile = $_FILES["upfile"];
        if(!empty($_GET['type'])){
            $savePath = $_GET['type'];
        }else{
            $savePath = date('Y-m-d',time());
        }



        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     $url; // 设置附件上传根目录
        $upload->autoSub   =     true;
        $upload->subName   =     $savePath;
//        $upload->savePath  =     $savePath; // 设置附件上传根目录
        $upload->saveName  = 'YZS' . date('YmdHis',time()) . '_' . rand(1000,9999);

//        var_dump($_FILES);exit;



        // 上传单个文件
        $info   =   $upload->uploadOne($upfile);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
//            echo $url . $info['savepath'].$info['savename'];

            $name = $upfile['name'];
            $size = $upfile['size'];


            $array = array(
                'filesize' => $size,
                'orgfilename' => $name,
            );

            $src = $img_url . $info['savepath'].$info['savename'];
//            $return_src = $url . $info['savepath'].$info['savename'];

            echo json_encode(array('src' => $src, 'size' => $size, 'error' => 0 , 'data' => $array));




//            $arr['info'] = '获取成功';
//            $arr['code'] = '4';
//            $arr['result'] = array('src' => $src, 'size' => $size, 'error' => 0 , 'data' => $array);
//            $arr['status'] = 1;
//            $this->ajaxReturn($arr);



        }


    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 下载文件
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/7/11
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function file_zip(){

        //需要下载文件时操作
        $oid = I('id');
        if(!empty($oid)){
//        echo 111;
//            include_once './app/route/zip.php';
            $order_name = M('indentinfo')->where('id=' . $oid)->getField('id,name,amount');
//            $order_name = M('indentinfo')->where('id=1')->getField('id,name,amount');//测试代码
            $order_material = M('materialinfo')->where('i_id=' . $oid)->getField('photograph');
//            $order_material = M('materialinfo')->where('i_id=1')->getField('photograph');//测试代码

            $photograph = json_decode($order_material,true);

//
            echo '<pre>';
//
//            var_dump($order_material);
//            var_dump($photograph);


//            exit;


            $file_url = './Public/Admin/copy';
            $file_url_1 = $file_url.'/1.身份证';
            $file_url_2 = $file_url."/2.户口本";
            $file_url_3 = $file_url."/3.结婚证";
            $file_url_4 = $file_url."/4.征信报告";
            $file_url_5 = $file_url."/5.产证、产调、评论单";
            $file_url_6 = $file_url."/6.银行流水";
            $file_url_7 = $file_url."/7.备用房、产证、产调";
            $file_url_8 = $file_url."/8.看房照片";
            $file_url_9 = $file_url."/9.公司材料";
            $file_url_10 = $file_url."/10.法院网风险信息";
            $file_url_11 = $file_url."/11.借款申请表";
//            $file_url_12 = $file_url."/12.审核表";
            $file_url_12 = $file_url."/12.其他";

            if(file_exists($file_url)){
                //删除文件夹
                $this->delDirAndFile($file_url);

            }
//        创建目录
            $dump =array();

            //linux系统执行代码
//            $dump[] = mkdir($file_url,0777,true);
//            $dump[] = mkdir($file_url_1,0777,true);
//            $dump[] = mkdir($file_url_2,0777,true);
//            $dump[] = mkdir($file_url_3,0777,true);
//            $dump[] = mkdir($file_url_4,0777,true);
//            $dump[] = mkdir($file_url_5,0777,true);
//            $dump[] = mkdir($file_url_6,0777,true);
//            $dump[] = mkdir($file_url_7,0777,true);
//            $dump[] = mkdir($file_url_8,0777,true);
//            $dump[] = mkdir($file_url_9,0777,true);
//            $dump[] = mkdir($file_url_10,0777,true);
//            $dump[] = mkdir($file_url_11,0777,true);
//            $dump[] = mkdir($file_url_12,0777,true);
//            $dump[] = mkdir($file_url_12,0777,true);

        //Windows系统执行代码
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_1),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_2),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_3),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_4),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_5),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_6),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_7),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_8),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_9),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_10),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_11),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_12),0777,true);
//            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_13),0777,true);

//        var_dump($dump);

//        copy('',$file_url_1);

//            $copy = array();

            if(!empty($photograph['identity_card_frontal'])){
                $post_identity_num = 1;
                foreach($photograph['identity_card_frontal'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_1.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_1).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['household_register'])){
                $post_identity_num = 1;
                foreach($photograph['household_register'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_2.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_2).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['marriage_certificate'])){
                $post_identity_num = 1;
                foreach($photograph['marriage_certificate'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_3.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_3).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['credit_report'])){
                $post_identity_num = 1;
                foreach($photograph['credit_report'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_4.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_4).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['pledge_house'])){
                $post_identity_num = 1;
                foreach($photograph['pledge_house'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_5.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_5).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['bank'])){
                $post_identity_num = 1;
                foreach($photograph['bank'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_6.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_6).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['standby_house'])){
                $post_identity_num = 1;
                foreach($photograph['standby_house'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_7.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_7).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['see_house_img'])){
                $post_identity_num = 1;
                foreach($photograph['see_house_img'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_8.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_8).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['company'])){
                $post_identity_num = 1;
                foreach($photograph['company'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_9.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_9).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['court'])){
                $post_identity_num = 1;
                foreach($photograph['court'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_10.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_10).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['application_form'])){
                $post_identity_num = 1;
                foreach($photograph['application_form'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_11.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_11).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['check_table'])){
                $post_identity_num = 1;
                foreach($photograph['check_table'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['rests'])){
                $post_identity_num = 1;
                foreach($photograph['rests'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_12.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_12).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }


//            var_dump($copy);
//
//            var_dump($order_material);
//            var_dump($photograph);
//            exit;

            $zip= new \ZipArchive();

//                var_dump($order_name);
//            $name = iconv('utf-8','GBK',$order_name[$oid]['name'] . '_' . ($order_name[$oid]['amount']/10000) . '万元');//linux系统执行代码
            $name = $order_name[$oid]['name'] . '_' . ($order_name[$oid]['amount']/10000) . '万元';//Windows系统执行代码
            $file_zip_url = './Public/Admin/zip/'.$name.'.zip';

            if($zip->open($file_zip_url, \ZipArchive::OVERWRITE) === TRUE){
                $this->addFileToZip($file_url, $zip); //调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法
                $zip->close(); //关闭处理的zip文件
            }
//        exit;
            $names = iconv('utf-8','GBK',$name);
            $file = fopen($file_zip_url,"r"); // 打开文件
            $file_name = $names.'.zip';
// 输入文件标签



            header("Content-Type:application/octet-stream; charset=utf-8");
            header("Pragma: public");
//            header("Expires: 0"); // set expiration time
            //header("Content-Type: application/force-download"); //告诉浏览器强制下载
//            header("Content-Transfer-Encoding: binary");
            header("Cache-control: private");
            header("Pragma: no-cache" ); //不缓存页面

            header('Content-Type: application/zip');
            header("Cache-Component: must-revalidate, post-check=0, pre-check=0" );
//            header("Content-Disposition: attachment; filename=".iconv('UTF-8','GB2312//TRANSLIT',$showname));
//            Header("Content-Disposition: attachment; filename=" . $file_name);//linux系统执行代码
            Header("Content-Disposition: attachment; filename=" . iconv('UTF-8','GB2312//TRANSLIT',$file_name));//Windows系统执行代码
            //header("Content-Disposition: attachment; filename=".$showname);
//            header("Content-Length: ".$length);
            Header("Accept-Length: ".filesize($file_zip_url));
//            header("Content-type: ".$type);
            header('Content-Encoding: UTF-8');
            header("Content-Transfer-Encoding: binary" );
//            即用iconv("UTF-8″,"GB2312//TRANSLIT",$showname)系统函数转换编码为gb2312
//            header("Content-Disposition: attachment; filename=".iconv('UTF-8','GB2312//TRANSLIT',$showname)); 

////            header('Content-Description: File Transfer');
//            Header("Content-type: application/octet-stream");
////            header("Pragma: public");
//            Header("Accept-Ranges: bytes");
////            header('Content-Type: application/zip');
//            Header("Accept-Length: ".filesize($file_zip_url));
//            Header("Content-Disposition: attachment; filename=" . $file_name);//linux系统执行代码
// 输出文件内容
            flush();
            ob_flush();
            echo fread($file,filesize($file_zip_url));
            fclose($file);
            exit;

        }










    }






// 2.0
    /**
     * +------------------------------------------------------------------------------
     * @desc            : 上传图片处理
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2018/1/18
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
    **/
    public function img_file_2(){

        $url = './Public/Admin/images/';
        $img_url = '/Admin/images/';
        $upfile = $_FILES["upfile"];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     $url; // 设置附件上传根目录
        $upload->saveName  = 'YZS' . date('YmdHis',time()) . '_' . rand(1000,9999);


        // 上传单个文件
        $info   =   $upload->uploadOne($upfile);
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功 获取上传文件信息
//            echo $url . $info['savepath'].$info['savename'];

            $name = $upfile['name'];
            $size = $upfile['size'];


            $array = array(
                'filesize' => $size,
                'orgfilename' => $name,
            );

            $src = $img_url . $info['savepath'].$info['savename'];
//            $return_src = $url . $info['savepath'].$info['savename'];

            echo json_encode(array('src' => $src, 'size' => $size, 'error' => 0 , 'data' => $array));
        }


    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 下载文件
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : nyz<1135334365@qq.com>
     * @since           : 2018/1/18
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
    **/
    public function file_zip_2(){

        //需要下载文件时操作
        $oid = I('id');
        if(!empty($oid)){
//        echo 111;
//            include_once './app/route/zip.php';
            $order_name = M('indentinfo','','DB_CONFIG1')->where('id=' . $oid)->getField('id,name,amount');
//            $order_name = M('indentinfo')->where('id=1')->getField('id,name,amount');//测试代码
            $order_material = M('materialinfo','','DB_CONFIG1')->where('i_id=' . $oid)->getField('photograph');
//            $order_material = M('materialinfo')->where('i_id=1')->getField('photograph');//测试代码

            $photograph = json_decode($order_material,true);

//
            echo '<pre>';
//
//            var_dump($order_material);
//            var_dump($photograph);


//            exit;


            $file_url = './Public/Admin/copy';
            $file_url_1 = $file_url.'/1.身份证';
            $file_url_2 = $file_url."/2.户口本";
            $file_url_3 = $file_url."/3.结婚证";
            $file_url_4 = $file_url."/4.征信报告";
            $file_url_5 = $file_url."/5.产证、产调、评论单";
            $file_url_6 = $file_url."/6.银行流水";
            $file_url_7 = $file_url."/7.备用房、产证、产调";
            $file_url_8 = $file_url."/8.看房照片";
            $file_url_9 = $file_url."/9.公司材料";
            $file_url_10 = $file_url."/10.法院网风险信息";
            $file_url_11 = $file_url."/11.借款申请表";
//            $file_url_12 = $file_url."/12.审核表";
            $file_url_12 = $file_url."/12.其他";

            if(file_exists($file_url)){
                //删除文件夹
                $this->delDirAndFile($file_url);

            }
//        创建目录
            $dump =array();

            //linux系统执行代码
//            $dump[] = mkdir($file_url,0777,true);
//            $dump[] = mkdir($file_url_1,0777,true);
//            $dump[] = mkdir($file_url_2,0777,true);
//            $dump[] = mkdir($file_url_3,0777,true);
//            $dump[] = mkdir($file_url_4,0777,true);
//            $dump[] = mkdir($file_url_5,0777,true);
//            $dump[] = mkdir($file_url_6,0777,true);
//            $dump[] = mkdir($file_url_7,0777,true);
//            $dump[] = mkdir($file_url_8,0777,true);
//            $dump[] = mkdir($file_url_9,0777,true);
//            $dump[] = mkdir($file_url_10,0777,true);
//            $dump[] = mkdir($file_url_11,0777,true);
//            $dump[] = mkdir($file_url_12,0777,true);
//            $dump[] = mkdir($file_url_12,0777,true);

            //Windows系统执行代码
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_1),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_2),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_3),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_4),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_5),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_6),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_7),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_8),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_9),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_10),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_11),0777,true);
            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_12),0777,true);
//            $dump[] = mkdir(iconv('utf-8','GBK',$file_url_13),0777,true);

//        var_dump($dump);

//        copy('',$file_url_1);

//            $copy = array();

            if(!empty($photograph['identity_card_frontal'])){
                $post_identity_num = 1;
                foreach($photograph['identity_card_frontal'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_1.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_1).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['household_register'])){
                $post_identity_num = 1;
                foreach($photograph['household_register'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_2.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_2).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['marriage_certificate'])){
                $post_identity_num = 1;
                foreach($photograph['marriage_certificate'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_3.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_3).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['credit_report'])){
                $post_identity_num = 1;
                foreach($photograph['credit_report'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_4.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_4).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['pledge_house'])){
                $post_identity_num = 1;
                foreach($photograph['pledge_house'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_5.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_5).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['bank'])){
                $post_identity_num = 1;
                foreach($photograph['bank'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_6.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_6).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['standby_house'])){
                $post_identity_num = 1;
                foreach($photograph['standby_house'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_7.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_7).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['see_house_img'])){
                $post_identity_num = 1;
                foreach($photograph['see_house_img'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_8.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_8).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['company'])){
                $post_identity_num = 1;
                foreach($photograph['company'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_9.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_9).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['court'])){
                $post_identity_num = 1;
                foreach($photograph['court'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_10.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_10).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['application_form'])){
                $post_identity_num = 1;
                foreach($photograph['application_form'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_11.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_11).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['check_table'])){
                $post_identity_num = 1;
                foreach($photograph['check_table'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }
            if(!empty($photograph['rests'])){
                $post_identity_num = 1;
                foreach($photograph['rests'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $img_pos = explode('.',$img_name[4]);
//                    $copy = copy('./Public'.$v,$file_url_12.'/'. $post_identity_num . '.' . $img_pos[1]);//linux系统执行代码
                    $copy = copy('./Public'.$v,iconv('utf-8','GBK',$file_url_12).'/'. $post_identity_num . '.' . $img_pos[1]);//Windows系统执行代码
                    $post_identity_num++;
                }
            }


//            var_dump($copy);
//
//            var_dump($order_material);
//            var_dump($photograph);
//            exit;

            $zip= new \ZipArchive();

//                var_dump($order_name);
//            $name = iconv('utf-8','GBK',$order_name[$oid]['name'] . '_' . ($order_name[$oid]['amount']/10000) . '万元');//linux系统执行代码
            $name = $order_name[$oid]['name'] . '_' . ($order_name[$oid]['amount']/10000) . '万元';//Windows系统执行代码
            $file_zip_url = './Public/Admin/zip/'.$name.'.zip';

            if($zip->open($file_zip_url, \ZipArchive::OVERWRITE) === TRUE){
                $this->addFileToZip($file_url, $zip); //调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法
                $zip->close(); //关闭处理的zip文件
            }
//        exit;

            $file = fopen($file_zip_url,"r"); // 打开文件
            $file_name = $name.'.zip';
// 输入文件标签



            header("Content-Type:application/octet-stream; charset=utf-8");
            header("Pragma: public");
//            header("Expires: 0"); // set expiration time
            //header("Content-Type: application/force-download"); //告诉浏览器强制下载
//            header("Content-Transfer-Encoding: binary");
            header("Cache-control: private");
            header("Pragma: no-cache" ); //不缓存页面

            header('Content-Type: application/zip');
            header("Cache-Component: must-revalidate, post-check=0, pre-check=0" );
//            header("Content-Disposition: attachment; filename=".iconv('UTF-8','GB2312//TRANSLIT',$showname));
//            Header("Content-Disposition: attachment; filename=" . $file_name);//linux系统执行代码
            Header("Content-Disposition: attachment; filename=" . iconv('UTF-8','GB2312//TRANSLIT',$file_name));//Windows系统执行代码
            //header("Content-Disposition: attachment; filename=".$showname);
//            header("Content-Length: ".$length);
            Header("Accept-Length: ".filesize($file_zip_url));
//            header("Content-type: ".$type);
            header('Content-Encoding: UTF-8');
            header("Content-Transfer-Encoding: binary" );
//            即用iconv("UTF-8″,"GB2312//TRANSLIT",$showname)系统函数转换编码为gb2312
//            header("Content-Disposition: attachment; filename=".iconv('UTF-8','GB2312//TRANSLIT',$showname)); 

////            header('Content-Description: File Transfer');
//            Header("Content-type: application/octet-stream");
////            header("Pragma: public");
//            Header("Accept-Ranges: bytes");
////            header('Content-Type: application/zip');
//            Header("Accept-Length: ".filesize($file_zip_url));
//            Header("Content-Disposition: attachment; filename=" . $file_name);//linux系统执行代码
// 输出文件内容
            flush();
            ob_flush();
            echo fread($file,filesize($file_zip_url));
            fclose($file);
            exit;

        }










    }

















}