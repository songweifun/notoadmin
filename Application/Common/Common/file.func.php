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

/**
 * 创建文件
 * @param $filename
 * @return array
 */

function createFile($filename){
    if(!preg_match('/\.[a-z]+$/',basename($filename))){
        return array('status'=>false,'msg'=>'请填写文件扩展名！');
    }
    if(!checkFileName($filename)){
        //判断文件名称是否已存在
        if(!file_exists($filename)){
            if(touch($filename)){
                //创建问价
                return array('status'=>true,'msg'=>'添加文件成功');

            }else{
                return array('status'=>true,'msg'=>'添加文件失败');

            }

        }else{
            //文件同名
            return array('status'=>false,'msg'=>'已存在同名文件');
        }

    }else{
        //文件名非法
        return array('status'=>false,'msg'=>'文件名非法');
    }
}

/**
 * 重命名文件
 * @param $oldfilename
 * @param $newfilename
 * @return string
 */
function renameFile($oldfilename,$newfilename){
    //echo $oldfilename .'____'.$newfilename;die();
    //判断有无特殊字符
    if(!checkFileName($newfilename)){
        //判断文件名称是否已存在
        if(file_exists($newfilename) && $newfilename!=$oldfilename){
            //文件同名
            return array('status'=>false,'msg'=>'已存在同名文件');
        }else{
            if(rename($oldfilename,$newfilename)){
                //创建问价
                return array('status'=>true,'msg'=>'重命名文件成功');
            }else{
                return array('status'=>false,'msg'=>'重命名文件失败');
            }
        }
    }else{
        //文件名非法
        return array('status'=>false,'msg'=>'文件名非法');
    }

}

/**
 * 检测文件是否合法
 * @param $filename
 * @return bool
 */
function checkFileName($filename){
    $pattern='/[\/\*<>\?\|]/';
    if(preg_match($pattern,basename($filename))){
        return true;
    }else{
        return false;
    }


}

/**
 * 复制文件
 * @param $src
 * @param $dest 全路径带文件名
 * @return array
 */

function copyFile($src,$dest){
    if(!file_exists(dirname($dest))){
        return array('status'=>false,'msg'=>'目标文件夹不存在!');

    }
    if(is_file($dest)){
        return array('status'=>false,'msg'=>'目标文件夹中存在同名文件!');
    }
    if(copy($src,$dest)){
        return array('status'=>true,'msg'=>'文件复制成功');

    }else{
        return array('status'=>false,'msg'=>'文件复制失败');

    }
}

/**
 * 剪切文件
 * @param $src
 * @param $dest
 * @return array
 */
function cutFile($src,$dest){
    if(!file_exists(dirname($dest))){
        return array('status'=>false,'msg'=>'目标文件夹不存在!');//针对手动输入 这里树形图不存在
    }
    if(file_exists($dest)){
        return array('status'=>false,'msg'=>'目标文件夹已存在同名文件!');//针对手动输入 这里树形图不存在
    }else{
        if(rename($src,$dest)){
            return array('status'=>true,'msg'=>'剪切文件成功!');//针对手动输入 这里树形图不存在

        }else{
            return array('status'=>false,'msg'=>'剪切文件失败!');//针对手动输入 这里树形图不存在

        }
    }

}


function uploadFileHandler($path,$fileInfo,$allowExtArr=array('jpg','jpeg','gif','png','txt','excel','html'),$maxSize=10000000){
    if ($fileInfo['error']!=UPLOAD_ERR_OK){
        switch ($fileInfo['error']){
            case 1:
                return array('status'=>false,'msg'=>'文件超过PHP配置文件大小!');
                break;
            case 2:
                return array('status'=>false,'msg'=>'文件超过FORM表单配置文件大小!');
                break;
            case 3:
                return array('status'=>false,'msg'=>'文件部分上传!');
                break;
            case 4:
                return array('status'=>false,'msg'=>'文件没有上传!');
                break;
        }
    }
    if(!is_uploaded_file($fileInfo['tmp_name'])){
        return array('status'=>false,'msg'=>'非法上传文件!');
    }


    $ext=getExt($fileInfo['name']);
    if(!in_array($ext,$allowExtArr)){
        //限制扩展名
        return array('status'=>false,'msg'=>'不允许上传此文件扩展名的文件!');
    }
    if ($fileInfo['size']>$maxSize){
        //限制大小
        return array('status'=>false,'msg'=>'文件太大!');
    }

    $uniqid=getUniqidName();

    $dest=$path.'/'.pathinfo($fileInfo['name'],PATHINFO_FILENAME).'_'.$uniqid.'.'.$ext;

    if(move_uploaded_file($fileInfo['tmp_name'],$dest)){
        return array('status'=>true,'msg'=>'上传成功!');

    }else{
        return array('status'=>false,'msg'=>'上传失败!');
    }



}