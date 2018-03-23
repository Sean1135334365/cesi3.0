<?php
namespace Weixin\Controller;
use Common\Controller\WeixinController;
class IndexController extends WeixinController {
    public function index(){
        echo '<pre>';





//        var_dump($_SESSION,2);





//        var_dump($_REQUEST);
//        var_dump($_SERVER);
//
//        var_dump($_GET);
//
//
//        var_dump($_SERVER['HTTPS']);
//        var_dump($_SERVER['REQUEST_SCHEME']);

        if($_SERVER['HTTPS'] == 'off'){
            $http = "http://";
        }else{
            $http = "https://";
        }

        $url = $http.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
        $url1 = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
//
//        var_dump($url);
//        var_dump($url1);
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
    }
}