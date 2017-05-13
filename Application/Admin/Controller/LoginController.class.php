<?php
/**
 * Created by PhpStorm.
 * User: daivd
 * Date: 2017/5/10
 * Time: 下午2:52
 */

namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;
//登录模块
class LoginController extends Controller
{

    //登录页面
    public function index(){

        $this->display();
    }


    /**
     * 验证码
     */
    public function verify(){
        $Verify = new \Think\Verify();
        $Verify->fontSiz=16;
        $Verify->length   = 1;
        $Verify->useNoise = false;
        $Verify->imageW  = 100;
        $Verify->imageH  = 50;
        $Verify->entry();
    }

    /**
     * 登录验证
     */
    public function login(){
        //p($_POST);
        $code=I('post.verify');
        $verify = new \Think\Verify();
        $user=D('AdminUser');
        $username=trim(I('post.name'));
        $passwd=I('post.password');
        //echo $passwd;
        $userInfo=$user->where(array('user_name'=>$username))->find();
        if(!$verify->check($code)) $this->error('验证码错误');
        //echo "<pre>";print_r($userInfo);
        //die;
        if(!$userInfo){
            $this->error('用户名不存在');
        }else{
            if($userInfo['password']!=md5($passwd)){
                $this->error('密码错误');
            }else{
                if(isset($notForget) && $notForget==1){//记住密码一年
                    setcookie('AUTH_STRING',authcode($userInfo['id'] . "\t" . md5($passwd), 'ENCODE', C('AUTH_KEY')),time()+84600,'/',C('COOKIE_DOMAIN'));
                }else{
                    setcookie('AUTH_STRING',authcode($userInfo['id'] . "\t" . md5($passwd), 'ENCODE', C('AUTH_KEY')),0,'/',C('COOKIE_DOMAIN'));
                }

                //setcookie('AUTH_STRINGS','wwwwwww',0,'/',C('COOKIE_DOMAIN'));
                setcookie('ADMIN_USERID_KSY',$userInfo['id'],time()+C('AUTH_TIME'),'/',C('COOKIE_DOMAIN'));//注意路径
                setcookie('ADMIN_LIBID',$userInfo['library_id'],0,'/',C('COOKIE_DOMAIN'));//存入图书馆Id
                session(C('USER_AUTH_KEY'),$userInfo['id']);//注意这个是使用rbac时必须要有的
                //$user_name = D('AdminUser')->getAuthInfo('user_name');
                //echo $user_name;
                //echo C('RBAC_SUPERADMIN');
                //die;
                if($username==C('RBAC_SUPERADMIN')){

                    session(C('ADMIN_AUTH_KEY'),true);


                }
                import("Org.Util.Rbac");
                Rbac::saveAccessList();


                $this->redirect('Index/index');
            }
        }
    }

}