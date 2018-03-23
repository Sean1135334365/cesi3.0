<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>賺客屋</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
  <meta name="format-detection" content="telephone=no">
  <meta name="description" content="賺客屋">
  <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport"/>
  <meta content="yes" name="apple-mobile-web-app-capable"/>
  <meta content="black" name="apple-mobile-web-app-status-bar-style"/>
  <meta content="telephone=no" name="format-detection"/>
  <!--<link rel="stylesheet" href="./view/css/pro_s.css" type="text/css">-->

  <!--<script type="text/javascript" src="/Public/js/jquery-1.8.1.min.js"></script>-->
  <script type="text/javascript" src="/Public/js/jquery-3.2.1.min.js"></script>
  <!--<script type="text/javascript" src="./view/js/af_wxapply.js"></script>-->
  <script type="text/javascript" src="/Public/Weixin//js/lrz.min.js"></script>
  <!--<script type="text/javascript" src="./view/js/pro_s.js"></script>-->

</head>
<body>


		<script type="text/javascript" src="/Public/Weixin/js/rem.js" ></script>
	
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		
		header{
			font-size:0.3rem ;
			padding: 0.3rem;
			color: #333;
			font-weight: 700;
			border-bottom:solid 0.01rem #ccc;
			background: #FFFFFF;
		}
		
		.margin-top{
			width: 100%;
			height: 0.2rem;
			background:#f3f3f3 ;
		}
		  section .margin-bottom{
			 margin-bottom:0.4rem ;
		}
		section{
			padding: 0.3rem;
			font-size: 0.3rem;
			border-bottom:solid 0.01rem #ccc;
			background: #FFFFFF;
		}
		
		section div {
			overflow: hidden;
		}
		section  p{
			height:0.6rem ;
		}
		section div .type{
			float: left;
			color: #666;
		}
		section div .item{
			display: inline-block;
			float: right;
			color: #333;
		}
		.active{
			color: cornflowerblue !important;
		}
		.btn{
			width: 100%;
			font-size: 0;
			height: 1.2rem;
			background: #fff;
			z-index: 9999;
			position: fixed;
			bottom:0 ;
		}
		
		.btn input {
			width: 1.6rem;
			height: 1rem;
			outline: none;
			border: none;
			border-radius: 0.1rem;
			font-size: 0.3rem;
			
		}
		
		.btn input:nth-of-type(1) {
			margin-left: 2.7rem;
			background: #F3F3F3;
			border: solid 0.01rem #ccc;
		}	
		
		.btn input:nth-of-type(2) {
			background: #dfc18f;
			margin-left:0.2rem ;
			color: #fff;
		}
		
	</style>
	
		<header>订单号：16255476578</header>
		<div class="margin-top"></div>
		<section >
			<div><p class="type">订单状态：</p><p class="active item">等待上传</p></div>
			<div><p class="type">订单类型：</p><p class="item">征信查询</p></div>
			<div><p class="type">被查询人：</p><p class="item">*卓华</p></div>
			<div><p class="type">手机号码：</p><p class="item">******</p></div>
			<div><p class="type">授权书编号：</p><p class="item">83674726758339992277</p></div>
			<div><p class="type">结果备注：</p><p class="item">模板接受成功，等待上传资料</p></div>
			<div><p class="type">建单时间：</p><p class="item">2017-11-18 &nbsp;13:37:28</p></div>
		</section>
		
		<div class="btn">
			<input type="button" value="撤销订单"/>
			<input type="button" value="编辑订单"/>
		 </div>
	
<script>
	$(function(){
		$(".btn input[value='编辑订单']").click(function(){
			
			location.href="/index.php/Weixin/Apply/credit.html"
		})
		
		
		
		
		
	})
	
	
	
</script>











</body>
</html>