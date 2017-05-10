<?php
/**
 * Created by PhpStorm.
 * User: daivd
 * Date: 2017/5/10
 * Time: 下午2:57
 */

namespace Admin\Controller;
use Think\Controller;

//公共模块
class CommonCtroller extends Controller
{

    public function _initialize(){
        if ($_COOKIE['AUTH_STRING']) {
            if (!$_COOKIE['AUTH_CHECKTIME']) {
                // 间隔AUTH_CHECKTIME时间检查一次cookie信息是否和数据库一至
                $authInfo = D('AdminUser')->getAuthInfo();
                $user=D('AdminUser')->where(array('user_id'=>$authInfo['user_id'],'password'=>$authInfo['passwd']))->find();
                if ($user['user_id']) {//根据cookiez中的用户名密码查找到了
                    //setcookie('AUTH_STRING',authcode($user['user_id'] . "\t" . $user['passwd'], 'ENCODE', C('AUTH_KEY')),0,'/',C('COOKIE_DOMAIN'));
                    setcookie('AUTH_CHECKTIME', 1, time() + C('AUTH_CHECKTIME'),'/',C('COOKIE_DOMAIN'));
                }else{//根据cookiez中的用户名密码了没查找到用户直接退出
                    setcookie('AUTH_STRING', 0, time()-1,'/',C('COOKIE_DOMAIN'));
                }
            }
        }else{
            $this->redirect('Login/index');
        }
    }


}