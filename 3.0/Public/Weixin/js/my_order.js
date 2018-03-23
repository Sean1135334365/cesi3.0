$('header li').click(function(){
    $('header li').css({'color':'#666','border-color':'#eee'});
    $(this).css({'color':'#cdaf7d','border-color':'#dfc190'});
    $('.contairner').hide();
    var index=$(this).attr('value');
    console.log(index)
    $('.contairner').eq(index).show();
})