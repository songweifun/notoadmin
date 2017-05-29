<?php
//读取目录
function readDirectory($path){
    $arr['file']=array();
    $handler=opendir($path);
    while(($item=readdir($handler))!==false){
        if($item!='.' && $item!='..'){
            $filePath=$path.'/'.$item;
            if(is_file($filePath)){
                $fileArr['name']=$item;//名称
                $fileArr['type']=filetype($filePath);//类型
                $fileArr['size']=transByte(filesize($filePath));//大小
                $fileArr['readable']=is_readable($filePath);//可读
                $fileArr['writeable']=is_writable($filePath);//可写
                $fileArr['executable']=is_executable($filePath);//可执行
                $fileArr['createtime']=filectime($filePath);//创建时间
                $fileArr['modifytime']=filemtime($filePath);//修改时间
                $fileArr['visttime']=fileatime($filePath);//访问时间

                $arr['file'][]=$fileArr;
            }
            if(is_dir($filePath)){
                $folderArr['name']=$item;//名称
                $folderArr['type']=filetype($filePath);//类型
                $folderArr['size']=transByte(getDirSize($filePath));//大小
                $folderArr['readable']=is_readable($filePath);//可读
                $folderArr['writeable']=is_writable($filePath);//可写
                $folderArr['executable']=is_executable($filePath);//可执行
                $folderArr['createtime']=filectime($filePath);//创建时间
                $folderArr['modifytime']=filemtime($filePath);//修改时间
                $folderArr['visttime']=fileatime($filePath);//访问时间
                //$arr['file'][]=$folderArr;
                array_unshift($arr['file'],$folderArr);
            }
        }
    }
    closedir($handler);


    $arr['path']=$path;




    return $arr;


}

/**
 * 递归获得文件夹的大小
 * @param $path
 * @return int
 */
function getDirSize($path){
    $sum=0;
    global $sum;
    $handler=opendir($path);
    while(($item=readdir($handler))!==false){
        if($item!='.' && $item!='..'){
            $filepath=$path.'/'.$item;
            //echo $filepath;
            if(is_file($filepath)){
                $sum+=filesize($filepath);

            }
            if(is_dir($filepath)){
                $fun=__FUNCTION__;//递归
                $fun($filepath);
            }
        }
    }
    closedir($handler);

    return $sum;
}

/**
 * 创建文件夹
 * @param $pathname
 * @return array
 */
function creteDir($pathname){
    if(checkFileName(basename($pathname))){
        return array('status'=>false,'msg'=>'问价夹名称非法!');
    }
    if(!file_exists($pathname)){
        if(mkdir($pathname,0777,true)){
            return array('status'=>true,'msg'=>'添加文件夹成功');
        }else{
            return array('status'=>false,'msg'=>'添加文件夹失败');
        }
    }else{
        return array('status'=>false,'msg'=>'已存在同名文件夹');

    }
}


//获得文件夹的层级关系
/**
 * @param $path
 * @return array
 */
function getDirArr($path){
    $handler=opendir($path);
    //$arr=[];
    //global $arr;
    while(($item=readdir($handler))!==false){
        if($item!='.' && $item!='..'){
            $filepath=$path.'/'.$item;
            //echo $filepath;
            if(is_dir($filepath)){

                //$fun=__FUNCTION__;//递归
                //$fun($filepath);
                //$arr[$path][]=$fun($filepath);
                $v['name']=$item;
                $v['path']=$filepath;
                $v['children']=getDirArr($filepath);
                $arr[]=$v;
                //$arr[$path]['children']=getDirArr($filepath);
                //$arr



            }

        }
    }



    closedir($handler);
//    $arr2[0]['name']='Upload';//组装上去的
//    $arr2[0]['path']='Upload/';
//    $arr2[0]['children']=$arr;
    return $arr;



}


//复制文件夹
/**
 * 复制文件夹
 * @param $src
 * @param $dest
 * @return bool
 */
function copyFolder($src,$dest){
        if(!file_exists($dest)){
            mkdir($dest,0777,true);
        }
        $handler=opendir($src);
        while(($item=readdir($handler))!==false){
            if($item!='.' && $item!='..'){
                if (is_file($src.'/'.$item)){
                    copy($src.'/'.$item,$dest.'/'.$item);
                }
                if(is_dir($src.'/'.$item)){
                    $func=__FUNCTION__;
                    $func($src.'/'.$item,$dest.'/'.$item);
                }

            }
        }
        closedir($handler);


    return true;


}


/**
 * 重命名文件
 * @param $oldfilename
 * @param $newfilename
 * @return string
 */
function renameFolder($oldfilename,$newfilename){
    //echo $oldfilename .'____'.$newfilename;die();
    //判断有无特殊字符
    if(!checkFileName($newfilename)){
        //判断文件名称是否已存在
        if(file_exists($newfilename) && $newfilename!=$oldfilename){
            //文件同名
            return array('status'=>false,'msg'=>'已存在同名文件夹');
        }else{
            if(rename($oldfilename,$newfilename)){
                //创建问价
                return array('status'=>true,'msg'=>'重命名文件夹成功');
            }else{
                return array('status'=>false,'msg'=>'重命名文件夹失败');
            }
        }
    }else{
        //文件名非法
        return array('status'=>false,'msg'=>'文件夹名非法');
    }

}

/**
 * 剪切文件夹
 * @param $src 原文件夹全路径
 * @param $dest 目标文件夹全路 包含源文件名称
 * @return array
 */
function cutFolder($src,$dest){
    if(!file_exists(dirname($dest))){
        return array('status'=>false,'msg'=>'目标文件夹不存在!');//针对手动输入 这里树形图不存在
    }
    if(file_exists($dest)){
        return array('status'=>false,'msg'=>'目标文件夹已存在同名文件夹!');//针对手动输入 这里树形图不存在
    }else{
        if(rename($src,$dest)){
            return array('status'=>true,'msg'=>'剪切文件夹成功!');//针对手动输入 这里树形图不存在

        }else{
            return array('status'=>false,'msg'=>'剪切文件夹失败!');//针对手动输入 这里树形图不存在

        }
    }

}

/**
 * 删除目录
 * @param $filepath
 * @return array
 */
function deleDir($filepath){
    $handler=opendir($filepath);
    while (($item=readdir($handler))!==false){
        if($item!='.' && $item!='..'){
            if(is_file($filepath.'/'.$item)){
                unlink($filepath.'/'.$item);
            }
            if(is_dir($filepath.'/'.$item)){
                $func=__FUNCTION__;
                $func($filepath.'/'.$item);
            }
        }
    }

    closedir($handler);
    rmdir($filepath);
    return array('status'=>true,'msg'=>'删除文件夹成功!');
}

