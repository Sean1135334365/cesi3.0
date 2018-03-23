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
    body {
        width: 96%;
        padding-top: 20px;
        margin: 0 auto;
        -moz-user-select: none;
        /*火狐*/
        -webkit-user-select: none;
        /*webkit浏览器*/
        -ms-user-select: none;
        /*IE10*/
        -khtml-user-select: none;
        /*早期浏览器*/
        user-select: none;
    }
    
    .clearfloat:after {
        display: block;
        clear: both;
        content: "";
        visibility: hidden;
        height: 0
    }
    
    .clearfloat {
        zoom: 1
    }
    
     ::-webkit-scrollbar {
        width: 0px;
        height: 0px;
    }
    
     ::-webkit-scrollbar-track {
        background: #e6e6e6;
        opacity: 0.7;
        -webkit-box-shadow: rgba(50, 50, 50, 0.3);
        border-radius: 10px;
    }
    
     ::-webkit-scrollbar-thumb {
        border-radius: 3px;
        background: rgba(68, 182, 174, 0.3);
        -webkit-box-shadow: rgba(68, 182, 174, 0.5);
    }
    
     ::-webkit-scrollbar-thumb:window-inactive {
        background-color: #e6e6e6;
    }
    
     ::-webkit-scrollbar-track-piece {
        background: #e6e6e6;
        opacity: 0.5;
        -webkit-box-shadow: rgba(50, 50, 50, 0.5);
        border-radius: 3px;
    }
    
    .table-details {
        height: 600px;
    }
    
    .table thead tr {
        height: 50px;
    }
    
    .table tfoot {
        height: 40px;
    }
    /* .table-details thead {
      height:80px;
    } */
    /* .table-details thead tr th:last-child {
      overflow: hidden;
      text-overflow:ellipsis;
      white-space: nowrap;    
      height: 38px; 
    } */
    /* .table-details tfoot {
      height: 60px;
    } */
    /* .content-rightbox {
      height: 600px;
    } */
    
    .table th {
        background-color: #fff;
    }
    /* .table th input[type="checkbox"] {
      opacity: 0;
    }  */
    
    .table tbody tr:last-child {
        border-bottom: 1px solid #dddddd;
    }
    
    tr,
    td,
    th {
        vertical-align: middle !important;
    }
    
    .table-bordered {
        border-left: 1px solid #ddd;
    }
    
    #item {
        color: #979797;
    }
    
    #item>th {
        color: #d0d0d0;
    }
    
    .table_left {
        width: 60%;
        float: left;
    }
    
    .table_right {
        float: right;
        width: 36%;
    }
    
    .table_left tbody {
        height: 65vh;
        overflow-y: auto;
    }
    
    .table_right tbody {
        height: 45vh;
        overflow-y: auto;
    }
    
    .check {
        width: 14px;
        height: 14px;
        border: 1px solid #979797;
        display: inline-block;
        vertical-align: sub;
        border-radius: 4px;
    }
    
    .search {
        text-align: left !important;
        color: #343434;
        font-size: 100%;
    }
    
    .search>p {
        display: inline-block;
    }
    
    .search>div {
        width: 27%;
        height: 24px;
        float: right;
        position: relative;
    }
    
    .search>div>svg {
        position: absolute;
        top: 2px;
        right: 5px;
    }
    
    table input {
        width: 94%;
        padding: 0 3% !important;
    }
    
    .remove {
        font-size: 14px;
        padding: 2px 5px;
        border: 1px solid #ff9fab;
        color: #ff9fab;
        /*position: absolute;*/
        /*top: 5px;*/
        /*right: 12px;*/
        /*width: 70px;*/
        border-radius: 4px;
        cursor: pointer;
        display: none;
    }
    
    .removeall {
        font-size: 14px;
        padding: 2px 10px;
        border: 1px solid #ff9fab;
        color: #ff9fab;
        width: 16%;
        margin: 0 auto;
        border-radius: 4px;
        cursor: pointer;
    }
    
    table tbody {
        display: block !important;
        overflow-y: hidden;
    }
    
    table thead tr,
    tbody tr {
        display: table !important;
        width: 100%;
        table-layout: fixed;
    }
    
    .add {
        font-size: 14px;
        padding: 2px 10px;
        border: 1px solid #0375bc;
        color: #fff;
        /*position: absolute;*/
        /*top: 14px;*/
        /*right: 17px;*/
        display: none;
        /*width: 70px;*/
        border-radius: 4px;
        background-color: #0375bc;
        cursor: pointer;
    }
    
    .addall {
        font-size: 14px;
        padding: 2px 5px;
        border: 1px solid #0375bc;
        color: #fff;
        margin: 0 auto;
        width: 20%;
        border-radius: 4px;
        background-color: #0375bc;
        cursor: pointer;
    }
    
    .removeall,
    .addall {
        display: none;
    }
    
    .table_right .check {
        margin-top: 7px;
    }
    
    #addone {
        width: 36%;
        height: 150px;
        float: right;
        border: 1px solid #dedede;
        border-radius: 4px;
        box-sizing: border-box;
        padding: 20px 2%;
        margin-bottom: 40px;
    }
    
    #addone>p {
        color: #343434;
        font-size: 100%;
        font-weight: 700;
        margin-bottom: 1.5vw;
    }
    
    #addone>input {
        /* height: 2vw; */
        height: 25px;
        /* width: 80%; */
        width: 20vh;
    }
    
    #tj {
        font-size: 14px;
        padding: 2px 10px;
        border: 1px solid #0375bc;
        color: #fff;
        border-radius: 4px;
        background-color: #0375bc;
        float: right;
        cursor: pointer;
    }
    
    .check_active {
        border: 1px solid #0375bc;
        background-color: #0375bc;
    }
    
    .check>svg {
        transform: translateY(-3px);
        -webkit-transform: translateY(-3px);
    }
    
    nav {
        margin-bottom: 2%;
    }
    
    nav>div {
        display: inline-block;
        margin-right: 3%;
        width: 100px;
        height: 10%;
        border-bottom: 2px solid #eee;
        font-size: 16px;
        padding: 15px 0;
    }
    
    .tab-item {
        display: none;
    }
    
    .tab-actived {
        display: block;
    }
    
    .check_labels,
    .check_label {
        position: relative;
        cursor: pointer;
    }
    
    .check_labels>input[type="checkbox"],
    .check_label>input[type="checkbox"] {
        position: absolute;
        z-index: -1;
    }
    
    svg {
        display: none;
    }
    
    .search svg {
        display: inline-block;
    }
</style>
<nav>
    <div table="1" class="tab-hover">微信进件提醒</div>
    <div table="2">微信客户反馈</div>
</nav>
<div class="tab-tiems">
    <div class="clearfloat tab-item tab-actived items_1">
        <table class="table table-details table-bordered table-hover tab_center table_left">
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
                      <path d="M12.502,6.491 L11.708,6.491 L11.432,6.765 C12.407,7.902 13,9.376 13,10.991 C13,14.581 10.09,17.491 6.5,17.491 C2.91,17.491 0,14.581 0,10.991 C0,7.401 2.91,4.491 6.5,4.491 C8.115,4.491 9.588,5.083 10.725,6.057 L11.001,5.783 L11.001,4.991 L15.999,0 L17.49,1.491 L12.502,6.491 L12.502,6.491 Z M6.5,6.491 C4.014,6.491 2,8.505 2,10.991 C2,13.476 4.014,15.491 6.5,15.491 C8.985,15.491 11,13.476 11,10.991 C11,8.505 8.985,6.491 6.5,6.491 L6.5,6.491 Z"
                        id="Shape" transform="translate(8.745000, 8.745500) scale(1, -1) translate(-8.745000, -8.745500) "></path>
                    </g>
                  </g>
                </g>
              </svg>
                        </div>
                    </th>
                </tr>
                <tr id="item1">
                    <th width='17%'>
                        <div class="check_label">
                            <input type="checkbox" name=checkall id="check_allboxs">
                            <div class="check checkall">
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
                            &#12288;全选
                        </div>
                    </th>
                    <th width='20%'>用户姓名</th>
                    <th width="45%" colspan="3">邮箱地址</th>
                    <!-- style="padding-right:16%;position: relative;"-->
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($list[1]['y'])): $i = 0; $__LIST__ = $list[1]['y'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr num='1'>
                        <th width="17%">
                            <div class="check_labels">
                                <input type="checkbox" id="<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["id"]); ?>">
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
                            </div>
                        </th>
                        <th width="20%">
                            <?php echo ($vo["name"]); ?>
                        </th>
                        <th width="45%" colspan="3">
                            <!-- style="padding-right:16%;position: relative;"-->
                            <!--niumengmeng@zhiyujinrong.com-->
                            <?php echo ($vo["email"]); ?>
                        </th>
                        <th>
                            <!-- style="padding-right:16%;position: relative;"-->
                            <div class="remove" email="<?php echo ($vo["id"]); ?>" bol='true'>移除</div>
                        </th>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>


            </tbody>
            <tfoot>
                <tr>
                    <th>
                        <div class="removeall check_all">确认移除</div>
                    </th>
                </tr>
            </tfoot>
        </table>
        <div id="addone" class="clearfolat">
            <p>添加邮箱</p>
            <input type="text" placeholder="输入用户姓名" name="name" maxlength="12">
            <div id="tj">添加</div>
            <br>

            <input type="text" placeholder="输入用户邮箱地址" name="address">
        </div>
        <table class="table table-bordered table-hover tab_center table_right">
            <thead>
                <tr>
                    <th colspan="3" class="search">
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
                <tr id="item2">
                    <th width='17%'>

                        <div class="check_label">
                            <!--<input type="checkbox" id="list[1]['y']">-->
                            <div class="check checkall" style="margin-top:0px;">
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
                            </div>&#12288;全选
                        </div>
                    </th>
                    <th width="60%" style="padding-right:16%;position: relative;">邮箱地址</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>


                <?php if(is_array($list[1]['n'])): $i = 0; $__LIST__ = $list[1]['n'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="border-bottom: 1px solid #ddd;">
                        <th width='17%'>

                            <div class="check_labels">
                                <input type="checkbox" id="<?php echo ($vo["id"]); ?>">
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
                            </div>
                        </th>
                        <th width="60%" style="padding-right:16%;position: relative;text-align:left;">
                            <span><?php echo ($vo["name"]); ?></span>
                            <br>
                            <span><?php echo ($vo["email"]); ?></span>
                            <!--<div class="add">添加</div>-->
                        </th>

                        <th>
                            <!-- style="padding-right:16%;position: relative;"-->
                            <div class="add" email="<?php echo ($vo["id"]); ?>">添加</div>
                        </th>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>
                        <div class="addall check_all">确认选择</div>
                    </th>
                </tr>
            </tfoot>
        </table>
        <!-- </div> -->
    </div>
    <div class="clearfloat tab-item items_2">
        <table class="table table-details table-bordered table-hover tab_center table_left">
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
                      <path d="M12.502,6.491 L11.708,6.491 L11.432,6.765 C12.407,7.902 13,9.376 13,10.991 C13,14.581 10.09,17.491 6.5,17.491 C2.91,17.491 0,14.581 0,10.991 C0,7.401 2.91,4.491 6.5,4.491 C8.115,4.491 9.588,5.083 10.725,6.057 L11.001,5.783 L11.001,4.991 L15.999,0 L17.49,1.491 L12.502,6.491 L12.502,6.491 Z M6.5,6.491 C4.014,6.491 2,8.505 2,10.991 C2,13.476 4.014,15.491 6.5,15.491 C8.985,15.491 11,13.476 11,10.991 C11,8.505 8.985,6.491 6.5,6.491 L6.5,6.491 Z"
                            id="Shape" transform="translate(8.745000, 8.745500) scale(1, -1) translate(-8.745000, -8.745500) "></path>
                    </g>
                  </g>
                </g>
              </svg>
                        </div>
                    </th>
                </tr>
                <tr id="item1">
                    <th width='17%'>
                        <div class="check_label">
                            <input type="checkbox" name=checkall id="check_allboxs">
                            <div class="check checkall">
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
                            &#12288;全选
                        </div>
                    </th>
                    <th width='20%'>用户姓名</th>
                    <th width="45%" colspan="3">邮箱地址</th>
                    <!-- style="padding-right:16%;position: relative;"-->
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if(is_array($list[2]['y'])): $i = 0; $__LIST__ = $list[2]['y'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr num='1'>
                        <th width="17%">
                            <div class="check_labels">
                                <input type="checkbox" id="<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["id"]); ?>">
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
                            </div>
                        </th>
                        <th width="20%">
                            <?php echo ($vo["name"]); ?>
                        </th>
                        <th width="45%" colspan="3">
                            <!-- style="padding-right:16%;position: relative;"-->
                            <!--niumengmeng@zhiyujinrong.com-->
                            <?php echo ($vo["email"]); ?>
                        </th>
                        <th>
                            <!-- style="padding-right:16%;position: relative;"-->
                            <div class="remove" email="<?php echo ($vo["id"]); ?>" bol='true'>移除</div>
                        </th>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>


            </tbody>
            <tfoot>
                <tr>
                    <th>
                        <div class="removeall check_all">确认移除</div>
                    </th>
                </tr>
            </tfoot>
        </table>
        <div id="addone" class="clearfolat">
            <p>添加邮箱</p>
            <input type="text" placeholder="输入用户姓名" name="name">
            <div id="tj">添加</div>
            <br>

            <input type="text" placeholder="输入用户邮箱地址" name="address">
        </div>
        <table class="table table-bordered table-hover tab_center table_right">
            <thead>
                <tr>
                    <th colspan="3" class="search">
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
                <tr id="item2">
                    <th width='15%'>

                        <div class="check_label">
                            <!--<input type="checkbox" id="list[1]['y']">-->
                            <div class="check checkall" style="margin-top:0px;">
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
                            </div>&#12288;全选
                        </div>
                    </th>
                    <th width="60%" style="padding-right:16%;position: relative;">邮箱地址</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>


                <?php if(is_array($list[2]['n'])): $i = 0; $__LIST__ = $list[2]['n'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="border-bottom: 1px solid #ddd;">
                        <th width='15%'>

                            <div class="check_labels">
                                <input type="checkbox" id="<?php echo ($vo["id"]); ?>">
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
                            </div>
                        </th>
                        <th width="60%" style="padding-right:16%;position: relative;text-align:left;">
                            <span><?php echo ($vo["name"]); ?></span>
                            <br>
                            <span><?php echo ($vo["email"]); ?></span>
                            <!--<div class="add">添加</div>-->
                        </th>

                        <th>
                            <!-- style="padding-right:16%;position: relative;"-->
                            <div class="add" email="<?php echo ($vo["id"]); ?>">添加</div>
                        </th>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>
                        <div class="addall check_all">确认选择</div>
                    </th>
                </tr>
            </tfoot>
        </table>
        <!-- </div> -->

    </div>
</div>
<script>
    (function() {
        $('nav>div:first-child').css({
            'color': '#0076c1',
            'border-bottom': '2px solid #0076c1'
        });

    })();
    getCode();

    function getCode() {

        return $('nav div.tab-hover').attr('table');

    }
    // 鼠标事件
    $(window).on('mousemove', function(e) {
        e = window.event || e;
        if (e.target.tagName == 'TH' && $(e.target).closest('tbody').length > 0) {
            $('th').css('backgroundColor', '#fff');
            $('.remove').css('display', 'none');
            $('.add').css('display', 'none');
            $(e.target).parent().find('th').css('backgroundColor', '#f5f5f5');
            $(e.target).parent().find('.remove').css('display', 'block');
            $(e.target).parent().find('.add').css('display', 'block');
        }
    });
    // 鼠标事件
    $('tr').on('mouseleave', function(e) {
            e = window.event || e;
            $('th').css('backgroundColor', '#fff');
            $('.remove').css('display', 'none');
            $('.add').css('display', 'none');
        })
        // 正则验证
    $('input[name="address"]').on("blur", function() {
        var ret = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/;
        var str = $(this).val()
        if (!ret.test(str)) {
            $(this).val("请输入正确的邮箱格式")
        }
    })
    $('input[name="address"]').on("focus", function() {
        $(this).val("")
    })



    //全选
    $(document).on('click','div.check_label',function() {
        var check_active = $(this).find('div').hasClass('check_active');
        if (check_active) {
            $(this).parents('table').closest('table').find('input[type="checkbox"]').prop('checked', false);
            $(this).parents('table').closest('table').find('.check').removeClass('check_active');


            $(this).parents('table').closest('table').find('.check_all').hide();

            $(this).parents('table').closest('table').find('.check').find('svg').css('display', 'none');
        } else {
            $(this).parents('table').closest('table').find('input[type="checkbox"]').prop('checked', true);
            $(this).parents('table').closest('table').find('.check').addClass('check_active');
            $(this).parents('table').closest('table').find('.check_all').show();
            $(this).parents('table').closest('table').find('.check').find('svg').css('display', 'inline-block');
        }
    });
    $(document).on('click','.check_labels',function() {
        var check_actives = $(this).find('div').hasClass('check_active');
        if (check_actives) {

            $(this).find('input[type="checkbox"]').prop('checked', false);
            $(this).find('.check').removeClass('check_active');
            //          $(this).parents('table').closest('table').find('.check_all').hide();
            $(this).find('.check').find('svg').css('display', 'none');

        } else {

            $(this).find('input[type="checkbox"]').prop('checked', true);
            $(this).find('.check').addClass('check_active');
            $(this).parents('table').closest('table').find('.check_all').show();
            $(this).find('svg').css('display', 'inline-block');
        }
        var checked_input = $(this).parents('tbody').find('.check_labels').children('input:checked').length;
        var _input = $(this).parents('tbody').find('.check_labels').children('input').length;
        //            console.log(checked_input, _input);
        if (checked_input == _input) {
            $(this).parents('table').closest('table').find('thead').find('input').prop('checked', true);
            $(this).parents('table').closest('table').find('thead').find('.check').addClass('check_active')
            $(this).parents('table').closest('table').find('thead').find('.check').find('svg').css('display', 'inline-block');
        } else {
            $(this).parents('table').closest('table').find('thead').find('input').prop('checked', false);
            $(this).parents('table').closest('table').find('thead').find('.check').removeClass('check_active');
            $(this).parents('table').closest('table').find('thead').find('.check').find('svg').css('display', 'none');
        }
        if (checked_input == 0) {
            $(this).parents('table').closest('table').find('.check_all').hide();
        }

    })


    // 单个删除
    $(document).on('click','.remove',function() {
        var remove_id = $(this).parents('tr').find('input[type="checkbox"]').attr('id');
        $.post("<?php echo U('Admin/Interaction/delete');?>", {
                'id': remove_id,
                "code": getCode()
            },
            (result) => {
                console.log(JSON.parse(result))
                let str = JSON.parse(result)
                if (str.code == 1) {
                    alert('移除成功');
                    $(this).parents('tr').remove();
                    for (k of str.data)
                        searches($('.table_right').children('tbody'), k.id, k.name, k.email, $(this).parents('body').find('nav').find('div.tab-hover').attr('table'))

                } else if (str.code == 3) {
                    alert('无此权限');
                } else {
                    alert('移除失败');
                }

            });
    });
    // 全部删除
    $(document).on('click','.removeall',function() {
        var removeallid = [];
        $(this).parents('table').find('tbody').find('input[type="checkbox"]').each(function() {

            if ($(this).is(':checked')) {
                removeallid.push($(this).attr('id'))

            }

        });
        $.post("<?php echo U('Admin/Interaction/delete');?>", {
            'id': removeallid,
            "code": getCode()
        }, (result) => {
            console.log(result)
            let str = JSON.parse(result)
            if (str.code == 1) {
                alert('移除成功');
                $(this).parents('table').find('tbody').find('input[type="checkbox"]:checked').parents('tr').remove()
                for (k of str.data) {
                    searches($('.table_right').children('tbody'), k.id, k.name, k.email, $(this).parents('body').find('nav').find('div.tab-hover').attr('table'))

                }
            } else if (str.code == 3) {
                alert('无此权限');
            } else {
                alert('移除失败');
            }
        })
    });
    // 输入框添加
    $(document).on('click','#tj',function() {
        if($('input[name="name"]').val().length < 2){
            return alert('请输入名称')
        }

        if($('input[name="address"]').val().length < 7){
            return alert('邮箱格式不正确')
        }

        $.post("<?php echo U('Admin/Interaction/email_add');?>", {
            'name': $('input[name="name"]').val(),
            'email': $('input[name="address"]').val(),
            "code": getCode()
        }, function(result) {
            if (JSON.parse(result).code === '1') {
                alert('添加成功');
                let str = JSON.parse(result).data
                additem(str.id, str.name, str.email, $(this).parents('body').find('nav').find('div.tab-hover').attr('table'))
            } else if (JSON.parse(result).code == 3) {
                alert('无此权限');
            } else {
                alert(JSON.parse(result).msg);
            }
        })
    });
    //  添加
    $(document).on('click','.add',function() {
        //        console.log(111)
        $.post("<?php echo U('Admin/Interaction/email_add_all');?>", {
            'name': $(this).parents('tr').find('span').eq(0).text(),
            'email': $(this).parents('tr').find('span').eq(1).text(),
            'id': $(this).parents('tr').find('input[type="checkbox"]').attr('id'),
            "code": getCode()
        }, (result) => {
            if (JSON.parse(result).code == '1') {
                alert('添加成功');
                let str = JSON.parse(result).data
                for(k of str) {
                  additem(k.id, k.name, k.email, $(this).parents('body').find('nav').find('div.tab-hover').attr('table'))
                }

            } else if (str.code == 3) {
                alert('无此权限');
            } else {
                alert(str.msg);
            }
        })
    });
    // 全部添加
    $(document).on('click','.addall',function() {
        var Obj = [];
        $(this).parents('table').find('tbody').find('div.check_labels').find('input[type="checkbox"]').each(function() {
                if ($(this).is(':checked')) {
                    Obj.push($(this).attr('id'))
                    $(this).parents('tr').remove()
                }
            })
            // console.log(Obj);

        $.post("<?php echo U('Admin/Interaction/email_add_all');?>", {
            id: Obj,
            "code": getCode()
        }, (result) => {
            if (JSON.parse(result).code == "1") {
                alert('添加成功');
                let str = JSON.parse(result).data
                for (k of str) {
                    console.log(k)
                    additem(k.id, k.name, k.email, $(this).parents('body').find('nav').find('div.tab-hover').attr('table'))
                }
            } else if (str.code == 3) {
                alert('无此权限');
            } else {
                alert(str.msg);
            }
        })
    });

    //  添加
    function additem(id, name, email_str, num) {
        num = 0 | num
        return $('.table_left').children('tbody').append(
            "<tr num=" + id + "><th width='17%' style='background-color:rgb(255,255,255)'>" +
            "<div class='check_labels'>" +
            " <input type='checkbox' id=" + id + "value=" + id + "/>" +
            "<div class='check'>" +
            "<svg width='11px' height='8px' viewBox='0 0 11 8' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>" +
            "<!-- Generator: Sketch 48.1 (47250) - http://www.bohemiancoding.com/sketch -->" +
            "<desc>Created with Sketch.</desc>" +
            "<defs></defs>" +
            "<g id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>" +
            "<g id='Desktop-HD-Copy-4' transform='translate(-319.000000, -342.000000)' stroke='#FFFFFF' stroke-width='2'>" +
            "<polyline id='Path-2-Copy' points='320 344.666667 322.538462 348 329 343'></polyline>" +
            "</g>" +
            "</g>" +
            "</svg>" +
            "</div>" +
            "</div>" +
            "</th>" +
            "<th width='20%' style='background-color: rgb(255, 255, 255);'> " + name + "</th>" +
            "<th colspan='3' width='45%' style='background-color: rgb(255, 255, 255);'>" + email_str + '</th>' +
            "<th >" +
            "<div class='remove' email=" + id + "bol='true' style='display:block;'>移除</div></th></tr>"
        )
    }

    function searches(el, id, name, email_str, num) {
        num = 0 | num
        return el.append(
            "<tr num=" + id + "><th width='15%' style='background-color:rgb(255,255,255)'>" +
            "<div class='check_labels'>" +
            " <input type='checkbox' id=" + id + "value=" + id + "/>" +
            "<div class='check'>" +
            "<svg width='11px' height='8px' viewBox='0 0 11 8' version='1.1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'>" +
            "<!-- Generator: Sketch 48.1 (47250) - http://www.bohemiancoding.com/sketch -->" +
            "<desc>Created with Sketch.</desc>" +
            "<defs></defs>" +
            "<g id='Page-1' stroke='none' stroke-width='1' fill='none' fill-rule='evenodd'>" +
            "<g id='Desktop-HD-Copy-4' transform='translate(-319.000000, -342.000000)' stroke='#FFFFFF' stroke-width='2'>" +
            "<polyline id='Path-2-Copy' points='320 344.666667 322.538462 348 329 343'></polyline>" +
            "</g>" +
            "</g>" +
            "</svg>" +
            "</div>" +
            "</div>" +
            "</th>" +
            "<th width='60%' style='padding-right: 16%; position: relative; text-align: left; background-color: rgb(255, 255, 255);'><span> " + name + "</span><br><span>" + email_str + "</span></th>" +
            "<th style='background-color: rgb(255, 255, 255);'><!-- style='padding-right:16%;position: relative;'-->" +
            "<div class='add' email=" + id + "style='display: none;'>添加</div></th></tr>"
        )
    }
    // 搜索
    $(document).find('svg').on('click','.table_left thead',function() {
            $.post("<?php echo U('Admin/Interaction/search');?>", {
                name: $('.table_left input[type="text"]').eq(0).val(),
                "code": getCode(),
                "table": "left"
            }, (result) => {
                let str = JSON.parse(result);
                if (str.code == "1") {
                    $('.table_left').children('tbody').html("")
                    for (k of str.data) {
                        additem(k.id, k.name, k.email, $(this).parents('body').find('nav').find('div.tab-hover').attr('table'))
                    }
                } else {
                    alert('查询失败');
                }
            })

        })
        // 搜索
    $(document).find('svg').on('click','.table_right thead',function() {
        $.post("<?php echo U('Admin/Interaction/search');?>", {
            name: $('.table_right input[type="text"]').eq(0).val(),
            "code": getCode(),
            "table": "right"
        }, (result) => {
            let str = JSON.parse(result);
            if (str.code == "1") {
                $('.table_right').children('tbody').html("");
                for (k of str.data) {
                    searches($('.table_right').children('tbody'), k.id, k.name, k.email, $(this).parents('body').find('nav').find('div.tab-hover').attr('table'))
                }
            } else {
                alert('查询失败');
            }
        })
    })


    $(document).on('click','nav div',function() {
        $('nav>div').css({
            'color': '#979797',
            'border-bottom': '2px solid #eee'
        });
        $(this).css({
            'color': '#0076c1',
            'border-bottom': '2px solid #0076c1'
        });
        var indexs = $(this).index()
        $(this).addClass('tab-hover').siblings().removeClass('tab-hover')
        $('.tab-item').eq(indexs).addClass('tab-actived').siblings().removeClass('tab-actived');
        getCode();
    })
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
<!--安全邮箱设置-->