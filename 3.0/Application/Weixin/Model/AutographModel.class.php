<?php
namespace Weixin\Model;
use Think\Exception;
use Think\Model;
class AutographModel  {
    /*
    * 生成数字签名
    * $userId 用户userKeyId
    * $userAccessKey 用户UserAccessKey
    * $time 时间戳
    * $parameters 请求参数
    * $method="Post" 请求类型 默认为:Post/Get/Put/Delete
    */
    public  function HashAndSignString(
        $userId,
        $userAccessKey,
        $time,
        $parameters,
        $method = "Post") {
        // 请求参数
        $arrSig = array();
        // 条件分隔符
        $strSep = '&';
        $KEY_ID = $userId;
        $AKEY = $userAccessKey;
        //组装参数
        $arrSig['userKeyId'] = $KEY_ID;
        $arrSig['time'] = $time;
        if (!empty($parameters)) {
            foreach ($parameters as $k => $v) {
                $arrSig[$k] = $v;
            }
        }
        //key字典排序
        ksort($arrSig);
        //生成规范化请求字符串
        $arrStd = array();
        foreach ($arrSig as $strKey => $strValue) {
            $arrStd[] =
                sprintf('%s=%s',
                    $this->percentEncode($strKey),
                    $this->percentEncode($strValue));
        }
        $strSig = implode('&', $arrStd);
        //生成用于计算签名的字符串
        $strSig = 'Post' . $strSep .
            $this-> percentEncode('/') . $strSep .
            $this-> percentEncode($strSig);
        //生成签名
        $strKeySecret = $AKEY . '&';
        $strSign = base64_encode(hash_hmac('sha1', $strSig, $strKeySecret, true));
        return $this->percentEncode($strSign);
        //             return $strSign;
    }

    /**
     * URL参数转码
     * @param
     * @return
     */
    function percentEncode($strUrl) {
        $strUrl = str_replace('+', '%20', rawurlencode($strUrl));
        $strUrl = str_replace('*', '%2A', $strUrl);
        $strUrl = str_replace('%7E', '~', $strUrl);
        return $strUrl;
    }


    /**
     * +------------------------------------------------------------------------------
     * @desc            : 签名参数处理
     * +------------------------------------------------------------------------------
     * @access          : public
     * @author          : will<849891012@qq.com>
     * @since           : 2017/5/8
     * @param           : Void
     * @return          : void
     * +------------------------------------------------------------------------------
     **/
    public function signature($params){
        $key_id = '653eea2aeeda4a6ab2477e6603485b85';
        $access_signature = '6dc0aadfffef4e2281d6f94641e6d733';

        list($usec, $sec) = explode(" ", microtime());
        $time_stamp = (float)sprintf('%.0f',(floatval($usec)+floatval($sec))*1000);

        $data = $this->HashAndSignString($key_id, $access_signature, $time_stamp, $params, "Post");

        $arr = array(
            'key_id'        =>$key_id,
            'data'          =>$data,
            'time_stamp'    =>$time_stamp
        );

        return $arr;


    }

}