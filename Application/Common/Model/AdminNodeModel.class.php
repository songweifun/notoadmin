<?php
/**
 * Created by PhpStorm.
 * User: daivd
 * Date: 2017/5/14
 * Time: 上午12:46
 */

namespace Common\Model;


use Think\Model\RelationModel;

class AdminNodeModel extends RelationModel
{
    protected $pk='id';
    protected $tableName='admin_node';

    //关联模型
    protected $_link = array(
        'adminNode' => array(
            'mapping_type'  => self::HAS_MANY,
            'class_name'    => 'adminNode',
            'parent_key'   => 'pid',
            'mapping_name'  => 'node',//在查询结果中以数组显示的名字
            'mapping_order' => 'sort asc'
        ),

    );

}