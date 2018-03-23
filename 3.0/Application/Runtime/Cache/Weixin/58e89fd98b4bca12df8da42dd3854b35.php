<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
   <title><?php if($html_title != ''): echo ($html_title); else: ?>賺客屋<?php endif; ?></title>
  <meta charset="utf-8">
  <meta name="description" content="賺客屋">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
  <meta name="viewport" content="width=device-width,initial-scale=0.9,user-scalable=0">
  <link rel="icon" type="image/png" href="/Public/Admin/assets/i/ico_logo.png">
  <link rel="apple-touch-icon-precomposed" href="/Public/Admin/assets/i/ico_logo.png">

  <!--<link rel="stylesheet" href="./view/css/pro_s.css" type="text/css">-->

  <!--<script type="text/javascript" src="/Public/js/jquery-1.8.1.min.js"></script>-->
  <script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js?<?php echo rand(10000,99999); ?>"></script>
  <!--<script type="text/javascript" src="./view/js/af_wxapply.js"></script>-->
  <script type="text/javascript" src="/Public/Weixin//js/lrz.min.js?<?php echo rand(10000,99999); ?>"></script>
  <!--<script type="text/javascript" src="./view/js/pro_s.js"></script>-->

</head>
<body>


<!--<link rel="stylesheet" href="/Public/Weixin/css/reset.css">-->
<link rel="stylesheet" href="/Public/Weixin/css/pro_s.css?<?php echo rand(10000,99999); ?>" type="text/css">
<div class="shade"></div>
<div id="mask" style="position: fixed;width: 100vw;height: 100vh;left: 0;top: 0;background-color: #fff;text-align: center;z-index: 10;opacity: 1;transition: opacity 0.3s linear">
    <img src="/Public/Weixin/images/ico/loading.gif" alt="" style="width: 14vh;margin-top: 43vh;">
</div>
<div class="container">
  <div class="content">
    <!-- 地理定位 -->
    
    <div style="position: fixed;top: 0;left: 0;width: 100%;background-color: #fff;z-index:2;">
      <div style='float: left;font-size: 0.89rem;margin: 0.9rem 0;padding-left: 3%;border-left: 1vw solid #dfc190;box-sizing: border-box;color:#999;' id='bank'>
        极速贷款
      </div>
      <button class="location">
        <span id="city" val="1" higherUp="0">上海</span>
        <img src="/Public/Weixin/images/ico/gps.png">  
      </button>
    <!-- 银行机构 -->
    <input type="hidden" name="" banks='0' class='bank'>
    <div id="gps">
      <ul class="gps_1">
      </ul>
      <ul class="gps_2">
      </ul>
    </div>
    <!-- 筛选条件 -->

    <div class="condition">
      <!-- 智能筛选 -->
      <ul class="clearfix reset_fix" patterns="" mortgage="" id="filter">
        <!-- 地域选择 -->
        <li>
          <div>
            <span val="" a="筛 选">筛 选</span>
            <img src="/Public/Weixin/images/ico/xiala-weixuan.png" alt="" style="right: 79%;">
          </div>
          <ul class="noopsyche">
            <li>
              <div style='height:2.67rem;line-height:2.67rem;text-align:left;'>贷款方式</div>
              <div style="height:3.3rem;">
                <button><input type="radio" name="patterns" value="">不限 </button>
                <button><input type="radio" name="patterns" value="1">个人</button>
                <button><input type="radio" name="patterns" value="2">企业</button>
              </div>
            </li>
            <li>
              <div style='height:2.67rem;line-height:2.67rem;text-align:left;'>房抵情况</div>
              <div style="height:3.3rem;">
                <button><input type="radio" name="mortgage" value="">不限</button>
                <button><input type="radio" name="mortgage" value="1">一抵</button>
                <button><input type="radio" name="mortgage" value="2">二抵</button>
              </div>
            </li>
            <li>
              <button class="reset" id="reset">重置</button>
              <button type="submit" class="confirm" id="confirm">确定</button>
            </li>
          </ul>
        </li>
        <li>
          <div><span val="" a="类 型">类 型</span>
          <img src="/Public/Weixin/images/ico/xiala-weixuan.png" alt="" style="right: 54%;"></div>
          
          <ul class="choice" typ="house">
            <li val="">不限</li>
            <li val="1">住宅</li>
            <li val="2">公寓</li>
            <li val="3">别墅</li>
            <li val="4">商铺</li>
            <li val="5">办公楼</li>
            <li val="6">商住两用</li>
            <li val="7">酒店</li>
            <li val="8">厂房</li>
            <li val="0">其他</li>
          </ul>
        </li>
        <li>
          <div><span val="" a="成 数">成 数</span>
          <img src="/Public/Weixin/images/ico/xiala-weixuan.png" alt="" style="right: 29%;"></div>
          
          <ul class="choice" typ="percentage">
            <li val="">不限</li>
            <li val="8">8成</li>
            <li val="7">7成</li>
            <li val="6">6成</li>
            <li val="5">5成</li>
            <li val="0">其他</li>
          </ul>
        </li>
        <li>
          <div><span val="" a="利 率">利 率</span>
          <img src="/Public/Weixin/images/ico/xiala-weixuan.png" alt=""></div>
          <ul class="choice" typ="interest">
            <li val="">不限</li>
            <li val=",1.0">月利率1.0%以下</li>
            <li val="1.0,1.5">月利率1.0%-1.5%</li>
            <li val="1.5,">月利率1.5%以上</li>
          </ul>
        </li>
      </ul>
      <div class="line"></div>
      <div class="clear"></div>
    </div></div>
    <div style="height: 6.37rem;" id="local"></div>
    <ul class="product_list" style="display: none;">
        <li>
          <a href="<?php echo U('Apply/product_introduce',array('id'=>1));?>">
            <div class="list_top">
              <img src="/Public/Weixin/images/ico/Shape.png" alt="">
              <span><strong>紫金系列I</strong>· 有房就能贷</span>
            </div>
            <ul class="list_body clearfix">
              <li class="product_list_left">
                <img src="" alt="">
              </li>
              <li class="product_list_right">
                <p class="f14">月综合费用&#12288;<span class="red f14">0.6%-0.95%</span></p>
                <div style="padding-bottom:0.5rem;"><span class="left f14">50-1000万</span><p class="left"></p><span class="left f14">不超过7成</span></div>
                <div id="address">
                    <img src="/Public/Weixin/images/ico/add.png" alt=""><span>上海苏州均可受理</span>
                </div>
                <div id="mold" style="border-bottom: 0.625rem;">
                    <img src="/Public/Weixin/images/ico/leixing.png" alt=""><span>商铺 · 办公楼 · 别墅</span>
                </div>
              </li>
              <li class="product_list_down">
                <img src="/Public/Weixin/images/ico/mark.png" alt="">
                <p class="f10">商铺、办公楼提供租赁合同，低于500万收据收件放款</p>
              </li>
            </ul>
          </a>
        </li>
        <div class="line"></div>
      </ul>
    <div class="list">
      
    </div>
  </div>
</div>
<!--高德地图引入-->
    	<!--<script src="http://webapi.amap.com/maps?v=1.3&key=5cb55b5a2ea9a2af7d48be5f03c21390&plugin=AMap.ToolBar"></script>-->
    	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    	<script type="text/javascript" src="https://webapi.amap.com/maps?v=1.4.0&key=1b6db69cf1c98e973aadfc17c887410d"></script>
 	<script>
      var banks=sessionStorage.getItem('banks')
      if(banks == '0'){
        $('.bank').attr('banks',banks);
        $('#bank').text('极速贷款')
      }else if(banks == '1'){
        $('.bank').attr('banks',banks);
        $('#bank').text('银行贷款')
      }
      var at_url = window.location.href;
      var bol=false;
   		$.post("<?php echo U('Apiwechat/js_sdk_check');?>",{url:at_url},function(data){
        var arr = data.result;
        wx.config({
          debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
          appId: arr.appid, // 必填，公众号的唯一标识
          timestamp: "" + arr.timestamp, // 必填，生成签名的时间戳
          nonceStr: arr.noncestr, // 必填，生成签名的随机串
          signature: arr.signature,// 必填，签名，见附录1
          jsApiList: arr.jsapilist // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
        });
        wx.ready(function(){
          wx.getLocation({
            type:'wgs84', // 默认为wgs84的gps坐标，如果要返回直接给openLocation用的火星坐标，可传入'gcj02'
            success:function(res){
              var latitude = res.latitude; // 纬度，浮点数，范围为90 ~ -90
              var longitude = res.longitude; // 经度，浮点数，范围为180 ~ -180。
              //var speed = res.speed; // 速度，以米/每秒计
              //var accuracy = res.accuracy; // 位置精度

              AMap.service(["AMap.Geocoder"],function () {
                var geocoder = new AMap.Geocoder({ //构造地点查询类
                });
                /*根据坐标解析地址*/
                AMap.convertFrom([longitude,latitude], 'gps',function(status,result){

                  if(result.info === 'ok'){


                  var lnglatXY=[result.locations[0].lng, result.locations[0].lat];

//						    var city="";
//						    var cityName =result.regeocode.addressComponent.businessAreas[0].city;
//                var lnglatXY=[116.396574, 39.992706];//地图上所标点的坐标
                    geocoder.getAddress(lnglatXY, function(statuss, resulti) {
                      //$('#mask').css('display','none');
                      if (statuss === 'complete' && resulti.info === 'OK') {
                        //获得了有效的地址信息:
                        var city = '';
                        if(resulti.regeocode.addressComponent.city === ""){
                          city=resulti.regeocode.addressComponent.province; //如果直辖市直接把省份名称传过去
                        }else{
                          city=resulti.regeocode.addressComponent.city;//如果非直辖市把该省份直辖市传过去
                        }
                        bol=true;
                        $.post("<?php echo U('Apiwechat/initial_check');?>",{city:city,banks:$('.bank').attr('banks')},function(data){
                          var _city=city;
                          setlocal(data);
                          if(data.state === 1){
                              alert('系统目前不支持您所在城市，已为您切换到默认城市！您可以手动切换需要的城市。');
                              $.post("<?php echo U('Apiwechat/initial_check');?>",{city:"上海市",higher_up:"0",banks:$('.bank').attr('banks')},function(data2){
                                setmsg(data2,"上海市",1);
                                $('#city').attr('higherUp','0');
                                $.post(choice_up,{city:1,higher_up:"0",banks:$('.bank').attr('banks')},function(data){
                                  if(data.status == 1){
                                    $('#mask').css('opacity','0');
                                    setTimeout(function(){
                                      $('#mask').css('display','none');
                                    },500)
                                    setItem(data);
                                  }else{
                                  }
                                },'json');
                              },'json')
                          }else{
                            setmsg(data,_city,data.info.id);
                            $.post(choice_up,{city:data.info.id,higher_up:data.info.higher_up,banks:$('.bank').attr('banks')},function(data){
                              $('#city').attr('higherUp',data.info.higher_up);
                              if(data.status == 1){
                                $('#mask').css('opacity','0');
                                setTimeout(function(){
                                  $('#mask').css('display','none');
                                },500)
                                setItem(data);
                              }else{
                              }
                            },'json');
                          }
                          
                        })
                      }else{
//                        //获取地址失败
                      }
                    });
                  }else{
      
                  }

                });
              });
            }
          });

        });
        wx.error(function(res){
          // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。

        });

		});
    setTimeout(function(){
      if(!bol){
        if(confirm("是否刷新页面")){
          window.location.reload();
        }else{
          alert("请重新手动加载页面");
          window.close();
          return false;
        }
      }
    },8000)
  </script>


<script type="text/javascript" src="/Public/Weixin/js/lrz.min.js"></script>
<script type="text/javascript" src="/Public/Weixin/js/pro_s.js?<?php echo rand(10000,99999); ?>"></script>

<script>
  var city = $('#city').attr('val');

  var choice_up = "<?php echo U('Apply/product_screen');?>";

  var url = "<?php echo U('Apply/product_introduce');?>";

  var public='/Public';

  function resetPage(){  //移动端适配;
    var deviceWidth = document.documentElement.clientWidth;
    var scale = deviceWidth/640;
    setTimeout(function(){
      var oh=$(document).height() - $('#local').height()-150;
      $('.choice').css('max-height',oh+'px');
    },500);
    if( deviceWidth>=640 ){
            document.documentElement.style.fontSize="100px";
    }else{
            document.documentElement.style.fontSize=28.85*scale+"px";
    };  
  };
  window.onload = function (){
    //self.close();
    resetPage();
  };
  window.onresize = function (){
    resetPage();
  };
  
  $('.gps_1').on('click',function(){
        $('.gps_2>li').click(function(){
            $('#gps').css('width','0px');
            $('.shade').css('display','none');
            if($('#city').attr('val')==$(this).attr('id')){
              return false;
            }
            $('.list').html('');
            $('.reset_fix img').css('display','block');
            $('.reset_fix span').css('color','#666');
            $('.reset_fix li').css('color','#666');
            $('.reset_fix span').each(function(){
              $(this).text($(this).attr('a'));
              $(this).attr('val','');
            });
            $('#city').text('');
            $('#city').text($(this).text());
            $('#city').attr('val',$(this).attr('id'));
            var city=$('#city').text();
            $.post("<?php echo U('Apiwechat/initial_check');?>",{city:city,banks:$('.bank').attr('banks')},function(data){
                var city2=data.info.name;
                if(data.state === 1){
                    alert('系统目前不支持您所在城市，已为您切换到默认城市！您可以手动切换需要的城市。');
                };
                setmsg(data,city2);
                $('#city').attr('higherUp',data.info.higher_up);
                sessionStorage.setItem('territory_id',data.info.id);
                $.post(choice_up,{city:data.info.id,higher_up:data.info.higher_up,banks:$('.bank').attr('banks')},function(data){
                  if(data.result.length=="0"){
                      var op=document.createElement('p');
                      $(op).html('暂无备选数据...');
                      $(op).css({'color':'#999','text-align':'center','margin':'1.2rem auto 0'});
                      $('.list').append(op);
                  }
                  if(data.status == 1){
                    setItem(data);
                  }else{
                  }
                },'json');   
            })
        })
    });
    
</script>










</body>
</html>