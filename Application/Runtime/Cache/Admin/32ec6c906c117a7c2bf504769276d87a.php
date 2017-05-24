<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>Login</title>
    <script src="/notoadmin/Application/Admin/View/Public/js/jquery-1.10.2.min.js"></script>
    <script src="/notoadmin/Application/Admin/View/Public/js/bootstrap.min.js"></script>
    <script src="/notoadmin/Application/Admin/View/Public/js/modernizr.min.js"></script>


    <link href="/notoadmin/Application/Admin/View/Public/css/style.css" rel="stylesheet">
    <link href="/notoadmin/Application/Admin/View/Public/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/notoadmin/Application/Admin/View/Public/js/html5shiv.js"></script>
    <script src="/notoadmin/Application/Admin/View/Public/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="<?php echo U(MODULE_NAME.'/Login/login');?>" method="post">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">后台登录</h1>
            <img src="/notoadmin/Application/Admin/View/Public/images/logo-login.png" alt=""/>
        </div>
        <div class="login-wrap">
            <input type="text" class="form-control" placeholder="用户名" name="name" autofocus>
            <input type="password" class="form-control" placeholder="密码" name="password">
            <input type="text" class="form-control" placeholder="验证码" name="verify" style="width: 150px;float: left">
            <img src="<?php echo U(MODULE_NAME.'/Login/verify');?>" alt="" style="float: left;width: 100px;height: 38px;margin-left: 10px" id="verifyimage">
            <script>
                $('#verifyimage').click(function(){
                    var src=$(this).attr('src');
                    $(this).attr('src',src+'/'+Math.random())
                })
            </script>

            <button class="btn btn-lg btn-login btn-block" type="submit">
                <i class="fa fa-check"></i>
            </button>

            <div class="registration">
                Not a member yet?
                <a class="" href="registration.html">
                    Signup
                </a>
            </div>
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>

        </div>

        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Forgot Password ?</h4>
                    </div>
                    <div class="modal-body">
                        <p>Enter your e-mail address below to reset your password.</p>
                        <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                        <button class="btn btn-primary" type="button">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- modal -->

    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->

</body>
</html>