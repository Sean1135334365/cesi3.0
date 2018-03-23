<?php
/**
 * +------------------------------------------------------------------------------
 * @desc            : 下载文件
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : will<849891012@qq.com>
 * @since           : 2017/11/16
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/

//function download_file($file){
//    if(is_file($file)){
//        $length = filesize($file);
//        $type = mime_content_type($file);
//        $showname =  ltrim(strrchr($file,'/'),'/');
//        header("Content-Description: File Transfer");
//        header('Content-type: ' . $type);
//        header('Content-Length:' . $length);
//        if (preg_match('/MSIE/', $_SERVER['HTTP_USER_AGENT'])) { //for IE
//            header('Content-Disposition: attachment; filename="' . rawurlencode($showname) . '"');
//        } else {
//            header('Content-Disposition: attachment; filename="' . $showname . '"');
//        }
//        readfile($file);
//        exit;
//    } else {
//        exit('文件已被删除！');
//    }
//}

function delDirAndFile( $dirName ){
    if ( $handle = opendir( "$dirName" ) ) {
        while ( false !== ( $item = readdir( $handle ) ) ) {
            if ( $item != "." && $item != ".." ) {
                if ( is_dir( "$dirName/$item" ) ) {
                    delDirAndFile( "$dirName/$item" );
                } else {
                    if( unlink( "$dirName/$item" ) )echo "成功删除文件： $dirName/$item<br />\n";
                }
            }
        }
        closedir( $handle );
        if( rmdir( $dirName ) )echo "成功删除目录： $dirName<br />\n";
    }
}


function addFileToZip($path,$zip){


    $cat_url = 'file';
    $handler=opendir($path); //打开当前文件夹由$path指定。
    while(($filename=readdir($handler))!==false){
        if($filename != "." && $filename != ".."){//文件夹文件名字为'.'和‘..’，不要对他们进行操作
            if(is_dir($path."/".$filename)){// 如果读取的某个对象是文件夹，则递归
                $zip->addEmptyDir($cat_url."/".iconv('utf-8','GBK',$filename));
//                echo '<br>/////////'.$path."|".$filename;
                addFileToZip($path."/".$filename, $zip);
            }else{ //将文件加入zip对象

                $url_arr = explode('/',$path);
//                var_dump($url_arr);
                $fil = $zip->addFile($path."/".$filename, $cat_url."/".iconv('utf-8','GBK',$url_arr[3])."/".$filename);
//                $zip->addFile($filename);

//                var_dump($path."/".$filename);
//                var_dump($cat_url."/".$url_arr[3]."/".$filename);
//                var_dump($fil);
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
 * @desc            : 递归查询（根据父ID查询所有子节点）
 * +------------------------------------------------------------------------------
 * @access          : public
 * @author          : nyz<1135334365@qq.com>
 * @since           : 2017/12/26
 * @param           : Void
 * @return          : void
 * +------------------------------------------------------------------------------
 **/

function getChildrenIds ($sort_id)
{
    $db = M('admin_users');
    $ids = '';
    $sql = "SELECT * FROM yzs_admin_users WHERE founder = $sort_id";
    $query = $db->query($sql);
//    $result = $query->result_array();

    if ($query){
        foreach ($query as $key=>$val)
        {
            $ids .= ','.$val['id'];
            $ids .= getChildrenIds ($val['id']);
        }
    }
//    print_r($ids);
        return $ids;
}
