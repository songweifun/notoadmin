<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="ThemeBucket">
  <link rel="shortcut icon" href="#" type="image/png">

  <title>南农o2o后台管理</title>

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
</head>

<body class="sticky-header">

<section>
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

            <li class="menu-list <?php if($cate == Rbac): ?>nav-active<?php endif; ?>"><a href=""><i class="fa fa-home"></i> <span>权限管理</span></a>
                <ul class="sub-menu-list">
                    <li <?php if($menu == 'addRole'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/Rbac/addRole');?>"> 添加角色</a></li>
                    <li <?php if($menu == 'manageRole'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/Rbac/manageRole');?>"> 角色管理</a></li>
                    <li <?php if($menu == 'addNode'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/Rbac/addNode');?>"> 添加权限</a></li>
                    <li <?php if($menu == 'manageNode'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/Rbac/manageNode');?>"> 权限管理</a></li>
                    <li <?php if($menu == 'addAdmin'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/Rbac/addAdmin');?>"> 添加管理员</a></li>
                    <li <?php if($menu == 'manageAdmin'): ?>class="active"<?php endif; ?> ><a href="<?php echo U(MODULE_NAME.'/Rbac/manageAdmin');?>"> 管理员管理</a></li>
                </ul>
            </li>

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

    <!-- main content start-->
    <div class="main-content" >

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




        <!-- page heading start-->
        <div class="page-heading">
            <h3>
                Dashboard
            </h3>
                <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li class="active"> My Dashboard </li>
            </ul>
            <div class="state-info">
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>yearly expense</span>
                            <h3 class="red-txt">$ 45,600</h3>
                        </div>
                        <div id="income" class="chart-bar"></div>
                    </div>
                </section>
                <section class="panel">
                    <div class="panel-body">
                        <div class="summary">
                            <span>yearly  income</span>
                            <h3 class="green-txt">$ 45,600</h3>
                        </div>
                        <div id="expense" class="chart-bar"></div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page heading end-->

        <!--body wrapper start-->
        <div class="wrapper">
            <div class="row">
                <div class="col-md-6">
                    <!--statistics start-->
                    <div class="row state-overview">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel purple">
                                <div class="symbol">
                                    <i class="fa fa-gavel"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value">230</div>
                                    <div class="title">New Order</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel red">
                                <div class="symbol">
                                    <i class="fa fa-tags"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value">3490</div>
                                    <div class="title">Copy Sold</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row state-overview">
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel blue">
                                <div class="symbol">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value">22014</div>
                                    <div class="title"> Total Revenue</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6">
                            <div class="panel green">
                                <div class="symbol">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value">390</div>
                                    <div class="title"> Unique Visitors</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--statistics end-->
                </div>
                <div class="col-md-6">
                    <!--more statistics box start-->
                    <div class="panel deep-purple-box">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-7 col-sm-7 col-xs-7">
                                    <div id="graph-donut" class="revenue-graph"></div>

                                </div>
                                <div class="col-md-5 col-sm-5 col-xs-5">
                                    <ul class="bar-legend">
                                        <li><span class="blue"></span> Open rate</li>
                                        <li><span class="green"></span> Click rate</li>
                                        <li><span class="purple"></span> Share rate</li>
                                        <li><span class="red"></span> Unsubscribed rate</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--more statistics box end-->
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row revenue-states">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <h4>Monthly revenue report</h4>
                                    <div class="icheck">
                                        <div class="square-red single-row">
                                            <div class="checkbox ">
                                                <input type="checkbox" checked>
                                                <label>Online</label>
                                            </div>
                                        </div>
                                        <div class="square-blue single-row">
                                            <div class="checkbox ">
                                                <input type="checkbox">
                                                <label>Offline </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <ul class="revenue-nav">
                                        <li><a href="#">weekly</a></li>
                                        <li><a href="#">monthly</a></li>
                                        <li class="active"><a href="#">yearly</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="clearfix">
                                        <div id="main-chart-legend" class="pull-right">
                                        </div>
                                    </div>

                                    <div id="main-chart">
                                        <div id="main-chart-container" class="main-chart">
                                        </div>
                                    </div>
                                    <ul class="revenue-short-info">
                                        <li>
                                            <h1 class="red">15%</h1>
                                            <p>Server Load</p>
                                        </li>
                                        <li>
                                            <h1 class="purple">30%</h1>
                                            <p>Disk Space</p>
                                        </li>
                                        <li>
                                            <h1 class="green">84%</h1>
                                            <p>Transferred</p>
                                        </li>
                                        <li>
                                            <h1 class="blue">28%</h1>
                                            <p>Temperature</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <header class="panel-heading">
                            goal progress
                            <span class="tools pull-right">
                                <a href="javascript:;" class="fa fa-chevron-down"></a>
                                <a href="javascript:;" class="fa fa-times"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <ul class="goal-progress">
                                <li>
                                    <div class="prog-avatar">
                                        <img src="/notoadmin/Application/Admin/View/Public/images/photos/user1.png" alt=""/>
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            <a href="#">John Doe</a> - Project Lead
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                                <span class="">70%</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="prog-avatar">
                                        <img src="/notoadmin/Application/Admin/View/Public/images/photos/user2.png" alt=""/>
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            <a href="#">Cameron Doe</a> - Sales
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 91%">
                                                <span class="">91%</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="prog-avatar">
                                        <img src="/notoadmin/Application/Admin/View/Public/images/photos/user3.png" alt=""/>
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            <a href="#">Hoffman Doe</a> - Support
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                                <span class="">40%</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="prog-avatar">
                                        <img src="/notoadmin/Application/Admin/View/Public/images/photos/user4.png" alt=""/>
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            <a href="#">Jane Doe</a> - Marketing
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                                <span class="">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="prog-avatar">
                                        <img src="/notoadmin/Application/Admin/View/Public/images/photos/user5.png" alt=""/>
                                    </div>
                                    <div class="details">
                                        <div class="title">
                                            <a href="#">Hoffman Doe</a> - Support
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                <span class="">45%</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="text-center"><a href="#">View all Goals</a></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-body extra-pad">
                            <h4 class="pros-title">prospective <span>leads</span></h4>
                            <div class="row">
                                <div class="col-sm-4 col-xs-4">
                                    <div id="p-lead-1"></div>
                                    <p class="p-chart-title">Laptop</p>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div id="p-lead-2"></div>
                                    <p class="p-chart-title">iPhone</p>
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <div id="p-lead-3"></div>
                                    <p class="p-chart-title">iPad</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-body extra-pad">
                            <div class="col-sm-6 col-xs-6">
                                <div class="v-title">Visits</div>
                                <div class="v-value">10,090</div>
                                <div id="visit-1"></div>
                                <div class="v-info">Pages/Visit</div>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <div class="v-title">Unique Visitors</div>
                                <div class="v-value">8,173</div>
                                <div id="visit-2"></div>
                                <div class="v-info">Avg. Visit Duration</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="panel green-box">
                        <div class="panel-body extra-pad">
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="knob">
                                        <span class="chart" data-percent="79">
                                            <span class="percent">79% <span class="sm">New Visit</span></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="knob">
                                        <span class="chart" data-percent="56">
                                            <span class="percent">56% <span class="sm">Bounce rate</span></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="calendar-block ">
                                <div class="cal1">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel">
                        <header class="panel-heading">
                            Todo List
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <ul class="to-do-list" id="sortable-todo">
                                <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check"/>
                                        <label for="todo-check"></label>
                                    </div>
                                    <p class="todo-title">
                                        Dashboard Design & Wiget placement
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">

                                        <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check1"/>
                                        <label for="todo-check1"></label>
                                    </div>
                                    <p class="todo-title">
                                        Wireframe prepare for new design
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">

                                        <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check2"/>
                                        <label for="todo-check2"></label>
                                    </div>
                                    <p class="todo-title">
                                        UI perfection testing for Mega Section
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">

                                        <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check3"/>
                                        <label for="todo-check3"></label>
                                    </div>
                                    <p class="todo-title">
                                        Wiget & Design placement
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">

                                        <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>
                                <li class="clearfix">
                                    <span class="drag-marker">
                                    <i></i>
                                    </span>
                                    <div class="todo-check pull-left">
                                        <input type="checkbox" value="None" id="todo-check4"/>
                                        <label for="todo-check4"></label>
                                    </div>
                                    <p class="todo-title">
                                        Development & Wiget placement
                                    </p>
                                    <div class="todo-actionlist pull-right clearfix">

                                        <a href="#" class="todo-remove"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>

                            </ul>
                            <div class="row">
                                <div class="col-md-12">
                                    <form role="form" class="form-inline">
                                        <div class="form-group todo-entry">
                                            <input type="text" placeholder="Enter your ToDo List" class="form-control" style="width: 100%">
                                        </div>
                                        <button class="btn btn-primary pull-right" type="submit">+</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel blue-box twt-info">
                        <div class="panel-body">
                            <h3>19 Februay 2014</h3>

                            <p>AdminEx is new model of admin
                            dashboard <a href="#">http://t.co/3laCVziTw4</a>
                            4 days ago by John Doe</p>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="media usr-info">
                                <a href="#" class="pull-left">
                                    <img class="thumb" src="/notoadmin/Application/Admin/View/Public/images/photos/user2.png" alt=""/>
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">Mila Watson</h4>
                                    <span>Senior UI Designer</span>
                                    <p>I use to design websites and applications for the web.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer custom-trq-footer">
                            <ul class="user-states">
                                <li>
                                    <i class="fa fa-heart"></i> 127
                                </li>
                                <li>
                                    <i class="fa fa-eye"></i> 853
                                </li>
                                <li>
                                    <i class="fa fa-user"></i> 311
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--body wrapper end-->

        <!--footer section start-->
<footer>
    2017-2020 &copy;  by <a href="http://www.6doffice.com/" target="_blank">宝和数据</a>
</footer>
<!--footer section end-->


    </div>
    <!-- main content end-->
</section>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/notoadmin/Application/Admin/View/Public/js/jquery-1.10.2.min.js"></script>
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