<?php
/**
 * Created by PhpStorm.
 * User: syg
 * Date: 2017/5/10
 * Time: 15:34
 * job:南农后台人员管理
 */
namespace Admin\Controller;

class BrowBooksManageController extends CommonController
{
    public function _initialize()
    {
        //parent::_initialize(); // TODO: Change the autogenerated stub
        $this->cate=CONTROLLER_NAME;
    }
    //订单显示
    public function index(){
        $this->menu  =  ACTION_NAME;
        $library_id  =  $_COOKIE['ADMIN_LIBID'];
        $searchValue  =   trim(I('post.searchValue'));
        $where        =    "o.library_id='".$library_id."'";
        if($searchValue){
            $where    .= "and u.card='".$searchValue."' or u.user_name='".$searchValue."' or o.id='".$searchValue."'";
        }

        $orderList   =   M('Order as o')
                    ->join('noto_user as u on u.id=o.user_id')
                    ->join('noto_user_address as a on a.address_id=o.address_id')
                    ->field('o.id,u.card,u.user_name,a.consignee,a.tel,a.province,a.city,a.county,a.street,a.detail_address,o.create_time,o.status')
//                    ->where("o.library_id='".$library_id."'")
                    ->order('o.create_time desc')
                    ->select();
        $this->assign('orderList',$orderList);

        $this->display();
    }

    //订单审核
    public function operation(){
        $library_id  =  $_COOKIE['ADMIN_LIBID'];
        if(IS_POST){
            $id      =  intval(I('post.id'));
            $status  =  intval(I('post.status'));
            $where   =  "id = '".$id."'";
            $data['status'] = $status;
            $user_id   =  M('Order')->where("id='".$id."'")->getField('user_id');
            $user_name =  M('User')->where("id='".$user_id."'")->getField('user_name');
            if($status == 3){
                $data1 = array();
                $message = $this->sendWebMessage($type=1);
                $data1['msg_from']    =  123;
                $data1['msg_to']      =  $user_id;
                $data1['msg_title']   =  $message['rule_name'];
                $data1['msg_content'] =  str_replace("%","$user_name",$message['rule_remark']);
                $data1['is_new']      = 1;
                $data1['add_time']    = time();
                $res1        =     M('Innernote')->data($data1)->add();
                $res         =     M('Order')->data($data)->where($where)->save();
                if($res && $res1){
                    $return['code']    =    200;
                    $return['msg']     =    '操作成功！';
                }else{
                    $return['code']    =    400;
                    $return['msg']     =    '操作失败！';
                }
            }elseif($status == 4){
                $message = $this->sendWebMessage($type=2);
                $data1 = array();
                $data1['msg_from']     =  123;
                $data1['msg_to']       =  $user_id;
                $data1['msg_title']    =  $message['rule_name'];
                $data1['msg_content']  =  str_replace('%',"$user_name",$message['rule_remark']);
                $data1['is_new']        = 1;
                $data1['add_time']      = time();
                $res1        =     M('Innernote')->data($data1)->add();
                $res         =     M('Order')->data($data)->where($where)->save();
                if($res && $res1){
                    $return['code']    =    200;
                    $return['msg']     =    '操作成功！';
                }else{
                    $return['code']    =    400;
                    $return['msg']     =    '操作失败！';
                }
            }
        }else{
            $return['code']    =    400;
            $return['msg']     =    '操作失败！';
        }
        $this->ajaxReturn($return);exit;
    }

    //一键通过
    public function  pass(){
        $this->menu=ACTION_NAME;
        $arrId   =   I('post.arrId');
        if($arrId == null || empty($arrId)){
            $return['code']    =    400;
            $return['msg']     =    '请先选择订单！';
            $this->ajaxReturn($return);
        }
        $data['status'] = 3;
        $arrId   =   explode(',',$arrId);
        $message = $this->sendWebMessage($type=1);
        foreach($arrId as $key=>$value){
            $order['status'] = M('Order')->where(array('id'=>$value))->getField('status');
            if($order['status'] < 3){
                $where   =  "id = '".$value['id']."' and status < 3";
                $user_id   =  M('Order')->where("id='".$value['id']."'")->getField('user_id');
                $user_name =  M('User')->where("id='".$user_id."'")->getField('user_name');
                $data1 = array();
                $data1['msg_from']    =  123;
                $data1['msg_to']      =  $user_id;
                $data1['msg_title']   =  $message['rule_name'];
                $data1['msg_content'] =  str_replace("%","$user_name",$message['rule_remark']);
                $data1['is_new']      = 1;
                $data1['add_time']    = time();
                M('Innernote')->data($data1)->add();
                M('Order')->data($data)->where($where)->save();
//                if($res && $res1){
//                    $return['code']    =    200;
//                    $return['msg']     =    '操作成功！';
//                }else{
//                    $return['code']    =    400;
//                    $return['msg']     =    '操作失败！';
//                }
            }

        }
        foreach($arrId as $k=>$v){
            $order['status'] = M('Order')->where(array('id'=>$v))->getField('status');
            if($order['status']   < 3){
                $return['code']    =    400;
                $return['msg']     =    '操作失败！';
            }else{
                $return['code']    =    200;
                $return['msg']     =    '已经操作成功！';
            }

        }

        $this->ajaxReturn($return);exit;
    }

    //站内信模板
    public function sendWebMessage($type){
        //审核通过
        if($type == 1){
            $message    =  M('Messagerule')->where('id=1')->find();
        }elseif($type == 2){
            $message    =   M('Messagerule')->where('id=2')->find();
        }
        return $message;
    }

    //还书订单
    public function returnOrder(){
        $this->menu   =  ACTION_NAME;
        $library_id   =  $_COOKIE['ADMIN_LIBID'];
        $searchValue  =   trim(I('post.searchValue'));
        $where        =    "r.library_id='".$library_id."'";
        if($searchValue){
            $where    .= "and u.card='".$searchValue."' or u.user_name='".$searchValue."' or o.id='".$searchValue."'";
        }

        $returnList   =   M('ReturnOrder as r')
                    ->join('noto_order_book_list as l on l.return_order_id=r.id')
                    ->join('noto_user as u on u.id=r.user_id')
                    ->join('noto_library as a on a.id=r.library_id')
                    ->join('noto_order as o on o.id=l.order_id')
                    ->field('r.id,r.library_id,r.status,r.express_num,r.create_time,u.card,u.user_name,l.book_id,l.return_desc,a.borrowtime,o.create_time as starttime')
//                    ->where("r.library_id='".$library_id."'")
                    ->order('r.create_time desc')
                    ->select();
        foreach($returnList as $key=>$value){
            $returnList[$key]['overtime']  =  round(($value['create_time']-$value['starttime'])/86400)+1;
            if($value['borrowtime'] >= $returnList[$key]['overtime']){
                $returnList[$key]['isOver'] = 0;
            }else{
                $returnList[$key]['isOver'] = 1;
            }
        }
//        dump($returnList);die;
        $this->assign('returnList',$returnList);

        $this->display();
    }


}