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
//            if($count!=1){
//                for ($i=1;$i<=$count;$i++){
//                    $str=$str.'----';
//                }
//            }
            $value['title']=$str.$value['title'];
            $ancestry[] = $value;

            Ancestry($data , $value['id'],$count+1);
        }
    }
    return $ancestry;
}

/**
 * 获取家谱树
 * @param   array        $data   待分类的数据
 * @param   int/string   $pid    要找的祖先节点
 */
function AncestryNoTree($data , $pid=0,$count=1) {
    static $ancestry = array();

    foreach($data as $key => $value) {
        if($value['pid'] == $pid) {
            $value['Count'] = $count;
//            $str='';
//            if($count!=1){
//                for ($i=1;$i<=$count;$i++){
//                    $str=$str.'----';
//                }
//            }
            $value['title']=$value['title'];
            $ancestry[] = $value;

            AncestryNoTree($data , $value['id'],$count+1);
        }
    }
    return $ancestry;
}

function getBookDeatil($book_id){
    //初始化
//    $ch = curl_init();
//    $api_url  =   sprintf('http://101.201.103.106/subject_book/widgets/interface/index.html?indexId=3&api_type=articles_one&content_tag=1&a_id=%s',$book_id);
//    //设置选项，包括URL
//    curl_setopt($ch, CURLOPT_URL,$api_url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_HEADER, 0);
//    //执行并获取HTML文档内容
//    $output = curl_exec($ch);
//    //释放curl句柄
//    curl_close($ch);

    $api_url  =   sprintf('http://101.201.103.106/subject_book/widgets/interface/index.html?indexId=3&api_type=articles_one&content_tag=1&a_id=%s',$book_id);
    $ch       = curl_init ($api_url) ;
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1) ;
    $arr      = curl_exec ($ch) ;
    curl_close ($ch) ;
    $arr      =   json_decode($arr,true);
    return $arr['content'];


}