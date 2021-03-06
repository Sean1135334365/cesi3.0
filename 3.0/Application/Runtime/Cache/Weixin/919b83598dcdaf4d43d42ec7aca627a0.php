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

    <title>賺客屋-房屋评估</title>
    <style>
        *{margin:0;padding:0;border:0;}
        html,body{width:100%;height:100%;font-family:cursive;color:#BFA95D;}
        .center{width:100%;}
        .center>img.logo{
        width: 7%;
        display: block;
        position: absolute;
        top: 1.5%;
        left: 1.5%;
        }
        .subject,.result{
        width: 90%;
        padding: 10% 5%;
        }
        .subject .title,.result .title{
        width: 100%;
        font-size: 0.76rem;
        font-weight: bold;
        text-align: center;
        }
        .subject .ipt{
        width: 100%;
        height: 1rem;
        margin: 0.2rem auto;
        border: 2px solid #999;
        border-radius: 0.2rem;
        }
        .subject .ipt img{
        width: 18%;
        vertical-align: middle;
        float: left;
        }
        .subject .ipt input, .ipt select{
        width: 73%;
        height: 100%;
        font-size: 0.4rem;
        font-family: '微软雅黑' !important;
        background-color: transparent;
        outline: none;
        padding-left: 0.2rem;
        vertical-align: middle;
        float: left;
        }
        .subject .two input{
        width: 55%;
        }
        .ipt select{
        width: 66%;
        height:100%;
        padding: 0 10%;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        -o-appearance: none;
        }
        .ipt span{
        vertical-align: middle;
        margin-left: 1.5%;
        font-size: 0.36rem;
        font-weight: bold;
        float: left;
        line-height: 1rem;
        }
        div.floor span{

        }
        div.floor input[type=number]{
        width:18%;
        border-bottom: 1px solid #ccc;
        text-align: center;
        }
        .ipt select.filter{
        padding:0;
        }
        .subject .smt{
        width: 100%;
        }
        .subject .smt input{
        width: 60%;
        height: 1rem;
        margin: 0.4rem auto;
        display: block;
        background-color: #BFA95D;
        border-radius: 0.14rem;
        font-size: 0.52rem;
        font-weight: bold;
        color: #fff;
        }
        input[name='filter1']{
        width: 60%;
        }
        .form2{display:none;}
        .result{display:none;}
        /*.result div.title{}*/
        .result div.text{
        width: 80%;
        font-size: 0.52rem;
        margin: 10px auto;
        }
        .result div.text>span{
        font-family: '微软雅黑' !important;
        }
        span.unit{
        position: relative;
        right: 0%;
        font-size: 0.44rem;
        font-weight: bold;
        line-height: 0.7rem;
        }
    </style>

    <div class="center">
        <img src="/Public/Weixin/images/ico/zkwu.jpg" class="logo">
    <div style="font-size: 0.32rem;margin-top: 1.5%;margin-left: 10%;">
        赚客屋
    </div>
    
    <div class="subject" id="subject">
        <div class="title">
        房价评估
        </div>
        <div id="form1">
        <div class="ipt">
            <img src="/Public/Weixin/images/ico/input_fgg.png" alt="">
            <input type="text" name="filter1" placeholder="请输入小区名称或地址">
        </div>
        <div class="smt">
            <input type="button" class="submit" id="submit1" value="查询地点">
        </div>
        </div>
        <div class="form2" id="form2">
        <div class="ipt">
            <!--<img src="./view/images/input_fgg.png" alt="">-->
            <!--<input type="text" name="filter" placeholder="请输入小区名称或地址">-->
            <span>选择地址：</span>
            <select name="filter" class="filter">
            </select>
        </div>
        <div class="ipt two">
            <span>物业类型：</span>
            <select name="house_type" id="house_type">
            <option value="住宅">住宅</option>
            <option value="别墅">别墅</option>
            </select>
        </div>
        <div class="ipt two">
            <span>朝&nbsp;&nbsp;&nbsp;&nbsp;向：</span>
            <select name="toward" id="toward">
            <option value="">-请选择朝向-</option>
            <option value="东">东</option>
            <option value="东南">东南</option>
            <option value="南">南</option>
            <option value="西南">西南</option>
            <option value="西">西</option>
            <option value="西北">西北</option>
            <option value="北">北</option>
            <option value="东北">东北</option>
            </select>
        </div>
        <div class="ipt two floor">
            <!--<img src="./view/images/input_fgg.png" alt="">-->
            <span>所在</span><input type="number" name="floor"><span>层</span>&nbsp;&nbsp;
            <span>总</span><input type="number" name="totalfloor" ><span>楼层</span>

        </div>
        <div class="ipt two">
            <!--<img src="./view/images/input_fgg.png" alt="">-->
            <span>面&nbsp;&nbsp;&nbsp;&nbsp;积</span>
            <input type="number" name="area" placeholder="请输入房屋面积"><span class="unit">m<sup>2</sup></span>
        </div>
        <div class="ipt two">
            <!--<img src="./view/images/input_fgg.png" alt="">-->
            <span>建成年代</span>
            <input type="number" name="builted_time" placeholder="请输入建成年代">
        </div>
        <div class="smt">
            <input type="button" class="submit" id="submit2" value="立即询价">
        </div>
        </div>
    </div>
    <div id="text"></div>
    <div class="result" id="result">
        <div class="title">查询结果</div>
        <div class="text" id="filter"></div>
        <div class="text" id="rent">出租价格：<span></span>元</div>
        <div class="text" id="price">出售价格：<span></span>元/平米</div>
        <div class="text" id="totalprice">总价格：<span></span>万元</div>
    </div>



    </div>


    <script>
    function resetPage(){  //移动端适配;
        var deviceWidth = document.documentElement.clientWidth;
        var scale = deviceWidth/640;
        if( deviceWidth>=640 ){
            document.documentElement.style.fontSize="100px";
        }else{
            document.documentElement.style.fontSize=100*scale+"px";
        };  
    };
    window.onload = function (){
        resetPage();
    };
    window.onresize = function (){
        resetPage();
    };
    $(function(){
        $('#submit1').click(function(){
        var filter = $('input[name="filter1"]').val();
        if(filter.length <= 0){
            alert('小区名称或地址不能为空');
            return false;
        }
        $.post("<?php echo U('Weixin/Assess/filter');?>",{filter:filter},function(data){
            if(data.status == 0){
            $('#form1').hide();
            $('#form2').show();
            var htm = '';
            $.each(data.status,function(key,val){
                htm += '<option value="'+val["residentialareaName"]+'">'+val["residentialareaName"]+'('+val["districtFullName"]+val["address"]+')</option>';
            });
            $('select[name="filter"]').append(htm);
            }else{
            alert(data.status)
            }

        },'json');



        });






        $('#submit2').click(function(){

        var house_type = $('select[name="house_type"]').val();
        var filter = $('select[name="filter"]').val();
        var area = $('input[name="area"]').val();
        var toward = $('select[name="toward"]').val();
        var floor = $('input[name="floor"]').val();
        var totalfloor = $('input[name="totalfloor"]').val();
        var builted_time = $('input[name="builted_time"]').val();
        var name = $('select[name="filter"]').find("option:selected").text();

        if(parseInt(floor) >= parseInt(totalfloor)){
            alert('所在楼层不能超过总楼层数！');
            return false;
        }


        if(click_submit(filter,area)){
            $.post("<?php echo U('Weixin/Assess/check');?>",{house_type:house_type,filter:filter,area:area,toward:toward,floor:floor,totalfloor:totalfloor,builted_time:builted_time,name:name},function(data){
            if(data.status == 0){
                $('#subject').hide();
                $('#result').show();
                var date = new Array();
                $.each(data.status,function(k,v){
                date[k] = v;
                });
    //              }
    //            });

                $('#filter').html(date['name']);
                $('#rent span').html(date['rent']);
                $('#price span').html(date['price']);
                $('#totalprice span').html(date['totalprice']);

            }else{
                $('#text').html(data.status);
                alert(data.status)
            }

            },'json');



        }

        });


    });
    function click_submit(f,a){
        if(f.length <= 0){
            alert('小区名称或地址不能为空');
            return false;
        }
        if(a.length <=0){
        alert('房屋面积不能为空');
        return false;
        }
        return true;
    }


    </script>








</body>
</html>