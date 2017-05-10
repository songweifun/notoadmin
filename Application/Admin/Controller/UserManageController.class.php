<?php
/**
 * Created by PhpStorm.
 * User: syg
 * Date: 2017/5/10
 * Time: 14:04
 * job:南农后台人员管理
 */
namespace Admin\Controller;
class UserManageController extends CommonController
{
    public function _initialize()
    {
//        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->cate=CONTROLLER_NAME;
    }
    //申请用户显示
    public function index(){
        $this->menu=ACTION_NAME;
        $searchValue  =   trim(I('post.searchValue'));
        if($searchValue){
            $where = "card='".$searchValue."' or user_name='".$searchValue."' or phone='".$searchValue."'";
        }
        $user    =    M('User as u')
            ->join('noto_user_detail as d on u.id=d.user_id','LEFT')
            ->order('create_time desc')
            ->where($where)
            ->select();
        $this->assign('user',$user);
        $this->display();
    }
    //馆员操作
    public function exam(){
        $this->menu=ACTION_NAME;
        if(IS_POST){
            $id     =   intval(I('post.id'));
            $state  =   intval(I('post.state'));
            $where  =   "id='".$id."'";
            $data['state']   =   $state;
            $res    =    M('User')->data($data)->where($where)->save();
            if ($res) {
                $return['code']    =    200;
                $return['msg']     =    '操作成功！';
            } else {
                $return['code']    =    400;
                $return['msg']     =    '操作失败！';
            }
        }else{
            $return['code']    =    400;
            $return['msg']     =    '操作失败！';
        }
        $this->ajaxReturn($return);exit;

    }

}