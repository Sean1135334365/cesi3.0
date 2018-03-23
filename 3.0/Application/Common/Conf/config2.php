<?php
/*return array(
    //'配置项'=>'配置值'
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'yzs3.0', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'yzs_', // 数据库表前缀
    'DB_CHARSET'=>'utf8',// 数据库字符集

//    'WEIXIN'    => array(
//        'appid'     => 'wxcb3064ac9e970f5e',
//        'appsecret' => '31da38aad259368ae937dc5565217991',
//    ),

  //賺客屋
//    'WEIXIN'        => array(
//        'appid'         => 'wx7edb2a07a676b2ae',
//        'appsecret'     => 'd1d8e3ce2818449a0932807411fff5ec'
//    ),
    //周烜借测试号
    'WEIXIN'        => array(
        'appid'         => 'wx238c107363928014',
        'appsecret'     => 'f5efbe1d18fce21f92f6e8ae5d46b5d0'
    ),
    
    'CREDIT_API'    => array(
        'zxcxsjtj'      => 'http://apitest.kcway.net/tofindzx.do',//征信查询数据提交
        'ddjgcx'        => 'http://apitest.kcway.net/findresult.do',//订单结果查询
        'htddcxtj'      => 'http://apitest.kcway.net/toup.do',//回退订单重新提交
        'sqkbsqshsqs'   => 'http://apitest.kcway.net/getapply.do',//申请空白申请书和授权书
        'khkh'          => 'http://apitest.kcway.net/tokhbyckey.do',//客户开户
    ),

);*/
return array(
    //'配置项'=>'配置值'
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1:3306', // 服务器地址
    'DB_NAME'   => 'cesi3.0', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'ZY@#2016sys',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'yzs_', // 数据库表前缀
    'DB_CHARSET'=>'utf8',// 数据库字符集

//    2.0
    'DB_CONFIG1' => array(
        'DB_TYPE'   => 'mysql', // 数据库类型
        'DB_HOST'   => '127.0.0.1:3306', // 服务器地址
        'DB_NAME'   => 'yzsdb', // 数据库名
        'DB_USER'   => 'root', // 用户名
        'DB_PWD'    => 'ZY@#2016sys',  // 密码
        'DB_PORT'   => '3306', // 端口
        'DB_PREFIX' => 'yzs_', // 数据库表前缀
        'DB_CHARSET'=>'utf8',// 数据库字符集
    ),
    'bairong' => array(
        'url'   => 'https://api.100credit.cn/bankServer2/user/login.action',//正式链接
//        'url'   => 'https://sandbox-api.100credit.cn/bankServer2/user/login.action',//测试链接
        'userName'=>'gjrzAPI',
        'password'=>'gjrzAPI',
        'apiCode'=>3000810,
        'admin' => 'userName=gjrzAPI&password=gjrzAPI&apiCode=3000810',
    ),
//    'WEIXIN'    => array(
//        'appid'     => 'wxcb3064ac9e970f5e',
//        'appsecret' => '31da38aad259368ae937dc5565217991',
//    ),

//    'WEIXIN'        => array(
//        'appid'         => 'wx7edb2a07a676b2ae',
//        'appsecret'     => 'd1d8e3ce2818449a0932807411fff5ec'
//    ),
  	//周烜借测试号
    'WEIXIN'        => array(
        'appid'         => 'wx238c107363928014',
        'appsecret'     => 'f5efbe1d18fce21f92f6e8ae5d46b5d0'
    ),

    'CREDIT_API'    => array(
        'zxcxsjtj'      => 'http://apitest.kcway.net/tofindzx.do',//征信查询数据提交
        'ddjgcx'        => 'http://apitest.kcway.net/findresult.do',//订单结果查询
        'htddcxtj'      => 'http://apitest.kcway.net/toup.do',//回退订单重新提交
        'sqkbsqshsqs'   => 'http://apitest.kcway.net/getapply.do',//申请空白申请书和授权书
        'khkh'          => 'http://apitest.kcway.net/tokhbyckey.do',//客户开户
    ),


);
//return array(
//    //'配置项'=>'配置值'
//    //'配置项'=>'配置值'
//    'DB_TYPE'   => 'mysql', // 数据库类型
//    'DB_HOST'   => '127.0.0.1:3306', // 服务器地址
//    'DB_NAME'   => 'cesi3.0', // 数据库名
//    'DB_USER'   => 'root', // 用户名
//    'DB_PWD'    => 'ZY@#2016sys',  // 密码
//    'DB_PORT'   => '3306', // 端口
//    'DB_PREFIX' => 'yzs_', // 数据库表前缀
//    'DB_CHARSET'=>'utf8',// 数据库字符集
//
//
//    'bairong' => array(
//        'url'   => 'https://api.100credit.cn/bankServer2/user/login.action',//正式链接
////        'url'   => 'https://sandbox-api.100credit.cn/bankServer2/user/login.action',//测试链接
//        'userName'=>'gjrzAPI',
//        'password'=>'gjrzAPI',
//        'apiCode'=>3000810,
//        'admin' => 'userName=gjrzAPI&password=gjrzAPI&apiCode=3000810',
//    ),
//
//
//);
//return array(
//    //'配置项'=>'配置值'
//    //'配置项'=>'配置值'
//    'DB_TYPE'   => 'mysql', // 数据库类型
//    'DB_HOST'   => '127.0.0.1:3306', // 服务器地址
//    'DB_NAME'   => 'yzsdb', // 数据库名
//    'DB_USER'   => 'root', // 用户名
//    'DB_PWD'    => 'ZY@#2016sys',  // 密码
//    'DB_PORT'   => '3306', // 端口
//    'DB_PREFIX' => 'yzs_', // 数据库表前缀
//    'DB_CHARSET'=>'utf8',// 数据库字符集
//
//
//    'bairong' => array(
//        'url'   => 'https://api.100credit.cn/bankServer2/user/login.action',//正式链接
////        'url'   => 'https://sandbox-api.100credit.cn/bankServer2/user/login.action',//测试链接
//        'userName'=>'gjrzAPI',
//        'password'=>'gjrzAPI',
//        'apiCode'=>3000810,
//        'admin' => 'userName=gjrzAPI&password=gjrzAPI&apiCode=3000810',
//    ),
//
//
//);

