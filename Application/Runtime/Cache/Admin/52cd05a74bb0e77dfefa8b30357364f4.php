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
    <link rel="stylesheet" type="text/css" href="/notoadmin/Application/Admin/View/Public/css/admin.css" />
    <script type="text/javascript" src="/notoadmin/Application/Admin/View/Public/js/layer/layer.js"></script>
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

            <li class="menu-list <?php if($cate == WebManage): ?>nav-active<?php endif; ?>"><a href=""><i class="fa fa-book"></i> <span>网站概况</span></a>
                <ul class="sub-menu-list">
                    <li <?php if($menu == 'webInfo'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/WebManage/webInfo');?>"> 网站信息</a></li>
                    <li <?php if($menu == 'webConfig'): ?>class="active"<?php endif; ?> > <a href="<?php echo U(MODULE_NAME.'/WebManage/webConfig');?>"> 网站配置</a></li>

                </ul>
            </li>


            <li class="menu-list <?php if($cate == UserManage): ?>nav-active<?php endif; ?>"><a href=""><i class="fa fa-book"></i> <span>用户管理</span></a>
                <ul class="sub-menu-list">
                    <li <?php if($menu == 'index'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/UserManage/index');?>"> 用户列表</a></li>
                    <!--<li <?php if($menu == 'rent'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/HouseManage/rent');?>"> 出租管理</a></li>-->
                    <!--<li <?php if($menu == 'buy'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/HouseManage/buy');?>"> 求购管理</a></li>-->
                    <!--<li <?php if($menu == 'hold'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/HouseManage/hold');?>"> 求租管理</a></li>-->
                    <!--<li <?php if($menu == 'consign'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/HouseManage/consign');?>"> 委托出售</a></li>-->
                    <!--<li <?php if($menu == 'report'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/HouseManage/report');?>"> 房源虚假举报</a></li>-->
                </ul>
            </li>

            <li class="menu-list <?php if($cate == BrowBooksManage): ?>nav-active<?php endif; ?>"><a href=""><i class="fa fa-home"></i> <span>订单管理</span></a>
                <ul class="sub-menu-list">
                    <li <?php if($menu == 'index'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/BrowBooksManage/index');?>"> 订单审核</a></li>
                    <!--<li <?php if($menu == 'check'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/BoroughManage/check');?>"> 待审核小区</a></li>-->
                    <!--<li <?php if($menu == 'updateCheck'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/BoroughManage/updateCheck');?>"> 小区更新管理</a></li>-->
                    <!--<li <?php if($menu == 'evaluate'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/BoroughManage/evaluate');?>"> 评估价更新</a></li>-->
                    <!--<li <?php if($menu == 'pingguDd'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/BoroughManage/pingguDd');?>"> 评估系数管理</a></li>-->
                </ul>
            </li>

            <!--<li class="menu-list <?php if($cate == NewHouseManage): ?>nav-active<?php endif; ?>"><a href=""><i class="fa fa-home"></i> <span>新盘管理</span></a>-->
                <!--<ul class="sub-menu-list">-->
                    <!--<li <?php if($menu == 'index'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/NewHouseManage/index');?>"> 新盘列表</a></li>-->
                    <!--<li <?php if($menu == 'add'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/NewHouseManage/add');?>"> 添加新盘</a></li>-->
                    <!--<li <?php if($menu == 'updateCheck'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/BoroughManage/updateCheck');?>"> 小区更新管理</a></li>-->
                    <!--<li <?php if($menu == 'evaluate'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/BoroughManage/evaluate');?>"> 评估价更新</a></li>-->
                    <!--<li <?php if($menu == 'pingguDd'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/BoroughManage/pingguDd');?>"> 评估系数管理</a></li>-->
                <!--</ul>-->
            <!--</li>-->

            <!--<li class="menu-list <?php if($cate == CompanyManage): ?>nav-active<?php endif; ?>"><a href=""><i class="fa fa-cogs"></i> <span>公司管理</span></a>-->
                <!--<ul class="sub-menu-list">-->
                    <!--<li <?php if($type == 0): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/CompanyManage/index',array('type'=>0));?>"> 中介公司</a></li>-->
                    <!--<li <?php if($type == 1): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/CompanyManage/index',array('type'=>1));?>"> 搬家公司</a></li>-->
                    <!--<li <?php if($type == 2): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/CompanyManage/index',array('type'=>2));?>"> 装修公司</a></li>-->
                    <!--<li <?php if($type == 3): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/CompanyManage/index',array('type'=>3));?>"> 其他公司</a></li>-->


                <!--</ul>-->
            <!--</li>-->

            <!--<li class="menu-list <?php if($cate == TrendManage): ?>nav-active<?php endif; ?>"><a href=""><i class="fa fa-bullhorn"></i> <span>房产走势</span></a>-->
                <!--<ul class="sub-menu-list">-->
                    <!--<li <?php if($menu == 'index'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/TrendManage/index');?>"> 总览</a></li>-->
                    <!--<li <?php if($menu == 'sell'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/TrendManage/sell');?>"> 二手房</a></li>-->
                    <!--<li <?php if($menu == 'rent'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/TrendManage/rent');?>"> 出租</a></li>-->
                    <!--<li <?php if($menu == 'newHouse'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/TrendManage/newHouse');?>"> 新房</a></li>-->
                    <!--<li <?php if($menu == 'office'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/TrendManage/office');?>"> 写字楼</a></li>-->
                <!--</ul>-->
            <!--</li>-->

            <!--<li class="menu-list <?php if($cate == UserManage): ?>nav-active<?php endif; ?>"><a href=""><i class="fa fa-envelope"></i> <span>会员管理</span></a>-->
                <!--<ul class="sub-menu-list">-->
                    <!--<li <?php if($menu == 'index'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/UserManage/index');?>"> 系统用户管理</a></li>-->
                    <!--<li <?php if($menu == 'group'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/UserManage/group');?>"> 用户组管理</a></li>-->
                <!--</ul>-->
            <!--</li>-->

            <!--<li class="menu-list <?php if($cate == MemberManage): ?>nav-active<?php endif; ?>" ><a href=""><i class="fa fa-tasks"></i> <span>经纪人管理</span></a>-->
                <!--<ul class="sub-menu-list">-->
                    <!--<li <?php if($menu == 'index'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/MemberManage/index');?>"> 经纪人列表</a></li>-->
                    <!--<li <?php if($menu == 'indentity'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/MemberManage/indentity');?>/status/0"> 身份审核</a></li>-->
                    <!--<li <?php if($menu == 'aptitude'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/MemberManage/aptitude');?>/status/0"> 资质审核</a></li>-->
                    <!--<li <?php if($menu == 'avatar'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/MemberManage/avatar');?>/status/0"> 头像审核</a></li>-->
                    <!--<li <?php if($menu == 'evaluate'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/MemberManage/evaluate');?>/status/0"> 评价审核</a></li>-->

                <!--</ul>-->
            <!--</li>-->
            <!--<li class="menu-list <?php if($cate == About): ?>nav-active<?php endif; ?>" ><a href=""><i class="fa fa-bar-chart-o"></i> <span>关于我们</span></a>-->
                <!--<ul class="sub-menu-list">-->
                    <!--<li <?php if($menu == 'about'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/About/about');?>"> 关于我们</a></li>-->
                    <!--<li <?php if($menu == 'talented'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/About/talented');?>"> 人才招聘</a></li>-->
                    <!--<li <?php if($menu == 'agreenment'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/About/agreenment');?>"> 用户协议</a></li>-->
                    <!--<li <?php if($menu == 'copyright'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/About/copyright');?>"> 版权声明</a></li>-->
                    <!--<li <?php if($menu == 'contact'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/About/contact');?>"> 联系我们</a></li>-->

                <!--</ul>-->
            <!--</li>-->

            <!--<li class="menu-list <?php if($cate == City): ?>nav-active<?php endif; ?>" ><a href=""><i class="fa fa-th-list"></i> <span>多城市</span></a>-->
                <!--<ul class="sub-menu-list">-->
                    <!--<li <?php if($menu == 'index'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/City/index');?>"> 城市管理</a></li>-->
                    <!--<li <?php if($menu == 'union'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/City/union');?>"> 加盟城市</a></li>-->

                <!--</ul>-->
            <!--</li>-->


            <!--<li class="menu-list <?php if($cate == SystemManage): ?>nav-active<?php endif; ?>"><a href=""><i class="fa fa-cogs"></i> <span>系统管理</span></a>-->
                <!--<ul class="sub-menu-list">-->
                    <!--<li <?php if($menu == 'dd'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/SystemManage/dd');?>"> 全局参数</a></li>-->
                    <!--<li <?php if($menu == 'appointment'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/SystemManage/appointment');?>"> 房源预约刷新</a></li>-->
                    <!--<li <?php if($menu == 'crontab'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/SystemManage/crontab');?>"> 计划任务执行</a></li>-->
                    <!--<li <?php if($menu == 'integrationRule'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/SystemManage/integrationRule');?>"> 积分规则</a></li>-->
                    <!--<li <?php if($menu == 'MessageRule'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/SystemManage/MessageRule');?>"> 自动站内信规则</a></li>-->
                    <!--<li <?php if($menu == 'integrationRule'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/SystemManage/integrationRule');?>"> 积分规则</a></li>-->
                    <!--<li <?php if($menu == 'Innernote'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/SystemManage/Innernote');?>"> 站内信</a></li>-->
                    <!--<li <?php if($menu == 'cityareaList'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/SystemManage/cityareaList');?>"> 地图区域</a></li>-->
                    <!--<li <?php if($menu == 'integrationRule'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/SystemManage/integrationRule');?>"> 积分规则</a></li>-->
                    <!--<li <?php if($menu == 'integrationRule'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/SystemManage/integrationRule');?>"> 积分规则</a></li>-->



                <!--</ul>-->
            <!--</li>-->

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
                <input type="text" class="search-input" name="searchValue"  required placeholder="一卡通号/姓名/手机号" value=""/>
                <input type="submit" value="检索"  style="margin-right:0;width:80px;"  />
            </form>
        </div>
            <table class="table table-striped" >
                <tr class="hui_top">
                    <!--<th><input type="checkbox" id="all"></th>-->
                    <th>订单编号</th>
                    <th>姓名</th>
                    <th>书的标题</th>
                    <th>isbn号</th>
                    <th>卷册号</th>
                    <th>申请时间</th>
                    <th>申请状态</th>
                    <th style="text-align:center;">操作</th>
                </tr>
                <?php if($orderList != null): if(is_array($orderList)): foreach($orderList as $key=>$orderList): ?><tr class="result_list" id="<?php echo ($orderList['id']); ?>">
                    <!--<td><input type="checkbox" id="selected" value="<?php echo ($user['id']); ?>"></td>-->
                    <td>
                        <?php echo ($orderList['id']); ?>
                    </td>
                    <td>
                        <?php echo ($orderList['user_name']); ?>
                    </td>
                    <td>
                        <?php echo ($orderList['title']); ?>
                    </td>
                    <td>
                        <?php echo ($orderList['isbn']); ?>
                    </td>
                    <td>
                        <?php echo ($orderList['volume']); ?>
                    </td>
                    <td>
                        <?php echo (date('Y-m-d H:i:s',$orderList['create_time'])); ?>
                    </td>
                    <td class="isExam_<?php echo ($user['id']); ?>">
                        <?php if($user['state'] == 1): ?><font color="#00bfff">待审核</font>
                            <?php elseif($user['state'] == 2): ?>
                                <font color="green">已激活</font>
                            <?php elseif($user['state'] == 3): ?>
                                <font color="red">已注销</font>
                            <?php else: ?>
                                已拒绝<?php endif; ?>
                    </td>
                    <td class="choose_td" align="center">
                        <div style="min-width: 80px;">
                            <?php if($user['state'] == 1): ?><a href="javascript:;" class="exam" data-id="<?php echo ($user['id']); ?>" data-state="2">激活</a>
                                <a href="javascript:;" class="exam" data-id="<?php echo ($user['id']); ?>" data-state="4">拒绝</a>
                            <?php elseif($user['state'] == 2): ?>
                                <a href="javascript:;" class="exam" data-id="<?php echo ($user['id']); ?>" data-state="3">注销</a>
                            <?php else: ?>
                                 <a href="javascript:;" class="exam" data-id="<?php echo ($user['id']); ?>" data-state="2">激活</a><?php endif; ?>
                                 <!--<a href="javascript:;" class="exam" data-id="<?php echo ($user['id']); ?>" data-state="5">删除</a>-->
                        </div>
                    </td>
                </tr><?php endforeach; endif; ?>

                <?php else: ?>
                    <tr style=" height:35px;">
                        <td colspan="8" align="center" style=" color: #18c3a7">暂无批次数据……</td>
                    </tr><?php endif; ?>
            </table>
            <!--<button style="color:blue;" id="getValue">操作</button>-->
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
    $(".exam").click(function(){
        var id      =   $(this).attr("data-id");
        var state   =   $(this).attr("data-state");
        $.ajax ({
            'url': '<?php echo U("UserManage/exam");?>',
            'type':'post',
            'data':{'id':id, 'state':state},
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