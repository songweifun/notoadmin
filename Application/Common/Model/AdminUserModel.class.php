<?php

/**
 * Created by PhpStorm.
 * User: daivd
 * Date: 2017/5/10
 * Time: 下午3:30
 */
namespace Common\Model;
use Think\Model;
class AdminUserModel extends Model
{
    protected $pk='id';
    protected $tableName='admin_user';
    protected $_validate = array(
        array('user_name','require','用户名不能为空！'), //默认情况下用正则进行验证
        array('password','require','密码不能为空！'), //默认情况下用正则进行验证
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
                $info=$this->where(array('user_id'=>intval($result['user_id'])))->find();
                return $info[$field];
            }
        }
        return $result;
    }

}