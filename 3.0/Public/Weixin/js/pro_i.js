
$('.inner').on('touchstart',function(ev){
	var deviceWidth = document.documentElement.clientWidth;
	var oev=ev||window.event;
	var ow=parseFloat($(this).css('width'));
	var ox=oev.originalEvent.changedTouches[0].clientX;
	var oleft=parseFloat($('.inner').css('left'));
	$('.inner').on('touchmove',function(ev){
		var Ev=ev||window.event;
		var nx=Ev.originalEvent.changedTouches[0].clientX;
		var movelength=(nx-ox)/deviceWidth*ow;
		$('.inner').css('left',oleft+movelength+'px');
		if(parseFloat($('.inner').css('left'))>0){
			$('.inner').css('left','0px');
		}
		if(parseFloat($('.inner').css('left'))<-(ow-deviceWidth)){
			$('.inner').css('left',deviceWidth-ow+'px')
		};
		$('.inner').on('touchend',function(){
			$('.inner').on('touchmove',function(){

			})
		})
	})
});

$('.swiper-pagination-bullet').click(function(){
	var index=$(this).attr('index');
	$('.short li').css({'color':'#666','border-bottom':'2px solid #eee'});
	$('.short li').eq(index).css({'color':'#CDAF7D','border-bottom':'2px solid #cdaf7d'});
})
$('button').click(function(){
	window.location.href=url_step;
});
(function(){
	if($('.inner').width()<$('body').width()*0.92){
		var extra=($('body').width()*0.92-$('.inner').width())/($('.inner p').length-1);
		$('.shortcut').width($('.shortcut').width()+extra);
	};
	$('.toggle span').each(function(){
		if($(this).attr('class')=="con"){

		}else{
			if(($(this).width()+$(this).parent().find('p').width())>$(this).parent().width()){
				$(this).parent().addClass('down');
				var text=$(this).text();
				$(this).text('');
				var oimg=document.createElement('img');
				var ospan=document.createElement('span');
				$(oimg).css('transform','rotateZ(0deg)');
				$(oimg).attr('src','/Public/Weixin/images/ico/shou.png');
				$(this).after(oimg);
				$(ospan).addClass('con');
				$(ospan).text(text);
				$(this).parent().find('hr').after(ospan);
			}
		}
	})
})();
$('.down').on('click',function(){
	var rm=parseFloat(document.documentElement.style.fontSize);
	var gm=parseFloat($(this).css('height'));
	if(gm/rm<5){
		$(this).css('height','auto');
		$(this).children('img').css('transform','rotateZ(180deg)');
		var a=$('.swiper-slide-active').offset().top-$(window).scrollTop()+$('.swiper-slide-active').height()+4.2*rm;
		console.log(a-$(window).height());
		if(a>$(window).height()){
			var st=$('.swiper-slide-active').offset().top+$('.swiper-slide-active').height()+4.2*rm-$(window).height();
			//var st=$('footer').height()+$('.swiper-container').height()+$('#shade').height()+$('.short').height()+$('.line').height()+$('#content').height()+$('header').height()-$('body').height()+rm;
			if(st<0){
				st=0;
			};
			$(window).scrollTop(st);
		}
	}else{
		$(this).css('height','3.5rem');
		$(this).children('img').css('transform','rotateZ(0deg)');
	}
});
