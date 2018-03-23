<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
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
			border-bottom:solid 0.01rem #eee;
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
			border-bottom:solid 0.01rem #eee;
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
			height: 1rem;
			background: #fff;
			z-index: 9999;
			position: fixed;
			bottom:0 ;
		}
		
		.btn input {
			width: 1.6rem;
			height: 0.8rem;
			outline: none;
			border: none;
			border-radius: 0.1rem;
			font-size: 0.3rem;
			
		}
		
		
		.btn #return_list{
			margin-left:2.7rem ;
			background: #F3F3F3;
			border: solid 0.01rem #eee;
		}
	
		
		.btn #edit_order {
			background: #dfc18f;
			margin-left:0.2rem ;
			color: #fff;
		}
		
	</style>
	
		<header>订单号：<?php echo ($data["orderno"]); ?></header>
		<div class="margin-top"></div>
		<section >
			<div><p class="type">订单状态：</p><p class="active item"><?php echo ($data["errmsg"]); ?></p></div>
			<div><p class="type">订单类型：</p><p class="item">征信查询</p></div>
			<div><p class="type">被查询人：</p><p class="item"><?php echo ($data["name"]); ?></p></div>
			<div><p class="type">手机号码：</p><p class="item"><?php echo ($data["phone_num"]); ?></p></div>
			<div><p class="type">授权书编号：</p><p class="item"><?php echo ($data["authorize_num"]); ?></p></div>
			<div><p class="type">结果备注：</p><p class="item"><?php echo ($data["ly"]); ?></p></div>
			<div><p class="type">建单时间：</p><p class="item"><?php echo (date('Y-m-d H:i:s',$data["time"])); ?></p></div>
		</section>
		
		<div class="btn">
			<input type="button" id="return_list" value="返回列表"/>
			<?php if($data['errmsg'] == '回退'): ?><input type="button" id="edit_order" value="编辑订单"/><?php endif; ?>
		 </div>
	
<script>
	$(function(){
		
		
		$(".btn #return_list").click(function(){
			
			location.href="<?php echo U('Credit/search_history');?>";
		})
		
		
		$(".btn #edit_order").click(function(){
			
			location.href="<?php echo U('Credit/credit',array('id'=>$data['id']));?>";
		})
		
	})
	
	
	
</script>











</body>
</html>