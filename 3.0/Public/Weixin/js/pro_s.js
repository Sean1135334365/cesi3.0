
$('.condition>ul>li').click(function() {
    $('#gps').css('width','0px');
    $('.noopsyche').css('display','none');
    var eul = $(this).children("ul").css('display');
    if (eul == 'none') {
        $('.condition>ul>li>ul').css('display', 'none');
        $(this).children("ul").css('display', 'block');
        $('.shade').css('display','block');
    }if(eul=='block'){
        $('.condition>ul>li>ul').css('display', 'none');
        $(this).children("ul").css('display', 'none');
        $('.shade').css('display','none');
    }
});
$('#condition>ul>li').click(function() {
    $('#gps').css('width','0px');
    var eul = $(this).children("ul").css('display');
    if (eul == 'none') {
        $('#condition>ul>li>div').css('color','#333');
    }if(eul=='block'){
        $('#condition>ul>li>div').css('color','#dfc190');
    }
});
$('.condition>ul>li>ul').click(function(e){
    window.event? window.event.cancelBubble = true : e.stopPropagation();
})
$('.condition>ul>li>ul>li').click(function(e){
    window.event? window.event.cancelBubble = true : e.stopPropagation();
})
$('input[type="radio"]').click(function() {
    var name = $(this).attr('name');
    $('input[name="' + name + '"]').parent().css('background-color', '#f3f3f3');
    $('input[name="' + name + '"]').parent().css('color', '#333');
    $(this).parent().css('background-color', '#dfc190');
    $(this).parent().css('color', '#fff');
});

//重置
$('#reset').click(function() {
    $('input[type="radio"][name="patterns"][value="0"]').attr('checked', 'true');
    $('input[type="radio"][name="mortgage"][value="0"]').attr('checked', 'true');
    $('input[type="radio"][name="age"][value="0"]').attr('checked', 'true');
    window.event? window.event.cancelBubble = true : e.stopPropagation();
    $('.noopsyche input[type="radio"]').parent().css('background-color', '#f3f3f3');
    $('.noopsyche input[type="radio"]').parent().css('color', '#333');
    $('.noopsyche input[type="radio"][value=""]').parent().css('background-color', '#dfc190');
    $('.noopsyche input[type="radio"][value=""]').parent().css('color', '#fff');


});
$('.choice').on('change',function(){
    $('.choice li').unbind();
    $('#confirm').unbind();
    addclick();
})
function addclick(){
    $('.choice li').click(function(e) {
    $('.shade').css('display','none');
    var li = $(this);
    var ul = li.parent();
    window.event? window.event.cancelBubble = true : e.stopPropagation();
    var litext = li.html();
    var linum=li.attr('val');
    $('.choice li').css('color','#333');
    $(this).css('color','#CDAF7D');
    ul.parent().find('span').attr('val',linum);
    ul.parent().find('span').css('color','#CDAF7D');
    var span = ul.prev();
    var typ = ul.attr('typ');
    var val = li.attr('val');
    var city = $('#city').attr('val');
    var higher_up = $('#city').attr('higherUp');
    var form_data='"'+$('.choice').eq(0).attr('typ')+'":"'+$('.choice').eq(0).parent().find('span').attr('val')+'","'+$('.choice').eq(1).attr('typ')+'":"'+$('.choice').eq(1).parent().find('span').attr('val')+'","'+$('.choice').eq(2).attr('typ')+'":"'+$('.choice').eq(2).parent().find('span').attr('val')+'","patterns":"'+$('#filter').attr('patterns')+'","mortgage":"'+$('#filter').attr('mortgage')+'"';
    


    form_data='{'+form_data+'}';
    $('.list').html('');

    $.post(choice_up,{data:form_data,city:city,higher_up:higher_up,banks:$('.bank').attr('banks')},function(data){
        if(data.result.length=="0"){
            var op=document.createElement('p');
            $(op).html('暂无备选数据...');
            $(op).css({'color':'#999','text-align':'center','margin':'1.2rem auto 0'});
            $('.list').append(op);
        }
        if(data.status == 1){
            for(var i=0;i<data.result.length;i++){
                var odiv=$('.product_list').eq(0).clone();
                var msg=data.result[i];
                $(odiv).css('display','block');
                $(odiv).find('a').attr('href',msg.url_str);
                $(odiv).find('.list_top span').html('<strong>'+msg.name+'</strong>- '+msg.trait);
                //$(odiv).find('.f14 span').text(msg.min_interest+'%-'+msg.max_interest+'%');
                if(data.is_auth == 0&&msg.admin_showcasing != ''){
                    $(odiv).find('.f14 span').text(msg.admin_showcasing+'%');
                }else if(data.is_auth == 1&&msg.showcasing != ''){
                    $(odiv).find('.f14 span').text(msg.showcasing+'%');
                    
                }else{
                    $(odiv).find('.f14 span').text('');
                }
                $(odiv).find('span.left').eq(0).text(msg.min_money+'万-'+msg.max_money+'万');
                $(odiv).find('span.left').eq(1).text(msg.max_percentage+'成');
                $(odiv).find('#address span').text(msg.loan_pattern);
                $(odiv).find('#mold span').text(msg.house_name[0].house);
                $(odiv).find('.product_list_left img').attr('src',public+msg.img_url);
                $(odiv).find('.product_list_down p').text(msg.interpretation);
                $('.list').append(odiv);
            }
        }else{
        }
    },'json');
    $('.condition>ul>li>ul').css({'display':'none'});
});
$('input:radio[name="patterns"]').on('click',function(){
    $('.clearfix').eq(0).attr('patterns',$('input:radio[name="patterns"]:checked').val());
})
$('input:radio[name="mortgage"]').on('click',function(){
    $('.clearfix').eq(0).attr('mortgage',$('input:radio[name="mortgage"]:checked').val());
})
$('input:radio[name="age"]').on('click',function(){
    $('.clearfix').eq(0).attr('age',$('input:radio[name="age"]:checked').val());
})
}
$('#confirm').on('click',function(){
    window.event? window.event.cancelBubble = true : e.stopPropagation();
    $('.noopsyche').css('display','none');
    $('#condition>ul>li>div').css('color','#333');
    $('.shade').css('display','none');
    var city = $('#city').attr('val');
    var higher_up = $('#city').attr('higherUp');
    var form_data='"'+$('.choice').eq(0).attr('typ')+'":"'+$('.choice').eq(0).parent().find('span').attr('val')+'","'+$('.choice').eq(1).attr('typ')+'":"'+$('.choice').eq(1).parent().find('span').attr('val')+'","'+$('.choice').eq(2).attr('typ')+'":"'+$('.choice').eq(2).parent().find('span').attr('val')+'","patterns":"'+$('#filter').attr('patterns')+'","mortgage":"'+$('#filter').attr('mortgage')+'"';
    

    form_data='{'+form_data+'}';
    $('.list').html('');

    $.post(choice_up,{data:form_data,city:city,higher_up:higher_up,banks:$('.bank').attr('banks')},function(data){
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
$('.location').click(function(){
    $('.noopsyche').css('display','none');
    $('#condition>ul>li>div').css('color','#333');
    $('.choice').css('display','none');
    window.event? window.event.cancelBubble = true : e.stopPropagation();
    var deviceWidth = document.documentElement.clientWidth;
    $('#gps').css('width',deviceWidth+"px");
    $('.shade').css('display','block');
})
function setmsg(data1,city,ID){//遍历展现筛选的选项
    $('.choice li').unbind();
    $('#city').text(city);
    $('#city').attr('val',ID);
    sessionStorage.setItem('territory_id',ID);
        if(data1.status==1){
            var house_msg=data1.result.house_type;
        $('.choice[typ="house"]').html('<li val="">不限</li>');
            for(var k=0;k<house_msg.length;k++){
                var ali=document.createElement('li');
                $(ali).html(house_msg[k].name);
                $(ali).attr('val',house_msg[k].id);
                $('.choice[typ="house"]').append(ali);
            };
            addclick();
        }else{
            
        }
    }
    $('.shade').unbind('touchMove');
    $('.shade').click(function(){
    $('#condition>ul>li>div').css('color','#333');
    $('#gps').css('width','0px');
    $('.noopsyche').css('display','none');
    $('.choice').css('display','none');
    $('.shade').css('display','none');
    });
    function setlocal(data){//遍历写出二级菜单
    var city_list=data.citylist;
    for(var i=0;i<city_list.length;i++){
        var oli=document.createElement('li');
        $(oli).text(city_list[i].name);
        $(oli).attr({'id':city_list[i].id,'index':i});
        $('.gps_1').append(oli);
        var msg=city_list[i].dow;
        var index=i;
        setcity(msg,index);  
    }
    };

    function setcity(data,num){//给二级菜单按钮添加事件功能
    if(data==""){
        $('.gps_1>li').eq(num).on('click',function(){
        $('.gps_2').html('');
        $('.gps_1>li').css({'background-color':'#f5f5f5','color':'#333'});
        $(this).css({'background-color':'#fff','color':'#cdaf7d'});
        var ali=document.createElement('li');
        $(ali).text($('.gps_1>li').eq(num).text());
        $(ali).attr({'id':$('.gps_1>li').eq(num).attr('id')});
        $('.gps_2').append(ali);
        })
    }else{
        $('.gps_1>li').eq(num).on('click',function(){
        $('.gps_2').html('');
        $('.gps_1>li').css({'background-color':'#f5f5f5','color':'#333'});
        $(this).css({'background-color':'#fff','color':'#cdaf7d'});
        for(var k=0;k<data.length;k++){
            var oli=document.createElement('li');
            $(oli).text(data[k].name);
            $(oli).attr({'id':data[k].id});
            $('.gps_2').append(oli);
        }
        })
    };
    };

    function setItem(data){//创建产品
    for(var i=0;i<data.result.length;i++){
        var odiv=$('.product_list').eq(0).clone();
        var msg=data.result[i];
        $(odiv).css('display','block');
        $(odiv).find('a').attr('href',msg.url_str);
        $(odiv).find('.list_top span').html('<strong>'+msg.name+'</strong>- '+msg.trait);
        if(data.is_auth == 0&&msg.admin_showcasing != ''){
            $(odiv).find('.f14 span').text(msg.admin_showcasing+'%');
        }else if(data.is_auth == 1&&msg.showcasing != ''){
            $(odiv).find('.f14 span').text(msg.showcasing+'%');
            
        }else{
            $(odiv).find('.f14 span').text('');
        }
        $(odiv).find('span.left').eq(0).text(msg.min_money+'万-'+msg.max_money+'万');
        $(odiv).find('span.left').eq(1).text(msg.max_percentage+'成');
        $(odiv).find('#address span').text(msg.loan_pattern);
        $(odiv).find('#mold span').text(msg.house_name[0].house);
        $(odiv).find('.product_list_left img').attr('src',public+msg.img_url);
        $(odiv).find('.product_list_down p').text(msg.interpretation);
        $('.list').append(odiv);  
    }
    
}