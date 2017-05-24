<?php
//读取目录
function readDirectory($path){
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
                $arr['dir'][]=$item;
            }
        }
    }

    $arr['path']=$path;




    return $arr;


}