<?php
/**
 * Created by PhpStorm.
 * User: daivd
 * Date: 2017/5/11
 * Time: 下午4:44
 */

namespace Admin\Controller;

/**
 * 权限管理
 * Class RbacController
 * @package Admin\Controller
 */
class RbacController extends CommonController
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->cate=CONTROLLER_NAME;
    }
    //添加角色
    public function addRole(){
        $this->menu  =  ACTION_NAME;

        $this->display();
    }

    //添加角色异步方法
    public function addRoleHandle(){
        if(M('adminRole')->add($_POST)){
            echo json_encode(array('status'=>true,'msg'=>'添加成功'));
        }else{
            echo json_encode(array('status'=>false,'msg'=>'添加失败'));
        }
        die;
    }
    //角色管理
    public function manageRole(){

        $action=I('get.action');
        //获得roleList接口
        if($action=='getRoleList'){
            $roleList=M('adminRole')->select();
            echo json_encode($roleList);
            die;


        }elseif ($action=='addAccess'){
            $role_id=$_POST['role_id'];
            //echo $role_id;die;
            //print_r(json_decode($_POST['access'],true));die;

            if(count(json_decode($_POST['access'],true))>0){
                M('adminAccess')->where(array('role_id'=>$role_id))->delete();//删除这个角色的所欲权限
                foreach (json_decode($_POST['access'],true) as $k=>$v){
                    $tmp=explode('_',$v);
                    $data[]=array(
                      'role_id'=>$role_id,
                       'node_id'=>$tmp[0],
                       'level'=>$tmp[1]
                    );
                }
                //print_r($data);die;
                if(M('adminAccess')->addAll($data)){
                    echo json_encode(array('status'=>true,'msg'=>'权限配置成功'));
                }else{
                    echo json_encode(array('status'=>false,'msg'=>'权限配置失败'));
                }

            }else{
                echo json_encode(array('status'=>false,'msg'=>'您没有为这个角色配置任何权限'));
            }
            //print_r($_POST['access']);
            die;
        }

        $this->menu  =  ACTION_NAME;
        $this->display();

    }

    //权限管理
    public function manageNode(){

        $action=I('get.action');
        $adminNode=M('adminNode');
        //获得nodeList接口
        if($action=='getNodeList'){
            $nodeList=M('adminNode')->order('sort')->select();
            $nodeList=Ancestry($nodeList,0);
            echo json_encode($nodeList);
            die;


        }elseif($action=='getPidNodeList'){
            //获得可以作为父节点的下拉列表
            $nodePidList=M('adminNode')->where("level !=3")->order('sort')->select();
            //$nodePidList=M('adminNode')->where("level !=3")->order('sort')->select();
            //array_unshift($nodePidList, array('id'=>1,'title'=>'根节点'));
            $nodePidList=Ancestry($nodePidList,0);



            echo json_encode($nodePidList);
            die;


        }elseif ($action=='addNode'){

            if($adminNode->add($_POST)){
                echo json_encode(array('status'=>true,'msg'=>'添加成功'));
            }else{
                echo json_encode(array('status'=>false,'msg'=>'添加失败'));
            }
            die;



        }elseif ($action=='deleteNode'){
            $id=I('get.id');
            if($adminNode->where(array('id'=>$id))->delete()){
                M('adminAccess')->where(array('node_id'=>$id))->delete();
                echo json_encode(array('status'=>true,'msg'=>'删除成功'));
            }else{
                echo json_encode(array('status'=>false,'msg'=>'删除失败'));
            }
            die;


        }

        $this->menu  =  ACTION_NAME;
        $this->display();

    }


    //管理馆员
    public function manageAdmin(){

        $action=I('get.action');
        $adminUser=D('AdminUser');
        //获得nodeList接口
        if($action=='getAdminList'){
            //$adminList=$adminUser->select();
            $adminList=$adminUser->relation(true)->where(array('library_id'=>$_COOKIE['ADMIN_LIBID']))->select();
            $roleList=M('adminRole')->select();
            foreach ($adminList as $k=>$v){
                foreach ($roleList as $kk=>$vv){
                    if($v['role_id']==$vv['id']){
                        $adminList[$k]['rolename']=$vv['name'];
                    }
                }
            }
            //$adminList=Ancestry($adminList,0);
            echo json_encode($adminList);
            die;


        }elseif ($action=='getNodeListAcess'){

            //获得指定角色带权限的节点列表接口
            $role_id=I('get.role_id');
            $nodeList=M('adminNode')->order('sort')->select();
            //$accessList=M('adminAccess')->where(array(''))->select();
            foreach ($nodeList as $k=>$v){
                //将原来已经设置过的权限通过access字段组织进去
                if (M('adminAccess')->where(array('role_id'=>$role_id,'node_id'=>$v['id']))->count()){
                    $nodeList[$k]['access']=1;
                }else{
                    $nodeList[$k]['access']=0;
                }
            }
            $nodeList=Ancestry($nodeList,0);
            echo json_encode($nodeList);
            die;


        }elseif($action=='addAdmin'){
            //添加 编辑 馆员接口

            //print_r($_POST);die;


            $_POST['library_id']=$_COOKIE['ADMIN_LIBID'];
            $_POST['password']=md5($_POST['password']);
            $_POST['logintime']=time();
            $_POST['loginip']=get_client_ip();
            $_POST['password']=md5($_POST['password']);
            $_POST['status']=1;

            if ($_POST['id']){
                //编辑
                $id=$_POST['id'];
                unset($_POST['id']);
                if($user_id=M('adminUser')->where(array('id'=>$id))->save($_POST)){//插入admin_user表

                    $_POST['user_id']=$id;
                    M('adminRoleUser')->where(array('user_id'=>$id))->save($_POST);//出入role_user关联表
                    echo json_encode(array('status'=>true,'msg'=>'编辑成功'));
                }else{
                    echo json_encode(array('status'=>false,'msg'=>'编辑失败'));
                }

            }else{
                //添加
                if($user_id=M('adminUser')->add($_POST)){//插入admin_user表
                    echo json_encode(array('status'=>true,'msg'=>'添加成功'));
                    $_POST['user_id']=$user_id;
                    M('adminRoleUser')->add($_POST);//出入role_user关联表
                }else{
                    echo json_encode(array('status'=>false,'msg'=>'添加失败'));
                }

            }


            die;



        }elseif ($action=='deleteAdmin'){
            //删除馆员接口
            $id=I('get.id');
            if($adminUser->where(array('id'=>$id))->delete()){
                M('adminRoleUser')->where(array('user_id'=>$id))->delete();
                echo json_encode(array('status'=>true,'msg'=>'删除成功'));
            }else{
                echo json_encode(array('status'=>false,'msg'=>'删除失败'));
            }
            die;


        }elseif ($action=='getOneAdmin'){
            //获得单个馆员信息接口
            $id=I('get.id');
            $adminOne=$adminUser->relation(true)->where(array('id'=>$id))->find();
            echo json_encode($adminOne);
            die;



        }

        $this->menu  =  ACTION_NAME;
        $this->display();

    }

}