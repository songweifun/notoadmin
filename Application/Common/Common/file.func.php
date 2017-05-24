<?php
/**
 * Created by PhpStorm.
 * User: daivd
 * Date: 2017/5/24
 * Time: 下午9:40
 */
/**
 * 将字节转换为可辨别单位
 * @param $size
 * @return string
 */
function transByte($size){
    $arr=array('B','KB','MB','GB','TB','EB');
    $i=0;
    while ($size>=1024){
        $size/=1024;
        $i++;
    }
    return round($size,2).$arr[$i];
}