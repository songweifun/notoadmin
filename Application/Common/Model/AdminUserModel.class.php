<?php

/**
 * Created by PhpStorm.
 * User: daivd
 * Date: 2017/5/10
 * Time: 下午3:30
 */
namespace Common\Model;
use Think\Model\RelationModel;
class AdminUserModel extends RelationModel
{
    protected $pk='id';
    protected $tableName='admin_user';
    protected $_validate = array(
        array('user_name','require','用户名不能为空！'), //默认情况下用正则进行验证
        array('password','require','密码不能为空！'), //默认情况下用正则进行验证
    );
    //关联模型
    protected $_link = array(
        'adminRoleUser' => array(
            'mapping_type'  => self::HAS_ONE,
            'class_name'    => 'adminRoleUser',
            'foreign_key'   => 'user_id',
            'mapping_name'  => 'adminRoleUser',//在查询结果中以数组显示的名字
            'mapping_fields'=>'role_id',//查询这个表中的字段
            'as_fields' => 'role_id'//作为这个查询数据中非数组形式的字段
        ),
//        'adminRole' => array(
//            'mapping_type'  => self::BELONGS_TO,
//            'class_name'    => 'adminRole',
//            'foreign_key'   => 'id',
//            'mapping_name'  => 'adminRole',
//        ),
    );



    /**
     * 取当前用户信息
     * @access public
     * @return array
     */
    function getAuthInfo($field=NULL) {
        $authInfo = authcode($_COOKIE['AUTH_STRING'], 'DECODE', C('AUTH_KEY'));
        $authInfo = explode("\t",$authInfo);
        $result['user_id'] = $authInfo[0];
        $result['passwd'] = $authInfo[1];
        if ($field) {
            if ($result[$field]) {
                return $result[$field];
            } else {
                $info=$this->where(array('id'=>intval($result['user_id'])))->find();
                return $info[$field];
            }
        }
        return $result;
        //echo "<pre>";print_r($result);die;
    }

    /**
     * 获得指定图书馆的官员表
     */
    function getAdminList($lid){

        return $this->where(array('library_id'=>$lid))->select();


    }

}