<?php
return array(
	//'配置项'=>'配置值'
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'subject_3.0_nannong',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'admin888',          // 密码
    'DB_PORT'               =>  '',        // 端口
    'DB_PREFIX'             =>  'noto_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号



    /* 默认设定 */
    'DEFAULT_M_LAYER'       =>  'Model', // 默认的模型层名称
    'DEFAULT_C_LAYER'       =>  'Controller', // 默认的控制器层名称
    'DEFAULT_V_LAYER'       =>  'View', // 默认的视图层名称
    'DEFAULT_LANG'          =>  'zh-cn', // 默认语言
    'DEFAULT_THEME'         =>  '',	// 默认模板主题名称
    'DEFAULT_MODULE'        =>  'Admin',  // 默认模块
    'DEFAULT_CONTROLLER'    =>  'Index', // 默认控制器名称
    'DEFAULT_ACTION'        =>  'index', // 默认操作名称
    'DEFAULT_CHARSET'       =>  'utf-8', // 默认输出编码
    'DEFAULT_TIMEZONE'      =>  'PRC',	// 默认时区
    'DEFAULT_AJAX_RETURN'   =>  'JSON',  // 默认AJAX 数据返回格式,可选JSON XML ...
    'DEFAULT_JSONP_HANDLER' =>  'jsonpReturn', // 默认JSONP格式返回的处理方法
    'DEFAULT_FILTER'        =>  'htmlspecialchars', // 默认参数过滤方法 用于I函数..
    /***************************************程序配置****************************************/
    // cookie验证hash值
    'AUTH_KEY'=>'6d_cc_on_board',
    //每隔一小时验证cookie信息是否与数据库一致
    'AUTH_TIME'=>3600,
    'AUTH_CHECKTIME'=>7200,// 间隔AUTH_CHECKTIME时间检查一次cookie信息是否和数据库一至
    /**
    +------------------------------------------------------------------------------
     * 基于角色的数据库方式验证类
    +------------------------------------------------------------------------------
     */
     //配置文件增加设置
     'RBAC_SUPERADMIN'=>'admin', //超级管理员的用户名对应于admin_user表中的某一用户名
     'ADMIN_AUTH_KEY'=>'superadmin',//自定义加密key
     'USER_AUTH_ON' =>true,//是否需要认证
     'USER_AUTH_TYPE'=>1,// 认证类型 1登录之后认证 2实时认证
     'USER_AUTH_KEY' =>'authid',//认证识别号 自定义
     //'REQUIRE_AUTH_MODULE'=>'',//  需要认证模块
     'NOT_AUTH_MODULE'=>'Index,SystemManage',// 无需认证模块
     'NOT_AUTH_ACTION'=>'index',// 无需认证操作
     //'USER_AUTH_GATEWAY'=>'/Login/login',// 认证网关
     //'RBAC_DB_DSN'=>'mysql://root:admin888@localhost:3306/subject_3.0_nannong',//  数据库连接DSN
     'RBAC_ROLE_TABLE'=>'noto_admin_role',// 角色表名称
     'RBAC_USER_TABLE' =>'noto_admin_role_user',//用户表名称 角色用户关联表
     'RBAC_ACCESS_TABLE'=>'noto_admin_access',// 权限表名称
     'RBAC_NODE_TABLE'=>'noto_admin_node',// 节点表名称

    /**********************************************加载自定义函数文件********************************/
    'LOAD_EXT_FILE'=>'dir,file.func',
);


