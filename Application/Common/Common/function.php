<?php
/**
 * Created by PhpStorm.
 * User: daivd
 * Date: 2017/5/10
 * Time: 下午4:02
 */

/**
 * cookie编码处理
 * @param string $string 要编码的字符串
 * @param string $operation 操作ENCODE编码，DECODE解码
 * @param string $key hash值
 * @return string
 */
function authcode($string, $operation, $key = '') {
    $coded = '';
    $keylength = strlen($key);
    $string = $operation == 'DECODE' ? base64_decode($string) : $string;
    for($i = 0; $i < strlen($string); $i += $keylength) {
        $coded .= substr($string, $i, $keylength) ^ $key;
    }
    $coded = $operation == 'ENCODE' ? str_replace('=', '', base64_encode($coded)) : $coded;
    return $coded;
}

/**
 * 获取家谱树
 * @param   array        $data   待分类的数据
 * @param   int/string   $pid    要找的祖先节点
 */
function Ancestry($data , $pid=0,$count=1) {
    static $ancestry = array();

    foreach($data as $key => $value) {
        if($value['pid'] == $pid) {
            $value['Count'] = $count;
            $str='';
            if($count!=1){
                for ($i=1;$i<=$count;$i++){
                    $str=$str.'----';
                }
            }
            $value['title']=$str.$value['title'];
            $ancestry[] = $value;

            Ancestry($data , $value['id'],$count+1);
        }
    }
    return $ancestry;
}