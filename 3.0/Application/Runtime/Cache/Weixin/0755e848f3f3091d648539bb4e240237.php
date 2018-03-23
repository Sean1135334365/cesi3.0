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



    <link rel="stylesheet" href="/Public/Weixin/css/reset.css">
    <link rel="stylesheet" href="/Public/Weixin/css/pro_i.css?<?php echo rand(10000,99999); ?>" type="text/css">
    <link rel="stylesheet" href="/Public/Weixin/css/swiper-3.4.2.min.css" type="text/css">
	<header>
		<h3><?php echo ($data['name']); ?><span>· <?php echo ($data['trait']); ?></span></h3>
		<hr>

		<div>
			<img src="/Public<?php echo ($data['img_url']); ?>" alt="">
			<p class="yl">月利率&#12288;<span class="yl2">
                <?php if($is_auth == 1 ): echo ($data['admin_showcasing']); ?>%<?php endif; ?>
                <?php if($is_auth == 0 ): echo ($data['showcasing']); ?>%<?php endif; ?>
                <!--<?php echo ($data['min_interest']); ?>%-<?php echo ($data['max_interest']); ?>%-->
            </span></p>
			<p class="yl3"><?php echo ($data['min_money']); ?>万~<?php echo ($data['max_money']); ?>万&nbsp;<span>丨</span>&nbsp;最高<?php echo ($data['max_percentage']); ?>成&nbsp;</p>
		</div>
		<div class="line"></div>
	</header>
	<div id="content">
		<img src="/Public/Weixin/images/ico/wor.png" alt="">
		<h3>&#12288;贷款流程</h3>
		<div class="outer"><div class="inner">
            <?php if(is_array($obj)): $i = 0; $__LIST__ = $obj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i != 1): ?><div class="shortcut"></div><?php endif; ?>
			<p>
				<span><?php echo ($i); ?></span><br><br>
				<?php echo ($vo); ?>
			</p><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
		<p id="mask">
			<img src="/Public/Weixin/images/ico/Rectangle-left.png" alt="">
			<img src="/Public/Weixin/images/ico/Rectangle-right.png" alt="">
		</p>
	</div>	

	</div>
	<div class="line"></div>
	<div class="short">
		<ul>
			<li>产品介绍</li>
			<li>申请条件</li>
			<li>资费信息</li>
		</ul>
	</div>
	<div id="shade">
		<img src="/Public/Weixin/images/ico/shadow.png" alt="">
	</div>
	<div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
            	<div class="short_content">
					<div class="toggle">
						<p>房产类型</p>
                        <span>
                            <!-- <?php if(is_array($best)): $i = 0; $__LIST__ = $best;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["house"]); ?>&#12288;<?php endforeach; endif; else: echo "" ;endif; ?> -->
							<?php echo ($best); ?>
						</span>
						
						<hr>
					</div>
					<div class="toggle">
						<p>贷款金额</p><span><?php echo ($data['min_money']); ?>万-<?php echo ($data['max_money']); ?>万</span><hr>
						<span></span>
					</div>
					<div class="toggle">
						<p>贷款利率</p>
                        <span style="color:#dd132b;">
                            <?php if($is_auth == 1 ): echo ($data['admin_showcasing']); ?>%<?php endif; ?>
                            <?php if($is_auth == 0 ): echo ($data['showcasing']); ?>%<?php endif; ?>
                            <!--<?php echo ($data['min_interest']); ?>%-<?php echo ($data['max_interest']); ?>%-->
                        </span><hr>
						<span></span>
					</div>
					<div class="toggle">
						<p>贷款期限</p>
                        <span>
							<!-- <?php echo ($month); ?> -->
                           <?php if(is_array($month)): $i = 0; $__LIST__ = $month;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i != 1): ?>&nbsp;/&nbsp;<?php endif; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
                            个月
                        </span>
                        <hr>
						<span></span>
					</div>
					<div class="toggle">
						<p>抵押成数</p>
                        <span>
                        最高<span style="color:#dd132b;font-size:18px;padding:0 0.4rem;"><?php echo ($data['max_percentage']); ?></span>成
                        <!--详情见扩展页--></span>
                        <!--<img src="/Public/Weixin/images/ico/shou.png" alt="">--><hr>
						<!--<span class="con"><?php echo ($data['max_percentage']); ?></span>-->
					</div>
				</div>
			</div>
            <div class="swiper-slide">
            	<div class="short_content">
                    <?php if($count_type > 3): ?><div class="toggle down">
                            <p>抵押类型</p>
                            <span></span><img src="/Public/Weixin/images/ico/shou.png" alt=""><hr>
                        <span class="con">
                            <?php if(is_array($impawn_type)): $i = 0; $__LIST__ = $impawn_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i != 1): ?>&nbsp;、&nbsp;<?php endif; ?>
                                <?php if($vo == '0'): ?>不限<?php endif; ?>
                                <?php if($vo == '1'): ?>一抵<?php endif; ?>
                                <?php if($vo == '2'): ?>二抵<?php endif; ?>
                                <?php if($vo == '3'): ?>转单<?php endif; ?>
                                <?php if($vo == '4'): ?>C一抵<?php endif; ?>
                                <?php if($vo == '5'): ?>C二抵<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </span>
                        </div><?php endif; ?>
                    <?php if($count_type < 4): ?><div class="toggle">
                            <p>抵押类型</p>
                        <span>
                            <?php if(is_array($impawn_type)): $i = 0; $__LIST__ = $impawn_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($i != 1): ?>&nbsp;、&nbsp;<?php endif; ?>
                                <?php if($vo == '0'): ?>不限<?php endif; ?>
                                <?php if($vo == '1'): ?>一抵<?php endif; ?>
                                <?php if($vo == '2'): ?>二抵<?php endif; ?>
                                <?php if($vo == '3'): ?>转单<?php endif; ?>
                                <?php if($vo == '4'): ?>C一抵<?php endif; ?>
                                <?php if($vo == '5'): ?>C二抵<?php endif; endforeach; endif; else: echo "" ;endif; ?>
                        </span>
                            <hr>
                            <span></span>
                        </div><?php endif; ?>

					<div class="toggle">
                        <p>房产区域</p>
                        <span>
                            <?php echo ($ter); ?>
                        </span>
                        <hr>

						<!--<p>房产区域</p><span>全上海(崇明除外)</span><hr>-->
						<!--<span></span>-->
					</div>
					<div class="toggle">
						<p>房产要求</p><span><?php echo ($data['house_demand']); ?></span><hr>
						<span></span>
					</div>
					<div class="toggle <?php if($data['credit_request'] != ''): ?>down<?php endif; ?>">
						<p>征信要求</p><span></span><?php if($data['credit_request'] != ''): ?><img src="/Public/Weixin/images/ico/shou.png" alt=""><?php endif; ?><hr>
						<span class="con"><?php echo ($data['credit_request']); ?></span>
					</div>
					<div class="toggle">
						<p>手续材料</p><span><?php echo ($data['materials']); ?></span><hr>
						<span></span>
					</div>	
				</div>
			</div>
            <div class="swiper-slide">
            	<div class="short_content">
                    <?php if($str_len > 45): ?><div class="toggle down">
                            <p>放款方式</p>
                            <span></span><img src="/Public/Weixin/images/ico/shou.png" alt=""><hr>
                            <span class="con"><?php echo ($data['loan_pattern']); ?></span>
                        </div><?php endif; ?>
                    <?php if($str_len < 46): ?><div class="toggle">
                            <p>放款方式</p><span><?php echo ($data['loan_pattern']); ?></span><!--<img src="/Public/Weixin/images/ico/shou.png" alt="">--><hr>
                            <span class="con"></span>
                        </div><?php endif; ?>
					<div class="toggle down">
						<p>各项费用</p><span></span><img src="/Public/Weixin/images/ico/shou.png" alt=""><hr>
						<span class="con" style="text-indent:0px;width:78%;padding-left:18%;">
                            <?php if(is_array($cost)): $i = 0; $__LIST__ = $cost;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($i); ?>.&nbsp;<?php echo ($vo); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
                        </span>
					</div>
					<div class="toggle <?php if(!empty($data['interpretation'])): ?>down<?php endif; ?>">
						<p>备&#12288;&#12288;注</p><span class="kz"><?php if(!empty($data['interpretation'])): else: endif; ?></span>
                    <?php if(!empty($data['interpretation'])): ?><img src="/Public/Weixin/images/ico/shou.png" alt=""><?php endif; ?><hr>
						<span class="con"><?php echo ($data['interpretation']); ?></span>
					</div>
				</div>
			</div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
<?php echo ($id); ?>
		
	<footer>
		<button class="short">立即申请</button>
	</footer>

<script src="/Public/Weixin/js/swiper-3.4.2.min.js"></script>
<script>
	function resetPage(){  //移动端适配;
		var deviceWidth = document.documentElement.clientWidth;
		var scale = deviceWidth/640;
		if( deviceWidth>=640 ){
            document.documentElement.style.fontSize="100px";
		}else{
            document.documentElement.style.fontSize=25.6*scale+"px";
		};	
	};
	window.onload = function (){
		sign();
		resetPage();
		resetposition();
	};
	window.onresize = function (){
		sign();
		resetPage();
		resetposition();
	};
	function resetposition(){
		var oy=parseFloat($('header').css('height'))+parseFloat($('#content').css('height'))+parseFloat($('.line').css('height'));
		$('.swiper-container').css('top',oy+'px');
	};
	function sign(){
		for(var i=0;i<$('.swiper-pagination-bullet').length;i++){
			$('.swiper-pagination-bullet').eq(i).attr('index',i);
		}
	}
	var swiper = new Swiper('.swiper-container',{pagination : '.swiper-pagination',paginationElement : 'li',paginationClickable :true,
		onTouchEnd:function(swiper){
			setTimeout(function(){
				var index=$('.swiper-pagination').find('.swiper-pagination-bullet-active').attr('index');
				$('.short li').css({'color':'#333','border-color':'#eee'});
				$('.short li').eq(index).css({'color':'#CDAF7D','border-color':'#CDAF7D'});
			},200)
				
		}
	});

	var url_step="<?php echo U('Apply/product_step',array('id'=>$data['id']));?>";
	var info_url="<?php echo U('Apiwechat/productinfo',array('id'=>$id));?>"

</script>
<script src="/Public/Weixin/js/pro_i.js?<?php echo rand(10000,99999); ?>"></script>










</body>
</html>