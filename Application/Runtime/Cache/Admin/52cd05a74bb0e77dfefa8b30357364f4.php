<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <title>用户列表</title>
    <script src="/notoadmin/Application/Admin/View/Public/js/jquery-1.10.2.min.js"></script>

    <!-- bootstrap -->

    <link href="/notoadmin/Application/Admin/View/Public/css/bootstrap.css" rel="stylesheet">
    <!--icheck-->
    <link href="/notoadmin/Application/Admin/View/Public/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="/notoadmin/Application/Admin/View/Public/js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="/notoadmin/Application/Admin/View/Public/js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="/notoadmin/Application/Admin/View/Public/js/iCheck/skins/square/blue.css" rel="stylesheet">

    <!--dashboard calendar-->
    <link href="/notoadmin/Application/Admin/View/Public/css/clndr.css" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="/notoadmin/Application/Admin/View/Public/js/morris-chart/morris.css">

    <!--common-->
    <link href="/notoadmin/Application/Admin/View/Public/css/style.css" rel="stylesheet">
    <link href="/notoadmin/Application/Admin/View/Public/css/style-responsive.css" rel="stylesheet">




    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/notoadmin/Application/Admin/View/Public/js/html5shiv.js"></script>
    <script src="/notoadmin/Application/Admin/View/Public/js/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="/notoadmin/Application/Admin/View/Public/js/layer/layer.js"></script>
    <script type="text/javascript" src="/notoadmin/Application/Admin/View/Public/js/angular.min.js"></script>


</head>
<body class="sticky-header">

<section>
    <!-- left side start-->
    <!-- left side start-->
<div class="left-side sticky-left-side">

    <!--logo and iconic logo start-->
    <div class="logo">
        <a href="index.html"><img src="/notoadmin/Application/Admin/View/Public/images/logo.png" alt=""></a>
    </div>

    <div class="logo-icon text-center">
        <a href="index.html"><img src="/notoadmin/Application/Admin/View/Public/images/logo_icon.png" alt=""></a>
    </div>
    <!--logo and iconic logo end-->

    <div class="left-side-inner">

        <!-- visible to small devices only -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">
            <div class="media logged-user">
                <img alt="" src="/notoadmin/Application/Admin/View/Public/images/photos/user-avatar.png" class="media-object">
                <div class="media-body">
                    <h4><a href="#">John Doe</a></h4>
                    <span>"Hello There..."</span>
                </div>
            </div>

            <h5 class="left-nav-title">Account Information</h5>
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li><a href="#"><i class="fa fa-user"></i> <span>Profile</span></a></li>
                <li><a href="#"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
                <li><a href="#"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>

        <!--sidebar nav start-->
        <ul class="nav nav-pills nav-stacked custom-nav">
            <li ><a href="<?php echo U(MODULE_NAME.'/Index/index');?>"><i class="fa fa-home"></i> <span>首页</span></a></li>
            <li class="menu-list"><a href=""><i class="fa fa-laptop"></i> <span>布局</span></a>
                <ul class="sub-menu-list">
                    <li><a href="blank_page.html"> Blank Page</a></li>
                    <li><a href="boxed_view.html"> Boxed Page</a></li>
                    <li><a href="leftmenu_collapsed_view.html"> Sidebar Collapsed</a></li>
                    <li><a href="horizontal_menu.html"> Horizontal Menu</a></li>

                </ul>
            </li>
            <!-- 自己添加的栏目 -->

            <?php if(is_array($menuList)): foreach($menuList as $k=>$vo): ?><li class="menu-list <?php if($cate == $vo["name"] ): ?>nav-active<?php endif; ?>"><a href=""><i class="fa fa-book"></i> <span><?php echo ($vo["title"]); ?></span></a>
                    <ul class="sub-menu-list">
                        <?php if(is_array($vo['node'])): foreach($vo['node'] as $kk=>$voo): ?><li <?php if($menu == $voo["name"] ): ?>class="active"<?php endif; ?> ><a href="/notoadmin/index.php/Admin/<?php echo ($vo["name"]); ?>/<?php echo ($voo["name"]); ?>"> <?php echo ($voo["title"]); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                </li><?php endforeach; endif; ?>


        </ul>
        <!--sidebar nav end-->

    </div>
</div>
<!-- left side end-->
    <!-- left side end-->

    <!-- main content start-->
    <div class="main-content" >

        <!-- header section start-->
        <!-- header section start-->
<div class="header-section">

    <!--toggle button start-->
    <a class="toggle-btn"><i class="fa fa-bars"></i></a>
    <!--toggle button end-->

    <!--search start-->
    <form class="searchform" action="index.html" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
    </form>
    <!--search end-->

    <!--notification menu start -->
    <div class="menu-right">
        <ul class="notification-menu">
            <li>
                <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                    <i class="fa fa-tasks"></i>
                    <span class="badge">8</span>
                </a>
                <div class="dropdown-menu dropdown-menu-head pull-right">
                    <h5 class="title">You have 8 pending task</h5>
                    <ul class="dropdown-list user-list">
                        <li class="new">
                            <a href="#">
                                <div class="task-info">
                                    <div>Database update</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-warning">
                                        <span class="">40%</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="new">
                            <a href="#">
                                <div class="task-info">
                                    <div>Dashboard done</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div style="width: 90%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" role="progressbar" class="progress-bar progress-bar-success">
                                        <span class="">90%</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div>Web Development</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div style="width: 66%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="66" role="progressbar" class="progress-bar progress-bar-info">
                                        <span class="">66% </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div>Mobile App</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="33" role="progressbar" class="progress-bar progress-bar-danger">
                                        <span class="">33% </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="task-info">
                                    <div>Issues fixed</div>
                                </div>
                                <div class="progress progress-striped">
                                    <div style="width: 80%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar">
                                        <span class="">80% </span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="new"><a href="">See All Pending Task</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge">5</span>
                </a>
                <div class="dropdown-menu dropdown-menu-head pull-right">
                    <h5 class="title">You have 5 Mails </h5>
                    <ul class="dropdown-list normal-list">
                        <li class="new">
                            <a href="">
                                <span class="thumb"><img src="/notoadmin/Application/Admin/View/Public/images/photos/user1.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">John Doe <span class="badge badge-success">new</span></span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="thumb"><img src="/notoadmin/Application/Admin/View/Public/images/photos/user2.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jonathan Smith</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="thumb"><img src="/notoadmin/Application/Admin/View/Public/images/photos/user3.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jane Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="thumb"><img src="/notoadmin/Application/Admin/View/Public/images/photos/user4.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Mark Henry</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <span class="thumb"><img src="/notoadmin/Application/Admin/View/Public/images/photos/user5.png" alt="" /></span>
                                        <span class="desc">
                                          <span class="name">Jim Doe</span>
                                          <span class="msg">Lorem ipsum dolor sit amet...</span>
                                        </span>
                            </a>
                        </li>
                        <li class="new"><a href="">Read All Mails</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#" class="btn btn-default dropdown-toggle info-number" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="badge">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-head pull-right">
                    <h5 class="title">Notifications</h5>
                    <ul class="dropdown-list normal-list">
                        <li class="new">
                            <a href="">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                <span class="name">Server #1 overloaded.  </span>
                                <em class="small">34 mins</em>
                            </a>
                        </li>
                        <li class="new">
                            <a href="">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                <span class="name">Server #3 overloaded.  </span>
                                <em class="small">1 hrs</em>
                            </a>
                        </li>
                        <li class="new">
                            <a href="">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                <span class="name">Server #5 overloaded.  </span>
                                <em class="small">4 hrs</em>
                            </a>
                        </li>
                        <li class="new">
                            <a href="">
                                <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                <span class="name">Server #31 overloaded.  </span>
                                <em class="small">4 hrs</em>
                            </a>
                        </li>
                        <li class="new"><a href="">See All Notifications</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <img src="/notoadmin/Application/Admin/View/Public/images/photos/user-avatar.png" alt="" />
                    范松伟
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                    <li><a href="#"><i class="fa fa-user"></i>  Profile</a></li>
                    <li><a href="#"><i class="fa fa-cog"></i>  Settings</a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i> Log Out</a></li>
                </ul>
            </li>

        </ul>
    </div>
    <!--notification menu end -->

</div>
<!-- header section end-->



        <!-- header section end-->

        <div class="totol " style=" width: 100%;">
            <form action="<?php echo U('UserManage/index');?>" method="post" style="float:left;padding-left:80%;">
                <input type="text" class="search-input" name="searchValue"  required placeholder="订单号/一卡通号/姓名" value=""/>
                <input type="submit" value="检索"  style="margin-right:0;width:80px;"  />
            </form>
        </div>
            <table class="table table-striped" >
                <tr class="hui_top">
                    <th><input type="checkbox" id="all"></th>
                    <th>订单编号</th>
                    <th>一卡通号</th>
                    <th>订单用户</th>
                    <th>收件人</th>
                    <th>收件人电话</th>
                    <th>收件地址</th>
                    <th>申请时间</th>
                    <th>支付状态</th>
                    <th>订单状态</th>
                    <th style="text-align:center;">操作</th>
                </tr>
                <?php if($orderList != null): if(is_array($orderList)): foreach($orderList as $key=>$orderList): ?><tr class="result_list">
                    <td><input type="checkbox" value="<?php echo ($orderList['id']); ?>"></td>
                    <td>
                        <?php echo ($orderList['id']); ?>
                    </td>
                    <td>
                        <?php echo ($orderList['card']); ?>
                    </td>
                    <td>
                        <?php echo ($orderList['user_name']); ?>
                    </td>
                    <td>
                        <?php echo ($orderList['consignee']); ?>
                    </td>
                    <td>
                        <?php echo ($orderList['tel']); ?>
                    </td>
                    <td>
                        <?php echo ($orderList['province']); echo ($orderList['city']); echo ($orderList['county']); echo ($orderList['street']); echo ($orderList['detail_address']); ?>
                    </td>
                    <td>
                        <?php echo (date('Y-m-d H:i:s',$orderList['create_time'])); ?>
                    </td>
                    <td>
                        <?php if($orderList['status'] == 0): ?><font color="red">未付款</font>
                            <?php else: ?>
                                <font color="blue">已付</font><?php endif; ?>
                    </td>
                    <td>
                        <?php if($orderList['status'] == 3): ?><font color="red">待发件</font>
                        <?php elseif($orderList['status'] == 4): ?>
                            <font color="blue">已发件</font>
                        <?php else: ?>
                            <font color="black">待审核..</font><?php endif; ?>
                    </td>
                    <td class="choose_td" align="center">
                        <div style="min-width: 80px;">
                            <?php if($orderList['status'] < 3): ?><a href="javascript:;" class="operation" data-id="<?php echo ($orderList['id']); ?>" data-state="3">审核通过</a>
                            <?php elseif($orderList['status'] == 3): ?>
                                <a href="javascript:;" class="operation" data-id="<?php echo ($orderList['id']); ?>" data-state="4">发件</a>
                            <?php elseif($orderList['status'] == 4): ?>
                                已发件<?php endif; ?>
                        </div>
                    </td>
                </tr><?php endforeach; endif; ?>

                <?php else: ?>
                    <tr style=" height:35px;">
                        <td colspan="8" align="center" style=" color: #18c3a7">暂无批次数据……</td>
                    </tr><?php endif; ?>
            </table>
            <button style="" id="getValue">审核</button>
            <!--分页-->
            <?php if($page_count > 1): ?><div class="page">
                    <a href="javascript:void(0);" class="jump">跳转</a>
                    <input type="text" class="rt number">
                    <?php if($_GET['page'] < page_count): ?><a href="javascript:void(0);"><a href="javascript:void(0);" class="rt next">下一页</a><?php endif; ?>
                    <span class="rt">
                        <span class="current"><?php echo ($page); ?></span>/<span class="all"><?php echo ($page_count); ?></span>
                    </span>
                    <?php if($_GET['page'] > 1): ?><a class="rt prev">上一页</a><?php endif; ?>
                </div><?php endif; ?>

        <!--footer section start-->
        <!--footer section start-->
<footer>
    2017-2020 &copy;  by <a href="http://www.6doffice.com/" target="_blank">宝和数据</a>
</footer>
<!--footer section end-->
        <!--footer section end-->
    </div>
    <!-- main content end-->
</section>
<script>
    //下一页
    $("a.next").click(function(){
        var page = parseInt($(".current").text())+1;
        location = "<?php echo U('BrowBooksManage/index');?>?page="+page;
    });
    //上一页
    $("a.prev").click(function(){
        var page = parseInt($(".current").text())-1;
        location = "<?php echo U('BrowBooksManage/index');?>?page="+page;
    });
    //跳转页面
    $(".jump").click(function(){
        var jump_page = parseInt($(".number").val());
        var page_count = parseInt($(".all").text());
        var pre = /^[0-9]{1,}$/;
        if(pre.test(jump_page) === false){
            $(".number").val('');
            return false;
        }else if(jump_page < 1){
            jump_page = 1;
        }else if(jump_page > page_count){
            jump_page = page_count;
        }
        location = "<?php echo U('BrowBooksManage/index');?>?page="+jump_page;
    });

    $(".operation").click(function(){
        var id      =   $(this).attr("data-id");
        var status   =   $(this).attr("data-state");
        $.ajax ({
            'url': '<?php echo U("BrowBooksManage/operation");?>',
            'type':'post',
            'data':{'id':id, 'status':status},
            'dataType':'json',
            'success':function (data) {
                if (data.code == 200) {
                    alert(data.msg);
                    location.reload();//刷新当前页面.
                }else{
                    alert(data.msg);
                }
            }
        });
    });
    $('#all').click(function(){
        if(this.checked){
            $(".result_list :checkbox").prop("checked", true);
        }else{
            $(".result_list :checkbox").prop("checked", false);
        }
    });
    $('#getValue').click(function(){
        var valArr = new Array;
        $(".result_list input[type='checkbox']:checked").each(function(i){
            valArr[i] = $(this).val();
        });
        var vals = valArr.join(',');
        $.ajax({
            'url' :'<?php echo U("BrowBooksManage/pass");?>',
            'type':'post',
            'data': {'arrId':vals},
            'dataType':'json',
            'success':function(data){
//                alert(data);
                if (data.code == 200) {
                    alert(data.msg);
                    location.reload();//刷新当前页面.
                }else{
                    alert(data.msg);
                }
            }
        });
    });
</script>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/notoadmin/Application/Admin/View/Public/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/bootstrap.min.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/modernizr.min.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/jquery.nicescroll.js"></script>

<!--easy pie chart-->
<script src="/notoadmin/Application/Admin/View/Public/js/easypiechart/jquery.easypiechart.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/easypiechart/easypiechart-init.js"></script>

<!--Sparkline Chart-->
<script src="/notoadmin/Application/Admin/View/Public/js/sparkline/jquery.sparkline.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/sparkline/sparkline-init.js"></script>

<!--icheck -->
<script src="/notoadmin/Application/Admin/View/Public/js/iCheck/jquery.icheck.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/icheck-init.js"></script>

<!-- jQuery Flot Chart-->
<script src="/notoadmin/Application/Admin/View/Public/js/flot-chart/jquery.flot.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/flot-chart/jquery.flot.tooltip.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/flot-chart/jquery.flot.resize.js"></script>


<!--Morris Chart-->
<script src="/notoadmin/Application/Admin/View/Public/js/morris-chart/morris.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/morris-chart/raphael-min.js"></script>

<!--Calendar-->
<script src="/notoadmin/Application/Admin/View/Public/js/calendar/clndr.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/calendar/evnt.calendar.init.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/calendar/moment-2.2.1.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>

<!--common scripts for all pages-->
<script src="/notoadmin/Application/Admin/View/Public/js/scripts.js"></script>

<!--Dashboard Charts-->
<script src="/notoadmin/Application/Admin/View/Public/js/dashboard-chart-init.js"></script>


</body>
</html>