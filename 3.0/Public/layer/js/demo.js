/*! layer demo */

;!function(){

var gather = {
  htdy: $('html, body')
};

/*//全局配置
layer.config({
  extend: 'moon/style.css'
});

//在线调试
var debug = $('#L_layerDebug'), popDebug = function(){
  var othis = $(this), top = $(window).scrollTop();
  layer.open({
    type: 1
    ,title: '在线调试'
    ,moveType: 1
    ,id: 'Lay_layer_debug'
    ,content: $('.runtest')
    ,shade: false
    ,resize: false
    ,fixed: false
    ,maxWidth: '100%'
    ,offset: [
      (othis.offset().top - top + 50) + 'px'
      ,(othis.offset().left - 300) + 'px'
    ]
    ,success: function(layero, index){
      layer.style(index, {
        marginLeft: -210
      });
    }
  });
  testmain.focus();
};
debug.on('click', popDebug);

//在textarea焦点处插入字符
var focusInsert = function(str){
  var start = this.selectionStart
  ,end = this.selectionEnd
  ,offset = start + str.length

  this.value = this.value.substring(0, start) + str + this.value.substring(end);
  this.setSelectionRange(offset, offset);
};

//演示页面
$('body').on('keydown', '.site-demo-text', function(e){
  var key = e.keyCode;
  if(key === 9 && window.getSelection){
    e.preventDefault();
    focusInsert.call(this, '  ');
  }
});*/

//一睹为快
gather.demo1 = $('#demo1');
$('#setUp').on('click', function(){
  var othis = $(this), index = othis.index();
  
  //默认prompt
  layer.prompt({title: '设置每页显示数据条数'}, function(val, index){
	  	layer.msg('每页显示 '+val+' 条数据');
        layer.close(index);
  });
  
  /*switch(index){
    case 0:
      var icon = -1;
      (function changeIcon(){
        var index = layer.alert('Hi，你好！ 点击确认更换图标', {
          icon: icon,
          shadeClose: true,
          title: icon === -1 ? '初体验 - layer '+layer.v : 'icon：'+icon + ' - layer '+layer.v
        }, changeIcon);
        if(8 === ++icon) layer.close(index);
      }());
    break;
    case 1:
      var icon = 0;
      (function changeIcon1(){
        var index = layer.alert('点击确认更换图标', {
          icon: icon,
          shadeClose: true,
          skin: 'layer-ext-moon',
          title: icon === -1 ? '第三方扩展皮肤' : 'icon：'+icon
        }, changeIcon1);
        if(9 === ++icon) {
          layer.confirm('怎么样，是否很喜欢该皮肤，去下载？', {
            skin: 'layer-ext-moon'
          }, function(index, layero){
            layero.find('.layui-layer-btn0').attr({
              href: 'http://layer.layui.com/skin.html',
              target: '_blank'
            });
            layer.close(index);
          });
        };
      }());
    break;
    
    case 2:
      //询问框
      layer.confirm('您是如何看待前端开发？', {
        btn: ['重要','奇葩'] //按钮
      }, function(){
        layer.msg('的确很重要', {icon: 1});
      }, function(){
        layer.msg('也可以这样', {
          time: 20000, //20s后自动关闭
          btn: ['明白了', '知道了']
        });
      });
    break;
    
    case 3:
      //提示层
      layer.msg('玩命提示中');
    break;
    
    case 4:
      //墨绿深蓝风
      layer.alert('墨绿风格，点击确认看深蓝', {
        skin: 'layui-layer-molv' //样式类名
        ,closeBtn: 0
      }, function(){
        layer.alert('偶吧深蓝style', {
          skin: 'layui-layer-lan'
          ,closeBtn: 0
          ,anim: 4 //动画类型
        });
      });
    break;
   
    case 5:
      //捕获页
      layer.open({
        type: 1,
        shade: false,
        title: false, //不显示标题
        content: $('.layer_notice'), //捕获的元素
        cancel: function(){
          layer.msg('捕获就是从页面已经存在的元素上，包裹layer的结构', {time: 5000, icon:6});
        }
      });
    break;
    
    case 6:
      //页面层
      layer.open({
        type: 1,
        skin: 'layui-layer-rim', //加上边框
        area: ['420px', '240px'], //宽高
        content: '<div style="padding: 10px;">任意html内容</div>'
      });
    break;
    
    case 7:
      layer.open({
        type: 1,
        skin: 'layui-layer-demo',
        closeBtn: false,
        area: '350px',
        anim: 2,
        shadeClose: true,
        content: '<div style="padding:20px;">即传入skin:"样式名"，然后你就可以为所欲为了。<br>你怎么样给她整容都行<br><br><br>我是华丽的酱油==。</div>'
      });
    break;
    
    case 8:
      layer.tips('Hi，我是tips', this);
    break;
    
    case 9:
      //iframe层
      layer.open({
        type: 2,
        title: 'layer mobile页',
        shadeClose: true,
        shade: 0.8,
        area: ['380px', '90%'],
        content: 'mobile/' //iframe的url
      }); 
    break;
    
    case 10:
      //iframe窗
      layer.open({
        type: 2,
        title: false,
        closeBtn: 0, //不显示关闭按钮
        shade: [0],
        area: ['340px', '215px'],
        offset: 'rb', //右下角弹出
        time: 2000, //2秒后自动关闭
        anim: 2,
        content: ['test/guodu.html', 'no'], //iframe的url，no代表不显示滚动条
        end: function(){ //此处用于演示
          layer.open({
            type: 2,
            title: '很多时候，我们想最大化看，比如像这个页面。',
            shadeClose: true,
            shade: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['893px', '600px'],
            content: '//fly.layui.com/'
          });
        }
      });
    break;
    
    case 11:
      var ii = layer.load(0, {shade: false});
      setTimeout(function(){
        layer.close(ii)
      }, 5000);
    break;
    case 12:
      var iii = layer.load(1, {
        shade: [0.1,'#fff']
      });
      setTimeout(function(){
        layer.close(iii)
      }, 3000);
    break;
    case 13:
      layer.tips('我是另外一个tips，只不过我长得跟之前那位稍有些不一样。', this, {
        tips: [1, '#3595CC'],
        time: 4000
      });
    break;
    case 14:
      layer.prompt({title: '输入任何口令，并确认', formType: 1}, function(pass, index){
        layer.close(index);
        layer.prompt({title: '随便写点啥，并确认', formType: 2}, function(text, index){
          layer.close(index);
          layer.msg('演示完毕！您的口令：'+ pass +'<br>您最后写下了：'+text);
        });
      });
    break;
    case 15:
      layer.tab({
        area: ['600px', '300px'],
        tab: [{
          title: '无题', 
          content: '<div style="padding:20px; line-height:30px; text-align:center">欢迎体验layer.tab<br>此时此刻不禁让人吟诗一首：<br>一入前端深似海<br>从此妹纸是浮云<br>以下省略七个字<br>。。。。。。。<br>——贤心</div>'
        }, {
          title: 'TAB2', 
          content: '<div style="padding:20px;">TAB2该说些啥</div>'
        }, {
          title: 'TAB3', 
          content: '<div style="padding:20px;">有一种坚持叫：layer</div>'
        }]
      });
    break;
    case 16:
      if(gather.photoJSON){
        layer.photos({
          photos: gather.photoJSON
        });
      } else {
        $.getJSON('test/photos.json?v='+new Date, {}, function(json){
          gather.photoJSON = json;
          layer.photos({
            photos: json
          });
        });
      }
    break;
    default:
     layer.msg('Hi!');
    break;
  }
  
  //定位到对应的
  var p = gather.demo1.find('p').eq(index);
  var top = p.parent().position().top;
  var ol = gather.demo1.find('.layui-code-ol');
  
  gather.demo1.find('.layui-code-ol').animate({
    scrollTop: ol.scrollTop() + top
  }, 0);*/
});

//一往而深
/*$('#demore').on('click', function(){
  gather.htdy.animate({scrollTop : $('#yiwang').offset().top}, 200);
});*/
gather.demo2 = $('#demo2');
$('.layer-demolist').on('click', function(){
  var othis = $(this), index = othis.index('.layer-demolist');
  
  /*var winW = window.screen.width ;
  var winH = window.screen.height ;
  var layerW = winW/5*4;
  var layerH = winH/5*4;
  console.log(winW);
  console.log(winH);
  console.log(layerW);
  console.log(layerH);*/
  
  //页面层-自定义
  layer.open({
	type: 1,
	title: '控制实时',
	closeBtn: 1,
	shadeClose: true,
	maxmin: true, //允许全屏最小化
	/*skin: 'yourclass',
	content: '自定义HTML内容'*/	
	skin: 'layui-layer-rim', //加上边框
	area: ['auto','auto'], //宽高
	content: $(this).next()	  
  });
  
  
  /*switch(index){
    case 0:
      //信息框-例1
      layer.alert('见到你真的很高兴', {icon: 6});
    break;
    case 1:
      //信息框-例2
      layer.msg('你确定你很帅么？', {
        time: 0 //不自动关闭
        ,btn: ['必须啊', '丑到爆']
        ,yes: function(index){
          layer.close(index);
          layer.msg('雅蠛蝶 O.o', {
            icon: 6
            ,time: 0
            ,btn: ['嗷','嗷','嗷']
          });
        }
      });
    break;
    case 2:
      //信息框-例3
      layer.msg('这是最常用的吧');
    break;
    case 3:
      //信息框-例4
      layer.msg('不开心。。', {icon: 5});

    break;
    case 4:
      //信息框-例5
      layer.msg('玩命卖萌中', function(){
      //关闭后的操作
      });
    break;
    case 5:
      //页面层-自定义
      layer.open({
        type: 1,
        title: false,
        closeBtn: 0,
        shadeClose: true,
        skin: 'yourclass',
        content: '自定义HTML内容'
      });
    break;
    case 6:
      //页面层-佟丽娅
      layer.open({
        type: 1,
        title: false,
        closeBtn: 0,
        area: '516px',
        skin: 'layui-layer-nobg', //没有背景色
        shadeClose: true,
        content: $('#tong')
      });
    break;
    case 7:
      //iframe层-父子操作
      layer.open({
        type: 2,
        area: ['700px', '530px'],
        fixed: false, //不固定
        maxmin: true,
        content: 'test/iframe.html'
      });
    break;
    case 8:
      //iframe层-多媒体
      layer.open({
        type: 2,
        title: false,
        area: ['630px', '360px'],
        shade: 0.8,
        closeBtn: 0,
        shadeClose: true,
        content: '//player.youku.com/embed/XMjY3MzgzODg0'
      });
      layer.msg('点击任意处关闭');
    break;
    case 9:
      //iframe层-禁滚动条
      layer.open({
        type: 2,
        area: ['360px', '500px'],
        skin: 'layui-layer-rim', //加上边框
        content: ['mobile/', 'no']
      });
    break;
    case 10:
      //加载层-默认风格
      layer.load();
      //此处演示关闭
      setTimeout(function(){
        layer.closeAll('loading');
      }, 2000);
    break;
    case 11:
      //加载层-风格2
      layer.load(1);
      //此处演示关闭
      setTimeout(function(){
        layer.closeAll('loading');
      }, 2000);
    break;
    case 12:
      //加载层-风格3
      layer.load(2);
      //此处演示关闭
      setTimeout(function(){
        layer.closeAll('loading');
      }, 2000);
    break;
    case 13:
      //加载层-风格4
      layer.msg('加载中', {
        icon: 16
        ,shade: 0.01
      });
    break;
    case 14:
      //打酱油
      layer.msg('尼玛，打个酱油', {icon: 4});
    break;
    case 15:
      layer.tips('上', this, {
        tips: [1, '#000']
      });
    break;
    case 16:
      layer.tips('默认就是向右的', this);
    break;
    case 17:
      layer.tips('下', this, {
        tips: 3
      });
    break;
    case 18:
      layer.tips('在很久很久以前，在很久很久以前，在很久很久以前……', this, {
        tips: [4, '#78BA32']
      });
    break;
    case 19:
      layer.tips('不会销毁之前的', this, {tipsMore: true});
    break;
    case 20:
      //默认prompt
      layer.prompt(function(val, index){
        layer.msg('得到了'+val);
        layer.close(index);
      });
    break;
    case 21:
      //屏蔽浏览器滚动条
      layer.open({
        content: '浏览器滚动条已锁',
        scrollbar: false
      });
    break;
    case 22:
      //弹出即全屏
      var index = layer.open({
        type: 2,
        content: 'http://layim.layui.com',
        area: ['320px', '195px'],
        maxmin: true
      });
      layer.full(index);
    break;
    case 23:
      //正上方
      layer.msg('灵活运用offset', {
        offset: 't',
        anim: 6
      });
    break;
    default:
      layer.msg('Hi!');
    break;
  }
  
  //定位到对应的
  var p = gather.demo2.find('p').eq(index);
  var top = p.parent().position().top;
  var ol = gather.demo2.find('.layui-code-ol');
  
  gather.demo2.find('.layui-code-ol').animate({
    scrollTop: ol.scrollTop() + top
  }, 0);*/
});

/*//异步请求
gather.downs = $('#downs');
gather.downs [0] && function(){
  
  //获取下载数
  $.get('//fly.layui.com/api/handle?id=1&type=find', function(res){
    gather.downs.html(res.number);
  }, 'jsonp');

  
  //获取并记录关注次数
  $.get('//fly.layui.com/api/handle?id=3', function(res){
    $('#sees').html(res.number);
  }, 'jsonp');
}();

//记录下载
$('.layer_down').on('click',function(){
  $.get('//fly.layui.com/api/handle?id=1', function(){},'jsonp');
});

//API页
gather.api = $('.layer-api');
gather.apiRun = $('.layer-api-run');
(function(){
  var lis = gather.api.find('li'), slecked = 'layer-api-slecked';
  lis.on('click', function(){
    lis.removeClass(slecked);
    $(this).addClass(slecked);
  });
  gather.api.find('h2').on('click', function(){
    var othis = $(this), i = othis.find('.layer-api-ico');
    if(i.hasClass('icon-shousuo')){
      i.addClass('icon-zhankai').removeClass('icon-shousuo');
      othis.next().hide();
      
    } else {
      i.addClass('icon-shousuo').removeClass('icon-zhankai');
      othis.next().show();
    }
  });
  layer.ready(function(){
    layer.photos({
      photos: '#layer-photos-demo'
    });
  });
}());

gather.skin = function(){
  var index = layer.open({
    type: 1,
    title: 'layer皮肤制作说明',
    skin: 'layer-ext-moon',
    area: '888px',
    content: $('#skinFabu'),
    shadeClose: true,
    btn: ['不大明白', '我知道了'],
    yes: function(){
      layer.confirm('OMG，是我的文档写的太烂了吗？好吧，是否去看看别人是如何制作的？', {
        icon: 8
      }, function(){
        location.href = 'http://layer.seaning.com';
      }, function(){
        layer.closeAll();
      });
    }
  });
  layer.full(index);
}

//发布皮肤
gather.pub = $('#skinPublish');
gather.pub.on('click', gather.skin);
if(gather.pub[0] && location.hash === '#publish'){
  layer.ready(function(){
    gather.skin();
  });
}

//窗口scroll
(function(){
  var conf = {};
  conf.log = 0;
  $(window).on('scroll', function(){
    var stop = $(window).scrollTop();
    if(stop >= 60){
      if(!conf.log){
        conf.log = 1;
        gather.api.addClass('layer-api-fix');
        gather.apiRun.css('top', 0);
      }
    } else {
      if(conf.log){
        conf.log = 0;
        gather.api.removeClass('layer-api-fix');
        gather.apiRun.css('top', '60px');
      }
    }
    stop = null;
  });
}());

//ie6
if(!-[1,] && !window.XMLHttpRequest){
  layer.ready(function(){
    layer.alert('如果您是用ietest的ie6模式，发现弹出背景一片黑色时，请不用惊慌，这并非layer未作兼容，而是你当前版本的ietest所模拟的ie6环境未对滤镜做支持，标准ie6将不会有此问题，所以请您不要担心。');
  });
}

gather.getDate = function(time){ 
  return new Date(parseInt(time)).toLocaleString() 
};


window.paysentsin = function(){
  return layer.photos({
    photos: {
      "title": ""
      ,"data": [
        {
          "alt": "layer友情打赏",
          "pid": 666, //图片id
          "src": "//res.layui.com/images/pay/layer.jpg", //原图地址
          "thumb": "" //缩略图地址
        }
      ]
    }
  });
};


//公告层
layer.ready(function(){
  var local = layui.data('layer');
  return false;
  //&& new Date().getTime() - local.layim_notice < 86400000
  if(local.layim_notice){
    return;
  };
  
  layer.open({
    type: 1
    ,title: false
    ,closeBtn: false
    ,area: '380px;'
    ,shade: 0
    ,resize: false
    ,offset: 'b'
    ,anim: 2
    ,content: '<div id="LAY_layuipro" style="padding: 30px; line-height: 22px; background: #393D49; color: #1ABCAC; font-weight: 300;">随着layui体系维护成本的不断提升，我们却不得不重新硬着头皮宣传我们目前唯一的物质支撑：LayIM <br><br>也许你对它并无兴趣，或者厌恶任何关于付费的字眼，但我们还找不到更好的模式，只能暂时靠LayIM苟且维持。此窗如有打搅，还请谅解。</div>'
    ,btn: ['捐赠 LayIM', '残忍无视']
    ,move: '#LAY_layuipro'
    ,moveType: 1
    ,success: function(layero){
      var btn = layero.find('.layui-layer-btn');
      btn.css('text-align', 'center');
      btn.find('.layui-layer-btn0').attr({
        href: 'http://layim.layui.com?form=layer_notice'
        ,target: '_blank'
      });
    }
    ,end: function(){
      layui.data('layer', {
        key: 'layim_notice'
        ,value: new Date().getTime()
      })
    }
  });
  
});


layui.use(['util', 'code', 'element'], function(){
  var util = layui.util, layim = layui.layim;
  
  //固定块
  util.fixbar({
    bar1: true
    ,click: function(type){
      if(type === 'bar1'){
        location.href = 'http://fly.layui.com/';
      }
    }
  });
  
  //代码修饰器
  layui.code();
  
});*/
  
}();