<?php
/**
 * Created by PhpStorm.
 * User: daivd
 * Date: 2017/5/10
 * Time: 下午2:57
 */

namespace Admin\Controller;
use Org\Util\Rbac;
use Think\Controller;

//公共模块
class CommonController extends Controller
{

    public function _initialize(){
        if ($_COOKIE['AUTH_STRING']) {
            if (!$_COOKIE['AUTH_CHECKTIME']) {
                // 间隔AUTH_CHECKTIME时间检查一次cookie信息是否和数据库一至
                $authInfo = D('AdminUser')->getAuthInfo();
                $user=D('AdminUser')->where(array('id'=>$authInfo['user_id'],'password'=>$authInfo['passwd']))->find();
                if ($user['id']) {//根据cookiez中的用户名密码查找到了
                    //setcookie('AUTH_STRING',authcode($user['user_id'] . "\t" . $user['passwd'], 'ENCODE', C('AUTH_KEY')),0,'/',C('COOKIE_DOMAIN'));
                    setcookie('AUTH_CHECKTIME',1, time() + C('AUTH_CHECKTIME'),'/',C('COOKIE_DOMAIN'));
                }else{//根据cookiez中的用户名密码了没查找到用户直接退出
                    setcookie('AUTH_STRING', 0, time()-1,'/',C('COOKIE_DOMAIN'));
                }
            }
        }else{
            $this->redirect('Login/index');
        }

        //RBAC认证机制
        $notAuth=in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE')))||in_array(MODULE_NAME,explode(',',C('NOT_AUTH_ACTION')));
        if(C('USER_AUTH_ON')&&!$notAuth){

            import("Org.Util.Rbac");
            if(!Rbac::AccessDecision()){
                $this->error('对不起您没有权限',U('Index/index'));
            }

        }

        //控制左侧菜单栏的控件
        if ($_SESSION[C('ADMIN_AUTH_KEY')]){
            $menuList=D('adminNode')->relation(true)->where(array('level'=>2))->select();
            $this->menuList=$menuList;
        }else{
            $menuList=D('adminNode')->relation(true)->where(array('level'=>2))->select();
            $accessList=$_SESSION['_ACCESS_LIST'];
            //dump($menuList);die;
            foreach ($menuList as $k=>$v){ //一层
                foreach ($accessList['ADMIN'] as $kk=>$vv){//二层
                    if($kk==strtoupper($v['name'])){
                        $arr[$kk]=$v;
                        unset($arr[$kk]['node']);
                        foreach ($v['node'] as $kkk=>$vvv){
                            foreach ($vv as $kkkk=>$vvvv){
                                if($kkkk==strtoupper($vvv['name'])){
                                    $arr[$kk]['node'][]=$vvv;
                                }
                            }
                        }

//                        foreach ($vv as $kkk=>$vvv){
//                            //三层
//                            $arr[$kk]=$v;
//                            unset($arr[$kk]['node']);
//                            foreach ($vvv as $kkkk=>$vvvv){//四层
//                                if($kkkk==strtoupper($vvv['name'])){
//                                    $arr[$kk]['node'][]=$vvv;
//                                }
//                            }
//                        }
                    }
                }

            }

            $this->menuList=$arr;
            //dump($arr);die;

        }

        //dump($menuList);die;





    }


}