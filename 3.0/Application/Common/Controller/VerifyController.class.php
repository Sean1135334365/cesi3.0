<?php
/**
 * Created by PhpStorm.
 * User: 84989
 * Date: 2017/5/22
 * Time: 15:00
 */

namespace Common\Controller;
use Think\Controller;

class VerifyController extends Controller {
    /**
     * +------------------------------------------------------------------------------
     * @desc            : 验证用户是否登陆
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/5/22
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function _initialize(){
//        $_SESSION['user_catalogue'] = '';

        $ctr = CONTROLLER_NAME;
        $act = ACTION_NAME;

//        if($ctr.'/'.$act != 'Login/login'){ //用户未登录状态下除登录界面外全部跳转至登录界面

        if(!empty($_SESSION['yzs_userinfo'])){       //检查用户是否登陆



        }else{
            $this->redirect('Login/login',array(),0,'非法操作！请先登陆！');
            exit;

        }

        if(!empty($_POST) || empty($_GET['id'])){
            if($ctr.'/'.$act != 'File/img_file')
            $get = !empty($_GET) ? json_encode($_GET):'';
            $post = !empty($_POST) ? json_encode($_POST): '';

            $log = array(
                'ctr'=>$ctr,
                'act'=>$act,
                'user_id'=>$_SESSION['yzs_userinfo']['id'],
                'user_name'=>$_SESSION['yzs_userinfo']['name'],
                'get'=>$get,
                'post'=>$post,
                'time'=>time()
            );

            $up = M('log')->add($log);

        }

//        }

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
        $cat_url = 'file';
        $handler=opendir($path); //打开当前文件夹由$path指定。
        while(($filename=readdir($handler))){
//            $filename = iconv('GBK','utf-8',$filename);
            if($filename != "." && $filename != ".."){//文件夹文件名字为'.'和‘..’，不要对他们进行操作
//                var_dump($path,$filename,222);
                if(is_dir($path."/".$filename)){// 如果读取的某个对象是文件夹，则递归
//                    $zip->addEmptyDir($cat_url."/".iconv('utf-8','GBK',$filename));//linux系统执行代码
                    $zip->addEmptyDir($cat_url."/".$filename);//Windows系统执行代码
//                echo '<br>/////////'.$path."|".$filename;
                    $this->addFileToZip($path."/".$filename, $zip);
//                    var_dump(444);
                }else{ //将文件加入zip对象
                    $url_arr = explode('/',$path);
//                    var_dump($url_arr,888);
//                    var_dump($path);

//                    $fil = $zip->addFile($path."/".$filename, $cat_url."/".iconv('utf-8','GBK',$url_arr[4])."/".$filename);//linux系统执行代码
                    $fil = $zip->addFile($path."/".$filename, $cat_url."/".$url_arr[4]."/".$filename);//Windows系统执行代码
//                    $fil = $zip->addFile($filename);

//                var_dump($path."/".$filename);
//                var_dump($cat_url."/".$url_arr[4]."/".$filename);
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
    public function delDirAndFile( $dirName ){
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
































}