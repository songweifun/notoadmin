<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">
    <title><?php echo ($menuname); ?></title>
    <script src="/notoadmin/Application/Admin/View/Public/js/jquery-1.10.2.min.js"></script>

    <!-- bootstrap -->

    <link href="/notoadmin/Application/Admin/View/Public/css/bootstrap.css" rel="stylesheet">
    <script src="/notoadmin/Application/Admin/View/Public/js/bootstrap.min.js"></script>



    <!--dashboard calendar-->
    <link href="/notoadmin/Application/Admin/View/Public/css/clndr.css" rel="stylesheet">


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
    <!-- cikonss -->
    <link rel="stylesheet" href="/notoadmin/Application/Admin/View/Public/css/cikonss/cikonss.css">
    <!-- select2 -->
    <link rel="stylesheet" href="/notoadmin/Application/Admin/View/Public/js/angularjs-select2/common/common.css">
    <link rel="stylesheet" href="/notoadmin/Application/Admin/View/Public/js/angularjs-select2/common/plugins/select2/select2.css" />
    <link rel="stylesheet" href="/notoadmin/Application/Admin/View/Public/js/angularjs-select2/common/plugins/select2/select2-bootstrap.css" />
    <script src="/notoadmin/Application/Admin/View/Public/js/angularjs-select2/common/plugins/select2/select2.min.js" type="text/javascript"></script>

    <!-- commonjs -->

    <!-- commoncss -->
    <link rel="stylesheet" href="/notoadmin/Application/Admin/View/Public/css/common.css">

    <!-- tree view -->
    <!--external css-->
    <link rel="stylesheet" type="text/css" href="/notoadmin/Application/Admin/View/Public/js/fuelux/css/tree-style.css" />
    <link href="/notoadmin/Application/Admin/View/Public/css/style.css" rel="stylesheet">
    <link href="/notoadmin/Application/Admin/View/Public/css/style-responsive.css" rel="stylesheet">







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
        <!--<input type="text" disabled class="form-control" name="keyword" placeholder="Search here..." />-->
        <!--<span>江苏宝和数据有限公司</span>-->
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
                    范老板
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

        <!-- page heading start-->
        <div class="page-heading">

            <ul class="breadcrumb">
                <li>
                    <a href="#">用户管理</a>
                </li>
                <li class="active"> 用户审核 </li>
            </ul>

        </div>
        <!-- page heading end-->
<div class="container" ng-app="myApps" ng-controller="myCtrl">
    <div class="row">
        <div class="table-responsive" class="col-md-8">

        <div class="totol " style="float:right;">
            <form action="<?php echo U('UserManage/index');?>" method="post">
                <input type="text" class="search-input" name="searchValue"  required placeholder="一卡通号/姓名/手机号" value=""/>
                <input type="submit" value="检索"  class="btn btn-primary btn-sm"   />
            </form>
        </div>

            <table class="table table-hover table-bordered table-striped table-condensed" >
                <thead>
                    <tr class="success hui_top" >
                        <th><input type="checkbox" id="all"></th>
                        <th>一卡通号</th>
                        <th>姓名</th>
                        <th>性别</th>
                        <th>专业</th>
                        <th>手机号</th>
                        <th>个性签名</th>
                        <th>状态</th>
                        <th style="text-align:center;">操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($user != null): if(is_array($user)): foreach($user as $key=>$user): ?><tr class="result_list">
                    <td><input type="checkbox" value="<?php echo ($user['id']); ?>"></td>
                    <td>
                        <?php echo ($user['card']); ?>
                    </td>
                    <td>
                        <?php echo ($user['user_name']); ?>
                    </td>
                    <td>
                        <?php if($user['sex'] == 1): ?>男
                        <?php else: ?>
                            女<?php endif; ?>
                    </td>
                    <td>
                        <?php echo ($user['profession']); ?>
                    </td>
                    <td>
                        <?php echo ($user['phone']); ?>
                    </td>
                    <td>
                        <?php echo ($user['discription']); ?>
                    </td>
                    <td class="isExam_<?php echo ($user['id']); ?>">
                        <?php if($user['state'] == 1): ?><font color="#00bfff">待审核</font>
                            <?php elseif($user['state'] == 2): ?>
                                <font color="blue">已激活</font>
                            <?php elseif($user['state'] == 3): ?>
                                <font color="grey">已注销</font>
                            <?php else: ?>
                                <font color="red">已拒绝</font><?php endif; ?>
                    </td>
                    <td class="choose_td" align="center">
                        <div style="min-width: 80px;">
                            <?php if($user['state'] == 1): ?><a href="javascript:;" class="btn btn-primary btn-sm exam" data-id="<?php echo ($user['id']); ?>" data-state="2">激活</a>
                                <a href="javascript:;" class="btn btn-primary btn-sm exam" data-id="<?php echo ($user['id']); ?>" data-state="4">拒绝</a>
                            <?php elseif($user['state'] == 2): ?>
                                <a href="javascript:;" class="btn btn-primary btn-sm exam" data-id="<?php echo ($user['id']); ?>" data-state="3">注销</a>
                            <?php else: ?>
                                 <a href="javascript:;" class="btn btn-primary btn-sm exam" data-id="<?php echo ($user['id']); ?>" data-state="2">再次激活</a><?php endif; ?>
                                 <!--<a href="javascript:;" class="exam" data-id="<?php echo ($user['id']); ?>" data-state="5">删除</a>-->
                        </div>
                    </td>
                </tr><?php endforeach; endif; ?>

                <?php else: ?>
                    <tr style=" height:35px;">
                        <td colspan="8" align="center" style=" color: #18c3a7">暂无批次数据……</td>
                    </tr><?php endif; ?>
                </tbody>
            </table>

        <button  type="button" class="btn btn-primary btn-sm" id="getValue" data-toggle="modal" data-target="#myModal">激活</button>
            <div style="float:right;">
            <?php if($page_count > 1): ?><div class="page">
                    <a href="javascript:void(0);" class="jump">跳转</a>
                    <input type="text" class="rt number" style="width:80px;">
                    <?php if($_GET['page'] < page_count): ?><a href="javascript:void(0);" class="rt next">&nbsp;Next</a><?php endif; ?>
                    <span class="rt">
                        <span class="current"><?php echo ($page); ?></span>/<span class="all"><?php echo ($page_count); ?></span>
                    </span>
                    <?php if($_GET['page'] > 1): ?><a href="javascript:void(0);" class="rt prev">Previous&nbsp;</a><?php endif; ?>
                </div><?php endif; ?>
            </div>
        </div>
    </div>
</div>
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
        location = "<?php echo U('UserManage/index');?>?page="+page;
    });
    //上一页
    $("a.prev").click(function(){
        var page = parseInt($(".current").text())-1;
        location = "<?php echo U('UserManage/index');?>?page="+page;
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
        location = "<?php echo U('UserManage/index');?>?page="+jump_page;
    });
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
                    layer.alert(data.msg);
                    window.location.reload();//刷新当前页面.
                }else{
                    layer.alert(data.msg);
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
            'url' :'<?php echo U("UserManage/pass");?>',
            'type':'post',
            'data': {'arrId':vals},
            'dataType':'json',
            'success':function(data){
//                alert(data);
                if (data.code == 200) {
                    layer.alert(data.msg);
                    window.location.reload();//刷新当前页面.
                }else{
                    layer.alert(data.msg);
                }
            }
        });
    });
</script>

<!-- Placed js at the end of the document so the pages load faster -->
<script src="/notoadmin/Application/Admin/View/Public/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/jquery-migrate-1.2.1.min.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/modernizr.min.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/jquery.nicescroll.js"></script>



<!--common scripts for all pages-->
<script src="/notoadmin/Application/Admin/View/Public/js/scripts.js"></script>

<!-- 代码高亮 -->

<link rel="stylesheet" href="/notoadmin/Application/Admin/View/Public/js/google-code-prettify/prettify.css">
<script src="/notoadmin/Application/Admin/View/Public/js/google-code-prettify/prettify.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/google-code-prettify/run_prettify.js"></script>


<!-- angular-tree-control -->

<script type="text/javascript" src="/notoadmin/Application/Admin/View/Public/js/angular-self/module/angular-tree-control/angular-tree-control.js"></script>
<link rel="stylesheet" type="text/css" href="/notoadmin/Application/Admin/View/Public/js/angular-self/module/angular-tree-control/css/tree-control.css">
<link rel="stylesheet" type="text/css" href="/notoadmin/Application/Admin/View/Public/js/angular-self/module/angular-tree-control/css/tree-control-attribute.css">


<!-- page分页 -->
<script src="/notoadmin/Application/Admin/View/Public/js/angular-self/module/pagination/tm.pagination.js"></script>

<!-- angular-file-upload -->
<script src="/notoadmin/Application/Admin/View/Public/js/angular-self/module/angular-file-upload/dist/angular-file-upload.js"></script>


<script src="/notoadmin/Application/Admin/View/Public/js/angular-self/app.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/angular-self/service/service.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/angular-self/directive/directive.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/angular-self/controller/controller.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/angular-self/filter/filter.js"></script>

<!--tree-->
<script src="/notoadmin/Application/Admin/View/Public/js/fuelux/js/tree.min.js"></script>
<script src="/notoadmin/Application/Admin/View/Public/js/tree-init.js"></script>
<!-- font-awesome -->
<link rel="stylesheet" href="/notoadmin/Application/Admin/View/Public/fonts/css/font-awesome.min.css">