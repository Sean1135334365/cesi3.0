<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/11/21
 * Time: 13:38
 */

namespace Admin\Model;
use Think\Model;
/**
 * +------------------------------------------------------------------------------
 * @desc            : 文件压缩类
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/11/21
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/
class CompressFilesModel  {

    //预设文件copy根目录
    private $url = '';

    //预设oopy文件夹编码
    private $file_encoding = 'utf-8';

    //定义运行系统环境(Linux/Windows)
    private $system_environment = '';

    //预设输出文件夹编码
    private $file_output_encoding = '';

    //region 调用示例


//
//
//        $urls = 'image';
//
//
//
//
//
//        $zip = new CompressFilesModel($urls);
////        $zip->url = $urls;
////        $zip = D('Admin/Compressfiles');
////        $zip->url = $url;
//        $data = array(
//            array(
//                'name'=>'身份证',
//                'list'=>array("/uploading/wechat/images/weixin/YZS20171102183051_1744.jpg","/uploading/wechat/images/weixin/YZS20171103175834_8795.jpg","/uploading/wechat/images/weixin/YZS20171102191559_7127.jpg","/uploading/wechat/images/weixin/YZS20171103180533_7457.jpg","/uploading/wechat/images/weixin/YZS20171102182728_5185.jpg")
//            ),
//        );
//
//        $name = "一站式_100万元";
//
//
//        $zip->file_zip($data,$name);



    //endregion

    /**
     * +------------------------------------------------------------------------------
     * @desc            : 构造函数
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/21
     * @param           : string $url 文件copy根目录
     * @param           : string $file_output_encoding 设定文件输出目录编码（默认为GBK）
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function __construct($url,$file_output_encoding = 'GBK'){

        //定义相关参数
        $this->url = 'Public/zip/'.$url;
        $this->file_output_encoding = $file_output_encoding;

        //获取操作系统并定义文件夹编码

        $os = PHP_OS;
        if(eregi('win',$os)){
            $this->system_environment = 'Windows';
            $this->file_encoding = 'GBK';
        }elseif(eregi('linux',$os)){
            $this->system_environment = 'Linux';
            $this->file_encoding = 'utf-8';
        }else{
            $this->system_environment = 'Linux';
            $this->file_encoding = 'utf-8';
        }

        var_dump($os,'$os值');
        var_dump($this->system_environment,'$this->system_environment值');
        var_dump($this->file_encoding,'$this->file_encoding值');
        var_dump($this->url,'$this->url值');
        var_dump($this->file_output_encoding,'$this->file_output_encoding值');

    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 文件压缩调用函数
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/21
     * @param           : array $img_list 图片url数组
     * @param           : string $filename 输出的压缩文件名
     * @param           : string $url 文件copy根目录
     * @param           : string $file_output_encoding 设定文件输出目录编码（默认为GBK）
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function file_zip($img_list,$filename){

//        //定义相关参数
//        $this->url = $url;
//        $this->file_output_encoding = $file_output_encoding;
//        header("Content-Type: text/html;charset=utf-8");

//        echo '<pre>';


        if(is_array($img_list)){
            if(file_exists($this->url)){
                //删除文件夹
                $this->delDirAndFile($this->url);
            }
            foreach($img_list as $key=>$val){
//                var_dump($this->url,'0002');
                $file_img = $this->url . '/' . $val['name'];
                $img_url = $this->file_code($file_img);
                var_dump($img_url,'$img_url返回');
                if(!$img_url){
                    return false;
                }
                $num = 1;
                foreach($val['list'] as $k=>$v){
                    $img_name = explode('/',$v);
                    $subscript = count($img_name) - 1;
                    $img_pos = explode('.',$img_name[$subscript]);
                    $copy = copy('./Public'.$v, $img_url.'/'. $num . '.' . $img_pos[1]);
//                    var_dump($img_url,'0003');echo '/*1*/';
//                    var_dump($v,'0004');echo '/*2*/';
//                    var_dump($img_pos,'0005');echo '<br>';
                    $num++;
                }
            }

            $this->fzip($filename);
        }else{
            return false;
        }

    }




    /**
     * +------------------------------------------------------------------------------
     * @desc            : 文件压缩
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/21
     * @param           : string $file_url 文件根目录
     * @param           : string $filename 压缩文件名
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    private function fzip($filename){
        $file_url = $this->url;

        $zip= new \ZipArchive();

//            $name = iconv('utf-8','GBK',$order_name[$oid]['name'] . '_' . ($order_name[$oid]['amount']/10000) . '万元');//linux系统执行代码
//        $name = $filename['name'] . '_' . ($filename['amount']/10000) . '万元';//Windows系统执行代码

//        if($filename['name'] != ''){
//            $name = iconv('utf-8','GBK',$filename['name']) . '_' . $filename['loanamount'] . '元';
//        }else{
//            $name = '一站式_' . $filename['loanamount'] . '元';
//        }


        if($this->file_encoding == 'GBK'){
            $file_zip_url = './Public/zip/image/'.iconv('utf-8','GBK',$filename).'.zip';
        }else{
            $file_zip_url = './Public/zip/image/'.$filename.'.zip';
        }

//        if($this->file_output_encoding == 'GBK'){
//            $name = iconv('utf-8','GBK',$filename);
//        }else{
//
//        }
//        var_dump($file_zip_url.'(***********)');
        if($zip->open($file_zip_url, \ZipArchive::OVERWRITE) === TRUE){
            $this->addFileToZip($file_url, $zip); //调用方法，对要打包的根目录进行操作，并将ZipArchive的对象传递给方法
            $zip->close(); //关闭处理的zip文件
        }
//        exit;
        $name = iconv('utf-8','GBK',$filename);
//        $name = iconv('GBK','utf-8',$name1);
        $file = fopen($file_zip_url,"r"); // 打开文件
        $file_name = $name;
// 输入文件标签



        header("Content-Type:application/octet-stream; charset=utf-8");
        header("Pragma: public");
        header("Expires: 0"); // set expiration time
        header("Content-Type: application/force-download"); //告诉浏览器强制下载
//            header("Content-Transfer-Encoding: binary");
        header("Cache-control: private");
        header("Pragma: no-cache" ); //不缓存页面

        header('Content-Type: application/zip');
        header("Cache-Component: must-revalidate, post-check=0, pre-check=0" );
//            header("Content-Disposition: attachment; filename=".iconv('UTF-8','GB2312//TRANSLIT',$showname));
        if($this->file_encoding == 'GBK'){
            Header("Content-Disposition: attachment; filename=" . iconv('UTF-8','GB2312//TRANSLIT',$file_name.'.zip'));//Windows系统执行代码
        }else{
            Header("Content-Disposition: attachment; filename=" . $file_name.'.zip');//linux系统执行代码
        }
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




    /**
     * +------------------------------------------------------------------------------
     * @desc            : 压缩文件操作
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/7/12
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function addFileToZip($path,$zip){
//        var_dump($zip);
        $cat_url = 'file';
        $handler=opendir($path); //打开当前文件夹由$path指定。
        while(($filename=readdir($handler))){
//            $filename = iconv('GBK','utf-8',$filename);
            if($filename != "." && $filename != ".."){//文件夹文件名字为'.'和‘..’，不要对他们进行操作
//                var_dump($path,$filename,222);
                if(is_dir($path."/".$filename)){// 如果读取的某个对象是文件夹，则递归

                    if($this->file_encoding == 'GBK'){
                        $ss = $zip->addEmptyDir($cat_url."/".$filename);//Windows系统执行代码
                    }else{
                        $zip->addEmptyDir($cat_url."/".iconv('utf-8','GBK',$filename));//linux系统执行代码
                    }
//                    var_dump($ss.'(***********)');

//                    var_dump($zip);

//                echo '<br>/////////'.$path."|".$filename;
                    $this->addFileToZip($path."/".$filename, $zip);
//                    var_dump(444);
                }else{ //将文件加入zip对象
                    $url_arr = explode('/',$path);
//                    var_dump($url_arr,888);
//                    var_dump($path);
                    $subscript = count($url_arr) - 1;
                    if($this->file_encoding == 'GBK'){
                        $fil = $zip->addFile($path."/".$filename, $cat_url."/".$url_arr[$subscript]."/".$filename);//Windows系统执行代码
                    }else{
                        $fil = $zip->addFile($path."/".$filename, $cat_url."/".iconv('utf-8','GBK',$url_arr[$subscript])."/".$filename);//linux系统执行代码
                    }
//                    $fil = $zip->addFile($path."/".$filename, $cat_url."/".iconv('utf-8','GBK',$url_arr[4])."/".$filename);//linux系统执行代码
//                    $fil = $zip->addFile($path."/".$filename, $cat_url."/".$url_arr[$subscript]."/".$filename);//Windows系统执行代码
//                    $fil = $zip->addFile($filename);

//                var_dump($path."/".$filename);
//                var_dump($cat_url."/".$url_arr[$subscript]."/".$filename);
//                var_dump($fil,101010101);
//                echo '<br>/////////'.$path."..".$filename;
                }
//            if(empty($filename)){
//                $zip->addEmptyDir($path);
//            }
            }
        }
        @closedir($path);
    }



    /**
     * +------------------------------------------------------------------------------
     * @desc            : 删除文件操作
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/7/12
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    private function delDirAndFile( $dirName ){
        if ( $handle = opendir( "$dirName" ) ) {
            while ( false !== ( $item = readdir( $handle ) ) ) {
                if ( $item != "." && $item != ".." ) {
                    if ( is_dir( "$dirName/$item" ) ) {
                        $this->delDirAndFile( "$dirName/$item" );
                    } else {
                        if( unlink( "$dirName/$item" ) );//echo "成功删除文件： $dirName/$item<br />\n";
                    }
                }
            }
            closedir( $handle );
            if( rmdir( $dirName ) )echo "成功删除目录： $dirName<br />\n";
        }
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 文件夹编码转换
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/11/21
     * @param           : string $url 文件路径
     * @param           : bool $way copy为true、输出为false(默认为true)
     * @param           : int $i 为递归做计数 防止死循环
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    private function file_code($url,$way = true,$i = 1){
//        $result = '';
        if($way){
//            var_dump($way,'0011');
//            var_dump($this->file_encoding,'0012');
            //copy时转成对应操作系统的文件名编码,返回编译后的url
            if($this->file_encoding == 'GBK'){
                $url_code = iconv('utf-8','GBK',$url);
//                $state = mkdir($url,0777,true);
//                $state = mkdir(iconv('utf-8','GBK',$url),0777,true);
                $state = mkdir($url_code,0777,true);
                if($state){
//                    var_dump($state,'0017');
//                    var_dump($url,'0015');
//                    var_dump($url_code,'0016');
                    return $url_code;
                }else{
//                    var_dump($url_code,'0013');
                    return $i > 3 ? false:$this->file_code($url,$way,++$i);
                }
            }else{
                $state = mkdir($url,0777,true);
                if($state){
                    return $url;
                }else{
//                    var_dump($url,'0014');
                    return $i > 3 ? false:$this->file_code($url,$way,++$i);
                }
            }
        }else{
            //输出时转成给定参数的文件名编码
            if($this->file_output_encoding == 'GBK'){
                $state = iconv('utf-8','GBK',$url);
                if($state){
                    return $state;
                }else{
                    return $i > 3 ? false:$this->file_code($url,$way,++$i);
                }
            }
        }

    }



}