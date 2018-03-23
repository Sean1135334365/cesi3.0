<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>

  <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/bootstrap-responsive.css" />
  <link rel="stylesheet" type="text/css" href="/Public/Admin/Css/style.css" />
  <script type="text/javascript" src="/Public/Admin/Js/jquery.js"></script>
  <!--<script type="text/javascript" src="/Public/Admin/Js/jquery.sorted.js"></script>-->
  <script type="text/javascript" src="/Public/Admin/Js/bootstrap.js"></script>
  <script type="text/javascript" src="/Public/Admin/Js/ckform.js"></script>
  <script type="text/javascript" src="/Public/Admin/Js/common.js"></script>

  <style type="text/css">
    body {
      padding-bottom: 40px;
    }
    .sidebar-nav {
      padding: 9px 0;
    }

    @media (max-width: 980px) {
      /* Enable use of floated navbar text */
      .navbar-text.pull-right {
        float: none;
        padding-left: 5px;
        padding-right: 5px;
      }
    }
  </style>

</head>
<body>
<style>
    body{
        width: 96%;
        padding-top: 20px;
        margin: 0 auto;
        -moz-user-select:none;/*火狐*/

        -webkit-user-select:none;/*webkit浏览器*/

        -ms-user-select:none;/*IE10*/

        -khtml-user-select:none;/*早期浏览器*/

        user-select:none;
    }
    ::-webkit-scrollbar {
        width: 4px;
        height: 0px;
    }
    ::-webkit-scrollbar-track {
        background:#e6e6e6;
        opacity:0.7;
        -webkit-box-shadow:rgba(50,50,50,0.3);
        border-radius:10px;
    }
    ::-webkit-scrollbar-thumb {
        border-radius:3px;
        background:rgba(68,182,174,0.3);
        -webkit-box-shadow:rgba(68,182,174,0.5);
    }
    ::-webkit-scrollbar-thumb:window-inactive {
        background-color:#e6e6e6;
    }
    ::-webkit-scrollbar-track-piece{
        background:#e6e6e6;
        opacity:0.5;
        -webkit-box-shadow:rgba(50,50,50,0.5);
        border-radius:3px;
    }
    .table th{
        background-color: #fff;
    }
    tr,td{
        vertical-align: middle!important;
    }
    .table-bordered{
        border-left:1px solid #ddd;
    }
    #item{
        color: #979797;
    }
    #item>th{
        color: #d0d0d0;
    }
    .table_left{
        width: 60%;
        float: left;
    }
    .table_right{
        float: right;
        width: 36%;
    }
    .table_left tbody{
        height:65vh;
        overflow-y: auto;
    }
    .table_right tbody{
        height:45vh;
        overflow-y: auto;
    }
    .check{
        width: 14px;
        height: 14px;
        border:1px solid #979797;
        display: inline-block;
        vertical-align: sub;
        border-radius: 4px;
    }
    .search{
        text-align: left!important;
        color: #343434;
        font-size: 100%;
    }
    .search>p{
        display: inline-block;
    }
    .search>div{
        width: 27%;
        height: 24px;
        float: right;
        position: relative;
    }
    .search>div>svg{
        position: absolute;
        top: 2px;
        right: 5px;
    }
    table input{
        width: 94%;
        padding:0 3%!important;
    }
    .remove{
        font-size: 14px;
        padding: 2px 10px;
        border:1px solid #ff9fab;
        color:#ff9fab;
        position: absolute;
        top: 3px;
        right: 17px;
        border-radius: 4px;
        cursor: pointer;
    }
    .removeall{
        font-size: 14px;
        padding: 2px 10px;
        border:1px solid #ff9fab;
        color:#ff9fab;
        width: 10%;
        margin: 0 auto;
        border-radius: 4px;
        cursor: pointer;
    }
    table tbody {
        display:block!important;
        overflow-y: auto;
    }

    table thead tr, tbody tr {
        display:table!important;
        width:100%;
        table-layout:fixed;
    }
    .add{
        font-size: 14px;
        padding: 2px 10px;
        border:1px solid #0375bc;
        color:#fff;
        position: absolute;
        top: 14px;
        right: 17px;
        border-radius: 4px;
        background-color: #0375bc;
        cursor: pointer;
    }
    .addall{
        font-size: 14px;
        padding: 2px 10px;
        border:1px solid #0375bc;
        color:#fff;
        margin: 0 auto;
        width: 19%;
        border-radius: 4px;
        background-color: #0375bc;
        cursor: pointer;
    }
    .table_right .check{
        margin-top: 7px;
    }
    #addone{
        width: 36%;
        height: 20%;
        float: right;
        border: 1px solid #dedede;
        border-radius: 4px;
        box-sizing: border-box;
        padding: 1%;
        margin-bottom: 3%;
    }
    #addone>p{
        color: #343434;
        font-size: 100%;
        font-weight: 700;
        margin-bottom: 1.5vw;
    }
    #addone>input{
        height: 2vw;
    }
    #tj{
        font-size: 14px;
        padding: 2px 10px;
        border:1px solid #0375bc;
        color:#fff;
        border-radius: 4px;
        background-color: #0375bc;
        float: right;
        cursor: pointer;
    }
    .check_active{
        border:1px solid #0375bc;
        background-color: #0375bc;
    }
    .check>svg{
        transform: translateY(-3px);
        -webkit-transform: translateY(-3px);
    }
    nav{
        margin-bottom:2%;
    }
    nav>div{
        display: inline-block;
        margin-right:3%;
        width: 100px;
        height:10%;
        border-bottom:2px solid #eee;
        font-size: 16px;
        padding: 15px 0;
    }
</style>
<nav>
    <div>微信进件提醒</div>
    <div>微信客户反馈</div>
</nav>
<table class="table table-bordered table-hover tab_center table_left">
    <thead>
        <tr>
            <th colspan="6" class="search">
                <p>收件人</p>
                
                <div>
                    <input type="text">
                    <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 48.1 (47250) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Desktop-HD-Copy-4" transform="translate(-1015.000000, -176.000000)" fill="#0076C1">
                                <g id="search" transform="translate(1015.000000, 176.000000)">
                                    <path d="M12.502,6.491 L11.708,6.491 L11.432,6.765 C12.407,7.902 13,9.376 13,10.991 C13,14.581 10.09,17.491 6.5,17.491 C2.91,17.491 0,14.581 0,10.991 C0,7.401 2.91,4.491 6.5,4.491 C8.115,4.491 9.588,5.083 10.725,6.057 L11.001,5.783 L11.001,4.991 L15.999,0 L17.49,1.491 L12.502,6.491 L12.502,6.491 Z M6.5,6.491 C4.014,6.491 2,8.505 2,10.991 C2,13.476 4.014,15.491 6.5,15.491 C8.985,15.491 11,13.476 11,10.991 C11,8.505 8.985,6.491 6.5,6.491 L6.5,6.491 Z" id="Shape" transform="translate(8.745000, 8.745500) scale(1, -1) translate(-8.745000, -8.745500) "></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
            </th>
        </tr>
        <tr id="item">
            <th width='20%'><div class="check checkall">
                <svg width="11px" height="8px" viewBox="0 0 11 8" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 48.1 (47250) - http://www.bohemiancoding.com/sketch -->
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Desktop-HD-Copy-4" transform="translate(-319.000000, -342.000000)" stroke="#FFFFFF" stroke-width="2">
                            <polyline id="Path-2-Copy" points="320 344.666667 322.538462 348 329 343"></polyline>
                        </g>
                    </g>
                </svg>
            </div>&#12288;全选</th>
            <th width='20%'>用户姓名</th>
            <th style="padding-right:16%;position: relative;">邮箱地址</th>
        </tr>
    </thead>
    <tbody>
        <tr num='1'>
            <th>
                <div class="check check_active">
                    <svg width="11px" height="8px" viewBox="0 0 11 8" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 48.1 (47250) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Desktop-HD-Copy-4" transform="translate(-319.000000, -342.000000)" stroke="#FFFFFF" stroke-width="2">
                                <polyline id="Path-2-Copy" points="320 344.666667 322.538462 348 329 343"></polyline>
                            </g>
                        </g>
                    </svg>
                </div>
            </th>
            <th>牛萌萌</th>
            <th colspan="3" style="padding-right:16%;position: relative;">niumengmeng@zhiyujinrong.com<div class="remove" bol='true'>移除</div></th>
        </tr>
        <tr num='2'>
            <th>
                <div class="check">
                    <svg width="11px" height="8px" viewBox="0 0 11 8" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 48.1 (47250) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Desktop-HD-Copy-4" transform="translate(-319.000000, -342.000000)" stroke="#FFFFFF" stroke-width="2">
                                <polyline id="Path-2-Copy" points="320 344.666667 322.538462 348 329 343"></polyline>
                            </g>
                        </g>
                    </svg>
                </div>
            </th>
            <th>牛萌萌</th>
            <th colspan="3" style="padding-right:16%;position: relative;">niumengmeng@zhiyujinrong.com<div class="remove">移除</div></th>
        </tr>
        <tr style="border-bottom: 1px solid #ddd;"  num='3'>
            <th>
                <div class="check">
                    <svg width="11px" height="8px" viewBox="0 0 11 8" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 48.1 (47250) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Desktop-HD-Copy-4" transform="translate(-319.000000, -342.000000)" stroke="#FFFFFF" stroke-width="2">
                                <polyline id="Path-2-Copy" points="320 344.666667 322.538462 348 329 343"></polyline>
                            </g>
                        </g>
                    </svg>
                </div>
            </th>
            <th>牛萌萌</th>
            <th colspan="3" style="padding-right:16%;position: relative;">niumengmeng@zhiyujinrong.com<div class="remove">移除</div></th>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>
                <div class="removeall">确认移除</div>
            </th>
        </tr>
    </tfoot>
</table>
<div id="addone">
    <p>添加邮箱</p>
    <input type="text" placeholder="输入用户姓名" name="name"><div id="tj">添加</div><br>
    
    <input type="text" placeholder="输入用户邮箱地址" name="address">
</div>
<table class="table table-bordered table-hover tab_center table_right">
    <thead>
        <tr>
            <th colspan="6" class="search">
                <p>历史添加</p>
                <div>
                    <input type="text">
                    <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 48.1 (47250) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Desktop-HD-Copy-4" transform="translate(-1015.000000, -176.000000)" fill="#0076C1">
                                <g id="search" transform="translate(1015.000000, 176.000000)">
                                    <path d="M12.502,6.491 L11.708,6.491 L11.432,6.765 C12.407,7.902 13,9.376 13,10.991 C13,14.581 10.09,17.491 6.5,17.491 C2.91,17.491 0,14.581 0,10.991 C0,7.401 2.91,4.491 6.5,4.491 C8.115,4.491 9.588,5.083 10.725,6.057 L11.001,5.783 L11.001,4.991 L15.999,0 L17.49,1.491 L12.502,6.491 L12.502,6.491 Z M6.5,6.491 C4.014,6.491 2,8.505 2,10.991 C2,13.476 4.014,15.491 6.5,15.491 C8.985,15.491 11,13.476 11,10.991 C11,8.505 8.985,6.491 6.5,6.491 L6.5,6.491 Z" id="Shape" transform="translate(8.745000, 8.745500) scale(1, -1) translate(-8.745000, -8.745500) "></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
            </th>
        </tr>
        <tr id="item">
            <th width='20%'><div class="check checkall" style="margin-top:0px;">
                <svg width="11px" height="8px" viewBox="0 0 11 8" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 48.1 (47250) - http://www.bohemiancoding.com/sketch -->
                    <desc>Created with Sketch.</desc>
                    <defs></defs>
                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Desktop-HD-Copy-4" transform="translate(-319.000000, -342.000000)" stroke="#FFFFFF" stroke-width="2">
                            <polyline id="Path-2-Copy" points="320 344.666667 322.538462 348 329 343"></polyline>
                        </g>
                    </g>
                </svg>
            </div>&#12288;全选</th>
            <th style="padding-right:16%;position: relative;">邮箱地址</th>
        </tr>
    </thead>
    <tbody>
        <tr style="border-bottom: 1px solid #ddd;">
            <th width='20%'>
                <div class="check">
                    <svg width="11px" height="8px" viewBox="0 0 11 8" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <!-- Generator: Sketch 48.1 (47250) - http://www.bohemiancoding.com/sketch -->
                        <desc>Created with Sketch.</desc>
                        <defs></defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Desktop-HD-Copy-4" transform="translate(-319.000000, -342.000000)" stroke="#FFFFFF" stroke-width="2">
                                <polyline id="Path-2-Copy" points="320 344.666667 322.538462 348 329 343"></polyline>
                            </g>
                        </g>
                    </svg>
                </div>
            </th>
            <th colspan="3" style="padding-right:16%;position: relative;text-align:left;"><span>牛萌萌</span><br><span>niumengmeng@zhiyujinrong.com</span><div class="add">添加</div></th>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <th>
                <div class="addall">确认选择</div>
            </th>
        </tr>
    </tfoot>
</table>
<script>
    (function(){
        $('nav>div:first-child').css({'color':'#0076c1','border-bottom':'2px solid #0076c1'});
    })()
    $(window).on('mousemove',function(e){
        e=window.event||e;
        if(e.target.tagName=='TH'&&$(e.target).closest('tbody').length>0){
            $('th').css('backgroundColor','#fff');
            $('.remove').css('display','none');
            $('.add').css('display','none');
            $(e.target).parent().find('th').css('backgroundColor','#f5f5f5');
            $(e.target).parent().find('.remove').css('display','block');
            $(e.target).parent().find('.add').css('display','block');
        }
    });
    $('.check').each(function(){
        if($(this).attr('class').indexOf('checkall')=='-1'){
            $(this).closest('tr').find('.remove').css('display','none');
            $(this).closest('tr').find('.add').css('display','none');
        }
    });
    $('.check').click(function(){
        if($(this).attr('class').indexOf('checkall')=='-1'){
            if($(this).attr('class').indexOf('check_active')=='-1'){
                $(this).addClass('check_active');
            }else{
                $(this).removeClass('check_active');
            }
        };
        if($('.table_left .check_active').length>0){
            $('.table_left tfoot').show();
        }else{
            $('.table_left tfoot').hide();
        };
        if($('.table_right .check_active').length>0){
            $('.table_right tfoot').show();
        }else{
            $('.table_right tfoot').hide();
        };
    })
    $('.checkall').click(function(){
        if($(this).attr('class').indexOf('check_active')=='-1'){
            $(this).closest('table').find('.check').addClass('check_active');
        }else{
            $(this).closest('table').find('.check').removeClass('check_active');
        };
        if($('.table_left .check_active').length>0){
            $('.table_left tfoot').show();
        }else{
            $('.table_left tfoot').hide();
        };
        if($('.table_right .check_active').length>0){
            $('.table_right tfoot').show();
        }else{
            $('.table_right tfoot').hide();
        };
    });
    $('nav>div').click(function(){
        $('nav>div').css({'color':'#979797','border-bottom':'2px solid #eee'});
        $(this).css({'color':'#0076c1','border-bottom':'2px solid #0076c1'});
    });
    $('.remove').click(function(){
        var removeid=$(this).closest('tr').attr('num');
        $.post('',{'num':removeid},(result)=>{
            if(result.code=='1'){
                $(this).closest('tr').remove();
            }
        })
    });
    $('.removeall').click(function(){
        var arr=[];
        $('.table_left .check_active').each(function(){
            arr.push($(this).closest('tr').attr('num'));
        });
        $.post('',{'numlist':arr},(result)=>{
            if(result.code=='1'){
                $('.table_left .check_active').remove();
            }
        })
    });
    $('#tj').click(function(){
        $.post('',{'name':$('input[name="name"]').val(),'email':$('input[name="address"]').val()},(result)=>{
            if(result.code=='1'){

            }
        })
    });
    $('.add').click(function(){
        $.post('',{'name':$(this).parent().find('span').eq(0).text(),'email':$(this).parent().find('span').eq(1).text()},(result)=>{
            if(result.code=='1'){

            }
        })
    });
    $('.addall').click(function(){
        var arr=[];
        $('.table_right .check_active').each(function(){
            arr.push($(this).closest('tr').find('span').eq(0).text());
            arr.push($(this).closest('tr').find('span').eq(1).text());
        });
        $.post('',{'numlist':arr},(result)=>{
            if(result.code=='1'){
                $('.table_left .check_active').remove();
            }
        })
    });
</script>











<script>

  var pswtext;
  $(function(){

    $('#backid').click(function(){
      javascript:history.go(-1);
    });

//    $('#password').keydown(function(){
//      console.log($('#password').val());
//    });
//
//    $('#password').bind('inpt propertychange',function(){
//      console.log($('#password').val());
//      $('#password').attr('type','text');
//    });




  });





</script>


</body>
</html>